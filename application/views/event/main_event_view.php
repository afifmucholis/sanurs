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
    var data = [
        {
            thumb: '<?php echo base_url();?>res/event/1.jpg',
            image: '<?php echo base_url();?>res/event/1.jpg',
            big: 'big.jpg',
            title: 'My title',
            description: 'My description'
            //link: 'http://my.destination.com'
        },
        {
            thumb: '<?php echo base_url();?>res/event/2.jpg',
            image: '<?php echo base_url();?>res/event/2.jpg',
            big: 'big2.jpg',
            title: 'My second title',
            description: 'My second description'
            //link: '/product.html'
        },
        {
            thumb: '<?php echo base_url();?>res/event/3.jpg',
            image: '<?php echo base_url();?>res/event/3.jpg',
            big: 'big2.jpg',
            title: 'My second title',
            description: 'My second description'
            //link: '/product.html'
        },
        {
            thumb: '<?php echo base_url();?>res/event/4.jpg',
            image: '<?php echo base_url();?>res/event/4.jpg',
            big: 'big2.jpg',
            title: 'My second title',
            description: 'My second description'
            //link: '/product.html'
        },
        {
            thumb: '<?php echo base_url();?>res/event/5.jpg',
            image: '<?php echo base_url();?>res/event/5.jpg',
            big: 'big2.jpg',
            title: 'My second title',
            description: 'My second description'
            //link: '/product.html'
        },
        {
            thumb: '<?php echo base_url();?>res/event/6.jpg',
            image: '<?php echo base_url();?>res/event/6.jpg',
            big: 'big2.jpg',
            title: 'My second title',
            description: 'My second description'
            //link: '/product.html'
        },
        {
            thumb: '<?php echo base_url();?>res/event/7.jpg',
            image: '<?php echo base_url();?>res/event/7.jpg',
            big: 'big2.jpg',
            title: 'My second title',
            description: 'My second description'
            //link: '/product.html'
        },
        {
            thumb: '<?php echo base_url();?>res/event/1.jpg',
            image: '<?php echo base_url();?>res/event/8.jpg',
            big: 'big2.jpg',
            title: 'My second title',
            description: 'My second description'
            //link: '/product.html'
        }
    ];
    Galleria.loadTheme('<?php echo base_url();?>galleria-theme/classic/galleria.classic.min.js');
    $("#gallery-event").galleria({
        //width: 600,
        height: 500,
        dataSource : data
    });
         
</script>