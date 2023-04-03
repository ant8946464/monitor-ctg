<?php

    namespace App\Models;

    

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


        public function query($sql){
           // $this->fg = $this->databases->connect()->prepare($sql);
            return $this;
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


        
        public function getallColumn(){
            $items = [];
            try{
                $sql = "SELECT * FROM {$this->table}";
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

        public function getallJoin(){

            $items = [];
            try{
                $sql = "SELECT id_event,activity, event_date, user_corporate , name FROM d29_user_event 
                INNER JOIN d29_user ON d29_user_event.id_event=d29_user.id_user 
                INNER JOIN d29_server_ctg ON d29_user_event.id_event=d29_server_ctg.id_ctg";
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

        public function getallJoinWhere($colum , $value){

            $items = [];
            try{
                $sql = "SELECT id_event,activity, event_date, user_corporate , name FROM d29_user_event 
                INNER JOIN d29_user ON d29_user_event.id_event=d29_user.id_user 
                INNER JOIN d29_server_ctg ON d29_user_event.id_event=d29_server_ctg.id_ctg WHERE {$colum}='{$value}'";      
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

     
        

        public function comparePasswords($passFront, $passDB){
            $encrip = new AbCrypt();
            return strcmp($passFront, $encrip->decryptthis($passDB));;  
       }

        public function get(){
           // return $this->qfg->fetch_all(MYSQLI_ASSOC);;
        }


        public function all(){
            $sql = "SELECT * FROM {$this->table}";
            return $this->query( $sql )->get();
        }

        public function find($id){
            $sql = "SELECT * FROM {$this->table} WHERE id= {$id}";
            return $this->query( $sql );
        }

        public function where($colum ,$operator, $value= null){
            if($value == null){
                $value =  $operator;
                $operator = '=';
            }

           // $value = $this->connection->real_escape_string( $value);
            $sql = "SELECT * FROM {$this->table} WHERE {$colum}{$operator} '{$value}'";
             $this->query( $sql )->get();
             return $this;
        }


     


        public function update($id ,$data){

           $fields = [];

           foreach($data as $key => $value){

            $fields[] = "{$key} = '{$value}'";
           }
           $fields = implode(', ',$fields);
           
            $sql = "UPDATE {$this->table} SET ({$fields }) WHERE id = '{$id }'";
             $this->query( $sql );
             return $this->find($id);
        }


        public function delete($id){

             $sql = "DELETE  {$this->table} WHERE id = '{$id }'";
              $this->query( $sql );
         }
    }


?>