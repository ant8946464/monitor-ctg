<?php

    require_once ("../classes/errors.php");

    $user = $_POST['user'];
    $password = $_POST['password'];
    $error = new Errors();

    if(empty($user) or empty( $password  )){
        header("Location: ../views/login.php?error=".$error->get('a5bcd7089d83f45e17e989fbc86003ed'));
        exit();
    }
    
    /*$modeloDB = new Database();
    $query =  $modeloDB->connect()->prepare('SELECT * FROM d29_user WHERE user_corporate = :user_corporate');  
    $query->execute([ 'user_corporate' =>$user]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if(!empty($user) ){
        $userGeneric = $user['user_corporate'];
        $password = $user['password'];
        echo $userGeneric;
        echo $password;
        echo 'ENTRA AL PORTAL ';

       
    }else{
       
       // echo 'Usuario o contraseñas invalidas';
       // header('location: ../login.php');
        $error = new Errors();
        
        echo $error->get('bcbe63ed8464684af6945ad8a89f76f8');
        $error->cleanMessages();
        echo $error->getcleanMessages();
    }*/
                

?>
