<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of event
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
class Event extends CI_Controller {

    function __construct() {
        parent::__construct();
        //load model category_event
        $this->load->model('category_event', 'categoryModel');
        // load model event
        $this->load->model('event_Model', 'eventModel');
        // load model host_event
        $this->load->model('host_event', 'hosteventModel');
    }

    function index() {
        $data['title'] = 'Event';
        $data['main_content'] = 'event/main_event_view';
        $data['struktur'] = $this->_getStruktur();
        $data['sortby'] = 'categories';
        $data['show_calendar_and_event'] = true;
        $data['body_id'] = 'event_body';
        $data['sortby'] = 'upcoming';
        $this->load->view('includes/template', $data);
    }

    /**
     * sortby
     *
     * mengurutkan kemunculan tampilan event pada slide show
     *
     * @param string sortby jenis pengurutan
     */
    function sortby() {
        $array = $this->uri->uri_to_assoc(2);
        $data['title'] = 'Event';
        $data['main_content'] = 'event/main_event_view';
        $data['struktur'] = $this->_getStruktur();
        $data['sortby'] = $array['sortby'];
        $data['categories'] = "";
        $data['show_calendar_and_event'] = true;
        $data['body_id'] = 'event_body';
        if ($array['sortby'] == 'categories') {
            $array2 = $this->uri->uri_to_assoc(3);
            $data['categories'] = $this->get_categories_exist();
            $options = array('id' => $array2['categories']);
            $getCategory = $this->categoryModel->getCategoryEvents($options);
            $data['current_categories'] = $getCategory[0]->category_event;
            $data['current_categories_id'] = $getCategory[0]->id;
        }
        $this->load->view('includes/template', $data);
    }

    /**
     * get_categories_exist()
     *
     * mencari kategori yang ada eventnya
     *
     */
    function get_categories_exist() {
        // get all events
        $getEvents = $this->eventModel->getEvents();
        // get all category_event
        $getCategory = $this->categoryModel->getCategoryEvents();
        $array_category = array();
        $array_category_label = array();
        foreach ($getCategory as $cat) :
            $array_category[$cat->id] = 0;
            $array_category_label[$cat->id] = $cat->category_event;
        endforeach;
        foreach ($getEvents as $event) :
            $array_category[$event->category_event_id] += 1;
        endforeach;
        $idx_array = array_keys($array_category);
        $p = 0;
        foreach ($idx_array as $idx) :
            if ($array_category[$idx] != 0) {
                $text[$p]['label'] = $array_category_label[$idx];
                $text[$p]['link'] = site_url('event/sortby/categories/' . $idx);
                $p++;
            }
        endforeach;
        return $text;
    }

