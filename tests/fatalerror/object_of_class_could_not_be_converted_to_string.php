<?php
    $object1 = new User("Pickle", "YouGotIt");  
    $object1->name  = "Alice";

    echo "$object1 name = " . $object1->name . "<br>"; /* this triggers the error */

    class User
    {
        public $name, $password;

        function __construct($n, $p) { // class constructor
            $name = $n;
            $password = $p;
        }
    }