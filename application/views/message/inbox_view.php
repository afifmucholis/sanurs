<div id="inbox">    
    <?php
    if (count($inbox) == 0) {
        echo "<label class='general_text'>No message for you</label>";
    } else {
        foreach ($inbox as $message) {
            ?> 
            <div id="message_wrapper">
                <a href="inbox_detail_view" class="ajax-links-inbox">
                    <div id='message_summary'>
                        <div id='profpict_sender'>
                            <?php echo "<img src =' " . base_url() . $message['from_profpict'] . "'/>"; ?>
                        </div>
                        <div id ='sender'>
                            <?php echo strtoupper($message['from_name'])?>
                            <?php
                                if ($message['from_nickname']!='')
                                {
                                   echo "( ".$message['from_nickname'] . " )".'<br/>';
                                }
                            ?>
                            
                        </div>
                        <div id ='subject'>
                            <?php echo $message['subject'] . '<br/>'; ?>
                        </div>
                        <div id ='date'>
                            <?php echo $message['date']; ?>
                        </div>
                        <div id='content_text'>
                            <?php echo $message['message'] . '<br/>'; ?>
                        </div>
                        <?php echo form_hidden('id', $message['id']);?>
                    </div>
                </a>
                <div class="clearboth">
                </div>
                <div id="liner">
                    <?php echo "<hr>"; ?>    
                </div>
            </div>
        <?php }
        ?> 
        <ul id="link_pagination"> 
            <?php echo $pagination; ?>
        </ul>
    <?php } ?>

    <div class="clearboth">
    </div>
</div>

<script>
    function click_message(val, mid) {
        var link = 'message/view/'+val;
        var offsetval;
        var form_data;
        if (val=='inbox_view') {
            offsetval = 0;
            form_data = {
                ajax: '1',
                offset : offsetval
            }
        } else if (val=='inbox_detail_view') {
            form_data = {
                ajax: '1',
                id : mid
            }
        }  else {
            form_data = {
                ajax : '1'
            }
        }            
            
        
        $.ajax({
            url: link,
            type: 'GET',
            data: form_data,
            success: function(msg) {
                $('#content_message').html(msg["text"]);
                var his = $('#history').html().split(' » ');
                var his2 = "";
                var count=0;
                while (count<his.length-1) {
                    his2+=his[count];count++;
                    his2+=" &raquo; ";
                }
                $('#history').html(his2+msg["struktur"][2]["label"]);
            }
        });
        return false;
    }
    
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
        
        $('a.ajax-links-inbox').click(function(){
            var mid = $(this).find('input[name="id"]').val();
            return click_message($(this).attr("href"), mid);
        });
    });
</script>