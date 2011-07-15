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
class Message extends CI_Controller {

    function index() {
        $data['title'] = 'Message';
        $data['main_content'] = 'message/main_message_view';
        $data['struktur'] = $this->getStruktur('New Message');
        $data['view'] = 'message/new_message_view';
        $this->load->view('includes/template', $data);
    }
    
    /**
     * View
     *
     * mengatur isi yang ditampilkan, ex : new message, inbox
     * mengembalikan respon berdasarkan request dari ajax/url request
     */
    function view() {
        $array = $this->uri->uri_to_assoc(2);
        $data['title'] = 'Message';
        $data['main_content'] = 'message/main_message_view';
        $data['view'] = 'message/'.$array['view'];
        if ($array['view']=='new_message_view')
            $data['struktur'] = $this->getStruktur('New Message');
        else if ($array['view']=='inbox_view')
            $data['struktur'] = $this->getStruktur('Inbox');
       
        
        if ($this->input->get('ajax')) {
            $text = $this->load->view($data['view'],"",true);
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('text' => $text, 'struktur'=>$data['struktur'])));
        } else {
            $this->load->view('includes/template',$data);
        }
    }

    function getStruktur($view) {
        $struktur = array (
            array (
                'islink'=>1,
                'link'=>'home',
                'label'=>'Home'
            ),
            array (
                'islink'=>0,
                'label'=>'Message'
            ),
            array (
                'islink'=>0,
                'label'=>$view
            )
        );
        return $struktur;
    }
}
?>
