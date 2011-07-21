<?php
echo form_open('profile/submitPendidikan');
?>
<div id="edu_now">
    <div id="question_1">
        Are you still in education? 
        <?php
        $options_1 = array('no' => 'No', 'yes' => 'Yes');
        $js = 'id="in_education"';
        echo form_dropdown('in_education', $options_1, $is_current_edu, $js);
        echo br(1);
        ?>
    </div>
    <br/>
    <div id="current_edu" style="<?php if ($is_current_edu=='no') { ?>display:none;<?php } else { ?>display:inherit;<?php } ?>">
        <div id="select_degree_current">
            Select your current education degree (Choose one) : 
            <?php
            $options2 = array(
                '1' => 'High School',
                '2' => 'Sekolah Kejuruan(D3)',
                '3' => 'Bachelor Degree(S1)',
                '4' => 'Masters Degree(S2)',
                '5' => 'Doctorate Degree(S3)',
            );
            $js = 'id="current_edu_list"';
            echo form_dropdown('current_edu_list', $options2, $current_education->level_id, $js);
            echo br(1);
            ?>        
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
<br/>
<div id="history_edu">
    <div id="highest_edu">
        Highest degree of education: (Choose one)
        <?php
        $js = 'id="highest_edu"';
        echo form_dropdown('highest_edu', $options, $max_level, $js);
        echo br(1);
        ?>
    </div>
    <div id="history_edu_form">
        <?php if (count($options) == 6) { ?>
            <div id="edu_sma_form" style="<?php if ($sma_edu->school=='') { ?>display:none;<?php } else { ?>display:inherit;<?php } ?>">
                <?php
                $data['degree'] = 'High School';
                $data['degree_id'] = 1;
                $data['edu'] = $sma_edu;
                $data['major_options'] = $major_options;
                $this->load->view('edit_profile/education_form', $data);
                ?>
            </div>
        <?php } ?>
        <div id="edu_d3_form" style="<?php if ($d3_edu->school=='' && $s1_edu->school=='' && $s2_edu->school=='' && $s3_edu->school=='') { ?>display:none;<?php } else { ?>display:inherit;<?php } ?>">
            <?php
            $data['degree'] = 'Sekolah Kejuruan(D3) (<i>Optional</i>)';
            $data['degree_id'] = 2;
            $data['edu'] = $d3_edu;
            $data['major_options'] = $major_options;
            $this->load->view('edit_profile/education_form', $data);
            ?>
        </div>
        <div id="edu_s1_form" style="<?php if ($s1_edu->school=='') { ?>display:none;<?php } else { ?>display:inherit;<?php } ?>">
            <?php
            $data['degree'] = 'Bachelor Degree(S1)';
            $data['degree_id'] = 3;
            $data['edu'] = $s1_edu;
            $data['major_options'] = $major_options;
            $this->load->view('edit_profile/education_form', $data);
            ?>
        </div>
        <div id="edu_s2_form"  style="<?php if ($s2_edu->school=='') { ?>display:none;<?php } else { ?>display:inherit;<?php } ?>">
            <?php
            $data['degree'] = 'Masters Degree(S2)';
            $data['degree_id'] = 4;
            $data['edu'] = $s2_edu;
            $data['major_options'] = $major_options;
            $this->load->view('edit_profile/education_form', $data);
            ?>
        </div>
        <div id="edu_s3_form" style="<?php if ($s3_edu->school=='') { ?>display:none;<?php } else { ?>display:inherit;<?php } ?>">
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
<br/>

<?php
echo form_submit('save','Save Changes');
echo form_close();
?>
