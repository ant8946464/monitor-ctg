<?php

namespace Classes;

class Success{
    //ERROR|SUCCESS
    //Controller
    //methodBiJZYppjJGoES1TGtg
    //operation
    const SUCCESS_SIGNUP_NEWUSER        = "8281e04ed52ccfc13820d0f6acb0985a";
    const SUCCESS_CHANGE_STATUS         = "DBr6sjvFmDqOvBH37WDlBoe1bof9sm8L";
    const SUCCESS_SERVER_REGISTER       = "qrNetDEjGRg4AFdpch2bn4xnTOm8zhAg";
    const SUCCESS_UPDATE_SERVER         = "YEqzEuBE9KJLiR73eeI2q+ynksjJuq4d";
    const EMAIL_EXIT                    = "HyDTdr1kfmwDtZR+GXPRoTuhvRQZFxPxW";
    const SUCCESS_ACTIVITY_SEVER        = "aQWdRIYrrlJHCaOGmkdDtE4VXRigwkGmT";
    const SUCCESS_PERMI_ADMIN           = "f8R0DPwJQY5HAX+BiJZYppjJGoES1TGtg";

   
    private $successList = [];

    public function __construct()
    {
        $this->successList = [
           
            Success::SUCCESS_SIGNUP_NEWUSER    => "Usuario registrado correctamente.",
            Success::SUCCESS_CHANGE_STATUS     => "Se cambio correctamente el estatus del proceso",
            Success::SUCCESS_SERVER_REGISTER   => "El servidor quedo registrado con éxito.",
            Success::SUCCESS_UPDATE_SERVER     => "Se actualizo correctamente el registro.",
            Success::EMAIL_EXIT                => "Se envio link a su correo para resetear el password.",
            Success::SUCCESS_ACTIVITY_SEVER    => "Se realizo la actividad con éxito : ",
            Success::SUCCESS_PERMI_ADMIN       => "Se autorizaron con éxito  los permisos. ",


              
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