<?php



trait mediav2 {
    public function uploadPhoto()
    {
        echo "upload photo from mediav2 <br>";
    }
}

trait mediav1 {
    public function uploadPhoto()
    {
        echo "upload photo from mediav1 <br>";
    }
}


class user {
    use mediav1,mediav2{
        mediav2::uploadPhoto As uploadPhotoMediaV2;
        mediav1::uploadPhoto insteadof mediav2;
    }
}


class client extends user {

}
(new client)->uploadPhotoMediaV2();
(new client)->uploadPhoto();


