<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of friend
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
class friend extends CI_Controller {
    
    /**
     * index()
     *
     * menampilkan halaman find a friend
     *
     */
    function index() {
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
        $search_name = $this->input->post('name');
        $search_year = $this->input->post('year');
        $interest = $this->input->post('interest');
        
        $data['title'] = 'Profile';
        $data['main_content'] = 'friend/search_friend_result_view';
        $data['struktur'] = $this->getStruktur2('Your Profile');
        $data['search_name'] = $search_name;
        $data['search_year'] = $search_year;
        $data['interest'] = $interest;
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
        );

        
        $this->load->view('includes/template',$data);
        
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
