<?php

    require_once ("../classes/errors.php");
    require_once ("../models/UserModel.php");

    $userCorporate = $_POST['usuario_corporate'];
    $password = $_POST['password'];
    $error = new Errors();
    $userModel = new UserModel();

    $userModel->setPassword($password,true);
    $userModel->validateUserandPassword($userCorporate)  ;  
    if(empty($userCorporate) or empty($password)){
        header("Location: ../views/login.php?error=".$error->get('a5bcd7089d83f45e17e989fbc86003ed'));
        exit();
    } else if($userModel->validateUserandPassword($userCorporate ) != 0){
        header("Location: ../views/login.php?error=".$error->get('bcbe63ed8464684af6945ad8a89f76f8'));
        exit();  
    }else{
    
         echo 'entra al portal';

    }
?>
