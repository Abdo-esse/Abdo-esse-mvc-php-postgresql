<?php 
require dirname( __DIR__) . '/../../vendor/autoload.php';

use App\Config\Connexion;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <h1>home page</h1>
    <h1><?= $contentent ?></h1>
    <h1><?= $titel ?></h1>
    <?php 
    Connexion::connexion();
    Connexion::connexion();
    Connexion::connexion();
    Connexion::connexion();
     ?>
</body>
</html>