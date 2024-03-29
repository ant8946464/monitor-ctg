<?php

    namespace App\Models;
    
    require_once './lib/AbCrypt.php';
    require_once './lib/DataBases.php';
    require_once './lib/ValidatorFunctions.php';
    

    use Lib\AbCrypt;
    use Lib\Databases;
    use \PDO;
    use \PDOException;

   

    class Model{

    
        protected $table;

        private $databases;

        public function __construct(){
            $this->databases = new Databases(); 
        }

        public function getallFilterDay($value){
                $date_now = date("Y-m-d"); 
                $nuevaFecha = date("Y-m-d",strtotime ( '-'.$value.' day' , strtotime ( $date_now ) ) );
            try{
                $sql = "SELECT * FROM {$this->table} WHERE date_event between '$nuevaFecha 00:00:00' and '$date_now 23:59:59'; ";
                return $this->executeQueryItems($sql);     
            }catch(PDOException $e){
                echo $e;
                return null;
            }
        }


   

        public function findValue($colum, $value, $selectColumn){
           
            try{
                $sql = "SELECT {$selectColumn} FROM {$this->table}  WHERE {$colum} = :{$colum}";
                $query = $this->databases->connect()->prepare($sql);
                $query->execute([ $colum => $value]); 
                return  $query->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e;
                return null;
            }
        }


        public function getItemColumnsDistinct($column ,$columnId){
            $items = [];
            try{
                $sql = "SELECT DISTINCT($column) FROM {$this->table}";
                $query = $this->databases->connect()->prepare($sql);  
                $query->execute();
                 while($p = $query->fetch(PDO::FETCH_ASSOC)){
                    $item = ['id' => $p[$columnId],
                             $column => $p[$column]];
                    array_push( $items,$item);
                }
                return $items;
            }catch(PDOException $e){
                echo $e;
                return null;
            }
        }


   

        public function getItemColumns($column ,$columnId){
            $items = [];
            try{
                $sql = "SELECT * FROM {$this->table}";
                $query = $this->databases->connect()->prepare($sql);  
                $query->execute();
                 while($p = $query->fetch(PDO::FETCH_ASSOC)){
                    $item = ['id' => $p[$columnId],
                             $column => $p[$column]];
                    array_push( $items,$item);
                }
                return $items;
            }catch(PDOException $e){
                echo $e;
                return null;
            }
        }

        public function create($data){

            $columns = array_keys($data);
            $columnsValues = array_keys($data);
            $columns = implode(', ',$columns);
            $columnsValues = implode(', :', $columnsValues);
            $sql = "INSERT INTO {$this->table} ({$columns }) VALUES ( :{$columnsValues})";
             try{
                $query = $this->databases->connect()->prepare($sql);  
                $query->execute($data);
                return true;
            }catch(PDOException $e){
                echo $e;
                return false;
            }
        }


        public function getallColumnLimit($start , $byPage){

            try{
                $sql = "SELECT * FROM {$this->table} LIMIT  $start , $byPage  ";
                return $this->executeQueryItems($sql);
            }catch(PDOException $e){
                echo $e;
                return null;
            }
        }

    
       
        
        public function getallColumn(){
            try{
                $sql = "SELECT * FROM {$this->table} ";
                return $this->executeQueryItems($sql);
            }catch(PDOException $e){
                echo $e;
                return null;
            }
        }

  

        public function getallJoinlimit($start , $byPage ){

            try{
                $sql = "SELECT * FROM d29_user_event e JOIN d29_user u JOIN d29_server_ctg c where e.d29_user_id=u.id_user and e.d29_server_ctg_id=c.id_ctg LIMIT  $start , $byPage  ";
                return $this->executeQueryItems($sql);
            }catch(PDOException $e){
                echo $e;
                return null;
            }
        }


     

        public function getallJoin(){

            try{
                $sql = "SELECT * FROM d29_user_event e JOIN d29_user u JOIN d29_server_ctg c where e.d29_user_id=u.id_user and e.d29_server_ctg_id=c.id_ctg";
                return $this->executeQueryItems($sql);
            }catch(PDOException $e){
                echo $e;
                return null;
            }
        }

    


        public function getallJoinWhereLimit($colum , $value ,$start , $byPage){
            try{
                $sql = "SELECT * FROM d29_user_event e JOIN d29_user u JOIN d29_server_ctg c where e.d29_user_id=u.id_user and e.d29_server_ctg_id=c.id_ctg and {$colum}='{$value}'LIMIT  $start , $byPage  ";      
             
                return $this->executeQueryItems($sql);
            }catch(PDOException $e){
                echo $e;
                return null;
            }
        }


   

        public function getallJoinWhere($colum , $value ){
            try{
                $sql = "SELECT * FROM d29_user_event e JOIN d29_user u JOIN d29_server_ctg c where e.d29_user_id=u.id_user and e.d29_server_ctg_id=c.id_ctg and {$colum}='{$value}'";      
             
                return $this->executeQueryItems($sql);
            }catch(PDOException $e){
                echo $e;
                return null;
            }
        }


   

        public function getallWhere($colum , $value ){
            try{
                $sql = "SELECT * FROM {$this->table} WHERE {$colum}='{$value}'";      
              
                return $this->executeQueryItems($sql);
            }catch(PDOException $e){
                echo $e;
                return null;
            }
        }

   


        public function delete($idComun ,$value){

            try{
                $sql = "DELETE  FROM {$this->table} WHERE {$idComun } = :{$idComun }";
                $query = $this->databases->connect()->prepare($sql);
                $query->execute([ $idComun  => $value]);
            }catch(PDOException $e){
                echo $e;
                return false;
            }
            
        }

        public function update($column,$id ,$data){

            $fields = [];
            foreach($data as $key => $value){
                $fields[] = "{$key} = '{$value}'";
            }
            $fields = implode(', ',$fields);
             $sql = "UPDATE {$this->table} SET {$fields } WHERE {$column } = {$id }";
            try{
             $query = $this->databases->connect()->prepare($sql);
              return $query->execute();
            }catch(PDOException $e){
                echo $e;
                return false;
            }
         }

     
        

        public function comparePasswords($passFront, $passDB){
            $encrip = new AbCrypt();
            return strcmp($passFront, $encrip->decryptthis($passDB));;  
       }
       

        public function executeQueryItems($sql){
                $items = [];
            try{
                $query = $this->databases->connect()->prepare($sql);  
                $query->execute();
                while( $p = $query->fetch(PDO::FETCH_ASSOC)){
                    array_push( $items,$p);
                }
                return $items;
            }catch(PDOException $e){
                echo $e;
                return null;
            }
        }
       
    }


?>