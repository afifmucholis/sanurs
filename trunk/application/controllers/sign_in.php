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
        $data['main_content'] = 'sign_in/sign_in_view';
        $data['struktur'] = $this->getStruktur();
        $data['body_id'] = 'sign_in_body';
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
        //Get data from view :
        $email  =  $this->input->post('email');
        $password  =  $this->input->post('password');
        
        //Load model
        $this->load->model('user', 'userModel');
        
        //Authenticate User:
        $options = array('email' => $email, 'password' => $password);
        $getReturn = $this->userModel->getUsers($options);
        if (is_bool($getReturn) && !$getReturn) {
            //Login gagal, gak ada user yang memenuhi
            redirect('/home', 'refresh');
        } else {
            //Authenticate success
            //Cek, kali aja ada yang 1 imel buat banyak akun:
            if (count($getReturn)==1) {
                //Sign In OK
                $session_data = array (
                    'email' => $getReturn[0]->email,
                    'name'  => $getReturn[0]->name,
                    'user_id' => $getReturn[0]->id,
                    'isadmin' => $getReturn[0]->status_admin
                );
                $this->session->set_userdata($session_data);
                redirect('/home', 'refresh');
            } else {
                //Sign In Not OK, ada 1 imel yang daftarin lebih dari 1 akun
                redirect('/home', 'refresh');
            }      
        }

    }
    
    function sign_out() {
        $session_data = array (
            'email' => '',
            'name' => '',
            'user_id' => ''
        );
        $this->session->unset_userdata($session_data);
        redirect('/home', 'refresh');
    }
    
    function show_forget() {
        
    }
    
    function forget(){
        $message2['status'] = 'Forget Password';
        $message2['message'] = 'We have send a random generated password to your email, please check your email';
        
        $message2['page_before'] = 'Sign In';
        $message2['page_link'] = 'sign_in';

        // redirect ke info view
        $this->session->set_flashdata('message', $message2);
        redirect('info/show','refresh');
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
