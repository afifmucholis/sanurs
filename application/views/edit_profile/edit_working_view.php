<?php
echo form_open('profile/submitWorking', 'id="form_work"');
echo form_hidden('counter', count($working_experience));
?>
<div class="work-menu" style="width: 410px">
    <h3>Current Work</h3>
    <div id="work_cur" style="width: 382px">
        <?php
        $data = array(
            'counter' => 0
        );
        if (count($working_current) == 0) {
            $data['status'] = 'new';
        } else {
            $data['status'] = 'old';
            $data['work'] = $working_current;
        }
        $this->load->view('edit_profile/work_form', $data);
        ?>
    </div>
</div>
<!--<div class="edit_profile_left">
    <div class="left-up">
        <div class="subtitle" style="color: #000000">WORK EXPERIENCE</div>
        <div style="padding: 30px 0px 0px 20px">(CURRENT WORK)</div>
        <div id="work_cur">
            <?php
//            $data = array(
//                'counter' => 0
//            );
//            if (count($working_current) == 0) {
//                $data['status'] = 'new';
//            } else {
//                $data['status'] = 'old';
//                $data['work'] = $working_current;
//            }
//            $this->load->view('edit_profile/work_form', $data);
            ?>
        </div>
    </div>
    <div class="left-down"></div>
</div>-->
<!--<div class="edit_profile_right">
    <div class="subtitle" style="color: #000000">WORK EXPERIENCE</div>
    <div style="padding: 30px 0px 0px 20px">
        <div style="color: rgb(255,255,255)">(OTHER WORK EXPERIENCE)</div>
    </div>
    <div id="work_field">
    <?php
//    $count = 1;
//    foreach ($working_experience as $work) :
//        $data = array();
//        $data['counter'] = $count;
//        $data['status'] = 'old';
//        $data['work'] = $work;
//        $count++;
//        $this->load->view('edit_profile/work_form', $data);
//        echo br(1);
//    endforeach;
    ?>
        </div>
    <a href="#" class="add_links" style="color: rgb(255,255,255)">Add field</a>
</div>-->
<div class="work-menu" style="width: 410px">
    <h3>Work experience</h3>
    <div id="work_field">
<?php
    $count = 1;
    foreach ($working_experience as $work) :
        $data = array();
        $data['counter'] = $count;
        $data['status'] = 'old';
        $data['work'] = $work;
        $count++;
        $this->load->view('edit_profile/work_form', $data);
        echo br(1);
    endforeach;
    ?>
    </div>
      <a href="#" class="add_links">Add field</a>
      <?php
    echo br(2);
    echo form_submit('save','Save Changes');
?>
</div>



<div class="clearboth"></div>
<?php echo form_close(); ?>
