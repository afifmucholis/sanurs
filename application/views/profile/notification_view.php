<h3>Notification</h3>
<?php
    if (count($notification)==0) {
        echo "No new notifications.";
    } else {
        foreach($notification as $notif) :
            echo $notif->date;
            echo br(1);
            echo $notif->message;
            if ($notif->link!='') {
                echo " ".anchor($notif->link,'Click Here');
            }
            echo br(1);
        endforeach;
    }
?>
