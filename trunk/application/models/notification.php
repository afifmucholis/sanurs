<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of notification
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
class Notification extends CI_Model {

    //put your code here
    var $table = 'notification';
    var $id = 'id';
    var $message = 'message';
    var $date = 'date';
    var $status_read = 'status_read';
    var $link = 'link';
    
    /**
     * Konstruktor
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * Konstruktor
     */
    function Notification() {
        parent::__construct();
    }

    /**
     * Method addNotification : tambah notification, no null allowed.
     * 
     * option: values
     * --------------
     * message        required
     * date           required. Default mysqlnya now 
     * status_read    required. Defaulnya 0 dari model ini
     * link           null allowed
     * 
     * @param array $options
     * @return type 
     */
    function addNotification($options = array()) {
        //Isi nilai default
        //Pada saat penambahan alumni, isRegistered diisi 0 (belum register)
        $options = $this->_default(array($this->status_read => 0), $options);

        //Cek yang required :
        if (!$this->_required(array($this->message), $options)) {
            return false;
        }

        //Isi ke database, at this step, si $options harusnya udah memenuhi syarat isset
        $fieldArray = array($this->message, $this->date, $this->status_read, $this->link);
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
     * Method updateNotification : update tabel Notification yang memenuhi id tertentu.
     * 
     * option: values
     * --------------
     * id               field id buat kriteria where
     * message        
     * date           
     * status_read    
     * link           
     * 
     * @param array $options
     * @return bool/int  
     */
    function updateNotification($options = array()) {
        // required (id harus ada) :
        if (!$this->_required(array($this->id), $options))
            return false;

        //Set dari field :
        $fieldArray = array($this->message, $this->date, $this->status_read, $this->link);
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
     * Method getNotifications, mengembalikan array of notification
     * 
     * option : values
     * ---------------
     * id               field kriteria id untuk klause where
     * message        
     * date           
     * status_read    
     * link  
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
    function getNotifications($options = array()) {
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
            $this->message,
            $this->date,
            $this->status_read,
            $this->link);
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

        //Penanganan operator LIKE :
        foreach ($fieldArray as $startString) {
            $fieldLike = $startString . ' LIKE';
            if (isset($options[$fieldLike])) {
                $this->db->like($startString,$options[$fieldLike]);
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
     * Method delete notification berdasarkan id
     * 
     * @param array $options
     * @return type 
     */
    function deleteNotification($options = array()) {
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