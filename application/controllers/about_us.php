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
class About_us extends CI_Controller {
    function index() {
        $data['title'] = 'About Us';
        $data['main_content'] = 'about_us_view';
        $data['struktur'] = $this->getStruktur('History');
        $data['view'] = 'history';
        $this->load->view('includes/template',$data);
    }
    
    function view() {
        $array = $this->uri->uri_to_assoc(2);
        $data['title'] = 'About Us';
        $data['main_content'] = 'about_us_view';
        $data['view'] = $array['view'];
        if ($array['view']=='history')
            $data['struktur'] = $this->getStruktur('History');
        else if ($array['view']=='visimisi')
            $data['struktur'] = $this->getStruktur('Vision and Mission');
        else if ($array['view']=='contact')
            $data['struktur'] = $this->getStruktur('Contact Us');
        else if ($array['view']=='link_web')
            $data['struktur'] = $this->getStruktur('Santa Ursula Website');
        $this->load->view($array['view']);
    }
    
    function getStruktur($view) {
        $struktur = array (
            array (
                'islink'=>1,
                'link'=>'testClass',
                'label'=>'Home'
            ),
            array (
                'islink'=>0,
                'label'=>'About Us'
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
