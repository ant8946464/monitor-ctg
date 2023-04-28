<?php

require_once dirname( __DIR__ ) . '/app/Models/Activitylog.php';

require_once './classes/Session.php';

use Classes\Session;
	use App\Models\Activitylog;
	$actitivy = new Activitylog(); 
	$Colum;
	$value;

    if(isset($_POST['user_corporate'])){
		$Colum = 'u.user_corporate';
		$value = $_POST['user_corporate'];
		
    } else if(isset($_POST['activity'])){
		$Colum = 'e.activity';
		$value = $_POST['activity'];
		
    }else  if(isset($_POST['name'])){
		$Colum = 'c.name';
		$value = $_POST['name'];
		
    }
	$session = new Session();
	$session->setSessionName('reportActivity',0) ;
	$session->setSessionName('columActivity',$Colum ) ;
	$session->setSessionName('valueActivity',$value) ;
	
 require_once 'tableBitacoraPagination.php';	
