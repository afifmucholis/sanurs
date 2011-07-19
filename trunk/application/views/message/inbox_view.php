<div id="inbox">
    <h3>Inbox</h3>
    <?php
    if (count($inbox) == 0) {
        echo "No message for you";
    } else {
        foreach ($inbox as $message) {
            ?>    
            <div id='message_summary'>
                <div id='profpict_sender'>
                    <?php echo "<img src =' " . base_url() . $message['from_profpict'] . "'/>"; ?>
                </div>
                <div id ='subject'>
                    <?php echo $message['subject'] . '<br/>'; ?>
                </div>
                <div id ='sender'>
                    <?php echo $message['from_name'] . ' ('; ?>
                    <?php echo $message['from_nickname'] .' )<br/>'; ?>
                </div>
                <div id ='date'>
                    <?php echo $message['date']; ?>
                </div>
                <div id='content_text'>
                    <?php echo $message['message'] . '<br/>'; ?>
                </div>
            </div>
            <div id="clearboth">
            </div>
            <?php echo "<hr>"; ?>

        <?php }
        ?> 
        <div id ="link_pagination"> 
            <?php echo $pagination; ?>
        </div>
    <?php } ?>

    <div id="clearboth">
    </div>
</div>

<script>
    $(document).ready( function(){
        var link = 'message/view/inbox_view';
        $("#link_pagination a").click(function() {
            var offset = $(this).attr('href').split('/');
            $.ajax({
                type: "GET",
                url: link,
                data : {offsetval:offset[offset.length-1], ajax : 1},
                success: function(msg){
                    $("#inbox").html(msg["text"]);
                }
            });               
            return false;
        });            
    });
</script>