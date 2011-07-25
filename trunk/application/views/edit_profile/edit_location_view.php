<h3>Search Your Location</h3>
<?php
echo form_open('profile/submitLocation');
?>
<p>Input your current location : </p>
<?php
echo form_input('location', '', 'id="location"');
$js_search = 'onClick="geocodeLocation()"';
echo form_button('searchlocation', 'Submit', $js_search);
?>
<?php echo br(2); ?>
<div id="map">
    Map disini
</div>
<?php
echo form_submit('save', 'Save Changes');
echo form_hidden('save_lat', 0);
echo form_hidden('save_lng', 0);
echo form_input('area_name', '');
echo form_input('area_lat', 0);
echo form_input('area_lng', 0);
echo form_close();
?>