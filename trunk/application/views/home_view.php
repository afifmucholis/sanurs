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
<div id="home-bottom">
    <div id="title-menu">RECENT NEWS</div>
    <div class="recent-news-home">
        <div id="news-slideshow-area">
            <div id="news-slideshow-scroller">
                <div id="news-slideshow-holder">
                    <?php
                        if (!is_bool($recent_news) && count($recent_news)!=0) {
                            foreach($recent_news as $news) :
                    ?>
                    <div class="news-slideshow-content">
                        <div id="news_div">
                            <div id="content_news" class="description_img">
                                <?php
                                    $content = str_get_html($news->content);
                                    $array_img = $content->find('img');
                                    if (count($array_img)!=0) {
                                        $array_img[0]->style="float:left;min-height: 180px;min-width: 180px; max-height: 200px; max-width: 200px; margin-right:20px;";
                                        echo $array_img[0];
                                    }
                                        
                                ?>
                                <div id="title_news">
                                    <?php 
                                        echo $news->title;
                                    ?>
                                </div>
                                <div id="text_news">
                                    <?php
                                        $text = substr($content->plaintext,0,250);
                                        echo $text.'...';
                                    ?>
                                </div>
                                <div id="link_show">
                                    <?php 
                                         echo anchor('news/show_news/'.$news->id,'See More');
                                    ?>
                                </div>
                            </div>
                            <div class="clearboth"></div>
                        </div>
                    </div>
                    <?php 
                            endforeach;
                        } 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="clearboth">
</div>

<script>
    var interval_id = 0;
    var dir='right';
    var totalSlides = 0;
    var currentSlide = 1;
    var contentSlides = "";

$(document).ready(function(){
    var totalWidth = 0;
    contentSlides = $(".news-slideshow-content");
    contentSlides.each(function(i){
        totalWidth += this.clientWidth;
        totalSlides++;
    });
    $("#news-slideshow-holder").width(totalWidth);
    $("#news-slideshow-scroller").attr({scrollLeft: 0});
    interval_id = setInterval(slideIt,9000);
});

function slideIt(){
  if (currentSlide==1)
      dir='right';
  if (currentSlide==totalSlides-1)
      dir='left';
  if (dir=='right')
      currentSlide++;
  else
      currentSlide--;
  updateContentHolder();
}

function updateContentHolder()
{
  var scrollAmount = 0;
  contentSlides.each(function(i){
    if(currentSlide - 1 > i) {
      scrollAmount += this.clientWidth;
    }
  });
  $("#news-slideshow-scroller").animate({scrollLeft: scrollAmount}, 1000);
}


</script>