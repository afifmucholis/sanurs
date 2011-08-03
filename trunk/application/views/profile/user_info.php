<div id="name" class="impact25">
    <?php
    echo strtoupper($user_data['name']);
    if ($user_data['nickname'] != '')
        echo ' (' . $user_data['nickname'] . ')';
    ?>
</div>
<div id="alumni" class="general_text">
    <?php echo "Alumni of " . $user_data['kelulusan'] . ", " . $user_data['tahun_kelulusan']; ?>
</div>
<div id="pendidikan" class="general_text">
    <?php
    $tampil = true;
    foreach ($user_data['pendidikan'] as $pendidikan) :
        if ($pendidikan['degree'] == 'Bachelor Degree (S1)' && !$user_data['visibility']->S1)
            $tampil = false;
        else if ($pendidikan['degree'] == 'Master Degree (S2)' && !$user_data['visibility']->S2)
            $tampil = false;
        else if ($pendidikan['degree'] == 'Doctorate Degree (S3)' && !$user_data['visibility']->S3)
            $tampil = false;
        else
            $tampil = true;

        if ($tampil) {
            if ($pendidikan['current']) {
                echo "Pursuing a " . $pendidikan['degree'] . " degree in " . $pendidikan['where'] . "<br/>";
                if ($pendidikan['major'] != 'none') {
                    echo "Majoring in " . $pendidikan['major'] . "<br/>";
                }
                if ($pendidikan['minor'] != 'none') {
                    echo "Minoring in " . $pendidikan['minor'] . "<br/>";
                }
            } else {
                echo "Graduated a " . $pendidikan['degree'] . " degree in " . $pendidikan['where'] . "<br/>";
                if ($pendidikan['major'] != 'none') {
                    echo "Majoring in " . $pendidikan['major'] . "<br/>";
                }
                if ($pendidikan['minor'] != 'none') {
                    echo "Minoring in " . $pendidikan['minor'] . "<br/>";
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
        if (count($user_data['interest']) == 0) {
            //don't write anythings
        } else {
            echo "<div class='impact20'>Areas of interest : </div>";
            $attributes = array(
                'id' => 'interestlist'
            );
            echo ul($user_data['interest'], $attributes);
            echo "<br/>";
        }
        ?>
    </div>
    <?php } ?>        

<div id="working_experience" class="general_text">
    <?php
    if (count($user_data['working_experience']) == 0) {
        //gak usah tulis apa2 lah
    } else {
        echo "<div class='impact20'>Working Experience : </div>";
        $tampil = true;
        $count_tampil = 0;
        foreach ($user_data['working_experience'] as $working) :
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
            ?>
            <table style="margin-left: 15px;">
                <?php
                if ($tampil) {
                    if ($working['is_current_work']) {
                        if ($working['company'] != '') {
                            echo "<tr> <td class='title-information'>";
                            echo "Company" . "</td> <td>";
                            echo $working['company'] . " (Current)" . "</td></tr>";
                        }
                    } else {
                        echo "<tr> <td class='title-information'>";
                        echo "Company" . "</td> <td>";
                        echo $working['company'] . "</td></tr>";
                    }
                    if ($working['year'] != '') {
                        echo "<tr> <td class='title-information'>";
                        echo "Year" . "</td> <td>";
                        echo $working['year'] . "</td></tr>";
                    }
                    if ($working['position'] != '') {
                        echo "<tr> <td class='title-information'>";
                        echo "Position" . "</td> <td>";
                        echo $working['position'] . "</td></tr>";
                    }
                    if ($working['address'] != '') {
                        echo "<tr> <td class='title-information'>";
                        echo "Address" . "</td> <td>";
                        echo $working['address'] . "</td></tr>";
                    }
                    if ($working['telephone'] != '') {
                        echo "<tr> <td class='title-information'>";
                        echo "Telephone" . "</td> <td>";
                        echo $working['telephone'] . "</td></tr>";
                    }
                    if ($working['fax'] != '') {
                        echo "<tr> <td class='title-information'>";
                        echo "Fax" . "</td> <td>";
                        echo $working['fax'] . "</td></tr>";
                    }
                    if ($working['work_hp'] != '') {
                        echo "<tr> <td class='title-information'>";
                        echo "HP" . "</td> <td>";
                        echo $working['work_hp'] . "</td></tr>";
                    }
                    if ($working['work_email'] != '') {
                        echo "<tr> <td class='title-information'>";
                        echo "Email" . "</td> <td>";
                        echo $working['work_email'] . "</td></tr>";
                    }
                }
                ?>
            </table>
            <?php
        endforeach;
        if ($count_tampil == 0) {
            //echo "None";
        }
    }
    ?>
</div>
<br/>

<?php
if ($user_data['visibility']->home_address ||
        $user_data['visibility']->home_telephone ||
        $user_data['visibility']->handphone ||
        $user_data['visibility']->email) {
    echo "<div class='impact20'>Personal Information : </div>";
}
?>
<div style="margin-left: 13px;margin-top: 10px;">
    <table>
    <?php if ($user_data['visibility']->home_address) { ?>
    <div id="home_address" class="general_text">
    <?php if (isset($user_data['home_address']) && ($user_data['home_address'] != ''))
        echo "<tr> <td class='title-information'>";
        echo "Home address" . "</td> <td>";
        echo $user_data['home_address'] . "</td></tr>";
       ?>
    </div>
    <?php } ?>
    <?php if ($user_data['visibility']->home_telephone) { ?>
    <div id="home_telephone" class="general_text">
    <?php if (isset($user_data['home_telephone']) && ($user_data['home_telephone'] != ''))
        echo "<tr> <td class='title-information'>";
        echo "Home telephone" . "</td> <td>";
        echo $user_data['home_telephone'] . "</td></tr>";
    ?>
    </div>
    <?php } ?>
    <?php if ($user_data['visibility']->handphone) { ?>
    <div id="handphone" class="general_text">
    <?php if (isset($user_data['handphone']) && ($user_data['handphone'] != ''))
        echo "<tr> <td class='title-information'>";
        echo "Handphone" . "</td> <td>";
        echo $user_data['handphone'] . "</td></tr>";
        ?>
    </div>
    <?php } ?>
    <?php if ($user_data['visibility']->email) { ?>
    <div id="email" class="general_text">
    <?php if (isset($user_data['email']) && ($user_data['email'] != ''))
        echo "<tr> <td class='title-information'>";
        echo "Email" . "</td> <td>";
        echo $user_data['email'] . "</td></tr>";
     ?>
    </div>
<?php } ?>
    </table>
</div>

