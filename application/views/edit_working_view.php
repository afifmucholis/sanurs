<div id="col_left" style="float: left">
    <h3>Work experience</h3>
    <?php 
        echo form_open('profile/submitWorking');
        echo form_hidden('counter',0); 
    ?>
    <div id="work_field">
    </div>
    <a href="#" id="add_links">Add field</a>   
    <a href="#" id="remove_links" style="display: none;">Remove field</a>
</div>
<div id="col_right" style="float: right">
    <h3>Current Work</h3>
    <?php
        $data = array(
            'counter' => 0
        );
        $this->load->view('work_form',$data);
    ?>
    <br/><br/>
    <?php
        $js = 'onClick="prev()"';
        echo form_button('previous','Previous',$js);
        echo form_submit('next','Next');
        echo form_close();
    ?>
</div>

<script type="text/javascript">
    function prev() {
       window.location.href = '<?php echo site_url('profile/editPendidikan');?>';
    }
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