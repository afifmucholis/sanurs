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
echo form_submit('save', 'Save Changes');
echo form_hidden('save_lat', 0);
echo form_hidden('save_lng', 0);
echo form_close();
?>

<script type="text/javascript">
    // pengecekan form yang diubah
    $("input[type='text']").change(function(){
        _isDirty = true;
    });
    $("input[type='password']").change(function(){
      _isDirty = true;
    });
    $("input[type='textarea']").change(function(){
      _isDirty = true;
    });
    $("input[type='hidden']").change(function(){
      _isDirty = true;
    });
    $("input[type='checkbox']").change(function(){
      _isDirty = true;
    });
    $("input[type='radio']").change(function(){
      _isDirty = true;
    });
    $("input[type='select-one']").change(function(){
      _isDirty = true;
    });
    $("input[type='select-multiple']").change(function(){
      _isDirty = true;
    });
</script>