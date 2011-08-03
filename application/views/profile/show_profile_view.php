<div class="profile-left-menu">
    <div class="profile-black-wrapper">
        <div id="profpic">
            <?php
            $image_properties = array(
                'src' => $user_data['image'],
                'class' => 'profpic_images',
                'id' => 'upload_image',
                'rel' => 'lightbox',
            );
            echo img($image_properties);
            ?>
        </div>
        <div class="clearboth">
        </div>
        <div class="add_friend_link">
            <?php if ($add_as_friend == 1) { ?>
                <div id="add_as_friend">
                    <a href="#" class="popup_link">Add as friend</a>
                </div>
            <?php } else if ($add_as_friend == 2) { ?>
                <div id="add_as_friend">
                    Your friend request has been sent.
                </div>
            <?php } else if ($add_as_friend == 3) { ?>
                <div id="add_as_friend">
                    <a href="#" onclick="javascript:unfriend('<?php echo $user_data['user_id']; ?>', '<?php echo $user_data['name']; ?>')";>Block from friend</a>
                </div>
            <?php } else if ($add_as_friend == 4) { ?>
                <div id="add_as_friend">
                    <a href="#" onclick="javascript:confirm_friend('<?php echo $id_request; ?>', true)";>Confirm</a> &nbsp;&nbsp;
                    <a href="#" onclick="javascript:confirm_friend('<?php echo $id_request; ?>', false)";>Reject</a>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="profile-bottom-menu">
        <div id="friend_list_sidebar">
            <div id="title-menu">
                <?php echo anchor('show_all_friends/user/' . $user_data['user_id'], 'Friends (' . $count_friends . ')') ?>
            </div>
            <?php
            if (count($friend_list_sidebar) == 0) {
                echo "<label class='general_text'>He/she doesn't have any friends.</label>";
            } else {
                foreach ($friend_list_sidebar as $friend) {
                    ?>
                    <div id ="friend_wrapper">
                        <div id="profpic">
                            <?php echo "<img src ='" . base_url() . $friend['profpict_url'] . "'/>"; ?>
                        </div>
                        <div id="info_wrapper">
                            <div id="name">
                                <a href="profile/user/<?php echo $friend['id']; ?>" class="link"><?php echo $friend['name']; ?></a>
                            </div>
                            <div id="nickname" class="general_text">
                                <?php echo $friend['nickname']; ?>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
    
</div>

<div class="profile-right-menu">
    <div id="profile-info">
        <?php $this->load->view('profile/user_info', $user_data); ?>
    </div>
</div>

<div class="clearboth">
</div>

<div class="clearboth">
</div>
<?php $this->load->view('popup/add_as_friend_form', $user_data); ?>

<script type="text/javascript">
    function unfriend(val, name) {
        if (confirm('Are you sure you want to remove '+name+' as your friend?')) {
            var link = '<?php echo site_url('friend/unfriend'); ?>';
            var link_add = '<a href="#" class="popup_link">Add as friend</a>';
            var form_data = {
                user_id : val,
                ajax: '1'		
            };

            $.ajax({
                url: link,
                type: 'POST',
                data: form_data,
                success: function(msg) {
                    if (msg.success==1) {
                        $('#add_as_friend').html(link_add);
                        // bind function
                        $('#add_as_friend')
                        .find('.popup_link')
                        .unbind('click.pop')
                        .bind('click.pop', function(){
                            show_popup();
                        });
                    } else {
                        alert('Error');
                    }
                }
            });
        }
        return false;
    }
    
    function confirm_friend(id, val) {
        var message='';
        var link = '';
        var link_add = '<a href="#" class="popup_link">Add as friend</a>';
        var link_block = '<a href="#" onclick="javascript:unfriend(\'<?php echo $user_data['user_id']; ?>\')";>Block from friend</a>';
        var konfirm = false;
        if (val) {
            message = 'Are you sure to confirm this friend request?';
            link = '<?php echo site_url('friend/confirm_request'); ?>';
            konfirm = true;
        } else {
            message = 'Are you sure you want to reject this friend request?';
            link = '<?php echo site_url('friend/confirm_request'); ?>';
            if (confirm(message)) {
                konfirm = true;
            }
        }
        if (konfirm) {
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
                        if (val) {
                            $('#add_as_friend').html(link_block);
                        } else {
                            $('#add_as_friend').html(link_add);
                            $('#add_as_friend')
                            .find('.popup_link')
                            .unbind('click.pop')
                            .bind('click.pop', function(){
                                show_popup();
                            });
                        }
                    } else {
                        alert('Error');
                    }
                }
            });
        }
        return false;
    }
</script>
