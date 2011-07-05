<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of testClass
 *
 * @author user
 */
class Home extends CI_Controller {
    function index() {
        $data['title'] = 'Home';
        $data['main_content'] = 'home_view';
        $this->load->view('includes/template',$data);
    }
    
}

?>
