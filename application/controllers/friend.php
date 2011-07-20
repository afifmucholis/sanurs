<?php
/** * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 */
class friend extends CI_Controller {
    
    /**
     * index()
     *
     * menampilkan halaman find a friend
     *
     */
    function index() {
        // show map
        $data['show_map'] = 1;
        
        // get list of interest
        $this->load->model('interest', 'interestModel');
        $optionInterest = array(
            'columnSelect' => 'interest',
            'sortBy' => 'interest'
        );
        $getInterest = $this->interestModel->getInterests($optionInterest);
        
        $data['interest_list'] = array(
            'all' => 'All Interest'
        );
        $i = 0;
        while (isset($getInterest[$i])) {
            $data['interest_list'][$getInterest[$i]->interest] = $getInterest[$i]->interest;
            $i++;
        }
        
        // get list of major
        $this->load->model('major', 'majorModel');
        $optionMajor = array(
            'columnSelect' => 'major',
            'sortBy' => 'major'
        );
        $getMajor = $this->majorModel->getMajors($optionMajor);
        
        $data['major_list'] = array(
            'all' => 'All Major'
        );
        $i = 0;
        while (isset($getMajor[$i])) {
            $data['major_list'][$getMajor[$i]->major] = $getMajor[$i]->major;
            $i++;
        }
        
        $data['title'] = 'Find a friend';
        $data['main_content'] = 'friend/find_a_friend_view';
        $data['struktur'] = $this->getStruktur();
        $this->load->view('includes/template',$data);
    }
    
    /**
     * add()
     *
     * Menambahkan request friend ke user tertentu
     * Parameter passing dengan method post
     * @param string post->user_id user_id yang di request
     * @param string post->message pesan yang ingin disampaikan
     */
    function add() {
        $user_id = $this->input->post('user_id');
        $message = $this->input->post('message');
        $user_requester = $this->session->userdata('user_id');
        // load model friend_request
        $this->load->model('friend_request','friendModel');
        $options = array('userid_requester'=>$user_requester,'userid_requested'=>$user_id,'message'=>$message);
        $addGan = $this->friendModel->addFriendRequest($options);
        if (is_bool($addGan)) {
            echo 0;
        } else {
            echo 1;
        }
    }
    
