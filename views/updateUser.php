<?php
 require 'layout/navbar.php';

  require_once dirname( __DIR__ ) . '/app/Models/AreaManager.php';
  require_once dirname( __DIR__ ) . '/app/Models/Area.php';
  require_once dirname( __DIR__ ) . '/app/Models/Job.php';

  require_once dirname( __DIR__ ) . '/app/Models/User.php';
  require_once dirname( __DIR__ ) . '/classes/Session.php';

    use App\Models\Area;
    use App\Models\Job;
    use App\Models\AreaManager;
    use App\Models\User;
    use Classes\Session;
    $elementArea = new Area();
    $elementJob = new Job();
    $elementManager = new AreaManager();
    $elementUser = new User();
   
   
?>
<?php
    if(isset($error)){
  ?>            
    <div class="error"><b><?=  $error ?></b></div>   
  <?php    
      }
  ?>

<?php
    if(isset($success)){
  ?>            
    <div class="info"><b><?=  $success ?></b></div>   
    <?php } ?>

<div class="spanMsgInfo">
    <span> En este módulo los usuarios pueden actualizar su información.</span>
</div>

<fieldset style=" margin-top: 0.5%; margin-bottom: 0.5%; ">

  
  <?php    
      

      $session = new Session();
      $resul = $elementUser->findValue('user_corporate', $session->getSessionName('user'),'*');
			$items = [];
			if(!empty($resul)){		
			foreach ($resul as $k => $v) {
				array_push( $items,$v);
			}
    }
  ?>

    <form class="form-register formadd" method="post" action="/updateUser" style="margin-bottom: -9.5%">
    <h1 class="form-titulo">Actualiza tus datos</h1>
      <div class="contenedor-inputs" style="margin-bottom: -9.5%">
          <input type="hidden" name="id" value= "<?= $items[0] ?>" />
          <label>Nombre</label> 
          <input type="text" name="nameUser"  maxlength="50" value="<?php echo $items[1]  ?>" required>
          <label>Apellido Paterno</label> 
          <input type="text" name="apellidoPat"  maxlength="50" value="<?php echo $items[2]  ?>" required>
          <label>Apellido Materno</label> 
          <input type="text" name="apellidMat"  maxlength="50" value="<?php echo $items[3]  ?>" required>
          <label>Usuario Corporativo</label>
          <input type="text" name="user_corporate"  maxlength="8" value="<?php echo $items[4]  ?>"  required>
          <label>Correo</label>
          <input type="email" name="email" maxlength="50" value="<?php echo $items[5]  ?>" required>
          <label>Teléfono</label>
          <input type="text" name="phone"  maxlength="10" value="<?php echo $items[11]  ?>" required>
          <div>
                <div class="content-select" required>
                      <select name="area">
                        <option value="0" selected="selected" disabled>Selecciona el Area</option>
                        <?php foreach($elementArea->getItemColumns('area','id_area') as $area ): ?>
                            <option value="<?php echo $area['id']?>"><?php echo $area['area']?></option>
                        <?php endforeach ?>
                      </select>
                </div>

                <div class="content-select" style="padding-top: 10px;" required>
                  <select name="rol">
                    <option value="0" selected="selected" disabled>Selecciona el Puesto</option>
                    <?php foreach($elementJob->getItemColumns('role','id_role') as $role ): ?>
                        <option value="<?php echo$role['id']?>"><?php echo$role['role']?></option>
                      <?php endforeach ?>
                  </select>
                </div>

          </div>
          <div>
                <div class="content-select" required>
                      <select name="responsable">
                        <option value="0" selected="selected" disabled>Selecciona  Responsable</option>
                        <?php foreach($elementManager->getItemColumns('manager_name','id_manager') as $resp): ?>
                            <option value="<?php echo $resp['id']?>"><?php echo $resp['manager_name']?></option>
                        <?php endforeach ?>
                      </select>
                </div>
          </div>
          <input type="submit"  value="Actualizar" class="btn-enviar">
      </div>
    </form>
</fieldset>

<?php

require 'layout/footer.php';
?>