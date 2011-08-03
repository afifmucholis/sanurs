<div id="editloc_bg">
    <div class="editloc_container">
        <div class="subtitle">Search Your Location</div>
        <div class="general_text" style="padding: 10px 0px 0px 18px; color: #ffffff">
            Input your current city : 
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

        <div style="padding: 3px 0px 5px 18px">
            <div style="width: 430px; float: left">
                <?php
                $js = 'onClick="deleteOverlays()"';
                echo form_button('delete', 'Delete Location', $js);
                ?>
            </div>
            <div style="width: 440px; float: left; text-align: right">
                <?php echo form_submit('save', 'Save Changes'); ?>
            </div>
            <div class="clearboth"></div>
            <?php       
            echo form_hidden('save_lat', 0);
            echo form_hidden('save_lng', 0);
            echo form_hidden('area_name', '');
            echo form_hidden('area_lat', 0);
            echo form_hidden('area_lng', 0);
            echo form_close();
            ?>
        </div>

        <div class="clearboth"></div>
    </div>
</div>