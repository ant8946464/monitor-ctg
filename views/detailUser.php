<?php
require_once dirname( __DIR__ ) . '/app/Models/User.php';
require_once './classes/Session.php';



use Classes\Session;
        use App\Models\User;

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

		$session = new Session();

		$session->setSessionName('reporteUser',0) ;
		$session->setSessionName('columUser',$Colum ) ;
		$session->setSessionName('valueUser',$value) ;

	?>
        
         <?php
			$resul = $connectioDb->findValue($Colum, $value,'*');
			if(!empty($resul)){		
			
		?>

	<table style="margin-bottom: 10%;">
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
