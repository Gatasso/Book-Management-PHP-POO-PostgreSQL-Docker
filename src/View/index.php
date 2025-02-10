<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

spl_autoload_register(function($class) {
    $directories = [
        '../Controller',  
        '../Model',
        '../Config',
    ];

    foreach ($directories as $dir) {
        $file = $dir . DIRECTORY_SEPARATOR . $class . '.php';
        
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
    }
    
    return false;
});
?>
<!DOCTYPE html>
<html lang='pt-br'>
    <header>
        <meta charset="utf-8">
        <title>Gerenciamento de Livros</title>
    </header>
    <body>

    <?php
        if ($_GET) {
            $controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : null;
            $method = isset($_GET['method']) ? $_GET['method'] : null;

            echo($controllerName . " | " . $method);
            $controllerClass = "$controllerName";

            if ($controllerName && class_exists($controllerClass)) {
                $controller = new $controllerClass;
                
                if ($method && method_exists($controller, $method)) {
                    $parameters = $_GET;
                    unset($parameters['controller']);
                    unset($parameters['method']);
                    if (isset($parameters['id'])) {
                        call_user_func_array([$controller, $method], [$parameters['id']]);
                    } else{
                        call_user_func([$controller,$method], $parameters);
                    }
                } else {
                    echo "Método não encontrado!";
                }
            } else {
                echo "Controller não encontrado!";
            }
        } else {
            echo '<nav><ul><li><a href="./index.php">Início</a></li>';
            echo '<li><a href="./index.php?controller=BookController&method=create">Adicionar Livro</a></li>';
            echo '<li><a href="./index.php?controller=BookController&method=list">Listar Livros</a></li>'; 
            echo '<li><a href="./index.php?controller=UserController&method=create">Adicionar User</a></li>';
            echo '<li><a href="./index.php?controller=UserController&method=list">Listar Users</a></li></ul></nav>'; 
        }
    ?>
    </body>
</html>