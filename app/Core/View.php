<?php 
namespace App\Core;

class View
{
    
public static function load($view_name,$view_data=[])
{
    $file= dirname(__DIR__) . "/Views".$view_name.'.php';
    if(file_exists($file))
    {
        extract($view_data);
        ob_start();
        require ($file);
        ob_end_flush();
    }
    else 
    {
        echo "this views not existe";
    }
}












}