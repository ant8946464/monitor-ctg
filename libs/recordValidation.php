<?php

require 'function.php';
require "../classes/errors.php";
require "../classes/success.php";
require_once ("../models/UserModel.php");

$userName = $_POST['nameUser'];
$first_name = $_POST['apellidoPat'];
$last_name = $_POST['apellidMat'];
$user_corporate = $_POST['user_corporate'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$area = $_POST['area'];
$rol = $_POST['rol'];

$regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8}$/';
$error = new Errors();
$userModel = new UserModel();
$success = new Success();


$resultRequest = array($userName,$first_name,$last_name,$user_corporate,$email,$phone,$password,$confirmpassword,$area,$rol);

var_dump(strlen($user_corporate ));


if(validateEmptyParameters($resultRequest)){
    header("Location: ../views/registrationForm.php?error=".$error->get('a5bcd7089d83f45e17e989fbc86003ed'));
    exit();
}else if(strlen($user_corporate ) > 8){
    header("Location: ../views/registrationForm.php?error=".$error->get('89ns26a65fv65grdd8dflp349cd81fdL'));
    exit();
}else if(strcmp($password, $confirmpassword) != 0 ){
    header("Location: ../views/registrationForm.php?error=".$error->get('27731b37e286a3c6429a1b8e44ef3ff6'));
    exit();
}else if(preg_match($regexPassword, $password) == 0 ){
    header("Location: ../views/registrationForm.php?error=".$error->get('89ns26a9cd81fdce6bbf47d6bDl9aysh'));
    exit();
}else if($userModel->userExists($user_corporate)){
    header("Location: ../views/registrationForm.php?error=".$error->get('a74accfd26e06d012266810952678cf3'));
    exit();
}else{
    $userModel ->setUsername($user_corporate);
    $userModel ->setName($userName);
    $userModel ->setRole($rol);
    $userModel ->setLastName($last_name);
    $userModel ->setFirtName($first_name);
    $userModel ->setEmail($email);
    $userModel ->setPhone($phone);
    $userModel ->setArea($area);
    $userModel ->setPassword($password);
    ;
    if($userModel ->save()){
        header("Location: ../views/login.php?success=".$success->get('8281e04ed52ccfc13820d0f6acb0985a'));
        exit();
    }else{
        header("Location: ../views/registrationForm.php?error=".$error->get('1fdce6bbf47d6b26a9cd809ea1910222'));
        exit();
    }
	
}


?>