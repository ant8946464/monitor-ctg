<?php
require 'layout/navbar.php';
require_once dirname(__DIR__) . '/app/Models/User.php';
require_once dirname(__DIR__) . '/app/Models/Activitylog.php';
require_once dirname(__DIR__) . '/app/Models/Server.php';

use App\Models\User;
use App\Models\Activitylog;
use App\Models\Server;

$userModel = new User();
$server = new Server;
$actitivy = new Activitylog();


?>

<?php
if (isset($success)) {
?>
    <div class="info"><b><?= $success ?></b></div>
<?php
}
?>
<div class="spanMsgInfo">
    <span>Se listan las actividades de los servidores. </span>
</div>

<fieldset >
<div class="spanFilter">
    <span>Seleccione el filtrado </span>
</div>
    <div class=" select-dis">
        <div class="content-select select-center">
            <select name="userSelect" id="userSelect" onchange="selectView(this.id)" required>
                <option selected="selected" disabled> Usuario</option>
                <?php foreach ($userModel->getItemColumns('user_corporate', '') as $user) : ?>
                    <option value="<?php echo $user['user_corporate'] ?>"><?php echo $user['user_corporate'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="content-select select-center">
            <select name="serverSelect" id="serverSelect" onchange="selectView(this.id)" required>
                <option selected="selected" disabled>Servidor</option>
                <?php foreach ($server->getItemColumns('name', '') as $server) : ?>
                    <option value="<?php echo $server['name'] ?>"><?php echo $server['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="content-select select-center">
            <select name="activitySelect" id="activitySelect" onchange="selectView(this.id)" required>
                <option selected="selected" disabled>Actvidad</option>
                <?php foreach ($actitivy->getItemColumnsDistinct('activity', '') as $activity) : ?>
                    <option value="<?php echo $activity['activity'] ?>"><?php echo $activity['activity'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

    </div>

    </div>
    <center>
        <div class="tooltip">
            <a href="/portalmonitor"><img src="/assets/images/limpieza-de-datos.png"></a>
            <span class="tooltiptext">Limpiar el filtrado</span>
        </div>
        <div class="tooltip" style="margin-left: 5%;">
            <a type="button"   id="btnver" href="/reporte" target="_blank"><img src="/assets/images/pdf.png"></a>
                <span class="tooltiptext">Exportar PDF</span>
            </div>
    </center>
    
      

    <?php
    if (isset($_POST['pagination'])) {
        $pagina = $_POST['pagination'];
    
    }

    require_once 'portalPagination.php';
    
    ?>

</fieldset>

<?php

require 'layout/footer.php';
?>