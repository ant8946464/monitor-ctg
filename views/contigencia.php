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
    <span>En este módulo se podrá realizar las siguientes actividades en los servidores: reiniciar, iniciar y detener. </span>
</div>
<div class="eventeServer">
    <fieldset style=" margin-top: 0.5%; margin-bottom:0.1%; ">
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
</div>

<?php

require 'layout/footer.php';
?>