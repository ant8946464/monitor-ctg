<?php
    require 'layout/navbar.php';

    $value;
	if(isset($_POST['selector'])){
		$value = $_POST['selector'];
        var_dump($value);
    }
   
   
?>


<div class="spanMsgInfo">
    <span>Monitoreo de servidores. </span>
</div>
<div class="spanFilter">
    <span>Seleccione el filtrado </span>
</div>
<div class="select-dis" style="padding-top: -5%;padding-bottom: 5%;">
        <div class="content-select select-center">
            <select name="idSelectHour" id="idSelectHour" onchange="selectMonitor(this.id)"  required>
                <option selected="selected" disabled>Tiempo de consulta</option>
                <option value="1" >-1 dia</option>
                <option value="4" >-4 dias</option>
                <option value="7" >-7 dias</option>
            </select>
       </div>
</div>


  
<?php
    require 'monitoreoGrafico.php';
    require 'layout/footer.php';
?>