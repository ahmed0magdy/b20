<?php

class mobile {
    public $brand;
    public $color = 'black';

    public function trunOn()
    {
        return "Welcome From {$this->brand} <br>";
    }
    public function spces()
    {
        return $this;
    }
    public function printMessage()
    {
        echo $this->brand;
        echo $this->trunOn();
    }
}

$note20 = new mobile;
$note20->brand = 'Samsung';
// echo $note20->trunOn();
// print_r($note20->spces());
$note20->printMessage();

$iphone13 = new mobile;
$iphone13->brand = 'Apple';
// echo $iphone13->trunOn();
// print_r($iphone13->spces());
$iphone13->printMessage();

$oppoF9 = new mobile;
$oppoF9->brand = "OPPO";
// echo $oppoF9->trunOn();
// print_r($oppoF9->spces());

