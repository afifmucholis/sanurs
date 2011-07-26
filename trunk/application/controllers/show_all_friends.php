<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of notification
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
class show_all_friends extends CI_Controller {

    function index() {
        if ($this->session->userdata('name') == null) {
            redirect('/home', 'refresh');
        }

        $array = $this->uri->uri_to_assoc(2);
        $user_id = $array['user'];

        $data['title'] = 'All Friends';
        $data['main_content'] = 'profile/show_all_friends_view';
        $data['struktur'] = $this->getStruktur('Show All Friend');
        $data['body_id'] = 'profile_body';
        $user_id = $this->session->userdata('user_id');

        $this->load->view('includes/template', $data);
    }

    function user() {
        $array = $this->uri->uri_to_assoc(2);
        $user_id = $array['user'];

        $data['title'] = 'Show All Friends';
        $data['main_content'] = 'profile/show_all_friends_view';
        $data['struktur'] = $this->getStruktur($this->getName($user_id), $user_id);
        $data['body_id'] = 'profile_body';
        $data['view'] = 'profile/show_all_friends_view';
        $data['userid_viewed'] = $user_id;
        $data['userid_login'] = $this->session->userdata('user_id');
        $data['username_viewed'] = $this->getName($user_id);
        //Get friend list :
        $friends_list_result = $this->getAllFriendList($user_id);
        $total_friends = count($friends_list_result['friends']);

        $this->load->library('pagination');
        $per_page = 10;
        $offset = $this->input->post('offsetval');

        $friends_pagin_result = $this->getAllFriendListPaginate($per_page, $offset, $friends_list_result);

        $data['friends'] = $friends_pagin_result;
        $base_url = site_url('show_all_friends/user');
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_friends;
        $config['uri_segment'] = '2';
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

        if ($this->input->post('ajax')) {
            $data['view'] = 'profile/list_all_friends_view';
            $text = $this->load->view($data['view'], $data, true);
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('text' => $text, 'struktur' => $data['struktur'])));
        } else {
            $this->load->view('includes/template', $data);
        }
    }

    function getStruktur($name, $user_id) {
        if ($user_id == $this->session->userdata('user_id')) {
            $struktur = array(
                array(
                    'islink' => 1,
                    'link' => 'home',
                    'label' => 'Home'
                ),
                array(
                    'islink' => 1,
                    'link' => 'profile',
                    'label' => 'Your Profile'
                ),
                array(
                    'islink' => 0,
                    'label' => 'Show All Friends'
                )
            );
        } else {
            $struktur = array(
                array(
                    'islink' => 1,
                    'link' => 'home',
                    'label' => 'Home'
                ),
                array(
                    'islink' => 1,
                    'link' => 'profile/user/' . $user_id,
                    'label' => $name
                ),
                array(
                    'islink' => 0,
                    'label' => 'Show All Friends'
                )
            );
        }
        return $struktur;
    }

    function getName($userid) {
        $option = array('id' => $userid);
        $name;
        $this->load->model('user', 'userModel');
        $getUser = $this->userModel->getUsers($option);
        if (!is_bool($getUser)) {
            $name = $getUser[0]->name;
        }
        return $name;
    }

    function getAllFriendList($userid) {
        $result = array();

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
                $friend['id'] = $getUser[0]->id;
                $friend['name'] = $getUser[0]->name;
                $friend['nickname'] = $getUser[0]->nickname;
                $friend['profpict_url'] = $getUser[0]->profpict_url;

                $friends[$i] = $friend;
            }
        }

        $getFriend2 = $this->friendRelationshipModel->getFriendRelationships($option2);
        if (!(is_bool($getFriend2))) {
            $numfriends2 = count($getFriend2);
        } else {
            $numfriends2 = 0;
        }

        $numAllfriends = $numfriends1 + $numfriends2;

        if (!is_bool($getFriend2)) {
            for ($i = $numfriends1; $i < $numAllfriends; ++$i) {
                $idfriend = $getFriend2[$i - $numfriends1]->userid_1;

                $option = array('id' => $idfriend);
                $getUser = $this->userModel->getUsers($option);

                $friend = array();
                $friend['id'] = $getUser[0]->id;
                $friend['name'] = $getUser[0]->name;
                $friend['nickname'] = $getUser[0]->nickname;
                $friend['profpict_url'] = $getUser[0]->profpict_url;

                $friends[$i] = $friend;
            }
        }
        $result['friends'] = $friends;
        $result['total_friends'] = $numAllfriends;
        return $result;
    }

    function getAllFriendListPaginate($limit, $offset, $friends) {
        $friends_list = $friends['friends'];
        $total_friends = count($friends_list);
        $friends_paginate = array();
        if ($total_friends <= $offset) {
            //Do nothing  
        } else {
            $start_index = $offset+1;
            $end_index = $start_index + $limit;
            $iterator = 0;
            for ($i = $start_index; $i < $end_index; ++$i) {
                if (isset($friends_list[$i-1]->id)) {
                    $friend = array();
                    $friend['id'] = $friends_list[$i-1]['id'];
                    $friend['name'] = $friends_list[$i-1]['name'];
                    $friend['nickname'] = $friends_list[$i-1]['nickname'];
                    $friend['profpict_url'] = $friends_list[$i-1]['profpict_url'];

                    $friends_paginate[$iterator] = $friend;
                    ++$iterator;
                }
            }
        }
        return $friends_paginate;
    }
}

?>
