<?php 
namespace App\Config;
use PDO;
use PDOExeption;
class Connexion
{
    private static $host='localhost';
    private static $db='test';
    private static $username='postgres';
    private static $password='root';
     public static $conn=null;

    static function connexion()
    {
        if(self::$conn===null)
        {
            try{
                self::$conn= new PDO("pgsql:host=".self::$host.";dbname=".self::$db,
                self::$username,
                self::$password,
            );
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected to postgresql";
            }catch(PDOExeption $exeption)
            {
                die ( " L'error est " . $exeption->getMessage());
            }
            return self::$conn;

        }
        else
        {
            return self::$conn;
        }

    }


}