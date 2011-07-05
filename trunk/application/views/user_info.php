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
        echo "Working Experience : <br/>";
        if (count($user_data['working_experience'])==0) {
            echo "none";
        } else {
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