<?php

namespace App\Core;

class Router 
{
    protected $controller = "HomeController";
    protected $action = "index";
    protected $params = [];

    public function __construct()
    {
        $this->prepareURL();
        $this->render();

    }  
    
    private function prepareURL()
    {
        $url =$_SERVER['QUERY_STRING'];
        if(!empty($url))
        {
            $url=trim($url,"/");
            $url = explode("/",$url);

            $this->controller=isset($url[0])?ucwords($url[0])."Controller":"HomeController";
            $this->action = isset($url[1]) ? $url[1] : "index";
            unset($url[0],$url[1]);
            $this->params= !empty($url)? array_values($url):[];
        }
    }

    private function render()
    {
        $controller = "App\\Controllers\\" . $this->controller;
        if(class_exists( $controller))
        {
            $controller= new $controller();
            if(method_exists( $controller,$this->action))
            {
                call_user_func_array([$controller,$this->action],$this->params);
            }
            else
            {
                echo "Method not exists";
            }

        }
        else
        {
            echo "This Controller :".$this->controller."not exist";
 
        }
    }
}







?>