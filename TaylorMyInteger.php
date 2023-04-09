<?php

class TaylorMyInteger {

    private int $value;

    function __construct(int $value = 0){
        $this->value = $value;
    }

    function set_value(int $value){
        $this->value = $value;
    }

    function get_value(){
        return $this->value;
    }

    function isEven() : bool {
        return $this->value % 2 == 0;
    }

    function isOdd() : bool {
        return !$this->isEven();
    }

}

//-----------------------------------------

echo "Creating object using constructor and an initial value of 5.\n";
$testOne = new TaylorMyInteger(5);
echo "Value : " . $testOne->get_value();
echo "\n";
echo " : isEven()" . var_export($testOne->isEven()); //booleans won't echo without var_export()
echo "\n";
echo "  : isOdd()" . var_export($testOne->isOdd()); //don't ask me why, but the var_export prints first

echo "\n\n";

echo "Creating a second object without using constructor and setting the value to 4 using setter. \n";
$testTwo = new TaylorMyInteger();
$testTwo->set_value(4);
echo "Value : " . $testTwo->get_value();
echo "\n";
echo "  : isEven()" . var_export($testTwo->isEven()); //booleans won't echo without var_export()
echo "\n";
echo " : isOdd()" . var_export($testTwo->isOdd()); //don't ask me why, but the var_export prints first


?>