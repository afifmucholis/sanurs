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
echo form_open('sign_up/verify_birthdate');
echo form_input('birthdate', '', 'id="datepicker"') . "<br/>";
echo form_hidden('id',$alumni_id);
echo form_submit('submit', 'Submit', 'id="submit"');
echo form_close();
?>
<br/>
<?php
//echo "Name ".$name;
?>

<script> 
    $(function() {
        //getter
        $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
    });
</script> 