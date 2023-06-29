
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
<div class="signupFrm" >
    <form  class="form"  action="/sendMailReset"  method="POST" style="width: 40%; display: grid;;">
      <h2 class="title titleReset">Recupera tú password</h2>
      
      <label>Correo</label>
      <div class="inputContainer" >
      <div>
        <input type="email"  class="input" name="email"  required>
      </div>
      </div>

          <div class="g-recaptcha" data-sitekey="<?php echo constant('DATA_KEY') ?>"  style="margin: auto;margin-top: 5%; margin-bottom: 5%;">

      </div>
   
      <input type="submit" class="submitBtn" value="Recuperar Contraseña" style="margin: auto;">
      <a href="/" class="sign-up">Login</a>
    </form>
   
  </div>
  <script  type="text/javascript"  src="../assets/js/script.js"></script>
</body>
</html>

