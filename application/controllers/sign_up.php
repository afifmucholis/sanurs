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
        $data['show_calendar'] = 1;
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
    
    function verify_birthdate() {
        $birthdate = $this->input->post('birthdate');
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        
        //Cek bener gak ini birthdatenya dari tabel alumni :
        $this->load->model('alumni', 'alumniModel');
        $options = array('id'=>$id, 'columnSelect'=>'birthdate');
        $getReturn =  $this->alumniModel->getAlumnis($options);
        if (is_bool($getReturn)&& !$getReturn) {
            //Gagal :
            $text = 'error';
            $success=0;
        } else {
            if ($birthdate==$getReturn[0]->birthdate) {
                //Berhasil : redirect ke verify email ma password
                $alumni=array('id'=>$id, 'name'=>$name);
                $data['alumni'] = $alumni;
                $text = $this->load->view('sign_up/verification',$data,true);
                $success = 1;
            } else {
                $text = 'Coba Lagi';
                $success=0;
            }
        }
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('text' => $text, 'success'=>$success)));
    }
    
    function verification() {
        $array = $this->uri->uri_to_assoc(2);
        $idAlumni = $array['verification'];
        
        //Load model : 
        $this->load->model('alumni', 'alumniModel');

        //Get nama dengan id=$idAlumni :
        $optionsAlumni = array('id' => $idAlumni);
        $getReturn = $this->alumniModel->getAlumnis($optionsAlumni);
        $name = $getReturn[0]->name;
        
        $alumni=array('id'=>$idAlumni, 'name'=>$name);
        $data['alumni'] = $alumni;
        $this->load->view('sign_up/verification',$data);
    }
    
    function verify() {
        $this->load->helper();
        $this->load->library('form_validation');
        
        //Dapet id ma nama :
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        
        //Set Rule dari email dan password :
        $this->form_validation->set_rules('email','Email', 'required|valid_email');
        $this->form_validation->set_rules('password','Password', 'required');
        $this->form_validation->set_rules('repassword','Retype Password', 'required|matches[password]');
        
        $alumni = array(
            'id'=>$id,
            'name'=>$name
        );
        
        if ($this->form_validation->run()== false) {
            $data['alumni']=$alumni;
            $data['falseref']=true;
            $this->load->view('sign_up/verification', $data);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            //Load model :
            $this->load->model('alumni', 'alumniModel');
            $this->load->model('user', 'userModel');
            
            //Update tabel alumni (status register)
            $optionsUpdate = array('id'=>$alumni['id'], 'is_registered'=>1);
            $getReturnUpdate = $this->alumniModel->updateAlumni($optionsUpdate);
            
            //Insert ke tabel user
            $optionsInsert = array(
                                    'name'=>$alumni['name'], 'email'=>$email,
                                    'password'=>$password, 'birthdate'=>a,
                                    ''

                                     );
            $getReturnInsert = $this->userModel->addUser($optionsInsert);
            
            $this->load->view('sign_up/signup_success');
        }
    }
    
    function form_birthdate() {
        $data['alumni_id'] = $this->input->post('alum_id');
        $data['name'] = $this->input->post('name');
        $text = $this->load->view('popup/verify_birthdate',$data,true);
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('text' => $text)));
    }

}

?>
