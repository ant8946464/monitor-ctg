<?php

		require_once dirname( __DIR__ ) . '/app/Models/User.php';
		
        use App\Models\User;

		$connectioDb;
		$Colum;
		$value;
        $connectioDb = new User();
		  
		if(isset($_POST['request'])){
			$Colum = 'id_user';
			$value = $_POST['request'];

		} 
       
		$connectioDb->delete($Colum,$value);
		
            

?>


      
<?php
		    $path=' deleteUser';
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
					<td data-titulo="Id"><?php echo $items[0] ?></td>
					<td data-titulo="Nombre"><?php echo $items[1] ?></td>
					<td data-titulo="Apellidos"><?php echo $items[2].' '.$items[3] ?></td>
					<td data-titulo="Usuario Generico"><?php echo $items[4] ?></td>
					<td data-titulo="Correo"><?php echo $items[5] ?></td>
					<td data-titulo="Teléfono"><?php echo $items[11] ?></td>
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

        
    