<?php

    //really showing my age with these song lyrics 🙄
    $oceanAvenue = "I remember the look in your eyes, When you told me that this was goodbye, You were beggin' me not tonight not here not now";

    var_dump(str_split($oceanAvenue)); //str_split(string) creates an indexed array of each character in the string

    var_dump(str_split($oceanAvenue, 10)); //str_split(string, int) creates an indexed array with each element (except the last) being the length specified by the second argument

    var_dump(explode(",", $oceanAvenue)); //explode() allows you to specify a delimiter to split the string by

?>