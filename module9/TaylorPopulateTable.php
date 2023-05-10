<!--
    Taylor Reid
    4/18/2023
    CSD 440 Module 8 Assignment

    The purpose of this program is to create, populate, and test a MySQL table on a topic that interests me using MySQLi.
    For my topic I decided to create a table to help track tipped income, since as a tipped employee it can be very tricky to track how much I'm actually making.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Populate Table</title>

    <link rel="stylesheet" href="TaylorStyle.css">

</head>
<body>

    <?php
        include_once "./TaylorHeader.html";
        require_once "./TaylorConnectionManager.php";
    ?>

    <h1 id="title">Populate Table</h1>

    <div class="content">
        <?php

            //fake demo data - I'm actually a bellman.
            $shifts = array(
                array(7.5, 8, "2023-04-18", 150, "bartender"),
                array(8.25, 6, "2023-04-19", 125, "server"),
                array(7.5, 9, "2023-04-20", 190, "bartender"),
                array(8.25, 5, "2023-04-21", 105, "server"),
                array(7.5, 7, "2023-04-22", 180, "bartender"),
            );

            echo "Populating table...";
            try {
                // echo 1/0; //uncomment to test try block functionality
                $conn = new ConnectionManager(); //get preconfigured DB connection
                $ps = $conn->prepare('INSERT INTO `shift`(`hourly_rate`, `hours_worked`, `date`, `tips`, `job`) VALUES (?, ?, ?, ?, ?)');
                
                //iterate through array and execute all values in each subarray as prepared statement parameters
                foreach ($shifts as $shift) {
                    $ps->execute($shift);
                }

                echo "SUCCESS!";
            } catch (\Throwable $th) {
                echo "FAILURE!<br>";
                echo $th->__toString(); //output cause of exception
            } finally {
                $conn -> close();
            }
            
        ?>
    </div>
    
</body>
</html>