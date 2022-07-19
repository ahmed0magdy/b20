<?php
# calculate area of different shapes ?

interface shape {
    function area();
}

class square implements shape {
    public $side;
    public function area()
    {
        return $this->side ** 2 ;
    }
}

class circle implements shape {
    public $raduis;
    public function area()
    {
        return pi() * ($this->raduis ** 2);
    }
}

class rect implements shape {
    public $width;
    public $height;
    public function area()
    {
        return $this->width * $this->height;
    }
}

#######################################################

