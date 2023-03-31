<?php

   namespace App\Controllers;

   use App\Models\User;
   use Classes\Errors;
   use Classes\Session;

   

   class LoginController extends Controller  {

      public function index(){
         return $this->view('login');
      }


      public function validateLogin(){
         $userCorporate = $_POST['usuario_corporate'];
         $password = $_POST['password'];
         $error = new Errors();
         if(empty($userCorporate) or empty($password)){
            return $this->view('login',['error'=> $error->get('a5bcd7089d83f45e17e989fbc86003ed') ]);
         }else{
            $userModels = new User();
            $user = $userModels->findValue("user_corporate", $userCorporate);
            if(!empty($user)){
               if($userModels->comparePasswords($password,  $user['password']) == 0){
                $session = new Session();
                 $session->setSessionName('user',$user['user_corporate']);
                 $session->setSessionName('username',$user['username']);
                 $session->setSessionName('email',$user['email']);
                 $session->setSessionName('user',$user['user_corporate']);
                 $session->setSessionName('id_rol',$user['id_rol']);
                 $session->setSessionName('role_authorization',$user['role_authorization']);           
                  return $this->view('portal');

               }else{
                  return $this->view('login',['error'=> $error->get('bcbe63ed8464684af6945ad8a89f76f8') ]);
               }
            }else{
            return $this->view('login',['error'=> $error->get('dkijud26e06d01g56610952678cf3sde') ]);  
            }
        }
        
      }
   }

?>