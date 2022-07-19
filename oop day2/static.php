<?php


class person {
    public $id;
    public $name;
    public $email;
    public $password;
    public function login()
    {
        
    }
}



class pic {
    public static function changePic($pic)
    {
        echo "pic";
    }
}

class user  {
    public function changeProfileData()
    {
        $pic = '';
        pic::changePic($pic);
    }
}

class product {
    public function changeProductData()
    {
        $pic = '';
        pic::changePic($pic);
    }
}
