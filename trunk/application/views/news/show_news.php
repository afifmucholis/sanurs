<div id="news">
    <?php
        if ($isadmin) {
            echo anchor('news/edit_news/'.$id_news, 'Edit this news','class="link"');
            echo '&nbsp;&nbsp;';
            echo anchor('news/delete_news/'.$id_news, 'Delete News', 'class="remove_news link"');
            echo br(1);
        }
    ?>
    <div id="title-menu">
        <?php echo $title_news; ?>
    </div>
    <div id="publishing_date">
        <?php echo $date;?>
    </div>
    <br/>
    <div id="content_news" class="general_text">
        <?php echo $content;?>
    </div>
    <div class="fb_comment" style="margin:auto;display:block;width:750px;">
        <div class="top_panel_fb_comment impact20">
            <div style="padding-left: 10px;padding-top: 5px;padding-bottom: 5px;">Comments</div>
        </div>
        <div class="content_fb_comment">
        <?php 
            echo $fb_comment;
        ?>
        </div>
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
        return confirm('Are you sure you want to delete this news?');
    }
    
    
</script>