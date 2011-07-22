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
        if (isset($show_calendar) && $show_calendar) {?>     
            <script src="<?php echo base_url(); ?>js/jquery/jquery-ui-timepicker-addon.js"></script>
            <script> 
                $(function() {
                    //getter
                    $( "#datepickers" ).datetimepicker({dateFormat: 'yy-mm-dd',timeFormat: 'hh:mm:ss'});
                });
            </script> 
        <?php }
        ?>
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
<body>
  <div id="content">
    <div class="header">
        <div class="top-menu">
               <ul class="navigation">
                <li><a href="<?php echo site_url('home')?>">Home</a></li>
                <li><a href="<?php echo site_url('about_us')?>">About Us</a></li>
                <li><a href="<?php echo site_url('event')?>">Event</a></li>
                <li><a href="<?php echo site_url('news/show')?>">News</a></li>
                <?php if ($this->session->userdata('name')==null) { ?>
                    <li><a href="<?php echo site_url('sign_in')?>">Sign In</a></li>
                    <li><a href="<?php echo site_url('sign_up')?>">Sign Up</a></li>
                    <li><a href="<?php echo site_url('sign_in')?>">Find A Friend</a></li>
                <?php } else { ?>
                    <li><a href="<?php echo site_url('profile')?>">My Profile</a></li>
                    <li><a href="<?php echo site_url('sign_in/sign_out')?>">Sign Out</a></li>
                    <li><a href="<?php echo site_url('message')?>">Message</a></li>
                    <li><a href="<?php echo site_url('friend')?>">Find A Friend</a></li>
                <?php } ?>
            </ul>

            <div class="search_site_box">
                <input></input>
            </div>
        </div>
        
        <div class="banner"> 
            <div id="left-banner">
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