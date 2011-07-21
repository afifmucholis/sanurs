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
    Company/ Association : <?php echo form_input('company'.$id, $def_company, 'id="company"');?>
    <br/>
    Year : <?php echo form_input('year'.$id, $def_year, 'id="year"');?>
    <br/>
    Position : <?php echo form_input('position'.$id, $def_position, 'id="position"');?>
    <br/>
    Address : <?php echo form_input('address'.$id, $def_address, 'id="address"');?>
    <br/>
    Telephone : <?php echo form_input('telephone'.$id, $def_telephone, 'id="telephone"');?>
    <br/>
    Fax  : <?php echo form_input('fax'.$id, $def_fax, 'id="fax"');?>
    <br/>
    Work HP : <?php echo form_input('work_hp'.$id, $def_work_hp, 'id="work_hp"');?>
    <br/>
    Work Email : <?php echo form_input('work_email'.$id, $def_work_email, 'id="work_email"');?>
    <br/>
    <?php if ($counter!=0) { ?>
    <a href="#" class="remove_links">Remove field</a>
    <?php } else { ?>
    <a href="#" class="resetfield_links">Reset field</a>
    <?php } ?>
</div>