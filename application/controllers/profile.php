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
