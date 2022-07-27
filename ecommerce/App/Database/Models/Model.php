<?php

namespace App\Database\Models;
use App\Database\Config\Connection;

class Model extends Connection {
    const TABLE = '';
    public function all(array $columns = ['*'],array $filters = [])
    {
        $select = implode(', ',$columns);
        $query = "SELECT {$select} FROM " . static::TABLE;
        if(!empty($filters)){
            $query .= " WHERE";
            foreach($filters AS $index => $filter){
                if($index != 0){
                    $query .= " AND ";
                }
                $query .= " {$filter[0]} {$filter[1]} {$filter[2]}";
            }
        }
        return $this->con->query($query);
    }
    public function find(int $id)
    {
        $query = "SELECT * FROM " . static::TABLE . " WHERE id = ?";
        $stmt = $this->con->prepare($query);
        if(! $stmt){
            return false;
        }
        $stmt->bind_param('i',$id);
        $stmt->execute();
        return $stmt->get_result();
    }


}