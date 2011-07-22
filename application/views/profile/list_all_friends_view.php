<?php
if (count($friends) == 0) {
    echo "You don't have any friends. Forever alone? ffffuuu";
} else {
    foreach ($friends as $friend) {
        ?> 
        <div id="show_friends_wrapper">
            <div id='friend_profpic'>
                <?php echo "<img src =' " . base_url() . $friend['profpict_url'] . "'/>"; ?>
            </div>
            <div id="show_info_wrapper">
                <div id ='friend_name'>
                    <a href="<?php echo site_url('profile/user/' . $friend['id']); ?>"><?php echo $friend['name']; ?></a>
                </div>
                <div id ='friend_nickname'>
                    <?php echo $friend['nickname']; ?>
                </div>                
            </div>
        </div>
        <div id="clearboth">
        </div>
        <hr>
    <?php }
} ?>

<div id ="link_pagination"> 
    <?php echo $pagination; ?>
</div>
<div id="clearboth">
</div>