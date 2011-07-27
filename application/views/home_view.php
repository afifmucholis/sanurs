<div class="home-menu">
    <img src="<?php echo base_url() . 'res/desain/homepage-photo.png' ?>">
    <?php if ($this->session->userdata('name') == null) { ?>
        <div class="login-box-home">

            <?php $this->load->view('sign_in/sign_in_view'); ?>
            <div class="login-description">
                Sign Up to
                <br/>
                <div class="link-new-member">
                    <?php echo anchor('sign_up', 'new St. Ursula alumni member'); ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<div class="recent-news-home">   
</div>

<div id="clearboth">
</div>