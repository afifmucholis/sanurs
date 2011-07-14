<p>Highest degree of education: (Choose one)</p>
<?php
    $edu_sma_school = "";
    $edu_sma_grad = "";
    $edu_d3_college = "";
    $edu_d3_major = "";
    $edu_d3_minor = "";
    $edu_d3_grad = "";
    $edu_s1_college = "";
    $edu_s1_major = "";
    $edu_s1_minor = "";
    $edu_s1_grad = "";
    $edu_s2_college = "";
    $edu_s2_major = "";
    $edu_s2_minor = "";
    $edu_s2_grad = "";
    $edu_s3_college = "";
    $edu_s3_major = "";
    $edu_s3_minor = "";
    $edu_s3_grad = "";
    if (count($education)!=0) {
        foreach($education as $edu) :
            if ($edu->level_id==1) {
                $edu_sma_school = $edu->school;
                $edu_sma_grad = $edu->graduate_year;
            } else if ($edu->level_id==2) {
                $edu_d3_college = $edu->school;
                $edu_d3_major = $edu->major;
                $edu_d3_minor = $edu->minor;
                $edu_d3_grad = $edu->graduate_year;
            } else if ($edu->level_id==3) {
                $edu_s1_college = $edu->school;
                $edu_s1_major = $edu->major;
                $edu_s1_minor = $edu->minor;
                $edu_s1_grad = $edu->graduate_year;
            } else if ($edu->level_id==4) {
                $edu_s2_college = $edu->school;
                $edu_s2_major = $edu->major;
                $edu_s2_minor = $edu->minor;
                $edu_s2_grad = $edu->graduate_year;
            } else if ($edu->level_id==5) {
                $edu_s3_college = $edu->school;
                $edu_s3_major = $edu->major;
                $edu_s3_minor = $edu->minor;
                $edu_s3_grad = $edu->graduate_year;
            } 
        endforeach;
    }


    $options = array (
        '1' => 'High School',
        '2' => 'Sekolah Kejuruan(D3)',
        '3' => 'Bachelor Degree(S1)',
        '4' => 'Masters Degree(S2)',
        '5' => 'Doctorate Degree(S3)',
    );
    echo form_open('profile/submitPendidikan');
    $js = 'id="highest_edu"';
    echo form_dropdown('highest_edu',$options,$max_level,$js);
    echo br(2);
    ?>
    <div id="edu_form">
        <div id="edu_sma">
            <?php
                echo form_label('High School : ');
                echo form_input('sma',$edu_sma_school,'');
                echo br(1);
                echo form_label('Graduation Year :');
                echo form_input('sma_year',$edu_sma_grad,'');
            ?>
            <br/>
        </div>
        <br/>
        <div id="edu_d3" style="<?php if($max_level!=2) { ?>display: none <?php } else { ?>display: inherit <?php }?>">
            <?php
                echo form_label('College/ University attended for D3 degree: ');
                echo form_input('d3',$edu_d3_college,'');
                echo br(1);
                echo form_label('Major (s): ');
                echo form_input('d3_major',$edu_d3_major,'');
                echo br(1);
                echo form_label('Minor (s): ');
                echo form_input('d3_minor',$edu_d3_minor,'');
                echo br(1);
                echo form_label('Graduation Year :');
                echo form_input('d3_year',$edu_d3_grad,'');
            ?>
        </div>
        <br/><br/>
        <div id="edu_s1" style="<?php if($max_level<3) { ?>display: none <?php } else { ?>display: inherit <?php }?>">
            <?php
                echo form_label('College/ University attended for Bachelor(S1) degree: ');
                echo form_input('s1',$edu_s1_college,'');
                echo br(1);
                echo form_label('Major (s): ');
                echo form_input('s1_major',$edu_s1_major,'');
                echo br(1);
                echo form_label('Minor (s): ');
                echo form_input('s1_minor',$edu_s1_minor,'');
                echo br(1);
                echo form_label('Graduation Year :');
                echo form_input('s1_year',$edu_s1_grad,'');
            ?>
        </div>
        <br/><br/>
        <div id="edu_s2" style="<?php if($max_level<4) { ?>display: none <?php } else { ?>display: inherit <?php }?>">
            <?php
                echo form_label('College/ University attended for Masters(S2) degree: ');
                echo form_input('s2',$edu_s2_college,'');
                echo br(1);
                echo form_label('Major (s): ');
                echo form_input('s2_major',$edu_s2_major,'');
                echo br(1);
                echo form_label('Minor (s): ');
                echo form_input('s2_minor',$edu_s2_minor,'');
                echo br(1);
                echo form_label('Graduation Year :');
                echo form_input('s2_year',$edu_s2_grad,'');
            ?>
        </div>
        <br/><br/>
        <div id="edu_s3" style="<?php if($max_level<5) { ?>display: none <?php } else { ?>display: inherit <?php }?>">
            <?php
                echo form_label('College/ University attended for Doctorate(S3) degree: ');
                echo form_input('s3',$edu_s3_college,'');
                echo br(1);
                echo form_label('Major (s): ');
                echo form_input('s3_major',$edu_s3_major,'');
                echo br(1);
                echo form_label('Minor (s): ');
                echo form_input('s3_minor',$edu_s3_minor,'');
                echo br(1);
                echo form_label('Graduation Year :');
                echo form_input('s3_year',$edu_s3_grad,'');
            ?>
        </div>
        <br/><br/>
    </div>
<?php
    echo form_submit('save','Save Changes');
    echo form_close();
?>