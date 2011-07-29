<div id="content_about_top">
    <div id="three_photo">
        <ul class="img_holder">
            <li><div class="thumb"><span><img src="<?php echo base_url() . 'res/desain/img_1.jpg' ?>" title="image1" /></span></div></li>
            <li class="pad_left"><div class="thumb"><span><img src="<?php echo base_url() . 'res/desain/img_2.jpg' ?>" title="image2" /></span></div></li>
            <li><div class="thumb"><span><img src="<?php echo base_url() . 'res/desain/img_3.jpg' ?>" title="image3" /></span></div></li>
        </ul>
    </div>
    <div class="clearboth"></div>
</div>
<div id="content_about_wrap">
    <div id="content_about_left">
        <h3>SMA ST. URSULA</h3>
        <p>
            Visi :
            Menjadi Komunitas Pembelajar yang kritis, kreatif dan inovatif serta mampu mengintegrasikan iman dan nilai-nilai kemanusiaan

            Misi :
            1. Menciptakan suasana yang kondusif bagi komunitas untuk belajar terus-
            menerus. 
            2. Mengembangkan potensi akademik dan keterampilan dengan memanfaatkan 
            ilmu pengetahuan dan teknologi. 
            3. Mengasah hati nurani sehingga anggota komunitas dapat hidup jujur, disiplin 
            dan bertanggung jawab. 
            4. Mengembangkan religiositas dan nilai-nilai kemanusiaan sehingga anggota 
            komunitas dapat lebih menghayati imannya serta menghargai pluralitas masyarakat. 
            5. Menumbuhkembangkan kepedulian terhadap lingkungan dan sesama atas 
            dasar kesetaraan gender dalam semangat Serviam. 
            6. Membekali dan mempersiapkan para siswa untuk melanjutkan pendidikan ke 
            jenjang yang lebih tinggi. 
        </p>
        <br/><br/>
        <hr/>
    </div>
</div>
<div class="clearboth"></div>

<script>
$(document).ready(function() {
	
	$("ul.img_holder li").hover(function() { //On hover...
		
		var thumbOver = $(this).find("img").attr("src"); //Get image url and assign it to 'thumbOver'
		
		//Set a background image(thumbOver) on the &lt;a&gt; tag 
		$(this).find(".thumb").css({'background' : 'url(\'' + thumbOver + '\') no-repeat center bottom'});
		//Fade the image to 0 
		$(this).find("span").stop().fadeTo('normal', 0 , function() {
			$(this).hide() //Hide the image after fade
		}); 
	} , function() { //on hover out...
		//Fade the image to 1 
		$(this).find("span").stop().fadeTo('normal', 1).show();
	});

});

   
</script>