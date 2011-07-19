<div id="col_left" style="float: left">
    <h3>Find a Friend</h3>
    <?php
    echo form_open('friend/search');
    
    echo form_label('Name : ', 'name');
    echo form_input('name', '');
    echo br(1);
    
    echo form_label('Year : ', 'year');
    echo form_input('year', '');
    echo br(1);
    
    echo form_label('Areas of interest : ', 'interest');
    /*$interest = array(
        'all' => 'All Interest',
        'design' => 'Design',
        'it' => 'IT',
        'business' => 'Business'
    );*/
    //$interest = array('All Interest', $interest_list[0]->interest);
    echo form_dropdown('interest', $interest_list, 0);
    echo br(1);
    
    echo form_label('Major Education : ', 'major');
    $major = array(
        'all' => 'All Major',
        'm1' => 'Informatics Engineering',
        'm2' => 'Electrical Engineering',
    );
    echo form_dropdown('major', $major, 'all');
    echo br(1);
    
    echo form_submit('search', 'Search');
    
    echo form_close();
    ?>
    <p>Click on one of the blinking spots to select a location</p>
</div>
<?php echo br(10); ?>
<div id="map">
    <script type="text/javascript">
        initmap("searchfriend");
    </script>
</div>
