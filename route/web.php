<?php

    use Lib\Route;  

    use App\Controllers\LoginController;
    use App\Controllers\RegistratioController;
    use App\Controllers\PortalController;
    use App\Controllers\TableController;
    use App\Controllers\JobController;
    use App\Controllers\ResponsibleController;
    use App\Controllers\AreaController;

    

   
    Route::get('/',[LoginController::class ,'index']);


    Route::post('/login-validador',[LoginController::class ,'validateLogin']);


    Route::get('/formrRegistrate', [RegistratioController::class ,'index']);


    Route::post('/registratevalidador',[RegistratioController::class ,'validateForm']);


    Route::get('/portalmonitor', [PortalController::class ,'index']);


    Route::post('/tableusuario', [TableController::class ,'index']);

   //mudulo responsable

    Route::get('/responsible', [ResponsibleController::class ,'index']);


    Route::post('/addResponse', [ResponsibleController::class ,'validResponsable']);


    Route::post('/tableDeleteRespon', [ResponsibleController::class ,'tableDeleteRespon']);


    Route::post('/deleteResponse', [ResponsibleController::class ,'deleteby']);

    //mudulo area
    
    Route::get('/area', [AreaController::class ,'index']);


    Route::post('/addArea', [AreaController::class ,'validResponsable']);


    Route::post('/tableDeleteArea', [AreaController::class ,'tableDeleteRespon']);


    Route::post('/deleteArea', [AreaController::class ,'deleteby']);

    //mudulo puesto de trabajo
    
    Route::get('/job', [JobController::class ,'index']);


    Route::post('/addJob', [JobController::class ,'validResponsable']);


    Route::post('/tableDeleteJob', [JobController::class ,'tableDeleteRespon']);


    Route::post('/deleteJob', [JobController::class ,'deleteby']);


    Route::dispacth();


?>