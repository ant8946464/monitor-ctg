<?php 

    
    require_once './app/Controllers/ProcessController.php';
    require_once './app/Controllers/ServerController.php';
    require_once './app/Models/MonitoreoServer.php';

    use App\Controllers\ProcessController;
    use App\Models\Server;
    use App\Models\MonitoreoServer;


    $processController = new ProcessController();

    $status = $processController->validStatus();

    if( $status == 1){

        var_dump('SE EJECUTA VALIDACION DE LOS SERVIDORES');
        $server = new Server();
        foreach ($server->getallColumn() as $v) {
            $numero_aleatorio = mt_rand(0,1000);
            
            $monitoreoServer = new MonitoreoServer();
     
            if( $numero_aleatorio >= 100 &&  $numero_aleatorio <=200){
                $monitoreoServer->create(createArrayInsert($v['name'],0));
                var_dump($numero_aleatorio);
                var_dump("ERROR");
            }else{

                $monitoreoServer->create(createArrayInsert($v['name'],1));
                var_dump($numero_aleatorio);
                var_dump("OK");
            }

        }
    }


     function createArrayInsert($server, $status){
        $array = [
  
            "server" => $server,
            "status" => $status,
            "date_event" => date('Y-m-d'),
        ];

        return $array ;
     }

?>