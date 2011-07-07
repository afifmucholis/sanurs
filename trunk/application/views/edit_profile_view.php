<div class="left-menu">
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
            'width' => '150',
            'height' => '150',
            'title' => 'No Photo Available',
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
    echo form_hidden('url_img', base_url() . 'res/NoPhotoAvailable.jpg');
    echo form_label('Jenis Kelamin: ');
    $options = array(
        'male' => 'Male',
        'female' => 'Female'
    );
    echo form_dropdown('gender', $options, 'male');
    echo br(1);
    echo form_label('Tempat/Tanggal Lahir (dd-mm-yy): ');
    echo form_input('ttl', '', 'id="ttl"');
    echo br(1);
    echo form_label('Alamat Rumah: ');
    echo form_input('alamat', '', 'id="alamat"');
    echo br(1);
    echo form_label('Telfon Rumah: ');
    echo form_input('telfon', '', 'id="telfon"');
    echo br(1);
    echo form_label('HP:');
    echo form_input('hp', '', 'id="hp"');
    echo br(1);
    echo form_label('Email:');
    echo form_input('email', '', 'id="email"');
    echo br(1);
    echo form_submit('next', 'Next');
    echo form_close();
    ?>
</div>
<div id="clearboth">
</div>
<?php $this->load->view('upload_image'); ?>
