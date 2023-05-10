<!--
    Taylor Reid
    4/24/2023
    CSD 440 Module 9 Assignment

    The purpose of this program is to create PHP programs that provide:
        an index page with links to all files,
        a query page to search based on user form input,
        a form page for adding a record,
        and all files from Module 8.
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
    
    <?php
        include_once "./TaylorHeader.html"; 
        require_once "./TaylorConnectionManager.php";

        //attempt to connect to db
        $conn;
        try {
            $conn = new ConnectionManager(); //get preconfigured DB connection
        } catch (\Throwable $th) {
            die($th->__toString()); //output reason for failure
        }

        //get list of jobs already in database
        $rs = $conn->query('SELECT DISTINCT `job` FROM `shift`');
        $jobList = array();
        while ($jobName = $rs->fetch_column(0)) {
            array_push($jobList, $jobName);
        }
    ?>

    <h1>Add a Shift</h1>
        

    <?php if ($_SERVER["REQUEST_METHOD"] == "GET") { //loaded on normal page load ?>
        
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

            <div class="flexBox">

                <div class="cell">
                    <label for="hourlyRate">Hourly rate:</label>
                    <br>
                    <input type="number" id="hourlyRate" name="hourlyRate" step="0.01" required>
                </div>

                <div class="cell">
                    <label for="hoursWorked">Hours worked:</label>
                    <br>
                    <input type="number" id="hoursWorked" name="hoursWorked" step="0.01" required>
                </div>

                <div class="cell">
                    <label for="date">Date:</label>
                    <br>
                    <input type="date" id="date" name="date" max="<?= date("Y-m-d") ?>" required>
                </div>

                <div class="cell">
                    <label for="tips">Tips:</label>
                    <br>
                    <input type="number" id="tips" name="tips" step="0.01" required>
                </div>

                <div class="cell">
                    <label for="job">Job:</label>
                    <br>
                    <select id="job" name="job" required>
                            <option></option>
                            <?php
                                //create option list for user of job names already in db
                                foreach ($jobList as $jobName) {
                                    echo "<option>" . $jobName . "</option>";
                                }
                            ?>
                    </select>
                    <br>
                    <label for="newJob">Or enter a new job:</label>
                        <br>
                        <input type="text" name="newJob" id="newJob">
                        <input type="button" value="Add Job" onclick='
                            //small snippet of Javascript to make the site a little more responsive
                            if(document.getElementById("newJob").value !== ""){ //prevent adding blank entries
                                document.getElementById("job").insertAdjacentHTML("beforeend", `<option selected>${document.getElementById("newJob").value}</option>`) //add new job to options list
                            }
                        '>
                </div>

            </div>

            <br>

            <div class="flexBox">
                <div class="cell">
                    <input type="submit" value="Add Shift">
                </div>
            </div>
            
        </form>
        
    <?php } ?>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { //loaded upon form submission 
        try {
            //insert new shift data into db
            $ps = $conn->prepare('INSERT INTO `shift` (`hourly_rate`, `hours_worked`, `date`, `tips`, `job`) VALUES (?, ?, ?, ?, ?)');
            $ps->bind_param('ddsds', $_REQUEST['hourlyRate'], $_REQUEST['hoursWorked'], $_REQUEST['date'], $_REQUEST['tips'], $_REQUEST['job']);
            $ps->execute(); ?>
            <div class="flexBox">
                <div class="cell">New Shift Inserted!</div>
            </div>
        <?php } catch (\Throwable $th) {
            echo "FAILURE!<br>";
            echo $th->__toString(); //output cause of exception
        }
    } ?>

    <?php
        $conn->close(); //last thing to do on page load
    ?>

</body>
</html>