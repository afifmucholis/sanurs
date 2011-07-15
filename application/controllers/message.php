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
        $data['view'] = 'message/' . $array['view'];
        if ($array['view'] == 'new_message_view')
            $data['struktur'] = $this->getStruktur('New Message');
        else if ($array['view'] == 'inbox_view')
            $data['struktur'] = $this->getStruktur('Inbox');


        if ($this->input->get('ajax')) {
            $text = $this->load->view($data['view'], "", true);
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('text' => $text, 'struktur' => $data['struktur'])));
        } else {
            $this->load->view('includes/template', $data);
        }
    }

    function submit() {
        $subject = $this->input->post('subject');
        $to = $this->input->post('to'); //to ini udah $id user
        $message = $this->input->post('message');
        $sender = $this->session->userdata('user_id');

        //Get ID dari to_name :
        $this->load->model('user', 'userModel');
        $optionUser = array('name' => $to_name);
        $getUsers = $this->userModel->getUsers($optionUser);

        //Cek $to ini udah friend ma user gak :
        $this->load->model('friend_relationship', 'friendRelationshipModel');
        $option1 = array('userid_1' => $to, 'userid_2' => $sender);
        $option2 = array('userid_2' => $to, 'userid_1' => $sender);

        $getReturn1 = $this->friendRelationshipModel->getFriendRelationships($option1);
        $getReturn2 = $this->friendRelationshipModel->getFriendRelationships($option2);

        if (is_bool($getReturn1) && is_bool($getReturn2)) {
            //to bukan friend dari pengirim
            echo "recipient is not your friend";
        } else {
            //Isi ke database message :
            $this->load->model('message', 'messageModel');
            $optionInsertMessage = array('subject' => $subject,
                'userid_from' => $sender,
                'userid_to' => $to,
                'message' => $message);
            $rowId = $this->messageModel->addMessage($optionInsertMessage);
            if (is_bool($rowId)) {
                echo "Kirim message gagal";
            } else {
                echo "Kirim message sukses";
            }
        }
    }

    function getStruktur($view) {
        $struktur = array(
            array(
                'islink' => 1,
                'link' => 'home',
                'label' => 'Home'
            ),
            array(
                'islink' => 0,
                'label' => 'Message'
            ),
            array(
                'islink' => 0,
                'label' => $view
            )
        );
        return $struktur;
    }

}
?>
