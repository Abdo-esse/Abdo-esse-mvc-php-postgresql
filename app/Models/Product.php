<?php 
namespace App\Models;
require dirname(__DIR__) . '/../vendor/autoload.php'; 
use App\Config\Connexion;

class Product 
{

 
    // public function __construct()
    // {
    //     return Crud::readAll("products");
    // }
    public function findAll()
    {
        return Crud::readAll("products");
    }
}