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
        
        if ($array['view'] == 'new_message_view') {
            $data['struktur'] = $this->getStruktur('New Message');
            $data['friend_list'] = $this->getFriendList();
        } else if ($array['view'] == 'inbox_view') {
            $data['struktur'] = $this->getStruktur('Inbox');
            $data['inbox'] = $this->getInbox();
        }
            

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


        $this->load->model('friend_relationship', 'friendRelationshipModel');

        if ($idto == '') {
            //Get ID dari to_name :
            $this->load->model('user', 'userModel');
            $optionUser = array('name' => $to);
            $getUsers = $this->userModel->getUsers($optionUser);
            if (is_bool($getUsers)) {
                echo "No user with name " . $to;
            } else {
                //Cek ada 1 gak :
                if (count($getUsers) == 1) {
                    $idto = $getUsers[0]->id;
                } else {
                    //Ada banyak user dengan nama $to
                    //Ambil nama yang friend ama dia
                    //Kalo ternyata friend dengan nama $to juga banyak, kasitau
                    $countfriend = 0;
                    for ($i = 0; $i < count($getUsers); ++$i) {
                        $idcalon = $getUsers[$i]->id;

                        $option1 = array('userid_1' => $idcalon, 'userid_2' => $sender);
                        $option2 = array('userid_2' => $idcalon, 'userid_1' => $sender);

                        $getReturn1 = $this->friendRelationshipModel->getFriendRelationships($option1);
                        $getReturn2 = $this->friendRelationshipModel->getFriendRelationships($option2);

                        if (is_bool($getReturn1) && is_bool($getReturn2)) {
                            
                        } else {
                            ++$countfriend;
                            $friendid = $getUsers[$i]->id;
                        }
                    }
                    if ($countfriend==1) {
                        $idto = $friendid;
                    } else if ($countfriend ==0) {
                        echo "No friends of you have name ".$to;
                    } else {
                        echo "More than 1 friends that have name ".$to;
                    }
                }
            }
        }

        //Cek $idto ini udah friend ma user gak :
        $option1 = array('userid_1' => $idto, 'userid_2' => $sender);
        $option2 = array('userid_2' => $idto, 'userid_1' => $sender);

        $getReturn1 = $this->friendRelationshipModel->getFriendRelationships($option1);
        $getReturn2 = $this->friendRelationshipModel->getFriendRelationships($option2);

        if (is_bool($getReturn1) && is_bool($getReturn2)) {
            //to bukan friend dari pengirim
            if ($idto !='') {
                echo "recipient is not your friend";
            }
        } else {
            //Isi ke database message :
            $this->load->model('message_model', 'messageModel');
            $optionInsertMessage = array('subject' => $subject,
                'userid_from' => $sender,
                'userid_to' => $idto,
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
    
    function getInbox($numMessageShow){
        $userid = $this->session->userdata('user_id');
        
        $result = array();
        
        //Get All Message to $userid :
        $this->load->model('message_model', 'messageModel');
        $option = array('userid_to'=>$userid, 'sortBy'=>'date', 'sortDirection'=>'desc');
        
        //Get All Message :
        $getMessages = $this->messageModel->getMessages($option);
        $numMessages = count($getMessages);
        
        
        //Generate detail message :
        //Need user model :
        $this->load->model('user', 'userModel');
        for ($i=0; $i<$numMessages; ++$i) {
            $optionUser = array('id'=>$getMessages[$i]->userid_from);
            $getUser = $this->userModel->getUsers($options);
            
            $messageDetail = array();
            $messageDetail['from_name'] = $getUser[0]->name;
            $messageDetail['from_nickname'] = $getUser[0]->nickname;
            $messageDetail['subject'] = $getMessages[$i]->subject;
            $messageDetail['message'] = $getMessages[$i]->message;
            $messageDetail['date'] = $getMessages[$i]->date;
            $result[$i] = $messageDetail;
        }
        
        return $result;
    }
}

?>
