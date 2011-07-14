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
        $this->load->model('Event_Model', 'eventModel');
        $options = array();
        $getAllEvents = $this->eventModel->getEvents($options);

        $result = array();
        for ($i = 0; $i < count($getAllEvents); ++$i) {
            $event = array();
            $event['id'] = $getAllEvents[$i]->id;
            $event['title'] = $getAllEvents[$i]->title;
            $event['description'] = $getAllEvents[$i]->description;
            $event['start'] = $getAllEvents[$i]->start_time;
            $event['where'] = $getAllEvents[$i]->venue;
            $event['category_event_id'] = $getAllEvents[$i]->category_event_id;
            $event['image_url'] = $getAllEvents[$i]->image_url;
            $result[$i] = $event;
        }

        echo json_encode($result);
    }

}

?>
