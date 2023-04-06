<?php
        use App\Models\AreaManager;
        use App\Models\DescritionRegister;
        use App\Models\Area;


        $id = $_POST['request'];
        if($modelo == "AreaManager"){
          $connectioDb = new AreaManager();
         }else if($modelo == "Area"){
            $connectioDb = new Area();
         }
        $result = $connectioDb->findValue($idtable,$id,'*');
        $items = [];
        if(!empty( $result)){
             foreach ($result as $k => $v) {
                        array_push( $items,$v);
             }
             $register= new DescritionRegister();
             $register->delete('id', $items[2]);
             $connectioDb->delete($search_id,$id);
            
        }
?>
    
      <section class="content">   
                        <div >
                            <?php
                            
                                if(!empty($connectioDb->getItemColumns($column,$search_id) )){
                            ?>
                            <table >
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th><?php if(isset($nameHeader)){?><?=$nameHeader ?> <?php }  ?></th>
                                        <th>eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                      foreach($connectioDb->getItemColumns($column,$search_id) as $user ):
                                  ?>       
                                    <tr>
                                        <td><?php echo $user['id']?></td>     
                                        <td><?php echo $user[$column]?></td>
                                        <td><a  class="button" href="#modal1" onclick="asigID(<?php echo $user['id'] ?>,'<?php echo $pathDelete ?>')">eliminar</a</td>
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

