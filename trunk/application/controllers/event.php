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
    function index() {
        $data['title'] = 'Event';
        $data['main_content'] = 'event/main_event_view';
        $data['struktur'] = $this->getStruktur();
        $data['sortby'] = 'categories';
        $this->load->view('includes/template',$data);
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
        $data['struktur'] = $this->getStruktur();
        $data['sortby'] = $array['sortby'];
        $this->load->view('includes/template',$data);
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
        // get data event
        $title = 'tes sajah';
        $where = 'Bandung';
        $when = 'next month';
        $description = 'event tes';
        $cp = array('name'=>'Danang','telp'=>'08888xxxx');
        $attending = 2000;
        $list_attending = array (
            array('user_id'=>1,'name'=>'Levana Laksmicitra'),
            array('user_id'=>2,'name'=>'Andri Putri'),
            array('user_id'=>3,'name'=>'Shika Paramastri'),
            array('user_id'=>4,'name'=>'Danang Tri')
        );
        $url_image = 'ini url gambarnya';
        $rsvp = 1;  // cek bisa rsvp atau tidak
        if ($this->session->userdata('name')==null) // user belum sign in
            $rsvp = 0;
        if (false) // user sudah rsvp tidak bisa rsvp lagi
            $rsvp = 2;
        
        
        $data['title'] = 'Event - '.$title;
        $data['main_content'] = 'event/show_event_view';
        $data['struktur'] = $this->getStruktur2($title);
        $data['data_event'] = array(
                'event_id'=>$array['show_event'],
                'title'=>$title,
                'where'=>$where,
                'when'=>$when,
                'description'=>$description,
                'cp'=>$cp,
                'attending'=>$attending,
                'list_attending'=>$list_attending,
                'url_image'=>$url_image,
                'rsvp'=>$rsvp
        );
        $this->load->view('includes/template',$data);
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
        $user_id = $this->input->post('user_id');
        $event_id = $this->input->post('event_id');
        echo "Berhasil gan";
    }
    
    /**
     * host
     *
     * Membuat sebuah event
     *
     */
    function host() {
        if ($this->session->userdata('name')==null) {
            redirect('/home', 'refresh');
        }
        $data['title'] = 'Host an Event';
        $data['main_content'] = 'event/host_event_view';
        $data['struktur'] = $this->getStruktur3();
        $this->load->view('includes/template',$data);
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
        $config['upload_path'] = './'.$upload_path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '1024';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
                $error = array('error' => $this->upload->display_errors());
                echo 0;
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $teks = base_url().$upload_path.$this->upload->file_name;
                echo $teks;
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
     * @param string invite_grup grup yang akan diinvite
     * 
     */
    function submit_event() {
        echo $this->input->post('url_img');
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
        $data['struktur'] = $this->getStruktur2('Your event calendar');
        $this->load->view('includes/template',$data);
    }
    
    function getStruktur() {
        $struktur = array (
            array (
                'islink'=>1,
                'link'=>'home',
                'label'=>'Home'
            ),
            array (
                'islink'=>0,
                'label'=>'Event'
            )
        );
        return $struktur;
    }
    
    function getStruktur2($title) {
        $struktur = array (
            array (
                'islink'=>1,
                'link'=>'home',
                'label'=>'Home'
            ),
            array (
                'islink'=>1,
                'link'=>'event',
                'label'=>'Event'
            ),
            array (
                'islink'=>0,
                'label'=>$title
            )
        );
        return $struktur;
    }
    function getStruktur3() {
        $struktur = array (
            array (
                'islink'=>1,
                'link'=>'home',
                'label'=>'Home'
            ),
            array (
                'islink'=>1,
                'link'=>'profile',
                'label'=>'Your Profile'
            ),
            array (
                'islink'=>0,
                'label'=>'Host an event'
            )
        );
        return $struktur;
    }
}

?>
