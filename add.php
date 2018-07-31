<?php 
    $qs = $_POST['qs'];

    if ($qs != ''){
        $my_file = 'qs.txt';
        $current = file_get_contents($my_file);
        $current .= "\n$qs";
        file_put_contents($my_file, $current);
        echo "<h2>$qs Questions Added Successfully!</h2>";
        echo "<a href=\"index.php\">Go Back<a>";
    }
?>