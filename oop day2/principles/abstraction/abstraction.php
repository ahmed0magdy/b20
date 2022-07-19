<?php
// client => login => email & password
// admin => login => phone & password

abstract class person {
    public $id;
    public $name;
    public $email;
    public $phone;
    public $password;
    public $gender;
    public abstract function login();
    
    public function logout()
    {
        echo "logout";
    }
}

class client extends person {
    public function login()
    {
        echo "email & password";
    }
}

$client = new client;
$client->login();

class adimn extends person {
    public function login()
    {
        echo "phone & password";
    }
}

$adimn = new adimn;
$adimn->login();
