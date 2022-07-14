<?php
class Model {
    public $primaryKey = 'id';
    const table = "Model";
    function __construct()
    {
        echo "Property :" . self::table . " in :". self::class ." class <br>";
        echo "Property :" . static::table . " in :". static::class ." class<br>";
        echo "########## End Parent Constructor ###########<br>";
    }

    public function getTableName()
    {
        echo "Model <br>";
    }

    public static function getTableNameStaticlly()
    {
        echo "Model Staticlly <br>";
    }
}
class User extends Model {
    const table = "User";
    function __construct()
    {
        parent::__construct();    
        echo "Property : " . parent::table . "<br>";
        echo "Property : " . self::table   . "<br>";
        echo "Property : " . static::table . "<br>";
        echo "########## End Chlid Constructor ###########<br>";
    }

    public function getTableName()
    {
        echo "User <br>";
    }

    public function print()
    {
        parent::getTableName();
        $this->getTableName();
        parent::getTableNameStaticlly();
    }
}
$user = new User;$user->print(); // output
