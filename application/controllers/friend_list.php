<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of about_us
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
class Friend_List extends CI_Controller {

    function getFriendList() {
        //Ngembaliin daftar friend dari $userid
        $userid = $this->input->post('user_id');
        

        //Get friend list dari $userid :
        $this->load->model('friend_relationship', 'friendRelationshipModel');
        $option1 = array('userid_1' => $userid);
        $option2 = array('userid_2' => $userid);

        $getFriend1 = $this->friendRelationshipModel->getFriendRelationships($option1);
        $getFriend2 = $this->friendRelationshipModel->getFriendRelationships($option2);
        $friends= array();

        $numfriends1 = count($getFriend1);
        $numfriends2 = count($getFriend2);
        $numAllfriends = $numfriends1 + $numfriends2;
        
                
        //Get detail dari friend :
        $this->load->model('user','userModel');

        if (!is_bool($getFriend1)) {
            for ($i = 0; $i < $numfriends1; ++$i) {
                $idfriend = $getFriend1[$i]->userid_2;
                $option = array('id'=>$idfriend);
                $getUser = $this->userModel->getUsers($option);
                
                $friend = array();
                $friend['name'] = $getUser[0]->name;
                $friend['nickname'] = $getUser[0]->nickname;
                $friend['email'] = $getUser[0]->email;
                
                $friends[$i] = $friend;
            }
        }

        if (!is_bool($getFriend2)) {
            for ($i = $numfriends1; $i < $numAllfriends; ++$i) {
                $idfriend = $getFriend2[$i - $numfriends1]->userid_1;
                
                $option = array('id'=>$idfriend);
                $getUser = $this->userModel->getUsers($option);
                
                $friend = array();
                $friend['name'] = $getUser[0]->name;
                $friend['nickname'] = $getUser[0]->nickname;
                $friend['email'] = $getUser[0]->email;
                
                $friends[$i] = $friend;
            }
        }


        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($friends));
    }

}

?>
