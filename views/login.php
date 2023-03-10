
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Monitoreo CTG</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <
</head>
<body  >
  <?php   
      if(isset($_GET['error'])){
  ?>            
    <div class="error"><b><?php echo $_GET['error']  ?></b></div>   
  <?php         
      }
  ?>
<?php   require_once '../config/config.php' ?>
<div class="signupFrm">
    <form  class="form"  action="<?php echo constant('URL'); ?>libs/loginValidator.php"  method="POST">
      <h2 class="title">Bienvenido</h2>

      <div class="inputContainer">
        <input type="text" class="input"  name="usuario_corporate" required>
        <label for="" class="label">Usuario</label>
      </div>

      <div class="inputContainer">
        <input type="password" class="input" name="password" required>
        <label for="" class="label">Password</label>
      </div>
      <input type="submit" class="submitBtn" value="Enviar">
      <a href="<?php echo constant('URL'); ?>views/registrationForm.php" class="sign-up">Registrate</a>
      <a href="<?php echo constant('URL'); ?>views/recoverPassword.php" class="forgot">¿Se te olvido la contraseña?</a>
    </form>
  </div>
  <script  type="text/javascript"  src="../assets/js/script.js"></script>
</body>
</html>

