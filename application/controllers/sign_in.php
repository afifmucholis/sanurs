<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sign_in
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
class Sign_in extends CI_Controller {
    function index() {
        $data['title'] = 'Sign In';
        $data['main_content'] = 'sign_in_view';
        $data['struktur'] = $this->getStruktur();
        $this->load->view('includes/template',$data);
    }
    
    /**
     * Submit form sign in
     *
     * Mengecek user yang sign in
     *
     * @param string post->email email user untuk sign in
     * @param string post->password password user
     */
    function submit() {
        $session_data = array (
            'email' => $this->input->post('email'),
            'name' => 'Danang Tri Massandy',
            'user_id' => 777
        );
        $this->session->set_userdata($session_data);
        redirect('/home', 'refresh');
    }
    
    function sign_out() {
        $session_data = array (
            'email' => '',
            'name' => ''
        );
        $this->session->unset_userdata($session_data);
        redirect('/home', 'refresh');
    }
    
    function getStruktur() {
        $struktur = array (
            array (
                'islink'=>1,
                'link'=>'home',
                'label'=>'Home'
            ),
            array (
                'islink'=>0,
                'label'=>'Sign in'
            )
        );
        return $struktur;
    }
}

?>
