<div id="name">
    <?php echo  strtoupper($user_data['name']);
    if ($user_data['nickname']!='') echo ' ('.$user_data['nickname'].')';?>
</div>
<div id="alumni" class="general_text">
    <?php echo "Alumni of ".$user_data['kelulusan'].", ".$user_data['tahun_kelulusan'];?>
</div>
<div id="pendidikan" class="general_text">
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
                    if ($pendidikan['major'] != 'none') {
                        echo "Majoring in ".$pendidikan['major']."<br/>";
                    }
                    if ($pendidikan['minor'] != 'none') {
                        echo "Minoring in ".$pendidikan['minor']."<br/>";
                    }
                } else {
                    echo "Graduated a ".$pendidikan['degree']." degree in ".$pendidikan['where']."<br/>";
                    if ($pendidikan['major']!='none') {
                        echo "Majoring in ".$pendidikan['major']."<br/>";
                    }
                    if ($pendidikan['minor']!='none') {
                        echo "Minoring in ".$pendidikan['minor']."<br/>";
                    }
                }
            }
        endforeach;
    ?>
</div>
<br/>
<?php if ($user_data['visibility']->interest) { ?>
<div id="interest">
    <?php
        if (count($user_data['interest'])==0) {
            //don't write anythings
        } else {
            echo "Areas of interest : ";
            $attributes = array(
                'id'    => 'interestlist'
            );
            echo ul($user_data['interest'], $attributes);
            echo "<br/>";
        }
    ?>
</div>
<?php } ?>        

<div id="working_experience" class="general_text">
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
                        if ($working['company']!='') {
                            echo "Company : ".$working['company']." (Current)";
                            echo "<br/>";
                        }
                    } else {
                        echo "Company : ".$working['company'];
                        echo "<br/>";
                    }
                    if ($working['year']!='') {
                        echo "Year : ".$working['year'];
                        echo "<br/>";
                    }
                    if ($working['position']!='') {
                        echo "Position : ".$working['position'];
                        echo "<br/>";
                    }
                    if  ($working['address']!='') {
                        echo "Address : ".$working['address'];
                        echo "<br/>";
                    }
                    if ($working['telephone']!='') {
                        echo "Telephone : ".$working['telephone'];
                        echo "<br/>";
                    }
                    if ($working['fax']!='') {
                        echo "Fax : ".$working['fax'];
                        echo "<br/>";
                    }
                    if ($working['work_hp']!='') {
                        echo "HP : ".$working['work_hp'];
                        echo "<br/>";
                    }
                    if ($working['work_email']!='') {
                        echo "Email : ".$working['work_email'];
                        echo "<br/>";
                    }
                }
            endforeach;
            if ($count_tampil==0) {
                echo "None";
            }
        }
    ?>
</div>
<br/>
<?php if($user_data['visibility']->home_address) { ?>
<div id="home_address" class="general_text">
    <?php if (isset($user_data['home_address']) &&($user_data['home_address']!='') ) echo "Home address : ".$user_data['home_address'];?>
</div>
<?php } ?>
<?php if ($user_data['visibility']->home_telephone) { ?>
<div id="home_telephone" class="general_text">
    <?php if (isset($user_data['home_telephone']) &&($user_data['home_telephone']!='') ) echo "Home telephone : ".$user_data['home_telephone'];?>
</div>
<?php } ?>
<?php if ($user_data['visibility']->handphone) { ?>
<div id="handphone" class="general_text">
    <?php if (isset($user_data['handphone']) &&($user_data['handphone']!='')) echo "Handphone : ".$user_data['handphone'];?>
</div>
<?php } ?>
<?php if ($user_data['visibility']->email) { ?>
<div id="email" class="general_text">
    <?php if (isset($user_data['email']) &&($user_data['email']!='') ) echo "Email : ".$user_data['email'];?>
</div>
<?php } ?>

