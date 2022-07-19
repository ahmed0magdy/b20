<?php

trait media {
    public $id;
    public function changePic()
    {
        echo "pic";
    }
}
trait data {
    public function get()
    {
        echo "data";
    }
}

trait generalTrait {
    use media,data;
}

class user {
    use generalTrait;
}

class prodcut {
    use generalTrait;
}

(new user)->changePic();
(new prodcut)->changePic();