<div id="new_message_form">
    <?php
    echo form_open('message/submit', array('id' => 'new_message'));
    echo form_label('Subject : ', 'subject') . "<br/>";
    echo form_input('subject', '', 'id="subject" title="Subject"') . "<br/>";
    echo form_label('To : ', 'to') . "<br/>";
    echo form_input('to', '', 'id="to" title="Recipient"');
    echo form_hidden('idto', '') . "<br/>";
    echo form_label('Message', 'message') . "<br/>";
    echo form_textarea('message','' ,'title="Type your message here..."') . "<br/>";
    echo form_submit('submit', 'Submit', 'id="submit"');
    echo form_close();
    ?>
</div>

<script>
    $(document).ready(function() {
        message_input_hint();
        $("#new_message").validate({
            rules : {
                to : {
                    required : true
                }
        }, //end rules
        messages : {
            to : {
                required : "This Field is required"
            }        
        }
    });  
});
   
$(function() {
    var friend_list = <?php echo $friend_list ?>;
    var link = "<?php echo site_url() ?>";
    var linknoindex = link.substr(0, link.length-9);
    $( "#to" ).autocomplete({ 
        minLength: 3,
        source:friend_list,
        autofocus : true,
        focus: function( event, ui ) {
            $( "#to" ).val( ui.item.label );
            return false;
        },
        select: function( event, ui ) {
            $( "#to" ).val( ui.item.label);
            $('input[name=idto]').attr('value', ui.item.value);
            return false;
        }
    })
		
    .data( "autocomplete" )._renderItem = function( ul, item ) {
        return $( "<li></li>" )
        .data( "item.autocomplete", item )
        .append("<a><div id='autocomplete'>"+"<img src='"+linknoindex+item.profpict_url+" '/> " +"<div id='label'> "+item.label+"</div>" + "<div id='nickname'>"+"("+item.nickname +")"+ "</div>"+"</div></a><hr>")
        .appendTo( ul );
    };
});

function message_input_hint() {
        $('#new_message_form :input').focus(function()
        {
            if ($(this).val() == $(this)[0].title)
            {
                $(this).removeClass("defaultTextActive");
                $(this).val("");
            }
        });
        $('#new_message_form :input').blur(function(srcc)
        {
            if ($(this).val() == "")
            {
                $(this).addClass("defaultTextActive");
                $(this).val($(this)[0].title);
            }
        });
        $('#new_message_form :input').blur();
    }
</script>