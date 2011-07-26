<div class="popup_title">
    Verification
</div>
<?php
echo validation_errors();
echo form_open('sign_up/verify', array('id' => 'signupform'));
?>

<div class="popup_main_content">        
    <?php
    if (!isset($falseref) || (isset($falseref) && $falseref)) {
        ?> 
        Welcome <?php
    echo $alumni['name'] . '!';
    echo br(1);
        ?> s
        You have to fill form below to verify your registration as alumni. Please enter your e-mail and password that you want to use to sign in next time:

        <table>
            <tr>
                <td> <?php echo form_label('Email', 'email') . "   "; ?></td>
                <td> <?php echo form_input('email', '', 'id="email"') . "<br/>"; ?></td>
            </tr>
            <tr>
                <td> <?php echo form_label('Password', 'password') . "  "; ?></td>
                <td> <?php echo form_password('password', '', 'id="password"') . "<br/>"; ?></td>
                </td>
            <tr>
                <td> <?php echo form_label('Retype Password', 'repassword') . "  "; ?></td>
                <td> <?php echo form_password('repassword', '', 'id="repassword"') . "<br/>"; ?></td>
            <tr>
        </table>

        <?php
        $hidden = array(
            'id' => $alumni['id'],
            'name' => $alumni['name']
        );
        echo form_hidden($hidden);
        ?>
    </div>

    <div class="popup_footer">
        <?php
        echo form_submit('submit', 'Submit', 'id="submit"');
        $js = 'onClick="disablePopup()"';
        echo form_button('cancel', 'Cancel', $js);
        echo form_close();
        ?>
    </div>
    <?php
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
                    equalTo : "#password"
                }  
                
                
            },
            messages : {
                email : "Please enter a valid email address",
                password : {
                    required : "Please fill this password field",
                    minlength : "Your password at least 6 character"
                },
                repassword : "This field need to be match with password"
            }
        });  
    });
</script>