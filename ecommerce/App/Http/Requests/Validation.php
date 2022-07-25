<?php
namespace App\Http\Requests;

use App\Database\Models\Model;

class Validation {
    private $value; // Galal
    private $valueName; // first name
    private array $errors = [];
   
    public function required() :self
    {
        if(empty($this->value)){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Is Required";
        }
        return $this;
    }

    public function max(int $max) :self
    {
        if(strlen($this->value) > $max){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Must be less than {$max} Characters";
        }
        return $this;
    }

    public function min(int $min) :self
    {
        if(strlen($this->value) < $min){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Must be greater than {$min} Characters";
        }
        return $this;
    }

    public function confirmed($comparedValue) :self
    {
        if($this->value != $comparedValue){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Not Confirmed ";

        }
        return $this;
    }

    public function regex(string $pattern,$message = null) :self
    {
        if(! preg_match($pattern,$this->value)){
            $this->errors[$this->valueName][__FUNCTION__] = $message ?? "{$this->valueName} Invalid";
        }
        return $this;
    }

    public function in(array $values)
    {
        if(! in_array($this->value,$values)){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Must be " . implode($values);
        }
        return $this;
    }

    public function string()
    {
        if( ! is_string($this->value)){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Must be string";
        }
        return $this;
    }

    public function unique(string $table,string $column)
    {
        $model = new Model;
        $stmt = $model->con->prepare("SELECT * FROM {$table} WHERE {$column} = ?");
        $stmt->bind_param('s',$this->value);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Already Exists";
        }
        return $this;
    }

    public function exists(string $table,string $column)
    {
        $model = new Model;
        $stmt = $model->con->prepare("SELECT * FROM {$table} WHERE {$column} = ?");
        $stmt->bind_param('s',$this->value);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 0){
            $this->errors[$this->valueName][__FUNCTION__] = "{$this->valueName} Dosen't Exists";
        }
        return $this;
    }



    /**
     * Set the value of value
     *
     * @return  self
     */ 
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Set the value of valueName
     *
     * @return  self
     */ 
    public function setValueName($valueName)
    {
        $this->valueName = $valueName;

        return $this;
    }

    /**
     * Get the value of errors
     */ 
    public function getErrors()
    {
        return $this->errors;
    }
    /**
     * Get the value of errors
     */ 
    public function getError(string $error) :?string
    {
        if(isset($this->errors[$error])){
            foreach($this->errors[$error] AS $error){
                return $error;
            }
        }
        return null;
    }

    public function getMessage(string $error)  :string
    {
        return  "<p class='text-danger font-weight-bold'>".ucwords($this->getError($error))."</p>";
    }
}