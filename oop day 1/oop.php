<?php

// class => blueprint which group similar tasks => organize application structure
# access modifiers => (public - protected - private)
// class className {
    // property => variables
    // method => functions
    // constants
// }

// object => instance to access class scope (local scope) into global scope


# class user
// function login
// function logout
// function register

# class order
// function placeOrder
// function cancelOrder 
// function reviewOrder

# class product
// function showAllProducts 
// function showRecentProducts 
// function showMostOrderedProducts


class User {
    public $name; 
    public $email;
    public $password;
    public $gender;
    public $phone;
    public $image  = 'default.png';

    public function login(string $email,string $password){
        $x = 5;
       
        if($x){

        }
        for ($i=0; $i < 5; $i++) { 
            echo $x;
        }
    }

    public function logout(){
        echo $x;
    }

    public function register()
    {

    }
}

$user1 = new User;
$user1->login('galal@gmail.com',123456);
$user1->name = 'asmaa';
$user1->email = 'asmaa@gmail.com';
$user1->password = 123456;
$user1->phone = 23135525;
$user1->gender = 'f';
$user1->image = '1.png';
$user1->code = 123456;

$user2 = new User;
$user2->name = 'esraa';
$user2->email = 'esraa@gmail.com';
$user2->password = 123456;
$user2->phone = 65313212;
$user2->gender = 'f';
$user2->token = '123dffdsadf23dsas';


// echo $user1->gender;

$user3 = new user;

print_r($user1);
print_r($user2);
print_r($user3);


