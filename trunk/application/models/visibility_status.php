<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of visibility_status
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
class Visibility_Status extends CI_Model {

    //put your code here
    var $table = 'visibility_status';
    var $id = 'id';
    var $user_id = 'user_id';
    var $home_address = 'home_address';
    var $home_telephone = 'home_telephone';
    var $handphone = 'handphone';
    var $email = 'email';
    var $interest = 'interest';
    var $birthdate = 'birthdate';
    var $S1 = 'S1';
    var $S2 = 'S2';
    var $S3 = 'S3';
    var $work_experience = 'work_experience';
    var $current_experience = 'current_experience';

    /**
     * Konstruktor
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * Konstruktor
     */
    function Visibility_Status() {
        parent::__construct();
    }

    /**
     * Method addVisibilityStatus : tambah visibility status, no null allowed.
     * 
     * option: values
     * --------------
     * user_id               required
     * home_address          required, but default = 0 (not visible)  
     * home_telephone        required, but default = 0 (not visible)
     * handphone             required, but default = 0 (not visible)
     * email                 required, but default = 0 (not visible)
     * interest              required, but default = 0 (not visible)
     * birthdate             required, but default = 0 (not visible)
     * S1                    required, but default = 0 (not visible)
     * S2                    required, but default = 0 (not visible)
     * S3                    required, but default = 0 (not visible)
     * work_experience       required, but default = 0 (not visible)
     * current_experience    required, but default = 0 (not visible)
     * 
     * @param array $options
     * @return type 
     */
    function addVisibilityStatus($options = array()) {
        //Isi nilai default
        $options = $this->_default(array($this->home_address => 0,
                    $this->home_telephone => 0,
                    $this->handphone => 0,
                    $this->email => 0,
                    $this->interest => 0,
                    $this->birthdate => 0,
                    $this->S1 => 0,
                    $this->S2 => 0,
                    $this->S3 => 0,
                    $this->work_experience => 0,
                    $this->current_experience => 0), $options);

        //Cek yang required :
        if (!$this->_required(array($this->user_id), $options)) {
            return false;
        }

        //Isi ke database, at this step, si $options harusnya udah memenuhi syarat isset
        $fieldArray = array($this->user_id, $this->home_address, $this->home_telephone, $this->handphone, $this->email,
            $this->interest, $this->birthdate, $this->S1, $this->S2, $this->S3, $this->work_experience, $this->current_experience);
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
     * Method updateVisibilityStatus : update tabel VisibilityStatus yang memenuhi id tertentu.
     * 
     * option: values
     * --------------
     * id               field id buat kriteria where
     * user_id
     * home_address
     * home_telephone
     * handphone     
     * email         
     * interest      
     * birthdate
     * S1            
     * S2            
     * S3            
     * work_experience
     * current_experience
     * 
     * @param array $options
     * @return bool/int  
     */
    function updateVisibilityStatus($options = array()) {
        // required (id harus ada) :
        if (!$this->_required(array($this->id), $options))
            return false;

        //Set dari field :
        $fieldArray = array($this->user_id, $this->home_address, $this->home_telephone, $this->handphone, $this->email,
            $this->interest, $this->birthdate, $this->S1, $this->S2, $this->S3, $this->work_experience, $this->current_experience);
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
     * Method getVisibilityStatuses, mengembalikan array of Visibility Status.
     * 
     * option : values
     * ---------------
     * id               
     * user_id
     * home_address
     * home_telephone
     * handphone     
     * email         
     * interest      
     * birthdate
     * S1            
     * S2            
     * S3            
     * work_experience
     * current_experience
     * 
     * limit            limits the number of returned records
     * offset           how many records to bypass before returning a record (limit required)
     * columnSelect     kolom yang mau diselect
     * distinct         true jika Select distinct, false ato kosong kalo engga
     * sortBy           field kriteria kolom mana yang akan disort
     * sortDirection    (asc, desc) sorting ascending atau descending
     * groupBy          grouping query
     * 
     * @param array $options
     * @return array result() 
     */
    function getVisibilityStatuses($options = array()) {
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
        $fieldArray = array($this->id, $this->user_id, $this->home_address,
            $this->home_telephone, $this->handphone, $this->email,
            $this->interest, $this->birthdate, $this->S1, $this->S2, $this->S3,
            $this->work_experience, $this->current_experience);
        foreach ($fieldArray as $field) {
            if (isset($options[$field])) {
                $this->db->where($field, $options[$field]);
            }
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
        
        // If limit / offset are declared (usually for pagination)
        if (isset($options['limit']) && isset($options['offset']))
            $this->db->limit($options['limit'], $options['offset']);
        else if (isset($options['limit']))
            $this->db->limit($options['limit']);

        //Sorting : 
        if (isset($options['sortBy'])) {
            $this->db->order_by($options['sortBy'], $options['sortDirection']);
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
     * Method delete Visibility Status berdasarkan id.
     * 
     * @param array $options
     * @return type 
     */
    function deleteVisibilityStatus($options = array()) {
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
