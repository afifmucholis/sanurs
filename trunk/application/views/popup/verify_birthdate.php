<div id ="birthdate_popup" class ="popup">
    <a href="#" class="popupContactClose">x</a>
    <form action="#" method="post" accept-charset="utf-8">
    <?php
        echo form_hidden('user_id', $user_data['user_id']);
        $data = array(
              'name'        => 'pesan',
              'id'          => 'pesan',
              'rows'         => '5',
              'cols'        => '40'
            );
        echo form_textarea($data)."<br/>";
        echo form_submit('submit2', 'Send Request', 'id="submit2"');
        $js = 'onClick="disablePopup()"';
        echo form_button('cancel', 'Cancel', $js);
        echo form_close();
    ?>
</div>
<div id="backgroundPopup"></div>

<script type="text/javascript">
    $('#submit2').click(function(){
        disablePopup();
        var link = '<?php echo site_url('friend/add');?>';
        var form_data = {
                user_id : $('#user_id').val(),
                message : $('#pesan').val(),
		ajax: '1'		
	};

	$.ajax({
		url: link,
		type: 'POST',
                data: form_data,
		success: function(msg) {
                   if (msg==1) {
                      $('#add_as_friend').html('Request has been sent.');
                   } else {
                   }
		}
	});	
        
	return false;
    });
</script>