<?php
require_once dirname(__DIR__) . '/app/Models/AreaManager.php';
require_once dirname(__DIR__) . '/app/Models/Area.php';
require_once dirname(__DIR__) . '/app/Models/Job.php';

use App\Models\AreaManager;
use App\Models\Area;
use App\Models\Job;

$porPagina = 5;
$pagina = 1;
if (isset($_POST['paginator'])) {
	$pagina = $_POST['paginator'];
	if ($modelo == "AreaManager") {
		$connectioDb = new AreaManager();
	} else if ($modelo == "Area") {
		$connectioDb = new Area();
	} else if ($modelo == "Job") {
		$connectioDb = new Job();
	}
}


$comienzo = ($pagina - 1) * $porPagina;

$resul = $connectioDb->getallColumnLimit($comienzo, $porPagina);

$resulAll = $connectioDb->getallColumn();

$pages =  ceil(count($resulAll) / $porPagina);

?>

<section class="content">

	<center>
	<div>
		<?php

		if (!empty($connectioDb->getItemColumns($column, $idtable))) {
		?>
			<table>
				<thead>
					<tr>
						<th>Id</th>
						<th><?php if (isset($nameHeader)) { ?><?= $nameHeader ?> <?php }  ?></th>
						<th>eliminar</th>
					</tr>
				</thead>
				<tbody>
					
					<?php
					foreach ($connectioDb->getItemColumns($column, $idtable) as $user) :
					?>
						<tr>
							<td data-titulo="Id"><?php echo $user['id'] ?>
							</td>
							<td data-titulo="<?php if (isset($nameHeader)) { ?><?= $nameHeader ?> <?php }  ?>"><?php echo $user[$column] ?>
							</td>
							<td>
								<a class="button button-delete" href="#modal1" onclick="asigID(<?php echo $user['id'] ?>,'<?php echo $pathDelete ?>' )">eliminar</a>
							</td>
						<?php
					endforeach
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
	</div>


		<section class="pagination">
			<center>
				<ul>
					<?php
					$pages =  ceil(count($resulAll) / $porPagina);

					if (($pagina == 1)) {
					?>
						<li><a class="no-link" onclick="changePagination('<?php echo ($pagina - 1) ?>','<?php if (isset($pathPagination)) { ?><?= $pathPagination ?> <?php }  ?>','content')">
								<< </a>
						</li>

					<?php

					} else {

					?>
						<li><a onclick="changePagination('<?php echo ($pagina - 1) ?>','<?php if (isset($pathPagination)) { ?><?= $pathPagination ?> <?php }  ?>','content')"><i class="icon-circle-left"></i></a></li>
						<?php

					}

					for ($i = 1; $i <= $pages; $i++) {

						if ($pagina == $i) {

						?>

							<li><a class="active" onclick="changePagination('<?php echo $i ?>','<?php if (isset($pathPagination)) { ?><?= $pathPagination ?> <?php }  ?>','content')"><?php echo $i ?></a></li>

						<?php

						} else {

						?>
							<li><a onclick="changePagination('<?php echo $i ?>','<?php if (isset($pathPagination)) { ?><?= $pathPagination ?> <?php }  ?>','content')"><?php echo $i ?></a></li>

						<?php

						}
					}

					if ($pagina == $pages) {


						?>
						<li><a class="no-link" onclick="changePagination('<?php echo ($pagina + 1) ?>','<?php if (isset($pathPagination)) { ?><?= $pathPagination ?> <?php }  ?>','content')"><i class="icon-circle-right"></i></a></li>
					<?php

					} else {


					?>

						<li><a onclick="changePagination('<?php echo ($pagina + 1) ?>','<?php if (isset($pathPagination)) { ?><?= $pathPagination ?> <?php }  ?>','content')">>></a></li>
					<?php

					}

					?>

				</ul>
			</center>
		</section>
	</center>
</section>