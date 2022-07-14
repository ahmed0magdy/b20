<?php
// access modifiers (public - protectd - private)
// public [global scope- parent scope-child scope]
// protected [ parent scope-child scope]
// private [parent scope]
class mobile {
    private $color = 'black';
    public function print()
    {
        echo $this->color;
    }
}

class samsung extends mobile {
    public function printData()
    {
        echo $this->color;
    }
}

$mobile = new mobile;
print_r($mobile);
// echo $mobile->color; // global scope
// $mobile->print(); // parent scope
$samsung = new samsung;
// $samsung->printData(); // child scope
print_r($samsung);
