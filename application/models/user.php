<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
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
class User extends CI_Model {

    //put your code here
    var $table = 'user';
    var $id = 'id';
    var $name = 'name';
    var $nickname = 'nickname';
    var $email = 'email';
    var $password = 'password';
    var $birthdate = 'birthdate';
    var $gender_id = 'gender_id';
    var $home_address = 'home_address';
    var $home_telephone = 'home_telephone';
    var $handphone = 'handphone';
    var $graduate_year = 'graduate_year';
    var $last_unit_id = 'last_unit_id';
    var $profpict_url = 'profpict_url';
    var $location_latitude = 'location_latitude';
    var $location_longitude = 'location_longitude';
    var $status_admin = 'status_admin';

    /**
     * Konstruktor
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * Konstruktor
     */
    function User() {
        parent::__construct();
    }

    /**
     * Method addUser : tambah User, no null allowed.
     * 
     * option: values
     * --------------
     * name             required
     * nickname
     * email            required
     * password         required
     * birthdate        required
     * gender_id        
     * home_address     
     * home_telephone   
     * handphone        
     * graduate_year    required
     * last_unit_id     required
     * profpict_url
     * 
     * location_latitude
     * location_longitude  
     * status_admin     default = 0 (user biasa)
     * 
     * @param array $options
     * @return type 
     */
    function addUser($options = array()) {
        //Isi nilai default
        //User biasa = 0
        $options = $this->_default(array($this->status_admin => 0), $options);
        
        
        //Cek yang required :
        if (!$this->_required(array($this->name,
                    $this->email,
                    $this->password,
                    $this->birthdate,
                    $this->graduate_year,
                    $this->last_unit_id), $options)) {
            return false;
        }

        //Isi ke database :
        $fieldArray = array($this->name, $this->nickname, $this->email,
            $this->birthdate, $this->gender_id,
            $this->home_address, $this->home_telephone,
            $this->handphone, $this->graduate_year,
            $this->last_unit_id, $this->profpict_url,
            $this->location_latitude, $this->location_longitude);
        foreach ($fieldArray as $field) {
            if (isset($options[$field])) {
                $this->db->set($field, $options[$field]);
            }
        }
        //Jangan lupa password di md5 :
        $this->db->set($this->password, md5($options[$this->password]));

        //Jalankan query :
        $this->db->insert($this->table);

        //Kembaliin id dari row yang diinsert :
        return $this->db->insert_id();
    }

    /**
     * Method updateUser : update tabel User yang memenuhi id tertentu.
     * 
     * option: values
     * --------------
     * id               field id buat kriteria where
     * name             
     * nickname
     * email            
     * password         
     * birthdate        
     * gender_id        
     * home_address     
     * home_telephone   
     * handphone        
     * graduate_year    
     * last_unit_id     
     * profpict_url
     * location_latitude
     * location_longitude
     * status_admin  
     * 
     * 
     * @param array $options
     * @return bool/int  
     */
    function updateUser($options = array()) {
        // required (id harus ada) :
        if (!$this->_required(array($this->id), $options))
            return false;

        //Set dari field :
        $fieldArray = array($this->name, $this->nickname, $this->email,
            $this->birthdate, $this->gender_id,
            $this->home_address, $this->home_telephone,
            $this->handphone, $this->graduate_year,
            $this->last_unit_id, $this->profpict_url,
            $this->location_latitude, $this->location_longitude,
            $this->status_admin);
        foreach ($fieldArray as $field) {
            if (isset($options[$field])) {
                $this->db->set($field, $options[$field]);
            }
        }
        //Yang password jangan lupa :
        if (isset($options[$this->password])) {
            $this->db->set($this->password, md5($options[$this->password]));
        }

        $this->db->where($this->id, $options[$this->id]);

        //Jalankan query :
        $this->db->update($this->table);

        //Kembalikan jumlah row yang terupdate, atau false jika row tdak terupdate
        return $this->db->affected_rows();
    }

    /**
     * Method getUsers, mengembalikan array of users.
     * 
     * option : values
     * ---------------
     * id               field id buat kriteria where
     * name
     * nickname             
     * email            
     * password         
     * birthdate        
     * gender_id        
     * home_address     
     * home_telephone   
     * handphone        
     * graduate_year    
     * last_unit_id     
     * profpict_url
     * location_latitude
     * location_longitude
     * status_admin
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
    function getUsers($options = array()) {
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
        $fieldArray = array($this->id, $this->name, $this->nickname, $this->email,
            $this->birthdate, $this->gender_id,
            $this->home_address, $this->home_telephone,
            $this->handphone, $this->graduate_year,
            $this->last_unit_id, $this->profpict_url,
            $this->location_latitude, $this->location_longitude,
            $this->status_admin);
        foreach ($fieldArray as $field) {
            if (isset($options[$field])) {
                $this->db->where($field, $options[$field]);
            }
        }
        //Yang password jangan lupa :
        if (isset($options[$this->password])) {
            $this->db->where($this->password, md5($options[$this->password]));
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
     * Method deleteUser berdasarkan id.
     * 
     * @param array $options
     * @return type 
     */
    function deleteUser($options = array()) {
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