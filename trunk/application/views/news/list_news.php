<?php
    if (is_bool($all_news) || count($all_news) == 0) {
        echo "No Any News.<br/>";
    } else {
        foreach ($all_news as $news) :
?>
        <div id="news_div">
            <div id="title_news">
                <h4><?php echo anchor('news/show_news/'.$news->id,$news->title); ?></h4>
            </div>
            <?php
                if ($isadmin) {
                    echo anchor('news/edit_news/'.$news->id, 'Edit News');
                    echo '&nbsp;&nbsp;';
                    echo anchor('news/delete_news/'.$news->id, 'Delete News', 'class="remove_news"');
                    echo br(1);
                }
            ?>
            <div id="publishing_date">
                <?php echo $news->publishing_date;?>
            </div>
            <div id="content_news">
                <?php 
                    $content = str_get_html($news->content);
                    $array_img = $content->find('img');
                    if (count($array_img)!=0) {
                        $array_img[0]->width=100;
                        $array_img[0]->height=100;
                        $array_img[0]->style="float:left";
                    }
                ?>
                <div id="text_news" style="float:left;">
                    <?php
                        $text = word_limiter($content->plaintext,50);
                        echo $array_img[0];
                        echo $text;
                    ?>
                    <div id="link_show">
                        <?php echo anchor('news/show_news/'.$news->id,'Read More');?>
                    </div>
                </div>
                <div class="clearboth">
                </div>
            </div>
        </div>
        <br/>
<?php
        endforeach;
    }
?>

<ul id="link_pagination"> 
    <?php echo $pagination; ?>
</ul>
<div id="clearboth">
</div>