<?php 
abstract class Model
{
    private $attributes = [];
    protected static $table;

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
        return $this;
    }
    public function __get($name)
    {
        if (isset($this->attributes[$name])) {
            return $this->attributes[$name];
        } else{
            return false;
        }
    }
    public function __isset($name)
    {
        return isset($this->attributes[$name]);
    }

    protected function prepareData($data)
    {
        $res = array();
        foreach ($data as $key => $value) {
            if (is_scalar($value)) {
                $res[$key] = $this->cleanData($value);
            }
        }
    }
    protected function cleanData($value)
    {
        if(is_string($value) & !empty($value)){
            return "'".addslashes($value)."'";
        } elseif (is_bool($value)){
            return $value ? 'TRUE' : 'FALSE';
        } elseif ($value !== ''){
            return $value;
        } else {
            return 'NULL';
        }
    }

    public function save()
    {
        $data = $this->prepareData($this->attributes);
        if (!isset($this->id)) {
            $query = "INSERT INTO " . $this->table . 
            " (" . implode(', ', array_keys($this->data)) . ") VALUES " . 
            "('" . implode("', '", array_values($this-> data)) . "')";
        } else {
            foreach ($this->data as $key => $value) {
                if ($key !== 'id') {
                    $auxArray[] = "{$key}={$value}";
                }
            }
            $query = "UPDATE ". $this->table . 
            " SET " . implode(',', $auxArray) .
            " WHERE id='{$this->id}'";
        }

        if ($conn = Config::connect()) {
            $stmt = $conn->prepare($query);
            if ($stmt->execute()) {
                return $stmt->rowCount();
            } else{
                return false;
            }
        }
    }

    public static function findAll()
    {
        $table = static::$table;
        if ($conn = Config::connect()) {
            $result = array();
            $stmt = $conn->prepare('SELECT * from ' . $table);
            if($stmt->execute()){
                while ($res = $stmt->fetchObject(Model::class)) {
                    $result[] = $res;
                }
            }  
            if (count($result) > 0) {
                return $result;
            }
        }
        return false;
    }

    public static function findById($id)
    {
        $table = static::$table;
        if($conn = Config::connect()){
            $stmt = $conn->prepare("SELECT * from {$table} WHERE id={$id})");
            if($stmt->execute()){
                if ($stmt->rowCount() > 0) {
                    $res = $stmt->fetchObject('Model');
                    if ($res) {
                        return $res;
                    }
                }
            }
            return false;
        }
    }

    public static function deleteById($id)
    {
        $table = static::$table;
        if($conn = Config::connect()){
            $stmt = $conn->prepare("DELETE FROM {$table} WHERE id={$id}");
            if($stmt->execute()){
                return true;
            } else {
                return false;
            }
        }
    }
}
?>