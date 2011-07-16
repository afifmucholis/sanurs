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
        $data['friend_list'] = $this->getFriendList();
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
        $data['friend_list'] = $this->getFriendList();
        if ($array['view'] == 'new_message_view') {
            $data['struktur'] = $this->getStruktur('New Message');
        } else if ($array['view'] == 'inbox_view')
            $data['struktur'] = $this->getStruktur('Inbox');


        if ($this->input->get('ajax')) {
            $text = $this->load->view($data['view'], $data, true);
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('text' => $text, 'struktur' => $data['struktur'])));
        } else {
            $this->load->view('includes/template', $data);
        }
    }

    function submit() {
        $subject = $this->input->post('subject');
        $to = $this->input->post('to'); //to ini nama $id user
        $idto = $this->input->post('idto'); //to ini nama $id user
        $message = $this->input->post('message');
        $sender = $this->session->userdata('user_id');
        
        echo $idto;
        echo $message;
        echo $sender;

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

    function getFriendList() {
        //Ngembaliin daftar friend dari $userid
        //$userid = $this->input->post('user_id');
        $userid = $this->session->userdata('user_id');

        //Get friend list dari $userid :
        $this->load->model('friend_relationship', 'friendRelationshipModel');
        $option1 = array('userid_1' => $userid);
        $option2 = array('userid_2' => $userid);

        $getFriend1 = $this->friendRelationshipModel->getFriendRelationships($option1);
        $getFriend2 = $this->friendRelationshipModel->getFriendRelationships($option2);
        $friends = array();

        $numfriends1 = count($getFriend1);
        $numfriends2 = count($getFriend2);
        $numAllfriends = $numfriends1 + $numfriends2;


        //Get detail dari friend :
        $this->load->model('user', 'userModel');

        if (!is_bool($getFriend1)) {
            for ($i = 0; $i < $numfriends1; ++$i) {
                $idfriend = $getFriend1[$i]->userid_2;
                $option = array('id' => $idfriend);
                $getUser = $this->userModel->getUsers($option);

                $friend = array();
                $friend['value'] = $getUser[0]->id;
                $friend['label'] = $getUser[0]->name;
                $friend['nickname'] = $getUser[0]->nickname;
                $friend['profpict_url'] = $getUser[0]->profpict_url;

                $friends[$i] = $friend;
            }
        }

        if (!is_bool($getFriend2)) {
            for ($i = $numfriends1; $i < $numAllfriends; ++$i) {
                $idfriend = $getFriend2[$i - $numfriends1]->userid_1;

                $option = array('id' => $idfriend);
                $getUser = $this->userModel->getUsers($option);

                $friend = array();
                $friend['value'] = $getUser[0]->id;
                $friend['label'] = $getUser[0]->name;
                $friend['nickname'] = $getUser[0]->nickname;
                $friend['profpict_url'] = $getUser[0]->profpict_url;

                $friends[$i] = $friend;
            }
        }

        return json_encode($friends);
    }
}

?>
