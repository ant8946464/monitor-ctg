<?php
require_once dirname( __DIR__ ) . '/app/Models/User.php';
        use App\Models\User;

		$connectioDb;
		$Colum;
		$value;
        $connectioDb = new User();
		  
		if(isset($_POST['id_user'])){
			$Colum = 'id_user';
			$value = $_POST['id_user'];

		}else if(isset($_POST['user_corporate'])){
			$Colum = 'user_corporate';
			$value = $_POST['user_corporate'];

		}else if(isset($_POST['email'])){
			$Colum = 'email';
			$value = $_POST['email'];

		} 
	?>
        
         <?php
			$resul = $connectioDb->findValue($Colum, $value,'*');
			if(!empty($resul)){		
			
		?>

	<table>
		<thead>
			<tr>
			   <th>Id</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Usuario Generico</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th></th>
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
					<td><?php echo $items[2].' '.$items[3] ?></td>
					<td><?php echo $items[4] ?></td>
					<td><?php echo $items[5] ?></td>
					<td><?php echo $items[11] ?></td>
					<td><a class="button" href="#modal1" onclick="asigID(<?php echo $items[0]?>,'deleteUser')">eliminar</a></td>
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
