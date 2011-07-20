<div class="left-menu">
    <div id="col_left">
        <?php 
            echo anchor('profile/editProfile', 'Edit your profile');
            echo "&nbsp;&nbsp;&nbsp;";
            if ($request_friend == 0)
                echo anchor('friend/friend_request', 'Friend Request');
            else
                echo anchor('friend/friend_request', 'Friend Request('.$request_friend.')');
        ?>
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
            <?php echo anchor('friend', 'Find a friend') . "&nbsp;"; ?>
            <?php 
                  if ($new_notification==0) { 
                    echo anchor('notification', 'Notification'); 
                  } else {
                    echo anchor('notification', 'Notification ('.$new_notification.')');
                  }
            ?>
        </div>
        <div id="info">
            <?php $this->load->view('profile/user_info', $user_data); ?>
        </div>
    </div>
</div>
<div id="clearboth">
</div>