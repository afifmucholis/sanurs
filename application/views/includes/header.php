<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
        <title><?php echo $title; ?></title>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery/jquery-1.6.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/popup.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/ajax-loader.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery/jquery-ui.min.js"></script>
        <link href="<?php echo base_url(); ?>css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script type='text/javascript' src="<?php echo base_url(); ?>js/jquery/jquery.validate.min.js"></script>
        <link rel='stylesheet' type='text/css' href="<?php echo base_url(); ?>css/cupertino-jquery-theme/theme.css" />
        <!-- <link rel='stylesheet' type='text/css' href="<?php echo base_url(); ?>css/trontastic/theme.css" /> -->
        <!-- <link rel='stylesheet' type='text/css' href="<?php echo base_url(); ?>css/ui-darkness/theme.css" /> -->
        <?php if (isset($show_calendar_and_event) && $show_calendar_and_event) { ?>
            <link rel='stylesheet' type='text/css' href="<?php echo base_url(); ?>css/fullcalendar.css" />
            <script type='text/javascript' src="<?php echo base_url(); ?>js/jquery.qtip-1.0.0-rc3.min.js"></script>
            <script type='text/javascript' src="<?php echo base_url(); ?>js/fullcalendar.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>js/galleria-1.2.4.min.js"></script>
        <?php }
        ?>  
        <?php if (isset($show_map) && $show_map) { ?>
            <script type="text/javascript" src="<?php echo base_url(); ?>js/map.js"></script>
            <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>js/markerclusterer.js"></script>
<?php } ?>
        <?php if (isset($show_calendar) && $show_calendar == 1) { ?>     
            <script src="<?php echo base_url(); ?>js/jquery/jquery-ui-timepicker-addon.js"></script>
            <script> 
                $(function() {
                    //getter
                    $( "#datepickers" ).datetimepicker({changeMonth: true,changeYear: true,dateFormat: 'yy-mm-dd',timeFormat: 'hh:mm:ss'});
                });
            </script> 
<?php } ?>
<?php if (isset($show_editor) && $show_editor) { ?>
            <script src="<?php echo base_url(); ?>js/nicEdit.js"></script>
            <script>
                //<![CDATA[
                bkLib.onDomLoaded(function() { 
                    new nicEditor({fullPanel : true, maxHeight:<?php echo $textarea_size; ?>, iconsPath : '<?php echo base_url(); ?>res/nicEditorIcons.gif', uploadURI:'<?php echo site_url('news/nicUpload'); ?>'}).panelInstance('<?php echo $textarea; ?>');
                });
                //]]>
            </script>
    <?php } ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/general.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/message.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/profile.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/pagination.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/autocomplete.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/error-validation.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/popup.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/event.css" />
        <link rel="icon" href="<?php echo base_url() ?>favicon.png" type="image/png" />
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
            <div id="ajax-loading-wrapper">
                <div id="loading" style="display:none;">
                    Loading content, please wait.. 
                    <img src="<?php echo base_url() . 'res/desain/ajax-loader.gif' ?>" alt="loading.." />  
                </div>
            </div>
            <div class="header">
                <div class="top-menu">
                    <ul class="navigation">
                        <li id="home-nav"><a href="<?php echo site_url('home') ?>">HOME</a></li>
                        <li id="about-nav"><a href="<?php echo site_url('about_us') ?>" class="about_parent">ABOUT US</a>
                            <ul class="navigation_2">
                                <li><div class="arrow-right"></div><a href="history" class="about_links">HISTORY</a></li>
                                <li><div class="arrow-right"></div><a href="visimisi" class="about_links">VISION AND MISSION</a></li>
                                <li><div class="arrow-right"></div><a href="contact" class="about_links">CONTACT US</a></li>
                                <li><div class="arrow-right"></div><a href="link_web" id="link_web" class="about_links">SANTA URSULA WEB</a></li>
                            </ul>
                        </li>
                        <li id="event-nav"><a href="<?php echo site_url('event') ?>">EVENTS</a></li>
                        <li id="news-nav"><a href="<?php echo site_url('news/show') ?>">NEWS</a></li>
<?php if ($this->session->userdata('name') == null) { ?>
                            <li id="signin-nav"><a href="<?php echo site_url('sign_in') ?>">SIGN IN</a></li>
                            <li id="signup-nav"><a href="<?php echo site_url('sign_up') ?>">SIGN UP</a></li>
<?php } else { ?>
                            <li id="profile-nav"><a href="<?php echo site_url('profile') ?>">MY PROFILE</a></li>
                            <li id="message-nav"><a href="<?php echo site_url('message') ?>">MESSAGE</a></li>
                        <?php } ?>
                        <li id="findfriend-nav"><a href="<?php echo site_url('friend') ?>">FIND FRIEND</a></li>
                    </ul>

                    <div class="search_site_box">
                        <?php
                        echo form_open('site_searching/search');
                        echo form_input('term', '', 'id="search_input"');
                        echo form_submit('search', '', 'id="search_button"');
                        echo form_close();
                        ?>
                    </div>
                        <?php if ($this->session->userdata('name') != null) { ?>
                        <div id="welcome_user">
                            <?php echo "<label class='general_text'>" . character_limiter($this->session->userdata('name'), 20) . '</label>' . br(1) . ' (' . anchor('sign_in/sign_out', 'Sign Out', 'class="link"') . ')'; ?>
                        </div>
                        <?php } ?>
                </div>

                <div class="banner">
                        <?php
                        if (isset($body_id) && $body_id == 'home_body') {
                            ?> <img src="<?php echo base_url() . 'res/desain/header1.png' ?>">
<?php } else { ?> <img src="<?php echo base_url() . 'res/desain/header2.png' ?>">
<?php } ?>

                </div>

                <div id="history">
                    <?php
                    $c = 0;
                    if (isset($struktur)) {
                        foreach ($struktur as $h) :
                            if ($h['islink'])
                                echo anchor($h['link'], $h['label'], 'class="link"');
                            else
                                echo "<label class='general_text'>" . $h['label'] . "</label>";
                            if ($c != count($struktur) - 1)
                                echo ' &raquo; ';
                            $c++;
                        endforeach;
                    }
                    ?>
                </div>
            </div>