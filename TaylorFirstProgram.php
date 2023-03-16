<!--
    Taylor Reid
    3/14/2023
    CSD 440 Module 1 Assignment
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taylor First Program</title>

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

    </style>

</head>
<body>

    <div id="title">
        <p>Taylor Reid</p>
        <p>3/14/2023</p>
        <p>CSD 440 Module 1 Assignment</p>
    </div>

    <div id="content">

        <p>Today is <?php echo date("l, F d, Y") ?></p>

        <hr>

        <p>One of the things that I love about PHP is that it has password hashing and password verification built in without the need for external libraries.</p>
        <p>For example, here is the word "password" hashed as a password: <?php echo password_hash("password", PASSWORD_DEFAULT); ?></p>

        <p>It can also be verified using PHP.</p>

    </div>

</body>
</html>