<?php

   namespace App\Controllers;

   use App\Controllers\Controller;
   use Classes\Errors;
   use Classes\Success;
   use App\Models\AreaManager;
   use Lib\ValidatorFunctions;
   use App\Models\DescritionRegister;
  


   class ResponsibleController extends Controller  {

      public function index(){
         return $this->view('responsible');
      }



      public function validResponsable(){
         $success = new Success();
         $error = new Errors();
         $validator = new ValidatorFunctions();
         $areaManager = new AreaManager();
         $register= new DescritionRegister();

        $name = $_POST['name'];
        $descripcion = $_POST['descripcion'];
        $manager = $areaManager->findValue("manager_name",$name,'*');
          
        if($validator->validateEmptyParameters(array($name, $descripcion))){
            return $this->view(['responsible', $error->get('a5bcd7089d83f45e17e989fbc86003ed')]);
        }else if(!empty($manager)){
            return $this->view(['responsible', $error->get('a74accfd26e06d012266810952678cf3')]);
        }else{
            if($register->create(["description" =>  $descripcion, "date_register" => date('Y-m-d')])){
                if($areaManager->create(["manager_name" => $name, "id_descripcion" =>$register->findValue("description",$descripcion,'	id')['id']])){
                    return $this->view('responsible', ["success" => $success->get('8281e04ed52ccfc13820d0f6acb0985a')]  );
                }{
                    return $this->view(['responsible', $error->get('1fdce6bbf47d6b26a9cd809ea1910222')]);
                }     
            }else{
                return $this->view(['responsible', $error->get('1fdce6bbf47d6b26a9cd809ea1910222')]);
            }
        }
      }
   }

?>