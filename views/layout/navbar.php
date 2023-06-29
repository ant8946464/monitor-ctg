<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../assets/css/styleNabvar.css">
    <link rel="stylesheet" href="../../assets/css/selectSyles.css">
    <link rel="stylesheet" href="../../assets/css/formStyles.css">
    <link rel="stylesheet" href="../../assets/css/stylesAlert.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="../assets/js/script.js"></script>
</head>
<body style="background: #f1f3f4;">
   
    <nav class="menu">
        <section class="menu__container">
       
        <img class="logoTelcelBlue" src="../../assets/images/logoTelcelBlue.jpg" width="170" height="60" />

            <ul class="menu__links">
                <li class="menu__item menu__item--show">
                <?php 
                 require_once './classes/Session.php';
        
                    use Classes\Session;
                    $session = new Session();
                    if($session->getSessionName('d29_role_id') == 1 && $session->getSessionName('role_authorization')==1){
   
                ?>
                        <a href="#" class="menu__link">administrador <img src="assets/images/arrow.svg" class="menu__arrow"></a>
                        <ul class="menu__nesting">
                            <li class="menu__inside">
                                <a href="/responsible" class="menu__link menu__link--inside">responsable</a>
                            </li>
                            <li class="menu__inside">
                                <a href="/portalmonitor" class="menu__link menu__link--inside">eventos del servidor</a>
                            </li>
                            <li class="menu__inside">
                                <a href="/area" class="menu__link menu__link--inside">departamento</a>
                            </li>
                            <li class="menu__inside">
                                <a href="/job" class="menu__link menu__link--inside">puesto de trabajo</a>
                            </li>
                            <li class="menu__inside">
                                <a href="/listUsers" class="menu__link menu__link--inside">lista usuarios</a>
                            </li>
                            <li class="menu__inside">
                                <a href="/procesBatch" class="menu__link menu__link--inside">proceso batch</a>
                            </li>
                        </ul>
                    </li>
                <?php 
                    }
                ?>
    
                <li class="menu__item menu__item--show">
                    <a href="/serverConfig" class="menu__link">configuración servidores </a>
                </li>
    
                <li class="menu__item menu__item--show">
                    <a href="/form-userUpdate" class="menu__link">usuario</a>
                </li>
    
                <li class="menu__item">
                    <a href="/contigencia" class="menu__link">plan de contigencia</a>
                </li>

                <li class="menu__item">
                    <a href="/listActivities" class="menu__link">actividades servidor</a>
                </li>
                <li class="menu__item">
                    <a href="/monitoreoServer" class="menu__link">monitoreo</a>
                </li>

            </ul>
            <h1 class="menu__logo" style="color: #f1f3f4;">Bienvenido <?php echo $_SESSION['username'] ?></h1>
             <a class="button logout"  href="/logout">Salir</a> 
            <div class="menu__hamburguer">

                <img src="../../assets/images/menu.svg" class="menu__img">
            </div>
        </section>
    </nav>
  
 
    