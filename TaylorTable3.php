<!--
    Taylor Reid
    3/19/2023
    CSD 440 Module 3 Assignment

    The purpose of this program is to 
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table 2 - Taylor Reid</title>

    <style>

        #title {
            text-align: right;
        }

        #content {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        td {
            border: 1px solid;
            border-collapse: collapse;
            padding: 20px;
        }

    </style>

</head>
<body>

    <div id="title">
        <p>Taylor Reid</p>
        <p>3/19/2023</p>
        <p>CSD 440 Module 3 Assignment</p>
    </div>

    <div id="content">
        <table>
            <?php for ($row = 0; $row <= 4; $row++) { //outer loop that creates each row ?>
                <tr>
                    <?php for ($column = 0; $column <= 4; $column++) { //nested inner loop that creates each cell in the row ?>
                        <td><?= rand(0, 100); //generate random number in range ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>
    </div>

</body>
</html>