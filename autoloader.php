<?php


    spl_autoload_register(function($clase){
     
        $ruta = str_replace( "\\", "/",$clase).".php";
       
        if(is_file( $ruta)){

            require_once   $ruta;

        }else{
            die("no se pudo cargar la clase  ".$clase);
        }

    });


?>