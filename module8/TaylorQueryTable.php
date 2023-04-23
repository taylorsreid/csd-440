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
    <title>Query Table</title>

    <link rel="stylesheet" href="TaylorStyle.css">

</head>
<body>

    <?php
        include_once "./TaylorHeader.html";
        require_once "./TaylorConnectionManager.php";
    ?>

    <h1 id="title">Query Table</h1>

    <div class="content">
        <p>Selecting all data from table...
        <?php
            try {
                // echo 1/0; //uncomment to test try block functionality
                $conn = new ConnectionManager(); //get preconfigured DB connection
                $result = $conn->query("SELECT * FROM `shift`");
                $fieldInfo = $result->fetch_fields(); //get metadata from query so that we can output column names later
        ?>
        SUCCESS!</p>
    </div>

    <table class="content">
        <tr>
            <?php foreach ($fieldInfo as $value) { //iterate through fields and output column names as table headers ?>
                <th><?= $value->name ?></th>
            <?php } ?>
        </tr>
            <?php while ($row = $result->fetch_array(MYSQLI_NUM)) { //iterate through each row of the result set ?>
                <tr>
                    <?php foreach ($row as $cell) { //iterate through each cell in the row ?>
                        <td><?= $cell ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
    </table>

    <?php
        } catch (\Throwable $th) {
            echo "FAILURE!<br>";
            echo $th->__toString(); //output cause of exception
        } finally {
            $conn -> close();
        }
    ?>
</body>
</html>