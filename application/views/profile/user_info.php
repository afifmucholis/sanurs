<div id="name">
    <?php echo $user_data['name'];?>
</div>
<div id="alumni">
    <?php echo "Alumni of ".$user_data['kelulusan'].", ".$user_data['tahun_kelulusan'];?>
</div>
<?php if($user_data['visibility']->home_address) { ?>
<div id="home_address">
    <?php echo "Home address : "; if (isset($user_data['home_address'])) echo $user_data['home_address']; else echo "-";?>
</div>
<?php } ?>
<?php if ($user_data['visibility']->home_telephone) { ?>
<div id="home_telephone">
    <?php echo "Home telephone : "; if (isset($user_data['home_telephone'])) echo $user_data['home_telephone']; else "-";?>
</div>
<?php } ?>
<?php if ($user_data['visibility']->handphone) { ?>
<div id="handphone">
    <?php echo "Handphone : "; if (isset($user_data['handphone'])) echo $user_data['handphone']; else echo "-";?>
</div>
<?php } ?>
<?php if ($user_data['visibility']->email) { ?>
<div id="email">
    <?php echo "Email : "; if (isset($user_data['email'])) echo $user_data['email']; else echo "-";?>
</div>
<?php } ?>
<div id="pendidikan">
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
</div>
<?php if ($user_data['visibility']->interest) { ?>
<div id="interest">
    <?php
        if (count($user_data['interest'])==0) {
            echo "Areas of interest : ";
            echo "None";
        } else {
            echo "Areas of interest : ";
            $attributes = array(
                'id'    => 'interestlist'
            );
            echo ul($user_data['interest'], $attributes);
        }
    ?>
</div>
<?php } ?>
<div id="working_experience">
    <?php
        if (count($user_data['working_experience'])==0) {
            echo "Working Experience : ";
            echo "None";
        } else {
            echo "Working Experience : ";
            echo br(1);
            foreach($user_data['working_experience'] as $working) :
                if ($working['is_current_work']) {
                    echo "Company : ".$working['company']." (Current)";
                } else {
                    echo "Company : ".$working['company'];
                }
                echo "<br/>";
                echo "Year : ".$working['year'];
                echo "<br/>";
                echo "Position : ".$working['position'];
                echo "<br/>";
                echo "Address : ".$working['address'];
                echo "<br/>";
                echo "Telephone : ".$working['telephone'];
                echo "<br/>";
                echo "Fax : ".$working['fax'];
                echo "<br/>";
                echo "HP : ".$working['work_hp'];
                echo "<br/>";
                echo "Email : ".$working['work_email'];
                echo "<br/><br/>";
            endforeach;
        }
    ?>
</div>