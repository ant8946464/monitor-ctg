<?php

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
    <input style="width: 80%;margin-left: 40px;" type="text" name="servername" placeholder="Nombre del servidor" maxlength="50" value="<?= $items[1] ?>" >
    <input style="width: 80%;margin-left: 40px;" type="text" name="ip" placeholder="ip" maxlength="12" value="<?= $items[2] ?>" >
    <input style="width: 80%;margin-left: 40px;" type="text" name="cluster" placeholder="Cluster" maxlength="15" value="<?= $items[3] ?>" >
    <input style="width: 80%;margin-left: 40px;" type="text" name="port" placeholder="puerto" maxlength="4" value="<?= $items[4] ?>" >
    <input type="submit" value="Actualizar" class="btn-enviar" />
</div>
s