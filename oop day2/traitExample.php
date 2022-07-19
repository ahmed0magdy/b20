<?php

class person1 {
    public $id;
    public $name;
    public function uploadPhoto()
    {
        echo "upload photo from person1 <br>";
    }
}

trait media1 {
    public function uploadPhoto()
    {
        echo "upload photo from media1 <br>";
    }
}


class user extends person1 {
    use media1;
    public function uploadPhoto()
    {
        echo "upload photo from user <br>";
    }
}

(new user)->uploadPhoto(); // trait -> highest priority