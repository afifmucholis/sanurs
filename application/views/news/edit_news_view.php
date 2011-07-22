<h3>Edit News</h3>

<div id="form_add_news">
    <?php 
        $data['id_news'] = $id_news;
        $data['old_news'] = $old_news;
        $data['old_title'] = $old_title;
        $this->load->view('news/text_editor_view', $data);
    ?>
</div>