<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of work_experience
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

class Work_Experience extends CI_Model{
    //put your code here
    var $table              = 'work_experience';
    var $id                 = 'id';
    var $user_id            = 'user_id';
    var $company            = 'company';
    var $year               = 'year';
    var $position           = 'position';
    var $address            = 'address';
    var $telephone          = 'telephone';
    var $fax                = 'fax';
    var $work_hp            = 'work_hp';
    var $work_email         = 'work_email';
    var $is_current_work    = 'is_current_work'; 
    
    /**
     * Konstruktor
     */
    function __construct() {
        parent::__construct();
    }
    
    /**
     * Konstruktor
     */
    function Work_Experience() {
        parent::__construct();
    }
    
   /**
    * Method addWorkExperience : tambah work experience, no null allowed.
    * 
    * option: values
    * --------------
    * user_id       required
    * company       
    * year
    * position
    * address 
    * telephone
    * fax
    * work_hp
    * work_email
    * is_current_work
    * 
    * @param array $options
    * @return type 
    */
    function addWorkExperience($options = array()) {
        //Cek yang required :
        if (!$this->_required(array($this->user_id), $options)) {
            return false;
        }
            
        //Isi ke database, at this step, si $options harusnya udah memenuhi syarat isset
        $fieldArray = array($this->user_id, $this->company, $this->year, 
                            $this->position, $this->address, $this->telephone,
                            $this->fax, $this->work_hp, $this->work_email, $this->is_current_work);
        foreach($fieldArray as $field) {
                $this->db->set($field, $options[$field]);
        }
        
        //Jalankan query :
        $this->db->insert($this->table);
        
        //Kembaliin id dari row yang diinsert :
        return $this->db->insert_id();
    }
    
    /**
     * Method updateWorkExperience : update tabel work experience yang memenuhi id tertentu.
     * 
     * option: values
     * --------------
     * id               field id buat kriteria where
     * user_id
     * company       
     * year
     * position
     * address 
     * telephone
     * fax
     * work_hp
     * work_email
     * is_current_work
     * 
     * @param array $options
     * @return bool/int  
     */
    function updateWorkExperience($options = array()) {
        // required (id harus ada) :
        if (!$this->_required(array($this->id), $options))
                return false;
        
        //Set dari field :
        $fieldArray = array($this->user_id, $this->company, $this->year, 
                            $this->position, $this->address, $this->telephone,
                            $this->fax, $this->work_hp, $this->work_email, $this->is_current_work);
        foreach ($fieldArray as $field) {
            if (isset ($options[$field])) {
                $this->db->set($field, $options[$field]);
            }
        }
        $this->db->where($this->id,$options[$this->id]);
        
        //Jalankan query :
        $this->db->update($this->table);
        
        //Kembalikan jumlah row yang terupdate, atau false jika row tdak terupdate
        return $this->db->affected_rows();
    }
    
    /**
     * Method getWorkExperiences, mengembalikan array of experience.
     * 
     * option : values
     * ---------------
     * id               field kriteria id untuk klause where
     * user_id
     * company       
     * year
     * position
     * address 
     * telephone
     * fax
     * work_hp
     * work_email
     * is_current_work
     * 
     * columnSelect     kolom yang mau diselect
     * distinct         true jika Select distinct, false ato kosong kalo engga
     * sortBy           field kriteria kolom mana yang akan disort
     * sortDirection    (asc, desc) sorting ascending atau descending
     * 
     * @param array $options
     * @return array result() 
     */
    function getWorkExperiences($options = array()) {
        //nilai default :
        $options = $this->_default(array('sortDirection' =>'asc'), $options);
        
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
        $fieldArray = array($this->id, $this->user_id, $this->company, $this->year, 
                            $this->position, $this->address, $this->telephone,
                            $this->fax, $this->work_hp, $this->work_email, $this->is_current_work);
        foreach ($fieldArray as $field) {
            if (isset ($options[$field])) {
                $this->db->where($field, $options[$field]);  
            }
        }
        
        //Sorting : 
        if (isset($options['sortBy'])) {
            $this->db->order_by($options['sortBy'], $options['sortDirection']);
        }
        
        $query = $this->db->get($this->table);
        if ($query->num_rows()==0) {
            return false;
        } else {
            return $query->result();
        }
    }

    /**
     * Method delete work experience berdasarkan id.
     * 
     * @param array $options
     * @return type 
     */
    function deleteWorkExperience($options = array()) {
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
            if (!isset ($data[$field]))
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
