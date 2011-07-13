<h3>Event</h3>
<div class="left-menu">
    <div id="slide_show_event">
        slide show event here<br/>
        <div id="gallery-event">
        </div>
        <?php echo anchor('event/show_event/2', 'Click to view this event'); ?>
    </div>
</div>

<div class="right-menu">
    <div id="col_right">
        <div id="sorting">
            <h4>Sort by : </h4>
            <?php
            if ($sortby == 'categories')
                echo '<b>'; echo anchor('event/sortby/categories', '- Categories');
            if ($sortby == 'categories')
                echo '</b>';
            ?><br/>
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
        <?php if ($this->session->userdata('name') == null) { ?>
            <p>Sign in first to view your personal calendar</p>
            <?php $this->load->view('sign_in_view'); ?>
            <?php
        } else {
            echo anchor('event/mycalendar', 'Click here to view my calendar');
        }
        ?>
    </div>
</div>
<div id="clearboth">
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            url : '<?php echo site_url(); ?>/event_gallery',
            type : 'POST',
            data : {},
            success : function(msg) {
                Galleria.loadTheme('<?php echo base_url(); ?>galleria-theme/classic/galleria.classic.min.js');
                $("#gallery-event").galleria({
                    //width: 600,
                    autoplay : 4000,
                    //lightbox : true,
                    height: 500,
                    dataSource : msg,
                    transition : 'fadeslide'
                });
            }
        });
        
    });
         
</script>