<!--
    Taylor Reid
    3/15/2023
    CSD 440 Module 2 Assignment

    The purpose of this program is to 
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
        <p>3/18/2023</p>
        <p>CSD 440 Module 2 Assignment</p>
    </div>

    <div id="content">

        <table>
            <?php for ($c=0; $c <= 5; $c++) { ?>
                <tr>
                    <?php for ($r=0; $r <= 5; $r++) { ?>
                        <td><?= rand(0, 100) ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>

    </div>

</body>
</html>