<?php

	use App\Models\Activitylog;
	$actitivy = new Activitylog(); 
	$Colum;
	$value;

    if(isset($_POST['user_corporate'])){
		$Colum = 'user_corporate';
		$value = $_POST['user_corporate'];
		
    } else if(isset($_POST['activity'])){
		$Colum = 'activity';
		$value = $_POST['activity'];
		
    }else  if(isset($_POST['name'])){
		$Colum = 'name';
		$value = $_POST['name'];
		
    }
  
?>
	<table>
	<thead>
		<tr>
			<th>Id</th>
			<th>Actividad</th>
			<th>Servidor</th>
			<th>Usuario</th>
			<th>Fecha del evento</th>
		</tr>
	</thead>
	<tbody>
		<?php
            $resul = $actitivy->getallJoinWhere($Colum, $value);
			foreach ($resul as $k => $v) {
		?>
		<tr>
			<td><?php echo $v['id_event']  ?>
			</td>
			<td><?php echo $v['activity']  ?>
			</td>
			<td><?php echo $v['name']  ?>
			</td>
			<td><?php echo $v['user_corporate'] ?>
			</td>
			<td><?php echo $v['event_date']  ?>
			</td>
		</tr>
		<?php
					 
			}
		?>
	</tbody>
</table>
