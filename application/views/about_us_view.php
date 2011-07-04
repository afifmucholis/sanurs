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
	$.ajax({
		url: link,
		type: 'GET',
		success: function(msg) {
                        $('#history').html(msg);
			$('#content').html(msg);
		}
	});
	
	return false;
});
	
	
</script>


