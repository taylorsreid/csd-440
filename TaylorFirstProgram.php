<!--
    Taylor Reid
    3/14/2023
    CSD 440 Module 1 Assignment

    The purpose of this program is to create and demonstrate a simple PHP program.
    Since I have a little bit of PHP experience already, I decided to showcase one of my favorite built in features: password hashing and verification.

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

        <br><hr><br>

        <p>One of the things that I love about PHP is that it has password hashing and password verification built in without the need for external libraries.</p>

        <p>Example:</p>

        <?php
            $rawPassword = "MyPassword"; //set plaintext password for reuse
            $hashedPassword = password_hash($rawPassword, PASSWORD_DEFAULT); //create a hash of that password
            $passwordMatches = password_verify($rawPassword, $hashedPassword) //verify if the plaintext password and hashed password match
        ?>

        <p>Here is a raw password in plain text: <?php echo $rawPassword ?></p>
        <p>Here is the hash of that same password using password_hash(): <?php echo $hashedPassword ?></p>
        <p>Using password_verify() we can confirm that the password matches the hashed version (in PHP 1 is true and 0 is false): <?php echo $passwordMatches ?></p>

    </div>

</body>
</html>