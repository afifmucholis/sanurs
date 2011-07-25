<h3>About Us</h3>
<div id="link">
    <label><a href="history" class="ajax-links">History</a></label>
    <label><a href="visimisi" class="ajax-links">Vision and Mission</a></label>
    <label><a href="contact" class="ajax-links">Contact Us</a></label>
    <label><a href="link_web" class="ajax-links">Santa Ursula Website</a></label>
</div>
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
        about_us_nav('history');
    });
 
    function about_us_nav_binding() {
        $('#link')
            .find('a.ajax-links')
            .unbind('click.nav')
            .bind('click.nav', function(){
                return about_us_nav($(this).attr('href'));
            });
    }
    
    function about_us_nav(val) {
        var href=val;
        var his2 = '';

        if (href=='history')
            his2='History';
        else if (href=='visimisi')
            his2='Vision and Mission';
        else if (href=='contact')
            his2='Contact Us';
        else if (href=='link_web')
            his2='Santa Ursula Website';
        var content=$('#content_'+href).html();

        $('#content_about').html(content);
        var his = $('#history').html().split('/');
        var his_new = "";
        var count=0;
        while (count<his.length-1) {
           his_new+=his[count];count++;
           his_new+="/";
        }
        $('#history').html(his_new+his2);

        return false;
    }
	
</script>


