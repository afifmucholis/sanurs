<div class="left-menu">
    <div id="img">
        <a href="#" class="popup_link">Click to change Picture</a>
        <?php 
            echo br(1);
            $image_properties = array(
                  'src' => 'res/default.jpg',
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
<div class="right-menu">
    <?php echo validation_errors(); //menampilkan pesan error form ?>
    <?php
        echo form_open('event/submit_event');
        echo form_hidden('url_img', base_url().'res/NoPhotoAvailable.jpg');
        echo form_label('Title : ','title')."<br/>";
        echo form_input('title', set_value('title'), 'id="title"')."<br/>";
        echo form_label('When : ','when')."<br/>";
        echo form_input('when', set_value('when'), 'id="datepicker"')."<br/>";
        echo form_label('Where : ','where')."<br/>";
        echo form_input('where', set_value('where'), 'id="where"')."<br/>";
        echo form_label('Description : ','description')."<br/>";
        echo form_input('description', set_value('description'), 'id="description"')."<br/>";
        echo "Select category for this event<br/>";
        echo form_dropdown('category_event', $category_list, set_value('category_event'));
        echo "<br/>";
        echo form_submit('submit', 'Submit', 'id="submit"');
        echo form_close();
    ?>
    
</div>
<div id="clearboth"></div>
<?php $this->load->view('popup/upload_image');?>
