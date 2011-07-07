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
        $data['main_content'] = 'my_profile_view';
        $data['struktur'] = $this->getStruktur('Your Profile');
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
        
        $data['user_data'] = array(
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
        );
        
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
//        if ($this->session->userdata('name')==null) {
//            redirect('/home', 'refresh');
//        }
        $array = $this->uri->uri_to_assoc(2);
        $user_id = $array['user'];
        
        // get user profile info yang bisa ditampilkan saja
        $name = 'Levana Laksmicitra Sani';
        $email = 'aaaa';
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
        $working_experience = array();
        
        $data['user_data'] = array(
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
        );
        $data['title'] = 'Profile - '.$name;
        $data['main_content'] = 'show_profile_view';
        $data['struktur'] = $this->getStruktur($name);
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
        $data['main_content'] = 'edit_profile_view';
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
        $data['main_content'] = 'edit_location_view';
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
        $data['main_content'] = 'edit_education_view';
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
        $data['main_content'] = 'edit_working_view';
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
        $text = $this->load->view('work_form',$data,true);
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
        $data['main_content'] = 'edit_visibility_view';
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
