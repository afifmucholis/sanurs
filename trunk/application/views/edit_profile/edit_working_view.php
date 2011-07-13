<div class="work-menu">
    <h3>Work experience</h3>
    <?php 
        echo form_open('profile/submitWorking');
        echo form_hidden('counter',0); 
    ?>
    <div id="work_field">
        <?php
            
        ?>
    </div>
   <a href="#" class="add_links">Add field</a>   
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
