<?php
foreach ($alumni as $people) :
    if ($people['is_registered'] == 0) {
        ?>
        <a href="#" id="id_<?php echo $people['id']; ?>" class="people_links" ><?php echo $people['name']; ?></a>
    <?php
    } else {
        echo $people['name'];
    }echo br(1);

endforeach;
?>

<div id="upload_popup" class ="popup">
    <a href="#" class="popupContactClose">x</a>
    <div id="form_birthdate">
    </div>
</div>
<div id="backgroundPopup"></div>

<script type="text/javascript">
    var id_click="";
    $(".people_links").click(function(){
        var array = this.id.split('_');
        var id_people = array[1];

        var link = '<?php echo site_url('sign_up/form_birthdate'); ?>';
        var form_data = {
            alum_id : id_people,
            name : $('#id_'+id_people).html(),
            ajax: '1'		
        };
        
        $.ajax({
            url: link,
            type: 'POST',
            data: form_data,
            success: function(msg) {
                $("#form_birthdate").html(msg.text);
                id_click =  "#upload_popup";
                //centering with css
                centerPopup();
                //load popup
                loadPopup();
            }
        });	
        
        return false;
    });
    $(".popupContactClose").click(function(){
        disablePopup();
    });
</script>
