<?php
class user {
    private $id;
    private $name;
    private $gender;
    private $email;
    private $password;
    private const MIN_PASSWORD_LENGTH = 8;
    private const AVIALABLE_GENDERS = ['m','f'];

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        if(strlen($password) < self::MIN_PASSWORD_LENGTH){
            echo " Password Length Must be greater than " . self::MIN_PASSWORD_LENGTH . " characters";
        }else{
            $this->password = password_hash($password,PASSWORD_BCRYPT);
        }
    }
    public function setGender($gender)
    {
        if(in_array($gender,self::AVIALABLE_GENDERS)){
            $this->gender = $gender;
        }else{
            echo " Available Genders " . implode(",",self::AVIALABLE_GENDERS);
        }
    }
    public function getGender()
    {
        return $this->gender == 'm' ? 'male' : 'female';
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}

$user = new user;
// $user->password = 123;
// echo $user->password;
// $user->setPassword(123456789);
// echo $user->getPassword();
// $user->setGender('m');
// echo $user->getGender();