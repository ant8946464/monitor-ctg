
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
                <?php
                     require_once 'contigenciaStarStop.php';
                    ?>
                </div>
            </div>
            <div id="tab1" class="tab">
                <a href="#tab1">Reiniciar</a>
                <div class="tab-content">
                    <?php
                     require_once 'contigenciaRestart.php';
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