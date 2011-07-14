<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rsvp_event
 *
 * @author Akbar
 */

/**
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 */
class RSVP_Event extends CI_Model {

    //put your code here
    var $table = 'rsvp_event';
    var $id = 'id';
    var $user_id = 'user_id';
    var $event_id = 'event_id';
    var $status_rsvp_id = 'status_rsvp_id';

    /**
     * Konstruktor
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * Konstruktor
     */
    function RSVP_Event() {
        parent::__construct();
    }

    /**
     * Method addRSVPEvent : tambah RSVPEvent, no null allowed.
     * 
     * option: values
     * --------------
     * user_id           required
     * event_id          required
     * status_rsvp_id    required
     * 
     * @param array $options
     * @return type 
     */
    function addRSVPEvent($options = array()) {
        //Cek yang required :
        if (!$this->_required(array($this->user_id,
                    $this->event_id,
                    $this->status_rsvp_id), $options)) {
            return false;
        }

        //Isi ke database, at this step, si $options harusnya udah memenuhi syarat isset
        $fieldArray = array($this->user_id, $this->event_id);
        foreach ($fieldArray as $field) {
            if (isset($options[$field])) {
                $this->db->set($field, $options[$field]);
            }
        }

        //Jalankan query :
        $this->db->insert($this->table);

        //Kembaliin id dari row yang diinsert :
        return $this->db->insert_id();
    }

    /**
     * Method updateRSVPEvent : update tabel RSVP Event yang memenuhi id tertentu.
     * 
     * option: values
     * --------------
     * id           field id buat kriteria where
     * user_id      
     * event_id
     * status_rsvp_id     
     * 
     * @param array $options
     * @return bool/int  
     */
    function updateRSVPEvent($options = array()) {
        // required (id harus ada) :
        if (!$this->_required(array($this->id), $options))
            return false;

        //Set dari field :
        $fieldArray = array($this->user_id, $this->event_id, $this->status_rsvp_id);
        foreach ($fieldArray as $field) {
            if (isset($options[$field])) {
                $this->db->set($field, $options[$field]);
            }
        }
        $this->db->where($this->id, $options[$this->id]);

        //Jalankan query :
        $this->db->update($this->table);

        //Kembalikan jumlah row yang terupdate, atau false jika row tdak terupdate
        return $this->db->affected_rows();
    }

    /**
     * Method getRSVPEvents, mengembalikan array of RSVPEvent.
     * 
     * option : values
     * ---------------
     * id               field kriteria id untuk klause where
     * user_id      
     * event_id
     * status_rsvp_id 
     * 
     * columnSelect     kolom yang mau diselect
     * distinct         true jika Select distinct, false ato kosong kalo engga
     * sortBy           field kriteria kolom mana yang akan disort
     * sortDirection    (asc, desc) sorting ascending atau descending\
     * groupBy          grouping query
     * 
     * @param array $options
     * @return array result() 
     */
    function getRSVPEvent($options = array()) {
        //nilai default :
        $options = $this->_default(array('sortDirection' => 'asc'), $options);

        //Select distinct kalo keset :
        if (isset($options['distinct'])) {
            if ($options['distinct'] == true) {
                $this->db->distinct();
            }
        }

        //Column Select :
        if (isset($options['columnSelect'])) {
            $this->db->select($options['columnSelect']);
        }

        //Tambah kondisi where ke query :
        $fieldArray = array($this->id,
            $this->user_id,
            $this->event_id,
            $this->status_rsvp_id);
        foreach ($fieldArray as $field) {
            if (isset($options[$field])) {
                $this->db->where($field, $options[$field]);
            }
        }

        //Sorting : 
        if (isset($options['sortBy'])) {
            $this->db->order_by($options['sortBy'], $options['sortDirection']);
        }
        
        //Buat penanganan query dengan penambahan operator
        $fieldOperatorArray = array();
        $operators = array('<', '>', '<=', '>=', '!=');
        $iterator = 0;
        //Concat fieldArray dengan tiap operator :
        foreach ($fieldArray as $startString) {
            foreach ($operators as $operator) {
                $fieldOperatorArray[$iterator] = $startString . ' ' . $operator;
                ++$iterator;
            }
        }

        //Tambah kondisi where dari fieldOperatorArray
        foreach ($fieldOperatorArray as $field) {
            if (isset($options[$field])) {
                $this->db->where($field, $options[$field]);
            }
        }

        //Group by :
        if (isset($options['groupBy'])) {
            $this->db->group_by($options['groupBy']);
        }
        
        $query = $this->db->get($this->table);
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $query->result();
        }
    }

    /**
     * Method delete RSVP Event berdasarkan id. Tested
     * 
     * @param array $options
     * @return type 
     */
    function deleteRSVPEvent($options = array()) {
        //required value :
        if (!$this->_required(array($this->id), $options)) {
            return false;
        }

        $this->db->where($this->id, $options[$this->id]);
        $this->db->delete($this->table);
    }

    /**
     * Mengembalikan false jika array $data tidak berisi semua field key (kolom) $required
     * Untuk setiap anggota array $required ini, $data[angggota $required] wajib ada
     * @param array $required, berisi field field yang harus ada
     * @param array $data, data yang dicek
     * @return bool 
     */
    function _required($required, $data) {
        foreach ($required as $field) {
            if (!isset($data[$field]))
                return false;
        }
        return true;
    }

    /**
     * Merging array $options, sehingga terisi nilai dari $defaults
     * @param array $defaults, array yang berisi nilai default
     * @param array $options, array yang akan di merge dengan $defaults
     * @return array 
     */
    function _default($defaults, $options) {
        return array_merge($defaults, $options);
    }

}

?>
