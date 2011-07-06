<div id ="upload_popup" class ="popup">
    <a href="#" class="popupContactClose">x</a>
    <h2>Upload an image from your computer</h2>
    <?php
        echo form_open_multipart('event/upload_picture','id="upload_form"');
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
        echo form_submit($data);
        ?>
        <iframe id="upload_target" name="upload_target" src="" style="width:0;height:0;border:0px solid #fff;"></iframe>
        <?php
        echo form_close();
    ?>
</div>
<div id="backgroundPopup"></div>

<script type="text/javascript">
    function sendData() {
       document.getElementById('upload_form').onsubmit=function() {
		document.getElementById('upload_form').target = 'upload_target'; //'upload_target' is the name of the iframe
                document.getElementById("upload_target").onload = uploadDone; //This function should be called when the iframe has compleated loading
			// That will happen when the file is completely uploaded and the server has returned the data we need.
	}
    }
    
    function uploadDone() { //Function will be called when iframe is loaded
            var ret = frames['upload_target'].document.getElementsByTagName("body")[0].innerHTML;
            var data = ret; //Parse JSON 
            if (data!=0) {
                $('#upload_image').attr('src', data);
            } else {alert('Upload error');}
    }
</script>