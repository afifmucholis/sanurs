<?php
    $count=0;
    if ($isadmin) {
    ?>
    <div id="news_div" class="empty_news">
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
        $count++;
    }
    if (is_bool($all_news) || count($all_news) == 0) {
        ?>
        <div id="news_div">
            <div id="content_news" class="description_img">
                <?php echo br(2);?>
                <div id="title_news">
                    <?php 
                        echo "No news available";
                    ?>
                </div>
            </div>
            <div class="clearboth"></div>
        </div>
    <?php
        $count++;
    } else {
        foreach ($all_news as $news) :
?>
        <div id="news_div">
            <?php 
                $content = str_get_html($news->content);
                $array_img = $content->find('img');
                if (count($array_img)!=0) {
                    $array_img[0]->style="height: 150px; width: 325px; ";
                }
            ?>
            <?php
                if (count($array_img)!=0) {
                    echo $array_img[0];
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
                            $text = substr($content->plaintext,0,30);
                        } else {
                            $text = substr($content->plaintext,0,70);
                        }
                        echo $text.'...';
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
            $count++;
        endforeach;
    }
    
    if ($count<6) {
        for ($i=0;$i<6-$count;$i++) {
            ?>
            <div id="news_div" class="empty_news">
                <div id="content_news" class="description_img">
                <?php echo br(2);?>
                    <div id="title_news">
                        <?php 
                            echo 'No News Available';
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    
    
?>

<div class="clearboth">
</div>