<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of message
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
class Tes extends CI_Controller {

    function index() {
        $tos = array();
        /* $ar1 = array('value' => "jquery",
                'label' => "jQuery",
                'desc' => "the write less, do more, JavaScript library",
                'icon' => "jquery_32x32.png");
        
        $ar2 = array('value' => "jquery-ui",
                'label' => "jQuery UI",
                'desc' => "the official user interface library for jQuery",
                'icon' => "jqueryui_32x32.png");

        $ar3 = array('value' => "sizzlejs",
                'label' => "Sizzle JS",
                'desc' => "a pure-JavaScript CSS selector engine",
                'icon' => "sizzlejs_32x32.png");              
    
        $tos[] = $ar1;
        $tos[] = $ar2;
        $tos[] = $ar3; */
        
        $result = array();
        $friend = array();
        $friend['oke'] = 'oke';
        $friend['dodol'] = 'dodol';
        $result[0] = $friend;
        $friend2 = array();
        $friend2['oke'] = 'oke2';
        $friend2['dodol'] = 'dodol2';
        $result[1] = $friend2;
        $result[2] = $friend;
        $result[3] = $friend2;
        print_r($result);
        $unik = array_unique($result, SORT_REGULAR);
        echo br(5);
        print_r($unik);
        /* $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($friends)); */
        //return json_encode($friends);
        //return json_encode($tos);
        //echo array_to_json($friend);
    }

}

?>