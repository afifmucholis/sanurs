<div id="list_alumni">
<?php
foreach ($alumni as $people) :
    if ($people['is_registered'] == 0) {
        ?>
        <a href="#" id="id_<?php echo $people['id']; ?>" class="people_links" ><?php echo $people['name']; ?></a>
    <?php
    } else {
        echo $people['name'];
    }echo br(1);

endforeach;
?>
</div>
