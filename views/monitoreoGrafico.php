
<?php 

$selector;
var_dump('MONITOREOOOO');
   if (isset($_POST['selector'])) {
       $selector =  $_POST['selector'];
      var_dump($_POST['selector']);
   }

   require 'views/monitoreo.php';
?>

<div  id="solo"></div>
