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
<p>Category : </p>
<?php
if ($search_name != "") {
    echo 'name : '.$search_name;
    echo br(1);
}
if ($search_year != "") {
    echo 'year : '.$search_year;
    echo br(1);
}
if ($interest != 'all') {
    echo 'interest : '.$interest;
    echo br(1);
}
if ($major != 'all') {
    echo 'major : '.$major;
    echo br(1);
}
echo br(1);
?>
<?php
// ngambil search result
foreach ($search_results as $result) {
    ?>
    <div id="result">
        <?php
        echo $result['profpict_url'];
        echo br(1);
        ?>
        <a href="../profile/user/<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a>
        <?php
        echo br(1);
        echo $result['unit'] . ' (' . $result['graduate_year'] . ')';
        echo br(2);
        ?>
    </div>
    <?php
}
?>
