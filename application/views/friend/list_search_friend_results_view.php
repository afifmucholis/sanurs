<?php
// ngambil search result
if ($search_total == 0) {
    echo "hasil pencarian kosong";
} else {
foreach ($search_results as $result) {
    ?>
    <div id="show_friends_wrapper">
        <div id="search_result_num">
            <?php echo $result['num']; ?>
        </div>
        <div id='friend_profpic'>
            <?php echo "<img src =' " . base_url() . $result['profpict_url'] . "' />"; ?>
        </div>
        <div id="show_info_wrapper" class="general_text">
            <div id ='friend_name'>
                <a class="link" href="../profile/user/<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a>
            </div>
            <div id ='friend_unityear'>
                <?php echo $result['unit'] . ' (' . $result['graduate_year'] . ')'; ?>
            </div>                
        </div>
        <div class="clearboth">
        </div>
        <hr/>
    </div>
    <?php
}
}
?>

<div id ="link_pagination"> 
    <?php echo $pagination; ?>
</div>
<div class="clearboth">
</div>