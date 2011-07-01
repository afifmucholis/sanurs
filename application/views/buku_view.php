<div id="tes">Click here</div>
<script type="text/javascript">
$('#tes').click(function() {
  var form_data = {
		ajax: '1'		
	};
	
	$.ajax({
		url: "<?php echo site_url('buku_con/tampilBuku'); ?>",
		type: 'POST',
		data: form_data,
		success: function(msg) {
			$('#main_content').html(msg);
		}
	});
	
	return false;
});
</script>
