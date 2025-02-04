<?php 

class Request
{
    protected $request;

    public function __construct()
    {
        $this->request = $_REQUEST;
    }

    public function __get($name)
    {
        if ($this->request[$name]) {
            return $this->request[$name];
        }   
        return false;
    }
}
?>