<?php

namespace Classes;

class Mail{


    private $addressee;

    private $subject;

    private $content;

    private $headers;

    private $messages;


    public function __construct($addressee , $subject ,$messages) {

        $this->addressee =$addressee ;
        $this->subject =$subject ;
        $this->headers ='MIME-Version: 1.0' . "\r\n";
        $this->headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $this->messages = $messages ;
       
    }

    public function sendMail(){
        mail( $this->addressee, $this->subject ,$this->messages);
  }

    public function sendMailContent(){
          mail( $this->addressee, $this->subject ,$this->content , $this->headers);
    }

    public function templateMessage($title, $msgH1 ,$url ,$msgRef){
        $this->content = '
        <html>
        <head>
        <title>'.$title.'</title>
        </head>
        <body>
           <h1>'.$msgH1.'</h1>
           <div style="text-align:center; background-color:#ccc">
              <p>'.$title.'</p>
              <p> <a href="'.$url.'">'.$msgRef.'</a> </p>
              <p> <small>Si usted no envio este codigo favor de omitir</small> </p>
           </div>
        </body>
        </html>
        ';

       

    }

}

?>