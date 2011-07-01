<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Buku_con
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
class Buku_con extends CI_Controller {
    public function Buku_con() {
        parent::__construct();        
        $this->load->model('buku_model');
    }
    
    public function getBuku() {
        $data['title'] = 'menampilkan isi buku';
        $data['main_content'] = 'buku_view';
        $this->load->view('includes/template', $data);        
    }
    
    public function tampilBuku() {
        $data['detail'] = $this->buku_model->getBuku();
        $data['main_content'] = 'list_buku';
        if ($this->input->post('ajax')) {
            $this->load->view($data['main_content'], $data);
        }
    }
    
}

?>
