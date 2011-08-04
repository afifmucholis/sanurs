<?php
/** * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_active_record $db
 * @property CI_DB_forge $dbforge
 */
class site_searching extends CI_Controller {

    function index() {
        $data['title'] = 'Site Searching';
        $data['main_content'] = 'site_searching/site_searching_view';
        $data['struktur'] = $this->_getStruktur();
        
        $this->load->view('includes/template', $data);
    }

    function search() {
        $data['title'] = 'Site Searching';
        $data['main_content'] = 'site_searching/site_searching_view';
        $data['struktur'] = $this->_getStruktur();
       
        
        $term = $this->input->post('term');
        
        $this->load->library('pagination');
        $per_page = 10;
        $offset = $this->input->post('offsetval');

        $search_result = $this->search_all($term);
        $total_search = count($search_result);
        
        $search_paginate = $this->searchAllNewsPaginate($per_page, $offset, $search_result);
        $data['search_result'] = $search_paginate;
        $base_url = site_url('site_searching/search');
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_search;
        $config['uri_segment'] = '2';
        $config['per_page'] = $per_page;
        $config['cur_page'] = $offset;

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li id="num_link">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li id="num_link">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = false;
        $config['prev_link'] = false;
        $config['cur_tag_open'] = '<li id="cur_link">';
        $config['cur_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li id="num_link">';
        $config['num_tag_close'] = '</li>';
        
        $data['term'] = $term;
        $data['total_search'] = $total_search;
         // load helper
        $this->load->helper('simple_html_dom');
        
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        if ($this->input->post('ajax')) {
             $data['view'] = 'site_searching/list_site_searching_view';     
            $text = $this->load->view($data['view'], $data, true);
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(array('text' => $text, 'struktur' => $data['struktur'])));
        } else {
            $this->load->view('includes/template', $data);
        }
    }
    function search_all($term) {
        //Load model news dan event
        $this->load->model('news_model', 'newsModel');
        $this->load->model('event_model', 'eventModel');

        //Di news, cari yang content atau title ada $term
        $optionNews1 = array('content LIKE' => $term);
        $optionNews2 = array('title LIKE' => $term);

        //Di event, cari yang title atau description
        $optionEvent1 = array('title LIKE' => $term);
        $optionEvent2 = array('description LIKE' => $term);

        //Cari news :
        $getNews1 = $this->newsModel->getNews($optionNews1);
        $getNews2 = $this->newsModel->getNews($optionNews2);

        //Cari event :
        $getEvent1 = $this->eventModel->getEvents($optionEvent1);
        $getEvent2 = $this->eventModel->getEvents($optionEvent2);

        $result = array();
        $numresultquery1 = 0;
        if (!is_bool($getNews1)) {
            $numresultquery1 = count($getNews1);
            for ($i = 0; $i < $numresultquery1; ++$i) {
                //Isi ke $result :
                $search = array();
                $search['category'] = 'News';
                $search['title'] = $getNews1[$i]->title;
                $search['content'] = $getNews1[$i]->content;
                $search['image'] = '';
                $search['link'] = 'news/show_news/' . $getNews1[$i]->id;
                $result[$i] = $search;
            }
        }
        $numresultquery2 = 0;
        if (!is_bool($getNews2)) {
            $numresultquery2 = count($getNews2);
            $start_index = $numresultquery1;
            $end_index = $numresultquery1 + $numresultquery2;
            for ($i = $start_index; $i < $end_index; ++$i) {
                //Isi ke $result :
                $search = array();
                $search['category'] = 'News';
                $search['title'] = $getNews2[$i-$start_index]->title;
                $search['content'] = $getNews2[$i-$start_index]->content;
                $search['image'] = '';
                $search['link'] = 'news/show_news/' . $getNews2[$i - $start_index]->id;
                $result[$i] = $search;
            }
        }
        $numresultquery3 = 0;
        if (!is_bool($getEvent1)) {
            $numresultquery3 = count($getEvent1);
            $start_index = $numresultquery1+$numresultquery2;
            $end_index = $numresultquery1 + $numresultquery2+$numresultquery3;
            for ($i = $start_index; $i < $end_index; ++$i) {
                //Isi ke $result :
                $search = array();
                $search['category'] = 'Event';
                $search['title'] = $getEvent1[$i-$start_index]->title;
                $search['content'] = $getEvent1[$i-$start_index]->description;
                $search['image'] = $getEvent1[$i-$start_index]->image_url;
                $search['link'] = 'event/show_event/' . $getEvent1[$i - $start_index]->id;
                $result[$i] = $search;
            }
        }
        $numresultquery4 = 0;
        if (!is_bool($getEvent2)) {
            $numresultquery4 = count($getEvent2);
            $start_index = $numresultquery1+$numresultquery2+$numresultquery3;
            $end_index = $numresultquery1 + $numresultquery2+$numresultquery3+$numresultquery4;
            for ($i = $start_index; $i < $end_index; ++$i) {
                //Isi ke $result :
                $search = array();
                $search['category'] = 'Event';
                $search['title'] = $getEvent2[$i-$start_index]->title;
                $search['content'] = $getEvent2[$i-$start_index]->description;
                $search['image'] = $getEvent2[$i-$start_index]->image_url;
                $search['link'] = 'event/show_event/' . $getEvent2[$i - $start_index]->id;
                $result[$i] = $search;
            }
        }
        
        //print_r($result);
        //return $result;
        return (array_unique($result, SORT_REGULAR));
    }
    
    function searchAllNewsPaginate($limit, $offset, $news_result) {
        $news_list = $news_result;
        $total_news = count($news_list);
        $news_paginate = array();
        if ($total_news <= $offset) {
            //Do nothing  
        } else {
            $start_index = $offset+1;
            $end_index = $start_index + $limit;
            $iterator = 0;
            for ($i = $start_index; $i < $end_index; ++$i) {
                if (isset($news_list[$i-1]['category'])) {
                    $news = array();
                    $news['category'] = $news_list[$i-1]['category'];
                    $news['title'] = $news_list[$i-1]['title'];
                    $news['content'] = $news_list[$i-1]['content'];
                    $news['image']  = $news_list[$i-1]['image'];
                    $news['link'] = $news_list[$i-1]['link'];

                    $news_paginate[$iterator] = $news;
                    ++$iterator;
                }
            }
        }
        return $news_paginate;
    }
    
    function _getStruktur(){
       $struktur = array (
            array (
                'islink'=>1,
                'link'=>'home',
                'label'=>'Home'
            ),
            array (
                'islink'=>0,
                'label'=>'Site Searching'
            )
        );
        return $struktur;
    }
        
}

?>
