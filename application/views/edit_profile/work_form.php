<?php
    $def_company="";
    $def_year="";
    $def_position="";
    $def_address="";
    $def_telephone="";
    $def_fax="";
    $def_work_hp="";
    $def_work_email="";
    $id = "";
    if ($status=='old') {
        $id = '_old_'.$counter;
        $def_company=$work->company;
        $def_year=$work->year;
        $def_position=$work->position;
        $def_address=$work->address;
        $def_telephone=$work->telephone;
        $def_fax=$work->fax;
        $def_work_hp=$work->work_hp;
        $def_work_email=$work->work_email;
    } else {
        $id = '_new_'.$counter;
    }
?>

<div id="div_work_form">
    <?php 
        if ($status=='old') {
            echo form_hidden('id'.$id,$work->id);
        } else {
            if ($counter!=0)
                echo form_hidden('id'.$id,$counter);
            else
                echo form_hidden('id'.$id,$counter-1);
        }
    ?>
    <br/>
    <table>
        <tr>
            <td class="left-table-black"> <?php echo form_label('Company/ Association'); ?> </td>
            <td class="right-table"> <?php echo form_input('company'.$id, $def_company, 'id="company"');?> </td>
        </tr>
        <tr>
            <td class="left-table-black"> <?php echo form_label('Year'); ?> </td>
            <td class="right-table"> <?php echo form_input('year'.$id, $def_year, 'id="year"');?> </td>
        </tr>
        <tr>
            <td class="left-table-black"> <?php echo form_label('Position'); ?> </td>
            <td class="right-table"> <?php echo form_input('position'.$id, $def_position, 'id="position"');?> </td>
        </tr>
        <tr>
            <td class="left-table-black"> <?php echo form_label('Address'); ?> </td>
            <td class="right-table"> <?php echo form_input('address'.$id, $def_address, 'id="address"');?> </td>
        </tr>
        <tr>
            <td class="left-table-black"> <?php echo form_label('Telephone'); ?> </td>
            <td class="right-table"> <?php echo form_input('telephone'.$id, $def_telephone, 'id="telephone"');?> </td>
        </tr>
        <tr>
            <td class="left-table-black"> <?php echo form_label('Fax'); ?> </td>
            <td class="right-table"> <?php echo form_input('fax'.$id, $def_fax, 'id="fax"');?> </td>
        </tr>
        <tr>
            <td class="left-table-black"> <?php echo form_label('Work HP'); ?> </td>
            <td class="right-table"> <?php echo form_input('work_hp'.$id, $def_work_hp, 'id="work_hp"');?> </td>
        </tr>
        <tr>
            <td class="left-table-black"> <?php echo form_label('Work Email'); ?> </td>
            <td class="right-table"> <?php echo form_input('work_email'.$id, $def_work_email, 'id="work_email"');?> </td>
        </tr>
    </table>
    <?php if ($counter!=0) { ?>
    <a href="#" class="remove_links">Remove field</a>
    <?php } else { ?>
    <a href="#" class="resetfield_links">Reset field</a>
    <?php } ?>
</div>