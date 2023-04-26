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
$resulAll = $server->getallColumn();
$porPagina = 10;
$pagina = 1;
if (isset($_POST['paginator'])) {
    $pagina = $_POST['paginator'];
}
$comienzo = ($pagina - 1) * $porPagina;
$resul = $monitoreoServer->getallColumnLimit($comienzo, $porPagina);
$pages =  ceil(count($resulAll) / $porPagina);
?>
<section class="content">
    <div style="margin-top: 10px;">
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

                $resul = $server->getallColumn(null, null);

                foreach ($resul as $k => $v) {

                ?>
                    <tr>
                        <td><?php echo $v['id_ctg']  ?></td>
                        <td><?php echo $v['name']  ?></td>
                        <td><?php echo $v['ip'] ?></td>
                        <?php
                        if ($v['estatus'] == 1) {
                        ?>
                            <td><a class="button buttonInfo" onclick="changestatusServer('<?php echo  $v['name']  ?>', '2')">Detener</a></td>
                        <?php
                        } else if ($v['estatus'] == 2) {
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
</section>

<section class="pagination">
    <center>
        <ul>
            <?php
            $pages =  ceil(count($resulAll) / $porPagina);

            if (($pagina == 1)) {
            ?>
                <li><a class="no-link" onclick="changePagination('<?php echo ($pagina - 1) ?>','contigenciaStarStop','content')">
                        << </a>
                </li>

            <?php

            } else {

            ?>
                <li><a onclick="changePagination('<?php echo ($pagina - 1) ?>','contigenciaStarStop','content')"><i class="icon-circle-left"></i></a></li>
                <?php

            }

            for ($i = 1; $i <= $pages; $i++) {

                if ($pagina == $i) {

                ?>

                    <li><a class="active" onclick="changePagination('<?php echo $i ?>','contigenciaStarStop','content)"><?php echo $i ?></a></li>

                <?php

                } else {

                ?>
                    <li><a onclick="changePagination('<?php echo $i ?>','contigenciaStarStop','content')"><?php echo $i ?></a></li>

                <?php

                }
            }

            if ($pagina == $pages) {


                ?>
                <li><a class="no-link" onclick="changePagination('<?php echo ($pagina + 1) ?>','contigenciaStarStop','content')"><i class="icon-circle-right"></i></a></li>
            <?php

            } else {


            ?>

                <li><a onclick="changePagination('<?php echo ($pagina + 1) ?>','contigenciaStarStop','content')">>></a></li>
            <?php

            }

            ?>

        </ul>
    </center>
</section>
</center>


</section>

<script src="../assets/js/app.js"></script>
<script src="../assets/js/script.js"></script>