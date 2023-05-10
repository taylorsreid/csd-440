<!--
    Taylor Reid
    5/3/2023
    CSD 440 Module 10 Assignment

    The purpose of this program is to create a form with at least 8 fields of data, then when the form is submitted it encode it into JSON and display it.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taylor JSON</title>

    <style>
        #header {
            text-align: right;
        }

        #title {
            text-align: center;
        }

        .content {
            margin: auto;
            /* text-align: center; */
            background-color: lightgray;
            width: fit-content;
            padding: 2rem;
            border-radius: 2rem;
        }

        h1, h2 {
            text-align: center;
        }

        /* disable number input arrows for Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* disable number input arrows for Firefox */
        input[type=number] {
            appearance: textfield;
            -moz-appearance: textfield;
        }

        .block {
            margin-bottom: 1rem;
        }
    </style>

</head>
<body>

<div id="header">
    <p>Taylor Reid</p>
    <p>5/3/2023</p>
    <p>CSD 440 Module 10 Assignment</p>
</div>

<?php if ($_SERVER["REQUEST_METHOD"] == "GET") { //loaded on normal page load ?>

    <h1 id="title">Make a Payment</h1>
    
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="content">

        <div class="block">
            <label for="cardNumber">Card Number:</label>
            <input type="number" name="cardNumber" id="cardNumber" required style="width: 19ch;" min="1" max="9999999999999999999"> <!-- credit cards can now be up to 19 digits -->
        </div>

        <div class="block">
            <label for="cardHolderName">Cardholder Name:</label>
            <input type="text" name="cardHolderName" id="cardHolderName" required>
        </div>

        <div class="block">
            <label>Expiration:</label>
            <select name="expirationMonth" id="expirationMonth" required>
                <option>MM</option>
                <?php
                    for ($i = 1; $i <= 12; $i++) { // output 12 months of options
                        echo "<option value='$i'>$i</option>";
                    }
                ?>
            </select>
             / 
            <select name="expirationYear" id="expirationYear" required>
                <option>YY</option>
                    <?php
                        $currentYear = date("y");
                        $tenYearsOut = $currentYear + 10;
                        for ($i = $currentYear; $i <= $tenYearsOut; $i++) { // output 10 years into the future
                            echo "<option value='$i'>$i</option>";
                        }
                    ?>
                </select>
            &emsp;
            <label for="ccv">CCV:</label>
            <input type="number" name="ccv" id="ccv" required style="width: 4ch;" min="0" max="999">
        </div>

        <div class="block">
            <label for="paymentDate">Payment Date:</label>
            <input type="date" name="paymentDate" id="paymentDate" required min="<?= date("Y-m-d") ?>" value="<?= date("Y-m-d") ?>"> <!-- minimum date & placeholder today -->
        </div>

        <div class="block">
            <label for="amount">Payment Amount:</label>
            $<input type="number" name="amount" id="amount" required style="width: 7ch;" step="0.01"> <!-- step of 1 cent -->
        </div>

        <div class="block">
            <label for="memo">Memo:</label><br>
            <textarea name="memo" id="memo" cols="40" rows="10" placeholder="optional"></textarea>
        </div>

        <div class="block">
            <input type="submit" id="submitButton" value="Submit">
        </div>
        
    </form>

<?php } ?>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { //loaded on form submission ?>

    <h1 id="title">Payment Details as JSON:</h1>
    <pre class="content"> <!-- preformatted content -->
        <?php
            try {
                //not using JSON_NUMERIC_CHECK because it strips off leading zeros
                echo json_encode($_REQUEST, JSON_PRETTY_PRINT);
            }
            catch (\Throwable $th) {
                die($th->__toString());
            }
        ?>
    </pre>

<?php } ?>
    
</body>
</html>