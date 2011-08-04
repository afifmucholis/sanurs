<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of info
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
class info extends CI_Controller {
    function show() {
        $fl = $this->session->flashdata('message');
        if ($fl=='')
            redirect('home','refresh');
        $data['title'] = $fl['status'];
        $data['main_content'] = 'info/info_view';
        $data['struktur'] = $this->_getStruktur($fl['page_before'],$fl['page_link'],$fl['status']);
        $data['body_id'] = 'info_body';
        $data['message'] = $fl['message'];
        $this->load->view('includes/template',$data);
    }
    
    function _getStruktur($val, $link, $status) {
        $struktur = array (
            array (
                'islink'=>1,
                'link'=>'home',
                'label'=>'Home'
            ),
            array (
                'islink'=>1,
                'link'=>$link,
                'label'=>$val
            ),
            array (
                'islink'=>0,
                'label'=>$status
            )
        );
        return $struktur;
    }
}

?>
