<?php

namespace App\Database\Models;
use App\Database\Config\Connection;

class Model extends Connection {
    const TABLE = '';
    public static function all()
    {
        $query = "SELECT * FROM " . static::TABLE;
    }
    public static function find(int $id)
    {
        $query = "SELECT * FROM " . static::TABLE . " WHERE id = {$id}";
    }
}