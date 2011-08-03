<div id="content_about_top">
<img src="<?php echo base_url() . 'res/desain/contact-photo.jpg' ?>" />
<div class="clearboth"></div>
</div>
<div id="content_about_wrap">
    <div id="content_about_left">
        <h3>CONTACT US</h3>
        Brief description of contact Ikatan Alumni Santa Ursula.
        <?php
        echo form_open('about_us/contact','id="contact_us_form"');
        echo form_input('name', '', 'id="name" title="Name"') . "<br/>";
        echo form_input('email', '', 'id="email" title="Email"') . "<br/>";
        echo form_input('subject', '', 'id="subject" title="Subject"') . "<br/>";
        $data = array(
            'title' => 'Type message here...',
            'name' => 'message',
            'id' => 'message',
            'rows' => '13'
        );
        echo form_textarea($data) . "<br/>";
        ?>
        <?php
        echo form_submit('submit', 'Submit', 'id="submit"');
        ?>
        <?php
        echo form_close();
        echo br(3);
        ?>
    </div>
    <?php echo br(15); ?>
    <div id="content_about_right">
        Ikatan Alumni Santa Ursula | Jakarta<br/>
        Jalan Pos XX<br/>
        Jakarta Pusat<br/>
        <br/>
        T:+62211919191919<br/>
        F:+62211919191918<br/>
        email@email.com<br/>
    </div>
</div>
<div class="clearboth"></div>