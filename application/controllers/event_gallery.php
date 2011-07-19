<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of event_gallery
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
class Event_Gallery extends CI_Controller {

    function index() {
        //Event bisa disort berdasarkan : categories, number of people attending, upcoming event
        $sortby = $this->input->post('sortby');
        $result = array();

        //Load model event
        $this->load->model('event_model', 'eventModel');

        if ($sortby == 'categories') {
            //Category dapet dari post data, ini udah id
            $category = $this->input->post('category');

            $optionCategory = array('category_event_id' => $category);
            $getEventCategory = $this->eventModel->getEvents($optionCategory);

            //Iterasi hasil query :
            for ($i = 0; $i < count($getEventCategory); ++$i) {
                ///Isi ke array hasil
                $event = array();
                $event['thumb'] = base_url() . $getEventCategory[$i]->image_url;
                $event['image'] = base_url() . $getEventCategory[$i]->image_url;
                $event['big'] = base_url() . $getEventCategory[$i]->image_url;
                $event['title'] = $getEventCategory[$i]->title;
                $event['description'] = $getEventCategory[$i]->description;
                $event['link'] = base_url() . 'index.php/event/show_event/' . $getEventCategory[$i]->id;

                //Isi $event ini ke array $result
                $result[$i] = $event;
            }
            //Kirim result
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($result));
        } else if ($sortby == 'number') {
            $this->load->model('rsvp_event', 'rsvpModel');
            $this->load->model('rsvp_status', 'rsvpStatusModel');


            //GET ID RSVP yang Attending
            $optionsRSVPStatus = array('label' => 'Attending');
            $getIDRSVP = $this->rsvpStatusModel->getRSVPStatuses($optionsRSVPStatus);
            $idRSVP = $getIDRSVP[0]->id;

            //Get rsvpModel yang status_rsvp_id = $idRSVP (Attending), di groupBy event_id
            $optionsRSVP = array('status_rsvp_id' => $idRSVP, 'groupBy' => 'event_id', 'columnSelect' => 'event_id, COUNT(event_id) as event_number');
            $getEventAndCount = $this->rsvpModel->getRSVPEvent($optionsRSVP);

            //Iterasi hasil event dan countnya buat dapet deskripsi di tabel event
            for ($i = 0; $i < count($getEventAndCount); ++$i) {
                $eventid = $getEventAndCount[$i]->event_id;
                $number_attending = $getEventAndCount[$i]->event_number;

                //Query detail event dengan id = $event_id
                $optionEvent = array('id' => $eventid);
                $getEvent = $this->eventModel->getEvents($optionEvent);

                //Isi ke array hasil query detail event
                $event = array();
                $event['thumb'] = base_url() . $getEvent[0]->image_url;
                $event['image'] = base_url() . $getEvent[0]->image_url;
                $event['big'] = base_url() . $getEvent[0]->image_url;
                $event['title'] = $getEvent[0]->title;
                $event['description'] = $getEvent[0]->description;
                $event['link'] = base_url() . 'index.php/event/show_event/' . $getEvent[0]->id;

                //Isi $event ini ke array $result
                $result[$i] = $event;
            }
            //Kirim result
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($result));
        } else if ($sortby == 'upcoming') {
            //dari eventModel ambil yang whennya belom :
            $today = time();
            $mysqldatetoday = date('Y-m-d H:i:s', $today);

            $optionUpcoming = array('start_time >' => $mysqldatetoday);
            $getEventUpcoming = $this->eventModel->getEvents($optionUpcoming);

            //Iterasi hasil query :
            for ($i = 0; $i < count($getEventUpcoming); ++$i) {
                ///Isi ke array hasil
                $event = array();
                $event['thumb'] = base_url() . $getEventUpcoming[$i]->image_url;
                $event['image'] = base_url() . $getEventUpcoming[$i]->image_url;
                $event['big'] = base_url() . $getEventUpcoming[$i]->image_url;
                $event['title'] = $getEventUpcoming[$i]->title;
                $event['description'] = $getEventUpcoming[$i]->description;
                $event['link'] = base_url() . 'index.php/event/show_event/' . $getEventUpcoming[0]->id;

                //Isi $event ini ke array $result
                $result[$i] = $event;
                //Kirim result
                $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode($result));
            }
        } else {
            //Do nothing
        }
    }

}

?>