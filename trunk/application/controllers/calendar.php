<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of calendar
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
class Calendar extends CI_Controller {

    function index() {
        $year = date('Y');
        $month = date('m');

        echo json_encode(array(
            array(
                'id' => 111,
                'title' => "Jalan-jalan ke Trans Studio",
                'start' => "$year-$month-10",
                'url' => "http://yahoo.com/",
                'location' => "Bandung"
            ),
            array(
                'id' => 222,
                'title' => "Jalan-jalan ke Dufan",
                'start' => "$year-$month-20",
                'url' => "http://yahoo.com/",
                'location' => "Jakarta"
            ),
            array(
                'id' => 22,
                'title' => "Jalan-jalan ke Duf",
                'start' => "$year-$month-20",
                'url' => "http://yahoo.com/",
                'location' => "Jakarta"
            )
        ));
    }
}
?>
