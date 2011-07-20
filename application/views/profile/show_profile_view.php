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
        <div id="news">
            Levana is hosting “A Night of Neglect” this Saturday, 8 October 2011. Check it out
        </div>
    </div>
</div>

<div class="right-menu">
    <div id="col_right">
        <div id="info">
            <?php $this->load->view('profile/user_info', $user_data); ?>
        </div>
        <br/>
        <?php if ($add_as_friend==1) { ?>
            <div id="add_as_friend">
                <a href="#" class="popup_link">Add as friend</a>
            </div>
        <?php } else if ($add_as_friend==2) { ?>
            <div id="add_as_friend">
                Request has been sent.
            </div>
        <?php } else if ($add_as_friend==3) { ?>
            <div id="add_as_friend">
                <a href="#" onclick="javascript:unfriend('<?php echo $user_data['user_id'];?>')";>Block from friend</a>
            </div>
        <?php } ?>
    </div>
</div>
<div id="clearboth">
</div>
<?php $this->load->view('popup/add_as_friend_form', $user_data); ?>

<script type="text/javascript">
    function unfriend(val) {
        if (confirm('Are you sure to remove this person from your friend?')) {
            var link = '<?php echo site_url('friend/unfriend');?>';
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
