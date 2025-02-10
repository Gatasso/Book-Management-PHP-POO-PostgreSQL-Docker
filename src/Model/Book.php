<?php 

class Book extends Model{
    protected static $table = "books";

    public static function findByUserId($id)
    {
        $table = static::$table;
        $tableAux = "user_books";
        $conn = Config::connect();
        $query = "SELECT b.*, ub.* 
                FROM {$table} AS b 
                INNER JOIN {$tableAux} AS ub ON b.id = ub.id_book 
                WHERE ub.id_user = {$id}";

        $stmt = $conn->prepare($query);
        if($stmt->execute()){
            if($stmt->rowCount()>0){
                while ($res = $stmt->fetchObject(get_called_class())){
                    $result [] = $res; 
                    return $result;
                }
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
}
?>