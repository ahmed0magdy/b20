<?php

$person = 'f'; // f,m
$salary = 1500; // < 1000 => poor , >= 1000 => rich
# female poor

if($salary < 1000 AND $person == 'f'){
    $message = "female poor";
}elseif($salary >= 1000 AND $person == 'f'){
    $message = "female rich";
}elseif($salary < 1000 AND $person == 'm'){
    $message = "male poor";
}elseif($salary >= 1000 AND $person == 'm'){
    $message = "male rich";
}

// echo $message;

if($person == 'm'){
    $message = 'male';
}else{
    $message = 'female';
}


if($salary < 1000){
    $message .= " poor";
}else{
    $message .= " rich";
}

// echo $message;


if($person == 'm'){
    $message = "male";
    if($salary < 1000){
        $message .= " poor";
    }else{
        $message .= " rich";
    }
}else{
    $message = "female";
    if($salary < 1000){
        $message .= " poor";
    }else{
        $message .= " rich";
    }
}

echo $message;

