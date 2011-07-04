<h3>Sign Up</h3>
<p>Welcome to our online community! Signing up is the first step to start connecting, attending and making events, and  get better deals!</p>
<p>Please choose the last level of education achieved in St. Ursula</p>
<?php
    if ($jenjang!='TK')
        echo anchor('sign_up/submit/jenjang/TK','TK');
    else
        echo 'TK';
    if ($jenjang!='SD')
        echo anchor('sign_up/submit/jenjang/SD','SD');
    else
        echo 'SD';
    if ($jenjang!='SMP')
        echo anchor('sign_up/submit/jenjang/SMP','SMP');
    else
        echo 'SMP';
    if ($jenjang!='SMA')
        echo anchor('sign_up/submit/jenjang/SMA','SMA');
    else
        echo 'SMA';
    echo "<br/>";
    
    $tahun = 2010;
    for ($i=0;$i<=10;$i++) {
        for ($j=0;$j<=20;$j+=10) {
            echo anchor('sign_up/submit/jenjang/'.$jenjang.'/tahun/'.($tahun-$i-$j),$tahun-$j-$i);
            echo "   ";
        }
        echo "<br/>";
    }
    
?>

