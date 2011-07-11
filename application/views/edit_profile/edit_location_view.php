<h3>Search Your Location</h3>
<?php
echo form_open('profile/submitLocation');
echo form_input('location', '', 'id="location"');
echo form_button('searchlocation', 'Search');
?>
<p>Or select your location on the map</p>
<?php echo br(4); ?>
<div id="map">
    Map disini
</div>
<?php
$js = 'onClick="prev()"';
echo form_button('previous', 'Previous', $js);
echo form_submit('next', 'Next');
echo form_close();
?>

<script type="text/javascript">
    function prev() {
        window.location.href = '<?php echo site_url('profile/editProfile'); ?>';
    }
    
</script>