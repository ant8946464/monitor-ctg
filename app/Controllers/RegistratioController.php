<?php
    namespace App\Controllers;

    require_once dirname( __DIR__ ) . '/Models//User.php';
   require_once 'Controller.php';
   require_once './classes/errors.php';
   require_once './classes/Session.php';
   require_once './lib/ValidatorFunctions.php';
   require_once './lib/AbCrypt.php';
   require_once './lib/Captcha.php';
   require_once './classes/Mail.php';
    
    use App\Controllers\Controller;
    use Classes\Errors;
    use Classes\Success;
    use App\Models\User;
    use Lib\ValidatorFunctions;
    use Lib\AbCrypt;
    use Lib\Captcha;
    use Classes\Mail;
 

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
        private $tokenUser;

       

        public function index(){
            return $this->view('registrationForm');
         }

         public function updateUser(){
            return $this->view('updateUser');
         }


         public function validateAuthorization($params){
            $success = new Success();
            $error = new Errors();
            $userModels = new User();
            $user = $userModels->findValue("tokenUser",$params,'*');
            if(!empty($user)){
                $items = [];
                foreach ($user as $k => $v) {
                   array_push( $items,$v);
                }
                $userModels->update('id_user', $items[0],['role_authorization'=>1]);
                return $this->view('login',["success" =>$success->get('f8R0DPwJQY5HAX+BiJZYppjJGoES1TGtg')]);  
            }else{
                return $this->view('login',["error" =>$error->get('dkijud26e06d01g56610952678cf3sde')]);  
            }
         }


         


         public function validaUserUpdate(){

            $success = new Success();
            $validator = new ValidatorFunctions();
            $userModels = new User();
            $this->id=  $this->getPost('id');
            $this->userName =  $this->getPost('nameUser');
            $this->first_name =  $this->getPost('apellidoPat');
            $this->last_name = $this->getPost('apellidMat');
            $this->user_corporate =  $this->getPost('user_corporate');
            $this->email =  $this->getPost('email');
            $this->phone =  $this->getPost('phone');
            $this->area =  $this->getPost('area')?? null;
            $this->rol = $this->getPost('rol')?? null;
            $this->responsible_boss =  $this->getPost('responsable')?? null;
            $this->user_corporate =str_replace(' ', '', $this->user_corporate);
            if($validator->validateEmptyParameters(array($this->userName,$this->first_name,$this->last_name,$this->user_corporate,$this->email,$this->phone,$this->area,$this->rol,$this->responsible_boss))){
                return $this->view('updateUser',$this->createArrayFront('a5bcd7089d83f45e17e989fbc86003ed',null));
            }else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                return $this->view('updateUser',$this->createArrayFront('omY1wv3wZvAMsQp8sJJO8Hj19VZ8u8Opa',null));
            }else if(!is_numeric($this->phone )){
                return $this->view('updateUser',$this->createArrayFront('mNLhA26CekJfRRsoVZH2YL+OQaPRl2uHL',null));
            }else if(!str_contains($this->user_corporate, 'EX')){
                return $this->view('updateUser',$this->createArrayFront('ujfds58op96nbgd65jsfkijngt12wsedg',null));
            }else if(strlen($this->user_corporate ) > 8){
                return $this->view('updateUser',$this->createArrayFront('89ns26a65fv65grdd8dflp349cd81fdL',null));
            }else if(strcmp($this->password, $this->confirmpassword) != 0 ){
                return $this->view('updateUser',$this->createArrayFront('27731b37e286a3c6429a1b8e44ef3ff6',null));
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
                return $this->view('registrationForm',$this->createArrayFront('SJ9q4HUCgeOoFx4ruNVkMUQS6k44diaAy',null));
            }
            $user = $userModels->findValue("user_corporate",$this->user_corporate,'*');

            if($validator->validateEmptyParameters(array($this->userName,$this->first_name,$this->last_name,$this->user_corporate,$this->email,$this->phone,$this->password,$this->confirmpassword,$this->area,$this->rol,$this->responsible_boss))){
                return $this->view('registrationForm',$this->createArrayFront('a5bcd7089d83f45e17e989fbc86003ed',null));
            } else if(preg_match('/^[a-zA-Z, ]*$/',$this->userName) == 0){
                return $this->view('registrationForm', $this->createArrayFront( 'WFUMLyFQ97HdL1v1OkSGH8TA6saoCL7LH','Nombre'));
            } else if(preg_match('/^[a-zA-Z, ]*$/',$this->first_name) == 0){
                return $this->view('registrationForm', $this->createArrayFront( 'WFUMLyFQ97HdL1v1OkSGH8TA6saoCL7LH','Apellido paterno'));
            }else if(preg_match('/^[a-zA-Z, ]*$/',$this->last_name) == 0){
                return $this->view('registrationForm', $this->createArrayFront( 'WFUMLyFQ97HdL1v1OkSGH8TA6saoCL7LH','Apellido Materno'));
            }else if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
                return $this->view('registrationForm',$this->createArrayFront('omY1wv3wZvAMsQp8sJJO8Hj19VZ8u8Opa',null));
            }else if(!is_numeric($this->phone )){
                return $this->view('registrationForm',$this->createArrayFront('mNLhA26CekJfRRsoVZH2YL+OQaPRl2uHL',null));
            }else if(!str_contains($this->user_corporate, 'EX')){
                return $this->view('registrationForm',$this->createArrayFront('ujfds58op96nbgd65jsfkijngt12wsedg',null));
            }else if(strlen($this->user_corporate ) > 8){
                return $this->view('registrationForm',$this->createArrayFront('89ns26a65fv65grdd8dflp349cd81fdL',null));
            }else if(strcmp($this->password, $this->confirmpassword) != 0 ){
                return $this->view('registrationForm',$this->createArrayFront('27731b37e286a3c6429a1b8e44ef3ff6',null));
            }else if(preg_match($regexPassword, $this->password) == 0 ){
                return $this->view('registrationForm',$this->createArrayFront('89ns26a9cd81fdce6bbf47d6bDl9aysh',null));
            }else if(!empty($user)){
                return $this->view('registrationForm',$this->createArrayFront('a74accfd26e06d012266810952678cf3',null));
            }else{
                if($userModels->create($this->createArrayInsert())){
                    if($this->rol== 1){
                        $email = new Mail(constant('GROUP_MAIL'),'Permisos de Administrador',null);
                        $email->templateMessage('Permisos de Administrador', 'El usuario '.$this->user_corporate.' se registro como administrador. ' ,'https://monictorctg-space.preview-domain.com/administratorAuthorization/'. $this->tokenUser,'Para dar aurorización de administrador dar click aqui');
                        $email->sendMailContent();
                        return $this->view('login', ["success" => $success->get('8281e04ed52ccfc13820d0f6acb0985a')]  );
                    }                                                                                                                                                                                                                                                         
                    return $this->view('login', ["success" => $success->get('8281e04ed52ccfc13820d0f6acb0985a')]  );
                }else{
                    return $this->view('registrationForm',$this->createArrayFront('1fdce6bbf47d6b26a9cd809ea1910222',null));
                }
            }
            
         }


         private function createArrayFront($msgError, $cam){
            $error = new Errors();
            $detailError = null;
            if($cam != null){
                $detailError= $error->get($msgError).$cam;
            }else{
                $detailError = $error->get($msgError);
            }
            var_dump($detailError);
            $array = [
                "error" =>  $detailError,
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
            $numero_aleatorio = mt_rand(0,1000000); 
            $tem= $this->user_corporate;
            $time = time();
            $this->tokenUser = $numero_aleatorio.$tem.$time ;
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
                "phone" => $this->phone,
                "tokenUser" =>$this->tokenUser ,
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


         public function validNotNumber($val, $campo){
            if(preg_match('/^[a-zA-Z, ]*$/',$val) == 0){
                return $this->view('registrationForm', $this->createArrayFront( 'WFUMLyFQ97HdL1v1OkSGH8TA6saoCL7LH',$campo));
            }
         }
}   
?>