<?php

namespace Lib;

require_once 'config/config.php';

class Captcha{


    public function __construct(){}

    public function getCaptcha(){

        $ipcapcha = $_SERVER[constant('REMOTE_ADDR')];
        $captacha = $_POST[constant('CAPTCHA_RESPONSE')];
        $secretKey = constant('SECRET_KEY');
        $responseCaptcha =file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captacha&remoteip=$ipcapcha");
        $atributesResposane = json_decode($responseCaptcha, TRUE);

        return $atributesResposane['success'];

        
    }
}

?>