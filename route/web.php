<?php

   require_once './app/Controllers/LoginController.php';
   require_once './app/Controllers/RegistratioController.php';
   require_once './app/Controllers/PortalController.php';
   require_once './app/Controllers/TableController.php';
   require_once './app/Controllers/JobController.php';
   require_once './app/Controllers/ResponsibleController.php';
   require_once './app/Controllers/AreaController.php';
   require_once './app/Controllers/UserController.php'; 
   require_once './app/Controllers/ProcessController.php';
   require_once './app/Controllers/ServerController.php';
   require_once './app/Controllers/PlanContingenciaController.php';
   require_once './app/Controllers/ReporteController.php';
   require_once './lib/Route.php';

    use Lib\Route;  

    use App\Controllers\LoginController;
    use App\Controllers\RegistratioController;
    use App\Controllers\PortalController;
    use App\Controllers\TableController;
    use App\Controllers\JobController;
    use App\Controllers\ResponsibleController;
    use App\Controllers\AreaController;
    use App\Controllers\UserController;
    use App\Controllers\ProcessController;
    use App\Controllers\ServerController;
    use App\Controllers\PlanContingenciaController;
    use App\Controllers\ReporteController;

    

   
    Route::get('/',[LoginController::class ,'index']);


    Route::post('/login-validador',[LoginController::class ,'validateLogin']);
    

    Route::get('/logout',[LoginController::class ,'logout']);



    Route::get('/resetPassword',[LoginController::class ,'resetPassword']);


    Route::get('/listActivities',[LoginController::class ,'listActivities']);


    Route::post('/sendMailReset',[LoginController::class ,'sendMailReset']);
    


    Route::get('/Registrate', [RegistratioController::class ,'index']);


    Route::post('/registratevalidador',[RegistratioController::class ,'validateForm']);


    Route::get('/administratorAuthorization/:token',[RegistratioController::class ,'validateAuthorization']);


    

    Route::get('/portalmonitor', [PortalController::class ,'index']);


    Route::post('/portalPagination', [PortalController::class ,'portalPagination']);



    Route::post('/tableusuario', [TableController::class ,'index']);

    Route::post('/tableBitacoraPagination', [TableController::class ,'tableBitacoraPagination']);
    

   //modulo responsable

    Route::get('/responsible', [ResponsibleController::class ,'index']);


    Route::post('/addResponse', [ResponsibleController::class ,'validResponsable']);


    Route::post('/tableDeleteRespon', [ResponsibleController::class ,'tableDeleteRespon']);


    Route::post('/deleteResponse', [ResponsibleController::class ,'deleteby']);

    Route::post('/responsiblePagination', [ResponsibleController::class ,'responsiblePagination']);

    //modulo area
    
    Route::get('/area', [AreaController::class ,'index']);


    Route::post('/addArea', [AreaController::class ,'validResponsable']);


    Route::post('/tableDeleteArea', [AreaController::class ,'tableDeleteRespon']);


    Route::post('/deleteArea', [AreaController::class ,'deleteby']);

    Route::post('/areaPagination', [AreaController::class ,'responsiblePagination']);

    //modulo puesto de trabajo
    
    Route::get('/job', [JobController::class ,'index']);


    Route::post('/addJob', [JobController::class ,'validResponsable']);


    Route::post('/tableDeleteJob', [JobController::class ,'tableDeleteRespon']);


    Route::post('/deleteJob', [JobController::class ,'deleteby']);

    Route::post('/jobPagination', [JobController::class ,'responsiblePagination']);

       //modulo listar usuarios

    Route::get('/listUsers', [UserController::class ,'index']);


    Route::post('/detailUser', [UserController::class ,'detailUser']);

    
    Route::post('/deleteUser', [UserController::class ,'deleteUserList']);


    Route::post('/userPagination', [UserController::class ,'listUsersPagination']);


 //modulo proceso batch

    Route::get('/procesBatch', [ProcessController::class ,'index']);


    Route::post('/change', [ProcessController::class ,'changeStatus']);


    Route::get('/ejectValidad', [ProcessController::class ,'ejectValidad']);

    
 //modulo proceso servidores


    Route::get('/serverConfig', [ServerController::class ,'index']);

    Route::post('/formServer', [ServerController::class ,'validServer']);

    Route::post('/deleteServer', [ServerController::class ,'deleteServer']);


    Route::post('/deleteServerBy', [ServerController::class ,'deleteServerBy']);


    Route::post('/loadServer', [ServerController::class ,'loadServer']);



    //modulo usuario


    Route::get('/form-userUpdate', [RegistratioController::class ,'updateUser']);


    Route::post('/updateUser', [RegistratioController::class ,'validaUserUpdate']);


    //modulo de contigencia

    
    Route::get('/contigencia', [PlanContingenciaController::class ,'index']);


    Route::post('/activityServer', [PlanContingenciaController::class ,'activityServer']);


    Route::post('/contigenciaPagination', [PlanContingenciaController::class ,'contigenciaPagination']);


    Route::post('/contigenciaStarStop', [PlanContingenciaController::class ,'contigenciaStarStop']);
    

    Route::post('/contigenciaRestart', [PlanContingenciaController::class ,'contigenciaRestart']);

    Route::get('/monitoreo', [PlanContingenciaController::class ,'monitoreo']);

    Route::post('/monitoreo', [PlanContingenciaController::class ,'monitoreo']);

    Route::post('/monitoreoGrafico', [PlanContingenciaController::class ,'monitoreoGrafico']);

    Route::get('/monitoreoGrafico', [PlanContingenciaController::class ,'monitoreoGrafico']);
    
     //modulo de reportes

    Route::get('/reporte', [ReporteController::class ,'index']);

    Route::get('/reportUser', [ReporteController::class ,'reportUser']);

    Route::get('/reportEvent', [ReporteController::class ,'reportEvent']);
   
    Route::dispacth();


?>