<?php

class chat {
    public $text;

    public function openChat()
    {
        echo "open chat <br>";
        return $this;
    }
    public function closeChat()
    {
        echo "close chat <br>";
        return $this;
    }
    public function send()
    {
        echo "{$this->text} <br>";
        return $this;
    }
}

$message = new chat;
$message->text = 'How Are You?';
// $message->openChat();
// $message->send();
// $message->closeChat();

$message->openChat()->send()->closeChat()->openChat();
?>

