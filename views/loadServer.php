<?php
require_once dirname( __DIR__ ) . '/app/Models/Server.php';
    use app\Models\Server;

    $sever = new Server();
    $ip =$_POST['ip'];

    $result = $sever->findValue('ip',  $ip, '*');
  
    $items = [];
	foreach ($result as $k => $v) {
		array_push($items, $v);
    }

?>

<div class="contenedor-inputs">
    <input type="hidden" name="id" value= "<?= $items[0] ?>" /> 
    <label style="width: 80%;margin-left: 40px;">Nombre del servidor</label>
    <input style="width: 80%;margin-left: 40px;" type="text" name="servername"  maxlength="50" value="<?= $items[1] ?>" >
    <label style="width: 80%;margin-left: 40px;">IP</label>
    <input style="width: 80%;margin-left: 40px;" type="text" name="ip"  maxlength="12" value="<?= $items[2] ?>" >
    <label style="width: 80%;margin-left: 40px;">Cluster</label>
    <input style="width: 80%;margin-left: 40px;" type="text" name="cluster"  maxlength="15" value="<?= $items[3] ?>" >
    <label style="width: 80%;margin-left: 40px;">Puerto</label>
    <input style="width: 80%;margin-left: 40px;" type="number" name="port"  maxlength="4" value="<?= $items[4] ?>" >
    <input type="submit" value="Actualizar" class="btn-enviar" />
</div>
