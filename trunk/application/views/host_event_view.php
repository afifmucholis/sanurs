<div id="col_left" style="float: left">
    <div id="img">
        <a href="#" class="popup_link">Click to change Picture</a>
        <?php 
            //echo anchor('#','Click to change Picture','class="popup_link"');
            echo br(1);
            $image_properties = array(
                  'src' => 'res/NoPhotoAvailable.jpg',
                  'alt' => 'No Photo Available',
                  'class' => 'event_images',
                  'id' => 'upload_image',
                  'width' => '200',
                  'height' => '200',
                  'title' => 'No Photo Available',
                  'rel' => 'lightbox',
            );
            echo img($image_properties);
            echo br(2);
        ?>
    </div>
    <p>
        Special invitations will be sent through e-mail to all the members of the group, <br/>but the event will still show on the homepage.
    </p>
    <p>
        You can check attendance to your event in your <?php echo anchor('profile','profile page');?>.
    </p>
</div>
<div id="col_right" style="float: right">
    <?php
        echo form_open('event/submit_event');
        echo form_label('When : ','email')."<br/>";
        echo form_input('when', '', 'id="when"')."<br/>";
        echo form_label('Where : ','where')."<br/>";
        echo form_input('where', '', 'id="where"')."<br/>";
        echo form_label('Description : ','description')."<br/>";
        echo form_input('description', '', 'id="description"')."<br/>";
        $options = array(
                  'everybody'  => 'Everybody',
                  'interest'    => 'Areas of interest',
                  'loacation'   => 'Location',
                  'school' => 'Same association/school',
                  'year' => 'Same year',
                );
        echo "Select a group to invite<br/>";
        echo form_dropdown('invite_grup', $options, 'everybody');
        echo "<br/>";
        echo form_submit('submit', 'Submit', 'id="submit"');
        echo form_close();
    ?>
</div>
<?php $this->load->view('upload_image');?>
