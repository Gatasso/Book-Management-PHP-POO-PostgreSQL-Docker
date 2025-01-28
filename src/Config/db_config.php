<?php 
// require_once('././src/vendor/autoload.php');
require_once('../vendor/autoload.php');
use Dotenv\Dotenv;
use PSpell\Config as PSpellConfig;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = new Config();
$config->connect();

class Config {
    
    public function connect(){
        try {
            $dsn = "pgsql:host=".$_ENV['DB_HOST'].";port=".$_ENV['DB_PORT'].";dbname=".$_ENV['DB_DATABASE'];
            // echo($_ENV['DB_PASSWORD'].'    ');
            echo($dsn);
            $pdo = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo("Conexão realizada com sucesso!");
            return $pdo;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }    
}

?>
