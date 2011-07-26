<?php
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
        $data['body_id'] = 'sign_up_body';
        
        /*** get list of unit (education) ***/
        $this->load->model('unit', 'unitModel');
        $option = array('columnSelect'=>'label');
        $getUnit = $this->unitModel->getUnits($option);
        $unit_list = array(
            '-' => '-'
        );
        if ($getUnit) {
            foreach ($getUnit as $unit) {
                $unit_list[$unit->label] = $unit->label;
            }
        }
        $data['unit_list'] = $unit_list;
        /*** end of get unit list ***/
        
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
        $optionsTahun = array('last_unit_id' => $idUnit, 'columnSelect' => 'graduate_year', 'distinct' => true, 'sortBy' => 'graduate_year', 'sortDirection' => 'desc');
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
            $tempAlumni[$i] = array('id' => $getReturnNama[$i]->id, 'name' => $getReturnNama[$i]->name, 'is_registered'=>$getReturnNama[$i]->is_registered);
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
                $text = 'Please try to remember your birthdate';
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
        $this->form_validation->set_rules('email','Email', 'required|valid_email|callback_email_check');
        $this->form_validation->set_rules('password','Password', 'required');
        $this->form_validation->set_rules('repassword','Retype Password', 'required|matches[password]');
        
        $alumni = array(
            'id'=>$id,
            'name'=>$name
        );
        
        if ($this->form_validation->run($this)== false) {
            $data['alumni']=$alumni;
            $data['falseref']=true;
            $this->load->view('sign_up/verification', $data);
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $hash_password = md5($password);
            $batas = $email.'</email>'.$hash_password;
            $url_encrypt = urlencode(base64_encode($batas));
            $message = 'Dear '.$name.', '.br(1);
            $message .= 'Thanks for becoming our member. To finish your registration process please click the link below.'.br(1);
            $message .= anchor(site_url('sign_up/verify_mail/'.$id.'/'.$url_encrypt));
            
            // send verification email to her/his mail
//            $this->load->library('email');
//
//            $this->email->from('admin@adminsanur.com', 'Admin web sanur');
//            $this->email->to($email);
//            $this->email->subject('Santa Ursula Alumni WebSite - Email Verification');
//            $this->email->message($message);
            echo $message;
        }
    }
    
    function email_check($str) {
        $this->load->model('user','userModel');
        $options = array('email'=>$str);
        $getUser = $this->userModel->getUsers($options);
        if (is_bool($getUser)) {
            return true;
        } else {
            $this->form_validation->set_message('email_check', 'Email %s already used.');
            return false;
        }
            
    }
    
    function verify_mail() {
        $array = $this->uri->uri_to_assoc(2);
        $id = $array['verify_mail'];
        $array = $this->uri->uri_to_assoc(3);
        $msg = base64_decode(urldecode($array[$id]));
        $input = explode('</email>', $msg);
        if (count($input)!=2)
            show_404 ();
        $email = $input[0];
        $password = $input[1];
        //Load model :
        $this->load->model('alumni', 'alumniModel');
        $this->load->model('user', 'userModel');

        //Update tabel alumni (status register)
        $optionsUpdate = array('id'=>$id, 'is_registered'=>1);
        $getReturnUpdate = $this->alumniModel->updateAlumni($optionsUpdate);
        if (is_bool($getReturnUpdate))
            show_404 ();
        //Ambil semua data dari tabel alumni ke tabel user :
        $optionsGetUser = array('id'=>$id);
        $getUser = $this->alumniModel->getAlumnis($optionsGetUser);

        //Insert ke tabel user
        $optionsInsert = array(
                                'name'=>$getUser[0]->name, 'email'=>$email,
                                'password'=>$password, 'birthdate'=>$getUser[0]->birthdate,
                                'graduate_year' =>$getUser[0]->graduate_year, 'last_unit_id'=>$getUser[0]->last_unit_id);
        $getReturnInsert = $this->userModel->addUser($optionsInsert);
        if (is_bool($getReturnInsert))
            show_404 ();
        /*** Insert inisialisasi ke tabel visibility ***/
        $this->load->model('visibility_status', 'visibilityModel');
        $option = array(
            'user_id' => $getReturnInsert
        );
        $getVisibilityInsert = $this->visibilityModel->addVisibilityStatus($option);
        if (is_bool($getVisibilityInsert))
            show_404 ();
        /******/
        
        // send message success
        $message['status'] = 'Success';
        $message['message'] = 'Registration is completed.'.br(1).'Click '.anchor('sign_in','here').' to sign in.';
        $message['page_before'] = 'Sign up';
        $message['page_link'] = 'sign_up';

        // redirect ke info view
        $this->session->set_flashdata('message', $message);
        redirect('info/show','refresh');
        
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
