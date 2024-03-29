<?php

require_once dirname( __DIR__ ) . '/app/Models/AreaManager.php';
require_once dirname( __DIR__ ) . '/app/Models/Area.php';
require_once dirname( __DIR__ ) . '/app/Models/Job.php';

use App\Models\AreaManager;
use App\Models\Area;
use App\Models\Job;

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
$connectioDb;

require 'layout/navbar.php';

if ($modelo == "AreaManager") {
	$connectioDb = new AreaManager();
} elseif ($modelo == "Area") {
	$connectioDb = new Area();
} elseif ($modelo == "Job") {
	$connectioDb = new Job();
}

?>


<div class="spanMsgInfo">
	<span> <?= $msgInfo ?> </span>
</div>

<div class="eventeServer">
<fieldset  >
	<div class="tabs">
		<div class="tab-container" >
			<div id="tab2" class="tab">
				<a href="#tab2">Eliminar </a>
				<div class="tab-content">
					<h1 style="color: #f1f3f4;">Eliminar<?php if (isset($tap2Header)) { ?><?= $tap2Header ?> <?php }  ?></h1>
					<div class="spanFilter">
						<span >Seleccione el filtrado </span>
					</div>
					<div class="select-dis">
						<div class="content-select select-center">
							<select name="<?= $selectName ?>" id="<?= $selectName ?>" onchange="selectView(this.id)" required>
								<option selected="selected" disabled> <?php if (isset($tap2Header)) { ?><?= $tap2Header ?> <?php }  ?></option>
								<?php foreach ($connectioDb->getItemColumns($column, '') as $user) : ?>
									<option value="<?php echo $user[$column] ?>"><?php echo $user[$column] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
				<?php
					
			      require_once 'responsiblePagination.php';
				?>
				</div>
			</div>
			<div id="tab1" class="tab">
				<a href="#tab1">Agregar </a>
				<div class="tab-content">
					<form class="form-register" method="post" action="<?php if (isset($path)) { ?><?= $path ?> <?php }  ?>">
						<h1>Agregar <?php if (isset($tap2Header)) { ?><?= $tap2Header ?> <?php }  ?></h1>
						<div class="contenedor-inputs">
							<label><?php if (isset($tap2Header)) { ?><?= $tap2Header ?> <?php }  ?></label>
							<input style="width: 100%;"  type="text" name="name"  maxlength="50" value="<?php if (isset($userName)) { ?><?= $userName ?> <?php }  ?>" required>
							<label>Agrega descripción</label>
							<textarea type="text"  name="descripcion"></textarea>
							<input type="submit" value="Enviar" class="btn-enviar" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</fieldset>

</div>
<?php
    require 'layout/footer.php';
?>


