<?php

require_once dirname( __DIR__ ) . '/app/Models/Server.php';

use App\Models\Server;

$connectioDb = new Server();
$value;
$Colum;


if (isset($_POST['name'])) {

	$value = $_POST['name'];
	$Colum = 'name';
} elseif (isset($_POST['ip'])) {
	$value = $_POST['ip'];
	$Colum = 'ip';
} elseif (isset($_POST['cluster'])) {
	$value = $_POST['cluster'];
	$Colum = 'cluster';
} elseif (isset($_POST['puerto'])) {
	$value = $_POST['puerto'];
	$Colum = 'puerto';
}


?>

<?php
$resul = $connectioDb->findValue($Colum, $value, '*');
$items = [];
if (!empty($resul)) {
	foreach ($resul as $k => $v) {
		array_push($items, $v);
	}
?>

	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Ip</th>
				<th>Cluster</th>
				<th>Puerto</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$resul = $connectioDb->findValue($Colum, $value, '*');
			$items = [];

			foreach ($resul as $k => $v) {
				array_push($items, $v);
			}
			?>
			<tr>
				<td data-titulo="Id"><?php echo $items[0] ?></td>
				<td data-titulo="Nombre"><?php echo $items[1] ?></td>
				<td data-titulo="Ip"><?php echo $items[2] ?></td>
				<td data-titulo="Cluster"><?php echo $items[3] ?></td>
				<td data-titulo="Puerto"><?php echo $items[4] ?></td>
				<td > <a class="button" href="#modal1" onclick="asigID(<?php echo $items[0] ?>,'deleteServer')">eliminar</a></td>
			</tr>
		</tbody>
	</table>

<?php
} else {

?>
	<span>NO EXISTEN REGISTROS</span>
<?php
}

?>