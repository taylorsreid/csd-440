<!--
    Taylor Reid
    3/18/2023
    CSD 440 Module 4 Assignment

    The purpose of this program is to check to see if a string is a palindrome. Six examples are included.  Three are palindromes and three are not.
    The program displays the results of testing if the string is a palindrome or not.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindrome - Taylor Reid</title>

    <style>

        #header {
            text-align: right;
        }

        #title {
            text-align: center;
        }

        #content {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        th {
            text-decoration: underline;
        }

        th, td {
            border: 1px solid;
            border-collapse: collapse;
            padding: 20px;
        }

    </style>

</head>
<body>

    <div id="header">
        <p>Taylor Reid</p>
        <p>3/19/2023</p>
        <p>CSD 440 Module 4 Assignment</p>
    </div>
    
    <h1 id="title">Palindromes</h1>

    <div id="content">
        
        <?php
            /**
             * Determines if the string is a palindrome.
             * @param string The word to test.
             * @return string "yes" if the string is a palindrome, "no" if it is not.
             */
            function isPalindrome(string $word){
                //Compares the string to its reversed version.  Uses the ternary operator.
                return ($word === strrev($word)) ? "yes" : "no";
            }

            //declare strings to test, first 3 are palindromes, last 3 are not
            $words = array("kayak", "deified", "rotator", "boat", "despised", "circulator");
        ?>

        <table>

            <tr>
                <th>Original Word</th>
                <th>Reversed Word</th>
                <th>Is Palindrome?</th>
            </tr>

            <?php foreach ($words as $word){ //iterate through array of strings ?>
                <tr>
                    <td><?= $word; //display string in forward order ?></td>
                    <td><?= strrev($word); //display string in reverse order ?></td>
                    <td><?= isPalindrome($word); //call function to check if string is a palindrome ?></td>
                </tr>
            <?php } ?>

        </table>

    </div>

</body>
</html>