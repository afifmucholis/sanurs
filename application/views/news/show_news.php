<div id="news">
    <?php
        if ($isadmin) {
            echo anchor('news/edit_news/'.$id_news, 'Edit this news');
            echo br(1);
        }
    ?>
    <div id="title_news">
        <h3><?php echo $title_news; ?></h3>
    </div>
    <div id="publishing_date">
        <?php echo $date;?>
    </div>
    <div id="content">
        <?php echo $content;?>
    </div>
</div>