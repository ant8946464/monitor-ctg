<?php

require_once dirname( __DIR__ ) . '/app/Models/Activitylog.php';




	use App\Models\Activitylog;
	$actitivy = new Activitylog(); 
	$Colum;
	$value;
    if(isset($_POST['colum'])){
		$Colum = $_POST['colum'];
		
    } 
	
	if(isset($_POST['value'])){

		$value = $_POST['value'];
		
    }

	

	$porPagina = 20;
	$pagina = 1;
	if (isset($_POST['paginator'])) {
		$pagina = $_POST['paginator'];
	}

	$comienzo = ($pagina - 1) * $porPagina;
	
	$resul = $actitivy->getallJoinWhereLimit($Colum, $value, $comienzo, $porPagina);

	$resulAll = $actitivy->getallJoinWhere($Colum, $value);

	$pages =  ceil(count($resulAll) / $porPagina);

	
	
	?>
	<section class="content">
	
	<center>
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
				
				foreach ($resul as $k => $v) {
			?>
			<tr>
				<td data-titulo="Id"><?php echo $v['id_event']  ?></td>
				<td data-titulo="Actividad"><?php echo $v['activity']  ?></td>
				<td data-titulo="Servidor"><?php echo $v['name']  ?></td>
				<td data-titulo="Usuario"><?php echo $v['user_corporate'] ?></td>
				<td data-titulo="Fecha del evento"><?php echo $v['event_date']  ?></td>
			</tr>
			<?php
						
				}
			?>
		</tbody>
	</table>

	<section class="pagination">
				<center>
					<ul>
						<?php
						$pages =  ceil(count($resulAll) / $porPagina);

						if (($pagina == 1)) {
						?>
							<li><a class="no-link" onclick="changePagination('<?php echo ($pagina - 1) ?>','tableBitacoraPagination','content','<?php echo $Colum ?>','<?php echo $value ?>')"><< </a>
							</li>

						<?php

						} else {

						?>
							<li><a onclick="changePagination('<?php echo ($pagina - 1) ?>','tableBitacoraPagination','content','<?php echo $Colum ?>','<?php echo $value ?>')"><i class="icon-circle-left"></i></a></li>
							<?php

						}

						for ($i = 1; $i <= $pages; $i++) {

							if ($pagina == $i) {

							?>

								<li><a class="active" onclick="changePagination('<?php echo $i ?>','tableBitacoraPagination','content','<?php echo $Colum ?>','<?php echo $value ?>')"><?php echo $i ?></a></li>

							<?php

							} else {

							?>
								<li><a onclick="changePagination('<?php echo $i ?>','tableBitacoraPagination','content','<?php echo $Colum ?>','<?php echo $value ?>')"><?php echo $i ?></a></li>

							<?php

							}
						}

						if ($pagina == $pages) {


							?>
							<li><a class="no-link" onclick="changePagination('<?php echo ($pagina + 1) ?>','tableBitacoraPagination','content','<?php echo $Colum ?>','<?php echo $value ?>')"><i class="icon-circle-right"></i></a></li>
						<?php

						} else {


						?>

							<li><a onclick="changePagination('<?php echo ($pagina + 1) ?>','tableBitacoraPagination','content','<?php echo $Colum ?>','<?php echo $value ?>')">>></a></li>
						<?php

						}

						?>

					</ul>
				</center>
			</section>

	</center>
	</section>';

