<div id="notify">    
    <div class="popup_title">
        Sign Up
    </div>

    <div class="popup_main_content">
        Welcome to our online community! Signing up is the first step to start connecting, attending and making events, and get better deals!
        <?php
        //echo "Welcome ".$alumni_id;
        echo br(2);
        echo "Hi, " . $name;
        echo br(1);
        echo "Please enter your birthdate to verify (YYYY-MM-DD) :";
        echo form_open('sign_up/verify_birthdate');
        echo form_input('birthdate', '', 'id="datepicker"') . "<br/>";
        echo form_hidden('id', $alumni_id);
        echo form_hidden('name', $name);
        ?>
        <br/>
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
<script> 
    $(function() {
        //getter
        $( "#datepicker" ).datepicker({changeMonth: true,changeYear: true,dateFormat: 'yy-mm-dd'});
    });
    
    $('#submit').click(function(){
        var link = '<?php echo site_url('sign_up/verify_birthdate'); ?>';
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
                if (msg.success)
                    $("#notify").html(msg.text);
                else
                    alert('Lupa tanggal lahir ya?fuuu');
            }
        });	
        return false;
    });
    
</script> 