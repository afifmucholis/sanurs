<?php
    if (is_bool($all_news) || count($all_news) == 0) {
        echo "No Any News.<br/>";
    } else {
        if ($isadmin) {
        ?>
        <div id="news_div">
            <div id="content_news" class="description_img">
                <?php echo br(2);?>
                <div id="title_news">
                    <?php 
                        echo anchor('news/add_news', '+ Add News');
                    ?>
                </div>
            </div>
            <div class="clearboth"></div>
        </div>
        <?php
        }
        foreach ($all_news as $news) :
?>
        <div id="news_div">
            <?php 
                $content = str_get_html($news->content);
                $array_img = $content->find('img');
                if (count($array_img)!=0) {
                    $array_img[0]->width=100;
                    $array_img[0]->height=100;
                    $array_img[0]->style="float:left";
//                    echo $array_img[0];
                }
            ?>
            <div id="content_news" class="description_img">
                <div id="title_news">
                    <?php 
                        echo anchor('news/show_news/'.$news->id,$news->title); 
                    ?>
                </div>
                <div id="text_news">
                    <?php
                        if ($isadmin) {
                            $text = character_limiter($content->plaintext,50);
                        } else {
                            $text = character_limiter($content->plaintext,80);
                        }
                        echo $text;
                    ?>
                </div>
                <div id="link_show">
                    <?php 
                         echo anchor('news/show_news/'.$news->id,'See More');
                    ?>
                    <?php
                        if ($isadmin) {
                                echo br(1);
                                echo anchor('news/edit_news/'.$news->id, 'Edit News');
                                echo '&nbsp;&nbsp;';
                                echo anchor('news/delete_news/'.$news->id, 'Delete News', 'class="remove_news"');
                        }
                    ?>
                </div>
            </div>
            <div class="clearboth">
            </div>
        </div>
<?php
        endforeach;
    }
?>

<div class="clearboth">
</div>