<?php

// $number = 10; // glboal var


// function incrementNumber($number){
//     echo ++$number .'<br>'; // local var
// }
# pass by value
// incrementNumber($number); //11
// echo $number; //10


$number2 = 20; // glboal var

function incrementNumberByRef (&$number){
    echo ++$number .'<br>'; // global var
}
# pass by reference
// incrementNumberByRef($number3); //21
// echo $number3; //21


// function getData(){
//     $data = 123456; // local var
//     return $data;
// }

// echo getData();

$number1 = 10;
$number2 = 20;
$number3 = 30;
$sum = 0;

function addNUmbers($number1,$number2,&$number3){
    $sum = $number1 + $number2 + $number3;
    $number1 = 0;
    $number2 = 0;
    $number3 = 0;
    return $sum;
}

// echo addNUmbers($number1,$number2,$number3) .'<br>'; // 60
// echo $sum .'<br>'; // 0
// echo $number1 .'<br>'; // 10
// echo $number3 .'<br>'; // 0

// $count = 0;
// function counter(&$count){
//     return ++$count .'<br>';
// }


// echo counter($count); //1
// echo counter($count); //2
// echo counter($count); //3
// echo counter($count); //4

// $count = 0;

// function counterV2($count) {
//     echo ++$count .'<br>'; 
//     return $count; 
// }

// counterV2(counterV2(counterV2($count)));

function counterV3 (){
    static $count = 0;
    $count++;
    echo $count . '<br>';
}

// counterV3(); // 1
// counterV3(); // 2
// counterV3(); // 3

