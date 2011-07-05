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

<div id="col_right">
    <div id="link">
        <?php echo anchor('event/host','Host an event')."&nbsp;&nbsp;&nbsp;&nbsp;";?>
        <?php echo anchor('friend','Find a friend');?>
    </div>
    <div id="info">
        <?php echo $user_data['name'];?>
        <br/>
        <?php echo "Alumni of ".$user_data['kelulusan'].", ".$user_data['tahun_kelulusan'];?>
        <br/>
        <?php
            foreach($user_data['pendidikan'] as $pendidikan) :
                if ($pendidikan['current']) {
                    echo "Pursuing a ".$pendidikan['degree']." degree in ".$pendidikan['where']."<br/>";
                    echo "Majoring in ".$pendidikan['major']."<br/>";
                    echo "Minoring in ".$pendidikan['minor']."<br/>";
                } else {
                    echo "Graduated a ".$pendidikan['degree']." degree in ".$pendidikan['where']."<br/>";
                    echo "Majoring in ".$pendidikan['major']."<br/>";
                    echo "Minoring in ".$pendidikan['minor']."<br/>";
                }
            endforeach;
        ?>
        <br/>
        <?php
            echo "Areas of interest : ";
            if (count($user_data['interest'])==0) {
                echo "none";
            } else {
                $i=0;
                foreach($user_data['interest'] as $interest) :
                    echo $interest;
                    if ($i==count($user_data['interest'])-2) {
                        echo " and ";
                    } else if ($i!=count($user_data['interest'])-1)
                        echo ", ";
                    $i++;
                endforeach;
            }
        ?>
        <br/>
        <?php
            echo "Working Experience : ";
            if (count($user_data['working_experience'])==0) {
                echo "none";
            } else {
                $i=0;
                foreach($user_data['working_experience'] as $working) :
                    
                    $i++;
                endforeach;
            }
        ?>
    </div>
</div>