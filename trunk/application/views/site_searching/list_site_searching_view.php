<?php
if (count($search_result) == 0) {
    echo "No Result for your search.<br/>";
} else {
    foreach ($search_result as $result) :
        ?>
        <div id="single_news_wrapper">
           <?php echo $result['category']; ?>
           <?php echo $result['title']; ?>
           <?php echo $result['link']; ?>
        </div>
        <?php
        echo br(1);
    endforeach;
}
?>

<ul id="link_pagination"> 
    <?php echo $pagination; ?>
</ul>

<div class="clearboth">
</div>