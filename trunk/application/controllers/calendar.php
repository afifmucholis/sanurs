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

        $sortby = $this->input->post('sortby');
        $result = array();

        if ($sortby == 'all_events') {
            //Disini ngehasilin semua event yang dibuat oleh semua temennya dan juga admin :
            //Dapetin list admin : 
            //Disini ngehasilin semua event yang dibuat oleh semua temennya dan juga admin :
        //Dapetin list admin : 
        $getAdminList = $this->_getAdminList();
        //Load host_event :
        $this->load->model('host_event', 'hostEventModel');
        //Dapetin semua event yang diaplot admin :
        $iteratorevent = 0;
        for ($i = 0; $i < count($getAdminList); ++$i) {
            $admin_id = $getAdminList[$i]->id;
            $optionHost = array('user_id' => $admin_id, 'columnSelect' => 'event_id');
            $getAllEventByThisAdmin = $this->hostEventModel->getHostEvents($optionHost);
            //Iterasi 1-1 eventnya :
            $numEventByThisAdmin = 0;
            if (!is_bool($getAllEventByThisAdmin)) {
                $numEventByThisAdmin = count($getAllEventByThisAdmin);
            }
            for ($j = 0; $j < $numEventByThisAdmin; ++$j) {
                $event_id = $getAllEventByThisAdmin[$j]->event_id;
                //Dapetin detail event dengan id=$event_id
                $optionsEventDetail = array('id' => $event_id);
                $getEventDetail = $this->eventModel->getEvents($optionsEvent);
                $event = array();
                $event['id'] = $getEventDetail[0]->id;
                $event['title'] = $getEventDetail[0]->title;
                $event['description'] = $getEventDetail[0]->description;
                $event['start'] = $getEventDetail[0]->start_time;
                $event['where'] = $getEventDetail[0]->venue;
                $event['category_event_id'] = $getEventDetail[0]->category_event_id;
                $event['image_url'] = $getEventDetail[0]->image_url;
                $event['url'] = site_url('event/show_event/' . $event['id']);
                $result[$iteratorevent] = $event;
                ++$iteratorevent;
            }
        }
        $numevent_admin = $iteratorevent;


        //Dapetin list friend : 
        $getFriendList = $this->_getFriendList();
        //Load host_event :
        $this->load->model('host_event', 'hostEventModel');
        //Dapetin semua event yang diaplot friend :
        for ($i = 0; $i < count($getFriendList); ++$i) {
            $friend_id = $getFriendList[$i];
            $optionHost = array('user_id' => $friend_id, 'columnSelect' => 'event_id');
            $getAllEventByThisFriend = $this->hostEventModel->getHostEvents($optionHost);
            //Iterasi 1-1 eventnya :
            $numEventByThisFriend = 0;
            if (!is_bool($getAllEventByThisFriend)) {
                $numEventByThisFriend = count($getAllEventByThisFriend);
            }
            for ($j = 0; $j < $numEventByThisFriend; ++$j) {
                $event_id = $getAllEventByThisFriend[$j]->event_id;
                //Dapetin detail event dengan id=$event_id
                $optionsEventDetail = array('id' => $event_id);
                $getEventDetail = $this->eventModel->getEvents($optionsEventDetail);
                $event = array();
                $event['id'] = $getEventDetail[0]->id;
                $event['title'] = $getEventDetail[0]->title;
                $event['description'] = $getEventDetail[0]->description;
                $event['start'] = $getEventDetail[0]->start_time;
                $event['where'] = $getEventDetail[0]->venue;
                $event['category_event_id'] = $getEventDetail[0]->category_event_id;
                $event['image_url'] = $getEventDetail[0]->image_url;
                $event['url'] = site_url('event/show_event/' . $event['id']);
                $result[$numevent_admin] = $event;
                ++$numevent_admin;
            }
        }


            /*
              $options = array();
              $getAllEvents = $this->eventModel->getEvents($options);
              for ($i = 0; $i < count($getAllEvents); ++$i) {
              $event = array();
              $event['id'] = $getAllEvents[$i]->id;
              $event['title'] = $getAllEvents[$i]->title;
              $event['description'] = $getAllEvents[$i]->description;
              $event['start'] = $getAllEvents[$i]->start_time;
              $event['where'] = $getAllEvents[$i]->venue;
              $event['category_event_id'] = $getAllEvents[$i]->category_event_id;
              $event['image_url'] = $getAllEvents[$i]->image_url;
              $event['url'] = site_url('event/show_event/'.$event['id']);
              $result[$i] = $event;
              } */
            echo json_encode($result);
        } else if ($sortby == 'attending_rsvp') {
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
                    $eventid = $getAttendingEvent[$i]->event_id;

                    $optionEventDetail = array('id' => $eventid);
                    $getEventDetail = $this->eventModel->getEvents($optionEventDetail);

                    $event['id'] = $getAttendingEvent[$i]->event_id;
                    $event['title'] = $getEventDetail[0]->title;
                    $event['description'] = $getEventDetail[0]->description;
                    $event['start'] = $getEventDetail[0]->start_time;
                    $event['where'] = $getEventDetail[0]->venue;
                    $event['category_event_id'] = $getEventDetail[0]->category_event_id;
                    $event['image_url'] = $getEventDetail[0]->image_url;
                    $event['url'] = site_url('event/show_event/' . $event['id']);
                    $result[$i] = $event;
                }
            } else {
                //Do nothing, kirim kosong aje
            }
            echo json_encode($result);
        } else if ($sortby == 'not_attending_rsvp') {
            //Dapetin userid :
            $userid = $this->session->userdata('user_id');

            //Dapetin semua event di rsvp_event yang user_id = $userid dan status_rsvp_id = not attending
            //Butuh model rsvp_event ma rsvp_status :
            $this->load->model('rsvp_event', 'rsvpModel');
            $this->load->model('rsvp_status', 'rsvpStatusModel');

            //Get id status dari label attending :
            $optionStatusNotAttending = array('label' => 'Not Attending');
            $getStatusNotAttending = $this->rsvpStatusModel->getRSVPStatuses($optionStatusNotAttending);
            $idStatusNotAttending = $getStatusNotAttending[0]->id;

            //Query ke rsvpModel :
            $optionRSVPNotAttendingEvent = array('user_id' => $userid, 'status_rsvp_id' => $idStatusNotAttending);
            $getNotAttendingEvent = $this->rsvpModel->getRSVPEvent($optionRSVPNotAttendingEvent);

            if (!is_bool($getNotAttendingEvent)) {
                for ($i = 0; $i < count($getNotAttendingEvent); ++$i) {
                    $event = array();
                    $eventid = $getNotAttendingEvent[$i]->event_id;

                    $optionEventDetail = array('id' => $eventid);
                    $getEventDetail = $this->eventModel->getEvents($optionEventDetail);

                    $event['id'] = $getNotAttendingEvent[$i]->event_id;
                    $event['title'] = $getEventDetail[0]->title;
                    $event['description'] = $getEventDetail[0]->description;
                    $event['start'] = $getEventDetail[0]->start_time;
                    $event['where'] = $getEventDetail[0]->venue;
                    $event['category_event_id'] = $getEventDetail[0]->category_event_id;
                    $event['image_url'] = $getEventDetail[0]->image_url;
                    $event['url'] = site_url('event/show_event/' . $event['id']);
                    $result[$i] = $event;
                }
            } else {
                //Do nothing, kirim kosong aje
            }
            echo json_encode($result);
        }
    }

    function _getFriendList() {
        //Ngembaliin daftar friend dari $userid
        //$userid = $this->input->post('user_id');
        $userid = $this->session->userdata('user_id');

        //Get friend list dari $userid :
        $this->load->model('friend_relationship', 'friendRelationshipModel');
        $option1 = array('userid_1' => $userid);
        $option2 = array('userid_2' => $userid);

        $getFriend1 = $this->friendRelationshipModel->getFriendRelationships($option1);
        
        $numfriends1 = 0;
        if (!is_bool($getFriend1)) {
            $numfriends1 = count($getFriend1);
        }
        
        $getFriend2 = $this->friendRelationshipModel->getFriendRelationships($option2);
        $numfriends2 = 0; 
        if (!is_bool($getFriend2)) {
            $numfriends2 = count($getFriend2);
        }
        
        $friends = array();
        $numAllfriends = $numfriends1 + $numfriends2;

        if (!is_bool($getFriend1)) {
            for ($i = 0; $i < $numfriends1; ++$i) {
                $idfriend = $getFriend1[$i]->userid_2;
                $friends[$i] = $idfriend;
            }
        }

        if (!is_bool($getFriend2)) {
            for ($i = $numfriends1; $i < $numAllfriends; ++$i) {
                $idfriend = $getFriend2[$i - $numfriends1]->userid_1;
                $friends[$i] = $idfriend;
            }
        }
        return $friends;
    }

    function _getAdminList() {
        $this->load->model('user', 'userModel');
        $option = array('status_admin' => 1, 'columnSelect' => 'id');
        $getAdmin = $this->userModel->getUsers($option);

        return $getAdmin;
    }
}

?>
