<div class="left-menu">
    <div id="col_left">
        <div id="profpic">
            <?php
                $image_properties = array(
                          'src' => $user_data['image'],
                          'alt' => 'No Photo Available',
                          'class' => 'event_images',
                          'id' => 'upload_image',
                          'width' => '250',
                          'height' => '400',
                          'title' => 'No Photo Available',
                          'rel' => 'lightbox',
                    );
                    echo img($image_properties);
              ?>
        </div>
        <div id="news">
            Levana is hosting “A Night of Neglect” this Saturday, 8 October 2011. Check it out
        </div>
    </div>
</div>

<div class="right-menu">
    <div id="col_right">
        <div id="info">
            <?php $this->load->view('profile/user_info', $user_data); ?>
        </div>
        <br/><br/>
        <div id="send_email">
            Send Message to <?php echo $user_data['name']; ?><br/>
            <?php
            echo form_open('about_us/contact');
            echo form_label('Email : ', 'email') . "   ";
            echo form_input('Email', '', 'id="email"') . "<br/>";
            echo form_label('Subject : ', 'subject') . "  ";
            echo form_input('Subject', '', 'id="subject"') . "<br/>";
            $data = array(
                'name' => 'isi',
                'id' => 'isi',
                'rows' => '10',
                'cols' => '40'
            );
            echo form_textarea($data) . "<br/>";
            echo form_submit('submit', 'Submit', 'id="submit"');
            echo form_close();
            ?>
        </div>
        <?php if ($add_as_friend) { ?>
            <div id="add_as_friend">
                <a href="#" class="popup_link">Add as friend</a>
            </div>
        <?php } ?>
    </div>
</div>
<div id="clearboth">
</div>
<?php $this->load->view('popup/add_as_friend_form', $user_data); ?>
