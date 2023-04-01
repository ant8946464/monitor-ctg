

     <?php
          use App\Models\User;
          $UserModel = new User();
          require 'layout/navbar.php';
     ?>
     <div class="spanFilter">
     <span >Seleccione el filtrado </span>
     </div>
      

     <div class="select-dis">

     <div class="content-select select-center"  required>
            
                <select name="area">
                        <option  selected="selected" disabled>Selecciona el Usuario</option>
                        <?php foreach($UserModel->getItemColumns('user_corporate') as $area ): ?>
                            <option value="<?php echo $area['user_corporate']?>"><?php echo $area['user_corporate']?></option>
                        <?php endforeach ?>
                      </select>
                </div>
                <div class="content-select select-center" required>
            
                <select name="area">
                        <option  selected="selected" disabled>Selecciona el Nombre</option>
                        <?php foreach($UserModel->getItemColumns('first_name') as $area ): ?>
                            <option value="<?php echo $area['first_name']?>"><?php echo $area['first_name']?></option>
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
                               <th>Actividad</th>
                               <th>Servidor</th>
                               <th>Usuario</th>
                               <th>Fecha del evento</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td>01</td>
                               <td>Carlos</td>
                               <td>Torres Paredes</td>
                               <td>23</td>
                               <td>34534624</td>
                           </tr>
                           
                       </tbody>
                   </table>
               </div>
      </section>
    <?php 

          require 'layout/footer.php';
     ?>
 
