<h3>About Us</h3>
<div id="link">
    <label><a href="history" class="ajax-links">History</a></label>
    <label><a href="visimisi" class="ajax-links">Vision and Mission</a></label>
    <label><a href="contact" class="ajax-links">Contact Us</a></label>
    <label><a href="link_web" class="ajax-links">Santa Ursula Website</a></label>
</div>
<div id="content">
    <?php $this->load->view($view); ?>
</div>

<script type="text/javascript">
$('a.ajax-links').click(function() {	
	var link = 'about_us/view/'+$(this).attr("href");
        var form_data = {
		ajax: '1'		
	};

	$.ajax({
		url: link,
		type: 'GET',
                data: form_data,
		success: function(msg) {
                   $('#content').html(msg["text"]);
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


