<?php


    class abCrypt {
  
        private $key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';

        function __construct ( ){}
   

        //ENCRYPT FUNCTION
        function encryptthis($data) {
            $encryption_key = base64_decode($this->key);
            $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
            $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
            return base64_encode($encrypted . '::' . $iv);
        }


        //DECRYPT FUNCTION
        function decryptthis($data, ) {
            $encryption_key = base64_decode($this->key);
            list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
            return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
        }
    

    }

?>