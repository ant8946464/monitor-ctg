<?php

require_once dirname( __DIR__ ) . '/app/Models/User.php';
          use App\Models\User;
          $userModel = new User();
    

          $id = '&nbsp;&nbsp;&nbsp;&nbsp;id&nbsp;&nbsp;&nbsp;&nbsp;';

          require 'layout/navbar.php';
     ?>
      <div class="spanMsgInfo">
        <span >En este módulo el administrador podra realizar el filtrado los usarios e importar la información. </span>
     </div>
     <div class="spanFilter">
            <span >Seleccione el filtrado </span>
     </div>

  <fieldset>
  <div class="select-dis">
                <div class="content-select select-center"  >
                       <select name="idSelect" id="idSelect" onchange="selectView(this.id)"  required>
                            <option  selected="selected" style="width: 30px;" disabled><?php echo $id ?></option>
                            <?php foreach($userModel->getItemColumns('id_user','') as $user ): ?>
                                <option value="<?php echo $user['id_user']?>"><?php echo $user['id_user']?></option>
                            <?php endforeach ?>
                        </select>
                </div>
                <div class="content-select select-center"  >
                       <select name="userSelectlist" id="userSelectlist" onchange="selectView(this.id)"  required>
                            <option  selected="selected" disabled> Usuario</option>
                            <?php foreach($userModel->getItemColumns('user_corporate','') as $user ): ?>
                                <option value="<?php echo $user['user_corporate']?>"><?php echo $user['user_corporate']?></option>
                            <?php endforeach ?>
                        </select>
                </div>
                <div class="content-select select-center"  >
                       <select name="emailSelect" id="emailSelect" onchange="selectView(this.id)"  required>
                            <option  selected="selected" disabled> Correo</option>
                            <?php foreach($userModel->getItemColumns('email','') as $user ): ?>
                                <option value="<?php echo $user['email']?>"><?php echo $user['email']?></option>
                            <?php endforeach ?>
                        </select>
                </div>
     </div>

        <center>
            <div class="tooltip">
                <a href="/listUsers"><img src="/assets/images/limpieza-de-datos.png"></a>
                <span class="tooltiptext">Limpiar el filtrado</span>
            </div>
            <div class="tooltip" style="margin-left: 5%;">
            <a type="button"   id="btnver" href="/reportUser" target="_blank"><img src="/assets/images/pdf.png"></a>
                <span class="tooltiptext">Exportar PDF</span>
            </div>
        </center>
   
           <?php
                require_once 'listUsersPagination.php';
           ?>
   
  </fieldset>
      
   
    <?php 

          require 'layout/footer.php';
     ?>
 
