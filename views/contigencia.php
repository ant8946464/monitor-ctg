<?php

require_once dirname(__DIR__) . '/app/Models/MonitoreoServer.php';
require_once dirname(__DIR__) . '/app/Models/Server.php';


use App\Models\MonitoreoServer;
use App\Models\Server;


$monitoreoServer = new MonitoreoServer();
$server = new Server();

require 'layout/navbar.php';
?>


<div class="spanMsgInfo">
    <span>En este modulo se podra realizar las siguientes actividades en los servidores: reiniciar, iniciar y detener. </span>
</div>

<fieldset>
    <div class="tabs">
        <div class="tab-container">
            <div id="tab2" class="tab">
                <a href="#tab2">Iniciar/Detener </a>
                <div class="tab-content">
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
                </div>
            </div>
            <div id="tab1" class="tab">
                <a href="#tab1">Reiniciar</a>
                <div class="tab-content">
                    <section class="content">
                        <div style="margin-top: 10px;">
                            <table id="tableReset">
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

                                    $porPagina = 10;
                                    $pagina = 1;
                                    if (isset($_POST['page'])) {
                                        $pagina = $_POST['page'];
                                    }


                                    $comienzo = ($pagina - 1) * $porPagina;

                                    $resul = $monitoreoServer->getallColumnLimit($comienzo, $porPagina);

                                    $resulAll = $monitoreoServer->getallColumn();

                                    $pages =  ceil(count($resulAll) / $porPagina);


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
                                                    <a class="button " ="changestatusServer('<?php echo  $v['server']  ?>', '0')">Reiniciar</a>
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
                            <?php 
        
        echo '<section class="pagination">
        <center>
          <ul>';
 
            $pages =  ceil(count( $resulAll)/$porPagina) ;
 
            if ($pagina == 1) echo '<li><a class="no-link" onclick="changePagination('.($pagina - 1).',0)"><<</a></li>';
 
            else echo '<li><a onclick="changePagination('.($pagina - 1).',0)"><i class="icon-circle-left"></i></a></li>';
            
 
            for ($i = 1; $i <= $pages; $i ++) {
 
              if ($pagina == $i) echo '<li><a class="active" onclick="changePagination('.$i.',0)">'.$i.'</a></li>';
 
              else echo '<li><a onclick="changePagination('.$i.',0)">'.$i.'</a></li>';
 
            }
 
            if ($pagina == $pages)echo '<li><a class="no-link" onclick="changePagination('.($pagina + 1).',0)"><i class="icon-circle-right"></i></a></li>';
 
            else echo '<li><a onclick="changePagination('.($pagina + 1).',0)">>></a></li>';
       
          echo '</ul>
        </center>
      </section>';
     
     ?>
                    </section>
                </div>
            </div>

        </div>
    </div>
</fieldset>


<?php

require 'layout/footer.php';
?>