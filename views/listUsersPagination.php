<?php

require_once dirname(__DIR__) . '/app/Models/User.php';
require_once './classes/Session.php';
use App\Models\User;


use Classes\Session;

$userModel = new User();

$porPagina = 5;
$pagina = 1;
if (isset($_POST['paginator'])) {
	$pagina = $_POST['paginator'];
}

$comienzo = ($pagina - 1) * $porPagina;

$resul = $userModel->getallColumnLimit($comienzo, $porPagina);

$resulAll = $userModel->getallColumn();

$pages =  ceil(count($resulAll) / $porPagina);


$session = new Session();

$session->setSessionName('reporteUser',1) ;
?>
<section class="content "ia >
	<center>
		<div>
			<table>
				<thead>
					<tr>
						<th >Id</th>
						<th>Nombre</th>
						<th >Apellidos</th>
						<th>Usuario Generico</th>
						<th>Correo</th>
						<th >Teléfono</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php

					foreach ($resul as $k => $v) {

					?>
						<tr >

							
						<td data-titulo="Id"><?php echo $v['id_user']  ?></td>
						<td data-titulo="Nombre"><?php echo $v['username']  ?></td>
						<td data-titulo="Apellidos"><?php echo $v['first_name'] . '  ' . $v['last_name']  ?></td>
						<td data-titulo="Usuario Generico"><?php echo $v['user_corporate'] ?></td>
						<td data-titulo="Correo"><?php echo $v['email'] ?></td>
						<td data-titulo="Teléfon"><?php echo $v['phone']  ?></td>
						<td><a class="button button-delete" href="#modal1" onclick="asigID(<?php echo $v['id_user'] ?>,'deleteUser')">eliminar</a></td>
						<?php

					}
						?>


						</tr>

				</tbody>
			</table>
		</div>
		<section class="pagination">
			<center>
				<ul>
					<?php
					$pages =  ceil(count($resulAll) / $porPagina);

					if (($pagina == 1)) {
					?>
						<li><a class="no-link" onclick="changePagination('<?php echo ($pagina - 1) ?>','userPagination','content')">
								<< </a>
						</li>

					<?php

					} else {

					?>
						<li><a onclick="changePagination('<?php echo ($pagina - 1) ?>','','content')"><i class="icon-circle-left"></i></a></li>
						<?php

					}

					for ($i = 1; $i <= $pages; $i++) {

						if ($pagina == $i) {

						?>

							<li><a class="active" onclick="changePagination('<?php echo $i ?>','userPagination','content')"><?php echo $i ?></a></li>

						<?php

						} else {

						?>
							<li><a onclick="changePagination('<?php echo $i ?>','userPagination','content')"><?php echo $i ?></a></li>

						<?php

						}
					}

					if ($pagina == $pages) {


						?>
						<li><a class="no-link" onclick="changePagination('<?php echo ($pagina + 1) ?>','userPagination','content')"><i class="icon-circle-right"></i></a></li>
					<?php

					} else {


					?>

						<li><a onclick="changePagination('<?php echo ($pagina + 1) ?>','userPagination','content')">>></a></li>
					<?php

					}

					?>

				</ul>
			</center>
		</section>
	</center>
</section>