<div class="profile-left-menu">
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
    <div id="link">
        <div class="profile-navigation">
            <?php echo anchor('profile/editProfile', ' EDIT PROFILE'); ?>
        </div>

        <div class="profile-navigation">
            <?php
            if ($new_notification == 0) {
                echo anchor('notification', 'NOTIFICATION');
            } else {
                echo anchor('notification', 'NOTIFICATION (' . $new_notification . ')');
            }
            ?>
        </div>
        <div class="profile-navigation">
            <?php
            if ($request_friend == 0)
                echo anchor('friend/friend_request', 'FRIEND REQUEST');
            else
                echo anchor('friend/friend_request', 'FRIEND REQUEST(' . $request_friend . ')');
            ?>
        </div>
    </div>


    <br/><br/><br/><br/><br/><br/><br/>
    <div id="calendar">
        No upcoming event<br/>
        <?php echo $user_data['calendar']; ?><br/>
        <?php echo anchor('event/mycalendar', 'Go to your calendar'); ?>
    </div>
</div>

<div class="profile-right-menu">
    <div id="info">
        Info :
        <?php $this->load->view('profile/user_info', $user_data); ?>
    </div>
</div>

<div class="clearboth">
</div>

<div class="profile-button-menu">
    <div id="friend_list_sidebar">
        <?php echo anchor('show_all_friends/user/' . $user_data['user_id'], 'Friends (' . $count_friends . ')') ?>
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
                            <a href="profile/user/<?php echo $friend['id']; ?>"><?php echo $friend['name']; ?></a>
                        </div>
                        <div id="nickname">
                            <?php echo $friend['nickname']; ?>
                        </div>
                    </div>
                </div>
                <div class="clearboth">
                </div>
            <?php }
        } ?>
    </div>
</div>
<div class="clearboth">
</div>