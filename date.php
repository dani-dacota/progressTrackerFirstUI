<?php 
    $date = $_POST['date'];
    
    
    if ($date != ''){
        $my_file = 'date.txt';
        file_put_contents($my_file, $date);
        echo "<h2>Expected Completion Date Changed to $date Successfully!</h2>";
        echo "<a href=\"index.php\">Go Back<a>";
    }
?>