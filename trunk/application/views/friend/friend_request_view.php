<h3>Friend Request</h3>
<br/>
<div id="friend_request">
    <?php
    if ($request_friend == 0) {
        echo "No Friend Request.<br/>";
    } else {
        foreach ($request_friend as $request) :
            ?>
            <div id="user">
                <div id="img_prof" style="float:left">
                    <?php
                    $image_properties = array(
                        'src' => $request['prof_pic'],
                        'width' => 90,
                        'height' => 100,
                    );
                    echo img($image_properties);
                    ?>
                </div>
                <div id="info_request"  style="float:left; padding-left: 10px;">
                    <div id="user_link">
                        <?php
                        echo anchor('profile/user/' . $request['user_requester'], $request['name']);
                        ?>
                    </div>
                    <div id="message_request"><?php
                echo br(1);
                if ($request['message'] != '') {
                    echo $request['message'];
                } else {
                    echo br(2);
                }
                        ?></div>
                    <div id="button_approve_<?php echo $request['id_request'];?>">
                        <?php
                        echo form_button('confirm', 'Confirm', 'onclick="javascript:confirmRequest(\''.$request['id_request'].'\', \'true\');"');
                        echo form_button('reject', 'Reject', 'onclick="javascript:confirmRequest(\''.$request['id_request'].'\', \'false\');"');
                        ?>
                    </div>
                </div>
                <div id="clearboth"></div>
            </div>
            <?php
            echo br(1);
        endforeach;
    }
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
