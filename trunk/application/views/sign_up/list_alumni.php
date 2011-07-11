<?php
    foreach ($alumni as $people) :
        echo anchor('sign_up/verification/'.$people['id'], $people['name']);
        echo br(1);
    endforeach;
?>

<?php $this->load->view('popup/verify_birthdate', $user_data); ?>
