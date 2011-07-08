<div class="left-menu">
    <div id="col_left">
        <?php echo anchor('profile/editProfile', 'Edit your profile'); ?>
        <div id="profpic">
             <?php
                $image_properties = array(
                          'src' => $user_data['image'],
                          'alt' => 'No Photo Available',
                          'class' => 'event_images',
                          'id' => 'upload_image',
                          'width' => '250',
                          'height' => '400',
                          'title' => 'No Photo Available',
                          'rel' => 'lightbox',
                    );
                    echo img($image_properties);
              ?>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/>
        <div id="calendar">
            No upcoming event<br/>
            <?php echo $user_data['calendar']; ?><br/>
            <?php echo anchor('event/mycalendar', 'Go to your calendar'); ?>
        </div>

    </div>
</div>

<div class="right-menu">
    <div id="col_right">
        <div id="link">
            <?php echo anchor('event/host', 'Host an event') . "&nbsp;&nbsp;&nbsp;&nbsp;"; ?>
            <?php echo anchor('friend', 'Find a friend'); ?>
        </div>
        <div id="info">
            <?php $this->load->view('profile/user_info', $user_data); ?>
        </div>
    </div>
</div>
<div id="clearboth">
</div>