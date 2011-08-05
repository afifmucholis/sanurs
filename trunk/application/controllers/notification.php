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
class notification extends CI_Controller {
    function index() {
        if ($this->session->userdata('name')==null) {
            redirect('/home', 'refresh');
        }
        $data['title'] = 'Your Notification';
        $data['main_content'] = 'profile/notification_view';
        $data['struktur'] = $this->_getStruktur('Your Notification');
        $data['body_id'] = 'profile_body';
        $user_id = $this->session->userdata('user_id');
        // load model notification
        $this->load->model('notification_model', 'notificationModel');
        $options=array('userid_to'=>$user_id, 'status_read'=>0, 'sortBy' => 'date', 'sortDirection' => 'desc');
        
        $getNotification = $this->notificationModel->getNotifications($options);
        
        if (is_bool($getNotification))
            $data['notification'] = array();
        else {
            $data['notification'] = $getNotification;
            // update status read
            foreach ($getNotification as $notif) :
                $options = array('id'=>$notif->id);
                //$update = $this->notificationModel->updateNotification($options);
                $delete = $this->notificationModel->deleteNotification($options);
            endforeach;
        }
            
        $this->load->view('includes/template',$data);
    }
    
    function _getStruktur($name) {
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
                'label'=>$name
            )
        );
        return $struktur;
    }
    
}

?>
