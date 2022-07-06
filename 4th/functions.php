<?php

// function functionName (i/ps) {
    // block of code

    // return o/p 
// }

# no i/ps , no o/p
// printHello();
// function printHello(){
//     echo "hello <br>";
// }
// printHello();

// i/ps , o/p
function AddNumbers($number1,$number2){
    return $number1 + $number2;
}

// $sum = AddNumbers(10,5);
echo AddNumbers(50,10); 
// if(AddNumbers(10,5) > 10){
    // echo "big number";
// }else{
    // echo "small number";
// }


// i/p , no o/p 
function addNumbersV2($number1 , $number2)
{
    echo $number1 + $number2;
    die;
    echo 'ok';
}

// addNumbersV2(10,5);

// no i/ps , no o/p
// function addNumbersV3()
// {
//     $number1 = 10;
//     $number2 = 10;
//     echo $number1 + $number2;
// }

// addNumbersV3();
// addNumbersV3();

function test() {
    return [
        1,2,3
    ];
    // echo "ok";
}

print_r(test());