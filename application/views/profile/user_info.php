<div id="name">
    <?php echo $user_data['name'];
    if ($user_data['nickname']!='') echo ' ('.$user_data['nickname'].')';?>
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
        $tampil = true;
        foreach($user_data['pendidikan'] as $pendidikan) :
            if ($pendidikan['degree']=='Bachelor Degree (S1)' && !$user_data['visibility']->S1)
               $tampil = false;
            else if ($pendidikan['degree']=='Master Degree (S2)' && !$user_data['visibility']->S2)
               $tampil = false;
            else if ($pendidikan['degree']=='Doctorate Degree (S3)' && !$user_data['visibility']->S3)
               $tampil = false;
            else
               $tampil = true;
            
            if ($tampil) {
                if ($pendidikan['current']) {
                    echo "Pursuing a ".$pendidikan['degree']." degree in ".$pendidikan['where']."<br/>";
                    echo "Majoring in ".$pendidikan['major']."<br/>";
                    echo "Minoring in ".$pendidikan['minor']."<br/>";
                } else {
                    echo "Graduated a ".$pendidikan['degree']." degree in ".$pendidikan['where']."<br/>";
                    echo "Majoring in ".$pendidikan['major']."<br/>";
                    echo "Minoring in ".$pendidikan['minor']."<br/>";
                }
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
            $tampil = true;
            $count_tampil = 0;
            foreach($user_data['working_experience'] as $working) :
                echo br(1);
                if ($working['is_current_work'] && $user_data['visibility']->current_experience) {
                    $tampil = true;
                    $count_tampil++;
                } else if (!$working['is_current_work'] && $user_data['visibility']->work_experience) {
                    $tampil = true;
                    $count_tampil++;
                } else {
                    $tampil = false;
                }
                
                if ($tampil) {
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
                    echo "<br/>";
                }
            endforeach;
            if ($count_tampil==0) {
                echo "None";
            }
        }
    ?>
</div>