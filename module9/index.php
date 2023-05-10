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
    <title>Module 9 Assignment - Taylor Reid</title>

    <link rel="stylesheet" href="TaylorStyle.css">

</head>
<body>

    <?php
        include_once "./TaylorHeader.html";
    ?>

    <h1>Wage and Tip Tracking</h1>

    <div class="content">
        <h2>Database Maintenance - Module 8</h2>
        <p><a href="./TaylorCreateTable.php">Create Table</a></p>
        <p><a href="./TaylorPopulateTable.php">Populate Table</a></p>
        <p><a href="./TaylorQueryTable.php">Query Table</a></p>
        <p><a href="./TaylorDropTable.php">Drop Table</a></p>
    </div>

    <div class="content">
        <h2>Shift Tools - Module 9</h2>
        <p><a href="./TaylorSearch.php">Search for a Shift</a></p>
        <p><a href="./TaylorAddRecord.php">Add a Shift</a></p>
    </div>

</body>
</html>