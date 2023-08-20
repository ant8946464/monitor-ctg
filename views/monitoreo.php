<?php
    require 'layout/navbar.php';

    require_once dirname(__DIR__) . '/app/Models/MonitoreoServer.php';
    require_once dirname(__DIR__) . '/app/Models/Server.php';

    use App\Models\MonitoreoServer;
    
?>
 
 <?php

var_dump('MONITOR ');
$monitoreoServer = new MonitoreoServer();
$data1 = [];
$data2 = [];

$resul = $monitoreoServer->getallColumn();

foreach ($resul as $k => $v) {
$ref = str_replace("-2023", "", $v['server']."-".$v['date_event']);
if ($v['status'] == 1) {
        $array = ["label" => $ref, "y" => mt_rand(0,1000)];
        array_push($data1, $array);
    } else {
        $array = ["label" => $ref, "y" => mt_rand(0,10000)];
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
        <div class="content-select select-center">
            <select name="idSelectHour" id="idSelectHour"   required>
                <option selected="selected" disabled>Tiempo de consulta</option>
                <option value="1" >-1 dia</option>
                <option value="4" >-4 dias</option>
                <option value="7" >-7 dias</option>
            </select>
       </div>
</div>

<?php
    function consulta(){

        $monitoreoServer = new MonitoreoServer();
       
        $resul = $monitoreoServer->getallColumn();
        
        foreach ($resul as $k => $v) {
        $ref = str_replace("-20", "", $v['server']."-".$v['date_event']);
        if ($v['status'] == 1) {
                $array = ["label" => $ref, "y" => mt_rand(0,1000)];
                array_push($data1, $array);
            } else {
                $array = ["label" => $ref, "y" => mt_rand(0,10000)];
                array_push($data2, $array);
            }
        }
    }
?>


<script >
var value;
$(function(){
    var $tabla = $('#idSelectHour');
    $('#idSelectHour').change(function(){
         value = $(this).val();
         console.log(value);
         deleteTableId(value);   
         console.log(value);
        if(value === 'undefined'){
        }else{
            window.location.href = "monitoreoGrafico";
        }
    });
})    

deleteTableId();

function deleteTableId() {
  
   
    window.onload = function () {
    var chart2 = new CanvasJS.Chart("chart", {

	title:{
		text: "Monitoreo de Servidores"
	},
	axisX: {
		title:"Server",
        labelFontSize: 8
	},
	axisY:{
		title: "Response Time (in ms)"
      
	},

	data: [
        {
            type: "scatter",
            toolTipContent: "<span style=\"color:#4F81BC \"><b>{name}</b></span><br/><b> Load:</b> {x} TPS<br/><b> Response Time:</b></span> {y} ms ",
            name: "Server ok",
            markerType: "square",
            showInLegend: true,
            dataPoints: <?php echo json_encode($data1); ?>
        },
        {
            type: "scatter",
            name: "Server Error",
            markerType: "triangle",
            showInLegend: true, 
            toolTipContent: "<span style=\"color:#C0504E \"><b>{name}</b></span><br/><b> Load:</b> {x} TPS<br/><b> Response Time:</b></span> {y} ms",
            dataPoints: <?php echo json_encode($data2); ?>
        }
	]
});
 
    chart2.render();
}


}

</script>

<div class="formadd " id="chart" style="width:90%;margin-left: 5%;margin-bottom: 1%;margin-top: -4%;"></div>

<?php
    require 'layout/footer.php';
?>

