<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <title><?php echo $title; ?></title>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/jquery-1.6.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/popup.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery/jquery-ui.min.js"></script>
        <link href="<?php echo base_url(); ?>css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script type='text/javascript' src="<?php echo base_url(); ?>js/jquery/jquery.validate.min.js"></script>
        <link rel='stylesheet' type='text/css' href="<?php echo base_url(); ?>css/cupertino-jquery-theme/theme.css" />
        <?php
        if (isset($show_calendar_and_event) && $show_calendar_and_event) {?>
            <link rel='stylesheet' type='text/css' href="<?php echo base_url(); ?>css/fullcalendar.css" />
            <script type='text/javascript' src="<?php echo base_url(); ?>js/jquery.qtip-1.0.0-rc3.min.js"></script>
            <script type='text/javascript' src="<?php echo base_url(); ?>js/fullcalendar.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>js/galleria-1.2.4.min.js"></script>
        <?php }
        ?>  
        <?php
        if (isset($show_map) && $show_map) {?>
            <script type="text/javascript" src="<?php echo base_url(); ?>js/map.js"></script>
            <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>js/markerclusterer.js"></script>
        <?php }
        ?>
        <?php
        if (isset($show_calendar) && $show_calendar==1) {?>     
            <script src="<?php echo base_url(); ?>js/jquery/jquery-ui-timepicker-addon.js"></script>
            <script> 
                $(function() {
                    //getter
                    $( "#datepickers" ).datetimepicker({changeMonth: true,changeYear: true,dateFormat: 'yy-mm-dd',timeFormat: 'hh:mm:ss'});
                });
            </script> 
        <?php }?>
        <?php
            if (isset($show_editor) && $show_editor) {?>
                <script src="<?php echo base_url();?>js/nicEdit.js"></script>
                <script>
                 //<![CDATA[
                        bkLib.onDomLoaded(function() { 
                            new nicEditor({fullPanel : true, maxHeight:<?php echo $textarea_size; ?>, iconsPath : '<?php echo base_url();?>res/nicEditorIcons.gif', uploadURI:'<?php echo site_url('news/nicUpload');?>'}).panelInstance('<?php echo $textarea;?>');
                        });
                 //]]>
                </script>
                <?php
            }?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/general.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/message.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/profile.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/pagination.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/autocomplete.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/error-validation.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/popup.css" />
</head>
<?php
    if (isset($body_id)) {
?>
<body id="<?php echo $body_id; ?>">
<?php
    } else {
?>
<body>
<?php } ?>
  <div id="content">
    <div class="header">
        <div class="top-menu">
               <ul class="navigation">
                <li id="home-nav"><a href="<?php echo site_url('home')?>">HOME</a></li>
                <li id="about-nav"><a href="<?php echo site_url('about_us')?>">ABOUT US</a></li>
                <li id="event-nav"><a href="<?php echo site_url('event')?>">EVENT</a></li>
                <li id="news-nav"><a href="<?php echo site_url('news/show')?>">NEWS</a></li>
                <?php if ($this->session->userdata('name')==null) { ?>
                    <li id="signin-nav"><a href="<?php echo site_url('sign_in')?>">SIGN IN</a></li>
                    <li id="signup-nav"><a href="<?php echo site_url('sign_up')?>">SIGN UP</a></li>
                    <li id="findfriend-nav"><a href="<?php echo site_url('sign_in')?>">FIND FRIEND</a></li>
                <?php } else { ?>
                    <li id="profile-nav"><a href="<?php echo site_url('profile')?>">MY PROFILE</a></li>
                    <li id="message-nav"><a href="<?php echo site_url('message')?>">MESSAGE</a></li>
                    <li id="findfriend-nav"><a href="<?php echo site_url('friend')?>">FIND FRIEND</a></li>
                <?php } ?>
            </ul>
            
            <div class="search_site_box">
                <?php 
                    echo form_open('site_searching/search');
                    echo form_input('term', '');
                    echo form_submit('search', 'Submit', 'id="search"');
                    echo form_close();
                ?>
            </div>
            <?php if ($this->session->userdata('name')!=null) { ?>
            <div id="welcome_user">
                <?php echo character_limiter($this->session->userdata('name'),20).br(1).' ('.anchor('sign_in/sign_out','Sign Out').')';?>
            </div>
            <?php } ?>
        </div>
        
        <div class="banner"> 
            <div id="left-banner">
                <?php if (isset($body_id) && $body_id=='home_body') {?>
                <div id="deskripsi_home">
                    <p>We are the alumni association of <?php echo anchor('about_us/view/link_web','SMA St. Ursula'); ?>. Dedicated to humanity and service to others (SERVIAM), we create our family as an extension of St. Ursula high school. We welcome home those of our own, and those who <?php echo anchor('about_us/view/visimisi','share our vision and passion'); ?>.  Questions? <?php echo anchor('about_us/view/contact','Contact us.');?> </p>
                </div>
                <?php } ?>
            </div>
            <div id="right-banner">
                <div id="sanur_title">
                    <div id="grouper1">
                        <div id="right-logo">
                        </div>
                        <div class="heading">
                            IKATAN ALUMNI
                        </div>
                        <div class="heading">
                           SANTA URSULA
                        </div>
                    </div>
                    <div class="heading">
                        JALAN POS JAKARTA 
                    </div>
                    <div class="heading2">
                        Ini Sanur Posta - <b><i>Servira non Servari</i></b>
                    </div>
                </div>
            </div>
        </div>
     
        <div id="history">
            <?php
                $c=0;
                if (isset($struktur)) {
                    foreach ($struktur as $h) :
                        if ($h['islink'])
                            echo anchor($h['link'],$h['label']);
                        else
                            echo $h['label'];
                        if ($c!=count($struktur)-1)
                            echo '/';
                        $c++;
                    endforeach;
                }
                    ?>
                </div>
    </div>