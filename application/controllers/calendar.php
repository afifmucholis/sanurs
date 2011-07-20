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
        $this->load->model('event_model', 'eventModel');
        $options = array();
        $getAllEvents = $this->eventModel->getEvents($options);

        $sortby = $this->input->post('sortby');
        $result = array();

        if ($sortby == 'all_events') {
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
        } else if ($sortby == 'rsvp_ed') {
            //Dapetin userid :
            $userid = $this->session->userdata('user_id');

            //Dapetin semua event di rsvp_event yang user_id = $userid dan status_rsvp_id = attending
            //Butuh model rsvp_event ma rsvp_status :
            $this->load->model('rsvp_event', 'rsvpModel');
            $this->load->model('rsvp_status', 'rsvpStatusModel');

            //Get id status dari label attending :
            $optionStatusAttending = array('label' => 'Attending');
            $getStatusAttending = $this->rsvpStatusModel->getRSVPStatuses($optionStatusAttending);
            $idStatusAttending = $getStatusAttending[0]->id;

            //Query ke rsvpModel :
            $optionRSVPAttendingEvent = array('user_id' => $userid, 'status_rsvp_id' => $idStatusAttending);
            $getAttendingEvent = $this->rsvpModel->getRSVPEvent($optionRSVPAttendingEvent);

            if (!is_bool($getAttendingEvent)) {
                for ($i = 0; $i < count($getAttendingEvent); ++$i) {
                    $event = array();
                    $eventid = $getAttendingEvent[$i]->id;

                    $optionEventDetail = array('id' => $eventid);
                    $getEventDetail = $this->eventModel->getEvents($optionEventDetail);

                    $event['id'] = $getAttendingEvent[$i]->id;
                    $event['title'] = $getEventDetail[0]->title;
                    $event['description'] = $getEventDetail[0]->description;
                    $event['start'] = $getEventDetail[0]->start_time;
                    $event['where'] = $getEventDetail[0]->venue;
                    $event['category_event_id'] = $getEventDetail[0]->category_event_id;
                    $event['image_url'] = $getEventDetail[0]->image_url;
                    $result[$i] = $event;
                }
            } else {
                //Do nothing, kirim kosong aje
            }
            echo json_encode($result);
        }
    }
}

?>
