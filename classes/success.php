<?php

namespace Classes;

class Success{
    //ERROR|SUCCESS
    //Controller
    //method
    //operation
    const SUCCESS_SIGNUP_NEWUSER        = "8281e04ed52ccfc13820d0f6acb0985a";
    const SUCCESS_CHANGE_STATUS         = "DBr6sjvFmDqOvBH37WDlBoe1bof9sm8L";
    const SUCCESS_SERVER_REGISTER       = "qrNetDEjGRg4AFdpch2bn4xnTOm8zhAg";
    const SUCCESS_UPDATE_SERVER         = "YEqzEuBE9KJLiR73eeI2q+ynksjJuq4d";
    const EMAIL_EXIT                    = "HyDTdr1kfmwDtZR+GXPRoTuhvRQZFxPxW";
    const SUCCESS_ACTIVITY_SEVER        = "aQWdRIYrrlJHCaOGmkdDtE4VXRigwkGmT";
    const SUCCESS_PERMI_ADMIN           = "f8R0DPwJQY5HAX+BiJZYppjJGoES1TGtg";

    const SUCCESS_ADMIN_NEWCATEGORY     = "f52228665c4f14c8695b194f670b0ef1";
    const SUCCESS_EXPENSES_DELETE       = "fcd919285d5759328b143801573ec47d";
    const SUCCESS_EXPENSES_NEWEXPENSE   = "fbbd0f23184e820e1df466abe6102955";
    const SUCCESS_USER_UPDATEBUDGET     = "2ee085ac8828407f4908e4d134195e5c";
    const SUCCESS_USER_UPDATENAME       = "6fb34a5e4118fb823636ca24a1d21669";
    const SUCCESS_USER_UPDATEPASSWORD   = "6fb34a5e4118fb823636ca24a1d21669";
    const SUCCESS_USER_UPDATEPHOTO      = "edabc9e4581fee3f0056fff4685ee9a8";
    const SUCCESS_SIGNUP_DELETE         = "70apW15nLk+69i3Qx4Yc3IzRAo7tv5z4";
    
   


    

    
   
    
    private $successList = [];

    public function __construct()
    {
        $this->successList = [
           
            Success::SUCCESS_SIGNUP_NEWUSER    => "Usuario registrado correctamente.",
            Success::SUCCESS_CHANGE_STATUS     => "Se cambio correctamente el estatus del proceso",
            Success::SUCCESS_SERVER_REGISTER   => "El servidor quedo registrado con exito.",
            Success::SUCCESS_UPDATE_SERVER     => "Se actualizo correctamente el registro.",
            Success::EMAIL_EXIT                => "Se envio link a su correo para resetear el password.",
            Success::SUCCESS_ACTIVITY_SEVER    => "Se realizo la actividad con exito: ",
            Success::SUCCESS_PERMI_ADMIN       => "Se autorizaron con exito los permisos. ",


            Success::SUCCESS_ADMIN_NEWCATEGORY      => "Nueva categoría creada correctamente",
            Success::SUCCESS_EXPENSES_DELETE        => "Gasto eliminado correctamente",
            Success::SUCCESS_EXPENSES_NEWEXPENSE    => "Nuevo gasto registrado correctamente",
            Success::SUCCESS_USER_UPDATEBUDGET      => "Presupuesto actualizado correctamente",
            Success::SUCCESS_USER_UPDATENAME        => "Nombre actualizado correctamente",
            Success::SUCCESS_USER_UPDATEPASSWORD    => "Contraseña actualizado correctamente",
            Success::SUCCESS_USER_UPDATEPHOTO       => "Imagen de usuario actualizada correctamente",
            Success::SUCCESS_SIGNUP_DELETE          => "El registro se elimino correctamente.",
              
        ];
    }

    function get($hash){
        if($hash == null){
            return null;
        }
        return $this->successList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->successList)){
            return true;
        }else{
            return false;
        }
    }
}
?>