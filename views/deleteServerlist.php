<?php

	require_once dirname( __DIR__ ) . '/app/Models/Server.php';
	use App\Models\Server;

	$server = new Server();
	$Colum = 'id_ctg';
	$value;

	if (isset($_POST['request'])) {

		$value = $_POST['request'];

	}
	
	$server->delete($Colum, $value);
	$resul = $resul = $server->getallColumn();
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

				$resul = $server->getallColumn();

				foreach ($resul as $k => $v) {

				?>
					<tr>

						<td><?php echo $v['id_ctg']  ?></td>
						<td><?php echo $v['name']  ?></td>
						<td><?php echo $v['ip'] ?></td>
						<td><?php echo $v['cluster'] ?></td>
						<td><?php echo $v['puerto'] ?></td>
						<td><a class="button" href="#modal1" onclick="asigID(<?php echo $v['id_ctg'] ?>,'deleteServer')">eliminar</a></td>
					<?php

				}
					?>
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