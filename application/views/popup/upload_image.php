<div id ="upload_popup" class ="popup">
    <div class="popup_title">
        Upload an image from your computer (Max size 1 MB)
    </div>
    <?php echo form_open_multipart('event/upload_picture','id="upload_form"'); ?>
    <div class="popup_main_content">
        <?php
            
            $data = array(
                  'id'        => 'userfile',
                  'name'        => 'userfile',
                  'size'        => '20',
                );
            echo form_upload($data);
            echo br(1);
            $data = array(
                  'id'=> 'submit_image',
                  'value'=>'Submit',
                  'name'=>'submit_image'
                );
            ?>
            <iframe id="upload_target" name="upload_target" src="" style="width:0;height:0;border:0px solid #fff;"></iframe>
            <?php
        ?>
    </div>
    <div class="popup_footer">
        <?php 
            echo form_submit($data);
            echo form_close(); 
        ?>
        <input type="button" name="cancel" value="Cancel" class="popupContactClose"></input>
    </div>
</div>
<div id="backgroundPopup"></div>

<script type="text/javascript">
    //CLOSING POPUP
    //Click the x event!
    $(".popupContactClose").click(function(){
            disablePopup();
    });

    //Click out event!
    $("#backgroundPopup").click(function(){
            disablePopup();
    });

    //Click out event! submit clicked
    $("#submit_image").click(function(){
            disablePopup();
            sendData();
    });
    function sendData() {
       document.getElementById('upload_form').onsubmit=function() {
		document.getElementById('upload_form').target = 'upload_target'; //'upload_target' is the name of the iframe
                document.getElementById("upload_target").onload = uploadDone; //This function should be called when the iframe has compleated loading
			// That will happen when the file is completely uploaded and the server has returned the data we need.
	}
    }
    
    function uploadDone() { //Function will be called when iframe is loaded
            var ret = frames['upload_target'].document.getElementsByTagName("pre")[0].innerHTML;
            var data = eval('('+ret+')');
            if (data.status!=0) {
                $('#upload_image').attr('src', data.src);
                $('input[name=url_img]').attr('value', data.src);
                $('input[name=url_img]').change();
            } else {
                alert('Upload error : '+data.error);
            }
    }
</script>