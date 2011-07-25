<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of alumni
 *
 * @author Danzz
 */
/** * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 */
class Alumni_con extends CI_Controller {
    
    function import() {
        if ($this->session->userdata('name')=='' || $this->session->userdata('isadmin')!=1) {
            redirect('home','refresh');
        }
        
        // load model alumni
        $this->load->model('alumni','alumniModel');
        
       // Load the spreadsheet reader library
        $this->load->library('excel_reader');

        // Set output Encoding.
        $this->excel_reader->setOutputEncoding('CP1251');
        $this->excel_reader->read('./res/data/2003-2008.xls'); // relative path to .xls
        
        error_reporting(E_ALL ^ E_NOTICE);
        
        // Sheet 1
        $data = $this->excel_reader->sheets[0] ;
        for ($i = 3; $i <= $data['numRows']; $i++) {
            $col_name = 3;
            $col_tk = 4;
            $col_sd = 5;
            $col_smp = 6;
            $col_sma = 7;
            $col_date_1 = 14;
            $col_date_2 = 16;
            try {
                if ($data['cells'][$i][$col_name]=='')
                    throw new Exception('Nama kosong');
                $name=$data['cells'][$i][$col_name];
                if ($data['cells'][$i][$col_date_1]=='')
                    throw new Exception('Tanggal lahir kosong');
                $birthdate=$data['cells'][$i][$col_date_2];
                if ($data['cells'][$i][$col_sma]!='') {
                    $graduate_year=$data['cells'][$i][$col_sma];
                    $last_unit_id=4;
                } else if ($data['cells'][$i][$col_smp]!='') {
                    $graduate_year=$data['cells'][$i][$col_smp];
                    $last_unit_id=3;
                } else if ($data['cells'][$i][$col_sd]!='') {
                    $graduate_year=$data['cells'][$i][$col_sd];
                    $last_unit_id=2;
                } else if ($data['cells'][$i][$col_tk]!='') {
                    $graduate_year=$data['cells'][$i][$col_tk];
                    $last_unit_id=1;
                } else
                    throw new Exception('Lulusan Terakhir kosong');
                
                $options=array('name'=>$name,'birthdate'=>$birthdate,'graduate_year'=>$graduate_year,'last_unit_id'=>$last_unit_id);
                $addAlumni = $this->alumniModel->addAlumni($options);
                if (is_bool($addAlumni))
                    throw new Exception('Database error.');
                echo $name.', '.$birthdate.', '.$graduate_year.', '.$last_unit_id;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            echo "<br/>";
        }	
    }
    
}

?>
