<?php

    /*
    Taylor Reid
    4/10/2023
    CSD 440 Module 6 Assignment

    The purpose of this program is to defines a class titled MyInteger. The class holds a single integer that is set in the constructor by a parameter. 
    The class has methods isEven(), isOdd(), isPrime(), getter, and setter methods. Two instances are created and all methods are tested.

    All properties, methods, etc. use type hinting because I don't like weak typing.

    */

    class MyInteger {

        private int $value; // main and only class property

        function __construct(int $value = 0){ // constructor with default value of 0
            $this->value = $value;
        }

        function isEven() : bool {
            return $this->value % 2 == 0; // if no remainder, then it's even
        }

        function isOdd() : bool {
            return !$this->isEven(); // return negation of isEven
        }

        // Check only till square root of value instead of value, since if value is divisible by square root of value then it's divisible by value.
        // Long story short, it's magic.
        function isPrime() : bool {
            if ($this->value == 1){
                return false;
            }
            for ($i = 2; $i <= sqrt($this->value); $i++){
                if ($this->value % $i == 0)
                    return false;
            }
            return true;
        }

        function set(int $value) : void {
            $this->value = $value;
        }

        function get() : int {
            return $this->value;
        }    

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyInteger - Taylor Reid</title>

    <style>

        #header {
            text-align: right;
        }

        #title {
            text-align: center;
        }

        table {
            margin-left: auto;
            margin-right: auto;
        }

        th {
            text-decoration: underline;
        }

        th, td {
            border: 1px solid;
            border-collapse: collapse;
            padding: 20px;
        }

        h1, h2 {
            text-align: center;
        }

    </style>

</head>
<body>

    <div id="header">
        <p>Taylor Reid</p>
        <p>4/10/2023</p>
        <p>CSD 440 Module 6 Assignment</p>
    </div>
    
    <h1 id="title">MyInteger</h1>

    <?php
        // testOne tests constructor
        $testOne = new MyInteger(5);

        // testTwo tests setter method
        $testTwo = new MyInteger();
        $testTwo->set(4);
    ?>
    
    <h2>Test One</h2>
    <table>
        <tr>
            <td colspan="2">Value set using constructor.</td>
        </tr>
        <tr>
            <td>get()</td>
            <td><?= $testOne->get() ?></td>
        </tr>
        <tr>
            <td>isEven()</td>
            <td><?= var_export($testOne->isEven()) ?></td>
        </tr>
        <tr>
            <td>isOdd()</td>
            <td><?= var_export($testOne->isOdd()) ?></td>
        </tr>
        <tr>
            <td>isPrime()</td>
            <td><?= var_export($testOne->isPrime()) ?></td>
        </tr>
    </table>

    <h2>Test Two</h2>
    <table>
        <tr>
            <td colspan="2">Value set using setter.</td>
        </tr>
        <tr>
            <td>get()</td>
            <td><?= $testTwo->get() ?></td>
        </tr>
        <tr>
            <td>isEven()</td>
            <td><?= var_export($testTwo->isEven()) ?></td>
        </tr>
        <tr>
            <td>isOdd()</td>
            <td><?= var_export($testTwo->isOdd()) ?></td>
        </tr>
        <tr>
            <td>isPrime()</td>
            <td><?= var_export($testTwo->isPrime()) ?></td>
        </tr>
    </table>

</body>
</html>