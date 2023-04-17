	<?php
	require_once dirname( __DIR__ ) . '/app/Models/AreaManager.php';
	require_once dirname( __DIR__ ) . '/app/Models/Area.php';
	require_once dirname( __DIR__ ) . '/app/Models/Job.php';

		use App\Models\AreaManager;
		use App\Models\Area;
		use App\Models\Job;

		$connectioDb;
		$Colum;
		$value;

		if($modelo == "AreaManager"){
			$connectioDb = new AreaManager();
		 }else if($modelo == "Area"){
			$connectioDb = new Area();
		}else if($modelo == "Job"){
			$connectioDb = new Job();
		}
		  
		if(isset($_POST[$postIndex])){
			$Colum = $postIndex;
			$value = $_POST[$postIndex];

		} 
	?>

         <?php
			$resul = $connectioDb->findValue($Colum, $value,'*');
			$items = [];
			if(!empty($resul)){		
			foreach ($resul as $k => $v) {
				array_push( $items,$v);
					}
		?>

	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th><?php if(isset($nameHeader)){?><?=$nameHeader ?> <?php }  ?></th>
				<th>eliminar</th>
			</tr>
		</thead>
			<tbody>
				<?php
					$resul = $connectioDb->findValue($Colum, $value,'*');
					$items = [];
					
					foreach ($resul as $k => $v) {
					       array_push( $items,$v);
					}
			    ?>
				<tr>
					<td><?php echo $items[0] ?></td>
					<td><?php echo $items[1] ?></td>
					<td><a class="button" href="#modal1" onclick="asigID(<?php echo $items[0]?>,'<?php echo $pathDelete ?>')">eliminar</a></td>
				</tr>
			</tbody>
	</table>

	<?php
			}else{

	?>
            <span>NO EXISTEN REGISTROS</span>
    <?php
		}

	?>


