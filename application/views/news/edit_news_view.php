<div id="title-menu">Edit News</div>

<div id="form_add_news">
    <?php 
        $data['id_news'] = $id_news;
        $data['old_news'] = $old_news;
        $data['old_title'] = $old_title;
        $this->load->view('news/text_editor_view', $data);
    ?>
</div>