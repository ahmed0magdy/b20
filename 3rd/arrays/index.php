<?php
# indexed array => element(index,value) , index=> unique numeric key
$array = [1,'ahmed',null];
$users = ['esraa','basel' , 'ziaad', 'sandy','asmaa','galal'];

// $lastIndex = count($users) - 1;
$users[6] = 'sondos';
$users[7] = 'abduallah';
$users[2] = 'abdrahaman';
$users[] = 'nada';
$users[] = 'samr';

// echo $users[6];
// print_r($users);

# associative array => element(key , value) , key => unique string key
$product = [
    'price'=>5000,
    'quantity'=>5,
    'status'=>true,
    'name'=>'mobile'
];

// echo $product['quantity'];
// $product['code'] = 123456;
// $product['price'] = 7000;
// print_r($product);
// 

$_POST;
$_GET;
$_REQUEST;

// echo $_POST[1];

// echo $_POST['name'];