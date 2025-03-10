<?php 


namespace App\Models;
require dirname(__DIR__) . '/../vendor/autoload.php'; 
use App\Config\Connexion;
use PDO;


class Crud 
{


      static function createAction ($table,$data){
        $conn = Connexion::connexion();
        $columns = implode(',', array_keys($data));
        $values = implode(',', array_fill(0, count($data), '?'));
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
         $stmt = $conn->prepare($sql);
         $stmt->execute(array_values($data));
         return $conn->lastInsertId();
      }

      static function readAll($table){
        $conn = Connexion::connexion(); 
        $sql="SELECT * FROM $table";
        $stmt=$conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
      }
     
      static function readAction($table,$wher){
        $conn = Connexion::connexion();
        $column = key($wher);
        $sql="SELECT * FROM $table WHERE $column= ?";
        $stmt= $conn->prepare($sql);
        $stmt->execute(array_values($wher));

        return $stmt->fetch(PDO::FETCH_OBJ);
      }

      static function updateAction($table,$id,$data){
        $conn = Connexion::connexion();
        $columns=implode(' = ?, ',array_keys($data)) . ' = ?';
        $sql="UPDATE $table SET  $columns  WHERE id = ?";
        $stmt= $conn->prepare($sql);
        $stmt->execute(array_merge(array_values($data), [$id]));
      }


      static function deleteAction($tabel,$id){
        $conn = Connexion::connexion();
        $column = key($wher);
        $sql="DELETE FROM $tabel WHERE $column= ?";
        $stmt= $conn->prepare($sql);
        $stmt->execute(array_values($wher));
      }


      

}

