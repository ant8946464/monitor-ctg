<?php

    use app\Models\Server;

    $sever = new Server();
    $ip =$_POST['ip'];

    $result = $sever->findValue('ip',  $ip, '*');

    var_dump( $result);


   

?>

<div class="contenedor-inputs">
    <input type="hidden" name="nombre" value= "" /> 
    <input style="width: 80%;margin-left: 40px;" type="text" name="servername" placeholder="Nombre del servidor" maxlength="50" value="" >
    <input style="width: 80%;margin-left: 40px;" type="text" name="ip" placeholder="ip" maxlength="12" value="" >
    <input style="width: 80%;margin-left: 40px;" type="text" name="cluster" placeholder="Cluster" maxlength="15" value="" >
    <input style="width: 80%;margin-left: 40px;" type="text" name="port" placeholder="puerto" maxlength="4" value="" >
    <input type="submit" value="Enviar" class="btn-enviar" />
</div>