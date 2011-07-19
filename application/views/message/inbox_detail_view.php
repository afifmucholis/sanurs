<div id="inbox_detail">    
    <div id="message_detail_wrapper">
            <div id='message_summary'>
                <div id='profpict_sender'>
                    <?php echo "<img src =' " . base_url() . $inbox_detail['from_profpict'] . "'/>"; ?>
                </div>
                <div id ='subject'>
                    <?php echo $inbox_detail['subject'] . '<br/>'; ?>
                </div>
                <div id ='sender'>
                    <?php echo $inbox_detail['from_name'] . ' ('; ?>
                    <?php echo $inbox_detail['from_nickname'] . ' )<br/>'; ?>
                </div>
                <div id ='date'>
                    <?php echo $inbox_detail['date']; ?>
                </div>
                <div id='content_text'>
                    <?php echo $inbox_detail['message'] . '<br/>'; ?>
                </div>
                <label for="id" name="id" style="display:none;">
                    <?php echo $inbox_detail['id']; ?>
                </label> 
            </div>
        <div id="clearboth">
        </div>
    </div>
    <div id="clearboth">
    </div>
</div>
