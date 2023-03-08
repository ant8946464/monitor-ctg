
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Monitoreo CTG</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script  type="text/javascript" src="../assets/css/styles.css"> </script>
   
</head>
<body  background="../assets/images/background.jpg">
<?php   require_once '../config/config.php' ?>
<div class="container">
        <div class="box">
            <?php   
              if(isset($_GET['error'])){
            ?>            
            <span class='error'><?php echo $_GET['error']  ?> </span>    
            <?php         
                }
            ?>
            <h1>Bienvenido</h1>
            <form action="<?php echo constant('URL'); ?>libs/loginValidator.php"  method="POST">
               
                <label>Usuario</label>
                <div>
                    <input type="text" name="userCorporate" required>
                </div>
                <label>Password</label>
                <div>
                    <input type="password" name="password" required>
                </div>
                <input type="submit" value="Ingresar">
            </form>
            <a href="#" class="sign-up">Registrate</a>
            <a href="#" class="forgot">¿Se te olvido la contraseña?</a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script  type="text/javascript"  src="../assets/js/script.js"></script>
</body>
</html>
