<?php 
require_once('../vendor/autoload.php');
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// $config = new Config();
// $config->connect();

class Config {
    private static $pdo;

    private function __construct()
    {}
    
    public static function connect(){
        try {
            if(is_null(self::$pdo)){
                $dsn = "pgsql:host=".$_ENV['DB_HOST'].";port=".$_ENV['DB_PORT'].";dbname=".$_ENV['DB_DATABASE'];
                self::$pdo = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo("Conexão realizada com sucesso!");
            }
                return self::$pdo;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }    
}

?>
