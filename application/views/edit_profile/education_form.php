<?php echo form_hidden('edu_id_'.$degree_id, $edu->id); ?>
<table class="edu_table">
    <tr>
        <td class="left-table" style="width: auto"><?php echo form_label('School/College attended for '.$degree.' degree: '); ?></td>
        <td class="right-table"><?php echo form_input('college_'.$degree_id, $edu->school, ''); ?></td>
    </tr>
    <tr>
        <td class="left-table" style="width: auto"><?php echo form_label('Major (s): '); ?></td>
        <td class="right-table"><?php echo form_dropdown('major_'.$degree_id, $major_options, $edu->major_id); ?></td>
    </tr>
    <tr>
        <td class="left-table" style="width: auto"><?php echo form_label('Minor (s): '); ?></td>
        <td class="right-table"><?php echo form_dropdown('minor_'.$degree_id, $major_options, $edu->minor_id); ?></td>
    </tr>
    <tr>
        <td class="left-table" style="width: auto"><?php echo form_label('Graduation Year :'); ?></td>
        <td class="right-table"><?php echo form_input('year_'.$degree_id, $edu->graduate_year, ''); ?></td>
    </tr>
</table>
<div class="clearboth"></div>
