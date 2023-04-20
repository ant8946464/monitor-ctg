<?php

   namespace App\Controllers;

   require_once 'Controller.php';
   require_once './app/Models/Activitylog.php';
   require_once './app/Models/User.php';
   require_once './app/Models/Server.php';
   require_once './classes/Session.php';
   require_once './classes/success.php';
   

   use App\Models\Activitylog;
   use Classes\Session;
   use App\Models\User;
   use App\Models\Server;
   use Classes\Success;


   class PlanContingenciaController extends Controller  {

      private $activity;
      private $idServer;
      private $idUser;
    

      public function index(){
         return $this->view('contigencia');
      }


      public function activityServer(){

       $session = new Session();
       $server = new Server();
       $activitylog = new Activitylog();
       $connectioDb = new User();
       $success = new Success();

       $serverName = $_POST['nameServer'];
       $statusActivity   = $_POST['status'];
       $msgFront='';

       $resul = $connectioDb->findValue('user_corporate',$session->getSessionName('user'),'*');
		 $itemsUser = [];
		 foreach ($resul as $k => $v) {
					array_push( $itemsUser,$v);
		 }
       $this->idUser =$itemsUser[0];


       $resulServer = $server->findValue('name',$serverName,'*');
		 $itemsServer = [];
		 foreach ($resulServer as $k => $v) {
					array_push( $itemsServer,$v);
		 }
       $this->idServer = $itemsServer[0];
       $msgFront = $success->get('aQWdRIYrrlJHCaOGmkdDtE4VXRigwkGmT');
        if($statusActivity == 0 ){
          $this->activity = 'Reinicio';
          $activitylog->create($this->createArrayInsert());
          return $this->view('contigenciaRestart',[ "success" =>$msgFront.$this->activity.' servidor '.$serverName  ]);
        }else if($statusActivity == 1){
         $this->activity = 'Iniciado';
         $server->update('id_ctg',  $this->idServer,["estatus" => 1]);
         $activitylog->create($this->createArrayInsert());
         return $this->view('contigenciaActivity',[ "success" =>$msgFront.$this->activity.' servidor '.$serverName ]);
        }else if($statusActivity == 2){
         $this->activity = 'Detener';
         $server->update('id_ctg',  $this->idServer,["estatus" => 2]);
         $activitylog->create($this->createArrayInsert());
         return $this->view('contigenciaActivity',[ "success" =>$msgFront.$this->activity.' servidor '.$serverName ]);
        }

        
      }

   

      

      private function createArrayInsert(){
   
         $date_now = date("Y-m-d h:i:s"); 
         $array = [
             "activity" => $this->activity ,
             "event_date" => $date_now,
             "d29_server_ctg_id" => $this->idServer ,
             "d29_user_id" => $this->idUser ,
         ];

         return $array ;
      }


    

   }

?>