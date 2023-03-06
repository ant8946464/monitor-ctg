<?php

  $user = $_POST['user'];
  $password = $_POST['password'];

  
  $modeloDB = new Database();
  $query =  $modeloDB->connect()->prepare('SELECT * FROM d29_user WHERE user_corporate = :user_corporate');  
  $query->execute([ 'user_corporate' =>$user]);
  $user = $query->fetch(PDO::FETCH_ASSOC);
    echo 'portal we;'
                

?>