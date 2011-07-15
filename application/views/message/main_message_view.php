<h3>Message</h3>
<div id="link">
    <label><a href="new_message_view" class="ajax-links">New Message</a></label>
    <label><a href="inbox_view" class="ajax-links">Inbox</a></label>
</div>
<div id="content_message">
    <?php $this->load->view($view); ?>
</div>

<script type="text/javascript">
$('a.ajax-links').click(function() {	
	var link = 'message/view/'+$(this).attr("href");
        var form_data = {
		ajax: '1'		
	};

	$.ajax({
		url: link,
		type: 'GET',
                data: form_data,
		success: function(msg) {
                   $('#content_message').html(msg["text"]);
                   var his = $('#history').html().split('/');
                   var his2 = "";
                   var count=0;
                   while (count<his.length-1) {
                       his2+=his[count];count++;
                       his2+="/";
                   }
                   $('#history').html(his2+msg["struktur"][2]["label"]);
		}
	});
	
	return false;
});
	
	
</script>