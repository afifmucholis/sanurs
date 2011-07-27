<div class="left-menu">
    <div id="deskripsi">
    <p>We are the alumni association of <?php echo anchor('about_us/view/link_web','SMA St. Ursula'); ?>. Dedicated to humanity and service to others (SERVIAM), we create our family as an extension of St. Ursula high school. We welcome home those of our own, and those who <?php echo anchor('about_us/view/visimisi','share our vision and passion'); ?>.  Questions? <?php echo anchor('about_us/view/contact','Contact us.');?> </p>
    </div>
    <br/>
    <div id="news_feed" >
        Slide show news event here
    </div>
</div>

<div class="right-menu">
<?php if ($this->session->userdata('name')==null) { ?>
    <div id="col_right">
        <?php $this->load->view('sign_in/sign_in_view'); ?>
        <h3><?php echo anchor('sign_up','Sign up');?></h3>
        <p>… to start RSVP-ing in our events, shopping, and connecting.</p>
    </div>
<?php } ?>
</div>

<div id="clearboth">
</div>