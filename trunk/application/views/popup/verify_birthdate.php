<div id="notify">    
    <div>
        Sign Up
    </div>

    <div>
        Welcome to our online community! Signing up is the first step to start connecting, attending and making events, and get better deals!
    </div>

    <?php
    //echo "Welcome ".$alumni_id;
    echo "Welcome, " . $name;
    br(1);
    echo "Please enter your birth date to verify.";
    //echo form_open('sign_up/verify_birthdate');
    ?>
    <form action="#">
    <?php
    echo form_input('birthdate', '', 'id="datepicker"') . "<br/>";
    echo form_hidden('id',$alumni_id);
    echo form_hidden('name',$name);
    echo form_submit('submit', 'Submit', 'id="submit"');
    echo form_close();
    ?>
    <br/>
</div>
<script> 
    $(function() {
        //getter
        $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
    });
    
    $('#submit').click(function(){
        var link = '<?php echo site_url('sign_up/verify_birthdate');?>';
        var form_data = {
                id : $('input[name=id]').val(),
                name : $('input[name=name]').val(),
                birthdate : $('input[name=birthdate]').val(),
		ajax: '1'		
	};

	$.ajax({
		url: link,
		type: 'POST',
                data: form_data,
		success: function(msg) {
                    $("#notify").html(msg.text);
		}
	});	
	return false;
    });
    
</script> 