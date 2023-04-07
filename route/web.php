<?php

    use Lib\Route;  

    use App\Controllers\LoginController;
    use App\Controllers\RegistratioController;
    use App\Controllers\PortalController;
    use App\Controllers\TableController;
    use App\Controllers\JobController;
    use App\Controllers\ResponsibleController;
    use App\Controllers\AreaController;
    use App\Controllers\UserController;

    

   
    Route::get('/',[LoginController::class ,'index']);


    Route::post('/login-validador',[LoginController::class ,'validateLogin']);
    

    Route::get('/logout',[LoginController::class ,'logout']);


    Route::get('/formrRegistrate', [RegistratioController::class ,'index']);


    Route::post('/registratevalidador',[RegistratioController::class ,'validateForm']);


    Route::get('/portalmonitor', [PortalController::class ,'index']);


    Route::post('/tableusuario', [TableController::class ,'index']);

   //modulo responsable

    Route::get('/responsible', [ResponsibleController::class ,'index']);


    Route::post('/addResponse', [ResponsibleController::class ,'validResponsable']);


    Route::post('/tableDeleteRespon', [ResponsibleController::class ,'tableDeleteRespon']);


    Route::post('/deleteResponse', [ResponsibleController::class ,'deleteby']);

    //modulo area
    
    Route::get('/area', [AreaController::class ,'index']);


    Route::post('/addArea', [AreaController::class ,'validResponsable']);


    Route::post('/tableDeleteArea', [AreaController::class ,'tableDeleteRespon']);


    Route::post('/deleteArea', [AreaController::class ,'deleteby']);

    //modulo puesto de trabajo
    
    Route::get('/job', [JobController::class ,'index']);


    Route::post('/addJob', [JobController::class ,'validResponsable']);


    Route::post('/tableDeleteJob', [JobController::class ,'tableDeleteRespon']);


    Route::post('/deleteJob', [JobController::class ,'deleteby']);

    
      //modulo listar usuario
 

    Route::get('/listUsers', [UserController::class ,'index']);


    Route::post('/detailUser', [UserController::class ,'detailUser']);

    
    Route::post('/deleteUser', [UserController::class ,'deleteUserList']);



    Route::dispacth();


?>