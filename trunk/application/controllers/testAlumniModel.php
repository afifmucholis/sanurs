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
class TestAlumniModel extends CI_Controller {
    function index() {
        $this->load->model('alumni', 'tes');
        $alumni = array(
            'name' => 'Danang Dodol',
            'birthdate' => date("Y-m-d"),
            'last_unit_id' => 2,
            'graduate_year' => 2010,
            'is_registered' => 1
        );
        $get = $this->tes->addAlumni($alumni);
        if (is_bool($get)) {
            echo 'salah dudul';
        } else {
            echo 'insert berhasil. id : '.$get ;
        }
        
    }
    
}

?>
