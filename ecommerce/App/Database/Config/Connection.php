<?php
namespace App\Database\Config;

class Connection {
    private string $db_hostname = 'localhost';
    private string $db_username = 'root';
    private string $db_password = '';
    private string $db_name = 'nti_ecommerce';
    private int $db_port = 3307;
    protected \mysqli $con;

    public function __construct() {
        $this->con = new \mysqli($this->db_hostname,$this->db_username,$this->db_password,$this->db_name,$this->db_port);
    }
    public function __destruct()
    {
        $this->con->close();
    }
}
