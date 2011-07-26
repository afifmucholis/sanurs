<h3>Find a Friend - Search Results : 
    <?php
    $num = count($search_results);
    echo $num;
    if ($num > 1) {
        echo ' results';
    } else {
        echo ' result';
    }
    ?></h3>
Category : <br/>
<?php
if ($search_name != "") {
    echo 'name : ' . $search_name;
    echo br(1);
}
if ($search_year != "") {
    echo 'year : ' . $search_year;
    echo br(1);
}
echo 'interest : ' . $interest;
echo br(1);
echo 'major : ' . $major;
echo br(1);
echo br(1);
?>
<?php
// ngambil search result
foreach ($search_results as $result) {
    ?>
    <div id="show_friends_wrapper">
        <div id='friend_profpic'>
            <?php echo "<img src =' " . base_url() . $result['profpict_url'] . "' />"; ?>
        </div>
        <div id="show_info_wrapper">
            <div id ='friend_name'>
                <a href="../profile/user/<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a>
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
?>
