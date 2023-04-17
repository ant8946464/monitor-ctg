<?php


   namespace App\Controllers;

   require_once dirname( __DIR__ ) . '/Models/User.php';
   require_once 'Controller.php';
   require_once './lib/Captcha.php';
   require_once './classes/errors.php';
   require_once './classes/Session.php';


   use App\Models\User;
   use Classes\Errors;
   use Classes\Session;
   use Lib\Captcha;

   class LoginController extends Controller  {

      private $userCorporate;

      public function index(){
         return $this->view('login');
      }

      public function resetPassword(){
         return $this->view('resetPassword');
      }


      public function validateLogin(){

         $captcha = new Captcha();
         $this->userCorporate = $_POST['usuario_corporate'];
         $password = $_POST['password'];

         if(!$captcha->getCaptcha()){
            return $this->view('login',$this->createArrayFront('SJ9q4HUCgeOoFx4ruNVkMUQS6k44diaAy'));
         }

         if(empty( $this->userCorporate ) or empty($password)){
            return $this->view('login',$this->createArrayFront('a5bcd7089d83f45e17e989fbc86003ed')); 
         }else{
            $userModels = new User();
            $user = $userModels->findValue("user_corporate", $this->userCorporate,'*');
            if(!empty($user)){
               if($userModels->comparePasswords($password,  $user['password']) == 0){
                 $session = new Session();
                 $session->setSessionName('user',$user['user_corporate']);
                 $session->setSessionName('username',$user['username']);
                 $session->setSessionName('email',$user['email']);
                 $session->setSessionName('user',$user['user_corporate']);
                 $session->setSessionName('d29_role_id',$user['d29_role_id']);
                 $session->setSessionName('role_authorization',$user['role_authorization']);           
                  return $this->view('portal');

               }else{
                  return $this->view('login',$this->createArrayFront('bcbe63ed8464684af6945ad8a89f76f8')); 
               }
            }else{
            return $this->view('login',$this->createArrayFront('dkijud26e06d01g56610952678cf3sde'));    
            }
        }
      }

      private function createArrayFront($msgError){
         $error = new Errors();
         $array = [
             "error" => $error->get($msgError),
             "user" => $this->userCorporate,
           
         ];
         return $array ;
      }


      public function logout(){
         $session = new Session();
         if(!empty($session->exists('user') )){
            $session->closeSession();
         }
         header('location: /');
      }
   }

?>