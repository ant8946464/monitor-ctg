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
require 'layout/navbar.php';

use App\Models\MonitoreoServer;
use App\Models\Server;
$monitoreoServer = new MonitoreoServer();
$server = new Server();
$resulAll = $server->getallColumn();
require 'layout/footer.php';
?>



<script src="../assets/js/app.js"></script>
<script src="../assets/js/script.js"></script>