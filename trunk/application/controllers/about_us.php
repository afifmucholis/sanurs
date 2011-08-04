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
        $data['main_content'] = 'about_us/about_us_view';
        $data['struktur'] = $this->_getStruktur('Contact Us');
        $data['view'] = 'about_us/history';
        $data['view_awal'] = 'link_web';
        $data['body_id'] = 'about_body';
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
        $data['main_content'] = 'about_us/about_us_view';
        $data['view'] = 'about_us/'.$array['view'];
        $data['view_awal'] = $array['view'];
        $data['body_id'] = 'about_body';
        if ($array['view']=='history')
            $data['struktur'] = $this->_getStruktur('History');
        else if ($array['view']=='visimisi')
            $data['struktur'] = $this->_getStruktur('Vision and Mission');
        else if ($array['view']=='contact') {
            $data['struktur'] = $this->_getStruktur('Contact Us');
        } else if ($array['view']=='link_web')
            $data['struktur'] = $this->_getStruktur('Santa Ursula Website');
        if ($this->input->get('ajax')) {
            $text = $this->load->view($data['view'],"",true);
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('text' => $text, 'struktur'=>$data['struktur'])));
        } else {
            $this->load->view('includes/template',$data);
        }
    }
    
    /**
     * function contact()
     *
     * mengirim email ke admin
     * user anonymous, data dari form dengan method post
     */
    function contact() {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        try {        
            $this->load->library('email');

            $this->email->from($email, 'Web Sanur from '.$name);
            $this->email->to('the.end.4ever@gmail.com');
            $this->email->subject($subject);
            $this->email->message($message);

            if (!$this->email->send()) {
                show_error('Error sending email');
            } else {
                // success
                $message2['status'] = 'Success';
                $message2['message'] = 'Your message is successfully sent.';
            }
        } catch (Exception $e) {
            $message2['status'] = 'An Error Occurred';
            $message2['message'] = 'Your message has not been sent.'.br(1).'Click '.anchor('about_us/view/contact','here').' to try again.';
        }
        
        $message2['page_before'] = 'Contact Us';
        $message2['page_link'] = 'about_us/view/contact';

        // redirect ke info view
        $this->session->set_flashdata('message', $message2);
        redirect('info/show','refresh');
    }
    
    function _getStruktur($view) {
        $struktur = array (
            array (
                'islink'=>1,
                'link'=>'home',
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
