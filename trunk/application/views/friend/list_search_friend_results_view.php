<?php
// ngambil search result
if ($search_total == 0) {
    echo "<div id='title-menu'>No Result for your search.<br/></div>";
} else {
    foreach ($search_results as $result) {
        ?>
        <a class="search_result_divlink" href="<?php echo site_url('profile/user/' . $result['id']); ?>">
            <div id="single_search_wrapper" class="general_text">
                <div id="search_result_num" style="color:black; text-decoration: none;">
                    <?php echo $result['num']; ?>
                </div>
                <div id='friend_profpic'>
                    <?php echo "<img src =' " . base_url() . $result['profpict_url'] . "' />"; ?>
                </div>
                <div id="show_info_wrapper" style="color:black;">
                    <div id ='friend_name'>
                        <b><?php echo $result['name']; ?></b>
                    </div>
                    <div id ='friend_unityear'>
                        <?php echo $result['unit'] . ' (' . $result['graduate_year'] . ')'; ?>
                    </div>                
                </div>
                <div class="clearboth"></div>
                <hr/>
            </div>
        </a>
        <?php
    }
}
?>

<div id ="link_pagination"> 
    <?php echo $pagination; ?>
</div>
<div class="clearboth"></div>