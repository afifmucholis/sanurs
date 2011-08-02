<div id="inbox_detail">    
    <div id="message_detail_wrapper">
        <div id="message_info">
            <div id='profpict_sender'>
                <?php echo "<img src =' " . base_url() . $inbox_detail['from_profpict'] . "'/>"; ?>
            </div>
            <div id ='sender'  style="font-family: Arial; font-size: 18px">
                <?php echo strtoupper($inbox_detail['from_name']); ?>
                <?php 
                    if (isset ($inbox_detail['from_nickname']) && $inbox_detail['from_nickname']!='') {
                    echo '('.$inbox_detail['from_nickname'] . ')<br/>';
                }
                ?>
            </div>
            <div id ='subject'  style="font-family: impact; font-size: 28px; color:rgb(70,70,70);">
                <?php echo $inbox_detail['subject'] . '<br/>'; ?>
            </div>
            <div id ='date'  style="font-family: Arial Black; font-size: 14px">
                <?php echo $inbox_detail['date']; ?>
            </div> <br/>
            <div id='content_text' class="general_text" style="text-align: justify; color:rgb(70,70,70);">
                <?php echo $inbox_detail['message'] . '<br/>'; ?>
            </div>
        </div>
        <div class="clearboth">
        </div>
    </div>
</div>
