<div id="show_all_friends">    
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
                <div id ='friend_name'>
                    <?php echo $friend['name']; ?>
                </div>
                <div id ='friend_nickname'>
                    <?php echo $friend['nickname']; ?>
                </div>                
            </div>
        <?php }
        } ?>
    <hr>
    <div id ="link_pagination"> 
        <?php echo $pagination; ?>
    </div>
    <div id="clearboth">
    </div>
</div>

<script>
    $(document).ready( function(){
        $("#link_pagination a").click(function() {
            var offset = $(this).attr('href').split('/');
            var userid_viewed = '<?php echo $userid_viewed ?>';
            var link = 'show_all_friends/user/'+userid_viewed;
            $.ajax({
                type: "POST",
                url: link,
                data : {offsetval:offset[offset.length-1], ajax : 1},
                success: function(msg){
                    $("#show_all_friends").html(msg["text"]);
                }
            });               
            return false;
        });            
    });
</script>