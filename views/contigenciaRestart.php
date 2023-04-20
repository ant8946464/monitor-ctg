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

<table>
    <thead>
        <tr>
            <th>Id </th>
            <th>Servidor</th>
            <th>Fecha de ejecución</th>
            <th>Estatus</th>
            <th>Aplicar reseto2</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $resul = $monitoreoServer->getallColumn();

        foreach ($resul as $k => $v) {

        ?>
            <tr>

                <td><?php echo $v['id_monitore']  ?></td>
                <td><?php echo $v['server']  ?></td>
                <td><?php echo $v['date_event'] ?></td>
                <td>
                    <?php

                    if ($v['status'] == 1) {
                    ?>
                        <img src="assets/images/vcsnormal_93488.png">
                    <?php
                    } else {
                    ?>
                        <img src="assets/images/vcsconflicting_93497.png">
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <?php

                    if ($v['status'] != 1) {
                    ?>
                        <a class="button" onclick="changestatusServer('<?php echo  $v['server']  ?>', '1')">Reiniciar</a>
                    <?php
                    }
                    ?>
                </td>

            <?php

        }
            ?>
            </tr>

    </tbody>
</table>

<script src="../assets/js/app.js"></script>
<script src="../assets/js/script.js"></script>