<?php 

class UserBook extends Model
{
    protected static $table = "user_books";

    public static function findByUserId($id)
    {
        $table = static::$table;
        $tableAux = "books";
        $conn = Config::connect();
        $query = "SELECT b.*, ub.* 
                FROM {$tableAux} AS b 
                INNER JOIN {$table} AS ub ON b.id = ub.id_book 
                WHERE ub.id_user = {$id}";
        $stmt = $conn->prepare($query);
        if($stmt->execute()){
            if($stmt->rowCount()>0){
                while ($res = $stmt->fetchObject(get_called_class())){
                    $result [] = $res;
                }
                return $result;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }


}
?>