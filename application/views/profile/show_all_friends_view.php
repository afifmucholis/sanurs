<?php  
    if ($userid_login==$userid_viewed) {
        echo "Your Friends :";
    } else {
        echo $username_viewed."'s Friends :";
    }
?>
<div id="show_all_friends">    
    <?php
        $data['friends'] = $friends;
        $this->load->view('profile/list_all_friends_view', $data);
    ?>

</div>

<script type="text/javascript">
    $(document).ready(function(){
        bindPagination();
    });
    
    function bindPagination() {
        $('#show_all_friends')
            .find('#link_pagination a')
            .unbind('click.page')
            .bind('click.page',function(){
                return clickPagination(this);    
            });
    }
   
    function clickPagination(val) {
        var offset = $(val).attr('href').split('/');
        var userid_viewed = '<?php echo $userid_viewed ?>';
        var link = 'show_all_friends/user/'+userid_viewed;
        
        $.ajax({
            type: "POST",
            url: link,
            data : {offsetval:offset[offset.length-1], ajax : 1},
            success: function(msg){
                $("#show_all_friends").html(msg["text"]);
                bindPagination();
            }
        });               
        return false;
    }
    
</script>
