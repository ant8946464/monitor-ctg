<?php

    namespace Lib;


    class ValidatorFunctions {
  
        function validateEmptyParameters( $array){

            foreach ($array as $var){
                if(empty($var)){
                    return true;
                }   
            }
            return false;
        }

    }

?>