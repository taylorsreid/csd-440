<!--
    Taylor Reid
    4/24/2023
    CSD 440 Module 9 Assignment

    The purpose of this program is to 
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Shift</title>
    <link rel="stylesheet" href="TaylorStyle.css">
</head>
<body>
    
    <?php include_once "./TaylorHeader.html"; ?>

    <h1>Add a Shift</h1>
        

    <?php if ($_SERVER["REQUEST_METHOD"] == "GET") { ?>
        
        <form>
            
            <label for="hourlyRate">Hourly rate:</label>
            <input type="number" step="0.01">
            
            <label for="hoursWorked">Hours worked:</label>
            <input type="number" step="0.01">
            
            <label for="date">Date:</label>
            <input type="date" max="">
            
        </form>
        
    <?php } ?>


    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
    
    <?php } ?>

</body>
</html>