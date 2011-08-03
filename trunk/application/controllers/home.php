<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of testClass
 *
 * @author user
 */
class Home extends CI_Controller {
    function index() {
        $data['title'] = 'Home';
        $data['main_content'] = 'home_view';
        $data['body_id'] = 'home_body';
        
        // load model news
        $this->load->model('news_model','newsModel');
        $options = array('sortBy'=>'publishing_date','sortDirection'=>'desc','limit'=>5);
        $news_result = $this->newsModel->getNews($options);
        $data['recent_news'] = $news_result;
        
        // load helper
        $this->load->helper('simple_html_dom');
        
        $this->load->view('includes/template',$data);
    }
    
}

?>
