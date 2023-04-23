<?php

require_once dirname(__DIR__) . '/app/Models/User.php';

use App\Models\User;

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

?>
<section class="content">
	<center>

		<div>
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

					foreach ($resul as $k => $v) {

					?>
						<tr>

							<td><?php echo $v['id_user']  ?></td>
							<td><?php echo $v['username']  ?></td>
							<td><?php echo $v['first_name'] . '  ' . $v['last_name']  ?></td>
							<td><?php echo $v['user_corporate'] ?></td>
							<td><?php echo $v['email'] ?></td>
							<td><?php echo $v['phone']  ?></td>
							<td><a class="button" href="#modal1" onclick="asigID(<?php echo $v['id_user'] ?>,'deleteUser')">eliminar</a></td>
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
						<li><a onclick="changePagination('<?php echo ($pagina - 1) ?>','userPagination','content')"><i class="icon-circle-left"></i></a></li>
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
						<li><a class="no-link" onclick="changePagination('<?php echo ($pagina + 1) ?>','tableBitacoraPagination','content')"><i class="icon-circle-right"></i></a></li>
					<?php

					} else {


					?>

						<li><a onclick="changePagination('<?php echo ($pagina + 1) ?>','tableBitacoraPagination','content')">>></a></li>
					<?php

					}

					?>

				</ul>
			</center>
		</section>
	</center>
</section>