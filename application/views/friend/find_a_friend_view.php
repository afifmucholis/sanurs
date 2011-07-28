<div id="col_left" style="float: left">
    <h3 style="color: #565555">Find A Friend</h3>
    <?php
    echo form_open('friend/search');
    ?>
    <p style="color: #565555">Search by keywords</p>
    <div>
        <table>
            <tr>
                <td class="general_text"> <?php echo form_label('Name ', 'name'); ?> </td>
                <td class="general_text"> <?php echo form_input('name', ''); ?> </td>
            </tr>
            <tr>
                <td class="general_text"> <?php echo form_label('Year ', 'year'); ?> </td>
                <td class="general_text"> <?php echo form_input('year', ''); ?> </td>
            </tr>
            <tr>
                <td class="general_text"> <?php echo form_label('Area of interest ', 'interest'); ?> </td>
                <td class="general_text"> <?php echo form_dropdown('interest', $interest_list, $interest_list['all']); ?> </td>
            </tr>
            <tr>
                <td class="general_text"> <?php echo form_label('Major Education ', 'major'); ?> </td>
                <td class="general_text"> <?php echo form_dropdown('major', $major_list, $major_list['all']); ?> </td>
            </tr>
        </table>
    </div>
    <div class="general_text">
        <?php echo form_submit('search', 'Search'); ?>
    </div>
    <?php
    echo form_close();
    ?>
    <p style="color: #565555">or Click on one of the blinking spots to select a location</p>
</div>
<?php echo br(10); ?>
<div id="map">
    <script type="text/javascript">
        initmap("searchfriend");
    </script>
</div>
