<!--
    Taylor Reid
    4/3/2023
    CSD 440 Module 4 Assignment

    The purpose of this program is to create and display an array of customers (minimum of 10 customers) that includes their first name, last name, age, and phone number.
    Then, using array methods, find several records and display the customer information based on different data fields.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers - Taylor Reid</title>

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
        <p>4/3/2023</p>
        <p>CSD 440 Module 5 Assignment</p>
    </div>
    
    <h1 id="title">Customers</h1>
        
    <?php
    
        //main array
        $customers = array(

            array(
                "firstName" => "Taylor",
                "lastName" => "Reid",
                "age" => 30,
                "phoneNumber" => "321-265-2366"
            ),

            array(
                "firstName" => "Maurice",
                "lastName" => "Moss",
                "age" => 35,
                "phoneNumber" => "0118 999 881 999 119 725 3"
            ),

            array(
                "firstName" => "Emily",
                "lastName" => "Thompson",
                "age" => 64,
                "phoneNumber" => "567-890-1234"
            ),

            array(
                "firstName" => "Gabriel",
                "lastName" => "Martinez",
                "age" => 48,
                "phoneNumber" => "234-567-8901"
            ),

            array(
                "firstName" => "Olivia",
                "lastName" => "Lee",
                "age" => 22,
                "phoneNumber" => "678-901-2345"
            ),

            array(
                "firstName" => "Ethan",
                "lastName" => "Rodriguez",
                "age" => 36,
                "phoneNumber" => "123-456-7890"
            ),

            array(
                "firstName" => "Sophia",
                "lastName" => "Johnson",
                "age" => 53,
                "phoneNumber" => "890-123-4567"
            ),

            array(
                "firstName" => "Alexander",
                "lastName" => "Kim",
                "age" => 19,
                "phoneNumber" => "345-678-9012"
            ),

            array(
                "firstName" => "Isabella",
                "lastName" => "Davis",
                "age" => 41,
                "phoneNumber" => "901-234-5678"
            ),

            array(
                "firstName" => "William",
                "lastName" => "Nguyen",
                "age" => 27,
                "phoneNumber" => "456-789-0123"
            )            

        );

        //get arrays of column names to be used later
        $firstNames = array_column($customers, "firstName");
        $lastNames = array_column($customers, "lastName");
        $ages = array_column($customers, "age");

        //create copies so that array_multisort() doesn't modify the original
        $sortedByFirstNames = $customers;
        $sortedByLastName = $customers;
        $sortedByAges = $customers;
        $nonUsPhoneNumbers = array(); //intentionally empty array

        //multisort arrays by first parameter, order by second, output results into third
        array_multisort($firstNames, SORT_ASC, $sortedByFirstNames);
        array_multisort($lastNames, SORT_ASC, $sortedByLastName);
        array_multisort($ages, SORT_ASC, $sortedByAges);

        //retrieve customers age of 30 or under
        $customersThirtyAndUnder = array_filter($customers, function ($customer) {
            return ($customer["age"] <= 30);
        });

        //retrieve customers whose phone number pattern does not meet the US format (in regex)
        $usPhonePattern = '/^\\d\\d\\d-\\d\\d\\d-\\d\\d\\d\\d$/i';
        foreach ($customers as $customer) {
            if (!preg_match($usPhonePattern, $customer['phoneNumber'])) {
                array_push($nonUsPhoneNumbers, $customer);
            }
        }

        //reusable function to print all of the results that we have generated thus far into a table
        function arrayToTable(array $array, string $title){

            echo "<h2>" . $title . "</h2><table><tr><th>First Name</th><th>Last Name</th><th>Age</th><th>Phone Number</th></tr>";

            foreach ($array as $customer) {
                echo "<tr>";
                echo "<td>" . $customer['firstName'] . "</td>";
                echo "<td>" . $customer['lastName'] . "</td>";
                echo "<td>" . $customer['age'] . "</td>";
                echo "<td>" . $customer['phoneNumber'] . "</td>";
                echo "</tr>";
            }

            echo "</table><hr>";

        }

        //print all generated results
        arrayToTable($customers, "Original Data Set");
        arrayToTable($sortedByFirstNames, "Sorted By First Name Ascending");
        arrayToTable($sortedByLastName, "Sorted By Last Name Ascending");
        arrayToTable($sortedByAges, "Sorted By Age Ascending");
        arrayToTable($customersThirtyAndUnder, "Customers 30 and Under");
        arrayToTable($nonUsPhoneNumbers, "Customers With a Non US Phone Number");

    ?>

</body>
</html>