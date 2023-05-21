<?php 

    
    require_once './app/Controllers/ProcessController.php';
    require_once './app/Controllers/ServerController.php';
    require_once './app/Models/MonitoreoServer.php';
    require_once './classes/Mail.php';

    use App\Controllers\ProcessController;
    use App\Models\Server;
    use App\Models\MonitoreoServer;
    use Classes\Mail;

    $processController = new ProcessController();

    if( $processController->validStatus() == 1){
        var_dump('SE EJECUTA VALIDACION DE LOS SERVIDORES');
        $server = new Server();
        foreach ($server->getallColumn() as $v) {
            $numero_aleatorio = mt_rand(0,1000);    
            $monitoreoServer = new MonitoreoServer();
            var_dump($v['estatus']);
            if($v['estatus'] == 1){
                if( $numero_aleatorio >= 100 &&  $numero_aleatorio <=200){
                    $monitoreoServer->create(createArrayInsert($v['name'],0));
                    var_dump("ERROR");
                    $email = new Mail(constant('GROUP_MAIL'),'Proceso de Validación','El server '.$v['name'].' esta presetnado intermitencia, favor de atender.'  );
                    $email->sendMail();
                }else{
                    $monitoreoServer->create(createArrayInsert($v['name'],1));
                    var_dump("OK");
                }
            }
        }
    }


     function createArrayInsert($server, $status){
        $array = [
            "server" => $server,
            "status" => $status,
            "date_event" => date('d-m-Y H:i:s'),
        ];

        return $array ;
     }


?>