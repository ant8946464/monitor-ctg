<?php

    use Lib\Route;  

    use App\Controllers\LoginController;
    use App\Controllers\RegistratioController;
    use App\Controllers\PortalController;

    Route::get('/',[LoginController::class ,'index']);


    Route::post('/login-validador',[LoginController::class ,'validateLogin']);


    Route::get('/registrate', [RegistratioController::class ,'index']);


    Route::post('/registrate-validador',[RegistratioController::class ,'validateForm']);


    Route::get('/portalmonitor', [PortalController::class ,'index']);

    Route::get('/formloginErrror/:test',function($test){
        return 'pagina curso es  '.$test;
    });



    Route::get('/contact',function(){
        return 'pagina contac';
    });


    Route::get('/about',function(){
        return 'pagina about';
    });


    Route::post('/',function(){
        return 'hello word';
    });

    Route::get('/curso/:test',function($test){
        return 'pagina curso es  '.$test;
    });

    Route::dispacth();


?>