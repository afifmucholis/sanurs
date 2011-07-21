<div class="left-menu">
    <div id="col_left">
        <div id="profpic">
            <?php
            $image_properties = array(
                'src' => $user_data['image'],
                'class' => 'event_images',
                'id' => 'upload_image',
                'rel' => 'lightbox',
            );
            echo img($image_properties);
            ?>
        </div>

        <?php if ($add_as_friend == 1) { ?>
            <div id="add_as_friend">
                <a href="#" class="popup_link">Add as friend</a>
            </div>
        <?php } else if ($add_as_friend == 2) { ?>
            <div id="add_as_friend">
                Request has been sent.
            </div>
        <?php } else if ($add_as_friend == 3) { ?>
            <div id="add_as_friend">
                <a href="#" onclick="javascript:unfriend('<?php echo $user_data['user_id']; ?>')";>Block from friend</a>
            </div>
        <?php } ?>
        </br></br>
        <div id="info">
            Info :
            <?php $this->load->view('profile/user_info', $user_data); ?>
        </div>
        </br></br></br></br>

        <div id="news">
            Levana is hosting “A Night of Neglect” this Saturday, 8 October 2011. Check it out
        </div>
    </div>
</div>

<div class="right-menu">
    <div id="col_right">
        <div id="friend_list_sidebar">
            <?php echo anchor('show_all_friends/user/'.$user_data['user_id'], 'Friends ('.$count_friends.')')?>
            <?php
            if (count($friend_list_sidebar) == 0) {
                echo "You don't have any friends.";
            } else {
                foreach ($friend_list_sidebar as $friend) {
                    ?>
                    <div id = "friend_wrapper">
                        <div id="profpic">
                            <?php echo "<img src ='" . base_url() . $friend['profpict_url'] . "'/>"; ?>
                        </div>
                        <div id="info_wrapper">
                            <div id="name">
                              <a href="profile/user/<?php echo $friend['id'];?>"><?php echo $friend['name']; ?></a>
                            </div>
                            <div id="nickname">
                                <?php echo $friend['nickname']; ?>
                            </div>
                        </div>
                    </div>
                    <div id="clearboth">
                    </div>
                <?php }
            } ?>
        </div>
    </div>
</div>
<div id="clearboth">
</div>
<?php $this->load->view('popup/add_as_friend_form', $user_data); ?>

<script type="text/javascript">
    function unfriend(val) {
        if (confirm('Are you sure to remove this person from your friend?')) {
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
                    } else {
                        alert('Error');
                    }
                }
            });
        }
        return false;
    }
</script>
