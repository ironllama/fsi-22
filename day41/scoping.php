<?php

class Person {
    protected $_age;

    function __construct($inAge) {
        if ($inAge > 18) {
            $this->_age = $inAge;
        }
        else {
            throw new Exception("You're too young to use this.");
        }
    }

    public function getAge() {
        return $this->_age;
    }
}

class Employee extends Person {
    public $id;
    private $_clearance;

    function __construct($inAge, $inId, $inClear) {
        parent::__construct($inAge);

        $this->id = $inId;
        $this->_clearance = $inClear;
    }

    function something() {
        echo $this->_age;
    }
}

$bob = new Person(12);

// print_r($bob);
// echo "BOB:", $bob->_age;
echo "BOB: ", $bob->getAge(), PHP_EOL;

$mary = new Employee(34, "dfhsdkfjs", "HIGH");
echo "MARY: ", $mary->id, ", ", $mary->getAge(), PHP_EOL;

echo "SOMETHING:", $mary->something();
// echo "AGE:", $mary->_age;
