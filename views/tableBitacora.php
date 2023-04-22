<?php

require_once dirname( __DIR__ ) . '/app/Models/Activitylog.php';


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
	
 require_once 'tableBitacoraPagination.php';	
