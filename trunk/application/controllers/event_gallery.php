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
    }
}

?>
