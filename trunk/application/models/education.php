<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of education
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
class Education extends CI_Model {

    //put your code here
    var $table = 'education';
    var $id = 'id';
    var $user_id = 'user_id';
    var $level_id = 'level_id';
    var $graduate_year = 'graduate_year';
    var $school = 'school';
    var $major = 'major';
    var $minor = 'minor';

    /**
     * Konstruktor
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * Konstruktor
     */
    function Education() {
        parent::__construct();
    }

    /**
     * Method addEducation : tambah education, no null allowed.
     * 
     * option: values
     * --------------
     * user_id           required
     * level_id          required
     * graduate_year 
     * school
     * major
     * minor
     * @param array $options
     * @return type 
     */
    function addEducation($options = array()) {
        //Cek yang required :
        if (!$this->_required(array($this->user_id,
                    $this->level_id), $options)) {
            return false;
        }

        //Isi ke database, at this step, si $options harusnya udah memenuhi syarat isset
        $fieldArray = array($this->user_id, $this->level_id, $this->graduate_year, $this->school, $this->major, $this->minor);
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
     * Method updateEducation : update tabel Education yang memenuhi id tertentu.
     * 
     * option: values
     * --------------
     * id               field id buat kriteria where
     * user_id          
     * level_id         
     * graduate_year 
     * school
     * major
     * minor
     * 
     * @param array $options
     * @return bool/int  
     */
    function updateEducation($options = array()) {
        // required (id harus ada) :
        if (!$this->_required(array($this->id), $options))
            return false;

        //Set dari field :
        $fieldArray = array($this->user_id, $this->level_id, $this->graduate_year, $this->school, $this->major, $this->minor);
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
     * Method getEducations, mengembalikan array of education. Tested
     * 
     * option : values
     * ---------------
     * id               field kriteria id untuk klause where
     * user_id          
     * level_id         
     * graduate_year 
     * school
     * major
     * minor
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
    function getEducations($options = array()) {
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
            $this->level_id,
            $this->graduate_year,
            $this->school,
            $this->major,
            $this->minor);
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
     * Method delete education berdasarkan id.
     * 
     * @param array $options
     * @return type 
     */
    function deleteEducation($options = array()) {
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
