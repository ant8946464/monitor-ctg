<?php
    require 'layout/navbar.php';
 ?>


     <div class="spanMsgInfo">
	         <span>  <?=  $msgInfo ?> </span>
      </div>
  
   
   
     
  <fieldset style="margin-bottom: 8.2%; margin-top: 8%;">
      <legend>Proceso Batch:</legend>
      <div style="margin-left: 5%;">
         <h1 style="color: white; text-align: left; margin-bottom: 50px;"> Proceso de validación de servidores esta : <?=  $msg ?></h1>
         <h2 style="color: white;margin-left:20px;">Presiona para prender o apagar el proceso</h2> 
         <form   action="/change"  method="POST">
            <input type="submit" value="<?= $msg?>" name="status" />
        </form>
      </div>
  </fieldset>
     
    <?php 

          require 'layout/footer.php';
     ?>