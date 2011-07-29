<div id="content_about">
</div>

<div id="content_history" class="display_none">
    <?php $this->load->view('about_us/history.php'); ?>
</div>
<div id="content_visimisi" class="display_none">
    <?php $this->load->view('about_us/visimisi.php'); ?>
</div>
<div id="content_contact" class="display_none">
    <?php $this->load->view('about_us/contact.php'); ?>
</div>
<div id="content_link_web" class="display_none">
    <?php $this->load->view('about_us/link_web.php'); ?>
</div>

<script type="text/javascript">
    
    $(document).ready(function(){
        about_us_nav_binding();
        about_us_nav('<?php echo $view_awal; ?>');
        about_us_input_hint();
    });
 
    function about_us_nav_binding() {
        $('.navigation_2')
            .find('a.about_links')
            .unbind('click.nav')
            .bind('click.nav', function(){
                return about_us_nav($(this).attr('href'));
            });
    }
    
    function about_us_nav(val) {
        var href=val;
        var his2 = '';
        var clone_his = $('#history').clone(true);
        if (href=='history')
            his2='History';
        else if (href=='visimisi') {
            his2='Vision and Mission';
        } else if (href=='contact') {
            his2='Contact Us';
        } else if (href=='link_web')
            his2='Santa Ursula Website';
        var content=$('#content_'+href).html();
        $('#content_about').html(content);
        $('#history').remove();
        $('#content_about #content_about_top').after(clone_his);
        if (href=='contact')
            about_us_input_hint();   
        var history = $('#history').html();
        if (history!=null) {
            var his = history.split(' &gt;&gt; ');
            var his_new = "";
            var count=0;
            while (count<his.length-1) {
               his_new+=his[count];
               count++;
               his_new+=" >> ";
            }
            $('#history').html(his_new+his2);
        }

        return false;
    }
    
    function about_us_input_hint() {
        $('#contact_us_form :input').focus(function()
        {
            if ($(this).val() == $(this)[0].title)
            {
                $(this).removeClass("defaultTextActive");
                $(this).val("");
            }
        });
        $('#contact_us_form :input').blur(function(srcc)
        {
            if ($(this).val() == "")
            {
                $(this).addClass("defaultTextActive");
                $(this).val($(this)[0].title);
            }
        });
        $('#contact_us_form :input').blur();
    }
	
</script>


