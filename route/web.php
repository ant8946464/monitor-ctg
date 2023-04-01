<?php

    use Lib\Route;  

    use App\Controllers\LoginController;
    use App\Controllers\RegistratioController;
    use App\Controllers\PortalController;

    Route::get('/',[LoginController::class ,'index']);


    Route::post('/login-validador',[LoginController::class ,'validateLogin']);


    Route::get('/formrRegistrate', [RegistratioController::class ,'index']);


    Route::post('/registratevalidador',[RegistratioController::class ,'validateForm']);


    Route::get('/portalmonitor', [PortalController::class ,'index']);

    Route::get('/formloginErrror/:test',function($test){
        return 'pagina curso es  '.$test;
    });


    Route::dispacth();


?>