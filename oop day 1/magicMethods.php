<?php
class User {
    public function __construct() {
        echo "hello <br>";
    }
    public function login()
    {
        echo "login <br>";
    }

    public function __destruct()
    {
        echo "bye <br>";
    }
}

class Admin {
    public function __construct() {
        echo "hello Admin  <br>";
    }
    public function login()
    {
        echo "login Admin <br>";
    }

    public function __destruct()
    {
        echo "bye Admin <br>";
    }
}

$user = new user;
$user->login();
echo "nti user <br>";
$admin = new admin;
$admin->login();
echo "nti admin <br>";