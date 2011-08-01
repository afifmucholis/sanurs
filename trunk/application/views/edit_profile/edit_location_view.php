<div class="subtitle" style="color: #000000">Search Your Location</div>
<div style="padding: 10px 0px 0px 30px">
    <p>Input your current city : </p>
</div>

<?php echo form_open('profile/submitLocation'); ?>
<div class="general_text">
    <div class="edit_profile_form">
        <?php
        echo form_input('location', '', 'id="location"');
        ?>
    </div>
    <div class="edit_profile_form" style="padding-left: 5px">
        <?php
        $js_search = 'onClick="geocodeLocation()"';
        echo form_button('searchlocation', 'Search', $js_search);
        ?>
    </div>
    <div class="clearboth"></div>
</div>

<div id="map">
    Map di sini
</div>

<div class="edit_profile_form">
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
</div>
<div class="clearboth"></div>