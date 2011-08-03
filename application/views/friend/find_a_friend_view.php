<div id="col_left" style="float: left">
    <div id="title-menu">Find A Friend</div>
    <?php
    echo form_open('friend/search');
    ?>
    <div style="padding: 5px 0px 0px 10px">
    <p style="color: #565555">Search by keywords</p>
    </div>
    <div class="search_friend_table">
        <table>
            <tr>
                <td class="left-table"> <?php echo form_label('Name ', 'name'); ?> </td>
                <td class="right-table"> <?php echo form_input('name', ''); ?> </td>
            </tr>
            <tr>
                <td class="left-table"> <?php echo form_label('Year ', 'year'); ?> </td>
                <td class="right-table"> <?php echo form_input('year', ''); ?> </td>
            </tr>
            <tr>
                <td class="left-table"> <?php echo form_label('Area of interest ', 'interest'); ?> </td>
                <td class="right-table"> <?php echo form_dropdown('interest', $interest_list, $interest_list['all']); ?> </td>
            </tr>
            <tr>
                <td class="left-table"> <?php echo form_label('Major Education ', 'major'); ?> </td>
                <td class="right-table"> <?php echo form_dropdown('major', $major_list, $major_list['all']); ?> </td>
            </tr>
        </table>
        <div class="general_text" style="padding: 5px 0px 20px 10px">
        <?php echo form_submit('search', 'Search'); ?>
    </div>
    </div>
    <?php
    echo form_close();
    ?>
    <p style="color: #565555; padding-left: 20px">or Click on one of the blinking spots to select a location</p>
</div>
<?php echo br(10); ?>
<div id="map">
    <script type="text/javascript">
        initmap("searchfriend");
    </script>
</div>
