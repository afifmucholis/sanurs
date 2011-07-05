<h3>Events</h3>
<div id="col_left" style="float: left;">
    <?php
        echo "Name of event : ".$data_event['title']."<br/>";
        echo "Where : ".$data_event['where']."<br/>";
        echo "When : ".$data_event['when']."<br/>";
        echo "Description : ".$data_event['description']."<br/>";
        echo "Contact Person : ";
        echo $data_event['cp']['name']." - ".$data_event['cp']['telp']."<br/>";
        echo "Please contact ".$data_event['cp']['name']." to purchase tickets<br/>";
        echo "Number of people attending so far: ".$data_event['attending'].".<br/>";
        foreach ($data_event['list_attending'] as $people) :
            echo anchor('profile/'.$people['user_id'],$people['name']);
            echo "<br/>";
        endforeach;
        if ($data_event['rsvp']==1) {
            echo form_open('event/rsvp');
            echo form_hidden('user_id', $this->session->userdata('user_id'));
            echo form_hidden('event_id', $data_event['event_id']);
            echo form_submit('submit', 'Submit', 'id="submit"');
        } else if ($data_event['rsvp']==2) {
            echo "RSVP-ed already";
        }
    ?>
</div>
<div id="col_right" style="float: right;">
    <?php echo $data_event['url_image'];?>
</div>