<h3>Sign In</h3>
<div id="signin_form">
    <?php
        echo form_open('sign_in/submit', array('id' => 'signin'));
        echo form_label('Enter your email address : ','email')."<br/>";
        echo form_input('email', '', 'id="email"')."<br/>";
        echo form_label('Password : ','password')."<br/>";
        echo form_password('password', '', 'id="password"')."<br/>";
        echo form_submit('submit', 'Submit', 'id="submit"');
        echo form_close();
    ?>
</div>

<script>
    $(document).ready(function() {   
        $("#signin").validate({
            rules : {
                email : {
                    required : true,
                    email : true
                }
        },
        messages : {
            email : "Please enter a valid email address"
             
        }
    });  
});
</script>


