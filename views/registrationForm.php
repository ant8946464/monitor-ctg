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
  <script type="text/javascript" src="../assets/js/script.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
  <?php
  if (isset($error)) {
  ?>
    <div class="error"><b><?= $error ?></b></div>
  <?php
  }
  ?>
  <?php
  if (isset($success)) {
  ?>
    <div class="info"><b><?= $success ?></b></div>
  <?php
  }
  ?>

  <form class="form-register" method="post" action="/registratevalidador">
    <h1 class="form-titulo">Crea tu cuenta</h1>
    <div class="contenedor-inputs">
      <div>
        <label>Nombre</label>
        <div>
          <input type="text" name="nameUser" maxlength="50" value="<?php if (isset($userName)) { ?><?= $userName ?> <?php }  ?>" required>
        </div>
      </div>
      <div>
        <label>Apellido Paterno</label>
        <div>
        <input type="text" name="apellidoPat"  maxlength="50" value="<?php if (isset($first_name)) { ?><?= $first_name ?> <?php }  ?>" required>
        </div>
      </div>
      <div>
        <label>Apellido Materno</label>
        <div>
        <input type="text" name="apellidMat"  maxlength="50" value="<?php if (isset($last_name)) { ?><?= $last_name ?> <?php }  ?>" required>
        </div>
      </div>
      <div>
        <label>Usuario Corporativo</label>
        <div>
        <input type="text" name="user_corporate"  maxlength="8" value="<?php if (isset($user_corporate)) { ?><?php echo $user_corporate ?> <?php }  ?>" required>
        </div>
      </div>
      <div>
        <label>Correo</label>
        <div>
        <input type="email" name="email" placeholder="" maxlength="50" value="<?php if (isset($email)) { ?><?= $email ?> <?php }  ?>" required>
        </div>
      </div>
      <div>
        <label>Teléfono</label>
        <div>
        <input type="tel" name="phone" placeholder="" maxlength="10" value="<?php if (isset($phone)) { ?><?= $phone ?> <?php }  ?>" required>
        </div>
      </div>
      <div>
        <label>Password</label>
        <div>
        <input type="password" name="password"  maxlength="8" required>
        </div>
      </div>
      <div>
        <label>Confirma password</label>
        <div>
        <input type="password" name="confirmpassword" maxlength="8"  required>
        </div>
      </div>

      <?php
      require_once dirname(__DIR__) . '/app/Models/Area.php';
      require_once dirname(__DIR__) . '/app/Models/Job.php';
      require_once dirname(__DIR__) . '/app/Models/AreaManager.php';

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
            <option value="0" selected="selected" disabled>Selecciona el Area</option>
            <?php foreach ($elementArea->getItemColumns('area', 'id_area') as $area) : ?>
              <option value="<?php echo $area['id'] ?>"><?php echo $area['area'] ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <div class="content-select" style="padding-top: 10px;" required>
          <select name="rol">
            <option value="0" selected="selected" disabled>Selecciona el Puesto</option>
            <?php foreach ($elementJob->getItemColumns('role', 'id_role') as $role) : ?>
              <option value="<?php echo $role['id'] ?>"><?php echo $role['role'] ?></option>
            <?php endforeach ?>
          </select>
        </div>

      </div>
      <div>
        <div class="content-select" required>
          <select name="responsable">
            <option value="0" selected="selected" disabled>Selecciona Responsable</option>
            <?php foreach ($elementManager->getItemColumns('manager_name', 'id_manager') as $resp) : ?>
              <option value="<?php echo $resp['id'] ?>"><?php echo $resp['manager_name'] ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>

    </div>

    <div>
      <div class="gwd-reCAPTCHA_2" style="margin-left: 15%;">
        <div class="g-recaptcha gwd-reCAPTCHA_2" data-sitekey="<?php echo constant('DATA_KEY') ?>">
        </div>

      </div>

      <input type="submit" value="Registrate" class="btn-enviar">
      <p class="form_link">¿Ya tienes cuenta? <a href="/" class="sign-up">Ingresa aquí</a> </p>
    </div>
  </form>

</body>

</html>