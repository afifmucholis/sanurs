<?php
    echo form_open('about_us/contact');
    echo form_label('Email : ','email')."   ";
    echo form_input('Email', '', 'id="email"')."<br/>";
    echo form_label('Subject : ','subject')."  ";
    echo form_input('Subject', '', 'id="subject"')."<br/>";
    $data = array(
              'name'        => 'isi',
              'id'          => 'isi',
              'rows'         => '10',
              'cols'        => '40'
            );
    echo form_textarea($data)."<br/>";
    echo form_submit('submit', 'Submit', 'id="submit"');
    echo form_close();
?>

<script type="text/javascript">
$('#submit').click(function() {
        
	var form_data = {
		email: $('#email').val(),
                subject: $('#subject').val(),
		message: $('#isi').val()
	};
	
	$.ajax({
		url: "<?php echo site_url('about_us/contact'); ?>",
		type: 'POST',
		data: form_data,
		success: function(msg) {
			$('#content').html(msg);
		}
	});
	
	return false;
});
	
	
</script>