<?php 
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profile
 *
 * @author user
 */
/** * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 */
class profile extends CI_Controller {
    function index() {
        if ($this->session->userdata('name')==null) {
            redirect('/home', 'refresh');
        }
        $data['title'] = 'Profile';
        $data['main_content'] = 'profile/my_profile_view';
        $data['struktur'] = $this->getStruktur('Your Profile');
        // get user profile info
        $user_id = $this->session->userdata('user_id');
        
        $data['user_data'] = $this->setUserData($user_id);
        
        $this->load->view('includes/template',$data);
    }
    
    /**
     * user()
     *
     * Menampilkan profile seorang user
     *
     * @param int user User_id passing melalui url uri
     */
    function user() {
        $array = $this->uri->uri_to_assoc(2);
        $user_id = $array['user'];
        if ($this->session->userdata('user_id')==$user_id) { // cek apakah dia melihat profilnya sendiri
            redirect('/profile', 'refresh');
        }
        
        $data['user_data'] = $this->setUserData($user_id);
        $data['title'] = 'Profile - '.$data['user_data']['name'];
        $data['main_content'] = 'profile/show_profile_view';
        $data['struktur'] = $this->getStruktur($data['user_data']['name']);
        // cek apakah bisa add friend
        if ($this->session->userdata('name')==null) {   // belum sign in
            $data['add_as_friend'] = 0;
        } else if (false) {     // cek apakah sudah friend atau belum
            $data['add_as_friend'] = 0;
        } else {
            $data['add_as_friend'] = 1;
        }
        $this->load->view('includes/template',$data);
        
    }
    
    /**
     * editProfile()
     *
     * menampilkan halaman edit user profile
     *
     */
    function editProfile() {
        $data['title'] = 'Edit your profile ';
        $data['main_content'] = 'edit_profile/edit_profile_view';
        $data['struktur'] = $this->getStruktur('Edit your profile');
        
        $this->load->view('includes/template',$data);
    }
    
    /**
     * submitProfile()
     *
     * mengganti data profile user
     *
     * @param string post->gender gender dari user
     * @param string post->ttl ttl dari user
     * @param string post->alamat alamat dari user
     * @param string post->telfon telfon dari user
     * @param string post->hp hp dari user
     * @param string post->email email dari user
     * @param string post->url_img url_img profpic
     */
    function submitProfile() {
        $gender = $this->input->post('gender');
        $ttl = $this->input->post('ttl');
        $alamat = $this->input->post('alamat');
        $telfon = $this->input->post('telfon');
        $hp = $this->input->post('hp');
        $email = $this->input->post('email');
        $url_img = $this->input->post('url_img');
        // proses data disini
        
        // redirect ke editLocation
        redirect('profile/editLocation', 'refresh');
    }
    
    /**
     * editLocation()
     *
     * menampilkan halaman edit Location
     *
     */
    function editLocation() {
        $data['title'] = 'Edit your profile';
        $data['main_content'] = 'edit_profile/edit_location_view';
        $data['struktur'] = $this->getStruktur('Edit your profile');
        
        $this->load->view('includes/template',$data);
    }
    
    /**
     * submitLocation()
     *
     * mengirimkan lokasi dari user
     *
     * @param string post->location lokasi_user
     */
    function submitLocation() {
       $location = $this->input->post('location');
       // proses data
       
       // redirect ke editPendidikan
       redirect('profile/editPendidikan', 'refresh');
    }
    
    /**
     * editPendidikan()
     *
     * menampilkan halaman edit pendidikan
     *
     */
    function editPendidikan() {
        $data['title'] = 'Edit your profile';
        $data['main_content'] = 'edit_profile/edit_education_view';
        $data['struktur'] = $this->getStruktur('Edit your profile');
        
        $this->load->view('includes/template',$data);
    }
    
    /**
     * submitPendidikan
     *
     * mengubah history pendidikan user
     *
     * @param string post->s1 college/university
     * @param string post->s1_major major s1
     * @param string post->s1_minor minor s1
     * @param string post->s1_year graduation year
     */
    function submitPendidikan() {
        $highest_edu = $this->input->post('highest_edu');
        if ($highest_edu=='sma') {
            
        } else if ($highest_edu=='d3') {
            
        } else if ($highest_edu=='s1') {
            
        } else if ($highest_edu=='s2') {
            
        } else if ($highest_edu=='s3') {
            
        }
        // redirect ke editPendidikan
       redirect('profile/editWorking', 'refresh');
    }
    
    /**
     * editWorking()
     *
     * menampilkan halaman edit working
     *
     */
    function editWorking() {
        $data['title'] = 'Edit your profile';
        $data['main_content'] = 'edit_profile/edit_working_view';
        $data['struktur'] = $this->getStruktur('Edit your profile');
        
        $this->load->view('includes/template',$data);
    }
    
