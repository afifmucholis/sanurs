<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Model event untuk tabel event sekaligus kategori event
 * 
 * @author user
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 */
class Event_model extends CI_Model {
    /**
     * Event_model
     *
     * Konstruktor event model
     *
     */
    function Event_model() {
        parent::__construct();        
    }
    
    /**
     * getAll
     *
     * Mengambil semua record dari tabel event
     *
     */
    function getAll() {
        $data = $this->db->get('event');
        return $data;
    }

    
    
}

?>
