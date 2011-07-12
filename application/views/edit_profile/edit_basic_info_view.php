<div class="left-menu">
    <div id="img">
        <a href="#" class="popup_link">Click to change Picture</a>
        <?php
        //echo anchor('#','Click to change Picture','class="popup_link"');
        echo br(1);
        $image_properties = array(
            'src' => $content_edit['img_url'],
            'class' => 'upload_images',
            'id' => 'upload_image',
            'width' => '150',
            'height' => '150',
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
    echo form_hidden('url_img', base_url().$content_edit['img_url']);
    echo br(1);
    echo form_label('Nick Name: ');
    echo form_input('nick_name', $content_edit['nick_name'], 'id="nick_name"');
    echo br(1);
    echo form_label('Gender: ');
    $options = array(
        'male' => 'Male',
        'female' => 'Female'
    );
    echo form_dropdown('gender', $options, $content_edit['gender']);
    echo br(1);
    echo form_label('Home Address: ');
    echo form_input('home_address', $content_edit['home_address'], 'id="home_address"');
    echo br(1);
    echo form_label('Home Telephone: ');
    echo form_input('home_telephone', $content_edit['home_telephone'], 'id="home_telephone"');
    echo br(1);
    echo form_label('Handphone:');
    echo form_input('handphone', $content_edit['handphone'], 'id="handphone"');
    echo br(1);
    echo form_submit('save', 'Save Changes');
    echo form_close();
    ?>
</div>
<div id="clearboth">
</div>
<?php $this->load->view('popup/upload_image'); ?>
<script type="text/javascript">
$(".popup_link").click(function(){
        id_click =  "#upload_popup";
        //centering with css
        centerPopup();
        //load popup
        loadPopup();
});
// pengecekan form yang diubah
$("input[type='text']").change(function(){
  _isDirty = true;
});
$("input[type='password']").change(function(){
  _isDirty = true;
});
$("input[type='textarea']").change(function(){
  _isDirty = true;
});
$("input[type='hidden']").change(function(){
  _isDirty = true;
});
$("input[type='checkbox']").change(function(){
  _isDirty = true;
});
$("input[type='radio']").change(function(){
  _isDirty = true;
});
$("input[type='select-one']").change(function(){
  _isDirty = true;
});
$("input[type='select-multiple']").change(function(){
  _isDirty = true;
});
$("input[type='submit']").click(function(){
  _isDirty = false;
});
</script>