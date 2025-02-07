<?php 
namespace App\Controllers;
require dirname( __DIR__) . '/../vendor/autoload.php';
use App\Core\View;
use App\Models\Product;

class ProductController
{

 public function index()
 {
   $product=new Product();
   $products=$product->findAll();
   print_r($products);
 }

}