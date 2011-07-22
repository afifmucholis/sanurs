<?php 
    echo form_open('profile/submitWorking','id="form_work"');
    echo form_hidden('counter',count($working_experience)); 
?>
<div class="work-menu">
    <h3>Work experience</h3>
    <div id="work_field">
        <?php
            $count = 1;
            foreach($working_experience as $work) :
                $data = array();
                $data['counter'] = $count;
                $data['status'] = 'old';
                $data['work'] = $work;
                $count++;
                $this->load->view('edit_profile/work_form',$data);
                echo br(1);
            endforeach;
        ?>
    </div>
   <a href="#" class="add_links">Add field</a>   
</div>

<div class="work-menu">
    <h3>Current Work</h3>
    <div id="work_cur">
    <?php
        $data = array(
            'counter' => 0
        );
        if (count($working_current)==0) {
            $data['status'] = 'new';
        } else {
            $data['status'] = 'old';
            $data['work'] = $working_current;
        }
        $this->load->view('edit_profile/work_form',$data);
    ?>
    </div>
    <?php
    echo br(2);
    echo form_submit('save','Save Changes');
    ?>
</div>

<div class="clearboth">
</div>
<?php
    echo form_close();
?>
