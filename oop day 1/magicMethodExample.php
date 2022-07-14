<?php

class wallet {
    public float $balance = 0;
    public const bonus = 50;

    public function __construct() {
        $this->addBonusToBalance();
    }

    public function getBalance() :float
    {
        return $this->balance;
    }

    public function deposite(float $depositeValue) :void
    {
        $this->balance += $depositeValue;
    }

    public function withdraw(float $withdrawValue) :void
    {
        $this->balance -= $withdrawValue;
    }

    public function addBonusToBalance() :void
    {
        $this->deposite(self::bonus);
    }
}

// $user = new Wallet;
// echo $user->getBalance(); // 50
// echo "<br>";
// $user->deposite(150);
// echo $user->getBalance(); // 200
// echo "<br>";
// $user->withdraw(100);
// echo $user->getBalance(); // 100
// echo "<br>";

class mail {
    public $mailTo;
    public $subject;
    public $body;
    public function __construct($mailTo,$subject="",$body="") {
        $this->mailTo = $mailTo;
        $this->subject = $subject;
        $this->body = $body;
    }

    public function send()
    {
        // echo $this->mailTo;
        // echo __CLASS__; // mail
    }
}
// echo mail::class; // mail
$mail = new mail("galal@gmail.com","Bassel Mohamed","https://www.github.com/bassel-mohamed");
$mail->send();


// anonymous functions. 
// anonymous class. 
// anonymous object. 