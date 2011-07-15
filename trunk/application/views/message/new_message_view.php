<h3>New Message</h3>
<div id="new_message_form">
    <?php
        echo form_open('message/submit');
        echo form_label('Subject : ','subject')."<br/>";
        echo form_input('subject', '', 'id="subject"')."<br/>";
        echo form_label('To : ','to')."<br/>";
        echo form_input('to', '', 'id="to"')."<br/>";
        echo form_label('Message', 'message')."<br/>";
        echo form_textarea('message','Type your message here....')."<br/>" ;
        echo form_submit('submit', 'Submit', 'id="submit"');
        echo form_close();
    ?>
</div>

<script>
    $(function() {
		var projects = [
			{
				value: "jquery",
				label: "jQuery",
				desc: "the write less, do more, JavaScript library",
				icon: "jquery_32x32.png"
			},
			{
				value: "jquery-ui",
				label: "jQuery UI",
				desc: "the official user interface library for jQuery",
				icon: "jqueryui_32x32.png"
			},
			{
				value: "sizzlejs",
				label: "Sizzle JS",
				desc: "a pure-JavaScript CSS selector engine",
				icon: "sizzlejs_32x32.png"
			}
		];

		$( "#to" ).autocomplete({
			minLength: 0,
			source: projects,
			focus: function( event, ui ) {
				$( "#to" ).val( ui.item.label );
				return false;
			},
			select: function( event, ui ) {
				$( "#to" ).val( ui.item.label );
				return false;
			}
		})
		.data( "autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "item.autocomplete", item )
				.append( "<a>" + item.label + "<br>" + item.desc + "</a>" )
				.appendTo( ul );
		};
	});
</script>
