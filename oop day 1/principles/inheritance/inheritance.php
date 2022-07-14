<?php
// inheritance => reduce code duplication
// php single inheritance
// parent class - super class
// child class - sub class

# parent class
class mobile {
    public $name;
    public $color;
    public $price;
    public $os;
    public $ram;
    public $storage;
    public $battery;
    // public $camera;
    public $screen;
    public $charger = true;
    public static $madeIn = "China";
    public const version = 1.1;
}
# child class
class samsung extends mobile {
    public $screenFingerPrint = true;
    public const version = 2.2;    
}
# child class
class apple extends mobile {
    public $faceId = true;
    public $charger = false;
}

echo mobile::version;

