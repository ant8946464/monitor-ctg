<?php
        use App\Models\AreaManager;
        use App\Models\DescritionRegister;

        $id = $_POST['request'];
        $areaManager = new AreaManager();
        $maneger = $areaManager->findValue('id_manager',$id,'*');
        $items = [];
        if(!empty( $maneger)){
             foreach ($maneger as $k => $v) {
                        array_push( $items,$v);
             }
             $register= new DescritionRegister();
             $register->delete('id', $items[2]);
             $areaManager->delete('id_manager',$id);
            
        }
?>
    
      <section class="content">   
                        <div >
                            <?php
                            
                                if(!empty($areaManager->getItemColumns('manager_name','id_manager') )){
                            ?>
                            <table >
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre del resposable</th>
                                        <th>eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                      foreach($areaManager->getItemColumns('manager_name','id_manager') as $user ):
                                  ?>       
                                    <tr>
                                        <td><?php echo $user['id']?></td>     
                                        <td><?php echo $user['manager_name']?></td>
                                        <td><a  class="button" href="#modal1" onclick="asigID(<?php echo $user['id'] ?>)">eliminar</a</td>
                                <?php
                                       endforeach
                                  ?>
                                    </tr>          
                                </tbody>
                              </table>
                              <?php
                                }else{
                            ?>
                                      <span>NO EXISTEN REGISTROS</span>
                            <?php
                              }
                            ?>
                          </div>
                        </section>

