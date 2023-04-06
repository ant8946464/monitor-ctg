
      <?php
          use App\Models\AreaManager;
		  use App\Models\Area;
		  use App\Models\Job;

      		if(isset($error)){
        ?>
		<div class="error">
			<b><?=  $error ?></b>
		</div>   
        <?php    
            }
        ?>
        <?php if(isset($success)){?>
			<div class="info">
				<b><b><?=  $success ?></b></b>
			</div>   
        <?php    
          }
		  $connectioDb;
          require 'layout/navbar.php';
		  if($modelo == "AreaManager"){
			$connectioDb = new AreaManager();
		  }else if($modelo == "Area"){
			$connectioDb = new Area();
		  }else if($modelo == "Job"){
			$connectioDb = new Job();
		  }
		  
       ?>
	   

<div class="spanMsgInfo">
	<span>  <?=  $msgInfo ?> </span>
</div>
<div class="tabs">
	<div class="tab-container">
		<div id="tab2" class="tab">
			<a href="#tab2">Eliminar </a>
			<div class="tab-content">
				<h1 style="color: #f1f3f4;">Eliminar<?php if(isset($tap2Header)){?><?= $tap2Header ?> <?php }  ?></h1>
				<div class="spanFilter">
					<span>Seleccione el filtrado </span>
				</div>
				<div class="select-dis">
					<div class="content-select select-center">
					<select name="<?= $selectName ?>" id="<?= $selectName ?>" onchange="selectView(this.id)" required>
						<option selected="selected" disabled > <?php if(isset($tap2Header)){?><?= $tap2Header ?> <?php }  ?></option>
						<?php foreach($connectioDb->getItemColumns($column,'') as $user ): ?>
							<option value="<?php echo $user[$column]?>"><?php echo $user[$column]?></option>
                        <?php endforeach ?>
					</select>
				</div>
			</div>
			<section class="content">
				<div>
                            <?php
              
                                if(!empty($connectioDb->getItemColumns($column,$idtable) )){
                            ?>
					<table>
						<thead>
							<tr>
								<th>Id</th>
								<th><?php if(isset($nameHeader)){?><?=$nameHeader ?> <?php }  ?></th>
								<th>eliminar</th>
							</tr>
						</thead>
						<tbody>
                                  <?php 
                                      foreach($connectioDb->getItemColumns($column,$idtable) as $user ):
                                  ?>
							<tr>
								<td><?php echo $user['id']?>
								</td>
								<td><?php echo $user[$column]?>
								</td>
								<td>
									<a class="button" href="#modal1" onclick="asigID(<?php echo $user['id'] ?>,'<?php echo $pathDelete ?>' )">eliminar</a></td>
                                <?php
                                       endforeach
                                  ?>
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
					</div>
				</section>
			</div>
		</div>
		<div id="tab1" class="tab">
			<a href="#tab1">Agregar </a>
			<div class="tab-content">
				<form class="form-register" method="post" action="<?php if(isset($path)){?><?= $path ?> <?php }  ?>">
					<h1>Agregar <?php if(isset($tap2Header)){?><?= $tap2Header ?> <?php }  ?></h1>
					<div class="contenedor-inputs">
						<input style="width: 100%;" type="text" name="name" placeholder="<?php if(isset($tap2Header)){?><?= $tap2Header ?> <?php }  ?>" maxlength="50" value="<?php if(isset($userName)){?><?=$userName ?> <?php }  ?>" required>
						<textarea type="text" placeholder="Agrega descripción" name="descripcion" ></textarea>
						<input type="submit" value="Enviar" class="btn-enviar"/>
                    </div>
					</form>
				</div>
			</div>
		</div>
	</div>
        <?php 
          require 'layout/footer.php';
        ?>
 
