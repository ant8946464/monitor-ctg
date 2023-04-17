<?php
require 'layout/navbar.php';
require_once dirname( __DIR__ ) . '/app/Models/MonitoreoServer.php';


use App\Models\MonitoreoServer;


$monitoreoServer = new MonitoreoServer();



?>

<?php
    if(isset($success)){
  ?>            
    <div class="info"><b><?=  $success ?></b></div>   
  <?php    
      }
  ?>
<div class="spanMsgInfo">
    <span>En este modulo se podra realizar las siguientes actividades en los servidores: reiniciar, iniciar y detener. </span>
</div>

<fieldset>

    <section class="content">

        <div style="margin-top: 10px;">
            <table>
                <thead>
                    <tr>
                    <th>Id  </th>
                        <th>Servidor</th>
                        <th>Fecha de ejecución</th>
                        <th>Estatus</th>
                        <th></th>
                        <th></th>
                        <th></th>
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

                                if($v['status'] == 1){
                                ?>
                                     <img src="assets/images/vcsnormal_93488.png" >
                                <?php
                                }else{
                                ?>
                                     <img src="assets/images/vcsconflicting_93497.png" >
                                <?php
                                }
                                ?>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        <?php

                    }
                        ?>
                        </tr>

                </tbody>
            </table>
        </div>
    </section>
</fieldset>


<?php

require 'layout/footer.php';
?>