<div id="title-menu">Event</div>
<div class="left-menu">
    <div id="slide_show_event">
        <div id="gallery-event">
        </div>
        <p>Click Picture in Slide Show to view the event</p>
    </div
</div>

<div class="right-menu">
    <div id="col_right">
        <div id="sorting">
            <h4>Sort by : </h4>
            <a href="#" id="categories_click">- Categories</a>
            <div id="tree_categories"><?php
//echo anchor('event/sortby/categories', '- Categories');
if (isset($categories) && $categories != "") {
    foreach ($categories as $cat) :
        if ($current_categories != $cat['label'])
            echo '&nbsp;&nbsp;&nbsp;<a href="' . $cat['link'] . '">- ' . $cat['label'] . '</a>';
        else
            echo '&nbsp;&nbsp;&nbsp;<a href="' . $cat['link'] . '"><b>- ' . $cat['label'] . '</b></a>';
        echo br(1);
    endforeach;
}
?></div>
            <?php
            if ($sortby == 'number')
                echo '<b>'; echo anchor('event/sortby/number', '- Number of people Attending');
            if ($sortby == 'number')
                echo '</b>';
            ?><br/>
                <?php
                if ($sortby == 'upcoming')
                    echo '<b>'; echo anchor('event/sortby/upcoming', '- Upcoming Events');
                if ($sortby == 'upcoming')
                    echo '</b>';
                ?><br/>
        </div>
        <?php echo br(3); ?>
        <div id="link_host_event">
            <?php echo anchor('event/host', 'Host an event') . "&nbsp;&nbsp;&nbsp;"; ?>
        </div>
        <?php echo br(3); ?>
        <?php if ($this->session->userdata('name') == null) { ?>
            <p>Sign in first to view your personal calendar</p>
            <?php $this->load->view('sign_in/sign_in_view'); ?>
            <?php
        } else {
            echo anchor('event/mycalendar', 'Click here to view my calendar');
        }
        ?>
    </div>
</div>
<div class="clearboth">
</div>

<script>
    var data_categories;
    $(document).ready(function() {
        data = [];
        $.ajax({
            url : '<?php echo site_url(); ?>/event_gallery',
            type : 'POST',
            data : {sortby:'<?php echo $sortby ?>'<?php if (isset($categories) && $categories != "")
            echo ", category:'" . $current_categories_id . "'"; ?>},
            success : function(msg) {
                data=msg;
                Galleria.loadTheme('<?php echo base_url(); ?>galleria-theme/classic/galleria.classic.min.js');
                $("#gallery-event").galleria({
                    //width: 600,
                    autoplay : 4000,
                    //lightbox : true,
                    height: 500,
                    dataSource : data,
                    transition : 'fadeslide'
                });
            }
        });
        
        // get all categories
        getCategories();
        // set function click categories
        $('#categories_click').click(function (){
            return categories_click();
        });
    });
    
    function getCategories() {
        $.ajax({
            url : '<?php echo site_url('event/show_categories'); ?>',
            type : 'POST',
            data : {},
            success : function (msg) {
                var txt = "";
                jQuery.each(msg.text, function(key, value){
                    txt += '&nbsp;&nbsp;&nbsp;<a href="';
                    txt += value.link;
                    txt += '">- ';
                    txt += value.label;
                    txt += '</a>';
                    txt += '<br/>';
                });
                data_categories = txt;
            }
        });
    }
    
    function categories_click() {
        var text = $('#tree_categories').html();
        if (text=='') {
            $('#tree_categories').html(data_categories);
        } else {
            $('#tree_categories').html('');
        }
        return false;
    }
</script>