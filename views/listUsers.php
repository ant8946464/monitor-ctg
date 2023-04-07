<?php
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
   
     
      <section class="content">
           
                <div >
                   <table>
                       <thead>
                           <tr>
                               <th>Id</th>
                               <th>Nombre</th>
                               <th>Apellidos</th>
                               <th>Usuario Generico</th>
                               <th>Correo</th>
                               <th>Teléfono</th>
                               <th></th>
                           </tr>
                       </thead>
                       <tbody>
                            <?php
                           
                           $resul = $userModel->getallColumn();
                         
                            foreach ($resul as $k => $v) {
                                               
                            ?>
                           <tr>
                           
                               <td><?php echo $v['id_user']  ?></td>     
                               <td><?php echo $v['username']  ?></td>
                               <td><?php echo $v['first_name'].'  '.$v['last_name']  ?></td>
                               <td><?php echo $v['user_corporate'] ?></td>
                               <td><?php echo $v['email'] ?></td>
                               <td><?php echo $v['phone']  ?></td>
                               <td><a  href="#modal1" onclick="asigID(<?php  echo $v['id_user'] ?>,'deleteUser')">eliminar</a></td>
                               <?php
                        
                                 }
                                ?> 


                           </tr>
                           
                       </tbody>
                   </table>
               </div>
      </section>
    <?php 

          require 'layout/footer.php';
     ?>
 
