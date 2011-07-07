<div class="left-menu">
    <div id="col_left">
        <?php echo anchor('profile/editProfile', 'Edit your profile'); ?>
        <div id="profpic">
            <?php echo $user_data['image']; ?>
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/>
        <div id="calendar">
            No upcoming event<br/>
            <?php echo $user_data['calendar']; ?><br/>
            <?php echo anchor('event/mycalendar', 'Go to your calendar'); ?>
        </div>
    </div>
</div>

<div class="right-menu">
    <div id="col_right">
        <div id="link">
            <?php echo anchor('event/host', 'Host an event') . "&nbsp;&nbsp;&nbsp;&nbsp;"; ?>
            <?php echo anchor('friend', 'Find a friend'); ?>
        </div>
        <div id="info">
            <?php $this->load->view('user_info', $user_data); ?>
        </div>
    </div>
</div>
<div id="clearboth">
</div>