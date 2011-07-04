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
class testClass extends CI_Controller {
    function index() {
        $data['title'] = 'tes';
        $data['main_content'] = 'home_view';
        $this->load->view('includes/template',$data);
    }
    
}

?>
