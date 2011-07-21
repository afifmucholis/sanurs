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
        if ($this->session->userdata('name') == null) {
            redirect('/home', 'refresh');
        }
        $data['title'] = 'Profile';
        $data['main_content'] = 'profile/my_profile_view';
        $data['struktur'] = $this->getStruktur('Your Profile');
        // get user profile info
        $user_id = $this->session->userdata('user_id');

        $data['user_data'] = $this->setUserData($user_id);

        // get jumlah friend request
        $this->load->model('friend_request', 'friend_requestModel');
        $options = array('userid_requested' => $user_id);
        $getRequest = $this->friend_requestModel->getFriendRelationships($options);
        if (is_bool($getRequest)) {
            $data['request_friend'] = 0;
        } else {
            $data['request_friend'] = count($getRequest);
        }
        // get jumlah new notification
        $this->load->model('notification_model', 'notificationModel');
        $options = array('userid_to' => $user_id, 'status_read' => 0);
        $getNotification = $this->notificationModel->getNotifications($options);
        if (is_bool($getNotification)) {
            $data['new_notification'] = 0;
        } else {
            $data['new_notification'] = count($getNotification);
        }

        //Get friend list for sidebar:
        $friends = $this->getAllFriendListLimited($user_id, 5);
        $data['friend_list_sidebar'] = $friends['friends'];
        $data['count_friends'] = $friends['total_friends'];

        $this->load->view('includes/template', $data);
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
        if ($this->session->userdata('user_id') == $user_id) { // cek apakah dia melihat profilnya sendiri
            redirect('/profile', 'refresh');
        }

        $data['user_data'] = $this->setUserData($user_id);
        $data['title'] = 'Profile - ' . $data['user_data']['name'];
        $data['main_content'] = 'profile/show_profile_view';
        $data['struktur'] = $this->getStruktur($data['user_data']['name']);
        // cek apakah bisa add friend
        $data['add_as_friend'] = 1;
        if ($this->session->userdata('user_id') == null) {   // belum sign in
            $data['add_as_friend'] = 0;
        } else {
            $user_view = $this->session->userdata('user_id');
            // load model friend request dan friend relationship
            $this->load->model('friend_request', 'friend_requestModel');
            $this->load->model('friend_relationship', 'friend_relationshipModel');

            $options = array('userid_requester' => $user_view, 'userid_requested' => $user_id);
            $getFriendRequest = $this->friend_requestModel->getFriendRelationships($options);

            $options = array('userid_1' => $user_view, 'userid_2' => $user_id);
            $getFriendRelationship = $this->friend_relationshipModel->getFriendRelationships($options);
            if (is_bool($getFriendRelationship)) {
                $options = array('userid_2' => $user_view, 'userid_1' => $user_id);
                $getFriendRelationship = $this->friend_relationshipModel->getFriendRelationships($options);
            }

            if (!is_bool($getFriendRelationship) && count($getFriendRelationship) == 1) {     // cek apakah sudah friend atau belum
                $data['add_as_friend'] = 3;
            } else if (!is_bool($getFriendRequest) && count($getFriendRequest) == 1) { // cek apakah masih requested
                $data['add_as_friend'] = 2;
            }
        }

        //Get friend list :
        $friends = $this->getAllFriendListLimited($user_id, 5);
        $data['friend_list_sidebar'] = $friends['friends'];
        $data['count_friends'] = $friends['total_friends'];

        $this->load->view('includes/template', $data);
    }

    /**
     * editProfile()
     *
     * menampilkan halaman edit user profile
     *
     */
    function editProfile() {
        // show map
        $data['show_map'] = 1;

        $data['title'] = 'Edit your profile ';
        $data['main_content'] = 'edit_profile/edit_profile_view';
        $data['struktur'] = $this->getStruktur2('Basic Info');
        
        // get uri to check default view edit exist
        $array = $this->uri->uri_to_assoc(2);
        if ($array['editProfile']!='')
            $data['view']=$array['editProfile'];
        else
            $data['view']='basic_info';
        
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

        //list area of interest
        $this->load->model('interest', 'interestModel');
        $option = array('sortBy' => 'interest');
        $getInterestList = $this->interestModel->getInterests($option);
        $data['interest_list'] = $getInterestList;

        $this->load->model('interested_in', 'interestedInModel');
        $option = array(
            'user_id' => $this->session->userdata('user_id'),
            'columnSelect' => 'interest_id'
        );
        $getUserInterests = $this->interestedInModel->getInterestedIn($option);
        $data['user_interest'] = $getUserInterests;

        /*** get list of gender ***/
        $this->load->model('gender', 'genderModel');
        $option = array();
        $getGender = $this->genderModel->getGenders($option);
        $gender_list = array();
        if ($getGender) {
            foreach ($getGender as $gender) {
                $gender_list[$gender->id] = $gender->label;
            }
        }
        $data['gender_list'] = $gender_list;
        /*** end of get list of gender ***/
        
        // load basic user info
        $this->load->model('user', 'userModel');
        $options = array('id' => $this->session->userdata('user_id'));
        $getReturn = $this->userModel->getUsers($options);
        if (is_bool($getReturn) && !$getReturn) {
            //gak ada user yang memenuhi
            redirect('/home', 'refresh');
        } else {
            // get gender
            $this->load->model('gender', 'genderModel');
            $options = array('id' => $getReturn[0]->gender_id);
            $genderLabel = $this->genderModel->getGenders($options);
            if ($getReturn[0]->profpict_url == "")
                $img_url = 'res/default.jpg';
            else
                $img_url=$getReturn[0]->profpict_url;
            
            $data['content_edit'] = array(
                'name' => $getReturn[0]->name,
                'img_url' => $img_url,
                'nickname' => $getReturn[0]->nickname,
                'gender' => $genderLabel[0]->label,
                'home_address' => $getReturn[0]->home_address,
                'home_telephone' => $getReturn[0]->home_telephone,
                'handphone' => $getReturn[0]->handphone
            );

            $text = $this->load->view($data['content_edit_view'], $data, true);
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('text' => $text, 'struktur' => $data['struktur'])));
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
        $user_id = $this->session->userdata('user_id');

        /*         * * update area of interest ** */
        $myInterests = $this->input->post('interest');
        $this->load->model('interest_in', 'interestedInModel');
        if ($myInterests) {
            //hapus dulu yg di database tapi gak ada di array
            $itemDel = array();
            $option = array('user_id' => $user_id);
            $getAllMyInterest = $this->interestedInModel->getInterestedIn($option);
            if ($getAllMyInterest) {
                foreach ($getAllMyInterest as $item) {
                    $i = 0;
                    $found = FALSE;
                    while (!$found && $i < count($myInterests)) {
                        if ($item->interest_id == $myInterests[$i]) {
                            $found = TRUE;
                        } else {
                            $i++;
                        }
                    }
                    if (!$found) {
                        $itemDel[] = $item->id;
                    }
                }
            }
            if ($itemDel) {
                foreach ($itemDel as $del) {
                    $option = array('id' => $del);
                    $returnDel = $this->interestedInModel->deleteInterestedIn($option);
                }
            }
            //cocokkin yg di myInterests, kalo ada di database gak usah update, kalo gak ada tambahin
        } else {
            //hapus semua yg ada di database interested_in
        }

        /*** selesai update area of interest ***/
        
        $this->load->model('user','userModel');
        $nickname = $this->input->post('nick_name');
        $gender = $this->input->post('gender');
        
        $home_address = $this->input->post('home_address');
        $home_telephone = $this->input->post('home_telephone');
        $handphone = $this->input->post('handphone');
        // proses data disini
        $image_url = substr($this->input->post('url_img'), strlen(base_url()));
        
        $options = array(
            'id'=>$user_id,
            'nickname'=>$nickname,
            'gender_id' => $gender,
            'home_address'=>$home_address,
            'home_telephone'=>$home_telephone,
            'handphone'=>$handphone
        );
        $error_rename_img = false;
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
                     $error_rename_img = true;
                 }
            } else {
                // image lama tidak perlu diupdate
            }
        }
        // update database dengan opsi $options
        $cek_bol = $this->userModel->updateUser($options);
        if (is_bool($cek_bol) || count($cek_bol)!=1 || $error_rename_img) {
            // update gagal
            $message['status'] = 'An error occurred';
            $message['message'] = 'An Error occurred with your data input. Please '.anchor('profile/editProfile','try again').'.';
        } else {
            // update berhasil
            $message['status'] = 'Update success';
            $message['message'] = 'Your Basic Info has successfully updated.'.br(1).'Click '.anchor('profile','here').' to view your profile.';
        }
        $message['page_before'] = 'Edit Your Profile';
        $message['page_link'] = 'profile/editProfile';
        // redirect ke info view
        $this->session->set_flashdata('message', $message);
        redirect('info/show','refresh');
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

        $text = $this->load->view($data['content_edit_view'], $data, true);
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('text' => $text, 'struktur' => $data['struktur'])));
    }

    /**
     * untuk mendapatkan lokasi (latitude-longitude) dari user yang sedang aktif
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
                ->set_output(json_encode(array('lat' => $lat, 'lng' => $lng)));
    }

    function get_all_location() {
        // load model user
        $this->load->model('user', 'userModel');
        //$option = array('id' => $user_id);
        $option = array();
        $getUser = $this->userModel->getUsers($option); //ini berisi semua data user yang ada di database
        // get location
        if ($getUser) {
            $count = 0;
            $userArray = array();
            foreach ($getUser as $user) {
                if ($user->location_latitude != NULL) {
                    $userArray[$count] = array(
                        'id' => $user->id,
                        'name' => $user->name,
                        'year' => $user->graduate_year,
                        'lat' => $user->location_latitude,
                        'lng' => $user->location_longitude
                    );
                    $count++;
                }
            }
        }

        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($userArray));
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

        redirect('profile/editProfile', 'refresh');
    }

    /**
     * edit_education()
     *
     * menampilkan halaman edit pendidikan dengan method ajax
     *
     */
    function edit_education() {
        $user_id = $this->session->userdata('user_id');
        // load education model
        $this->load->model('education', 'eduModel');
        $options = array('user_id' => $user_id);
        $getEducation = $this->eduModel->getEducations($options);
        $data['max_level'] = 1;
        $year = date('Y');
        // set default data
        $max_level = 0;
        // set default education
        $data['sma_edu'] = $this->makeArrayEducation();
        $data['d3_edu'] = $this->makeArrayEducation();
        $data['s1_edu'] = $this->makeArrayEducation();
        $data['s2_edu'] = $this->makeArrayEducation();
        $data['s3_edu'] = $this->makeArrayEducation();
        $data['current_education'] = $this->makeArrayEducation();
        $data['is_current_edu'] = 'no';
        if (!is_bool($getEducation)) {
            foreach ($getEducation as $edu) :
                if ($edu->graduate_year > $year) {
                    $data['current_education'] = $edu;
                    $data['is_current_edu'] = 'yes';
                } else {
                    if ($edu->level_id == 1) {
                        $data['sma_edu'] = $edu;
                    } else if ($edu->level_id == 2) {
                        $data['d3_edu'] = $edu;
                    } else if ($edu->level_id == 3) {
                        $data['s1_edu'] = $edu;
                    } else if ($edu->level_id == 4) {
                        $data['s2_edu'] = $edu;
                    } else if ($edu->level_id == 5) {
                        $data['s3_edu'] = $edu;
                    }
                    if ($edu->level_id > $max_level)
                        $max_level = $edu->level_id;
                }
            endforeach;
        }
        $data['max_level'] = $max_level;
        // load model user untuk cek sma
        $this->load->model('user', 'userModel');
        $options = array('id' => $user_id);
        $getUser = $this->userModel->getUsers($options);
        if ($getUser[0]->last_unit_id == '4') {
            // berarti sudah sekolah di SMA sanur
            $data['options'] = array(
                '0' => '-',
                '2' => 'Sekolah Kejuruan(D3)',
                '3' => 'Bachelor Degree(S1)',
                '4' => 'Masters Degree(S2)',
                '5' => 'Doctorate Degree(S3)'
            );
        } else {
            $data['options'] = array(
                '0' => '-',
                '1' => 'High School',
                '2' => 'Sekolah Kejuruan(D3)',
                '3' => 'Bachelor Degree(S1)',
                '4' => 'Masters Degree(S2)',
                '5' => 'Doctorate Degree(S3)'
            );
        }
        // load model major
        $this->load->model('major', 'majorModel');
        $major = $this->majorModel->getMajors();
        $major_options = array(
            '-' => '-'
        );
        $c = 1;
        foreach ($major as $m) :
            $major_options[$m->id] = $m->major;
        endforeach;
        $data['major_options'] = $major_options;

        $data['struktur'] = $this->getStruktur2('Education');
        $data['content_edit_view'] = 'edit_profile/edit_education_view';
        $data['content_edit'] = array();

        $text = $this->load->view($data['content_edit_view'], $data, true);
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('text' => $text, 'struktur' => $data['struktur'])));
    }

    function makeArrayEducation() {
        $array = '';
        $array->user_id = '';
        $array->id = '';
        $array->school = '';
        $array->graduate_year = '';
        $array->level_id = '';
        $array->major_id = '';
        $array->minor_id = '';
        return $array;
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
        $user_id = $this->session->userdata('user_id');
        $in_education = $this->input->post('in_education');
        $highest_edu = $this->input->post('highest_edu');
        // load model education
        $this->load->model('education', 'eduModel');
        // load model user
        $this->load->model('user', 'userModel');
        // cek SMA ada atau ga
        $options = array('id'=>$user_id);
        $getUser = $this->userModel->getUsers($options);
        if ($getUser[0]->last_unit_id=='4') {
            // berarti sudah sekolah di SMA sanur
            $iterate_start = 2;
        } else {
            $iterate_start = 1;
        }
        
        if ($in_education=='yes') { // $degree = 0
            // cek data lama atau baru
            $edu_id = $this->input->post('edu_id_0');
            $college = $this->input->post('college_0');
            $major = $this->input->post('major_0');
            $minor = $this->input->post('minor_0');
            $year = $this->input->post('year_0');
            $level = $this->input->post('current_edu_list');
            if ($edu_id != '') {
                // data lama update dengan edu_id yang ada
                if ($college=='' || ($major=='-' || $major=='') || $year=='') {
                    echo ' input tidak benar current education'.br(1);
                } else {
                    // update
                    $options = array('id' => $edu_id, 'user_id' => $user_id, 'level_id' => $level, 'school' => $college, 'major_id' => $major, 'minor_id' => $minor, 'graduate_year' => $year);
                    $cekUpdateCurrentEdu = $this->eduModel->updateEducation($options);
                    if (!is_bool($cekUpdateCurrentEdu))
                        echo 'success update current education<br/>';
                }
            } else {
                // data baru masukkan current education
                if ($college=='' || ($major=='-' || $major=='') || $year=='') {
                    echo ' input tidak benar current education'.br(1);
                } else {
                    // insert
                    $options = array('user_id' => $user_id, 'level_id' => $level, 'school' => $college, 'major_id' => $major, 'minor_id' => $minor, 'graduate_year' => $year);
                    $cekInsertCurrentEdu = $this->eduModel->addEducation($options);
                    if (!is_bool($cekInsertCurrentEdu))
                        echo 'success insert current education<br/>';
                }
            }
        } else {
            // cek apakah sebelumnya ada current education
            // cek data lama atau baru
            $edu_id = $this->input->post('edu_id_0');
            // kalau ada didelete
            if ($edu_id != '') {
                $options = array('id' => $edu_id);
                $cekDeleteCurrentEdu = $this->eduModel->deleteEducation($options);
                if (!is_bool($cekDeleteCurrentEdu))
                    echo 'success delete current education<br/>';
            }
        }
        // get maks level education here
        $max_level = 0;
        $options = array('user_id' => $user_id);
        $getEducation = $this->eduModel->getEducations($options);
        $year = date('Y');
        if (!is_bool($getEducation)) {
            foreach ($getEducation as $edu) :
                if ($edu->level_id > $max_level && $edu->graduate_year <= $year)
                    $max_level = $edu->level_id;
            endforeach;
        }

        // bandingkan dengan highest_edu input user
        // jika lebih dari, berarti ada data yang harus diinsert dan diupdate
        if ($highest_edu >= $max_level && $highest_edu != 0) {
            // cek d3 yg diganti
            if ($highest_edu > 2) {
                // delete d3
                $edu_id = $this->input->post('edu_id_2');
                $college = $this->input->post('college_2');
                $major = $this->input->post('major_2');
                $minor = $this->input->post('minor_2');
                $year = $this->input->post('year_2');
                if ($edu_id!='' && $college=='' && ($major=='' || $major=='-') && $year=='') {
                    $options = array('id'=>$edu_id);
                    $cekDeleteEdu = $this->eduModel->deleteEducation($options);
                    if (!is_bool($cekDeleteEdu))
                        echo 'success delete education d3<br/>';
                }
            }

            for ($i=$iterate_start;$i<=$highest_edu;$i++) {
                $edu_id = $this->input->post('edu_id_'.$i); // cek sma
                $college = $this->input->post('college_'.$i);
                $major = $this->input->post('major_'.$i);
                $minor = $this->input->post('minor_'.$i);
                $year = $this->input->post('year_'.$i);
                echo $i.br(1);
                echo $college.br(1);
                echo $major.br(1);
                echo $minor.br(1);
                echo $year.br(1);
                if ($college=='' || ($major=='-' || $major=='') || $year=='') {
                    if ($i!=2)
                        echo ' input tidak benar'.br(1);
                    else if (($college=='' || $major=='-' || $year=='') && ($college!='' || $major!='-' || $year!='')) {
                        // ada d3 input yg tidak lengkap
                        echo ' input tidak benar 1'.br(1);
                    }
                } else {
                    if ($edu_id != '') {
                        // update
                        $options = array('id' => $edu_id, 'school' => $college, 'major_id' => $major, 'minor_id' => $minor, 'graduate_year' => $year);
                        $cekUpdateEdu = $this->eduModel->updateEducation($options);
                        if (!is_bool($cekUpdateEdu))
                            echo $i . 'success update education<br/>';
                    } else {
                        // insert
                        $options = array('user_id'=>$user_id,'level_id'=>$i,'school'=>$college,'major_id'=>$major,'minor_id'=>$minor,'graduate_year'=>$year);
                        $cekInsertEdu = $this->eduModel->addEducation($options);
                        if (!is_bool($cekInsertEdu))
                            echo $i.'success insert education<br/>';
                    }
                }
            }
        } else if ($highest_edu < $max_level) {
            // cek d3 yg dipilih
            if ($highest_edu == 2) {
                // insert d3
                $edu_id = $this->input->post('edu_id_2');
                $college = $this->input->post('college_2');
                $major = $this->input->post('major_2');
                $minor = $this->input->post('minor_2');
                $year = $this->input->post('year_2');
                $options = array('user_id' => $user_id, 'level_id' => 2, 'school' => $college, 'major_id' => $major, 'minor_id' => $minor, 'graduate_year' => $year);
                $cekInsertEdu = $this->eduModel->addEducation($options);
                if (!is_bool($cekInsertEdu))
                    echo 'success insert education d3<br/>';
            }

            for ($i=$iterate_start;$i<=$max_level;$i++) {
                $edu_id = $this->input->post('edu_id_'.$i); // cek sma
                $college = $this->input->post('college_'.$i);
                $major = $this->input->post('major_'.$i);
                $minor = $this->input->post('minor_'.$i);
                $year = $this->input->post('year_'.$i);
                
                echo $i.br(1);
                echo $college.br(1);
                echo $major.br(1);
                echo $minor.br(1);
                echo $year.br(1);
                
                if ($i<=$highest_edu) {
                    if ($college=='' || $major=='-' || $major=='' || $year=='') {
                        if ($i!=2)
                            echo ' input tidak benar'.br(1);
                        else if (($college=='' || $major=='-' || $year=='') && ($college!='' || $major!='-' || $year!='')) {
                            // ada d3 input yg tidak lengkap
                            echo ' input tidak benar 2'.br(1);
                        }
                    } else {
                        // update
                        $options = array('id' => $edu_id, 'school' => $college, 'major_id' => $major, 'minor_id' => $minor, 'graduate_year' => $year);
                        $cekUpdateEdu = $this->eduModel->updateEducation($options);
                        if (!is_bool($cekUpdateEdu))
                            echo $i . 'success update education<br/>';
                    }
                } else {
                    // delete
                    $options = array('id' => $edu_id);
                    $cekDeleteEdu = $this->eduModel->deleteEducation($options);
                    if (!is_bool($cekDeleteEdu))
                        echo $i . 'success delete education<br/>';
                }
            }
        }
        // jika kurang dari, berarti ada data yang harus didelete dan diupdate
    }

    /**
     * function cekInputEducationKosong($array)
     *
     * Mengecek array['college', 'major', 'minor', 'grad'] apakah semua kosong atau tidak
     *
     * @param array $array array['college', 'major', 'minor', 'grad']
     */
    function cekInputEducationKosong($array) {
        if ($array['college'] == "" && $array['major'] == "" && $array['minor'] == "" && $array['grad'] == "")
            return true;
        return false;
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
        $options = array('user_id' => $user_id);
        $getWork = $this->workModel->getWorkExperiences($options);
        $working_experience = array();
        $working_current = array();
        if (!is_bool($getWork)) {
            $count = 0;
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

        $data['counter'] = count($working_experience) + count($working_current);
        $data['working_experience'] = $working_experience;
        $data['working_current'] = $working_current;

        $text = $this->load->view($data['content_edit_view'], $data, true);
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('text' => $text, 'struktur' => $data['struktur'])));
    }

    /**
     * add_working_field()
     *
     * menambahkan field form working experience
     *
     */
    function add_working_field() {
        $data = array(
            'counter' => ($this->input->post('counter') + 1),
            'status' => 'new'
        );
        $text = $this->load->view('edit_profile/work_form', $data, true);
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('text' => $text, 'counter' => $data['counter'])));
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
        $options = array('user_id' => $user_id);
        $getWork = $this->workModel->getWorkExperiences($options);
        $id_array = array();
        if (!is_bool($getWork)) {
            foreach ($getWork as $work) :
                array_push($id_array, $work->id);
            endforeach;
        }

        $old_array = array();
        $old = '_old_';
        $new = '_new_';
        $i = 0;
        $counter = $this->input->post('counter');
        for ($i = 0; $i <= $counter; $i++) {
            $status = '';
            if ($this->input->post('id' . $old . $i)) { // out work id
                $work_id = $this->input->post('id' . $old . $i);
                $status = $old;
                // push to array for checkin deleted array
                array_push($old_array, $work_id);
            }
            if ($this->input->post('id' . $new . $i)) { // out counter
                $status = $new;
            }
            $company = $this->input->post('company' . $status . $i);
            $year = $this->input->post('year' . $status . $i);
            $position = $this->input->post('position' . $status . $i);
            $address = $this->input->post('address' . $status . $i);
            $telephone = $this->input->post('telephone' . $status . $i);
            $fax = $this->input->post('fax' . $status . $i);
            $work_hp = $this->input->post('work_hp' . $status . $i);
            $work_email = $this->input->post('work_email' . $status . $i);
            $options = array();

            $options['user_id'] = $user_id;
            $options['company'] = $company;
            $options['year'] = $year;
            $options['position'] = $position;
            $options['address'] = $address;
            $options['telephone'] = $telephone;
            $options['fax'] = $fax;
            $options['work_hp'] = $work_hp;
            $options['work_email'] = $work_email;

            // cek dulu yang harus ada apa *required
            if ($status == $old) {
                // update isinya
                if ($i == 0 && $company == "" && $year == "" && $position == "" && $address == "" && $telephone == "" && $fax == "" && $work_hp == "" && $work_email == "") {
                    // erase from deleted array
                    $old_array = array_diff($old_array, array($work_id));
                    $add_update_Work = 2;
                } else {
                    $options['id'] = $work_id;
                    $add_update_Work = $this->workModel->updateWorkExperience($options);
                }
            } else {
                // insert baru
                if ($i == 0)
                    $options['is_current_work'] = 1;
                if ($company != "" && $year != "" && $position != "" && $address != "" && $telephone != "" && $fax != "" && $work_hp != "" && $work_email != "") {
                    $add_update_Work = $this->workModel->addWorkExperience($options);
                }
            }
            if (isset($add_update_Work) && is_bool($add_update_Work)) {
                echo 'error update/insert';
            } else if (isset($add_update_Work)) {
                echo 'success update/insert';
            }
        }
        $options = array();
        // delete work_experience
        foreach ($id_array as $old_id) :
            if (in_array($old_id, $old_array)) {
                
            } else {
                // delete here
                $options['id'] = $old_id;
                $delete_Work = $this->workModel->deleteWorkExperience($options);
                if (is_bool($delete_Work)) {
                    echo 'error on delete : id ' . $old_id;
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
        $user_id = $this->session->userdata('user_id');

        $data['struktur'] = $this->getStruktur2('Visibility');
        $data['content_edit_view'] = 'edit_profile/edit_visibility_view';

        // get visibility data from database
        $this->load->model('visibility_status', 'visibilityModel');     //load visibility model
        $option = array('id' => $user_id);
        $getVisibility = $this->visibilityModel->getVisibilityStatuses($option);

        
        $data['content_edit'] = array(
            'home_address' => $getVisibility[0]->home_address,
            'home_telephone' => $getVisibility[0]->home_telephone,
            'handphone' => $getVisibility[0]->handphone,
            'email' => $getVisibility[0]->email,
            'interest' => $getVisibility[0]->interest,
            'birthdate' => $getVisibility[0]->birthdate,
            'S1' => $getVisibility[0]->S1,
            'S2' => $getVisibility[0]->S2,
            'S3' => $getVisibility[0]->S3,
            'work_experience' => $getVisibility[0]->work_experience,
            'current_experience' => $getVisibility[0]->current_experience
        );

        $text = $this->load->view($data['content_edit_view'], $data, true);
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('text' => $text, 'struktur' => $data['struktur'])));
    }

    /**
     * submitVisibility
     *
     * mengganti status visibility setiap info user yang dapat dilihat
     *
     */
    function submitVisibility() {
        $user_id = $this->session->userdata('user_id');

        if ($this->input->post('home_address')) {
            $home_address = 1;
        } else {
            $home_address = 0;
        }

        if ($this->input->post('home_telephone')) {
            $home_telephone = 1;
        } else {
            $home_telephone = 0;
        }

        if ($this->input->post('handphone')) {
            $handphone = 1;
        } else {
            $handphone = 0;
        }

        if ($this->input->post('email')) {
            $email = 1;
        } else {
            $email = 0;
        }

        if ($this->input->post('interest')) {
            $interest = 1;
        } else {
            $interest = 0;
        }

        if ($this->input->post('birthdate')) {
            $birthdate = 1;
        } else {
            $birthdate = 0;
        }

        if ($this->input->post('s1')) {
            $s1 = 1;
        } else {
            $s1 = 0;
        }

        if ($this->input->post('s2')) {
            $s2 = 1;
        } else {
            $s2 = 0;
        }

        if ($this->input->post('s3')) {
            $s3 = 1;
        } else {
            $s3 = 0;
        }

        if ($this->input->post('work_experience')) {
            $work_experience = 1;
        } else {
            $work_experience = 0;
        }

        if ($this->input->post('current_experience')) {
            $current_experience = 1;
        } else {
            $current_experience = 0;
        }

        //load visibilityModel
        $this->load->model('visibility_status', 'visibilityModel');

        //bikin array option untuk update
        $options = array(
            'id' => $user_id,
            'user_id' => $user_id,
            'home_address' => $home_address,
            'home_telephone' => $home_telephone,
            'handphone' => $handphone,
            'email' => $email,
            'interest' => $interest,
            'birthdate' => $birthdate,
            'S1' => $s1,
            'S2' => $s2,
            'S3' => $s3,
            'work_experience' => $work_experience,
            'current_experience' => $current_experience
        );

        //update visibility table
        $getReturnUpdate = $this->visibilityModel->updateVisibilityStatus($options);

        redirect('profile/editProfile', 'refresh');
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
        $options = array('id' => $user_id);
        $getUser = $this->userModel->getUsers($options);
        if (!$getUser) { // error
            redirect('/home', 'refresh');
        }
        // load visibility status
        $this->load->model('visibility_status', 'visModel');
        $visibility_res = $this->visModel->getVisibilityStatuses(array('user_id' => $user_id));
        $visibility = $visibility_res[0];
        // cek apakah dia melihat profilnya sendiri
        if ($this->session->userdata('user_id') == $user_id) {
            // set semua visibility menjadi 1
            $visibility->home_address = 1;
            $visibility->home_telephone = 1;
            $visibility->handphone = 1;
            $visibility->email = 1;
            $visibility->interest = 1;
            $visibility->S1 = 1;
            $visibility->S2 = 1;
            $visibility->S3 = 1;
            $visibility->work_experience = 1;
            $visibility->current_experience = 1;
        }

        $name = $getUser[0]->name;
        $nickname = $getUser[0]->nickname;
        $home_address = $getUser[0]->home_address;
        $home_telephone = $getUser[0]->home_telephone;
        $handphone = $getUser[0]->handphone;
        $email = $getUser[0]->email;
        $image = $getUser[0]->profpict_url;
        if ($image == "")
            $image = 'res/default.jpg';
        $tahun_kelulusan = $getUser[0]->graduate_year;
        // load model unit
        $this->load->model('unit', 'unitModel');
        $options = array('id' => $getUser[0]->last_unit_id);
        $getUnitLabel = $this->unitModel->getUnits($options);
        $kelulusan = $getUnitLabel[0]->label . ' St. Ursula';
        // load model pendidikan
        $this->load->model('education', 'eduModel');
        $options = array('user_id' => $user_id, 'sortBy' => 'graduate_year', 'sortDirection' => 'desc');
        $getPendidikan = $this->eduModel->getEducations($options);
        $pendidikan = array();
        if ($getPendidikan) {
            // load model level
            $this->load->model('level', 'levelModel');
            // load model major
            $this->load->model('major', 'majorModel');
            $count = 0;
            $year = date('Y');
            foreach ($getPendidikan as $edu) :
                if ($edu->graduate_year > $year)
                    $current = 1; else
                    $current=0;
                $options = array('id' => $edu->level_id);
                $degree = $this->levelModel->getLevels($options);
                $options = array('id' => $edu->major_id);
                $major = $this->majorModel->getMajors($options);
                if (is_bool($major)) {
                    $major = 'none';
                } else {
                    $major = $major[0]->major;
                }
                $options = array('id' => $edu->minor_id);
                $minor = $this->majorModel->getMajors($options);
                if (is_bool($minor)) {
                    $minor = 'none';
                } else {
                    $minor = $minor[0]->major;
                }
                $pendidikan[$count] = array(
                    'degree' => $degree[0]->label,
                    'where' => $edu->school,
                    'major' => $major,
                    'minor' => $minor,
                    'current' => $current
                );
                $count++;
            endforeach;
        }

        // load model interest_in
        $this->load->model('interested_in', 'interestInModel');
        $options = array('user_id' => $user_id);
        $getInterestIn = $this->interestInModel->getInterestedIn($options);
        $interest = array();
        // load model interest_in
        $this->load->model('interest', 'interestModel');
        if ($getInterestIn) {
            $count = 0;
            foreach ($getInterestIn as $itr) :
                $options = array('id' => $itr->interest_id);
                $getInterest = $this->interestModel->getInterests($options);
                $interest[$count] = $getInterest[0]->interest;
                $count++;
            endforeach;
        }

        // load model work_experience
        $this->load->model('work_experience', 'workModel');
        $options = array('user_id' => $user_id);
        $getWork = $this->workModel->getWorkExperiences($options);
        $working_experience = array();
        if ($getWork) {
            $count = 0;
            foreach ($getWork as $work):
                $working_experience[$count] = array(
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

        $calendar = 'Ini calendar';

        $user_data = array(
            'user_id' => $user_id,
            'name' => $name,
            'nickname' => $nickname,
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
            'visibility' => $visibility
        );
        return $user_data;
    }

    function getStruktur($name) {
        $struktur = array(
            array(
                'islink' => 1,
                'link' => 'home',
                'label' => 'Home'
            ),
            array(
                'islink' => 0,
                'label' => $name
            )
        );
        return $struktur;
    }

    function getStruktur2($name) {
        $struktur = array(
            array(
                'islink' => 1,
                'link' => 'home',
                'label' => 'Home'
            ),
            array(
                'islink' => 0,
                'label' => 'Edit Your Profile'
            ),
            array(
                'islink' => 0,
                'label' => $name
            )
        );
        return $struktur;
    }

    function getAllFriendListLimited($userid, $limit) {
        //Get friend list dari $userid :
        $result = array();
        $totalnumfriends = 0;
        
        $this->load->model('friend_relationship', 'friendRelationshipModel');
        $option1 = array('userid_1' => $userid);
        $option2 = array('userid_2' => $userid);

        $getFriend1 = $this->friendRelationshipModel->getFriendRelationships($option1);
        $friends = array();
        if (!(is_bool($getFriend1))) {
            $numfriends1 = count($getFriend1);
            $totalnumfriends += $numfriends1;
            if ($numfriends1 > $limit) {
                $numfriends1 = $limit;
            }
        } else {
            $numfriends1 = 0;
        }

        //Get detail dari friend :
        $this->load->model('user', 'userModel');

        if (!is_bool($getFriend1)) {
            for ($i = 0; $i < $numfriends1; ++$i) {
                $idfriend = $getFriend1[$i]->userid_2;
                $option = array('id' => $idfriend);
                $getUser = $this->userModel->getUsers($option);

                $friend = array();
                $friend['id'] = $getUser[0]->id;
                $friend['name'] = $getUser[0]->name;
                $friend['nickname'] = $getUser[0]->nickname;
                $friend['profpict_url'] = $getUser[0]->profpict_url;

                $friends[$i] = $friend;
            }
        }

        $getFriend2 = $this->friendRelationshipModel->getFriendRelationships($option2);
        if (!(is_bool($getFriend2))) {
            $numfriends2 = count($getFriend2);
            $totalnumfriends += $numfriends2;
            if ($numfriends2 > $limit) {
                $numfriends2 = $limit;
            }
        } else {
            $numfriends2 = 0;
        }

        $numAllfriends = $numfriends1 + $numfriends2;

        if (!is_bool($getFriend2)) {
            for ($i = $numfriends1; $i < $numAllfriends; ++$i) {
                $idfriend = $getFriend2[$i - $numfriends1]->userid_1;

                $option = array('id' => $idfriend);
                $getUser = $this->userModel->getUsers($option);

                $friend = array();
                $friend['id'] = $getUser[0]->id;
                $friend['name'] = $getUser[0]->name;
                $friend['nickname'] = $getUser[0]->nickname;
                $friend['profpict_url'] = $getUser[0]->profpict_url;

                $friends[$i] = $friend;
            }
        }
        $result['friends'] = $friends;
        $result['total_friends'] = $totalnumfriends;
        return $result;
    }

    function countNumberFriends($userid) {
        //Get friend list dari $userid :
        $this->load->model('friend_relationship', 'friendRelationshipModel');
        $option1 = array('userid_1' => $userid);
        $option2 = array('userid_2' => $userid);

        $getFriend1 = $this->friendRelationshipModel->getFriendRelationships($option1);
        $friends = array();
        if (!(is_bool($getFriend1))) {
            $numfriends1 = count($getFriend1);
        } else {
            $numfriends1 = 0;
        }


        $getFriend2 = $this->friendRelationshipModel->getFriendRelationships($option2);
        if (!(is_bool($getFriend2))) {
            $numfriends2 = count($getFriend2);
        } else {
            $numfriends2 = 0;
        }

        $numAllfriends = $numfriends1 + $numfriends2;

        return $numAllfriends;
    }
}

?>
