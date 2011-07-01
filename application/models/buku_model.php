<?php
    /** * @property CI_Loader $load
    * @property CI_Form_validation $form_validation
    * @property CI_Input $input
    * @property CI_Email $email
    * @property CI_DB_active_record $db
    * @property CI_DB_forge $dbforge
    */
    class Buku_model extends CI_Model {
        function Buku_model() {
            parent::__construct();            
        }
        function getBuku() {
            $data = $this->db->get('tb_buku');
            return $data;
        }
    }
?>