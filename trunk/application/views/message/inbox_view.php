<h3>Inbox</h3>
<div id="inbox">
    <?php 
    foreach ($inbox as $message) {
        echo $message['from_name'].'<br/>';
        echo $message['from_nickname'].'<br/>';
        echo $message['subject'].'<br/>';
        echo $message['message'].'<br/>';
        echo $message['date'];
    }
    ?>
</div>

<script>

</script>