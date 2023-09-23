<?php
    require 'layout/navbar.php';

    require_once dirname(__DIR__) . '/app/Models/MonitoreoServer.php';
    require_once dirname(__DIR__) . '/app/Models/Server.php';

    use App\Models\MonitoreoServer;
    
    $data1 = [];
    $data2 = [];
    $lastDays = array(1,3,7);
    $value ="";
    $monitoreoServer = new MonitoreoServer();
    $resul;
    if(isset($_POST['day'])){
        $value = $_POST['day'];
        $resul = $monitoreoServer->getallFilterDay($value);
    }else{
        $resul = $monitoreoServer->getallColumn();
    }
    
    foreach ($resul as $k => $v) {
    $ref = str_replace("-2023", "", $v['server']."-".$v['date_event']);
    if ($v['status'] == 1) {
            $array = ["label" => $v['server'], "y" => mt_rand(0,1000)];
            array_push($data1, $array);
        } else {
            $array = ["label" => $v['server'], "y" => mt_rand(0,10000)];
            array_push($data2, $array);
        }
    }

?>

<div class="spanMsgInfo">
    <span>Monitoreo de servidores. </span>
</div>
<div class="spanFilter">
    <span>Seleccione el filtrado </span>
</div>

<div class="select-dis" style="padding-top: -5%;padding-bottom: 5%;">
<?php  

foreach ($lastDays as $valor) {
   
?>
        <center style="margin-left: 1%;">
            <form id="form<?php echo $valor ?>" method="post" action="/monitoreo" style="display: inline-block;">
                <input type="hidden" name="day" value="<?php echo $valor  ?>" /> 
                <button class="button buttonInfo"  onclick="document.getElementById('form<?php echo $valor  ?>').submit(); return false;">Last <?php echo $valor  ?> days</button> 
            </form>
       </center>
       <?php 
}
?>
</div>
<center>
    <div style="margin-left: 5%;margin-bottom: 5%;margin-top: -4%;">
        <div class="tooltip" >
            <a href="/monitoreo"><img src="/assets/images/limpieza-de-datos.png"></a>
            <span class="tooltiptext">Limpiar el filtrado</span>
        </div>
    </div>
</center>

<?php

if(count($resul) > 0){

?>    
  <script language="javascript"> 
    dataCanvan( <?php echo json_encode($data1); ?>, <?php echo json_encode($data2); ?>)
</script>  
<?php
}else{
  ?> 
  <center>
        <span>NO SE ENCONTRARON RESULTADOS</span>
  </center>  
 
   <?php
}
?>   


<div class="eventeServer " id="chart" style="width:90%;margin-left: 5%;margin-bottom: 1%;margin-top: -4%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<?php
    require 'layout/footer.php';
?>

