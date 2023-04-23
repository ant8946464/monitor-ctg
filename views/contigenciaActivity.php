<?php
if (isset($success)) {
?>
    <div class="info " style="margin-left: 50%;"><b><?= $success ?></b></div>
<?php
}
?>

<?php

require_once dirname(__DIR__) . '/app/Models/MonitoreoServer.php';
require_once dirname(__DIR__) . '/app/Models/Server.php';


use App\Models\MonitoreoServer;
use App\Models\Server;


$monitoreoServer = new MonitoreoServer();
$server = new Server();


?>

<table id="tableActivity">
    <thead>
        <tr>
            <th>Id </th>
            <th>Servidor</th>
            <th>Ip</th>
            <th>ACTIVIDAD DEL SERVIDOR</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $resul = $server->getallColumn();

        foreach ($resul as $k => $v) {

        ?>
            <tr>
                <td><?php echo $v['id_ctg']  ?></td>
                <td><?php echo $v['name']  ?></td>
                <td><?php echo $v['ip'] ?></td>
                <?php  
                  if($v['estatus'] == 1){
                ?>
                    <td><a class="button buttonInfo"  onclick="changestatusServer('<?php echo  $v['name']  ?>', '2')" >Detener</a></td>
                <?php
                  }else if ($v['estatus'] == 2){
                ?>
                 <td> <a class="button buttonInfo" onclick="changestatusServer('<?php echo  $v['name']  ?>', '1')">Iniciar</a> </td>
                <?php  
                }
                ?>
                
               
            <?php
           }
            ?>
            </tr>

    </tbody>
</table>

<script src="../assets/js/app.js"></script>
<script src="../assets/js/script.js"></script>