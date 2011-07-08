<?php
    foreach ($alumni as $people) :
        echo anchor('profile/user/'.$people['id'], $people['name']);
        echo br(1);
    endforeach;
?>
