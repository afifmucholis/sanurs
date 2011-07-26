<?php
if (!isset($falseref) || (isset($falseref) && $falseref)) {
    ?> 
    Welcome <?php echo $alumni['name'];
    ?>! 
    You have to fill form below to verify your registration as alumni. Please enter your e-mail and password that you want to use to sign in next time:
    <?php
    echo validation_errors();
    echo form_open('sign_up/verify', array('id' => 'signupform'));
    echo form_label('Email : ', 'email') . "   ";
    echo form_input('email', '', 'id="email"') . "<br/>";
    echo form_label('Password : ', 'password') . "  ";
    echo form_password('password', '', 'id="password"') . "<br/>";
    echo form_label('Retype Password : ', 'repassword') . "  ";
    echo form_password('repassword', '', 'id="repassword"') . "<br/>";

    $hidden = array(
        'id' => $alumni['id'],
        'name' => $alumni['name']
    );
    echo form_hidden($hidden);

    echo form_submit('submit', 'Submit', 'id="submit"');
    echo form_close();
}
?>

<script>
    $(document).ready(function() {   
        $("#signupform").validate({
            rules : {
                email : {
                    required : true,
                    email : true
                },
                password : {
                    required : true,
                    minlength : 6
                },
                repassword : {
                    equalTo : password
                }  
                
                
            },
            messages : {
                email : "Please enter a valid email",
                password : {
                    required : "Please fill the password",
                    minlength : "Your password at least 6 character"
                },
                repassword : "This field need to be match with password"
            }
        });  
    });
</script>