<?php
if (count($request_friend) == 0) {
    echo "<label class='general_text'>You don't have any friend request.<br/></label>";
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
                    echo anchor('profile/user/' . $request['user_requester'], $request['name'], 'class="link"');
                    ?>
                </div>
                <div id="message_request" class="general_text"><?php
            echo br(1);
            if ($request['message'] != '') {
                echo $request['message'];
                echo br(1);
            } else {
                echo br(2);
            }
                    ?></div>
                <div id="button_approve_<?php echo $request['id_request']; ?>" class="general_text">
                    <?php
                    echo form_button('confirm', 'Confirm', 'onclick="javascript:confirmRequest(\'' . $request['id_request'] . '\', \'true\');"');
                    echo form_button('reject', 'Reject', 'onclick="javascript:confirmRequest(\'' . $request['id_request'] . '\', \'false\');"');
                    ?>
                </div>
            </div>
            <div class="clearboth"></div>
        </div>
        <?php
        echo br(1);
    endforeach;
}
?>

<ul id="link_pagination"> 
    <?php echo $pagination; ?>
</ul>

<div class="clearboth">
</div>