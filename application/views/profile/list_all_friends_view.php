<?php
if (count($friends) == 0) {
    echo "You don't have any friends. Forever alone? ffffuuu";
} else {
    foreach ($friends as $friend) {
        ?> 
        <a class="search_result_divlink" href="<?php echo site_url('profile/user/' . $friend['id']); ?>">
            <div id="show_friends_wrapper">
                <div id='friend_profpic'>
                    <?php echo "<img src =' " . base_url() . $friend['profpict_url'] . "'/>"; ?>
                </div>
                <div id="show_info_wrapper">
                    <div id ='friend_name'>
                        <?php echo $friend['name']; ?>
                    </div>
                    <div id ='friend_nickname'>
                        <?php echo $friend['nickname']; ?>
                    </div>                
                </div>
                <div class="clearboth"></div>
                <hr>
            </div>
        </a>
    <?php }
} ?>

<ul id="link_pagination"> 
    <?php echo $pagination; ?>
</ul>

<div class="clearboth">
</div>