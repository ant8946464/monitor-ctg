<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../assets/css/formStyles.css">
    <link rel="stylesheet" href="../assets/css/stylesAlert.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script  type="text/javascript"  src="../assets/js/script.js"></script>
</head>
<body >
<?php   
      if(isset($_GET['error'])){
  ?>            
    <div class="error"  style="marguin-top:100px"><b><?php echo $_GET['error']  ?></b></div>   
  <?php         
      }
  ?>
<?php   require_once '../config/config.php' ?>
    <form class="form-register" method="post" action="<?php echo constant('URL'); ?>libs/recordValidation.php">
    <h1 class="form-titulo">Crea tu cuenta</h1>
      <div class="contenedor-inputs">
          <input type="text" name="nameUser" placeholder="Nombre" maxlength="50" required>
          <input type="text" name="apellidoPat" placeholder="Apellido Paterno" maxlength="50" required>
          <input type="text" name="apellidMat" placeholder="Apellido Materno" maxlength="50" required>
          <input type="text" name="user_corporate" placeholder="Usuario Corporativo" maxlength="8" required>
          <input type="email" name="email" placeholder="Correo" maxlength="50" required>
          <input type="text" name="phone" placeholder="Teléfono" maxlength="8" required>
          <input type="password" name="password" placeholder="Password" maxlength="8" required>
          <input type="password" name="confirmpassword" placeholder="Confirma password" required>
          <?php
              require('../models/UserModel.php');
              $userModel = new UserModel();
          
          ?>
          <div class="content-select" required>
                <select name="area">
                <option selected="selected" disabled>Selecciona el Area</option>
                <?php foreach($userModel->getAreaDB() as $area ): ?>
                    <option value="<?php echo $area['id']?>"><?php echo $area['area']?></option>
                <?php endforeach ?>
                </select>
          </div>


          <div class="content-select" required>
            <select name="rol">
              <option selected="selected" disabled>Seleccion el Puesto</option>
              <?php foreach($userModel->getJob() as $role ): ?>
                  <option value="<?php echo$role['id']?>"><?php echo$role['job']?></option>
                <?php endforeach ?>
            </select>
          </div>


          <input type="submit"  value="Registrar" class="btn-enviar">
          <p class="form_link">¡Ya tienes cuenta? <a href="<?php echo constant('URL'); ?>views/login.php" class="sign-up">Ingresa aqui</a> </p>
      </div>
    </form>
    
</body>
</html>

