<div id="col_left" style="float: left">
    Edit your profile
    <div id="profpic">
        <?php echo $user_data['image'];?>
    </div>
    <br/><br/><br/><br/><br/><br/><br/><br/>
    <div id="calendar">
        No upcoming event<br/>
        <?php echo $user_data['calendar'];?><br/>
        Go to your calendar
    </div>
</div>

<div id="col_right" style="float: right">
    <div id="link">
        <?php echo anchor('event/host','Host an event')."&nbsp;&nbsp;&nbsp;&nbsp;";?>
        <?php echo anchor('friend','Find a friend');?>
    </div>
    <div id="info">
       <?php $this->load->view('user_info',$user_data);?>
    </div>
</div>