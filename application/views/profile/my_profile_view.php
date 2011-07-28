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
    <div class="clearboth">
    </div>
    <div id="link">
        <ul class="profile-navigation">
            <li>
                <?php echo anchor('profile/editProfile', ' EDIT PROFILE'); ?>
            </li>

            <li>
                <?php
                if ($new_notification == 0) {
                    echo anchor('notification', 'NOTIFICATION');
                } else {
                    echo anchor('notification', 'NOTIFICATION (' . $new_notification . ')');
                }
                ?>
            </li>
            <li>
                <?php
                if ($request_friend == 0)
                    echo anchor('friend/friend_request', 'FRIEND REQUEST');
                else
                    echo anchor('friend/friend_request', 'FRIEND REQUEST(' . $request_friend . ')');
                ?>
            </li>
        </ul>
    </div>
    
</div>

<div class="profile-right-menu">
    <div id="profile-info">
        <?php $this->load->view('profile/user_info', $user_data); ?>
    </div>
</div>

<div class="clearboth">
</div>

<div class="profile-button-menu">
    <div id="calendar">
        No upcoming event<br/>
        <?php echo $user_data['calendar']; ?><br/>
        <?php echo anchor('event/mycalendar', 'Go to your calendar',"class='link'"); ?>
    </div>
    <div id="friend_list_sidebar">
        <div id="title-menu">
            <?php echo anchor('show_all_friends/user/' . $user_data['user_id'], 'FRIENDS (' . $count_friends . ')') ?>
        </div>
        
        <?php
        if (count($friend_list_sidebar) == 0) {
            echo "<label class='general_text'>You don't have any friends.</label>";
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
            <?php }
        } ?>
    </div>
</div>
<div class="clearboth">
</div>