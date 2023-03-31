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


        public function findValue($colum, $value){
        
            try{
                $sql = "SELECT * FROM {$this->table}  WHERE {$colum} = :{$colum}";
                $query = $this->databases->connect()->prepare($sql);
                $query->execute([ $colum => $value]);  
                return  $query->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                echo $e;
                return null;
            }
        }

        public function getItemColumns($column){
            $items = [];
            try{
                $sql = "SELECT * FROM {$this->table}";
                $query = $this->databases->connect()->prepare($sql);  
                $query->execute();
                 while($p = $query->fetch(PDO::FETCH_ASSOC)){
                    $item = ['id'=> $p['id'],
                            $column=> $p[$column]
                    ];
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