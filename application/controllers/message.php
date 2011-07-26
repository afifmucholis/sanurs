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
        $data['body_id'] = 'message_body';
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
        $data['body_id'] = 'message_body';
        if ($array['view'] == 'new_message_view') {
            $data['struktur'] = $this->getStruktur('New Message');
            $data['friend_list'] = $this->getFriendList();
        } else if ($array['view'] == 'inbox_view') {
            $data['struktur'] = $this->getStruktur('Inbox');

            $this->load->library('pagination');
            $per_page = 6;
            $numMessages = $this->countInbox();
            $offset = $this->input->get('offsetval');

            $data['inbox'] = $this->getInbox($per_page, $offset);
            $base_url = site_url('message/view/inbox_view');
            $config['base_url'] = $base_url;
            $config['total_rows'] = $numMessages;
            $config['uri_segment'] = '1';
            $config['per_page'] = $per_page;
            $config['cur_page'] = $offset;

            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<div  id="num_link">';
            $config['first_tag_close'] = '</div>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<div id="num_link">';
            $config['last_tag_close'] = '</div>';
            $config['next_link'] = false;
            $config['prev_link'] = false;
            $config['cur_tag_open'] = '<div id="cur_link">';
            $config['cur_tag_close'] = '</div>';
            $config['num_tag_open'] = '<div id="num_link">';
            $config['num_tag_close'] = '</div>';

            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();
        } else if ($array['view'] == 'inbox_detail_view') {
            $data['struktur'] = $this->getStruktur('Inbox Detail');
            $messageid = $this->input->get('id');
            $data['inbox_detail'] = $this->getInboxDetail($messageid);
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
        $sender_name = $this->session->userdata('name');


        $this->load->model('friend_relationship', 'friendRelationshipModel');
        try {
            if ($idto == '') {
                //Get ID dari to_name :
                $this->load->model('user', 'userModel');
                $optionUser = array('name' => $to);
                $getUsers = $this->userModel->getUsers($optionUser);
                if (is_bool($getUsers)) {
                    throw new Exception("No user has name " . $to);
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
                        if ($countfriend == 1) {
                            $idto = $friendid;
                        } else if ($countfriend == 0) {
                            throw new Exception("No friends of you have name " . $to);
                        } else {
                            throw new Exception("More than 1 of your friends that have name " . $to);
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
                if ($idto != '') {
                    throw new Exception("Your message is not succesfully sent. Recipient is not your friend");
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
                    throw new Exception("Kirim message gagal");
                } else {
                    // load model notification
                    $this->load->model('notification_model', 'notifModel');
                    $notify = $sender_name . " send you a new message.";
                    $link = 'message/view/inbox_view';
                    $options = array('userid_to' => $idto, 'message' => $notify, 'link' => $link);
                    $addNotify = $this->notifModel->addNotification($options);
                    $m['status'] = "Success";
                    $m['message'] = "Your message is succesfully sent.";
                }
            }
        } catch (Exception $e) {
            $m['status'] = 'An Error Occurred';
            $m['message'] = $e->getMessage().''.br(1).'Click '.anchor('message/view/new_message_view','here').' to send message again.';
        }
        $m['page_before'] = 'Message';
        $m['page_link'] = 'message/view/new_message_view';
        
        // redirect ke info view
        $this->session->set_flashdata('message', $m);
        redirect('info/show','refresh');
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
        $friends = array();
        if (!(is_bool($getFriend1))) {
            $numfriends1 = count($getFriend1);
        } else {
            $numfriends1 = 0;
        }

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

        $getFriend2 = $this->friendRelationshipModel->getFriendRelationships($option2);
        $numfriends2 = count($getFriend2);
        $numAllfriends = $numfriends1 + $numfriends2;

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

    function getInbox($limit, $offset) {
        $userid = $this->session->userdata('user_id');

        $result = array();

        //Get All Message to $userid  (using limit and offset for pagination):
        $this->load->model('message_model', 'messageModel');
        $option = array('userid_to' => $userid, 'sortBy' => 'date', 'sortDirection' => 'desc', 'limit' => $limit, 'offset' => $offset);

        //Get All Message :
        $getMessages = $this->messageModel->getMessages($option);
        $countMessages = count($getMessages);

        if (is_bool($getMessages) && !$getMessages) {
            //No message;
        } else {
            //Generate detail message :
            //Need user model :
            $this->load->model('user', 'userModel');
            for ($i = 0; $i < $countMessages; ++$i) {
                $optionUser = array('id' => $getMessages[$i]->userid_from);
                $getUser = $this->userModel->getUsers($optionUser);

                $messageDetail = array();
                $messageDetail['from_name'] = $getUser[0]->name;
                $messageDetail['from_nickname'] = $getUser[0]->nickname;
                $messageDetail['from_profpict'] = $getUser[0]->profpict_url;
                $messageDetail['id'] = $getMessages[$i]->id;

                if (strlen($getMessages[$i]->subject) < 80) {
                    $messageDetail['subject'] = $getMessages[$i]->subject;
                } else {
                    $messageDetail['subject'] = substr($getMessages[$i]->subject, 0, 80) . '.....';
                }

                if (strlen($getMessages[$i]->message) < 120) {
                    $messageDetail['message'] = $getMessages[$i]->message;
                } else {
                    $messageDetail['message'] = substr($getMessages[$i]->message, 0, 120) . '.....';
                }

                $messageDetail['date'] = $getMessages[$i]->date;
                $result[$i] = $messageDetail;
            }
        }

        return $result;
    }

    function countInbox() {
        $userid = $this->session->userdata('user_id');
        $this->load->model('message_model', 'messageModel');

        //Count all message
        $optionCountMessage = array('userid_to' => $userid);
        return count($this->messageModel->getMessages($optionCountMessage));
    }

    function getInboxDetail($messageid) {
        $messageDetail = array();

        //Get Message dengan id = $messageid
        $this->load->model('message_model', 'messageModel');
        $option = array('id' => $messageid);

        //Get The Message :
        $getMessage = $this->messageModel->getMessages($option);

        if (is_bool($getMessage) && !$getMessage) {
            //No message;
        } else {
            //Generate detail message :
            //Need user model :
            $this->load->model('user', 'userModel');

            $optionUser = array('id' => $getMessage[0]->userid_from);
            $getUser = $this->userModel->getUsers($optionUser);

            
            $messageDetail['from_name'] = $getUser[0]->name;
            $messageDetail['from_nickname'] = $getUser[0]->nickname;
            $messageDetail['from_profpict'] = $getUser[0]->profpict_url;
            $messageDetail['id'] = $getMessage[0]->id;
            $messageDetail['subject'] = $getMessage[0]->subject;
            $messageDetail['message'] = $getMessage[0]->message;
            $messageDetail['date'] = $getMessage[0]->date;
        }
        return $messageDetail;
    }

}

?>
