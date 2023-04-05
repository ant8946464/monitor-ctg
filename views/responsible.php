
      <?php
          use App\Models\AreaManager;;

      if(isset($error)){
        ?>
<div class="error">
	<b><?=  $error ?>
	</b>
</div>   
        <?php    
            }
        ?>
        <?php
          if(isset($success)){
        ?>
<div class="info">
	<b><?=  $success ?>
	</b>
</div>   
        <?php    
          }
          require 'layout/navbar.php';
          $AreaManager = new AreaManager();
       ?>
<div class="spanMsgInfo">
	<span>En este módulo el administrador podra dar de alta y baja al responsable del área. </span>
</div>
<div class="tabs">
	<div class="tab-container">
		<div id="tab2" class="tab">
			<a href="#tab2">Eliminar </a>
			<div class="tab-content">
				<h1>Eliminar Responsable</h1>
				<div class="spanFilter">
					<span>Seleccione el filtrado </span>
				</div>
				<div class="select-dis">
					<div class="content-select select-center">
					<select name="managerSelect" id="managerSelect" onchange="selectView(this.id)" required>
						<option selected="selected" disabled > Responsable de Área </option>
						<?php foreach($AreaManager->getItemColumns('manager_name','') as $user ): ?>
							<option value="<?php echo $user['manager_name']?>"><?php echo $user['manager_name']?></option>
                        <?php endforeach ?>
					</select>
				</div>
			</div>
			<section class="content">
				<div>
                            <?php
                            
                                if(!empty($AreaManager->getItemColumns('manager_name','id_manager') )){
                            ?>
					<table>
						<thead>
							<tr>
								<th>Id</th>
								<th>Nombre del resposable</th>
								<th>eliminar</th>
							</tr>
						</thead>
						<tbody>
                                  <?php 
                                      foreach($AreaManager->getItemColumns('manager_name','id_manager') as $user ):
                                  ?>
							<tr>
								<td><?php echo $user['id']?>
								</td>
								<td><?php echo $user['manager_name']?>
								</td>
								<td>
									<a class="button" href="#modal1" onclick="asigID(<?php echo $user['id'] ?>)">eliminar</a</td>
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
				<form class="form-register" method="post" action="/add">
					<h1>Agregar Responsable</h1>
					<div class="contenedor-inputs">
						<input style="width: 100%;" type="text" name="name" placeholder="Nombre" maxlength="50" value="<?php if(isset($userName)){?><?=$userName ?> <?php }  ?>" required>
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
 
