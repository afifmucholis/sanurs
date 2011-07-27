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
        echo anchor('sign_in/forget','Forget Password','class="forget_links"');
    ?>
</div>

<div id="upload_popup" class ="popup">
    <div id="form_forget_password">
        <?php $this->load->view('popup/forget_password_view');?>
    </div>
</div>
<div id="backgroundPopup"></div>

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
            email : "Please enter a valid email"
             
        }
        });
        bind_forget_click();
    });
    
    var id_click="";
    function bind_forget_click() {
        $( "#birthdate" ).datepicker({changeMonth: true,changeYear: true,dateFormat: 'yy-mm-dd'});
        $('#signin_form')
            .find('.forget_links')
            .unbind('click.popup')
            .bind('click.popup', function(){
                return forget_click();
            });
        $('#form_forget').validate({
            rules : {
                email : {
                    required : true,
                    email : true
                },
                birthdate : {
                    required : true
                }
            },
            messages : {
                email : "Please enter a valid email address",
                birthdate : {
                    required : "Please fill birthdate field"
                }
            }
        });
    }
    
    function forget_click() {
        id_click =  "#upload_popup";
        //centering with css
        centerPopup();
        //load popup
        loadPopup();
        return false;
    }
</script>


