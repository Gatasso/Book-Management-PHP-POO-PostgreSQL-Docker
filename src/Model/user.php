<?php 

class User extends Config{
    private $attributes;

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
        return $this;
    } 
    public function __get($name)
    {
        if(isset($this->attributes[$name])){
            return $this->attributes[$name];
        }else{
            return null;
        }
    }
    public function __isset($name)
    {
        return isset($this->attributes[$name]);
    }


    public function save()
    {
        $data = $this->prepare($this->attributes);
        if(!isset($this->id)){
            $attrs = implode(", ", array_keys($data));
            $values = implode(", ", array_values($data));
            $query = "INSERT INTO Users ($attrs) VALUES ($values)";
        }else{
            foreach ($data as $key => $value) {
                if ($key !== 'id') {
                    $define[] = "{$key}={$value}";
                }
            }
            $query = "UPDATE Users SET ".implode(', ', $define)." WHERE id='{$this->id}';";
        }

        if ($conn = Config::connect()){
            $stmt= $conn->prepare($query);
            if($stmt->execute()){
                return $stmt->rowCount();
            }
        }
        return false;
    }

    private function prepare($data)
    {
        $result = array();
        foreach ($data as $key => $value) {
            if (is_scalar($value)) {
                $result[$key] = $this->escape($value);
            }
        }
        return $result;
    }

    private function escape($data)
    {
        if (is_string($data) & !empty($data)) {
            return "'".addslashes($data)."'";
        } elseif (is_bool($data)) {
            return $data ? 'TRUE' : 'FALSE';
        } elseif ($data !== '') {
            return $data;
        } else {
            return 'NULL';
        }
    }

    public static function findAll()
    {
        $conn = Config::connect();
        $stmt = $conn->prepare('SELECT * FROM Users');
        $result = array();
        if ($stmt->execute()) {
            while ($rs = $stmt->fetchObject(User::class)) {
                $result[] = $rs;
            }
        }
        if (count($result) > 0) {
            return $result;
        } else{
            return false;
        }
    }

    public static function findById($id)
    {
        $conn = Config::connect();
        $stmt = $conn->prepare("SELECT * FROM Users WHERE id= '{$id}'");
        if ($stmt->execute()) {
            if($stmt->rowCount() > 0){
                $result = $stmt->fetchObject('User');
                if ($result) {
                    return $result;
                }
            }
        } 
        return false;
    }

    public static function deleteById($id)
    {
        $conn = Config::connect();
        if ($conn->exec("DELETE FROM Users WHERE id='{$id}'")) {
            return true;
        } else {
            return false;
        }
    }
}

?>