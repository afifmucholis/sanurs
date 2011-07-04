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
    
    /**
     * View
     *
     * mengatur isi yang ditampilkan, ex : history,misi visi, dll
     * mengembalikan respon berdasarkan request dari ajax/url request
     */
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
        if ($this->input->get('ajax')) {
            $text = $this->load->view($array['view'],"",true);
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('text' => $text, 'struktur'=>$data['struktur'])));
        } else {
            $this->load->view('includes/template',$data);
        }
    }
    
    function contact() {
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        
        $this->load->library('email');

        $this->email->from($email, 'anonymous web sanur');
        $this->email->to('the.end.4ever@gmail.com');
        $this->email->subject($subject);
        $this->email->message($message);	

        $this->email->send();

        echo $this->email->print_debugger();
        
        echo "Email dikirim.";
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
