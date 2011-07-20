<?php
    echo form_hidden('edu_id_'.$degree_id, $edu->id);
    echo form_label('School/College attended for '.$degree.' degree: ');
    echo form_input('college_'.$degree_id, $edu->school, '');
    echo br(1);
    echo form_label('Major (s): ');
    echo form_dropdown('major_'.$degree_id, $major_options, $edu->major_id);
    echo br(1);
    echo form_label('Minor (s): ');
    echo form_dropdown('minor_'.$degree_id, $major_options, $edu->minor_id);
    echo br(1);
    echo form_label('Graduation Year :');
    echo form_input('year_'.$degree_id, $edu->graduate_year, '');
?>
