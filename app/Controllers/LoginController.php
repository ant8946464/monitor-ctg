<?php


   namespace App\Controllers;

   require_once dirname( __DIR__ ) . '/Models/User.php';
   require_once 'Controller.php';
   require_once './lib/Captcha.php';
   require_once './classes/errors.php';
   require_once './classes/Session.php';
   require_once './classes/success.php';
   require_once './classes/Mail.php';



   use App\Models\User;
   use Classes\Errors;
   use Classes\Session;
   use Lib\Captcha;
   use Classes\Success;
   use Classes\Mail;
  

   class LoginController extends Controller  {

      private $userCorporate;

      public function index(){
         return $this->view('login');
      }

      public function resetPassword(){
         return $this->view('resetPassword');
      }

      public function listActivities(){
         return $this->view('portal');
      }


      public function sendMailReset(){
         $userModels = new User();
         $captcha = new Captcha();
         $emailUser = $this->getPost('email');    
         $user = $userModels->findValue("email", $emailUser,'*');

         if(!$captcha->getCaptcha()){
            return $this->view('resetPassword',$this->createArrayFront('SJ9q4HUCgeOoFx4ruNVkMUQS6k44diaAy',null));
         }
         if(!empty($user)){
            $items = [];
            foreach ($user as $k => $v) {
               array_push( $items,$v);
            }

           $email = new Mail($emailUser,'Reseteo de password',null);
           $email->templateMessage('Restablecer Password', 'Estimado  '.$items[1].', se recibio una solicitud para restablecer su contraseña en el portal. ' ,"https://monictorctg-space.preview-domain.com/formResetPassword/'.$emailUser.'token'.$items[12].'",'Para restablecer da click aqui');
           $email->sendMailContent();
           return $this->view('login',$this->createArrayFront(null,'HyDTdr1kfmwDtZR+GXPRoTuhvRQZFxPxW'));
         }else{
            return $this->view('resetPassword',$this->createArrayFront('pishAXQ9ARlaqYd696GXe59kOCzB6V1zu',null));
         }
      }



      public function validateLogin(){
         $userModels = new User();
         $captcha = new Captcha();
         $this->userCorporate = $this->getPost('usuario_corporate');    
         $this->userCorporate =str_replace(' ', '', $this->userCorporate);
         $password = $this->getPost('password'); 
         if(!$captcha->getCaptcha()){
            return $this->view('login',$this->createArrayFront('SJ9q4HUCgeOoFx4ruNVkMUQS6k44diaAy',null));
         }

         if(empty( $this->userCorporate ) or empty($password)){
            return $this->view('login',$this->createArrayFront('a5bcd7089d83f45e17e989fbc86003ed',null)); 
         }else{
            $userModels = new User();
            $user = $userModels->findValue("user_corporate", $this->userCorporate,'*');
            if(!empty($user)){
               if($userModels->comparePasswords($password,  $user['password']) == 0){
                 $session = new Session();
                 $session->setSessionName('user',$user['user_corporate']);
                 $session->setSessionName('username',$user['username']);
                 $session->setSessionName('email',$user['email']);
                 $session->setSessionName('d29_role_id',$user['d29_role_id']);
                 $session->setSessionName('role_authorization',$user['role_authorization']);    
                  return $this->view('portal');

               }else{
                  return $this->view('login',$this->createArrayFront('bcbe63ed8464684af6945ad8a89f76f8',null)); 
               }
            }else{
            return $this->view('login',$this->createArrayFront('dkijud26e06d01g56610952678cf3sde',null));    
            }
        }
      }

      private function createArrayFront($msgError , $msgSucces){
         $error = new Errors();
         $success = new Success();
         $array = [
             "error" => $error->get($msgError),
             "user" => $this->userCorporate,
             "success" =>$success->get($msgSucces),
           
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