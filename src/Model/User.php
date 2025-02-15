<?php 

class User extends Model{
    protected static $table = "users";

    public static function findByEmail($email)
    {
        $conn = Config::connect();
        if($conn){
            $table = static::$table;
            $query = "SELECT * FROM {$table} WHERE email='{$email}'";
            $stmt = $conn->prepare($query);
            if($stmt->execute()){
                $res = $stmt->fetchObject(get_called_class());
                return $res;
            } else {
                return null;
            }
        }
    }
}

?>