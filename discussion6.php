<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion 6 Class Declaration and $this Reference Demo</title>
</head>
<body>
    
    <?php

        class Person {
            
            // Class properties (variables)
            private string $lastName;
            private string $firstName;

            // Class constructor
            function __construct(string $lastName, string $firstName){
                $this->lastName = $lastName;
                $this->firstName = $firstName;
            }

            // Class getters
            function getLastname(){
                return $this->lastName;
            }
            function getFirstName(){
                return $this->firstName;
            }

            // Class setters
            function setLastName(string $lastName){
                $this->lastName = $lastName;
            }
            function setFirstName(string $firstName){
                $this->firstName = $firstName;
            }

        }

        //PHP also supports inheritance using the ‘extends’ keyword, similar to Java:

        class Employee extends Person {

            // Class properties (variables)
            private string $employeeId;
            private string $department;

            // Class constructor
            function __construct(string $lastName, string $firstName, string $employeeId, string $department){
                $this->employeeId = $employeeId;
                $this->department = $department;
                parent::__construct($lastName, $firstName); //equivalent to calling super() in Java
            }

            // Class getters
            function getEmployeeId(){
                return $this->employeeId;
            }
            function getDepartment(){
                return $this->department;
            }

            // Class setters
            function setEmployeeId(string $employeeId){
                $this->employeeId = $employeeId;
            }
            function setDepartment(string $department){
                $this->department = $department;
            }

        }

        // create Employee class instance
        $myEmployee = new Employee("Reid", "Taylor", "46", "Bell Services");

    ?>

    <!-- test Employee class instance -->
    <h1>Discussion 6 Class Declaration and $this Reference Demo</h1>
    <h2>Employee</h2>
    <table>
        <tr>
            <td>Last Name:</td>
            <td><?= $myEmployee->getLastName() ?></td>
        </tr>
        <tr>
            <td>First Name:</td>
            <td><?= $myEmployee->getFirstName() ?></td>
        </tr>
        <tr>
            <td>Employee ID:</td>
            <td><?= $myEmployee->getEmployeeId() ?></td>
        </tr>
        <tr>
            <td>Department:</td>
            <td><?= $myEmployee->getDepartment() ?></td>
        </tr>
    </table>

</body>
</html>