<h3>Event</h3>

<div id="slide_show_event" style="float:left;">
    slide show event here<br/>
    <?php echo anchor('event/show_event/2','Click to view this event');?>
</div>
<div id="col_right" style="float: right;">
    <div id="sorting">
        <h4>Sort by : </h4>
        <?php if ($sortby=='categories') echo '<b>'; echo anchor('event/sortby/categories','- Categories'); if ($sortby=='categories') echo '</b>'; ?><br/>
        <?php if ($sortby=='number') echo '<b>'; echo anchor('event/sortby/number','- Number of people Attending'); if ($sortby=='number') echo '</b>'; ?><br/>
        <?php if ($sortby=='upcoming') echo '<b>'; echo anchor('event/sortby/upcoming','- Upcoming Events'); if ($sortby=='upcoming') echo '</b>'; ?><br/>
    </div>
    <?php if ($this->session->userdata('name')==null) { ?>
        <p>Sign in first to view your personal calendar</p>
        <?php $this->load->view('sign_in_view'); ?>
    <?php } else {
        echo anchor('event/mycalendar','Click here to view my calendar');
    } ?>
</div>