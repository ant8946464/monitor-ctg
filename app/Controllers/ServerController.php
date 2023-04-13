<?php

   namespace App\Controllers;

   use Lib\ValidatorFunctions;
   use Classes\Errors;
   use Classes\Success;
   use App\Models\Server;

   class ServerController extends Controller  {


      private $servername ;
      private   $ip ;
      private  $cluster ;
      private   $port ;
      private   $id ;

      public function index(){
         return $this->view('serverConf');
      }

      

      public function deleteServer(){
         return $this->view('deleteServerlist');
      }


      public function deleteServerBy(){
         return $this->view('deleteServerBy');
      }


      public function loadServer(){
         return $this->view('loadServer');
      }



      public function validServer(){
         $validator = new ValidatorFunctions();
         $success = new Success();
         $server = new Server();

         $ip_preg ='/^((0|[1-9][0-9]?|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(\.|$)){4}$/';
        
        
         $this->servername = $_POST['servername'];
         $this->ip = $_POST['ip'];
         $this->cluster = $_POST['cluster'];
         $this->port = $_POST['port'];

         $name = $server->findValue("name",$this->servername,'*');
         $ip = $server->findValue("ip",$this->ip,'*');
         if($_POST['id']){
            $this->id = $_POST['id'];
            if($validator->validateEmptyParameters(array($this->servername,$this->ip,$this->cluster,$this->port))){
               return $this->view('serverConf',$this->createArrayFront(null,'a5bcd7089d83f45e17e989fbc86003ed'));
            }else if(preg_match($ip_preg, $this->ip) == 0 ){
                   return $this->view('serverConf',$this->createArrayFront(null,'x5V1OITn7olzdb+7q2kjhV4Fmy0yRQ3yt'));
            }else{
         
               $server->update('id_ctg','',$this->createArrayInsert());
               return $this->view('portal',["success" => $success->get('YEqzEuBE9KJLiR73eeI2q+ynksjJuq4d')]);
            }
           
         }else {
            if($validator->validateEmptyParameters(array($this->servername,$this->ip,$this->cluster,$this->port))){
               return $this->view('serverConf',$this->createArrayFront(null,'a5bcd7089d83f45e17e989fbc86003ed'));
            }else if(!empty($ip)  || !empty( $name)) {
               return $this->view('serverConf',$this->createArrayFront(null,'GTF2LcSrh+8kXQ7T3y44fMTP9VEV3lDbl'));
            }else if(preg_match($ip_preg, $this->ip) == 0 ){
                   return $this->view('serverConf',$this->createArrayFront(null,'x5V1OITn7olzdb+7q2kjhV4Fmy0yRQ3yt'));
            }else{
                  $server->create($this->createArrayInsert());
                  return $this->view('serverConf',["success" => $success->get('qrNetDEjGRg4AFdpch2bn4xnTOm8zhAg')]);
              
            }
            
         }
         }

      

      private function createArrayInsert(){

         $array = [
             "name" => $this->servername ,
             "ip" => $this->ip,
             "cluster" =>  $this->cluster,
             "puerto" =>  $this->port,
         ];

         return $array ;
      }


      private function createArrayFront($msgInfo , $msgError){
         $error = new Errors();
         $success = new Success();
         $array = [
             "error" => $error->get($msgError),
             "success" => $success->get($msgInfo),
             "name" => $this->servername ,
             "ip" => $this->ip,
             "cluster" =>  $this->cluster,
             "port" =>  $this->port,
          
         ];
         return $array ;
      }


   }

?>