<?php
$porPagina = 10;
$pagina = 1;
if (isset($_POST['paginator'])) {
	$pagina = $_POST['paginator'];
}


$comienzo = ($pagina - 1) * $porPagina;

$resul = $connectioDb->getallColumnLimit($comienzo, $porPagina);
$resulAll = $connectioDb->getallColumn();

$pages =  ceil(count($resulAll) / $porPagina);

?>

<section class="content">
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
							<td><?php echo $user['id'] ?>
							</td>
							<td><?php echo $user[$column] ?>
							</td>
							<td>
								<a class="button" href="#modal1" onclick="asigID(<?php echo $user['id'] ?>,'<?php echo $pathDelete ?>' )">eliminar</a>
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


</section>

<section class="pagination">
	<center>
		<ul>
			<?php
			$pages =  ceil(count($resulAll) / $porPagina);

			if (($pagina == 1)) {
			?>
				<li><a class="no-link" onclick="changePagination('<?php echo ($pagina - 1) ?>','contigenciaStarStop','content-1')">
						<< </a>
				</li>

			<?php

			} else {

			?>
				<li><a onclick="changePagination('<?php echo ($pagina - 1) ?>','contigenciaStarStop','content-1')"><i class="icon-circle-left"></i></a></li>
				<?php

			}

			for ($i = 1; $i <= $pages; $i++) {

				if ($pagina == $i) {

				?>

					<li><a class="active" onclick="changePagination('<?php echo $i ?>','contigenciaStarStop','content-1')"><?php echo $i ?></a></li>

				<?php

				} else {

				?>
					<li><a onclick="changePagination('<?php echo $i ?>','contigenciaStarStop','content-1')"><?php echo $i ?></a></li>

				<?php

				}
			}

			if ($pagina == $pages) {


				?>
				<li><a class="no-link" onclick="changePagination('<?php echo ($pagina + 1) ?>','contigenciaStarStop','content')"><i class="icon-circle-right"></i></a></li>
			<?php

			} else {


			?>

				<li><a onclick="changePagination('<?php echo ($pagina + 1) ?>','contigenciaStarStop','content')">>></a></li>
			<?php

			}

			?>

		</ul>
	</center>
</section>
</center>


</section>