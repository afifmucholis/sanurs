<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title><?php echo $title;?></title>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery/jquery-1.6.2.min.js"></script>
</head>
<body>
    <div id="top">
        <div id="link">
            <label><?php echo anchor('about_us','About us');?></label>
            <label><a href="">Events</a></label>
            <label><?php echo anchor('sign_in','Sign in');?></label>
            <label><?php echo anchor('sign_up','Sign up');?></label>
        </div>
        <div id="sanur_title">
            <h2>SMA St. Ursula Alumni Association</h2>
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