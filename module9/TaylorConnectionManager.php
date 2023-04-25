<?php

/*
    Taylor Reid
    4/18/2023
    CSD 440 Module 8 Assignment

    The purpose of this program is to create, populate, and test a MySQL table on a topic that interests me using MySQLi.
    For my topic I decided to create a table to help track tipped income, since as a tipped employee it can be very tricky to track how much I'm actually making.
*/

//Reusable preconfigured connection object that allows for quick changes to connection details without having to modify every single file.
class ConnectionManager extends mysqli {

    function __construct(){

        $host = "localhost";
        $username = "student1";
        $password = "pass";
        $database = "baseball_01";

        parent::__construct($host, $username, $password, $database);
    }

}

?>