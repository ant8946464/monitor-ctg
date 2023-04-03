<?php

    use Lib\Route;  

    use App\Controllers\LoginController;
    use App\Controllers\RegistratioController;
    use App\Controllers\PortalController;
    use App\Controllers\TableController;
    use App\Controllers\ResponsibleController;

   
    Route::get('/',[LoginController::class ,'index']);


    Route::post('/login-validador',[LoginController::class ,'validateLogin']);


    Route::get('/formrRegistrate', [RegistratioController::class ,'index']);


    Route::post('/registratevalidador',[RegistratioController::class ,'validateForm']);


    Route::get('/portalmonitor', [PortalController::class ,'index']);

    Route::post('/tableusuario', [TableController::class ,'index']);


    Route::get('/responsible', [ResponsibleController::class ,'index']);


    Route::post('/add', [ResponsibleController::class ,'validResponsable']);

   


    Route::dispacth();


?>