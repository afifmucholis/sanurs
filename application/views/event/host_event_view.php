<div id="hostevent_bg">
    <div class="hostevent_left" style="background-color: #ffffff">
        <div class="edit_profpic">
            <?php
            $image_properties = array(
                'src' => 'res/default.jpg',
                'alt' => 'No Photo Available',
                'class' => 'event_images',
                'id' => 'upload_image',
                'width' => '200',
                'height' => '200',
                'title' => 'No Photo Available',
                'rel' => 'lightbox',
            );
            echo img($image_properties);
            ?>
            <div class="edit_profpic_navig">
                <a id="edit_profpic_navig" href="#" class="popup_link">CHANGE PICTURE</a>
            </div>
        </div>
        <div class="clearboth"></div>
    </div>
    <div class="hostevent_right">
        <?php
        echo validation_errors(); //menampilkan pesan error form
        echo form_open('event/submit_event',array('id' => 'host_form'));
        echo form_hidden('url_img', base_url() . 'res/default.jpg');
        ?>
        <div>
            <div class="subtitle">EVENT INFORMATION</div>
            <table>
                <tr>
                    <td class="left-table"> <?php echo form_label('Title : ', 'title') . "<br/>"; ?> </td>
                    <td class="right-table"> <?php echo form_input('title', set_value('title'), 'id="title"') . "<br/>"; ?> </td>
                </tr>
                <tr>
                    <td class="left-table"> <?php echo form_label('When : ', 'when') . "<br/>"; ?> </td>
                    <td class="right-table"><div class="datepicker"> <?php echo form_input('when', set_value('when'), 'id="datepickers"') . "<br/>"; ?> </div></td>
                </tr>
                <tr>
                    <td class="left-table"> <?php echo form_label('Where : ', 'where') . "<br/>"; ?> </td>
                    <td class="right-table"> <?php echo form_input('where', set_value('where'), 'id="where"') . "<br/>"; ?> </td>
                </tr>
                <tr>
                    <td class="left-table"> <?php echo form_label('Contact Person : ', 'cp') . "<br/>"; ?> </td>
                    <td class="right-table"> <?php echo form_input('cp_name', '', 'id="cp_name"') . "<br/>"; ?> </td>
                </tr>
                <tr>
                    <td class="left-table"> <?php echo form_label('Contact Person HP : ', 'cp_hp') . "<br/>"; ?> </td>
                    <td class="right-table"> <?php echo form_input('cp_hp', '', 'id="cp_hp"') . "<br/>"; ?> </td>
                </tr>
                <tr>
                    <td class="left-table"> <?php echo form_label('Description : ', 'description') . "<br/>"; ?> </td>
                    <td class="right-table"> <?php echo form_input('description', set_value('description'), 'id="description"') . "<br/>"; ?> </td>
                </tr>
                <tr>
                    <td class="left-table"> <?php echo form_label('Select category for this event<br/>'); ?> </td>
                    <td class="right-table"> <?php echo form_dropdown('category_event', $category_list, set_value('category_event')); ?> </td>
                </tr>
            </table>
        </div>

        <div style="text-align: right; padding: 0px 20px 15px 0px">
            <?php echo form_submit('submit', 'Submit', 'id="submit"'); ?>
        </div>
        <?php
        echo form_close();
        ?>
    </div>
    <div class="clearboth"></div>
    <?php $this->load->view('popup/upload_image'); ?>
</div>

<script>
    $(document).ready(function() {   
        $("#host_form").validate({
            rules : {
                title : {
                    required : true
                },
                when : {
                    required : true
                },
                where : {
                    required : true
                },
                description : {
                    required : true
                }
            },
            messages : {
                title : "The title of the event is required",
                when  : "The time of the event is required",
                where : "The location of the event is required",
                description : "The description of the event is required"
            }
        });
        bind_forget_click();
    });
</script>