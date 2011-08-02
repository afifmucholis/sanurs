<div class="edit_profile_left" style="background-color: #ffffff">
    <div class="edit_profpic">
        <?php
        $image_properties = array(
            'src' => $content_edit['img_url'],
            'class' => 'upload_images',
            'id' => 'upload_image',
            'alt' => $content_edit['name'],
            'title' => $content_edit['name'],
            'rel' => 'lightbox',
            'style' => 'max-width:365px'
        );
        echo img($image_properties);
        ?>
        <div class="edit_profpic_navig">
            <a id="edit_profpic_navig"  href="#" class="popup_link">CHANGE PICTURE</a>
        </div>
    </div>
</div>
<div class="edit_profile_right">
    <?php
    echo form_open('profile/submitProfile');
    echo form_hidden('url_img', base_url() . $content_edit['img_url']);
    echo br(1);
    ?>
    <div>
        <div class="subtitle">CHANGE PASSWORD</div>
        <table>
            <tr>
                <td class="left-table"> <?php echo form_label('Old Password '); ?> </td>
                <td class="right-table"> <?php echo form_input('old_password', '', 'id="old_password"'); ?> </td>
            </tr>
            <tr>
                <td class="left-table"> <?php echo form_label('New Password '); ?> </td>
                <td class="right-table"> <?php echo form_input('new_password', '', 'id="new_password"'); ?> </td>
            </tr>
            <tr>
                <td class="left-table"> <?php echo form_label('New Password (again)'); ?> </td>
                <td class="right-table"> <?php echo form_input('confirm_password', '', 'id="confirm_password"'); ?> </td>
            </tr>
        </table>
    </div>
    <div>
        <div class="subtitle">BASIC INFORMATION</div>
        <table>
            <tr>
                <td class="left-table"> <?php echo form_label('Nick Name '); ?> </td>
                <td class="right-table"> <?php echo form_input('nick_name', $content_edit['nickname'], 'id="nick_name"'); ?> </td>
            </tr>
            <tr>
                <td class="left-table"> <?php echo form_label('Gender '); ?> </td>
                <td class="right-table"> <?php echo form_dropdown('gender', $gender_list, $content_edit['gender']); ?> </td>
            </tr>
            <tr>
                <td class="left-table"> <?php echo form_label('Home Address '); ?> </td>
                <td class="right-table"> <?php echo form_input('home_address', $content_edit['home_address'], 'id="home_address"'); ?> </td>
            </tr>
            <tr>
                <td class="left-table"> <?php echo form_label('Home Telephone '); ?> </td>
                <td class="right-table"> <?php echo form_input('home_telephone', $content_edit['home_telephone'], 'id="home_telephone"'); ?> </td>
            </tr>
            <tr>
                <td class="left-table"> <?php echo form_label('Handphone '); ?> </td>
                <td class="right-table"> <?php echo form_input('handphone', $content_edit['handphone'], 'id="handphone"'); ?> </td>
            </tr>
        </table>
    </div>
    <div>
        <div>
            <div class="subtitle">AREA OF INTEREST</div>
            <div class="general_text" style="width: 200px; color: #ffffff; padding-left: 25px; text-align: right">(you can choose more than one) :</div>
        </div>
        <?php
        echo br(1);
        foreach ($interest_list as $interest) {
            $status = FALSE;
            if ($user_interest) {
                $i = 0;
                $found = FALSE;
                while (!$found && $i < count($user_interest)) {
                    if ($interest->id == $user_interest[$i]->interest_id) {
                        $found = TRUE;
                        $status = TRUE;
                    }
                    $i++;
                }
            }
            ?>
            <div class="left_checkbox">
                <?php echo form_checkbox('interest[]', $interest->id, $status); ?>
            </div>
            <div class="right_checkbox">
                <?php echo form_label($interest->interest); ?>
            </div>
            <div class="clearboth"></div>
            <?php
            echo br(1);
        }
        ?>
    </div>
    <div style="text-align: right; padding: 0px 20px 15px 0px">
        <?php echo form_submit('save', 'Save Changes'); ?>
    </div>
    <?php
    echo form_close();
    ?>
</div>
<div class="clearboth"></div>
<?php
$this->load->view('popup/upload_image');
?>