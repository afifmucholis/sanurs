<h3>Find a Friend - Search Results</h3>
<?php
foreach ($search_results as $result) {
    ?>
<div>
    <?php
    echo $result->profpict_url;
    echo br(1);
    echo $result->name;
    echo br(1);
    echo $result->graduate_year;
    echo br(2);
    ?>
</div>
<?php
}
?>
<?php if ($search_name!="" && $search_year!="") { ?>
    <p>You search for "<b><?php echo $search_name;?></b>", graduation year <b><?php echo $search_year;?></b> and has interest in <b><?php echo $interest;?></b> has matched <b><?php echo count($search_result);?></b> result(s).</p>
<?php } else if ($search_name!="") { ?>
    <p>You search for "<b><?php echo $search_name;?></b>" and has interest in <b><?php echo $interest;?></b> has matched <b><?php echo count($search_result);?></b> result(s).</p>
<?php } else if ($search_year!="") {?>
    <p>You search for people who has graduation year <b><?php echo $search_year;?></b> and has interest in <b><?php echo $interest;?></b> has matched <b><?php echo count($search_result);?></b> result(s).</p>
<?php } else { ?>
    <p>You search for people who has interest in <b><?php echo $interest;?></b> has matched <b><?php echo count($search_result);?></b> result(s).</p>
<?php } 
    echo br(2);
    foreach ($search_result as $result) {
        ?>
    <div id="result">
        <div id="profpic">
            <?php echo $result['user_data']['image'];?>
        </div>
        <?php echo br(1);?>
        <div id="info">
            <?php $this->load->view('profile/user_info',$result); ?>
        </div>
        <?php echo br(1);?>
    </div>
        <?php
    }
?>