    /**
     * show_categories()
     *
     * fungsi yang dipanggil dengan ajax ketika user klik categories di main_event_view
     *
     */
    function show_categories() {
        $text = $this->get_categories_exist();
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('text' => $text)));
    }

    /**
     * show_event()
     *
     * Menampilkan salah satu event
     *
     * @param int show_event id event yang akan ditampilkan
     */
    function show_event() {
        $array = $this->uri->uri_to_assoc(2);
        $idevent = $array['show_event'];

        //Load model event :
        $this->load->model('event', 'eventModel');

        //Get Data event dengan id=$idevent
        $option = array('id' => $idevent);
        $getEvent = $this->eventModel->getEvents($option);

        if (!is_bool($getEvent)) {
            $title = $getEvent[0]->title;
            $where = $getEvent[0]->venue;
            $when = $getEvent[0]->start_time;
            $description = $getEvent[0]->description;
            $cp = array('name' => $getEvent[0]->cp_name, 'telp' => $getEvent[0]->cp_hp);
            $url_image = base_url() . $getEvent[0]->image_url;

            //Load model RSVP Event buat dapet data yang RSVP :
            $this->load->model('rsvp_event', 'rsvpModel');
            //Load model RSVP Status buat dapet id status yang attending :
            $this->load->model('rsvp_status', 'rsvpStatusModel');
            $optionStatusAttending = array('label' => 'Attending');
            $getStatusAttending = $this->rsvpStatusModel->getRSVPStatuses($optionStatusAttending);
            $idStatusAttending = $getStatusAttending[0]->id;

            //Query list rsvp tabel yang event_id = $idevent, status_rsvp_id = $idStatusAttending :
            $optionRSVPAttendingEvent = array('event_id' => $idevent, 'status_rsvp_id' => $idStatusAttending);
            $getRSVPAttendingEvent = $this->rsvpModel->getRSVPEvent($optionRSVPAttendingEvent);

            $list_attending = array();
            //Cek udah ada yang attending :
            if (!is_bool($getRSVPAttendingEvent)) {
                $attending = count($getRSVPAttendingEvent);

                //List user yang attending :
                //Load model user :
                $this->load->model('user', 'userModel');
                //Iterasi hasil query $getRSVPAttendingEvent, then dapetin detail user :
                for ($i = 0; $i < $attending; ++$i) {
                    $idUserAttending = $getRSVPAttendingEvent[$i]->user_id;

                    $optionUser = array('id' => $idUserAttending);
                    $getUser = $this->userModel->getUsers($optionUser);
                    $user = array();
                    $user['user_id'] = $getUser[0]->id;
                    $user['name'] = $getUser[0]->name;
                    $list_attending[$i] = $user;
                }
            } else {
                //Do nothing
                $attending = 0;
            }

            $rsvp=0;
            if ($this->session->userdata('name') == null) // user belum sign in
                $rsvp = 0;
            else {
                //User udah login, cek RSVP user login :
                $iduserlogin = $this->session->userdata('user_id');
                $optionUserLogin = array('event_id' => $idevent, 'user_id' => $iduserlogin);
                $getStatusRSVPLoginUser = $this->rsvpModel->getRSVPEvent($optionUserLogin);
                if (is_bool($getStatusRSVPLoginUser)) {
                    //Orang ini belom pernah ngasih status kedatangan :
                    $rsvp = 1;
                } else if ($getStatusRSVPLoginUser[0]->status_rsvp_id == 1) {
                    //Status RSVP orang ini Attending :
                    $rsvp = 2;
                } else if ($getStatusRSVPLoginUser[0]->status_rsvp_id == 2) {
                    //Status RSVP orang ini Not Attending :
                    $rsvp = 3;
                }
            }
            $data['data_event'] = array(
                'event_id' => $array['show_event'],
                'title' => $title,
                'where' => $where,
                'when' => $when,
                'description' => $description,
                'cp' => $cp,
                'attending' => $attending,
                'list_attending' => $list_attending,
                'url_image' => $url_image,
                'rsvp' => $rsvp
            );
        } else {
            //Gak ada event dengan id atau query gagal
        }

        $data['title'] = 'Event - ' . $title;
        $data['main_content'] = 'event/show_event_view';
        $data['struktur'] = $this->_getStruktur2($title);
        $data['body_id'] = 'event_body';
        $this->load->view('includes/template', $data);
    }

    /**
     * rsvp()
     *
     * user me-rsvp sebuah event
     *
     * @param int user_id id user
     * @param int event_id id event
     */
    function rsvp() {
        $user_id = $this->session->userdata('user_id');
        $event_id = $this->input->post('id');
        $status_rsvp_id = $this->input->post('type');
        
        //load model rsvp event
        $this->load->model('rsvp_event','rsvpModel');
        
        //cek dulu sebelumnya ada atau ga
        $options = array('user_id'=>$user_id,'event_id'=>$event_id);
        $getEventRSVP = $this->rsvpModel->getRSVPEvent($options);
        $success = 0;
        $status ="";
        $link="";
        $count=0;
        $name="";
        if (!is_bool($getEventRSVP)) {
            $success = 0;
        } else {
            $options = array('user_id'=>$user_id,'event_id'=>$event_id,'status_rsvp_id'=>$status_rsvp_id);
            $addEventRSVP = $this->rsvpModel->addRSVPEvent($options);
            if (is_bool($addEventRSVP)) {
                $success = 0;
            } else {
                $success = 1;
                // update jumlah
                $options = array('event_id'=>$event_id, 'status_rsvp_id'=>1);
                $getEventRSVP = $this->rsvpModel->getRSVPEvent($options);
                if (!is_bool($getEventRSVP))
                    $count = count($getEventRSVP);
                if ($status_rsvp_id==1) {
                    $status = "RSVP-ed for Attending";
                } else if ($status_rsvp_id==2) {
                    $status = "RSVP-ed for Not Attending";
                }
                $link = site_url('profile/user/'.$user_id);
                $name = $this->session->userdata('name');
            }
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('success'=>$success, 'status' => $status, 'link'=>$link, 'name'=>$name, 'count'=>$count)));
    }

    /**
     * host
     *
     * Membuat sebuah event
     *
     */
    function host() {
        if ($this->session->userdata('name') == null) {
            redirect('/home', 'refresh');
        }
        $data['title'] = 'Host an Event';
        $data['main_content'] = 'event/host_event_view';
        $data['struktur'] = $this->_getStruktur3();
        $data['category_list'] = array();
        $data['body_id'] = 'event_body';
        
        // show calendar
        $data['show_calendar'] = 1;

        //get all category
        $getCategory = $this->categoryModel->getCategoryEvents();
        $count = 0;
        foreach ($getCategory as $category) :
            $data['category_list'][$category->id] = $category->category_event;
            $count++;
        endforeach;
        
        $this->load->view('includes/template', $data);
    }

    /**
     * upload_picture()
     *
     * fungsi untuk mengupload gambar event yang akan dibuat
     * gambar sementara ditaruh di folder res/temp, 
     * jika event telah disubmit maka gambar akan dipindahkan
     */
    function upload_picture() {
        $upload_path = 'res/temp/';
        $config['upload_path'] = './' . $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '1024';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('status'=>0,'error' => $this->upload->display_errors('',''));
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($error));
        } else {
            $data_img = $this->upload->data();
            $teks = base_url() . $upload_path . $this->upload->file_name;
            
            ImageJPEG(ImageCreateFromString(file_get_contents('./'. $upload_path . $this->upload->file_name)), './'. $upload_path . $this->upload->file_name, 90);
            
            $success = array('status'=>1,'src' => $teks);
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($success));
        }
    }

    /**
     * submit_event()
     *
     * membuat event baru, data dikirim dengan method post
     * 
     * @param string url_img image yang diupload
     * @param string when waktu event
     * @param string where tempat event
     * @param string description deskripsi event
     * 
     */
    function submit_event() {
        // set rules form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('when', 'Date and Time', 'required');
        $this->form_validation->set_rules('where', 'Place', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('category_event', 'Event Category', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->host();
        } else {
            try {
                $image_url = substr($this->input->post('url_img'), strlen(base_url()));
                $ext = explode(".", $image_url);
                $title = $this->input->post('title');
                $when = $this->input->post('when');
                $where = $this->input->post('where');
                $description = $this->input->post('description');
                $category_event = $this->input->post('category_event');
                $cp_name = $this->input->post('cp_name');
                $cp_hp = $this->input->post('cp_hp');
                // convert php date to mysql date
                $phpdate = strtotime($when);
                $when2 = date('Y-m-d H:i:s', $phpdate);
                $options = array(
                    'title' => $title,
                    'description' => $description,
                    'start_time' => $when2,
                    'venue' => $where,
                    'cp_name' => $cp_name,
                    'cp_hp' => $cp_hp,
                    'category_event_id' => $category_event,
                    'image_url' => $image_url
                );
                $event_id = $this->eventModel->addEvent($options); // masukkan data ke tabel event

                $options = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'event_id' => $event_id
                );
                $host_event_id = $this->hosteventModel->addHostEvent($options); // masukkan data ke tabel host_event
                if (is_bool($host_event_id) || is_bool($event_id)) { // error
                    throw new Exception('Error on database : insert event.');
                } else {
                    if ($image_url != 'res/default.jpg') {
                        $new_imgurl = 'res/event/event_' . $event_id . '.' . $ext[count($ext) - 1];
                        if (rename('./' . $image_url, './' . $new_imgurl)) {
                            // update new image url yang telah direname
                            $options = array('id' => $event_id, 'image_url' => $new_imgurl);
                            $this->eventModel->updateEvent($options);
                            $message['status'] = 'Success';
                            $message['message'] = 'Event is successfully created.'.br(1).'Click '.anchor('event/show_event/'.$event_id,'here').' to view this event.';
                        } else {
                            throw new Exception('Error moving file picture');
                        }
                    } else {
                        $message['status'] = 'Success';
                        $message['message'] = 'Event is successfully created.'.br(1).'Click '.anchor('event/show_event/'.$event_id,'here').' to view this event.';
                    }
                }
            } catch (Exception $e) {
                //$message['status'] = 'An Error Occurred';
                //$message['message'] = $e->getMessage().''.br(1).'Click '.anchor('event/host','here').' to try again.';
                show_error($e->getMessage());
            }
            $message['page_before'] = 'Host an Event';
            $message['page_link'] = 'event/host';

            // redirect ke info view
            $this->session->set_flashdata('message', $message);
            redirect('info/show','refresh');
        }
    }

    /**
     * mycalendar()
     *
     * menampilkan event calendar user
     * parameter : all_events/rsvp_ed
     * 
     */
    function mycalendar() {
        $array = $this->uri->uri_to_assoc(2);
        if ($array['mycalendar'] != "") {
            $data['sortby'] = $array['mycalendar'];
        } else {
            $data['sortby'] = 'all_events';
        }
        $data['title'] = 'Your event calendar';
        $data['main_content'] = 'event/my_calendar_view';
        $data['struktur'] = $this->_getStruktur2('Your event calendar');
        $data['show_calendar_and_event'] = true;
        $data['body_id'] = 'event_body';
        $this->load->view('includes/template', $data);
    }

    function _getStruktur() {
        $struktur = array(
            array(
                'islink' => 1,
                'link' => 'home',
                'label' => 'Home'
            ),
            array(
                'islink' => 0,
                'label' => 'Event'
            )
        );
        return $struktur;
    }

    function _getStruktur2($title) {
        $struktur = array(
            array(
                'islink' => 1,
                'link' => 'home',
                'label' => 'Home'
            ),
            array(
                'islink' => 1,
                'link' => 'event',
                'label' => 'Event'
            ),
            array(
                'islink' => 0,
                'label' => $title
            )
        );
        return $struktur;
    }

    function _getStruktur3() {
        $struktur = array(
            array(
                'islink' => 1,
                'link' => 'home',
                'label' => 'Home'
            ),
            array(
                'islink' => 1,
                'link' => 'event',
                'label' => 'Event'
            ),
            array(
                'islink' => 0,
                'label' => 'Host an event'
            )
        );
        return $struktur;
    }

}

?>
