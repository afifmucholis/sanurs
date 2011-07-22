<?php
    if (is_bool($all_news) || count($all_news) == 0) {
        echo "No Any News.<br/>";
    } else {
        foreach ($all_news as $news) :
?>
            <div id="title_news">
                <h4><?php echo anchor('news/show_news/'.$news->id,$news->title); ?></h4>
            </div>
            <div id="publishing_date">
                <?php echo $news->publishing_date;?>
            </div>
            <div id="content">
                <?php 
                    $content = str_get_html($news->content);
                    $array_img = $content->find('img');
                    if (count($array_img)!=0) {
                        $array_img[0]->width=100;
                        $array_img[0]->height=100;
                        ?>
                <div id="img_news" style="float:left;">
                <?php
                        echo $array_img[0];
                    }
                    $text = word_limiter($content->plaintext,50);
                    ?>
                </div>
                <div id="text_news" style="float:left; display: inline;">
                    <?php
                    echo $text;
                ;?>
                </div>
                <div id="clearboth">
                </div>
                <div id="link_show">
                    <?php echo anchor('news/show_news/'.$news->id,'Read More');?>
                </div>
            </div>
<?php
        endforeach;
    }
?>

<div id ="link_pagination"> 
    <?php echo $pagination; ?>
</div>
<div id="clearboth">
</div>