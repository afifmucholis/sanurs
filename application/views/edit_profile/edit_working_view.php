<div id="editwork_bg">
    <?php
    echo form_open('profile/submitWorking', 'id="form_work"');
    echo form_hidden('counter', count($working_experience));
    ?>
    <div id="work-container">
        <div class="work-menu" style="width: 410px">
            <div class="curwork_container">
                <div class="subtitle" style="color: #000000">WORK EXPERIENCE</div>
                <div class="work-subtitle">(CURRENT WORK)</div>
                <div id="work_cur" class="work_cur">
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
        </div>
        <div class="work-menu" style="width: 410px">
            <div class="subtitle" style="color: #000000">WORK EXPERIENCE</div>
            <div class="work-subtitle" style="color: rgb(255,255,255)">(OTHER WORK EXPERIENCE)</div>
        </div>
        <div class="work-menu" style="width: 410px">
            <div id="work_field" style="float: left">
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
            <a href="#" class="add_links" style="font-family: Arial Black; font-size: 12px; color: rgb(255,255,255); padding: 10px 0px 5px 30px">ADD FIELD</a>
        </div>
    </div>
    <div class="clearboth"></div>
    <div style="text-align: right; padding: 0px 20px 15px 0px">
        <?php echo form_submit('save', 'Save Changes'); ?>
    </div>
    <div class="clearboth"></div>
    <?php echo form_close(); ?>
</div>