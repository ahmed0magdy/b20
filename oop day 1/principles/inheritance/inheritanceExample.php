<?php

class person {
    public $id;
    public $name;
    public $email;
    public $password;
    public const personType = "Client";
    public  function login()
    {
        echo "login with email & password <br>";
    }
    public static function logout()
    {
        echo "logout <br>";
    }
}

class client extends person {

}

class seller extends person {
    public $phone;
    public $nationalId;
    public $productType;
    public const personType = "Seller";
    # override
    public function login()
    {
        echo "login with phone & password <br>";
    }
}

class admin extends seller {

}
$client = new client;
$client->login();

$seller = new seller;
$seller->login();