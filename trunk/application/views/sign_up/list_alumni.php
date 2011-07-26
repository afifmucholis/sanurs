<div id="list_alumni">
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
</div>
<div id="upload_popup" class ="popup">
    <div id="form_birthdate">
    </div>
</div>
<div id="backgroundPopup"></div>

<script type="text/javascript">
    var id_click="";

    $(document).ready(function(){
         bind_name_click();
    });    
    
    function bind_name_click() {
        $('#list_alumni')
            .find('.people_links')
            .unbind('click.popup')
            .bind('click.popup', function(){
                var array = this.id.split('_');
                var id_people = array[1];
                var name_people = $('#id_'+id_people).html();
                name_click(id_people,name_people);
            });
    }
    
    function name_click(id, name) {
        var id_people = id;
        var name_people = name;

        var link = '<?php echo site_url('sign_up/form_birthdate'); ?>';
        var form_data = {
            alum_id : id_people,
            name : name_people,
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
    }
</script>
