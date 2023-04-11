<?php

use App\Models\Server;
$server = new Server();
$resul;
require 'layout/navbar.php';

if (isset($error)) {
?>
	<div class="error">
		<b><?= $error ?></b>
	</div>
<?php
}
?>
<?php if (isset($success)) { ?>
	<div class="info">
		<b><b><?= $success ?></b></b>
	</div>
<?php
}

?>


<div class="spanMsgInfo">
	<span>En este módulo se podra dar de alta, baja y actualizar los servidores.</span>
</div>


<fieldset>
	<div class="tabs">
		<div class="tab-container">
			<div id="tab2" class="tab">
				<a href="#tab2">Eliminar </a>
				<div class="tab-content">
					<div class="select-dis">
						<div class="content-select select-center">
							<select name="nameServerSelect" id="nameServerSelect" onchange="selectView(this.id)" required>
								<option selected="selected" disabled> Servidor</option>
								<?php foreach ($server->getItemColumns('name', '') as $user) : ?>
									<option value="<?php echo $user['name'] ?>"><?php echo $user['name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="content-select select-center">
							<select name="ipSelect" id="ipSelect" onchange="selectView(this.id)" required>
								<option selected="selected" disabled>Ip</option>
								<?php foreach ($server->getItemColumns('ip', '') as $ips) : ?>
									<option value="<?php echo $ips['ip'] ?>"><?php echo $ips['ip'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="content-select select-center">
							<select name="clusterSelect" id="clusterSelect" onchange="selectView(this.id)" required>
								<option selected="selected" disabled>Cluster</option>
								<?php foreach ($server->getItemColumns('cluster', '') as $activity) : ?>
									<option value="<?php echo $activity['cluster'] ?>"><?php echo $activity['cluster'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="content-select select-center">
							<select name="portSelect" id="portSelect" onchange="selectView(this.id)" required>
								<option selected="selected" disabled>Puerto</option>
								<?php foreach ($server->getItemColumns('puerto', '') as $activity) : ?>
									<option value="<?php echo $activity['puerto'] ?>"><?php echo $activity['puerto'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>

					<section class="content">
						<table>
							<thead>
								<tr>
									<th>Id</th>
									<th>Nombre</th>
									<th>Ip</th>
									<th>Cluster</th>
									<th>Puerto</th>
									<th></th>
								</tr>
							</thead>

							<tbody>
								<?php

								$resul = $server->getallColumn();

								foreach ($resul as $k => $v) {

								?>
									<tr>

										<td><?php echo $v['id_ctg']  ?></td>
										<td><?php echo $v['name']  ?></td>
										<td><?php echo $v['ip'] ?></td>
										<td><?php echo $v['cluster'] ?></td>
										<td><?php echo $v['puerto'] ?></td>
										<td><a class="button" href="#modal1" onclick="asigID(<?php echo $v['id_ctg'] ?>,'deleteServer')">eliminar</a></td>
									<?php

								}
									?>
									</tr>
							</tbody>
						</table>
					</section>
				</div>
			</div>
			<div id="tab1" class="tab">
				<a href="#tab1">Agregar</a>
				<div class="tab-content">
					
					<form class="form-register" method="post" action="/formServer">
						<h1>Agregar Servidores</h1>
						<div class="contenedor-inputs">
							<input style="width: 80%;margin-left: 40px;" type="text" name="servername" placeholder="Nombre del servidor" maxlength="50" value="<?php if (isset($name)) { ?><?= $name ?> <?php }  ?>" required>
							<input style="width: 80%;margin-left: 40px;" type="text" name="ip" placeholder="ip" maxlength="12" value="<?php if (isset($ip)) { ?><?= $ip ?> <?php }  ?>" required>
							<input style="width: 80%;margin-left: 40px;" type="text" name="cluster" placeholder="Cluster" maxlength="15" value="<?php if (isset($cluster)) { ?><?= $cluster ?> <?php }  ?>" required>
							<input style="width: 80%;margin-left: 40px;" type="text" name="port" placeholder="puerto" maxlength="4" value="<?php if (isset($port)) { ?><?= $port ?> <?php }  ?>" required>
							<input type="submit" value="Enviar" class="btn-enviar" />
						</div>
					</form>
				</div>
			</div>
			<div id="tab3" class="tab">
				<a href="#tab3">actualizar</a>
				<div class="tab-content">
					<form class="form-register" method="post" action="/formServer">
				    <h1>Actualizar Servidor</h1>
					<div class="content-select select-center" style="width: 80%;margin-left: 40px;">
								<select name="updateServerSelect" id="updateServerSelect" onchange="selectView(this.id)" required>
									<option selected="selected" disabled>Selecciona la ip</option>
									<?php foreach ($server->getItemColumns('ip', '') as $ser) : ?>
										<option value="<?php echo $ser['ip'] ?>"><?php echo $ser['ip'] ?></option>
									<?php endforeach ?>
								</select>
							</div>
						
						<div class="contenedor-inputs">
							<input style="width: 80%;margin-left: 40px;" type="text" name="servername" placeholder="Nombre del servidor" maxlength="50" value="" disabled >
							<input style="width: 80%;margin-left: 40px;" type="text" name="ip" placeholder="ip" maxlength="12" value="" disabled >
							<input style="width: 80%;margin-left: 40px;" type="text" name="cluster" placeholder="Cluster" maxlength="15" value="" disabled >
							<input style="width: 80%;margin-left: 40px;" type="text" name="port" placeholder="puerto" maxlength="4" value="" disabled >
							<input type="submit" value="Actualizar" class="btn-enviar" disabled  />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</fieldset>

<?php
require 'layout/footer.php';
?>