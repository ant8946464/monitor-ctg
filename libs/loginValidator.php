<?php
//require_once 'config/session.php';
/**
 * Validacion de datos para poder iniciar sesion
 */
//require_once ("../_db.php");
//$session = new  Session();
require_once ("database.php");
$user=$_POST['user'];
$password=$_POST['password'];

   
$modeloDB = new Database();
$query=  $modeloDB->connect()->prepare('SELECT * FROM d29_user WHERE user_corporate = :user_corporate');  
            $query->execute([ 'user_corporate' =>$user]);
            $user = $query->fetch(PDO::FETCH_ASSOC);
            $userGeneric = $user['user_corporate'];
            $password = $user['password'];
            echo $userGeneric;
            echo $password;

?>
