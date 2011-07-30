<label id="title-menu">Events Calendar</label>
<br/>
<br/>
<div class="calendar-left-menu">
    <div id='calendar'>
    </div>
</div>
<div class="calendar-right-menu">
    <div id="sorting">
        <label class="impact20">VIEW BY : </label> <br/>
        <div class="sort-category">
            <?php if ($sortby == 'all_events') { ?>
                <b>&raquo; <?php echo anchor('event/mycalendar/all_events', 'All Events By Your Friends', 'class="active-event-link"'); ?></b>
            <?php } else { ?>
                &raquo; <?php echo anchor('event/mycalendar/all_events', 'All Events By Your Friends', 'class="notactive-event-link"'); ?>
            <?php } ?>
            <br/>
            <?php if ($sortby == 'attending_rsvp') { ?>
                &raquo; <b><?php echo anchor('event/mycalendar/attending_rsvp', 'Your attending-RSVP Events', 'class="active-event-link"'); ?></b>
            <?php } else { ?>
                &raquo; <?php echo anchor('event/mycalendar/attending_rsvp', 'Your attending-RSVP Events', 'class="notactive-event-link"'); ?>
            <?php } ?>
            <br/>
            <?php if ($sortby == 'not_attending_rsvp') { ?>
                &raquo; <b><?php echo anchor('event/mycalendar/not_attending_rsvp', 'Your not-attending-RSVP Events', 'class="active-event-link"'); ?></b>
            <?php } else { ?>
                &raquo; <?php echo anchor('event/mycalendar/not_attending_rsvp', 'Your not-attending-RSVP Events', 'class="notactive-event-link"'); ?>
            <?php } ?>
            <?php echo br(5); ?>
            <p>Boxes in BLUE are events not hosted by Alumni.</p>
            <p>Events in GREEN officially are hosted by Alumni.</p>
        </div>
    </div>
</div>

<div class="clearboth"></div>

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

            events: {
                url : "<?php echo site_url(); ?>/calendar",
                type : "POST",
                data : {
                    sortby : '<?php echo $sortby ?>' 
                }
            },
            
            eventClick: function(calEvent, jsEvent) {
                if (calEvent.url) {
                    window.open(calEvent.url);
                    return false;
                }                
            },
            
            eventDragStart: function(calEvent, jsEvent, ui) {
                $(this).qtip("hide");
                $(this).qtip("disable");
            },
            
            eventDragEnd: function(calEvent, jsEvent, ui) {
                $(this).qtip("enable");
            },
            
            eventRender: function(calEvent, element) {
                var tipContent = "<strong>" + calEvent.title+"<br/><br/></strong>"+
                    $.fullCalendar.formatDate(calEvent.start,"MMMM dS, yyyy");
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
