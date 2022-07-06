<?php

function addNumbers($number2 = 0,$number1 = 0,$number3 = 0){
    return $number1 + $number2 + $number3;
}

// echo addNumbers(1,2);
// echo addNumbers(5,2,3);
// echo addNumbers();

function printFullName($lastName,$firstName= '*',$middleName = '*'){
    echo "{$firstName} {$middleName} {$lastName} <br>";
}

// printFullName('abdelwahed','husseny');
// * abdelwahed husseny
// printFullName('husseny','galal');
// galal *      husseny

#Named Args
// * abdelwahed husseny
printFullName(lastName:"husseny",middleName:"abdelwahed");
// galal *      husseny
printFullName(lastName:"husseny",firstName:"galal");
