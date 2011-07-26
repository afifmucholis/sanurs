<div id="news">
    <?php
        if ($isadmin) {
            echo anchor('news/edit_news/'.$id_news, 'Edit this news');
            echo '&nbsp;&nbsp;';
            echo anchor('news/delete_news/'.$id_news, 'Delete News', 'class="remove_news"');
            echo br(1);
        }
    ?>
    <div id="title_news">
        <h3><?php echo $title_news; ?></h3>
    </div>
    <div id="publishing_date">
        <?php echo $date;?>
    </div>
    <div id="content_news">
        <?php echo $content;?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        bindDeleteConfirm();
    });
    function bindDeleteConfirm() {
        $('#news')
            .find('a.remove_news')
            .unbind('click.delete')
            .bind('click.delete',function(){
                return delete_news_confirm();
            });
    }
    function delete_news_confirm() {
        return confirm('Are you sure to delete this news?');
    }
    
    
</script>