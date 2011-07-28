<div id="title-menu">
    Search Your Location
</div>
<?php
echo form_open('profile/submitLocation');
?>
<p>Input your current city : </p>
<div class="general_text">
    <?php
    echo form_input('location', '', 'id="location"');
    $js_search = 'onClick="geocodeLocation()"';
    echo form_button('searchlocation', 'Search', $js_search);
    ?>
</div>
<?php echo br(1); ?>
<div id="map">
    Map disini
</div>
<?php echo br(1); ?>
<div class="general_text">
<?php
echo form_submit('save', 'Save Changes');
echo form_hidden('save_lat', 0);
echo form_hidden('save_lng', 0);
echo form_hidden('area_name', '');
echo form_hidden('area_lat', 0);
echo form_hidden('area_lng', 0);
echo form_close();
?>
</div>