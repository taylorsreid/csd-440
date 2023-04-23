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
    <title>Module 8 Assignment - Taylor Reid</title>

    <link rel="stylesheet" href="TaylorStyle.css">

</head>
<body>

    <?php
        include_once "./TaylorHeader.html";
    ?>

    <h1 id="title">Wage and Tip Tracking</h1>

    <div class="content">
        <p><a href="./TaylorCreateTable.php">Create Table</a></p>
        <p><a href="./TaylorPopulateTable.php">Populate Table</a></p>
        <p><a href="./TaylorQueryTable.php">Query Table</a></p>
        <p><a href="./TaylorDropTable.php">Drop Table</a></p>
    </div> 

</body>
</html>