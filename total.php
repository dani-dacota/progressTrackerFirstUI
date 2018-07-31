<?php 
    $total = $_POST['total'];
    
    
    if ($total != ''){
        $my_file = 'total.txt';
        file_put_contents($my_file, $total);
        echo "<h2>Total Number of Questions Changed to $total Successfully!</h2>";
        echo "<a href=\"index.php\">Go Back<a>";
    }
?>