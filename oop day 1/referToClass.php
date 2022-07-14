<?php

class User {
    public $name;
    public $gender;
    public static $status = 'active';
    public const bonus = 50;

    public  function login()
    {
        echo "k";
    }

    public static function logout()
    {

    }

    public function print()
    {
        // echo $this->name; // refer to current object inside class
        // echo $this->gender;
        // echo $this->login();
        echo "<br>";

        echo User::$status;
        echo User::bonus;
        echo User::logout();
        echo "<br>";
        //////////////////////////////// refer to current class inside class

        echo self::$status;
        echo self::bonus;
        echo self::logout();
        echo "<br>";

        //////////////////////////////// refer to ?

        echo static::$status;
        echo static::bonus;
        echo static::logout();
        echo "<br>";

       
    }
}

$user = new user;
$user->print();
// $user->name = 'galal';
// $user->login();

// echo User::bonus; // scope resolution operator // double colon
// echo User::$status;
// echo User::login();
