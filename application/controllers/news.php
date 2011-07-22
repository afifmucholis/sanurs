<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

define('NICUPLOAD_PATH', './res/news'); // Set the path (relative or absolute) to
// the directory to save image files

define('NICUPLOAD_URI', '/res/news');   // Set the URL (relative or absolute) to
// the directory defined above

/**
 * Description of news
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
class news extends CI_Controller {
    function show() {
        $data['title'] = 'News';
        $data['main_content'] = 'news/show_all_news';
        $data['struktur'] = $this->getStruktur('News');
        // cek admin
        $data['isadmin'] = $this->session->userdata('isadmin');
        
        // load model news
        $this->load->model('news_model','newsModel');
        $getNewsAll = $this->newsModel->getNews();
        if (is_bool($getNewsAll))
            $total_news = 0;
        else
            $total_news = count($getNewsAll);
        
        $per_page = 3;
        $offset = $this->input->post('offsetval');
        $options = array('sortBy'=>'publishing_date','sortDirection'=>'desc','limit'=>$per_page,'offset'=>$offset);
        $news_result = $this->newsModel->getNews($options);
        if (is_bool($news_result))
            $new_result = array();
        
        $data['all_news'] = $news_result;
        
        $this->load->library('pagination');
        $base_url = site_url('news/show');
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_news;
        $config['uri_segment'] = '2';
        $config['per_page'] = $per_page;
        $config['cur_page'] = $offset;

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<div  id="num_link">';
        $config['first_tag_close'] = '</div>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<div id="num_link">';
        $config['last_tag_close'] = '</div>';
        $config['next_link'] = false;
        $config['prev_link'] = false;
        $config['cur_tag_open'] = '<div id="cur_link">';
        $config['cur_tag_close'] = '</div>';
        $config['num_tag_open'] = '<div id="num_link">';
        $config['num_tag_close'] = '</div>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        
        // load helper
        $this->load->helper('simple_html_dom');
        $this->load->helper('text');
        
        if ($this->input->post('ajax')) {
            $text = $this->load->view('news/list_news',$data, true);
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('text' => $text, 'struktur' => $data['struktur'])));
        } else {
            $this->load->view('includes/template', $data);
        }
    }
    
    function show_news() {
        // cek admin
        $data['isadmin'] = $this->session->userdata('isadmin');
        $array = $this->uri->uri_to_assoc(2);
        $data['id_news'] = $array['show_news'];
        
        // get content
        $this->load->model('news_model','newsModel');
        $options = array('id'=>$data['id_news']);
        $getNews = $this->newsModel->getNews($options);
        if (is_bool($getNews)) {
            $message['status'] = 'An Error Occurred';
            $message['message'] = 'No news with id '.$data['id_news'];
            $message['page_before'] = 'News';
            $message['page_link'] = 'news/show';
            
            // redirect ke info view
            $this->session->set_flashdata('message', $message);
            redirect('info/show','refresh');
        }
        $data['content'] = $getNews[0]->content;
        $data['date'] = $getNews[0]->publishing_date;
        $data['title_news'] = $getNews[0]->title;
        $data['title'] = 'News - '.$data['title_news'];
        $data['main_content'] = 'news/show_news';
        $data['struktur'] = $this->getStruktur2($data['title_news']);
        $this->load->view('includes/template',$data);
    }
    
    function add_news() {
        if ($this->session->userdata('isadmin')=='' || $this->session->userdata('isadmin')!=1) {
            redirect('home','refresh');
        }
            
        $data['title'] = 'News';
        $data['main_content'] = 'news/add_news_view';
        $data['struktur'] = $this->getStruktur2('Add News');
        $data['show_editor'] = 1;
        $data['textarea'] = 'area1';
        $data['textarea_size'] = 300;
        $this->load->view('includes/template',$data);
    }
    
    function edit_news() {
        if ($this->session->userdata('isadmin')=='' || $this->session->userdata('isadmin')!=1) {
            redirect('home','refresh');
        }
        $array = $this->uri->uri_to_assoc(2);
        $data['id_news'] = $array['edit_news'];
        // get content old news
        $this->load->model('news_model','newsModel');
        $options = array('id'=>$data['id_news']);
        $getNews = $this->newsModel->getNews($options);
        if (is_bool($getNews)) {
            $message['status'] = 'An Error Occurred';
            $message['message'] = 'No news with id '.$data['id_news'];
            $message['page_before'] = 'News';
            $message['page_link'] = 'news/show';
            
            // redirect ke info view
            $this->session->set_flashdata('message', $message);
            redirect('info/show','refresh');
        }
        $data['old_title'] = $getNews[0]->title;
        $data['old_news'] = $getNews[0]->content;
        $data['title'] = 'Edit News';
        $data['main_content'] = 'news/edit_news_view';
        $data['struktur'] = $this->getStruktur2('Edit News');
        $data['show_editor'] = 1;
        $data['textarea'] = 'area1';
        $data['textarea_size'] = 300;
        
        $this->load->view('includes/template',$data);
    }
    
    function delete_news() {
        if ($this->session->userdata('isadmin')=='' || $this->session->userdata('isadmin')!=1) {
            redirect('home','refresh');
        }
        $array = $this->uri->uri_to_assoc(2);
        $id_news = $array['delete_news'];
        try {
            $this->load->model('news_model','newsModel');
            $options = array('id'=>$id_news);
            $getNews = $this->newsModel->deleteNews($options);
            if (is_bool($getNews))
                throw new Exception('Error on deleting news.');
            $message['status'] = 'Success';
            $message['message'] = 'News is successfully deleted.'.br(1).'Click '.anchor('news/show','here').' to back to news.';
        } catch (Exception $e) {
            $message['status'] = 'An Error Occurred';
            $message['message'] = $e->getMessage().br(1).'Click '.anchor('news/show_news/'.$id_news,'here').' to try again.';
        }
        $message['page_before'] = 'News';
        $message['page_link'] = 'news/show/';
        // redirect ke info view
        $this->session->set_flashdata('message', $message);
        redirect('info/show','refresh');
    }
    
    /*** For NIC Upload Images ***/
    
    /* NicEdit - Micro Inline WYSIWYG
     * Copyright 2007-2009 Brian Kirchoff
     *
     * NicEdit is distributed under the terms of the MIT license
     * For more information visit http://nicedit.com/
     * Do not remove this copyright message
     *
     * nicUpload Reciever Script PHP Edition
     * @description: Save images uploaded for a users computer to a directory, and
     * return the URL of the image to the client for use in nicEdit
     * @author: Brian Kirchoff <briankircho@gmail.com>
     * @sponsored by: DotConcepts (http://www.dotconcepts.net)
     * @version: 0.9.0
     */

    function nicUpload() {

        $nicupload_allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'bmp');

        // You should not need to modify below this line

        $rfc1867 = function_exists('apc_fetch') && ini_get('apc.rfc1867');

        if (!function_exists('json_encode')) {
            die('{"error" : "Image upload host does not have the required dependicies (json_encode/decode)"}');
        }

        $id = $this->input->post('APC_UPLOAD_PROGRESS');
        if (empty($id)) {
            $id = $this->input->get('id');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Upload is complete
            if (empty($id) || !is_numeric($id)) {
                nicupload_error('Invalid Upload ID');
            }
            if (!is_dir(NICUPLOAD_PATH) || !is_writable(NICUPLOAD_PATH)) {
                nicupload_error('Upload directory ' . NICUPLOAD_PATH . ' must exist and have write permissions on the server');
            }

            $file = $_FILES['nicImage'];
            $image = $file['tmp_name'];

            $max_upload_size = $this->ini_max_upload_size();
            if (!$file) {
                $this->nicupload_error('Must be less than ' . $this->bytes_to_readable($max_upload_size));
            }

            $ext = strtolower(substr(strrchr($file['name'], '.'), 1));
            @$size = getimagesize($image);
            if (!$size || !in_array($ext, $nicupload_allowed_extensions)) {
                $this->nicupload_error('Invalid image file, must be a valid image less than ' . $this->bytes_to_readable($max_upload_size));
            }

            $filename = $id . '.' . $ext;
            $path = NICUPLOAD_PATH . '/' . $filename;

            if (!move_uploaded_file($image, $path)) {
                $this->nicupload_error('Server error, failed to move file');
            }

            if ($rfc1867) {
                $status = apc_fetch('upload_' . $id);
            }
            if (!$status) {
                $status = array();
            }
            $status['done'] = 1;
            $status['width'] = $size[0];
            $status['url'] = $this->nicupload_file_uri($filename);

            if ($rfc1867) {
                apc_store('upload_' . $id, $status);
            }

            $this->nicupload_output($status, $rfc1867);
            exit;
        } else if ($this->input->get('check')!='') { // Upload progress check
            $check = $this->input->get('check');
            if (!is_numeric($check)) {
                $this->nicupload_error('Invalid upload progress id');
            }

            if ($rfc1867) {
                $status = apc_fetch('upload_' . $check);

                if ($status['total'] > 500000 && $status['current'] / $status['total'] < 0.9) { // Large file and we are < 90% complete
                    $status['interval'] = 3000;
                } else if ($status['total'] > 200000 && $status['current'] / $status['total'] < 0.8) { // Is this a largeish file and we are < 80% complete
                    $status['interval'] = 2000;
                } else {
                    $status['interval'] = 1000;
                }

                $this->nicupload_output($status);
            } else {
                $status = array();
                $status['noprogress'] = true;
                foreach ($nicupload_allowed_extensions as $e) {
                    if (file_exists(NICUPLOAD_PATH . '/' . $check . '.' . $e)) {
                        $ext = $e;
                        break;
                    }
                }
                if ($ext) {
                    $status['url'] = $this->nicupload_file_uri($check . '.' . $ext);
                }
                $this->nicupload_output($status);
            }
        }
    }
    // UTILITY FUNCTIONS

    function nicupload_error($msg) {
        echo $this->nicupload_output(array('error' => $msg));
    }

    function nicupload_output($status, $showLoadingMsg = false) {
        $script = '
                try {
                    '.(($_SERVER['REQUEST_METHOD']=='POST') ? 'top.' : '').'nicUploadButton.statusCb('.json_encode($status).');
                } catch(e) { alert(e.message); }
            ';

        if($_SERVER['REQUEST_METHOD']=='POST') {
            echo '<script>'.$script.'</script>';
        } else {
            echo $script;
        }

        if($_SERVER['REQUEST_METHOD']=='POST' && $showLoadingMsg) {
            $text = '<html><body>
                <div id="uploadingMessage" style="text-align: center; font-size: 14px;">
                    <img src="http://js.nicedit.com/ajax-loader.gif" style="float: right; margin-right: 40px;" />
                    <strong>Uploading...</strong><br />
                    Please wait
                </div>
            </body></html>';
            echo $text;

        }

        exit;
    }

    function nicupload_file_uri($filename) {
        return NICUPLOAD_URI.'/'.$filename;
    }

    function ini_max_upload_size() {
        $post_size = ini_get('post_max_size');
        $upload_size = ini_get('upload_max_filesize');
        if(!$post_size) $post_size = '8M';
        if(!$upload_size) $upload_size = '2M';

        return min($this->ini_bytes_from_string($post_size), $this->ini_bytes_from_string($upload_size) );
    }

    function ini_bytes_from_string($val) {
        $val = trim($val);
        $last = strtolower($val[strlen($val)-1]);
        switch($last) {
            // The 'G' modifier is available since PHP 5.1.0
            case 'g':
            $val *= 1024;
            case 'm':
            $val *= 1024;
            case 'k':
            $val *= 1024;
        }
        return $val;
    }

    function bytes_to_readable( $bytes ) {
        if ($bytes<=0)
            return '0 Byte';

        $convention=1000; //[1000->10^x|1024->2^x]
        $s=array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB');
        $e=floor(log($bytes, $convention));
        return round($bytes/pow($convention, $e), 2).' '.$s[$e];
    }
    
    /*****************************/
    
    function submit_news() {
        // load model news
        $this->load->model('news_model','newsModel');
        
        $text = $this->input->post('area1');
        $id_news='';
        if ($this->input->post('id_news')!='')
            $id_news = $this->input->post('id_news');
        $title = $this->input->post('title');
        
        try {
            if ($id_news!='') {
                // update old news
                $message['page_before'] = 'Edit News';
                $message['page_link'] = 'news/edit_news/'.$id_news;
                if ($title=='')
                    throw new Exception('Error field title must not be blank.'.br(1).'Click '.anchor('news/edit_news/'.$id_news,'here').' to try again.');
                $options = array('id'=>$id_news,'content'=>$text, 'title'=>$title);
                $updateNews = $this->newsModel->updateNews($options);
                if (is_bool($updateNews))
                    throw new Exception('Error update news on database.'.br(1).'Click '.anchor('news/edit_news/'.$id_news,'here').' to try again.');
                $message['status'] = 'Success';
                $message['message'] = 'News is successfully updated.'.br(1).'Click '.anchor('news/show_news/'.$id_news,'here').' to view this news.';
            } else {
                // insert baru
                $message['page_before'] = 'Add News';
                $message['page_link'] = 'news/add_news';
                if ($title=='')
                    throw new Exception('Error field title must not be blank.'.br(1).'Click '.anchor('news/add_news','here').' to try again.');
                $options = array('content'=>$text, 'title'=>$title);
                $insertNews = $this->newsModel->addNews($options);
                if (is_bool($insertNews))
                    throw new Exception('Error insert news on database.'.br(1).'Click '.anchor('news/add_news','here').' to try again.');
                $message['status'] = 'Success';
                $message['message'] = 'News is successfully added.'.br(1).'Click '.anchor('news/show_news/'.$insertNews,'here').' to view this news.';
            }
        } catch (Exception $e) {
            $message['status'] = 'An Error Occurred';
            $message['message'] = $e->getMessage();
        }

        // redirect ke info view
        $this->session->set_flashdata('message', $message);
        redirect('info/show','refresh');
    }
    
    
    function getStruktur($view) {
        $struktur = array (
            array (
                'islink'=>1,
                'link'=>'home',
                'label'=>'Home'
            ),
            array (
                'islink'=>0,
                'label'=>$view
            )
        );
        return $struktur;
    }
    
    function getStruktur2($view) {
        $struktur = array (
            array (
                'islink'=>1,
                'link'=>'home',
                'label'=>'Home'
            ),
            array (
                'islink'=>1,
                'link'=>'news/show',
                'label'=>'News'
            ),
            array (
                'islink'=>0,
                'label'=>$view
            )
        );
        return $struktur;
    }
}

?>
