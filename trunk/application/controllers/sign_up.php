<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sign_up
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
class sign_up extends CI_Controller {
    function index() {
        $data['title'] = 'Sign Up';
        $data['main_content'] = 'sign_up_view';
        $data['struktur'] = $this->getStruktur();
        $data['jenjang'] = 'TK';
        $this->load->view('includes/template',$data);
    }
    
    function submit() {
        $array = $this->uri->uri_to_assoc(3);
        if (isset($array['jenjang']) && !isset($array['tahun'])) {
            $data['jenjang']=$array['jenjang'];
            $data['title'] = 'Sign Up';
            $data['main_content'] = 'sign_up_view';
            $data['struktur'] = $this->getStruktur();
            $this->load->view('includes/template',$data);
        } else if (isset($array['jenjang']) && isset($array['tahun'])) {
            
        }
    }
    
    function getStruktur() {
        $struktur = array (
            array (
                'islink'=>1,
                'link'=>'home',
                'label'=>'Home'
            ),
            array (
                'islink'=>0,
                'label'=>'Sign up'
            )
        );
        return $struktur;
    }
}

?>
