<div id="col_left" style="float: left">
    <h3>Find a Friend</h3>
    <?php
    echo form_open('friend/search');
    echo form_label('Name : ', 'name');
    $data = array(
        'id' => 'name',
        'name' => 'name',
    );
    echo form_input($data);
    echo br(1);
    echo form_label('Year : ', 'year');
    $data = array(
        'id' => 'year',
        'name' => 'year',
    );
    echo form_input($data);
    ?>
</div>
<div id="col_right" style="float: right">
    <?php
    echo form_label('Areas of interest : ', 'interest');
    echo br(1);
    $options = array(
        'all' => 'All interest',
        'design' => 'Design',
        'it' => 'IT',
        'business' => 'Business',
    );
    echo form_dropdown('interest', $options, 'all');
    echo br(1);
    echo form_submit('search', 'Search');
    echo form_close();
    ?>
    <p>Click on one of the blinking spots to select a location</p>
</div>
<?php echo br(10); ?>
<div id="map">
    <script type="text/javascript">
        initmap();
    </script>
    tampilin map disini
</div>
