<?php
if (isset($success)) {
?>
    <div class="info " style="margin-left: 50%;"><b><?= $success ?></b></div>
<?php
}
?>

<?php

require_once dirname(__DIR__) . '/app/Models/MonitoreoServer.php';

use App\Models\MonitoreoServer;

$monitoreoServer = new MonitoreoServer();



?>

<section class="content-1" id="tableReset">

<div class="tooltip" style="float:  right; ">
            <a type="button"   id="btnver" href="/reportEvent" target="_blank"><img src="/assets/images/pdf.png"></a>
                <span class="tooltiptext">Exportar PDF</span>
            </div>
    <center>
        <table>
            <thead>
                <tr>
                    <th>Id </th>
                    <th>Servidor</th>
                    <th>Fecha de ejecución</th>
                    <th>Estatus</th>
                    <th>Aplicar reseto</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $porPagina = 25;
                $pagina = 1;
                if (isset($_POST['paginator'])) {
                    $pagina = $_POST['paginator'];
                }

                $comienzo = ($pagina - 1) * $porPagina;

                $resul = $monitoreoServer->getallColumnLimit($comienzo, $porPagina);

                $resulAll = $monitoreoServer->getallColumn();

                $pages =  ceil(count($resulAll) / $porPagina);


                foreach ($resul as $k => $v) {

                ?>
                    <tr>

                        <td data-titulo="Id"><?php echo $v['id_monitore']  ?></td>
                        <td data-titulo="Servidor"><?php echo $v['server']  ?></td>
                        <td data-titulo="Fecha de ejecución"><?php echo $v['date_event'] ?></td>
                        <td data-titulo="Estatus">
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
                        <td data-titulo="Aplicar reseto">
                            <?php

                            if ($v['status'] != 1) {
                            ?>
                                <a class="button button-Cont" onclick="changestatusServer('<?php echo  $v['server']  ?>', '0')">Reiniciar</a>
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
    </center>

    <?php
     $url =  'contigenciaRestart';
     $html =  'content-1';

    ?>

    <section class="pagination">
        <center>
            <ul>
                <?php
                $pages =  ceil(count($resulAll) / $porPagina);

                if (($pagina == 1)) {
                ?>
                    <li><a class="no-link" onclick="changePagination('<?php echo ($pagina - 1) ?>','contigenciaRestart','content-1')">
                            << </a>
                    </li>

                <?php

                } else {

                ?>
                    <li><a onclick="changePagination('<?php echo ($pagina - 1) ?>','contigenciaRestart','content-1')"><i class="icon-circle-left"></i></a></li>
                    <?php

                }

                for ($i = 1; $i <= $pages; $i++) {

                    if ($pagina == $i) {

                    ?>

                        <li><a class="active" onclick="changePagination('<?php echo $i ?>','contigenciaRestart','content-1')"><?php echo $i ?></a></li>

                    <?php

                    } else {

                    ?>
                        <li><a onclick="changePagination('<?php echo $i ?>','contigenciaRestart','content-1')"><?php echo $i ?></a></li>

                    <?php

                    }
                }

                if ($pagina == $pages) {


                    ?>
                    <li><a class="no-link" onclick="changePagination('<?php echo ($pagina + 1) ?>','contigenciaRestart','content-1')"><i class="icon-circle-right"></i></a></li>
                <?php

                } else {


                ?>

                    <li><a onclick="changePagination('<?php echo ($pagina + 1) ?>','contigenciaRestart','content-1')">>></a></li>
                <?php

                }

                ?>

            </ul>
        </center>
    </section>

</section>

