<h3>Events</h3>
<br/>
<br/>
<div class="left-menu">
    <div id='calendar'>
    </div>
</div>
<div class="right-menu">
    <?php if ($sortby == 'all_events') { ?>
        <b><?php echo anchor('event/mycalendar/all_events', 'View all events'); ?></b>
    <?php } else { ?>
        <?php echo anchor('event/mycalendar/all_events', 'View all events'); ?>
    <?php } ?>
    <br/>
    <?php if ($sortby == 'rsvp_ed') { ?>
        <b><?php echo anchor('event/mycalendar/rsvp_ed', 'View event RSVP-ed'); ?></b>
    <?php } else { ?>
        <?php echo anchor('event/mycalendar/rsvp_ed', 'View event RSVP-ed'); ?>
    <?php } ?>
    <?php echo br(10); ?>
    <p>Boxes in orange are events not hosted by alumni.</p>
    <p>Events in yellow are hosted by us.</p>
</div>

<div id="clearboth"></div>

<script type="text/javascript">
    $(document).ready(function() {
        // page is now ready, initialize the calendar...

        $('#calendar').fullCalendar({
            // put your options and callbacks here
            theme :true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },

            events: "<?php echo site_url(); ?>/calendar",
            
            eventClick: function(calEvent, jsEvent) {
                return false;
            },
            
            eventDragStart: function(calEvent, jsEvent, ui) {
                $(this).qtip("hide");
                $(this).qtip("disable");
            },
            
            eventDragEnd: function(calEvent, jsEvent, ui) {
                $(this).qtip("enable");
            },
            
            eventRender: function(calEvent, element) {
                var tipContent = "<strong>" + calEvent.title+"<br/>"+
                    $.fullCalendar.formatDate(calEvent.when,"MMMM dS, yyyy");
                if (typeof calEvent.where != 'undefined') {
                    tipContent +=  '<br/>' + calEvent.where;
                }
                if (typeof calEvent.description != 'undefined') {
                    tipContent +=  '<br/>' + calEvent.description;
                }
                $(element).qtip({
                    content: tipContent,
                    position: {
                        corner: {
                            target: 'rightTop',
                            tooltip: 'leftBottom'
                        }
                    },
                    border: {
                        radius: 4,
                        width: 3
                    },
                    style: {
                        width: 200,
                        //background: '#A2D959',
                        background: '#CAECF4',
                        color: 'black',
                        textAlign: 'center',
                        fontcolor : 'black',
                        border: {
                            width: 7,
                            radius: 5,
                            //color: 'dark'
                            color: '#6699CC'
                            //color : '#CAECF4'
                        },
                        tip: 'leftBottom'
                        
                    }
                });
            },
            loading: function(bool) {
                if (bool) $('#veil').show();
                else $('#veil').hide();
            }
        })

    });
</script>
