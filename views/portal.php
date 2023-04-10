

     <?php
          use App\Models\User;
          use App\Models\Activitylog;
use App\Models\Server;
use App\Models\Servidor;
          $userModel = new User();
          $server = new Server;
          $actitivy = new Activitylog();

          require 'layout/navbar.php';
     ?>
      <div class="spanMsgInfo">
        <span >Se listan las actividades en los servidores. </span>
     </div>
     <div class="spanFilter">
            <span >Seleccione el filtrado </span>
     </div>

     <fieldset>
    
     <div class="select-dis">
        <div class="content-select select-center"  >
                <select name="userSelect" id="userSelect" onchange="selectView(this.id)"  required>
                        <option  selected="selected" disabled> Usuario</option>
                        <?php foreach($userModel->getItemColumns('user_corporate','') as $user ): ?>
                            <option value="<?php echo $user['user_corporate']?>"><?php echo $user['user_corporate']?></option>
                        <?php endforeach ?>
                      </select>
                </div>
                <div class="content-select select-center" >
                <select name="serverSelect" id="serverSelect"  onchange="selectView(this.id)" required>
                        <option  selected="selected" disabled>Servidor</option>
                        <?php foreach($server->getItemColumns('name','') as $server ): ?>
                            <option value="<?php echo $server['name']?>"><?php echo $server['name']?></option>
                        <?php endforeach ?>
                      </select>
                </div>
                <div class="content-select select-center"  >
                <select name="activitySelect" id="activitySelect"  onchange="selectView(this.id)" required>
                        <option  selected="selected" disabled>Actvidad</option>
                        <?php foreach($actitivy->getItemColumns('activity','') as $activity ): ?>
                            <option value="<?php echo $activity['activity']?>"><?php echo $activity['activity']?></option>
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
                            <?php
                        
                           $resul = $actitivy->getallJoin();
                         
                            foreach ($resul as $k => $v) {
                                               
                            ?>
                           <tr>
                           
                               <td><?php echo $v['id_event']  ?></td>     
                               <td><?php echo $v['activity']  ?></td>
                               <td><?php echo $v['name']  ?></td>
                               <td><?php echo $v['user_corporate'] ?></td>
                               <td><?php echo $v['event_date']  ?></td>
                               <?php
                        
                                 }
                                ?> 
                           </tr>
                           
                       </tbody>
                   </table>
               </div>
      </section>
  </fieldset>
      
   
    <?php 

          require 'layout/footer.php';
     ?>
 
