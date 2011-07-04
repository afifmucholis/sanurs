<div id="deskripsi">
<p>We are the alumni association of <?php echo anchor('about_us/view/link_web','SMA St. Ursula'); ?>. Dedicated to humanity and service to others (SERVIAM), we create our family as an extension of St. Ursula high school. We welcome home those of our own, and those who <?php echo anchor('about_us/view/visimisi','share our vision and passion'); ?>.  Questions? <?php echo anchor('about_us/view/contact','Contact us.');?> </p>
</div>
<br/>
<div id="news_feed" style="float:left;">
    Slide show news event here
</div>
<div id="col_right" style="float: right;">
    <h4>Sign in</h4>
    <?php
        echo form_open('sign_in/submit');
        echo form_label('Enter your email address : ','email')."<br/>";
        echo form_input('email', '', 'id="email"')."<br/>";
        echo form_label('Password : ','password')."<br/>";
        echo form_password('password', '', 'id="password"')."<br/>";
        echo form_submit('submit', 'Sign in', 'id="submit"');
    ?>
    <h4><?php echo anchor('sign_up','Sign up');?></h4>
    <p>… to start RSVP-ing in our events, shopping, and connecting.</p>
</div>
