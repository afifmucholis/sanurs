<h3>Events</h3>
<br/>
<br/>
<div id="col_left" style="float: left">
    Calendar here
</div>
<div id="col_right" style="float: right">
    <?php if ($sortby=='all_events') { ?>
        <b><?php echo anchor('event/mycalendar/all_events','View all events'); ?></b>
    <?php } else { ?>
        <?php echo anchor('event/mycalendar/all_events','View all events');?>
    <?php } ?>
    <br/>
    <?php if ($sortby=='rsvp_ed') { ?>
    <b><?php echo anchor('event/mycalendar/rsvp_ed','View event RSVP-ed');?></b>
    <?php } else { ?>
    <?php echo anchor('event/mycalendar/rsvp_ed','View event RSVP-ed');?>
    <?php } ?>
    <?php echo br(10);?>
    <p>Boxes in orange are events not hosted by alumni.</p>
    <p>Events in yellow are hosted by us.</p>
</div>
