<?php

class Paint {
    public $color;

    public function increaseBlack()
    {
        $this->color .= ' + black';
        return $this;
    }

    public function increaseWhite()
    {
        $this->color .= ' + white';
        return $this;
    }
}

$car = new Paint;
$car->color = 'blue';
echo $car->increaseBlack()->increaseBlack()->increaseWhite()->increaseBlack()->color; 
// blue + black + black + white + black