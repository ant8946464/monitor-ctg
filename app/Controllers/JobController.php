<?php

   namespace App\Controllers;
   
   require_once dirname( __DIR__ ) . '/Models/DescritionRegister.php';
   require_once dirname( __DIR__ ) . '/Models/Job.php';
   require_once 'Controller.php';
   require_once './classes/errors.php';
   require_once './classes/Session.php';
   require_once './lib/ValidatorFunctions.php';

   use App\Controllers\Controller;
   use Classes\Errors;
   use Classes\Success;
   use App\Models\Job;
   use Lib\ValidatorFunctions;
   use App\Models\DescritionRegister;
  


   class JobController extends Controller  {

      public function index(){
         return $this->view('responsible', $this->createArrayInsert(null,null));
      }

      private function createArrayInsert($msgInfo, $msgError){
        $success = new Success();
        $error = new Errors();
        $array = [
  
            "msgInfo" => 'En este módulo el administrador podra dar de alta y baja los puestos de empresa.',
            "modelo" => 'Job',
            "success" => $success->get($msgInfo),
            "column" => 'role', 
            "idtable" => 'id_role',
            "nameHeader" => 'Nombre del puesto',
            "tap2Header" => ' Puesto',
            "error" => $error->get( $msgError),
            "postIndex" => 'role',
            "search_id" => 'id_role',
            "path" => '/addJob',
            "pathDelete" => 'deleteJob',
            "selectName" => 'jobSelect',
        ];

        return $array ;
     }



      public function validResponsable(){
         $validator = new ValidatorFunctions();
         $jobEmplyee = new Job();
         $register= new DescritionRegister();

        $name = $_POST['name'];
        $descripcion = $_POST['descripcion'];
        $manager = $jobEmplyee->findValue("role",$name,'*');
          
        if($validator->validateEmptyParameters(array($name, $descripcion))){
            return $this->view('responsible', $this->createArrayInsert(null , 'a5bcd7089d83f45e17e989fbc86003ed'));
        }else if(!empty($manager)){
            return $this->view('responsible',$this->createArrayInsert(null , 'a74accfd26e06d012266810952678cf3') );
        }else{
            if($register->create(["description" =>  $descripcion, "date_register" => date('Y-m-d')])){

                if($jobEmplyee->create(["role" => $name, "id_descripcion" =>$register->findValue("description",$descripcion,'id')['id']])){
                   
                    return $this->view('responsible',$this->createArrayInsert('8281e04ed52ccfc13820d0f6acb0985a' , null)  );
                }{
                    return $this->view('responsible',  $this->createArrayInsert(null , '1fdce6bbf47d6b26a9cd809ea1910222'));
                }     
            }else{
                return $this->view('responsible',$this->createArrayInsert(null , '1fdce6bbf47d6b26a9cd809ea1910222'));
            }
        }
      }


      public function tableDeleteRespon(){
    
        return $this->view('tableDeleteBy',$this->createArrayInsert(null,null));
         
     }

     public function deleteby(){
        
        return $this->view('respondeDelete', $this->createArrayInsert(null,null));
       
     }
   }

?>