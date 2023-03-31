<?php

    namespace Lib;
    use \PDO;
    use \PDOException;

    require_once 'config/config.php';

    class Databases {

        public function __construct()
        {
            
        }
  
        function connect(){
            try{
                $connection = "mysql:host=" .constant('HOST'). ";dbname=" . constant('DB'). ";charset=" . constant('CHARSET');
                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ];
                
                $pdo = new PDO($connection, constant('USER'),constant('PASSWORD'), $options);
                return $pdo;
            }catch(PDOException $e){
                print_r('Error connection: ' . $e->getMessage());
            }
        }
    }
?>