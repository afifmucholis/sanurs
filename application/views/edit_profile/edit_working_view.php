<div class="work-menu">
    <h3>Work experience</h3>
    <?php 
        echo form_open('profile/submitWorking');
        echo form_hidden('counter',count($working_experience)+count($working_current)); 
    ?>
    <div id="work_field">
        <?php
            
        ?>
    </div>
    <a href="#" id="add_links">Add field</a>   
    <a href="#" id="remove_links" style="display: none;">Remove field</a>
</div>

<div class="work-menu">
    <h3>Current Work</h3>
    <?php
        $data = array(
            'counter' => 0
        );
        $this->load->view('edit_profile/work_form',$data);
    ?>
    <br/><br/>
    <?php
        echo form_submit('save','Save Changes');
        echo form_close();
    ?>
</div>

<div id="clearboth">
</div>

<script type="text/javascript">
    // pengecekan form yang diubah
    $("input[type='text']").change(function(){
        _isDirty = true;
    });
    $("input[type='password']").change(function(){
      _isDirty = true;
    });
    $("input[type='textarea']").change(function(){
      _isDirty = true;
    });
    $("input[type='hidden']").change(function(){
      _isDirty = true;
    });
    $("input[type='checkbox']").change(function(){
      _isDirty = true;
    });
    $("input[type='radio']").change(function(){
      _isDirty = true;
    });
    $("input[type='select-one']").change(function(){
      _isDirty = true;
    });
    $("input[type='select-multiple']").change(function(){
      _isDirty = true;
    });
    $("input[type='submit']").click(function(){
      _isDirty = false;
    });
    $(document).ready(function() {
        $("#add_links").click(function() {
            var link = '<?php echo site_url('profile/add_working_field');?>';
            var form_data = {
                    counter:$('input[name=counter]').val(),
                    ajax: '1'		
            };

            $.ajax({
                    url: link,
                    type: 'POST',
                    data: form_data,
                    success: function(msg) {
                       var isi = $('#work_field').html();
                       $('#work_field').html(isi+msg['text']);
                       $('input[name=counter]').val(msg['counter']);
                       $('#remove_links').attr('style','display:inherit');
                    }
            });	
        
	return false;
        });
        $("#remove_links").click(function() {
            var div_counter = $('input[name=counter]').val();
            $('#work_form_'+div_counter).remove();
            $('input[name=counter]').val(div_counter-1);
            if (div_counter-1==0) {
                $('#remove_links').attr('style','display:none');
            }
            return false;
        });
    });
</script>