<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of event
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

class Event_Model extends CI_Model{
    //put your code here
    var $table              = 'event';
    var $id                 = 'id';
    var $title              = 'title';
    var $description        = 'description';
    var $when               = 'when';
    var $where              = 'where';
    var $category_event_id  = 'category_event_id';
    var $image_url          = 'image_url';
    /**
     * Konstruktor
     */
    function __construct() {
        parent::__construct();
    }
    
    /**
     * Konstruktor
     */
    function Event_Model() {
        parent::__construct();
    }
    
   /**
    * Method addAlumni : tambah alumni, no null allowed. Ini udah tested
    * 
    * option: values
    * --------------
    * title                 required
    * description           required
    * when                  required
    * where                 required
    * category_event_id     required
    * image_url 
    * 
    * @param array $options
    * @return type 
    */
    function addEvent($options = array()) {
        //Cek yang required :
        if (!$this->_required(array($this->title, 
                                    $this->description, 
                                    $this->when, 
                                    $this->where, 
                                    $this->category_event_id), $options)) {
            return false;
        }
            
        //Isi ke database, at this step, si $options harusnya udah memenuhi syarat isset
        $fieldArray = array($this->title, $this->description, $this->when, $this->where, $this->category_event_id, $this->image_url);
        foreach($fieldArray as $field) {
                $this->db->set($field, $options[$field]);
        }
        
        //Jalankan query :
        $this->db->insert($this->table);
        
        //Kembaliin id dari row yang diinsert :
        return $this->db->insert_id();
    }
    
    /**
     * Method updateCategoryEvent : update tabel CategoryEvent yang memenuhi id tertentu.
     * 
     * option: values
     * --------------
     * id               field id buat kriteria where
     * title                 required
     * description           required
     * when                  required
     * where                 required
     * category_event_id     required
     * image_url 
     * 
     * @param array $options
     * @return bool/int  
     */
    function updateEvent($options = array()) {
        // required (id harus ada) :
        if (!$this->_required(array($this->id), $options))
                return false;
        
        //Set dari field :
        $fieldArray = array($this->title, $this->description, $this->when, $this->where, $this->category_event_id, $this->image_url);
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
     * Method getEvents, mengembalikan array of event.
     * 
     * option : values
     * ---------------
     * id               field kriteria id untuk klause where
     * title 
     * description
     * when       
     * where      
     * category_event_id
     * image_url 
     *
     * columnSelect     kolom yang mau diselect
     * distinct         true jika Select distinct, false ato kosong kalo engga
     * sortBy           field kriteria kolom mana yang akan disort
     * sortDirection    (asc, desc) sorting ascending atau descending
     * 
     * @param array $options
     * @return array result() 
     */
    function getEvents($options = array()) {
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
        $fieldArray = array($this->id,
                            $this->title, 
                            $this->description, 
                            $this->when, 
                            $this->where, 
                            $this->category_event_id,
                            $this->image_url);
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
     * Method delete event berdasarkan id.
     * 
     * @param array $options
     * @return type 
     */
    function deleteEvent($options = array()) {
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
