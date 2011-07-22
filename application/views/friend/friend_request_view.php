<h3>Friend Request</h3>
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
    
</script>
