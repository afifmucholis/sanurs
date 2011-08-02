<div id="news_holder">
    <div id="news_holder_left">
        <?php
        $data['all_news'] = $all_news;
        $this->load->view('news/list_news', $data);
        ?>
    </div>
    
    <div id="news_holder_right">
        <?php echo br(10);?>
        <div id="latest">LATEST NEWS</div>
        <div id="title_sanur_news">SANTA URSULA</div>
        <p>NHA is a leading International partnership practicing architecture and urban planning. Our buildings around the world insist on clever forms while inventing new options for everyday use and content.</p>
    </div>
    
    <div class="clearboth"></div>
    <ul id="link_pagination"> 
        <?php echo $pagination; ?>
    </ul>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        bindPagination();
        bindDeleteConfirm();
    });
    
    function bindPagination() {
        $('#link_pagination a')
            .unbind('click.page')
            .bind('click.page',function(){
                return clickPagination(this);    
            });
    }
   
    function clickPagination(val) {
        var offset = $(val).attr('href').split('/');
        var link = '<?php echo site_url('news/show') ?>';
        $.ajax({
            type: "POST",
            url: link,
            data : {offsetval:offset[offset.length-1], ajax : 1},
            success: function(msg){
                $("#news_holder_left").html(msg["text"]);
                $("#link_pagination").html(msg["pagination"]);
                bindPagination();
                bindDeleteConfirm();
            }
        });               
        return false;
    }
    
    function bindDeleteConfirm() {
        $('#news_holder')
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