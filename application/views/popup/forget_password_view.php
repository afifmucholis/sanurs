<div id="notify">
    <div class="popup_title">
        Forget Password
    </div>
    <?php echo form_open('sign_in/forget', 'id="form_forget"');?>
    <div class="popup_main_content">
        Please enter your email and your birthdate,<br/><br/>
        <table>
            <tr>
                <td><?php echo form_label('Your Email ');?></td>
                <td><?php echo form_input('email','','id="email"');?></td>
            </tr>
            <tr>
                <td><?php echo form_label('Your Birthdate<br/>(YYYY-MM-DD) ');?></td>
                <td><?php echo form_input('birthdate','','id="birthdate"');?></td>
            </tr>
        </table>
    </div>
    <div class="popup_footer">
        <?php
        echo form_submit('submit', 'Submit', 'id="submit"');
        $js = 'onClick="disablePopup()"';
        echo form_button('cancel', 'Cancel', $js);
        echo form_close();
        ?>
    </div>
</div>