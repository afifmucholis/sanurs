<div>
    <div id="title-menu">Event</div>
    <div class="event-left-menu">
        <div id="slide_show_event">
            <div id="gallery-event">
            </div>
            <label class="general_text">Click Picture in Slide Show to view the event</label>
        </div>
    </div>

    <div class="event-right-menu">
        <div id="sorting">
            <label class="impact20">SORT BY : </label> <br/>
            <div class="sort-category">
                &raquo; <a href="#" id="categories_click" class="notactive-event-link">Categories</a>
                <div id="tree_categories">
                    <?php
                    //echo anchor('event/sortby/categories', '- Categories');
                    if (isset($categories) && $categories != "") {
                        foreach ($categories as $cat) :
                            if ($current_categories != $cat['label'])
                                echo '&nbsp;&nbsp;&nbsp;&raquo; <a class="notactive-event-link" href="' . $cat['link'] . '">' . $cat['label'] . '</a>';
                            else
                                echo '&nbsp;&nbsp;&nbsp;&raquo; <a class="active-event-link" href="' . $cat['link'] . '"><b>' . $cat['label'] . '</b></a>';
                            echo br(1);
                        endforeach;
                    }
                    ?>
                </div>
                <?php
                if ($sortby == 'number') {
                    echo "<b>&raquo ".anchor('event/sortby/number', 'Number of people Attending', 'class="active-event-link"')."</b>";
                } else {
                    echo '&raquo '.anchor('event/sortby/number', 'Number of people Attending', 'class="notactive-event-link"');
                }
                ?><br/>
                <?php
                if ($sortby == 'upcoming') {
                    echo '<b>&raquo '.anchor('event/sortby/upcoming', 'Upcoming Events', 'class="active-event-link"').'</b>';
                } else {
                    echo '&raquo '.anchor('event/sortby/upcoming', 'Upcoming Events', 'class="notactive-event-link"');
                }
                ?><br/>
            </div>
        </div>

        <?php echo br(1); ?>
        <div class="link-other-event">
            <div id="link_host_event">
                <?php echo anchor('event/host', 'HOST AN EVENT', "class='link_arialblack17'") . "&nbsp;&nbsp;&nbsp;"; ?>
            </div>
            <?php echo br(1); ?>
            <?php if ($this->session->userdata('name') == null) { ?>
                <p>Sign in first to view your personal calendar</p>
                    <div class="login-box-home-event">
                        <?php $this->load->view('sign_in/sign_in_view'); ?>
                    </div>
                <?php
            } else {
                echo anchor('event/mycalendar', 'VIEW YOUR CALENDAR', "class='link_arialblack17'");
            }
        ?>
        </div>
    </div>
</div>
<div class="clearboth"> </div>

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
                                txt += '&nbsp;&nbsp;&nbsp;&raquo; <a class="notactive-event-link" href="';
                                txt += value.link;
                                txt += '">';
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