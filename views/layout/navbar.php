<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/styleNabvar.css">
    <link rel="stylesheet" href="../../assets/css/selectSyles.css">
</head>
<body>
    <nav class="menu">
        <section class="menu__container">
            <h1 class="menu__logo">Bienvenido <?php echo $_SESSION['username'] ?></h1>

            <ul class="menu__links">
                <li class="menu__item menu__item--show">
                        <a href="#" class="menu__link">Administador <img src="assets/images/arrow.svg" class="menu__arrow"></a>
        
                        <ul class="menu__nesting">
                            <li class="menu__inside">
                                <a href="#" class="menu__link menu__link--inside">About 1</a>
                            </li>
                            <li class="menu__inside">
                                <a href="#" class="menu__link menu__link--inside">About 2</a>
                            </li>
                            <li class="menu__inside">
                                <a href="#" class="menu__link menu__link--inside">About 3</a>
                            </li>
                        </ul>
                    </li>
    
                <li class="menu__item menu__item--show">
                    <a href="#" class="menu__link">About <img src="assets/images/arrow.svg" class="menu__arrow"></a>
    
                    <ul class="menu__nesting">
                        <li class="menu__inside">
                            <a href="#" class="menu__link menu__link--inside">About 1</a>
                        </li>
                        <li class="menu__inside">
                            <a href="#" class="menu__link menu__link--inside">About 2</a>
                        </li>
                        <li class="menu__inside">
                            <a href="#" class="menu__link menu__link--inside">About 3</a>
                        </li>
                    </ul>
                </li>
    
                <li class="menu__item  menu__item--show">
                    <a href="#" class="menu__link">Projects  <img src="assets/images/arrow.svg" class="menu__arrow"></a>
    
                    <ul class="menu__nesting">
                        <li class="menu__inside">
                            <a href="#" class="menu__link menu__link--inside">Projects 1</a>
                        </li>
                        <li class="menu__inside">
                            <a href="#" class="menu__link menu__link--inside">Projects 2</a>
                        </li>
                        <li class="menu__inside">
                            <a href="#" class="menu__link menu__link--inside">Projects 3</a>
                        </li>
                    </ul>
                </li>
    
                <li class="menu__item">
                    <a href="#" class="menu__link">Contact</a>
                </li>
    
            </ul>

            <div class="menu__hamburguer">
                <img src="../../assets/images/menu.svg" class="menu__img">
            </div>
        </section>
    </nav>