    function search() {
        // get data from form
        $search_name = $this->input->post('name');
        $search_year = $this->input->post('year');
        $interest = $this->input->post('interest');
        $major = $this->input->post('major');
        
        // load database
        $this->load->model('user', 'userModel');
        $this->load->model('unit', 'unitModel');
        $this->load->model('interested_in', 'interested_inModel');
        $this->load->model('interest', 'interestModel');
        $this->load->model('education', 'educationModel');
        $this->load->model('major', 'majorModel');
        
        //array untuk menyimpan user_id
        $userByMajor = array();
        $userByInterest = array();
        $userByNameAndYear = array();
        
        //get all user_id
        $option = array('columnSelect' => 'id');
        $getAllUser = $this->userModel->getUsers($option);
        
        //cari berdasarkan education
        if ($major == 'all') {
            //get all user_id
            $getUserByMajor = $getAllUser;
            if ($getUserByMajor) {
                $i = 0;
                while ($i < count($getUserByMajor)) {
                    $userByMajor[] = $getUserByMajor[$i]->id;
                    $i++;
                }
            }
        } else {
            //get major id
            $option = array(
                'major' => $major,
                'columnSelect' => 'id'
            );
            $getMajorId = $this->majorModel->getMajors($option);
            $major_id = $getMajorId[0]->id;
            
            //cari id dengan major_id seperti yang ditemukan
            $option = array(
                'major_id' => $major_id,
                'columnSelect' => 'user_id'
            );
            $getUserByMajor = $this->educationModel->getEducations($option);
            if ($getUserByMajor) {
                $i = 0;
                while ($i < count($getUserByMajor)) {
                    $userByMajor[] = $getUserByMajor[$i]->user_id;
                    $i++;
                }
            }
        }
        
        //cari berdasarkan interest
        if ($interest == 'all') {
            //get all user_id
            $getUserByInterest = $getAllUser;
            if ($getUserByInterest) {
                $i = 0;
                while ($i < count($getUserByInterest)) {
                    $userByInterest[] = $getUserByInterest[$i]->id;
                    $i++;
                }
            }
        } else {
            //get interest id
            $option = array(
                'interest' => $interest,
                'columnSelect' => 'id'
            );
            $getInterestId = $this->interestModel->getInterests($option);
            $interest_id = $getInterestId[0]->id;
            
            //cari id dengan interest_id seperti yang ditemukan
            $option = array(
                'interest_id' => $interest_id,
                'columnSelect' => 'user_id'
            );
            $getUserByInterest = $this->interested_inModel->getInterestedIn($option);
            if ($getUserByInterest) {
                $i = 0;
                while ($i < count($getUserByInterest)) {
                    $userByInterest[] = $getUserByInterest[$i]->user_id;
                    $i++;
                }
            }
        }
        
        //cari berdasarkan nama dan tahun
        if ($search_name == "") {
            //kolom nama gak diisi, langsung cari berdasarkan tahun kalo ada
            if ($search_year == "") {
                //get semua user
                $getUserByNameAndYear = $getAllUser;
            } else {
                //cari berdasarkan tahun saja
                $option = array(
                    'graduate_year' => $search_year,
                    'columnSelect' => 'id'
                );
                $getUserByNameAndYear = $this->userModel->getUsers($option);
            }
        } else {
            if ($search_year == "") {
                //cari berdasarkan nama saja
                $option = array(
                    'name' => $search_name,
                    'columnSelect' => 'id'
                );
                $getUserByNameAndYear = $this->userModel->getUsers($option);
            } else {
                //cari berdasarkan nama dan tahun
                $option = array(
                    'name' => $search_name,
                    'graduate_year' => $search_year,                    
                    'columnSelect' => 'id'
                );
                $getUserByNameAndYear = $this->userModel->getUsers($option);
            }
        }
        if ($getUserByNameAndYear) {
            $i = 0;
            while ($i < count($getUserByNameAndYear)) {
                $userByNameAndYear[] = $getUserByNameAndYear[$i]->id;
                $i++;
            }
        }
        
        $temp = array();
        $results = array();
        
        if (count($userByInterest) > 0) {
            //cek userByMajor
            if (count($userByMajor) > 0) {
                //cocokkin userByInterest sama userByMajor
                foreach ($userByInterest as $uInterest) {
                    $i = 0;
                    $found = FALSE;
                    while (!$found && $i<count($userByMajor)) {
                        if ($uInterest == $userByMajor[$i]) {
                            $temp[] = $uInterest;
                            $found = TRUE;
                        }
                        $i++;
                    }
                }
                
                if (count($temp) > 0) {
                    if (count($userByNameAndYear) > 0) {
                        //cocokkin hasil pencocokan dengan userByNameAndYear
                        foreach ($temp as $t) {
                            $i = 0;
                            $found = FALSE;
                            while (!$found && $i < count($userByNameAndYear)) {
                                if ($t == $userByNameAndYear[$i]) {
                                    $results[] = $t;
                                    $found = TRUE;
                                }
                                $i++;
                            }
                        }
                    }
                }
            }
        }
        
        $data['search_results'] = array();
        
        if (count($results) > 0) {
            foreach ($results as $res) {
                $option = array('id' => $res);
                $getUser = $this->userModel->getUsers($option);
                
                $unit_id = $getUser[0]->last_unit_id;
                $option = array(
                    'id' => $unit_id,
                    'columnSelect' => 'label'
                );
                $getUnit = $this->unitModel->getUnits($option);
                
                $elmt = array(
                    'id' => $getUser[0]->id,
                    'name' => $getUser[0]->name,
                    'profpict_url' => $getUser[0]->profpict_url,
                    'graduate_year' => $getUser[0]->graduate_year,
                    'unit' => $getUnit[0]->label
                );
                $data['search_results'][] = $elmt;
            }
        }
        $data['title'] = 'Profile';
        $data['main_content'] = 'friend/search_friend_result_view';
        $data['struktur'] = $this->getStruktur2('Your Profile');
        $data['search_name'] = $search_name;
        
        //$this->load->view('includes/template',$data);
    }
    
    function getStruktur() {
        $struktur = array (
            array (
                'islink'=>1,
                'link'=>'home',
                'label'=>'Home'
            ),
            array (
                'islink'=>1,
                'link'=>'profile',
                'label'=>'Your Profile'
            ),
            array (
                'islink'=>0,
                'label'=>'Find a friend'
            )
        );
        return $struktur;
    }
    function getStruktur2() {
        $struktur = array (
            array (
                'islink'=>1,
                'link'=>'home',
                'label'=>'Home'
            ),
            array (
                'islink'=>1,
                'link'=>'profile',
                'label'=>'Your Profile'
            ),
            array (
                'islink'=>1,
                'link'=>'friend',
                'label'=>'Find a friend'
            ),
            array (
                'islink'=>0,
                'label'=>'Search result'
            )
        );
        return $struktur;
    }
}

?>
