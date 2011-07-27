<div id="col_left" style="float: left">
    <h3 style="font-family: IMPACT; font-size: 30px; color: #565555">FIND A FRIEND</h3>
    <?php
    echo form_open('friend/search');
    ?>
    <p style="font-family: ARIAL; font-size: 12px; color: #565555">Search by keywords</p>
    <div>
        <table>
            <tr>
                <td style="font-family: ARIAL; font-size: 12px"> <?php echo form_label('Name ', 'name'); ?> </td>
                <td style="font-family: ARIAL; font-size: 12px"> <?php echo form_input('name', ''); ?> </td>
            </tr>
            <tr>
                <td style="font-family: ARIAL; font-size: 12px"> <?php echo form_label('Year ', 'year'); ?> </td>
                <td style="font-family: ARIAL; font-size: 12px"> <?php echo form_input('year', ''); ?> </td>
            </tr>
            <tr>
                <td style="font-family: ARIAL; font-size: 12px"> <?php echo form_label('Area of interest ', 'interest'); ?> </td>
                <td style="font-family: ARIAL; font-size: 12px"> <?php echo form_dropdown('interest', $interest_list, $interest_list['all']); ?> </td>
            </tr>
            <tr>
                <td style="font-family: ARIAL; font-size: 12px"> <?php echo form_label('Major Education ', 'major'); ?> </td>
                <td style="font-family: ARIAL; font-size: 12px"> <?php echo form_dropdown('major', $major_list, $major_list['all']); ?> </td>
            </tr>
        </table>
    </div>
    <?php
/*    echo form_label('Name : ', 'name');
    echo form_input('name', '');
    echo br(1);
    
    echo form_label('Year : ', 'year');
    echo form_input('year', '');
    echo br(1);
    
    echo form_label('Areas of interest : ', 'interest');
    echo form_dropdown('interest', $interest_list, $interest_list['all']);
    echo br(1);
    
    echo form_label('Major Education : ', 'major');
    echo form_dropdown('major', $major_list, $major_list['all']);
    echo br(1);*/
    ?>
    <div style="font-family: ARIAL; font-size: 12px">
        <?php echo form_submit('search', 'Search'); ?>
    </div>
    <?php
    
    
    echo form_close();
    ?>
    <p style="font-family: ARIAL; font-size: 12px; color: #565555">or Click on one of the blinking spots to select a location</p>
</div>
<?php echo br(10); ?>
<div id="map">
    <script type="text/javascript">
        initmap("searchfriend");
    </script>
</div>
