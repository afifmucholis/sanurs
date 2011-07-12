<div id="left" style="float: left">
    <div id="link">
        <label><a href="basic_info" class="ajax-links">Basic Info</a></label>
        <label><a href="location" class="ajax-links">Location</a></label>
        <label><a href="education" class="ajax-links">Education</a></label>
        <label><a href="working" class="ajax-links">Working</a></label>
        <label><a href="visibility" class="ajax-links">Visibility</a></label>
    </div>
</div>
<div id="clearboth"></div>

<div id="content_edit">
    <?php $this->load->view($content_edit_view, $content_edit); ?>
</div>

<script type="text/javascript">
var edited_count = 0;
//$('#content_edit').click(function() {
//    edited_count++;
//    return false;
//});

$('a.ajax-links').click(function() {
        var ganti=true;
        if (edited_count!=0) {
            if (confirm("Save changes dulu ya gan!^ ^")) {
                edited_count=0;
            } else {
                ganti = false;
            }
        }
        if (ganti) {
            var link_click = $(this).attr("href");
            var link = '<?php echo site_url('profile/edit_');?>'+link_click;
            var form_data = {
                    ajax: '1'		
            };

            $.ajax({
                    url: link,
                    type: 'GET',
                    data: form_data,
                    success: function(msg) {
                       $('#content_edit').html(msg.text);
                       var his = $('#history').html().split('/');
                       var his2 = "";
                       var count=0;
                       while (count<his.length-1) {
                           his2+=his[count];count++;
                           his2+="/";
                       }
                       $('#history').html(his2+msg.struktur[2]["label"]);
                       if (link_click=='location')
                           initmap("editlocation");
                    }
            });
        }
	
	return false;
});

	
</script>

