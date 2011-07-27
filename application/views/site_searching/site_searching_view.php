<h3>Searching Result</h3>
<br/>
<div id="searching_site">
    <?php
        $data['search_result'] = $search_result;
        $this->load->view('site_searching/list_site_searching_view',$data);
    ?>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        bindPagination();
    });
    
    function bindPagination() {
        $('#searching_site')
            .find('#link_pagination a')
            .unbind('click.page')
            .bind('click.page',function(){
                return clickPagination(this);    
            });
    }
   
    function clickPagination(val) {
        var offset = $(val).attr('href').split('/');
        var link = '<?php echo site_url('site_searching/search') ?>';
        $.ajax({
            type: "POST",
            url: link,
            data : {offsetval:offset[offset.length-1], ajax : 1},
            success: function(msg){
                $("#searching_site").html(msg["text"]);
                bindPagination();
            }
        });               
        return false;
    }
    
</script>
