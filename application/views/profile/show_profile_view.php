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
        <?php } ?>
    </div>
</div>
<div id="clearboth">
</div>
<?php $this->load->view('popup/add_as_friend_form', $user_data); ?>
