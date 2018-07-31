<!DOCTYPE html>
<html>
    <head>
        <style>
            .calender {
                text-align:center;
                border: solid green 2px;
                border-radius:5px;
                padding:5px;
                margin:5px;
            }
            .card {
                border: solid black 1px;
                border-radius: 5px;
                display: inline-block;
                text-align:center;
                padding: 10px 10px;
                margin: 0px;
            }
            h2,p {
                padding: 0px;
                margin: 0px;
            }
            .card form {
                width:140px;
            }
            .card form label, .card form input {
                display:block;
                width:90%;
                text-align:center;
                padding: 0px;
                margin-top:4px;
                margin-right:auto;
                margin-left:auto;
            }
            .card form h2 input{
                display:inline;
            }
            input {
                border: black solid 1px;
                height:20px;
            }
            .card form h2 input{
                width:30px;
            }
        </style>
    </head>
    <body>
        <?php 
            $progressArr = explode("\n",file_get_contents("qs.txt"));
            $dayNumber = 1;
            $qs = 0;
            $total = file_get_contents("total.txt");
            $dateCurrent = file_get_contents("date.txt");
            $qsArr = explode("-",$dateCurrent);
            $year = $qsArr[0];
            $month = $qsArr[1];
            $day = $qsArr[2];
        ?>
        <h1>Hello, Dr!</h1>
        <div class="card">
            <form action="date.php" method="post">
                <p>Expected Date of Completion: <input type="date" name="date" value="<?php echo $dateCurrent; ?>" ></input>
                <input type="submit" value="Update!"></p>
            </form>
        </div>
        <div class="card">
            <form action="total.php" method="post">
                <p>Total Questions: <input type="number" name="total" value="<?php echo $total; ?>" min="1"></input>
                <input type="submit" value="Update!"></p>
            </form>
        </div>
        
        <div class="calender">
            
        <?php
            foreach($progressArr as &$line){ 
              $qs += $line;
              echo "<div class=\"card\">\n\t\t\t";
              echo "<h2>Day#$dayNumber</h2>\n\t\t\t";
              echo "<p>Qs: $line</p>\n\t\t\t";
              echo "<p>Tally: $qs </p>\n\t\t\t";
              echo "<meter value =\"" . $qs .  "\" max= \"$total\" min=\"0\"></meter>\n\t\t\t";
              $percent = round($qs*100/$total,1);
              echo "<p>Completed: $percent%</p>\n\t\t";
              echo "</div>\n\t\t";
              $dayNumber++;
            }
            $maxDay = $dayNumber - 1;
        ?>
        
            <div class="card">
                <h2>Day#<?php echo $dayNumber;?></h2>
                <p>Qs?</p>
                <form action="add.php" method="post">
                    <input type="number" name="qs" min="1" required>
                    <input type="submit" value="Add!">
                </form>
            </div>
           
           
            <div class="card">
                <form action="edit.php" method="post">
                    <h2>Day#<input type="number" name="day" min="1" max="<?php echo $maxDay; ?>" required></h2>
                    <p>Qs?</p>
                    <input type="number" name="qs" min="1" required>
                    <input type="submit" value="Update!">
                </form>
            </div>
             

        </div>
        
        <?php 
        
        
        $cdate = mktime(0, 0, 0, $month, $day, $year);
        $today = time();
        $difference = $cdate - $today;
        if ($difference < 0) { $difference = 0; }
        $difference = floor($difference/60/60/24);
        $qsLeft = $total - $qs;
        $qsPerDay = round(($qsLeft/$difference),1);
        ?>
        
        <p>Qs Left: <?php echo $qsLeft; ?></p>
        <p>There are <?php echo $difference; ?> days remaining</p>
        <p>Qs to complete per day: <?php echo $qsPerDay; ?></p>

    </body>
</html>