<?php

require_once dirname(__DIR__) . '/app/Models/User.php';
require 'layout/navbar.php';

use App\Models\User;

use Classes\Session;

$userModel = new User();

$id = '&nbsp;&nbsp;&nbsp;&nbsp;id&nbsp;&nbsp;&nbsp;&nbsp;';


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
<div class="spanMsgInfo">
    <span>En este módulo el administrador podra realizar el filtrado de los usarios e importar la información. </span>
</div>



<div class="eventeServer">
    <fieldset>
        <div class="spanFilter">
            <span>Seleccione el filtrado </span>
        </div>
        <div class="select-dis" >
            <div class="content-select select-center">
                <select name="idSelect" id="idSelect" onchange="selectView(this.id)" required>
                    <option selected="selected" style="width: 30px;" disabled><?php echo $id ?></option>
                    <?php foreach ($userModel->getItemColumns('id_user', '') as $user) : ?>
                        <option value="<?php echo $user['id_user'] ?>"><?php echo $user['id_user'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="content-select select-center">
                <select name="userSelectlist" id="userSelectlist" onchange="selectView(this.id)" required>
                    <option selected="selected" disabled> Usuario</option>
                    <?php foreach ($userModel->getItemColumns('user_corporate', '') as $user) : ?>
                        <option value="<?php echo $user['user_corporate'] ?>"><?php echo $user['user_corporate'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="content-select select-center">
                <select name="emailSelect" id="emailSelect" onchange="selectView(this.id)" required>
                    <option selected="selected" disabled> Correo</option>
                    <?php foreach ($userModel->getItemColumns('email', '') as $user) : ?>
                        <option value="<?php echo $user['email'] ?>"><?php echo $user['email'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>

        <centrer>
            <div style="margin-left: 50%;margin-bottom: -15%;">
                <div class="tooltip">
                    <a href="/listUsers"><img src="/assets/images/limpieza-de-datos.png"></a>
                    <span class="tooltiptext">Limpiar el filtrado</span>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="tooltip">
                    <a type="button" id="btnver" href="/reportUser" target="_blank"><img src="/assets/images/pdf.png"></a>
                    <span class="tooltiptext">Exportar PDF</span>
                </div>
            </div>
        </centrer>
    
<section class="content "  style="margin-top: 15%; margin-bottom: -10%;">
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
       

    </fieldset>
</div>

<?php
    require 'layout/footer.php';
?>