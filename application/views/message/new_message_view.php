<h3>New Message</h3>
<div id="new_message_form">
    <?php
    echo form_open('message/submit');
    echo form_label('Subject : ', 'subject') . "<br/>";
    echo form_input('subject', '', 'id="subject"') . "<br/>";
    echo form_label('To : ', 'to') . "<br/>";
    echo form_input('to', '', 'id="to"') . "<br/>";
    echo form_label('Message', 'message') . "<br/>";
    echo form_textarea('message', 'Type your message here....') . "<br/>";
    echo form_submit('submit', 'Submit', 'id="submit"');
    echo form_close();
    ?>
</div>

<script>
    var friendlist;
    function a() {
        $.ajax({
            url : '<?php echo site_url(); ?>/friend_list/getFriendList',
            type : 'POST',
            data : {user_id:'<?php echo $this->session->userdata('user_id'); ?>'},
            success : function(msg) {
                friendlist=msg;
            }
        });
    }
    
    $(document).ready(function() {
        a();
        alert(friendlist);
        $( "#to" ).autocomplete({
            minLength: 0,
            
            source: friendlist,
            focus: function( event, ui ) {
                $( "#to" ).val( ui.item.name );
                return false;
            },
            select: function( event, ui ) {
                $( "#to" ).val( ui.item.name );
                return false;
            }
        })
        .data( "autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append( "<a>" + item.name + "<br>" + item.email + "</a>" )
            .appendTo( ul );
        };
    }); 
</script>
