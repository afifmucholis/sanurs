<?php
if (count($search_result) == 0) {
    echo "No Result for your search.<br/>";
} else {
    foreach ($search_result as $result) :
        ?>
        <a href="<?php echo base_url().'/index.php/'. $result['link']; ?>">
            <div id="single_search_wrapper">
                <div id="category_search">
                    <?php echo $result['category']; ?>
                </div>
                <div id="title_search">
                    <?php echo $result['title']; ?>     
                </div>
                <?php 
                    if ($result['category']=='News') {
                        ?>
                            <div id="content_search">
                            <?php 
                                $content = str_get_html($result['content']);
                                $array_img = $content->find('img');
                                if (count($array_img)!=0) {
                                    $array_img[0]->width=100;
                                    $array_img[0]->height=100;
                                    $array_img[0]->style="float:left";
                                }
                            ?>
                            <div id="text_search" style="float:left;">
                                <?php
                                    $text = word_limiter($content->plaintext,50);
                                    echo $array_img[0];
                                    echo $text;
                                ?>
                            </div>
                            <div class="clearboth">
                            </div>
                        </div> 
                <?php
                    } else {
                        ?>
                    <div id="content_search">
                        <div id="image_event_search">
                            <img src="<?php echo base_url().$result['image'];?>" style="float: left">
                        </div>
                            <?php 
                              echo $result['content'];  
                            ?>
                            <div class="clearboth">
                            </div>
                        </div>
                    <?php
                    }
                ?>
            </div>
        </a>
        <?php
        echo br(1);
        echo '<hr>';
    endforeach;
}
?>

<ul id="link_pagination"> 
    <?php echo $pagination; ?>
</ul>

<div class="clearboth">
</div>