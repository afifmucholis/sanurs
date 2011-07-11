<div id="left" style="float: left">
    <div id="link">
        <label><a href="basic_info" class="ajax-links">Basic Info</a></label>
        <label><a href="location" class="ajax-links">Location</a></label>
        <label><a href="education" class="ajax-links">Education</a></label>
        <label><a href="working" class="ajax-links">Working</a></label>
        <label><a href="visibility" class="ajax-links">Visibility</a></label>
    </div>
</div>
<div id="clearboth"></div>

<div id="content_edit">
    <?php $this->load->view($content_edit_view, $content_edit); ?>
</div>

<script type="text/javascript">
$('a.ajax-links').click(function() {	
	var link = '<?php echo site_url('profile/edit_');?>'+$(this).attr("href");
        var form_data = {
		ajax: '1'		
	};

	$.ajax({
		url: link,
		type: 'GET',
                data: form_data,
		success: function(msg) {
                   $('#content_edit').html(msg.text);
                   var his = $('#history').html().split('/');
                   var his2 = "";
                   var count=0;
                   while (count<his.length-1) {
                       his2+=his[count];count++;
                       his2+="/";
                   }
                   $('#history').html(his2+msg.struktur[2]["label"]);
		}
	});
	
	return false;
});
	
	
</script>

