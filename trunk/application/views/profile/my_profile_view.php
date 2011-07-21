<div class="left-menu">
    <div id="col_left">
        <div id="link">
            <?php
            echo anchor('profile/editProfile', ' Edit your profile') . "&nbsp&nbsp&nbsp";
            if ($new_notification == 0) {
                echo anchor('notification', 'Notification') . "&nbsp&nbsp&nbsp";
            } else {
                echo anchor('notification', 'Notification (' . $new_notification . ')' . "&nbsp&nbsp&nbsp");
            }
            if ($request_friend == 0)
                echo anchor('friend/friend_request', 'Friend Request') . "&nbsp&nbsp&nbsp";
            else
                echo anchor('friend/friend_request', 'Friend Request(' . $request_friend . ')');
            ?>
        </div>

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

        <div id="info">
            Info :
            <?php $this->load->view('profile/user_info', $user_data); ?>
        </div>
        <br/><br/><br/><br/><br/><br/><br/>
        <div id="calendar">
            No upcoming event<br/>
            <?php echo $user_data['calendar']; ?><br/>
            <?php echo anchor('event/mycalendar', 'Go to your calendar'); ?>
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
                            <?php echo "<img src =' " . base_url() . $friend['profpict_url'] . "'/>"; ?>
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