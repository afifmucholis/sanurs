<div class="left-menu">
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