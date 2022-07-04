<?php

#app
// temp <= 0     => Snow Weather
// temp >= 30    => Hot Weather
// temp > 1      => Cold Weather 
// temp >= 15    => Warm Weather

$temp = 15;

if($temp <= 0) {
    $message = 'Snow Weather';
}elseif($temp >= 1 && $temp < 15){
    $message = 'Cold Weather';
}elseif($temp >= 15 && $temp < 30){
    $message = 'Warm Weather';
}else{
    $message = 'Hot Weather';
}

echo $message;



