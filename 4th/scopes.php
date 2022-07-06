<?php
// global scope
// local scope


# local scope
// 1. function 
// 2. class 
// 3. interface 
// 4. trait 

$x = 4; // global scope


function test()
{
    $z = 10; // local scope 
    echo $z;
    echo $x;
}

// echo $y;
test();

function test2()
{
    echo $z;
    $y = 15; // local scope 
}

echo $z;
echo $y;


