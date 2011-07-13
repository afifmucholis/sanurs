<?php 
/** * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 */
class profile extends CI_Controller {
    function index() {
        if ($this->session->userdata('name')==null) {
            redirect('/home', 'refresh');
        }
        $data['title'] = 'Profile';
        $data['main_content'] = 'profile/my_profile_view';
        $data['struktur'] = $this->getStruktur('Your Profile');
        // get user profile info
        $user_id = $this->session->userdata('user_id');
        
        $data['user_data'] = $this->setUserData($user_id);
        
        $this->load->view('includes/template',$data);
    }
    
    /**
     * user()
     *
     * Menampilkan profile seorang user
     *
     * @param int user User_id passing melalui url uri
     */
    function user() {
        $array = $this->uri->uri_to_assoc(2);
        $user_id = $array['user'];
        if ($this->session->userdata('user_id')==$user_id) { // cek apakah dia melihat profilnya sendiri
            redirect('/profile', 'refresh');
        }
        
        $data['user_data'] = $this->setUserData($user_id);
        $data['title'] = 'Profile - '.$data['user_data']['name'];
        $data['main_content'] = 'profile/show_profile_view';
        $data['struktur'] = $this->getStruktur($data['user_data']['name']);
        // cek apakah bisa add friend
        if ($this->session->userdata('name')==null) {   // belum sign in
            $data['add_as_friend'] = 0;
        } else if (false) {     // cek apakah sudah friend atau belum
            $data['add_as_friend'] = 0;
        } else {
            $data['add_as_friend'] = 1;
        }
        $this->load->view('includes/template',$data);
        
    }
    
    /**
     * editProfile()
     *
     * menampilkan halaman edit user profile
     *
     */
    function editProfile() {
        $data['title'] = 'Edit your profile ';
        $data['main_content'] = 'edit_profile/edit_profile_view';
        $data['struktur'] = $this->getStruktur2('Basic Info');
        $this->load->view('includes/template',$data);
    }
    
