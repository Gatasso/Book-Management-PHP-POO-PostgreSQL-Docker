<?php 
// include_once("./Request.php");
class Controller
{
    public $request;
    public function __construct()
    {
        $this->request = new Request;
    }

    public function view($file, $array = null)
    {
        if (!is_null($array)) {
            foreach ($array as $var => $value) {
                ${$var} = $value;
            }
        }
        ob_start();
        include "{$file}.php";
        ob_flush();
    }
}
?>