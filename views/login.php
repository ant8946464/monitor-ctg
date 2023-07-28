
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Monitoreo CTG</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/stylesAlert.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
</head>
<body  >
  <?php
     require_once 'config/config.php';
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
  <?php    
      }
  ?>
<div class="signupFrm">
    <form  class="form"  action="/login-validador"  method="POST">
      <h2 class="title">Bienvenido</h2>
      <label >Usuario</label> 
      <div class="inputContainer">
        <input type="text" class="input"  value="<?php if(isset($user)){?><?=$user ?> <?php }  ?>" name="usuario_corporate" maxlength="8"  required>
      </div>
      <label >Password</label> 
      <div class="inputContainer">
        <input type="password"  class="input" name="password" maxlength="8" required>
      </div>
      <div style="margin-top: 5%; margin-bottom: 5%;">
          <div class="g-recaptcha gwd-reCAPTCHA_2" data-sitekey="<?php echo constant('DATA_KEY') ?>">
          </div>
      </div>
      <input type="submit" class="submitBtn" value="Enviar">
      <a href="/Registrate" class="sign-up">Registrate</a>
      <a href="/resetPassword" class="forgot">¿Se te olvidó la contraseña?</a>
    </form>
  </div>
  <script  type="text/javascript"  src="../assets/js/script.js"></script>
</body>
</html>

