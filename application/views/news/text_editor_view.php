<?php
    echo form_open('news/submit_news','id="editor_text_news"');
    if (isset($id_news) && $id_news!='')
        echo form_hidden('id_news',$id_news);
?>
    <div id="title_editor_news">
        <?php
            echo form_label('Title : ');
            $title='';
            if (isset($old_title) && $old_title!='')
                $title = $old_title;
            echo form_input('title',$title,'id="title_field"');
        ?>
    </div>
    
    <div id="text_editor">
        <textarea id="area1" name="area1_text">
            <?php
                if (isset($old_news) && $old_news!='')
                    echo $old_news;
            ?>
        </textarea>
    </div>
    <div id="submit_button">
        <?php
            echo form_submit('submit','Submit');
        ?>
    </div>
<?php
    echo form_close();
?>

<script>
    $('input[type=submit]').bind('click', function () {
       for (var i = 0; i < nicEditors.editors.length; i++) {
           nicEditors.editors[i].nicInstances[0].saveContent(); 
       }
    });
    $('#editor_text_news').validate(
        {
            rules : {
                title : {
                    required : true
                },
                area1_text : {
                    required : true
                }
            },
            messages : {
                title : "Title cannot be blank.",
                area1_text : "Please fill in the content"
            }
        }
    );
</script>