<?php
    require 'layout/navbar.php';
 ?>


     <div class="spanMsgInfo">
	<span>  <?=  $msgInfo ?> </span>
</div>
  
     </div>
   
     
  <fieldset>
      <legend>Proceso Batch:</legend>
      <div style="margin-left: 5%;">
         <h1 style="color: white; text-align: left; margin-bottom: 50px;"> Proceso de validación de servidores esta : <?=  $msg ?></h1>
         <h2 style="color: white;margin-left:40px;">ON/OFF</h2> 
         <label class="switch" >
               <input type="checkbox"  checked onclick="toggle(this);">
               <span class="slider round"  ></span>
          </label>
      </div>
  </fieldset>

      </div>
     
            
    <?php 

          require 'layout/footer.php';
     ?>