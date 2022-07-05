<?php
$users = ['esraa','basel' , 'ziaad', 'sandy','asmaa','galal'];
# for
// for (counter intializtion; condition; step) { 
//     # code...
// }

// for($counter = 0;false;$counter++){
//     echo "hello <br>";
// }

// for($i=0;$i < 6;$i++){
//     echo $users[$i] . '<br>';
// }

// for($i = 5;$i >= 0;$i--){
//     echo $users[$i] .'<br>';
// }
$lastIndex = count($users) - 1;
// for($i=0;$i <= $lastIndex;$i++){
//     echo $users[$i] .'<br>';
// }

// for($i=$lastIndex;$i >= 0;$i--){
//     echo $users[$i] .'<br>';
// }

// for($counter = 10;$counter <= 50;$counter+=10){
//     echo "hello <br>";
// }

# while 
//  counter
// while(condition){
    # code
    // step
// }
// $counter = $lastIndex;
// while($counter >= 0){
//     echo $users[$counter] . '<br>';
//     $counter--;
// }

// $counter = 0;
// while($counter <= $lastIndex){
//     echo $users[$counter] . '<br>';
//     $counter++;
// }

# do while
// counter 
// do {
    # code 
    // step 
// }while(conditon);
// 
// $counter = 0;
// do{
//     echo $users[$counter] . '<br>';
//     $counter++;
// }while($counter <= $lastIndex);

// $counter = $lastIndex;
// do{
//     echo $users[$counter] . '<br>';
//     $counter--;
// }while(false);

# foreach
// foreach ($variable as $key => $value) {
    # code...
// }

// foreach($users AS $index => $value){
//     echo "{$index} - {$value} <br>";
// }

$product = (object)[
    'price'=>5000,
    'quantity'=>5,
    'status'=>true,
    'name'=>'mobile'
];

// foreach($product AS $property=>$value){
//     echo "{$property} ===>> {$value} <br>";
// }

// foreach($product AS $value){
//     echo " {$value} <br>";
// }