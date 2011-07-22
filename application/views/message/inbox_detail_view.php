<div id="inbox_detail">    
    <div id="message_detail_wrapper">
        <div id="message_top">
            <div id ='subject'>
                <?php echo $inbox_detail['subject'] . '<br/>'; ?>
            </div>
            <div id ='date'>
                <?php echo $inbox_detail['date']; ?>
            </div>
        </div>
        <div id="message_info">
            <div id='profpict_sender'>
                <?php echo "<img src =' " . base_url() . $inbox_detail['from_profpict'] . "'/>"; ?>
            </div>
            <div id ='sender'>
                <?php echo $inbox_detail['from_name'] . ' ('; ?>
                <?php echo $inbox_detail['from_nickname'] . ' )<br/>'; ?>
            </div>
        </div>
        <div class="clearboth">
        </div>
        Message : 
        <div id='content_text'>
            <?php echo $inbox_detail['message'] . '<br/>'; ?>
        </div>
    </div>
</div>
