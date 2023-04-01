<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../assets/css/formStyles.css">
    <link rel="stylesheet" href="../assets/css/stylesAlert.css">
    <link rel="stylesheet" href="../assets/css/selectSyles.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script  type="text/javascript"  src="../assets/js/script.js"></script>
</head>
<body >
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
    <div class="success"><b><?=  $success ?></b></div>   
  <?php    
      }
  ?>

    <form class="form-register" method="post" action="/registratevalidador">
    <h1 class="form-titulo">Crea tu cuenta</h1>
      <div class="contenedor-inputs">
          <input type="text" name="nameUser" placeholder="Nombre" maxlength="50" value="<?php if(isset($userName)){?><?=$userName ?> <?php }  ?>" required>
          <input type="text" name="apellidoPat" placeholder="Apellido Paterno" maxlength="50" value="<?php if(isset($first_name)){?><?=$first_name ?> <?php }  ?>" required>
          <input type="text" name="apellidMat" placeholder="Apellido Materno" maxlength="50" value="<?php if(isset($last_name)){?><?=$last_name ?> <?php }  ?>" required>
          <input type="text" name="user_corporate" placeholder="Usuario Corporativo" maxlength="8" value="<?php if(isset($user_corporate)){?><?=$user_corporate ?> <?php }  ?>" required>
          <input type="email" name="email" placeholder="Correo" maxlength="50" value="<?php if(isset($email)){?><?=$email ?> <?php }  ?>" required>
          <input type="text" name="phone" placeholder="Teléfono" maxlength="8" value="<?php if(isset($phone)){?><?=$phone ?> <?php }  ?>" required>
          <input type="password" name="password" placeholder="Password" maxlength="8" required>
          <input type="password" name="confirmpassword" placeholder="Confirma password" required>
          <?php
              use App\Models\Area;
              use App\Models\Job;
              use App\Models\AreaManager;
              $elementArea = new Area();
              $elementJob = new Job();
              $elementManager = new AreaManager();
          ?>
          <div>
                <div class="content-select" required>
                      <select name="area">
                        <option value="ssssss" selected="selected" disabled>Selecciona el Area</option>
                        <?php foreach($elementArea->getItemColumns('area') as $area ): ?>
                            <option value="<?php echo $area['id']?>"><?php echo $area['area']?></option>
                        <?php endforeach ?>
                      </select>
                </div>

                <div class="content-select" style="padding-top: 10px;" required>
                  <select name="rol">
                    <option value="ssssss" selected="selected" disabled>Selecciona el Puesto</option>
                    <?php foreach($elementJob->getItemColumns('role') as $role ): ?>
                        <option value="<?php echo$role['id']?>"><?php echo$role['role']?></option>
                      <?php endforeach ?>
                  </select>
                </div>

          </div>
          <div>
                <div class="content-select" required>
                      <select name="responsable">
                        <option value="ssssss" selected="selected" disabled>Selecciona  Responsable</option>
                        <?php foreach($elementManager->getItemColumns('manager_name') as $resp): ?>
                            <option value="<?php echo $resp['id']?>"><?php echo $resp['manager_name']?></option>
                        <?php endforeach ?>
                      </select>
                </div>
          </div>
          <input type="submit"  value="Registrate" class="btn-enviar">
          <p class="form_link">¿Ya tienes cuenta? <a href="/" class="sign-up">Ingresa aqui</a> </p>
      </div>
    </form>
    
</body>
</html>

