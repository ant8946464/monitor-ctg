<?php
    namespace App\Controllers;

    require_once dirname( __DIR__ ) . '/Models//User.php';
   require_once 'Controller.php';
   require_once './classes/errors.php';
   require_once './classes/Session.php';
   require_once './lib/ValidatorFunctions.php';
   require_once './lib/AbCrypt.php';
   require_once './lib/Captcha.php';
    
    use App\Controllers\Controller;
    use Classes\Errors;
    use Classes\Success;
    use App\Models\User;
    use Lib\ValidatorFunctions;
    use Lib\AbCrypt;
    use Lib\Captcha;
 

    class RegistratioController extends Controller{

        private $userName;
        private $first_name ;
        private $last_name ;
        private $user_corporate ;
        private $email ;
        private $phone ;
        private $password;
        private $confirmpassword;
        private $area ;
        private $rol ;
        private $responsible_boss;
        private $id;
     

        public function index(){
            return $this->view('registrationForm');
         }

         public function updateUser(){
            return $this->view('updateUser');
         }


         public function validaUserUpdate(){

            $success = new Success();
            $validator = new ValidatorFunctions();
            $userModels = new User();
            $this->id=  $_POST['id'];
            $this->userName = $_POST['nameUser'];
            $this->first_name = $_POST['apellidoPat'];
            $this->last_name = $_POST['apellidMat'];
            $this->user_corporate = $_POST['user_corporate'];
            $this->email = $_POST['email'];
            $this->phone = $_POST['phone'];
            $this->area = $_POST['area']?? null;
            $this->rol = $_POST['rol']?? null;
            $this->responsible_boss = $_POST['responsable']?? null;
            $this->user_corporate =str_replace(' ', '', $this->user_corporate);

            if($validator->validateEmptyParameters(array($this->userName,$this->first_name,$this->last_name,$this->user_corporate,$this->email,$this->phone,$this->area,$this->rol,$this->responsible_boss))){
                return $this->view('updateUser',$this->createArrayFront('a5bcd7089d83f45e17e989fbc86003ed'));
            }else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                return $this->view('updateUser',$this->createArrayFront('omY1wv3wZvAMsQp8sJJO8Hj19VZ8u8Opa'));
            }else if(!is_numeric($this->phone )){
                return $this->view('updateUser',$this->createArrayFront('mNLhA26CekJfRRsoVZH2YL+OQaPRl2uHL'));
            }else if(!str_contains($this->user_corporate, 'EX')){
                return $this->view('updateUser',$this->createArrayFront('ujfds58op96nbgd65jsfkijngt12wsedg'));
            }else if(strlen($this->user_corporate ) > 8){
                return $this->view('updateUser',$this->createArrayFront('89ns26a65fv65grdd8dflp349cd81fdL'));
            }else if(strcmp($this->password, $this->confirmpassword) != 0 ){
                return $this->view('updateUser',$this->createArrayFront('27731b37e286a3c6429a1b8e44ef3ff6'));
            }else{
                
                $userModels->update('id_user',$this->id,$this->updateArrayInsert());
                return $this->view('updateUser',["success" => $success->get('YEqzEuBE9KJLiR73eeI2q+ynksjJuq4d')]);
            }
            
            
         }



         public function validateForm(){
            $regexPassword = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8}$/';
           
            $success = new Success();
            $validator = new ValidatorFunctions();
            $userModels = new User();
            $captcha = new Captcha();
           
            
            $this->userName =   $this->getPost('nameUser');
            $this->first_name =  $this->getPost('apellidoPat');
            $this->last_name =  $this->getPost('apellidMat');
            $this->user_corporate =  $this->getPost('user_corporate');
            $this->email =  $this->getPost('email');
            $this->phone =  $this->getPost('phone');
            $this->password =  $this->getPost('password');
            $this->confirmpassword =  $this->getPost('confirmpassword');
            $this->area = $this->getPost('area')?? null;;
            $this->rol =  $this->getPost('rol')?? null;;
            $this->responsible_boss =  $this->getPost('responsable')?? null;
            $this->user_corporate =str_replace(' ', '', $this->user_corporate);

            if(!$captcha->getCaptcha()){
                return $this->view('registrationForm',$this->createArrayFront('SJ9q4HUCgeOoFx4ruNVkMUQS6k44diaAy'));
            }
     
            $user = $userModels->findValue("user_corporate",$this->user_corporate,'*');

            if($validator->validateEmptyParameters(array($this->userName,$this->first_name,$this->last_name,$this->user_corporate,$this->email,$this->phone,$this->password,$this->confirmpassword,$this->area,$this->rol,$this->responsible_boss))){
                return $this->view('registrationForm',$this->createArrayFront('a5bcd7089d83f45e17e989fbc86003ed'));
            }else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                return $this->view('registrationForm',$this->createArrayFront('omY1wv3wZvAMsQp8sJJO8Hj19VZ8u8Opa'));
            }else if(!is_numeric($this->phone )){
                return $this->view('registrationForm',$this->createArrayFront('mNLhA26CekJfRRsoVZH2YL+OQaPRl2uHL'));
            }else if(!str_contains($this->user_corporate, 'EX')){
                return $this->view('registrationForm',$this->createArrayFront('ujfds58op96nbgd65jsfkijngt12wsedg'));
            }else if(strlen($this->user_corporate ) > 8){
                return $this->view('registrationForm',$this->createArrayFront('89ns26a65fv65grdd8dflp349cd81fdL'));
            }else if(strcmp($this->password, $this->confirmpassword) != 0 ){
                return $this->view('registrationForm',$this->createArrayFront('27731b37e286a3c6429a1b8e44ef3ff6'));
            }else if(preg_match($regexPassword, $this->password) == 0 ){
                return $this->view('registrationForm',$this->createArrayFront('89ns26a9cd81fdce6bbf47d6bDl9aysh'));
            }else if(!empty($user)){
                return $this->view('registrationForm',$this->createArrayFront('a74accfd26e06d012266810952678cf3'));
            }else{
                if($userModels->create($this->createArrayInsert())){
                    return $this->view('login', ["success" => $success->get('8281e04ed52ccfc13820d0f6acb0985a')]  );
                }else{
                    return $this->view('registrationForm',$this->createArrayFront('1fdce6bbf47d6b26a9cd809ea1910222'));
                }
            }
            
         }


         private function createArrayFront($msgError){
            $error = new Errors();
            $array = [
                "error" => $error->get($msgError),
                "userName" => $this->userName,
                "first_name" => $this->first_name,
                "last_name" => $this->last_name,
                "user_corporate" => $this->user_corporate,
                "email" => $this->email,
                "phone" => $this->phone
            ];
            return $array ;
         }


         private function createArrayInsert(){
            $abcrypt = new AbCrypt();
            $array = [
                "username" => $this->userName,
                "first_name" => $this->first_name,
                "last_name" =>  $this->last_name,
                "user_corporate" =>  $this->user_corporate,
                "email" => $this->email ,
                "password" => $abcrypt->encryptthis($this->password),
                "d29_role_id" => $this->rol,
                "d29_area_id" => $this->area,
                "role_authorization" => '0',
                "d29_area_manager_id" => $this->responsible_boss,
                "phone" => $this->phone
            ];

            return $array ;
         }


         private function updateArrayInsert(){

            $array = [
                "username" => $this->userName,
                "first_name" => $this->first_name,
                "last_name" =>  $this->last_name,
                "user_corporate" =>  $this->user_corporate,
                "email" => $this->email ,
                "d29_role_id" => $this->rol,
                "d29_area_id" => $this->area,
                "d29_area_manager_id" => $this->responsible_boss,
                "phone" => $this->phone
            ];

            return $array ;
         }
   

}   
?>