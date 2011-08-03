<div id="editvis_bg">
    <div class="general_text" style="color: rgb(255,255,255); padding: 30px 0px 0px 67px">
        Please choose the information that you want other people than you to see.
    </div>
    <?php echo form_open('profile/submitVisibility'); ?>
    <div class="editvisibility_col">
        <div class="subtitle">BASIC INFORMATION</div>
        <div class="clearboth"></div>

        <div class="left_checkbox"><?php echo form_checkbox('interest', 'interest', $content_edit['interest']); ?></div>
        <div class="right_checkbox"><?php echo form_label('Area of Interest'); ?></div>
        <div class="clearboth"></div>

        <div class="left_checkbox"><?php echo form_checkbox('birthdate', 'birthdate', $content_edit['birthdate']); ?></div>
        <div class="right_checkbox"><?php echo form_label('Birthdate'); ?></div>
        <div class="clearboth"></div>

        <div class="subtitle">CONTACT INFORMATION</div>
        <div class="clearboth"></div>

        <div class="left_checkbox"><?php echo form_checkbox('email', 'email', $content_edit['email']); ?></div>
        <div class="right_checkbox"><?php echo form_label('Email Address'); ?></div>
        <div class="clearboth"></div>

        <div class="left_checkbox"><?php echo form_checkbox('home_address', 'home_address', $content_edit['home_address']); ?></div>
        <div class="right_checkbox"><?php echo form_label('Home Address'); ?></div>
        <div class="clearboth"></div>

        <div class="left_checkbox"><?php echo form_checkbox('home_telephone', 'home_telephone', $content_edit['home_telephone']); ?></div>
        <div class="right_checkbox"><?php echo form_label('Home Telephone'); ?></div>
        <div class="clearboth"></div>

        <div class="left_checkbox"><?php echo form_checkbox('handphone', 'handphone', $content_edit['handphone']); ?></div>
        <div class="right_checkbox"><?php echo form_label('Handphone'); ?></div>
        <div class="clearboth"></div>

        <div class="subtitle">EDUCATION</div>
        <div class="clearboth"></div>

        <div class="left_checkbox"><?php echo form_checkbox('s1', 's1', $content_edit['S1']); ?></div>
        <div class="right_checkbox"><?php echo form_label('Bacelor Degree Information'); ?></div>
        <div class="clearboth"></div>

        <div class="left_checkbox"><?php echo form_checkbox('s2', 's2', $content_edit['S2']); ?></div>
        <div class="right_checkbox"><?php echo form_label('Master Degree Information'); ?></div>
        <div class="clearboth"></div>

        <div class="left_checkbox"><?php echo form_checkbox('s3', 's3', $content_edit['S3']); ?></div>
        <div class="right_checkbox"><?php echo form_label('Doctorate Degree Information'); ?></div>
        <div class="clearboth"></div>

        <div class="subtitle">WORKING</div>
        <div class="clearboth"></div>

        <div class="left_checkbox"><?php echo form_checkbox('work_experience', 'work_experience', $content_edit['work_experience']); ?></div>
        <div class="right_checkbox"><?php echo form_label('Work Experience'); ?></div>
        <div class="clearboth"></div>

        <div class="left_checkbox"><?php echo form_checkbox('current_experience', 'current_experience', $content_edit['current_experience']); ?></div>
        <div class="right_checkbox"><?php echo form_label('Current Work'); ?></div>
        <div class="clearboth"></div>
        <div class="clearboth"></div>
        <div style="text-align: right; padding: 10px 20px 15px 0px">
            <?php
            echo form_submit('save', 'Save Changes');
            echo form_close();
            ?>
        </div>
    </div>
    <div class="clearboth"></div>
</div>