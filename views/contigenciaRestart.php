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

<script src="../assets/js/app.js"></script>
<script src="../assets/js/script.js"></script>