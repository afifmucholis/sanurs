<h3>Sign Up</h3>
<p>Welcome to our online community! Signing up is the first step to start connecting, attending and making events, and  get better deals!</p>
<p>Please choose the last level of education achieved in St. Ursula</p>
<div id="divjenjang">
    <?php
    echo form_label('Select last level education : ', 'jenjang');
    $js = 'id="jenjang" onChange="showTahun();"';
    echo form_dropdown('jenjang', $unit_list, '-', $js);
    echo br(1);
    ?>
</div>
<div id="divtahun" style="display: none;">
    <?php
    $opsi = array(
        'id' => 'label_tahun',
    );
    echo form_label('Select graduation year : ', 'tahun', $opsi);
    $tahun = array(
        '-' => '-'
    );
    $js = 'id="tahun" onChange="showNama();"';
    echo form_dropdown('tahun', $tahun, '-', $js);
    ?>
</div>

<div id="name">
</div>
<div id="upload_popup" class ="popup">
    <div id="form_birthdate">
    </div>
</div>
<div id="backgroundPopup"></div>
<?php if (isset($alumni)) { ?>
<div id="error_message" style="display: none"><?php echo $replace;?></div>
<?php } ?>

<script type="text/javascript">
    /***** Page Awal Sign Up *****/
    function showTahun(val) {
        if (val==undefined)
            val = '-';
        if ($("#jenjang").val()!='-') {
            var link = '<?php echo site_url('sign_up/daftar_tahun');?>';
            var form_data = {
                jenjang:$("#jenjang").val(),
                ajax: '1'		
            };

            $.ajax({
                url: link,
                type: 'GET',
                data: form_data,
                success: function(msg) {
                    $('#divtahun').attr('style', 'display:inherit;');
                    $('#tahun').empty();
                    var str="";
                    for (var i=0;i<msg.size;i++) {
                        if (val==msg.tahun[i])
                            str +="<option value='"+msg.tahun[i]+"' selected>"+msg.tahun[i]+"</option>";
                        else
                            str +="<option value='"+msg.tahun[i]+"'>"+msg.tahun[i]+"</option>";
                    }
                    $('#tahun').append(str);
                    $('#name').html("");
                }
            });
        } else {
            $('#divtahun').attr('style', 'display:none');
            $('#name').html("");
        }
    }
    
    function showNama(val){
        if (val==undefined) {
            val = $("#tahun").val();
        }
        var link = '<?php echo site_url('sign_up/daftar_nama');?>';
        var form_data = {
            jenjang:$("#jenjang").val(),
            tahun:val,
            ajax: '1'		
        };
        
        $.ajax({
            url: link,
            type: 'GET',
            data: form_data,
            success: function(msg) {
                $("#name").html(msg);
                bind_name_click();
            }
        });
    }
    
    /*************************************************/
    
    
    /***** List Nama Muncul *****/
    var id_click="";
    function bind_name_click() {
        $('#list_alumni')
            .find('.people_links')
            .unbind('click.popup')
            .bind('click.popup', function(){
                var array = this.id.split('_');
                var id_people = array[1];
                var name_people = $('#id_'+id_people).html();
                name_click(id_people,name_people);
            });
    }
    
    function name_click(id, name, val) {
        var exc = true;
        if (val==undefined)
            exc = false;
        var id_people = id;
        var name_people = name;

        var link = '<?php echo site_url('sign_up/form_birthdate'); ?>';
        var form_data = {
            alum_id : id_people,
            name : name_people,
            ajax: '1'		
        };
        
        $.ajax({
            url: link,
            type: 'POST',
            data: form_data,
            success: function(msg) {
                $("#form_birthdate").html(msg.text);
                bindVerifyBithdate();
                id_click =  "#upload_popup";
                //centering with css
                centerPopup();
                //load popup
                loadPopup();
                if (exc)
                    bindErrorForm();
            }
        });
        return false;
    }
    
    /*************************************************/
    
    /***** Verify bithdate muncul *****/
    
    function bindVerifyBithdate() {
        $( "#datepicker" ).datepicker({changeMonth: true,changeYear: true,dateFormat: 'yy-mm-dd'});
        $("#datepicker").unbind('focus.show');
        $("#datepicker").bind('focus.show', function(){
            birthdateFocus();
        });
        $('#submit').unbind('click.it');
        $('#submit').bind('click.it', function(){
            return submit_birthdateClick();
        });
    }
    
    function birthdateFocus() {
        $( "#datepicker" ).removeAttr('class');
        $('.error').remove();
    }

    function submit_birthdateClick(){
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
                if (msg.success) {
                    $("#notify").html(msg.text);
                    bindSignUpForm();
                } else {
                    $('#datepicker').attr('class','error');
                    $('label[for=error]').remove();
                    $('#datepicker').after('<label for="error" class="error">'+msg.text+'</label>');
                }
            }
        });	
        return false;
    }
    
    function bindErrorForm() {
        <?php
            if (isset($alumni)) {
         ?>
            $("#notify").html($('#error_message').html());
            bindSignUpForm();
         <?php
            }
         ?>
    }
    
    /*************************************************/
    
    /***** Verify email password *****/
    function bindSignUpForm() {
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
    }
    /*************************************************/
    
    $(document).ready(function(){
        <?php
            if (isset($alumni)) {
                ?>
                 $('#jenjang').val('<?php echo $alumni['jenjang'];?>').attr('selected',true);
                 showTahun('<?php echo $alumni['tahun'];?>');
                 showNama('<?php echo $alumni['tahun'];?>');
                 name_click('<?php echo $alumni['id'];?>', '<?php echo $alumni['name'];?>', true);
                <?php
            }
        ?>
    });
    
</script>
