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

        return $this->view('responsible', $this->createArrayInsert(null,null,null));
      }

      private function createArrayInsert($msgInfo, $msgError, $msg){
        $success = new Success();
        $error = new Errors();
        $detailError = null;
        if($msgError!= null){
            $detailError= $error->get($msgError).$msg;
        }else{
            $detailError;
        }
        $array = [
  
            "msgInfo" => 'En este módulo el administrador puede dar de alta y baja los puestos de empresa.',
            "modelo" => 'Job',
            "success" => $success->get($msgInfo),
            "column" => 'role', 
            "idtable" => 'id_role',
            "nameHeader" => 'Nombre del puesto',
            "tap2Header" => ' Puesto',
            "error" =>  $detailError,
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

        $name = strtoupper($this->getPost('name')); 
        $descripcion = $this->getPost('descripcion');
        $manager = $jobEmplyee->findValue("role",$name,'*');
        if(preg_match('/^[a-zA-Z, ]*$/',$name) == 0){
            return $this->view('responsible', $this->createArrayInsert(null , 'WFUMLyFQ97HdL1v1OkSGH8TA6saoCL7LH','Puesto laboral'));
        }else if(is_numeric($descripcion)){
            return $this->view('responsible', $this->createArrayInsert(null , 'WFUMLyFQ97HdL1v1OkSGH8TA6saoCL7LH','Descripción'));
        }else if($validator->validateEmptyParameters(array($name, $descripcion))){
            return $this->view('responsible', $this->createArrayInsert(null , 'a5bcd7089d83f45e17e989fbc86003ed',null));
        }else if(!empty($manager)){
            return $this->view('responsible',$this->createArrayInsert(null , 'xCp6cfUWVGN17cara71QbGB0DiWMkiRIu', ' el puesto.') );
        }else{
            if($register->create(["description" =>  $descripcion, "date_register" => date('Y-m-d')])){

                if($jobEmplyee->create(["role" => $name, "id_descripcion" =>$register->findValue("description",$descripcion,'id')['id']])){
                   
                    return $this->view('responsible',$this->createArrayInsert('8281e04ed52ccfc13820d0f6acb0985a' , null,null)  );
                }{
                    return $this->view('responsible',  $this->createArrayInsert(null , '1fdce6bbf47d6b26a9cd809ea1910222',null));
                }     
            }else{
                return $this->view('responsible',$this->createArrayInsert(null , '1fdce6bbf47d6b26a9cd809ea1910222',null));
            }
        }
      }


      public function tableDeleteRespon(){
    
        return $this->view('tableDeleteBy',$this->createArrayInsert(null,null,null));
         
     }

     public function deleteby(){
        
        return $this->view('respondeDelete', $this->createArrayInsert(null,null,null));
       
     }
   }

?>