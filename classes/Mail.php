<?php

namespace Classes;

class Mail{


    private $addressee;

    private $subject;

    private $content;

    private $headers;


    public function __construct($addressee , $subject ,$content ,$headers) {

        $this->addressee =$addressee ;

        $this->subject =$subject ;

        $this->content =$content ;

        $this->headers =$headers ;
       
    }

    public function sendMail(){
          mail( $this->addressee, $this->subject ,$this->content , $this->headers);
    }

}

?>