<p>Highest degree of education: (Choose one)</p>
<?php
    $options = array (
        'sma' => 'High School',
        'd3' => 'Sekolah Kejuruan(D3)',
        's1' => 'Bachelor Degree(S1)',
        's2' => 'Masters Degree(S2)',
        's3' => 'Doctorate Degree(S3)',
    );
    echo form_open('profile/submitPendidikan');
    $js = 'id="highest_edu"';
    echo form_dropdown('highest_edu',$options,'sma',$js);
    echo br(2);
    ?>
    <div id="edu_form">
        <div id="edu_sma">
            <?php
                echo form_label('High School : ');
                echo form_input('sma','','');
                echo br(1);
                echo form_label('Graduation Year :');
                echo form_input('sma_year','','');
            ?>
            <br/>
        </div>
        <br/>
        <div id="edu_d3" style="display: none">
            <?php
                echo form_label('College/ University attended for D3 degree: ');
                echo form_input('d3','','');
                echo br(1);
                echo form_label('Major (s): ');
                echo form_input('d3_major','','');
                echo br(1);
                echo form_label('Minor (s): ');
                echo form_input('d3_minor','','');
                echo br(1);
                echo form_label('Graduation Year :');
                echo form_input('d3_year','','');
            ?>
        </div>
        <br/><br/>
        <div id="edu_s1" style="display: none">
            <?php
                echo form_label('College/ University attended for Bachelor(S1) degree: ');
                echo form_input('s1','','');
                echo br(1);
                echo form_label('Major (s): ');
                echo form_input('s1_major','','');
                echo br(1);
                echo form_label('Minor (s): ');
                echo form_input('s1_minor','','');
                echo br(1);
                echo form_label('Graduation Year :');
                echo form_input('s1_year','','');
            ?>
        </div>
        <br/><br/>
        <div id="edu_s2" style="display: none">
            <?php
                echo form_label('College/ University attended for Masters(S2) degree: ');
                echo form_input('s2','','');
                echo br(1);
                echo form_label('Major (s): ');
                echo form_input('s2_major','','');
                echo br(1);
                echo form_label('Minor (s): ');
                echo form_input('s2_minor','','');
                echo br(1);
                echo form_label('Graduation Year :');
                echo form_input('s2_year','','');
            ?>
        </div>
        <br/><br/>
        <div id="edu_s3" style="display: none">
            <?php
                echo form_label('College/ University attended for Doctorate(S3) degree: ');
                echo form_input('s3','','');
                echo br(1);
                echo form_label('Major (s): ');
                echo form_input('s3_major','','');
                echo br(1);
                echo form_label('Minor (s): ');
                echo form_input('s3_minor','','');
                echo br(1);
                echo form_label('Graduation Year :');
                echo form_input('s3_year','','');
            ?>
        </div>
        <br/><br/>
    </div>
<?php
    echo form_submit('save','Save Changes');
    echo form_close();
?>