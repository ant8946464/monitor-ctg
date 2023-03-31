<?php

namespace Classes;

class Session{


    public function __construct(){
        if (session_status() == PHP_SESSION_NONE) {
           session_start();
        }
    }

    public function setSessionName($sessionName , $value){
        $_SESSION[$sessionName] = $value;
    }

    public function getSessionName($sessionName){
        return $_SESSION[$sessionName];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }

    public function exists($sessionName){
        return isset($_SESSION[$sessionName]);
    }
}

?>