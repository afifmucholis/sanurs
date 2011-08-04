<div id="title-menu">
    Message
</div>
<ul class="navigation-message">
    <li><a href="new_message_view" class="ajax-links">NEW MESSAGE</a></li>
    <li><a href="inbox_view" class="ajax-links">INBOX</a></li>
</ul>
<div class="clearboth">
</div>
<div id="content_message">
    
</div>
<script type="text/javascript">
<?php
$view = explode('/', $view);
?>
    $(document).ready(function(){
        $('a.ajax-links').click(function(){
            return click_message($(this).attr("href"));
        });
        click_message('<?php echo $view[count($view) - 1]; ?>');
    });

    function click_message(val) {
        var link = 'message/view/'+val;
        var offsetval;
        if (val=='inbox_view')
            offsetval = 0;
   
        var form_data = {
            ajax: '1',
            offset : offsetval
        };

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
</script>