    /**
     * add_working_field()
     *
     * menambahkan field form working experience
     *
     */
    function add_working_field() {
        $data = array(
            'counter' => ($this->input->post('counter')+1)
        );
        $text = $this->load->view('edit_profile/work_form',$data,true);
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('text' => $text, 'counter'=>$data['counter'])));
    }
    
    /**
     * submitWorking()
     *
     * memasukkan data working experience/current working
     *
     * @param int post->counter jumlah field yang diisi
     */
    function submitWorking() {
        $counter = $this->input->post('counter');
        
        // redirect ke editVisibility
       redirect('profile/editVisibility', 'refresh');
    }
    
    /**
     * editVisibility()
     *
     * menampilkan halaman edit visibility keterangan2 yang bisa dilihat orang
     *
     */
    function editVisibility() {
        $data['title'] = 'Edit your profile';
        $data['main_content'] = 'edit_profile/edit_visibility_view';
        $data['struktur'] = $this->getStruktur('Edit your profile');
        
        $this->load->view('includes/template',$data);
    }
    
    /**
     * submitVisibility
     *
     * mengganti status visibility setiap info user yang dapat dilihat
     *
     */
    function submitVisibility() {
        
        // redirect ke editVisibility
       redirect('profile', 'refresh');
    }
    
    /**
     * setUserData($user_id)
     *
     * mengembalikan data2 user yang akan ditampilkan pada profile user
     *
     * @param int $user_id user_id dari user
     */
    function setUserData($user_id) {
        //Load model user
        $this->load->model('user', 'userModel');
        $options = array('id'=>$user_id);
        $getUser = $this->userModel->getUsers($options);
        if (!$getUser) { // error
            redirect('/home', 'refresh');
        }
        // load visibility status
        $this->load->model('visibility_status', 'visModel');
        $visibility_res = $this->visModel->getVisibilityStatuses(array('user_id'=>$user_id));
        $visibility = $visibility_res[0];
        
        $name = $getUser[0]->name;
        $surname = $getUser[0]->surname;
        $home_address = $getUser[0]->home_address;
        $home_telephone = $getUser[0]->home_telephone;
        $handphone = $getUser[0]->handphone;
        $email = $getUser[0]->email;
        $image = $getUser[0]->profpict_url;
        if ($image=="")
            $image = './res/default.jpg';
        $tahun_kelulusan= $getUser[0]->graduate_year;
        // load model unit
        $this->load->model('unit', 'unitModel');
        $options = array('id'=>$getUser[0]->last_unit_id);
        $getUnitLabel = $this->unitModel->getUnits($options);
        $kelulusan= $getUnitLabel[0]->label.' St. Ursula';
        // load model pendidikan
        $this->load->model('education', 'eduModel');
        $options = array('user_id'=>$user_id,'sortBy'=>'graduate_year','sortDirection'=>'desc');
        $getPendidikan = $this->eduModel->getEducations($options);
        $pendidikan = array();
        if ($getPendidikan) {
            // load model level
            $this->load->model('level', 'levelModel');
            $count = 0;
            $year = date('Y');
            foreach ($getPendidikan as $edu) :
                if ($edu->graduate_year>$year) $current=1; else $current=0;
                $options = array('id'=>$edu->level_id);
                $degree = $this->levelModel->getLevels($options);
                $pendidikan[$count] = array (
                    'degree' => $degree[0]->label,
                    'where' => $edu->school,
                    'major' => $edu->major,
                    'minor' => $edu->minor,
                    'current' => $current
                );
                $count++;
            endforeach;
        }
        
        // load model interest_in
        $this->load->model('interested_in', 'interestInModel');
        $options = array('user_id'=>$user_id);
        $getInterestIn = $this->interestInModel->getInterestedIn($options);
        $interest = array ();
        // load model interest_in
        $this->load->model('interest', 'interestModel');
        if ($getInterestIn) {
            $count=0;
            foreach ($getInterestIn as $itr) :
                $options = array('id' => $itr->interest_id);
                $getInterest = $this->interestModel->getInterests($options);
                $interest[$count] = $getInterest[0]->interest;
                $count++;
            endforeach;
        }
        
        // load model work_experience
        $this->load->model('work_experience', 'workModel');
        $options = array('user_id'=>$user_id);
        $getWork = $this->workModel->getWorkExperiences($options);
        $working_experience = array();
        if ($getWork) {
            $count=0;
            foreach ($getWork as $work):
                $working_experience[$count] = array (
                    'company' => $work->company,
                    'year' => $work->year,
                    'position' => $work->position,
                    'address' => $work->address,
                    'telephone' => $work->telephone,
                    'fax' => $work->fax,
                    'work_hp' => $work->work_hp,
                    'work_email' => $work->work_email,
                    'is_current_work' => $work->is_current_work
                );
                $count++;
            endforeach;
        }
        
        $calendar= 'Ini calendar';
        
        $user_data = array(
            'user_id'=>$user_id,
            'name' => $name,
            'surname' => $surname,
            'home_address' => $home_address,
            'home_telephone' => $home_telephone,
            'handphone' => $handphone,
            'email' => $email,
            'image' => $image,
            'calendar' => $calendar,
            'kelulusan' => $kelulusan,
            'tahun_kelulusan' => $tahun_kelulusan,
            'pendidikan' => $pendidikan,
            'interest' => $interest,
            'working_experience' => $working_experience,
            'visibility'=>$visibility
        );
        return $user_data;
    }


    function getStruktur($name) {
        $struktur = array (
            array (
                'islink'=>1,
                'link'=>'home',
                'label'=>'Home'
            ),
            array (
                'islink'=>0,
                'label'=>$name
            )
        );
        return $struktur;
    }
    
}

?>
