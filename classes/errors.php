<?php

namespace Classes;

class Errors{
 

    const ERROR_SIGNUP_NEWUSER_EMPTY             = "a5bcd7089d83f45e17e989fbc86003ed";
    const ERROR_LOGIN_AUTHENTICATE_DATA          = "bcbe63ed8464684af6945ad8a89f76f8";
    const ERROR_USER_UPDATEPASSWORD_ISNOTTHESAME = "27731b37e286a3c6429a1b8e44ef3ff6";
    const ERROR_SIGNUP_NEWUSER_EXISTS            = "a74accfd26e06d012266810952678cf3";
    const ERROR_SIGNUP_NEWUSER                   = "1fdce6bbf47d6b26a9cd809ea1910222";
    const ERROR_SIGNUP_NEWUSER_PASSWORD          = "89ns26a9cd81fdce6bbf47d6bDl9aysh";
    const ERROR_SIGNUP_NEWUSER_LENGHT            = "89ns26a65fv65grdd8dflp349cd81fdL";
    const ERROR_USER_NOT_EXIST                   = "dkijud26e06d01g56610952678cf3sde";
    const ERROR_USER_NOT_EX                      = "ujfds58op96nbgd65jsfkijngt12wsedg";
    const ERROR_RESPONSABLE_EXIT                 = "SLqKHI3FPfxd8n3Dz6jh2+ZzRChr91X4N";
    const ERROR_SERVER_IP_EXIT                   = "GTF2LcSrh+8kXQ7T3y44fMTP9VEV3lDbl";
    const ERROR_IP_INVALID                       = "x5V1OITn7olzdb+7q2kjhV4Fmy0yRQ3yt";
    const ERROR_CAPTCHA_INVALID                  = "SJ9q4HUCgeOoFx4ruNVkMUQS6k44diaAy";
    const ERROR_NOT_TELEFONO                     = "mNLhA26CekJfRRsoVZH2YL+OQaPRl2uHL";
    const ERROR_NOT_MAIL                         = "omY1wv3wZvAMsQp8sJJO8Hj19VZ8u8Opa";
    const ERROR_EXITS_CONTENT                    = "xCp6cfUWVGN17cara71QbGB0DiWMkiRIu";
    const EMAIL_NOT_EXIT                         = "pishAXQ9ARlaqYd696GXe59kOCzB6V1zu";



    private $errorsList = [];

    private $messageError = '';

    public function __construct()
    {
        $this->errorsList = [
            Errors::ERROR_SIGNUP_NEWUSER_EMPTY              => 'Los campos no pueden estar vacíos',
            Errors::ERROR_LOGIN_AUTHENTICATE_DATA           => 'Usuario y/o password incorrectos',
            Errors::ERROR_USER_UPDATEPASSWORD_ISNOTTHESAME  => 'Los passwords no coinciden.',
            Errors::ERROR_SIGNUP_NEWUSER_EXISTS             => 'El nombre de usuario ya existe.',
            Errors::ERROR_SIGNUP_NEWUSER                    => 'Hubo un error al intentar al enviar los datos. Intenta de nuevo más tardes.',
            Errors::ERROR_SIGNUP_NEWUSER_PASSWORD           => 'La contraseña debe de contener Mayuscula, minusculas, numeros y caracteres.Maximo 8 de longuitud',
            Errors::ERROR_SIGNUP_NEWUSER_LENGHT             => 'El usuario de red debe de tener 8 caracteres',
            Errors::ERROR_USER_NOT_EXIST                    => 'El usuario no se encuentra registrado',
            Errors::ERROR_USER_NOT_EX                       => 'El usuario no es valido',
            Errors::ERROR_RESPONSABLE_EXIT                  => 'El responsable ya existe',
            Errors::ERROR_SERVER_IP_EXIT                    => 'El nombre del servidor y/o ip ya estan registrado',
            Errors::ERROR_IP_INVALID                        => 'La ip tiene un formato invalido',
            Errors::ERROR_CAPTCHA_INVALID                   => 'Validar la captcha',
            Errors::ERROR_NOT_TELEFONO                      => 'El teléfono  contiene caracteres que No son numericos',
            Errors::ERROR_NOT_MAIL                          => 'El correo no cuenta con la estructura necesaria',
            Errors::ERROR_EXITS_CONTENT                     => 'Ya existe: ',
            Errors::EMAIL_NOT_EXIT                          => 'El correo que ingreso no exite.',
        ];
    }

    function get($hash){
        if($hash == null){
            return null;
        }
        return $this->errorsList[$hash];
    }

    function existsKey($key){
        if(array_key_exists($key, $this->errorsList)){
            return true;
        }else{
            return false;
        }
    }

    
}
?>