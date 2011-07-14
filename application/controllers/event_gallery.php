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
            //Ini nanti ngelempar link2 dari image event  
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array(
                                array(
                                    'thumb' => base_url() . 'res/event/1.jpg',
                                    'image' => base_url() . 'res/event/1.jpg',
                                    'big' => base_url() . 'res/event/1.jpg',
                                    'title' => 'My title',
                                    'description' => 'My description',
                                    'link' => 'http://my.destination.com'
                                ),
                                array(
                                    'thumb' => base_url() . 'res/event/2.jpg',
                                    'image' => base_url() . 'res/event/2.jpg',
                                    'big' => base_url() . 'res/event/1.jpg',
                                    'title' => 'My title',
                                    'description' => 'My description'
                                //link: 'http://my.destination.com'
                                ),
                                array(
                                    'thumb' => base_url() . 'res/event/3.jpg',
                                    'image' => base_url() . 'res/event/3.jpg',
                                    'big' => base_url() . 'res/event/1.jpg',
                                    'title' => 'My title',
                                    'description' => 'My description'
                                //link: 'http://my.destination.com'
                                ),
                                array(
                                    'thumb' => base_url() . 'res/event/4.jpg',
                                    'image' => base_url() . 'res/event/4.jpg',
                                    'big' => base_url() . 'res/event/1.jpg',
                                    'title' => 'My title',
                                    'description' => 'My description'
                                //link: 'http://my.destination.com'
                                ),
                                array(
                                    'thumb' => base_url() . 'res/event/5.jpg',
                                    'image' => base_url() . 'res/event/5.jpg',
                                    'big' => base_url() . 'res/event/1.jpg',
                                    'title' => 'My title',
                                    'description' => 'My description'
                                //link: 'http://my.destination.com'
                                ),
                                array(
                                    'thumb' => base_url() . 'res/event/6.jpg',
                                    'image' => base_url() . 'res/event/6.jpg',
                                    'big' => base_url() . 'res/event/1.jpg',
                                    'title' => 'My title',
                                    'description' => 'My description'
                                //link: 'http://my.destination.com'
                                ),
                                array(
                                    'thumb' => base_url() . 'res/event/7.jpg',
                                    'image' => base_url() . 'res/event/7.jpg',
                                    'big' => base_url() . 'res/event/1.jpg',
                                    'title' => 'My title',
                                    'description' => 'My description'
                                //link: 'http://my.destination.com'
                                ),
                                array(
                                    'thumb' => base_url() . 'res/event/8.jpg',
                                    'image' => base_url() . 'res/event/8.jpg',
                                    'big' => base_url() . 'res/event/1.jpg',
                                    'title' => 'My title',
                                    'description' => 'My description'
                                //link: 'http://my.destination.com'
                                )
                            )));
        } else if ($sortby == 'number') {
            $this->load->model('rsvp_event', 'rsvpModel');
            $this->load->model('rsvp_status', 'rsvpStatusModel');


            //GET ID RSVP yang Attending
            $optionsRSVPStatus = array('label' => 'Attending');
            $getIDRSVP = $this->rsvpStatusModel->getRSVPStatuses($optionsRSVPStatus);
            $idRSVP = $getIDRSVP[0]->id;

            //Get rsvpModel yang status_rsvp_id = $idRSVP (Attending), di groupBy event_id
            $optionsRSVP = array('status_rsvp_id' => $idRSVP, 'groupBy' => 'event_id', 'columnSelect' => 'event_id, COUNT(event_id) as event_number');
            //print_r($optionsRSVP);
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
                $event['thumb'] = base_url() . $getEventUpcoming[0]->image_url;
                $event['image'] = base_url() . $getEventUpcoming[0]->image_url;
                $event['big'] = base_url() . $getEventUpcoming[0]->image_url;
                $event['title'] = $getEventUpcoming[0]->title;
                $event['description'] = $getEventUpcoming[0]->description;

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