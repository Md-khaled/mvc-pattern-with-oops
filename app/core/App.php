<?php 
class App
{
    protected $controller='home';
    protected $method='index';
    protected $params=[];
    public function __construct()
    {
        $url=$this->parseUrl();
        var_dump($url);
        if (file_exists('../app/controllers/'.$url[0].'.php')) {
            $this->controller=$url[0];
            unset($url[0]);
            var_dump($url);
        }
        var_dump($url);
        require_once '../app/controllers/'.$this->controller.'.php';
        //$this->controller=new $this->controller ;
        if (isset($url[1])) {
            if (method_exists($this->controller,$url[1])) {
                $this->method=$url[1];
                unset($url[1]);
                var_dump($url);
            }
        }
        var_dump($url);
        $this->params=$url?array_values($url):[];
        call_user_func_array([new $this->controller,$this->method],$this->params);
    }
    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            //echo($_GET['url']);
            //$var="https://www.w3schoo��ls.co�m";
            //return filter_var($var, FILTER_SANITIZE_URL);
            return $url=explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
        }
    }
}

?>