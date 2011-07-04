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
class Sign_in extends CI_Controller {
    function index() {
        $data['title'] = 'Sign In';
        $data['main_content'] = 'sign_in_view';
        $data['struktur'] = $this->getStruktur();
        $this->load->view('includes/template',$data);
    }
    function submit() {
        
    }
    function getStruktur() {
        $struktur = array (
            array (
                'islink'=>1,
                'link'=>'testClass',
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
