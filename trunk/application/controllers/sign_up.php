<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sign_up
 *
 * @author user
 */

/** * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 */
class sign_up extends CI_Controller {

    function index() {
        $data['title'] = 'Sign Up';
        $data['main_content'] = 'sign_up/sign_up_view';
        $data['struktur'] = $this->getStruktur();
        $this->load->view('includes/template', $data);
    }

    function submit() {
        $array = $this->uri->uri_to_assoc(3);
        if (isset($array['jenjang']) && !isset($array['tahun'])) {
            $data['jenjang'] = $array['jenjang'];
            $data['title'] = 'Sign Up';
            $data['main_content'] = 'sign_up/sign_up_view';
            $data['struktur'] = $this->getStruktur();
            $this->load->view('includes/template', $data);
        } else if (isset($array['jenjang']) && isset($array['tahun'])) {
            
        }
    }

    function daftar_tahun() {
        $jenjang = $this->input->get('jenjang');

        //Load model
        $this->load->model('unit', 'unitModel');
        $this->load->model('alumni', 'alumniModel');

        //Get Id dari unit
        $optionsUnit = array('label' => $jenjang);
        $getReturnLevel = $this->unitModel->getUnits($optionsUnit);
        $idUnit = $getReturnLevel[0]->id;

        //Get Distinct 
        $optionsTahun = array('last_unit_id' => $idUnit, 'columnSelect' => 'graduate_year', 'distinct' => true, 'sortDirection' => 'desc');
        $getReturnTahun = $this->alumniModel->getAlumnis($optionsTahun);

        $Arraytahun = array();
        $Arraytahun[0] = '-';
        if (!is_bool($getReturnTahun)) {
            for ($i = 0; $i < count($getReturnTahun); ++$i) {
                $Arraytahun[$i + 1] = $getReturnTahun[$i]->graduate_year;
            }
        }


        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('tahun' => $Arraytahun, 'size' => count($Arraytahun))));
    }

    function daftar_nama() {
        $jenjang = $this->input->get('jenjang');
        $tahun = $this->input->get('tahun');

        //Load model : 
        $this->load->model('unit', 'unitModel');
        $this->load->model('alumni', 'alumniModel');

        //Get Id dari unit
        $optionsUnit = array('label' => $jenjang);
        $getReturnLevel = $this->unitModel->getUnits($optionsUnit);
        $idUnit = $getReturnLevel[0]->id;

        //Get daftar nama dengan last_unit_id=$idUnit dan graduate_year=$tahun
        $optionsNama = array('last_unit_id' => $idUnit, 'graduate_year' => $tahun, 'sortBy' => 'name');
        $getReturnNama = $this->alumniModel->getAlumnis($optionsNama);

        $tempAlumni = array();
        for ($i = 0; $i < count($getReturnNama); ++$i) {
            $tempAlumni[$i] = array('id' => $getReturnNama[$i]->id, 'name' => $getReturnNama[$i]->name);
        }
        $data['alumni'] = $tempAlumni;
        $this->load->view('sign_up/list_alumni', $data);
    }

    function getStruktur() {
        $struktur = array(
            array(
                'islink' => 1,
                'link' => 'home',
                'label' => 'Home'
            ),
            array(
                'islink' => 0,
                'label' => 'Sign up'
            )
        );
        return $struktur;
    }

}

?>
