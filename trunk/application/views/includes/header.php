<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title><?php echo $title;?></title>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery/jquery-1.6.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/popup.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/map.js"></script>
        
        <!--Kalender Akbar ini"!-->
        <link rel='stylesheet' type='text/css' href="<?php echo base_url();?>css/fullcalendar.css" />
        <link rel='stylesheet' type='text/css' href="<?php echo base_url();?>css/cupertino-calendar-theme/theme.css" />
        <script type='text/javascript' src="<?php echo base_url();?>js/jquery.qtip-1.0.0-rc3.min.js"></script>
        <script type='text/javascript' src="<?php echo base_url();?>js/fullcalendar.js"></script>
        <!-- Akhir Kalender Akbar ini"!-->
        
        <!-- Galeria Akbar ini -->
        <script type="text/javascript" src="<?php echo base_url();?>js/galleria-1.2.4.min.js"></script>
        <!-- Akhir Galeria Akbar ini -->
        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <?php 
            if (isset($show_calendar) && $show_calendar) {
        ?>
            <link href="<?php echo base_url();?>css/jquery-ui.css" rel="stylesheet" type="text/css"/>
            <link href="<?php echo base_url();?>css/timepicker.css" rel="stylesheet" type="text/css"/>
            <script src="<?php echo base_url();?>js/jquery/jquery-ui.min.js"></script>
            <script src="<?php echo base_url();?>js/jquery/jquery-ui-timepicker-addon.js"></script>
            <script> 
            $(function() {
                    //getter
                    $( "#datepicker" ).datetimepicker({dateFormat: 'yy-mm-dd',timeFormat: 'hh:mm:ss'});
            });
            </script> 
        <?php 
            }
        ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/general.css" />
</head>
<body>
  <div id="content">
    <div id="header">
        <div id="search_site_box">
            <input></input>
        </div>
        <div id="sanur_title">
            <h2>St. Ursula Alumni Association</h2>
        </div>
      
        <div id="sanur_title_description">
            <h2>Association of Students from St Ursula School</h2>
        </div>
        
        <div id="navigation">
            <label><?php echo anchor('home','Home');?></label>
            <label><?php echo anchor('about_us','About us');?></label>
            <label><?php echo anchor('event','Event');?></label>
            <?php if ($this->session->userdata('name')==null) { ?>
                <label><?php echo anchor('sign_in','Sign in');?></label>
                <label><?php echo anchor('sign_up','Sign up');?></label>
            <?php } else { ?>
                <label><?php echo anchor('profile','My Profile');?></label>
                <label><?php echo anchor('sign_in/sign_out','Sign out');?></label>
                <label><?php echo anchor('message','Message');?></label>
            <?php } ?>
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