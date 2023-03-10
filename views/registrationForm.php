<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../assets/css/formStyles.css">
</head>
<body >
<?php   require_once '../config/config.php' ?>
    <form class="form-register" method="post">
    <h1 class="form-titulo">Crea tu cuenta</h1>
      <div class="contenedor-inputs">
          <input type="text" name="nameUser" placeholder="Nombre" required >
          <input type="text" name="apellidoPat" placeholder="Apellido Paterno" required>
          <input type="text" name="apellidMat" placeholder="Apellido Materno" required>
          <input type="text" name="nameUser" placeholder="Usuario Corporativo" required>
          <input type="email" name="email" placeholder="Correo" required>
          <input type="text" name="telefono" placeholder="Usuario Corporativo" required>
          <input type="text" name="apellidMat" placeholder="Apellido Materno" required>
          <input type="text" name="nameUser" placeholder="Usuario Corporativo" required>
          <div class="content-select">
            <select>
             <option selected="selected" disabled>Selecciona el Area</option>
              <option>Option 1</option>
              <option>Option 2</option>
              <option>Option 3</option>
            </select>
            <i></i>
          </div>
          <div class="content-select" >
            <select>
              <option selected="selected" disabled>Seleccion el Puesto</option>
              <option>Option 2</option>
              <option>Option 3</option>
            </select>
            <i></i>
          </div>
          <input type="submit"  value="Registrar" class="btn-enviar">
          <p class="form_link">¡Ya tienes cuenta? <a href="<?php echo constant('URL'); ?>views/login.php" class="sign-up">Ingresa aqui</a> </p>
      </div>
    </form>
</body>
</html>

