<div style="width: inherit; background-color: #000000">
    <div class="subtitle" style="width: 200px; margin: auto; padding-left: 270px">EDUCATION</div>
    <?php echo form_open('profile/submitPendidikan'); ?>
    <div id="edu_now" style="float: right; padding: 5px 0px 30px 0px">
        <div id="question_1" class="general_text">
            <?php
            $options_1 = array('no' => 'No', 'yes' => 'Yes');
            $js = 'id="in_education"';
            ?>
            <table class="edu_table">
                <tr>
                    <td class="left-table"><?php echo form_label('Are you still in education?'); ?></td>
                    <td class="right-table"><?php echo form_dropdown('in_education', $options_1, $is_current_edu, $js); ?></td>
                </tr>
            </table>
            <div class="clearboth"></div>
        </div>
        <div id="current_edu" class="general_text" style="<?php if ($is_current_edu == 'no') { ?>display:none;<?php } else { ?>display:inherit;<?php } ?>">
            <div id="select_degree_current">                
                <?php
                $options2 = array(
                    '1' => 'High School',
                    '2' => 'Sekolah Kejuruan(D3)',
                    '3' => 'Bachelor Degree(S1)',
                    '4' => 'Masters Degree(S2)',
                    '5' => 'Doctorate Degree(S3)',
                );
                $js = 'id="current_edu_list"';
                ?>
                <table class="edu_table">
                    <tr>
                        <td class="left-table" style="width: auto"><?php echo form_label('Select your current education degree (Choose one) :'); ?></td>
                        <td class="right-table"><?php echo form_dropdown('current_edu_list', $options2, $current_education->level_id, $js); ?></td>
                    </tr>
                </table>
            </div>
            <div id="edu_current_form">
                <?php
                $data['degree'] = 'your current';
                $data['degree_id'] = 0;
                $data['edu'] = $current_education;
                $data['major_options'] = $major_options;
                $this->load->view('edit_profile/education_form', $data);
                ?>
            </div>
        </div>
    </div>
    <div class="clearboth"></div>
    <div id="history_edu" class="general_text">
        <div id="highest_edu">
            <?php
            $js = 'id="highest_edu"';
            ?>
            <table class="edu_table">
                <tr>
                    <td class="left-table" style="width: auto"><?php echo form_label('Highest degree of education: (Choose one)'); ?></td>
                    <td class="right-table"><?php echo form_dropdown('highest_edu', $options, $max_level, $js); ?></td>
                </tr>
            </table>
            <div class="clearboth"></div>
        </div>
        <div id="history_edu_form">
            <?php if (count($options) == 6) { ?>
                <div id="edu_sma_form" style="<?php if ($sma_edu->school == '') { ?>display:none;<?php } else { ?>display:inherit;<?php } ?>">
                    <?php
                    $data['degree'] = 'High School';
                    $data['degree_id'] = 1;
                    $data['edu'] = $sma_edu;
                    $data['major_options'] = $major_options;
                    $this->load->view('edit_profile/education_form', $data);
                    ?>
                </div>
            <?php } ?>
            <div id="edu_d3_form" style="<?php if ($d3_edu->school == '' && $s1_edu->school == '' && $s2_edu->school == '' && $s3_edu->school == '') { ?>display:none;<?php } else { ?>display:inherit;<?php } ?>">
                <?php
                $data['degree'] = 'Sekolah Kejuruan(D3) (<i>Optional</i>)';
                $data['degree_id'] = 2;
                $data['edu'] = $d3_edu;
                $data['major_options'] = $major_options;
                $this->load->view('edit_profile/education_form', $data);
                ?>
            </div>
            <div id="edu_s1_form" style="<?php if ($s1_edu->school == '') { ?>display:none;<?php } else { ?>display:inherit;<?php } ?>">
                <?php
                $data['degree'] = 'Bachelor Degree(S1)';
                $data['degree_id'] = 3;
                $data['edu'] = $s1_edu;
                $data['major_options'] = $major_options;
                $this->load->view('edit_profile/education_form', $data);
                ?>
            </div>
            <div id="edu_s2_form"  style="<?php if ($s2_edu->school == '') { ?>display:none;<?php } else { ?>display:inherit;<?php } ?>">
                <?php
                $data['degree'] = 'Masters Degree(S2)';
                $data['degree_id'] = 4;
                $data['edu'] = $s2_edu;
                $data['major_options'] = $major_options;
                $this->load->view('edit_profile/education_form', $data);
                ?>
            </div>
            <div id="edu_s3_form" style="<?php if ($s3_edu->school == '') { ?>display:none;<?php } else { ?>display:inherit;<?php } ?>">
                <?php
                $data['degree'] = 'Doctorate Degree(S3)';
                $data['degree_id'] = 5;
                $data['edu'] = $s3_edu;
                $data['major_options'] = $major_options;
                $this->load->view('edit_profile/education_form', $data);
                ?>
            </div>
        </div>
    </div>
    <div style="text-align: right; padding: 20px 20px 15px 0px">
        <?php echo form_submit('save', 'Save Changes'); ?>
    </div>
    <?php echo form_close(); ?>
</div>