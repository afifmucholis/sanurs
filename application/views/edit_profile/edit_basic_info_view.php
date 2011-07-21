<div class="left-menu" style="width: 500px">
    <div id="profpic">
        <a href="#" class="popup_link">Click to change Picture</a>
        <?php
        //echo anchor('#','Click to change Picture','class="popup_link"');
        echo br(1);
        $image_properties = array(
            'src' => $content_edit['img_url'],
            'class' => 'upload_images',
            'id' => 'upload_image',
            'alt' => $content_edit['name'],
            'title' => $content_edit['name'],
            'rel' => 'lightbox',
        );
        echo img($image_properties);
        echo br(2);
        ?>
    </div>
</div>

<div class="right-menu">

    <?php
    echo form_open('profile/submitProfile');
    echo form_hidden('url_img', base_url() . $content_edit['img_url']);
    echo br(1);
    echo form_label('Nick Name: ');
    echo form_input('nick_name', $content_edit['nickname'], 'id="nick_name"');
    echo br(1);
    echo form_label('Gender: ');
    echo form_dropdown('gender', $gender_list, $content_edit['gender']);
    echo br(1);
    echo form_label('Home Address: ');
    echo form_input('home_address', $content_edit['home_address'], 'id="home_address"');
    echo br(1);
    echo form_label('Home Telephone: ');
    echo form_input('home_telephone', $content_edit['home_telephone'], 'id="home_telephone"');
    echo br(1);
    echo form_label('Handphone:');
    echo form_input('handphone', $content_edit['handphone'], 'id="handphone"');
    echo br(2);
    echo 'Select area of interest (you can choose more than one) : ';
    echo br(1);
    foreach ($interest_list as $interest) {
        $status = FALSE;
        if ($user_interest) {
            $i = 0;
            $found = FALSE;
            while (!$found && $i<count($user_interest)) {
                if ($interest->id == $user_interest[$i]->interest_id) {
                    $found = TRUE;
                    $status = TRUE;
                }
                $i++;
            }
        }
        echo form_checkbox('interest[]', $interest->id, $status);
        echo form_label($interest->interest);
        echo br(1);
    }
    echo form_submit('save', 'Save Changes');
    echo form_close();
    ?>
</div>
<div id="clearboth">
</div>
<?php $this->load->view('popup/upload_image'); ?>