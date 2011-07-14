<h3>Search Your Location</h3>
<?php
echo form_open('profile/submitLocation');
echo form_input('location', '', 'id="location"');
$js_search = 'onClick="tesGeocode()"';
echo form_button('searchlocation', 'Search', $js_search);
?>
<p>Or select your location on the map</p>
<?php echo br(4); ?>
<div id="map">
    Map disini
</div>
<?php
echo form_submit('save', 'Save Changes');
echo form_hidden('save_lat', 0);
echo form_hidden('save_lng', 0);
echo form_close();
?>