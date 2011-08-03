<div id="title-menu">Event</div>
<div class="showevent-left-menu">
    <div class="profile-black-wrapper">
        <div class="edit_profpic">
            <?php
            $image_properties = array(
                'src' => $data_event['url_image'],
                'class' => 'profpic_images',
                'id' => 'upload_image',
                'rel' => 'lightbox',
                'style' => 'max-width:365px'
            );
            echo img($image_properties);
            ?>
        </div>
    </div>
</div>

<div class="showevent-right-menu">
    <div id="event-info">
        <div id="event-title" class="impact25">
            <?php
            echo $data_event['title'];
            ?>
        </div> <br/>

        <div id="event-detail" class="general_text">
            <table style="margin-left: -3px;">
                <?php
                echo "<tr> <td class='title-information'>";
                echo "Location" . "</td> <td>";
                echo $data_event['where'] . "</td></tr>";
        
                echo "<tr> <td class='title-information'>";
                echo "Time" . "</td> <td>";
                echo $data_event['when'] . "</td></tr>";
                
                echo "<tr> <td class='title-information'>";
                echo "Description" . "</td> <td>";
                echo $data_event['description'] . "</td></tr>";
                
                if ($data_event['cp']['name'] != '') {
                    echo "<tr> <td class='title-information'>";
                    echo "Contact Person" . "</td> <td>";
                    echo $data_event['cp']['name'] . " - " . $data_event['cp']['telp']."</td></tr>";
                }
                ?>
                </table>
                <?php
                if ($data_event['cp']['name'] != '') {
                    echo "Please contact " . $data_event['cp']['name'] . " to purchase tickets<br/>";
                }
                echo "<br/>";
                echo "Number of people attending so far: ";
                echo "<label id=\"number_attending\">";
                echo $data_event['attending'] . "</label>";
                ?>
            <br/>
            <div id="people_attending"><?php
            foreach ($data_event['list_attending'] as $people) :
                echo anchor('profile/user/' . $people['user_id'], $people['name'], 'class="people_links" style="color:white;"');
                echo "<br/>";
            endforeach;
            ?>
            </div>
            <br/>
            <div id="status_rsvp"><?php
                if ($data_event['rsvp'] == 1) {
                    echo "RSVP :  ";
                    echo form_button('attending', 'Attending', 'id="attending" onclick="javascript:RSVPEvent(\'' . $data_event['event_id'] . '\',\'1\')"');
                    echo "   ";
                    echo form_button('not_attending', 'Not Attending', 'id="not_attending" onclick="javascript:RSVPEvent(\'' . $data_event['event_id'] . '\',\'2\')"');
                } else if ($data_event['rsvp'] == 2) {
                    echo "RSVP: Attending";
                } else if ($data_event['rsvp'] == 3) {
                    echo "RSVP: Not Attending";
                }
            ?>
            </div>
        </div>
    </div>
</div>
<div class="clearboth"></div>

<script type="text/javascript">
    function RSVPEvent(event_id, val) {
        var link = '<?php echo site_url('event/rsvp'); ?>';
        var form_data = {
            id : event_id,
            type : val,
            ajax: '1'		
        };

        $.ajax({
            url: link,
            type: 'POST',
            data: form_data,
            success: function(msg) {
                if (msg.success==1) {
                    var href = '<a class="people_links_white" href="';
                    href += msg.link;
                    href += '">';
                    href += msg.name;
                    href += '</a><br/>';
                    if (val==1)
                        $('#people_attending').append(href);
                    $('#status_rsvp').html(msg.status);
                    $('#number_attending').html(msg.count);
                }
            }
        });
    }
    
</script>