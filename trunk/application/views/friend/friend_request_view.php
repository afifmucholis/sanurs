<div id="title-menu">Friend Request</h3></div>
<br/>
<div id="friend_request">
    <?php
        $data['request_friend'] = $request_friend;
        $this->load->view('friend/list_friend_request',$data);
    ?>
</div>

<script type="text/javascript">
    function confirmRequest(id, val) {
        var link = '<?php echo site_url('friend/confirm_request');?>';
        var form_data = {
                id : id,
                type : val,
		ajax: '1'		
	};

	$.ajax({
		url: link,
		type: 'POST',
                data: form_data,
		success: function(msg) {
                    if (msg.success==1) {
                        $('#button_approve_'+id).html(msg.message);
                    } else {
                        alert(msg.message);
                    }
		}
	});
    }
    
    $(document).ready(function(){
        bindPagination();
    });
    
    function bindPagination() {
        $('#friend_request')
            .find('#link_pagination a')
            .unbind('click.page')
            .bind('click.page',function(){
                return clickPagination(this);    
            });
    }
   
    function clickPagination(val) {
        var offset = $(val).attr('href').split('/');
        var link = '<?php echo site_url('friend/friend_request') ?>';
        $.ajax({
            type: "POST",
            url: link,
            data : {offsetval:offset[offset.length-1], ajax : 1},
            success: function(msg){
                $("#friend_request").html(msg["text"]);
                bindPagination();
            }
        });               
        return false;
    }
    
</script>
