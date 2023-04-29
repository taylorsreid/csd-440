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
            <input type="number" id="hourlyRate" step="0.01">
            
            <label for="hoursWorked">Hours worked:</label>
            <input type="number" id="hoursWorked" step="0.01">
            
            <label for="date">Date:</label>
            <input type="date" id="date" max="<?= date("Y-m-d") ?>">
            
            <label for="tips">Tips:</label>
            <input type="number" id="tips" step="0.01">
            
            <label for="job">Job:</label>
            <input type="text" id="job">
            
        </form>
        
    <?php } ?>


    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        require_once "./TaylorConnectionManager.php";
        try {
            $conn = new ConnectionManager();
            $ps = $conn->prepare('INSERT INTO `shift` (`hourly_rate`, `hours_worked`, `date`, `tips`, `job`) VALUES (?, ?, ?, ?, ?)');
            $ps->bind_param('ddsds', $_REQUEST['hourlyRate'], $_REQUEST['hoursWorked'], $_REQUEST['date'], $_REQUEST['tips'], $_REQUEST['job']);
            $ps->execute();
        } catch (\Throwable $th) {
            echo "FAILURE!<br>";
            echo $th->__toString(); //output cause of exception
        }
    ?>
    
    <?php } ?>

</body>
</html>