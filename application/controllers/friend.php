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
        $user_requested = $this->session->userdata('user_id');
        echo 1;
    }
    
    function search() {
        // get data from form
        $search_name = $this->input->post('name');
        $search_year = $this->input->post('year');
        $interest = $this->input->post('interest');
        $major = $this->input->post('major');
        
        // load database
        $this->load->model('user', 'userModel');
        $this->load->model('interested_in', 'interested_inModel');
        $this->load->model('interest', 'interestModel');
        $this->load->model('education', 'educationModel');
        $this->load->model('major', 'majorModel');
        
        //get all user_id
        $option = array('columnSelect' => 'id');
        $getAllUser = $this->userModel->getUsers($option);
        
        //cari berdasarkan education
        if ($major == 'all') {
            //get all user_id
            $getUserByMajor = $getAllUser;
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
            if (!isset($getUserByMajor)) {
                //tidak ada user_id yang memenuhi
            } else {
                //ada user_id yang memenuhi
            }
        }
        
        //cari berdasarkan interest
        if ($interest == 'all') {
            //get all user_id
            $getUserByInterest = $getAllUser;
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
            if (!isset($getUserByInterest)) {
                //tidak ada user_id yang memenuhi
            } else {
                //ada user_id yang memenuhi
            }
        }
        
        //cari berdasarkan nama dan tahun
        if ($search_name == "") {
            //kolom nama gak diisi, langsung cari berdasarkan tahun kalo ada
        } else {
            
        }
        
        $data['title'] = 'Profile';
        $data['main_content'] = 'friend/search_friend_result_view';
        $data['struktur'] = $this->getStruktur2('Your Profile');
        $data['search_name'] = $search_name;
        $data['search_results'] = array($getUserByName, $getUserByYear);
        
        /*
        $data['title'] = 'Profile';
        $data['main_content'] = 'friend/search_friend_result_view';
        $data['struktur'] = $this->getStruktur2('Your Profile');
        $data['search_name'] = $search_name;
        $data['search_year'] = $search_year;
        $data['interest'] = $interest;
        $data['education'] = $major;
        // get user profile info
        $user_id = $this->session->userdata('user_id');
        $name = $this->session->userdata('name');
        $email = $this->session->userdata('email');
        $image = 'Ini image';
        $calendar= 'Ini calendar';
        $kelulusan= 'SMA St. Ursula';
        $tahun_kelulusan= '2010';
        $pendidikan = array (
            array (
                'degree' => 'Bachelor',
                'where' => 'University of Southern California',
                'major' => 'Chemical Biology',
                'minor' => 'none',
                'current' => 1
            )
        );
        $interest = array (
            'movies',
            'medicines',
            'fashion'
        );
        $working_experience = array(
            array (
                'company' => 'PT Sumarno Pabotingi',
                'year' => 2011,
                'position' => 'programmer',
                'address' => 'Jln Cikini V no 12, Jakarta Pusat',
                'telephone' => '02100292',
                'fax' => '021929292',
                'work_hp' => '082222',
                'work_email' => 'danang@yaaahoo.com',
                'is_current_work' => 1
            )
        );
        
        $data['search_result'] = array(
            array (
                'user_data' => array (
                        'user_id'=>$user_id,
                        'name' => $name,
                        'email' => $email,
                        'image' => $image,
                        'calendar' => $calendar,
                        'kelulusan' => $kelulusan,
                        'tahun_kelulusan' => $tahun_kelulusan,
                        'pendidikan' => $pendidikan,
                        'interest' => $interest,
                        'working_experience' => $working_experience
                    )
                ),
            array (
                'user_data' => array (
                        'user_id'=>$user_id,
                        'name' => $name,
                        'email' => $email,
                        'image' => $image,
                        'calendar' => $calendar,
                        'kelulusan' => $kelulusan,
                        'tahun_kelulusan' => $tahun_kelulusan,
                        'pendidikan' => $pendidikan,
                        'interest' => $interest,
                        'working_experience' => $working_experience
                    )
                )
        );*/

        
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
