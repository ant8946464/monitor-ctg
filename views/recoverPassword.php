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
    <h1 class="form-titulo">Recuperar Password</h1>
      <div class="contenedor-inputs">
          <input type="email" name="emal" placeholder="Ingresa el correo" style="width: 120%;" required >
          <input type="submit"  value="Enviar" class="btn-enviar">
          <p class="form_link"> <a href="<?php echo constant('URL'); ?>views/login.php">Regresar a la pagina de inicio</a></p>
      </div>
    </form>
</body>
</html>

