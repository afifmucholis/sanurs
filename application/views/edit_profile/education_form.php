<?php
    echo form_hidden('edu_id_'.$degree_id, $edu->id);
    echo form_label('School/College attended for '.$degree.' degree: ');
    echo form_input('college_'.$degree_id, $edu->school, '');
    echo br(1);
    $options = array(
        '-' => '-',
        '1' => 'Computer & Information Sciences',
        '2' => 'Visual & Performing Arts',
        '3' => 'Mathematics',
        '4' => 'Chemical Engineering',
        '5' => 'Mechanical Engineering',
        '6' => 'Nuclear Engineering',
        '7' => 'Criminal Justice & Law Enforcement',
        '8' => 'Design, Photography',
        '9' => 'Electrical Engineering',
        '10' => 'Linguistics',
    );
    echo form_label('Major (s): ');
    echo form_dropdown('major_'.$degree_id, $options, '-');
    echo br(1);
    echo form_label('Minor (s): ');
    echo form_dropdown('minor_'.$degree_id, $options, '-');
    echo br(1);
    echo form_label('Graduation Year :');
    echo form_input('year_'.$degree_id, $edu->graduate_year, '');
?>
