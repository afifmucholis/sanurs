<h3>News</h3>
<br/>
<?php
    if ($isadmin) {
        echo anchor('news/add_news', 'Add News');
        echo br(1);
    }
?>
<div id="news_holder">
    <?php
        $data['all_news'] = $all_news;
        $this->load->view('news/list_news',$data);
    ?>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        bindPagination();
    });
    
    function bindPagination() {
        $('#news_holder')
            .find('#link_pagination a')
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
                $("#news_holder").html(msg["text"]);
                bindPagination();
            }
        });               
        return false;
    }
</script>