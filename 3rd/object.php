<?php
# object => elements (property,value) , property unique string key

$user = (object)[
    'id'=>1,
    'name'=>'esraa',
    'email'=>'esraa@gmail.com'
];

// echo $user->email;
// $user->phone = '12316532';
// $user->email = 'esraa@outlook.com';
print_r($user);