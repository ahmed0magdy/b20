<?php

$gender = 'f';

// if($gender == 'm')
//     echo "male";
// else 
//     echo "female";


#ternary operator
// (TRUE||FALSE) ? "true case" : "false case";
$userGender =  $gender == 'm' ? 'male' : 'female';

# null operator
// $code = 123456;

// if($code == null){
//     echo "no code";
// }

// if(is_null($code)){
//     echo "no code";
// }

echo $code ?? "no code";
// 
