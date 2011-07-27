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
    
    function forget(){
        $email = $this->input->post('email');
        $birthdate = $this->input->post('birthdate');
        // load user model
        $this->load->model('user','userModel');
        $options = array('email'=>$email,'birthdate'=>$birthdate);
        $getUsers = $this->userModel->getUsers($options);
        $message2 = array();
        if (is_bool($getUsers)) {
            // error
            $message2['status'] = 'Reset Password - Error';
            $message2['message'] = 'No user with email '.$email.' and birthdate '.$birthdate.br(1).'Click '.anchor('sign_in','here').' to try sign in again.';
        } else {
            $new_password = $this->_createRandomPassword(7);
            $new_password_hash = md5($new_password);
            $options = array('id'=>$getUsers[0]->id,'password'=>$new_password_hash);
            $updateUsers = $this->userModel->updateUser($options);
            if (is_bool($updateUsers)) {
                // error
                $message2['status'] = 'Reset Password - Error';
                $message2['message'] = 'Something error with our database.'.br(1).'Click '.anchor('sign_in','here').' to try sign in again.';
            } else {
                // send email to user
                $this->load->library('email');

                $this->email->from('no-reply', 'Admin web sanur');
                $this->email->to($email);
                $this->email->subject('Santa Ursula Alumni WebSite - Email Verification');
                $message = 'Dear '.$getUsers[0]->name.', \n'.'You have requested password reset. Now you can login using the password below.\n'.'Password : '.$new_password.'\n'.'Note : please change this random password to protect your security.';
                
                $this->email->message($message);

                if (!$this->email->send()) {
                   $message2['status'] = 'Reset Password - Error';
                   $message2['message'] = 'Email can\'t be sent to your email.'.br(1).'Click '.anchor('sign_in','here').' to try sign in again.';
                } else {
                    $message2['status'] = 'Reset Password - Success';
                    $message2['message'] = 'We have send a random generated password to '.$email.', please check your email and sign in again using that password.'.$new_password;
                }
            }
        }
        
        $message2['page_before'] = 'Sign In';
        $message2['page_link'] = 'sign_in';
        // redirect ke info view
        $this->session->set_flashdata('message', $message2);
        redirect('info/show','refresh');
    }
    
    /** 
 * The letter l (lowercase L) and the number 1 
 * have been removed, as they can be mistaken 
 * for each other. 
 */ 

    function _createRandomPassword($length) { 
        $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
        srand((double)microtime()*1000000); 
        $i = 0; 
        $pass = '' ; 

        while ($i < $length) { 
            $num = rand() % 33; 
            $tmp = substr($chars, $num, 1); 
            $pass = $pass . $tmp; 
            $i++; 
        } 

        return $pass; 

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
