<div id="title-menu">Notification</div>
<?php
    if (count($notification)==0) {
        echo "<label class='general_text'>No new notifications.</label>";
    } else {
        foreach($notification as $notif) :
            echo "<label class='general_text>".$notif->date."</label>";
            echo br(1);
            echo "<label class='general_text>".$notif->message."</label>";
            if ($notif->link!='') {
                echo " ".anchor($notif->link,'Click Here','class="link" target="_blank"');
            }
            echo br(2);
        endforeach;
    }
?>
