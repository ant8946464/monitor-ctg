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
    <span> En este módulo los usuarios puden actualizar su información.</span>
</div>

<fieldset>

  
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

    <form class="form-register" method="post" action="/updateUser" style="margin-top: 10%;">
    <h1 class="form-titulo">Actualiza tus datos</h1>
      <div class="contenedor-inputs">
          <input type="hidden" name="id" value= "<?= $items[0] ?>" /> 
          <input type="text" name="nameUser" placeholder="Nombre" maxlength="50" value="<?php echo $items[1]  ?>" required>
          <input type="text" name="apellidoPat" placeholder="Apellido Paterno" maxlength="50" value="<?php echo $items[2]  ?>" required>
          <input type="text" name="apellidMat" placeholder="Apellido Materno" maxlength="50" value="<?php echo $items[3]  ?>" required>
          <input type="text" name="user_corporate" placeholder="Usuario Corporativo" maxlength="8" value="<?php echo $items[4]  ?>" required>
          <input type="email" name="email" placeholder="Correo" maxlength="50" value="<?php echo $items[5]  ?>" required>
          <input type="text" name="phone" placeholder="Teléfono" maxlength="10" value="<?php echo $items[11]  ?>" required>
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
          <input type="submit"  value="Enviar" class="btn-enviar">
      </div>
    </form>
</fieldset>

<?php

require 'layout/footer.php';
?>