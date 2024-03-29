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
        $data['struktur'] = $this->_getStruktur();
        $data['body_id'] = 'sign_in_body';
        $fl = $this->session->flashdata('message');
        if ($fl!='')
            $data['message'] = $fl;
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
            $message = 'Email and password do not match.';
            $this->session->set_flashdata('message', $message);
            redirect('/sign_in', 'refresh');
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
                show_error('More than 1 user with the same email.');
            }      
        }

    }
    
    function sign_out() {
        $session_data = array (
            'email' => '',
            'name' => '',
            'user_id' => '',
            'isadmin' => 0
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
            $message2['message'] = 'The email '.$email.' does not match with the birthdate '.$birthdate.br(1).'Click '.anchor('sign_in','here').' to try again.';
        } else {
            $new_password = $this->_createRandomPassword(7);
            $new_password_hash = md5($new_password);
            $options = array('id'=>$getUsers[0]->id,'password'=>$new_password_hash);
            $updateUsers = $this->userModel->updateUser($options);
            if (is_bool($updateUsers)) {
                // error
                $message2['status'] = 'Reset Password - Error';
                $message2['message'] = 'We�re sorry, there are currently some errors in our database.'.br(1).'Click '.anchor('sign_in','here').' to try again.';
            } else {
                // send email to user
                $this->load->library('email');
				$config['wordwrap'] = TRUE;
				$config['priority'] = 1;
				$config['mailtype'] = 'html';

				$this->email->initialize($config);
                $this->email->from('no-reply', 'Admin Santa Ursula Alumni Website');
                $this->email->to($email);
                $this->email->subject('Random Password');
                $message = 'Dear '.$getUsers[0]->name.',<br/> You have requested password reset. Please login using the password below:<br/><h3><b>'.$new_password.'</b></h3><br/>Note : this is a randomly generated/assigned password. After you have successfully logged in, please change this password to protect your security.';
                
                $this->email->message($message);

                if (!$this->email->send()) {
                   $message2['status'] = 'Reset Password - Error';
                   $message2['message'] = 'The password failed to be sent to your email.'.br(1).'Click '.anchor('sign_in','here').' to try to reset password again.';
                } else {
                    $message2['status'] = 'Reset Password - Success';
                    $message2['message'] = 'We have sent a randomly generated/assigned password to '.$email.', please check your email and sign in again using the password.';
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
    
    function _getStruktur() {
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