    /**
     * edit_basic_info()
     *
     * menampilkan halaman edit basic info user dengan method ajax
     *
     */
    function edit_basic_info() {
        $data['struktur'] = $this->getStruktur2('Basic Info');
        $data['content_edit_view'] = 'edit_profile/edit_basic_info_view';
        // load basic user info
        $this->load->model('user','userModel');
        $options = array('id' => $this->session->userdata('user_id'));
        $getReturn = $this->userModel->getUsers($options);
        if (is_bool($getReturn) && !$getReturn) {
            //gak ada user yang memenuhi
            redirect('/home', 'refresh');
        } else {
            // get gender
            $this->load->model('gender','genderModel');
            $options = array('id' => $getReturn[0]->gender_id);
            $genderLabel = $this->genderModel->getGenders($options);
            if ($getReturn[0]->profpict_url=="")
                $img_url='res/NoPhotoAvailable.jpg';
            else
                $img_url=$getReturn[0]->profpict_url;
            $data['content_edit'] = array(
                'name' => $getReturn[0]->name,
                'img_url' => $img_url,
                'nick_name' => $getReturn[0]->surname,
                'gender' => $genderLabel[0]->label,
                'home_address' => $getReturn[0]->home_address,
                'home_telephone' => $getReturn[0]->home_telephone,
                'handphone' => $getReturn[0]->handphone
            );
        
            $text = $this->load->view($data['content_edit_view'],$data,true);
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('text' => $text, 'struktur'=>$data['struktur'])));
        }
    }
    
    /**
     * submitProfile()
     *
     * mengganti data profile user
     *
     * @param string post->gender gender dari user
     * @param string post->ttl ttl dari user
     * @param string post->alamat alamat dari user
     * @param string post->telfon telfon dari user
     * @param string post->hp hp dari user
     * @param string post->email email dari user
     * @param string post->url_img url_img profpic
     */
    function submitProfile() {
        $this->load->model('user','userModel');
        $user_id = $this->session->userdata('user_id');
        $nick_name = $this->input->post('nick_name');
        $gender = $this->input->post('gender');
        // get gender
        $this->load->model('gender','genderModel');
        $options = array('label' => $gender);
        $getGender_id = $this->genderModel->getGenders($options);
        
        $home_address = $this->input->post('home_address');
        $home_telephone = $this->input->post('home_telephone');
        $handphone = $this->input->post('handphone');
        // proses data disini
        $image_url = substr($this->input->post('url_img'), strlen(base_url()));
        
        $options = array(
            'id'=>$user_id,
            'surname'=>$nick_name,
            'gender'=>$getGender_id[0]->id,
            'home_address'=>$home_address,
            'home_telephone'=>$home_telephone,
            'handphone'=>$handphone
        );
        
        $dir = explode("/",$image_url);
        $ext = explode(".",$image_url);
        if (count($dir)==2) {
            // $image_url still null
            
        } else {
            // cek apakah $default image atau image upload baru
            if ($dir[1]=="temp") {
                // cek file lama kalau ada
                $options2 = array('id'=>$user_id);
                $getReturn = $this->userModel->getUsers($options2);
                $img_lama = $getReturn[0]->profpict_url;
                if ($img_lama!="") {
                    // delete file yang lama
                    unlink('./'.$img_lama);
                }
                // image baru ada di folder temp
                $new_imgurl = 'res/user/user_'.$user_id.'.'.$ext[count($ext)-1];
                 if (rename('./'.$image_url, './'.$new_imgurl)) {
                     $options['profpict_url'] = $new_imgurl;
                 } else {
                     echo 'error moving file';
                 }
            } else {
                // image lama tidak perlu diupdate
            }
        }
        // update database dengan opsi $options
        $cek_bol = $this->userModel->updateUser($options);
        if (is_bool($cek_bol) || count($cek_bol)!=1) {
            // update gagal
            echo 'update gagal';
        } else {
            // update berhasil
            echo 'success update';
        }
    }
    
    /**
     * editLocation()
     *
     * menampilkan halaman edit Location dengan method ajax
     *
     */
    function edit_location() {
        $data['struktur'] = $this->getStruktur2('Location');
        $data['content_edit_view'] = 'edit_profile/edit_location_view';
        $data['content_edit'] = array();
        
        $text = $this->load->view($data['content_edit_view'],$data,true);
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('text' => $text, 'struktur'=>$data['struktur'])));
    }
    
    /**
     * untuk mendapatkan lokasi (latitude-longitude) dari user berdasarkan id
     * 
     * @param type $user_id 
     */
    function get_user_location() {
        // load model user
        $this->load->model('user', 'userModel');
        $option = array('id' => $this->session->userdata('user_id'));
        $getUser = $this->userModel->getUsers($option);
        
        // get location
        $lat = $getUser[0]->location_latitude;
        $lng = $getUser[0]->location_longitude;
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('lat'=>$lat, 'lng'=>$lng)));
    }
    
    /**
     * submitLocation()
     *
     * mengirimkan lokasi dari user
     *
     * @param string post->location lokasi_user
     */
    function submitLocation() {
        $lat = $this->input->post('save_lat');
        $lng = $this->input->post('save_lng');
        
        $options = array(
            'id' => $this->session->userdata('user_id'),
            'location_latitude' => $lat,
            'location_longitude' => $lng
        );
        
        $this->load->model('user', 'userModel');
        $update_location = $this->userModel->updateUser($options); //update location data ke tabel user
    }
    
    /**
     * edit_education()
     *
     * menampilkan halaman edit pendidikan dengan method ajax
     *
     */
    function edit_education() {
        $data['struktur'] = $this->getStruktur2('Education');
        $data['content_edit_view'] = 'edit_profile/edit_education_view';
        $data['content_edit'] = array();
        
        $text = $this->load->view($data['content_edit_view'],$data,true);
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('text' => $text, 'struktur'=>$data['struktur'])));
    }
    
    /**
     * submitPendidikan
     *
     * mengubah history pendidikan user
     *
     * @param string post->s1 college/university
     * @param string post->s1_major major s1
     * @param string post->s1_minor minor s1
     * @param string post->s1_year graduation year
     */
    function submitPendidikan() {
        $highest_edu = $this->input->post('highest_edu');
        if ($highest_edu=='sma') {
            
        } else if ($highest_edu=='d3') {
            
        } else if ($highest_edu=='s1') {
            
        } else if ($highest_edu=='s2') {
            
        } else if ($highest_edu=='s3') {
            
        }
        // redirect ke editPendidikan
       redirect('profile/editWorking', 'refresh');
    }
    
    /**
     * editWorking()
     *
     * menampilkan halaman edit working dengan method ajax
     *
     */
    function edit_working() {
        $user_id = $this->session->userdata('user_id');
        $data['struktur'] = $this->getStruktur2('Working');
        $data['content_edit_view'] = 'edit_profile/edit_working_view';
        $data['content_edit'] = array();
        // load model work_experience
        $this->load->model('work_experience', 'workModel');
        $options = array('user_id'=>$user_id);
        $getWork = $this->workModel->getWorkExperiences($options);
        $working_experience = array();
        $working_current = array();
        if ($getWork) {
            $count=0;
            foreach ($getWork as $work):
                if (!$work->is_current_work) {
                    $working_experience[$count] = $work;
                    $count++;
                } else {
                    // current working
                    $working_current = $work;
                }
            endforeach;
        }
        
        $data['counter'] = count($working_experience)+count($working_current);
        $data['working_experience'] = $working_experience;
        $data['working_current'] = $working_current;
        
        $text = $this->load->view($data['content_edit_view'],$data,true);
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('text' => $text, 'struktur'=>$data['struktur'])));
    }
    
    /**
     * add_working_field()
     *
     * menambahkan field form working experience
     *
     */
    function add_working_field() {
        $data = array(
            'counter' => ($this->input->post('counter')+1),
            'status' => 'new'
        );
        $text = $this->load->view('edit_profile/work_form',$data,true);
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('text' => $text, 'counter'=>$data['counter'])));
    }
    
    /**
     * submitWorking()
     *
     * memasukkan data working experience/current working
     *
     * @param int post->counter jumlah field yang diisi
     */
    function submitWorking() {
        $user_id = $this->session->userdata('user_id');
        // load model work_experience
        $this->load->model('work_experience', 'workModel');
        $options = array('user_id'=>$user_id);
        $getWork = $this->workModel->getWorkExperiences($options);
        $id_array = array();
        foreach($getWork as $work) :
            array_push($id_array, $work->id);
        endforeach;
        
        $old_array = array();
        $old = '_old_';
        $new = '_new_';
        $i=0;
        $counter = $this->input->post('counter');
        for($i=0;$i<=$counter;$i++) {
            $status = '';
            if ($this->input->post('id'.$old.$i)) { // out work id
                $work_id = $this->input->post('id'.$old.$i);
                $status = $old;
                // push to array for checkin deleted array
                array_push($old_array, $work_id);
            }
            if ($this->input->post('id'.$new.$i)) { // out counter
                $status = $new;
            }
            $company = $this->input->post('company'.$status.$i);
            $year = $this->input->post('year'.$status.$i);
            $position = $this->input->post('position'.$status.$i);
            $address = $this->input->post('address'.$status.$i);
            $telephone = $this->input->post('telephone'.$status.$i);
            $fax = $this->input->post('fax'.$status.$i);
            $work_hp = $this->input->post('work_hp'.$status.$i);
            $work_email = $this->input->post('work_email'.$status.$i);
            $options = array();
            
            $options['user_id']=$user_id;
            $options['company']=$company;
            $options['year']=$year;
            $options['position']=$position;
            $options['address']=$address;
            $options['telephone']=$telephone;
            $options['fax']=$fax;
            $options['work_hp']=$work_hp;
            $options['work_email']=$work_email;
            
            // cek dulu yang harus ada apa *required
            if ($status==$old) {
                // update isinya
                if ($i==0 && $company=="" && $year=="" && $position=="" && $address=="" && $telephone=="" && $fax=="" && $work_hp=="" && $work_email=="") {
                    // erase from deleted array
                    $old_array = array_diff($old_array, array($work_id));
                    $add_update_Work=2;
                } else {
                    $options['id'] = $work_id;
                    $add_update_Work = $this->workModel->updateWorkExperience($options);
                }
            } else {
                // insert baru
                if ($i==0)
                    $options['is_current_work'] = 1;
                $add_update_Work = $this->workModel->addWorkExperience($options);
            }
            if (is_bool($add_update_Work)) {
                echo 'error update/insert';
            } else {
                echo 'success update/insert';
            }
        }
        $options = array();
        // delete work_experience
        foreach($id_array as $old_id) :
            if (in_array($old_id, $old_array)) {
                
            } else {
                // delete here
                $options['id'] = $old_id;
                $delete_Work = $this->workModel->deleteWorkExperience($options);
                if (is_bool($delete_Work)) {
                    echo 'error on delete : id '.$old_id;
                }
            }
        endforeach;
        
    }
    
    /**
     * editVisibility()
     *
     * menampilkan halaman edit visibility keterangan2 yang bisa dilihat orang
     *
     */
    function edit_visibility() {
        $data['struktur'] = $this->getStruktur2('Visibility');
        $data['content_edit_view'] = 'edit_profile/edit_visibility_view';
        $data['content_edit'] = array();
        
        $text = $this->load->view($data['content_edit_view'],$data,true);
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('text' => $text, 'struktur'=>$data['struktur'])));
    }
    
    /**
     * submitVisibility
     *
     * mengganti status visibility setiap info user yang dapat dilihat
     *
     */
    function submitVisibility() {
        
        // redirect ke editVisibility
       redirect('profile', 'refresh');
    }
    
    /**
     * setUserData($user_id)
     *
     * mengembalikan data2 user yang akan ditampilkan pada profile user
     *
     * @param int $user_id user_id dari user
     */
    function setUserData($user_id) {
        //Load model user
        $this->load->model('user', 'userModel');
        $options = array('id'=>$user_id);
        $getUser = $this->userModel->getUsers($options);
        if (!$getUser) { // error
            redirect('/home', 'refresh');
        }
        // load visibility status
        $this->load->model('visibility_status', 'visModel');
        $visibility_res = $this->visModel->getVisibilityStatuses(array('user_id'=>$user_id));
        $visibility = $visibility_res[0];
        // cek apakah dia melihat profilnya sendiri
        if ($this->session->userdata('user_id')==$user_id) { 
            // set semua visibility menjadi 1
            $visibility->home_address=1;
            $visibility->home_telephone=1;
            $visibility->handphone=1;
            $visibility->email=1;
            $visibility->interest=1;
            $visibility->S1=1;
            $visibility->S2=1;
            $visibility->S3=1;
            $visibility->work_experience=1;
            $visibility->current_experience=1;
        }
        
        $name = $getUser[0]->name;
        $surname = $getUser[0]->surname;
        $home_address = $getUser[0]->home_address;
        $home_telephone = $getUser[0]->home_telephone;
        $handphone = $getUser[0]->handphone;
        $email = $getUser[0]->email;
        $image = $getUser[0]->profpict_url;
        if ($image=="")
            $image = './res/default.jpg';
        $tahun_kelulusan= $getUser[0]->graduate_year;
        // load model unit
        $this->load->model('unit', 'unitModel');
        $options = array('id'=>$getUser[0]->last_unit_id);
        $getUnitLabel = $this->unitModel->getUnits($options);
        $kelulusan= $getUnitLabel[0]->label.' St. Ursula';
        // load model pendidikan
        $this->load->model('education', 'eduModel');
        $options = array('user_id'=>$user_id,'sortBy'=>'graduate_year','sortDirection'=>'desc');
        $getPendidikan = $this->eduModel->getEducations($options);
        $pendidikan = array();
        if ($getPendidikan) {
            // load model level
            $this->load->model('level', 'levelModel');
            $count = 0;
            $year = date('Y');
            foreach ($getPendidikan as $edu) :
                if ($edu->graduate_year>$year) $current=1; else $current=0;
                $options = array('id'=>$edu->level_id);
                $degree = $this->levelModel->getLevels($options);
                $pendidikan[$count] = array (
                    'degree' => $degree[0]->label,
                    'where' => $edu->school,
                    'major' => $edu->major,
                    'minor' => $edu->minor,
                    'current' => $current
                );
                $count++;
            endforeach;
        }
        
        // load model interest_in
        $this->load->model('interested_in', 'interestInModel');
        $options = array('user_id'=>$user_id);
        $getInterestIn = $this->interestInModel->getInterestedIn($options);
        $interest = array ();
        // load model interest_in
        $this->load->model('interest', 'interestModel');
        if ($getInterestIn) {
            $count=0;
            foreach ($getInterestIn as $itr) :
                $options = array('id' => $itr->interest_id);
                $getInterest = $this->interestModel->getInterests($options);
                $interest[$count] = $getInterest[0]->interest;
                $count++;
            endforeach;
        }
        
        // load model work_experience
        $this->load->model('work_experience', 'workModel');
        $options = array('user_id'=>$user_id);
        $getWork = $this->workModel->getWorkExperiences($options);
        $working_experience = array();
        if ($getWork) {
            $count=0;
            foreach ($getWork as $work):
                $working_experience[$count] = array (
                    'company' => $work->company,
                    'year' => $work->year,
                    'position' => $work->position,
                    'address' => $work->address,
                    'telephone' => $work->telephone,
                    'fax' => $work->fax,
                    'work_hp' => $work->work_hp,
                    'work_email' => $work->work_email,
                    'is_current_work' => $work->is_current_work
                );
                $count++;
            endforeach;
        }
        
        $calendar= 'Ini calendar';
        
        $user_data = array(
            'user_id'=>$user_id,
            'name' => $name,
            'surname' => $surname,
            'home_address' => $home_address,
            'home_telephone' => $home_telephone,
            'handphone' => $handphone,
            'email' => $email,
            'image' => $image,
            'calendar' => $calendar,
            'kelulusan' => $kelulusan,
            'tahun_kelulusan' => $tahun_kelulusan,
            'pendidikan' => $pendidikan,
            'interest' => $interest,
            'working_experience' => $working_experience,
            'visibility'=>$visibility
        );
        return $user_data;
    }


    function getStruktur($name) {
        $struktur = array (
            array (
                'islink'=>1,
                'link'=>'home',
                'label'=>'Home'
            ),
            array (
                'islink'=>0,
                'label'=>$name
            )
        );
        return $struktur;
    }
    
    function getStruktur2($name) {
        $struktur = array (
            array (
                'islink'=>1,
                'link'=>'home',
                'label'=>'Home'
            ),
            array (
                'islink'=>0,
                'label'=>'Edit Your Profile'
            ),
            array (
                'islink'=>0,
                'label'=>$name
            )
        );
        return $struktur;
    }
    
}

?>
