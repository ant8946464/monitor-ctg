	<?php

		use App\Models\AreaManager;
		$manager = new AreaManager(); 
		$Colum;
		$value;

		if(isset($_POST['manager_name'])){
			$Colum = 'manager_name';
			$value = $_POST['manager_name'];
		} 
	?>

	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre del resposable</th>
				<th>eliminar</th>
			</tr>
		</thead>
			<tbody>
				<?php
					$resul = $manager->findValue($Colum, $value,'*');
					$items = [];
					
					foreach ($resul as $k => $v) {
					       array_push( $items,$v);
					}
			    ?>
				<tr>
					<td><?php echo $items[0] ?></td>
					<td><?php echo $items[1] ?></td>
					<td><a class="button" href="#modal1" onclick="asigID(<?php echo $items[0]?>)">eliminar</a></td>
				</tr>
			</tbody>
	</table>


