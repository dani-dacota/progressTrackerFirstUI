<?php 
    $qs = $_POST['qs'];
    $day = $_POST['day'];

    if ($qs != ''){
        $my_file = 'qs.txt';
        $current = file_get_contents($my_file);
        $qsArr = explode("\n",$current);
        $qsArr[$day-1] = $qs;
        $current = implode("\n",$qsArr);
        file_put_contents($my_file, $current);
        echo "<h2>Day#$day Changed to $qs Questions Successfully!</h2>";
        echo "<a href=\"index.php\">Go Back<a>";
    }
?>