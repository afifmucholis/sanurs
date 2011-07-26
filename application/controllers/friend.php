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
        if ($this->session->userdata('name')==null) {
            redirect('/home', 'refresh');
        }
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
        $data['struktur'] = $this->getStruktur3();
        $data['body_id'] = 'find_friend_body';
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
        $name_requester = $this->session->userdata('name');
        // load model friend_request
        $this->load->model('friend_request','friendModel');
        
        // cek sudah ada request sebelumnya atau belum
        $options = array('userid_requester'=>$user_requester,'userid_requested'=>$user_id);
        $getGan = $this->friendModel->getFriendRelationships($options);
        if (is_bool($getGan)) {
            $options = array('userid_requester'=>$user_id,'userid_requested'=>$user_requester);
            $getGan = $this->friendModel->getFriendRelationships($options);
        }
        if (is_bool($getGan)) {
            $options = array('userid_requester'=>$user_requester,'userid_requested'=>$user_id,'message'=>$message);
            $addGan = $this->friendModel->addFriendRequest($options);
            // load model notification
            $this->load->model('notification_model','notifModel');
            // add notifi ada yg nge request friend
            $notify = $name_requester." wants to be your friend.";
            $link = 'friend/friend_request';
            $options = array('userid_to'=>$user_id,'message'=>$notify,'link'=>$link);
            $addNotify = $this->notifModel->addNotification($options);

            if (is_bool($addGan) || is_bool($addNotify)) {
                echo 0;
            } else {
                echo 1;
            }
        } else {
            echo 0;
        }
    }
    
    /**
     * unfriend()
     *
     * fungsi untuk remove dari friend
     *
     */
    function unfriend() {
        if ($this->session->userdata('name')==null) {
            redirect('/home', 'refresh');
        }
        $user_name = $this->session->userdata('name');
        $user_id = $this->session->userdata('user_id');
        $user_removed = $this->input->post('user_id');
        // load model friend relationship
        $this->load->model('friend_relationship','frModel');
        $options = array('userid_1'=>$user_id,'userid_2'=>$user_removed);
        $getFriendID = $this->frModel->getFriendRelationships($options);
        if (is_bool($getFriendID)) {
            $options = array('userid_2'=>$user_id,'userid_1'=>$user_removed);
            $getFriendID = $this->frModel->getFriendRelationships($options);
        }
        // delete friend relationship
        $options = array('id'=>$getFriendID[0]->id);
        $deleteFriend = $this->frModel->deleteFriendRelationship($options);
        $success = 1;
        if (is_bool($deleteFriend)) {
            $success = 0;
        } else {
            // load model notification
            $this->load->model('notification_model','notifModel');
            // add notifi ada yg nge remove dari friend
            $notify = $user_name." has removed you from being his friend.";
            $link = 'profile/user/'.$user_id;
            $options = array('userid_to'=>$user_removed,'message'=>$notify,'link'=>$link);
            $addNotify = $this->notifModel->addNotification($options);
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('success' => $success)));
    }
    
    /**
     * friend_request()
     *
     * menampilkan halaman friend request
     *
     */
    function friend_request() {
        if ($this->session->userdata('name')==null) {
            redirect('/home', 'refresh');
        }
        $data['title'] = 'View Friend Request';
        $data['main_content'] = 'friend/friend_request_view';
        $data['struktur'] = $this->getStruktur('Friend Request');
        $data['body_id'] = 'profile_body';
        $user_id = $this->session->userdata('user_id');
        $this->load->library('pagination');
        $per_page = 10;
        $offset = $this->input->post('offsetval');
        $friends_request_result = $this->getFriendRequestList($user_id, $per_page, $offset);
        $total_friends = $this->countTotalFriendRequest($user_id);
        
        $data['request_friend'] = $friends_request_result;
        $base_url = site_url('friend/friend_request');
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_friends;
        $config['uri_segment'] = '2';
        $config['per_page'] = $per_page;
        $config['cur_page'] = $offset;

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<div  id="num_link">';
        $config['first_tag_close'] = '</div>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<div id="num_link">';
        $config['last_tag_close'] = '</div>';
        $config['next_link'] = false;
        $config['prev_link'] = false;
        $config['cur_tag_open'] = '<div id="cur_link">';
        $config['cur_tag_close'] = '</div>';
        $config['num_tag_open'] = '<div id="num_link">';
        $config['num_tag_close'] = '</div>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        
         if ($this->input->post('ajax')) {
            $text = $this->load->view('friend/list_friend_request',$data, true);
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('text' => $text, 'struktur' => $data['struktur'])));
        } else {
            $this->load->view('includes/template', $data);
        }
    }
    
    function getFriendRequestList($user_id, $limit, $offset) {
        // load model friend request
        $this->load->model('friend_request','friend_requestModel');
        // load model user
        $this->load->model('user','userModel');
        $options = array('userid_requested'=>$user_id, 'limit'=>$limit, 'offset'=>$offset);
        $getRequest = $this->friend_requestModel->getFriendRelationships($options);
        $result = array();
        if (is_bool($getRequest)) {
            //$data['request_friend'] = 0;
        } else {
            $i=0;
            foreach($getRequest as $request) :
                // get user requester info
                $options = array('id'=>$request->userid_requester);
                $getUser = $this->userModel->getUsers($options);
                $prof_pic;
                $name;
                if (!is_bool($getUser)) {
                    $prof_pic = $getUser[0]->profpict_url;
                    $name = $getUser[0]->name;
                }
                $result[$i] = array (
                    'user_requester'=>$request->userid_requester,
                    'prof_pic'=>$prof_pic,
                    'name'=>$name,
                    'message'=>$request->message,
                    'id_request'=>$request->id
                );
                $i++;
            endforeach;
        }
        
        return $result;
    }
    
    function countTotalFriendRequest($user_id){
         // load model friend request
        $this->load->model('friend_request','friend_requestModel');
        $options = array('userid_requested'=>$user_id);
        $getRequest = $this->friend_requestModel->getFriendRelationships($options);
        $total_friend;
        
        if (is_bool($getRequest)) {
            $total_friend = 0;
        } else {
            $total_friend = count($getRequest);
        }
        
        return $total_friend;
    }
    
    /**
     * confirm_request
     *
     * confirm request data dikirim dengan post ajax
     *
     */
    function confirm_request() {
        if ($this->session->userdata('name')==null) {
            redirect('/home', 'refresh');
        }
        // load model friend request
        $this->load->model('friend_request','friend_requestModel');
        // load model friend relationship
        $this->load->model('friend_relationship','friend_relationshipModel');
        // load model user
        $this->load->model('user','userModel');
        // load model notification
        $this->load->model('notification_model','notificationModel');
        $user_id = $this->session->userdata('user_id');
        $user_name = $this->session->userdata('name');
        $id_request = $this->input->post('id');
        $confirm = $this->input->post('type');
        
        $success=0;
        $message="";
        // get id requester
        $options = array('id'=>$id_request);
        $getRequest = $this->friend_requestModel->getFriendRelationships($options);
        
        if (!is_bool($getRequest)) {        
            $user_requester = $getRequest[0]->userid_requester;
            // get info requester
            $options = array('id'=>$user_requester);
            $getUser = $this->userModel->getUsers($options);
            if ($confirm=='true') {
                // add to friend relationship tabel
                $options = array('userid_1'=>$user_id,'userid_2'=>$user_requester);
                $ret = $this->friend_relationshipModel->addFriendRelationship($options);
                if (is_bool($ret)) {
                    $success = 0;
                } else {
                    // add notifi accepted ke user yang nge request
                    $notify = $user_name." has accepted your friend request.";
                    $options = array('userid_to'=>$user_requester,'message'=>$notify);
                    $addNotify = $this->notificationModel->addNotification($options);
                    $success = 1;
                    $message = "You have accepted ".$getUser[0]->name."'s friend request.";
                }
            } else {
                // add notifi rejected ke user yang nge request
                $notify = $user_name." has rejected your friend request.";
                $options = array('userid_to'=>$user_requester,'message'=>$notify);
                $addNotify = $this->notificationModel->addNotification($options);
                $success = 1;
                $message = "You have rejected ".$getUser[0]->name."'s friend request.";
            }
            // remove record dari tabel friend request
            $options = array('id'=>$id_request);
            $deleteRequest = $this->friend_requestModel->deleteFriendRequest($options);
            if (is_bool($deleteRequest)) {
                $success = 0;
                $message = "error deleting friend request";
            }
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('success' => $success, 'message'=>$message)));
    }
        
    
    function search() {
        $user_id = $this->session->userdata('user_id');
        
        // get data from form
        $search_name = $this->input->post('name');
        $search_year = $this->input->post('year');
        $interest = $this->input->post('interest');
        $major = $this->input->post('major');
        
        /*// load database
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
                    'name LIKE' => $search_name,
                    'columnSelect' => 'id'
                );
                $getUserByNameAndYear = $this->userModel->getUsers($option);
            } else {
                //cari berdasarkan nama dan tahun
                $option = array(
                    'name LIKE' => $search_name,
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
        }*/
        
        $data['search_results'] = $this->search_result($user_id, $search_name, $search_year, $interest, $major);
        
        $data['title'] = 'Profile';
        $data['main_content'] = 'friend/search_friend_result_view';
        $data['struktur'] = $this->getStruktur2('Your Profile');
        $data['search_name'] = $search_name;
        $data['search_year'] = $search_year;
        $data['interest'] = $interest;
        $data['major'] = $major;
        $data['body_id'] = 'find_friend_body';
        
        $this->load->view('includes/template',$data);
    }
    
    function search_result($user_id, $search_name, $search_year, $interest, $major) {
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
                    'name LIKE' => $search_name,
                    'columnSelect' => 'id'
                );
                $getUserByNameAndYear = $this->userModel->getUsers($option);
            } else {
                //cari berdasarkan nama dan tahun
                $option = array(
                    'name LIKE' => $search_name,
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
        
        //$data['search_results'] = array();
        $search_results = array();
        
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
                //$data['search_results'][] = $elmt;
                $search_results[] = $elmt;
            }
        }
        return $search_results;
        //echo json_encode($search_results);
    }

    function getStruktur($name) {
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
                'label'=>$name
            )
        );
        return $struktur;
    }
    function getStruktur2() {
        $struktur = array (
            array('islink'=>1,
                'link'=>'home',
                'label'=>'Home'),
            array (
                'islink'=>1,
                'link'=>'friend',
                'label'=>'Find A Friend'
            ),
            array(
                'islink'=>0,
                'label'=>'Search Result'
            )
        );
        return $struktur;
    }
    
    function getStruktur3() {
        $struktur = array (
            array('islink'=>1,
                'link'=>'home',
                'label'=>'Home'),
            array (
                'islink'=>0,
                'label'=>'Find A Friend'
            )
        );
        return $struktur;
    }
}

?>
