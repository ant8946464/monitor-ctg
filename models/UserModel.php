<?php

include_once '../libs/imodel.php';
include_once '../libs/database.php';
include_once '../libs/abCrypt.php';



class UserModel  implements IModel{

    private $id;
    private $name;
    private $first_name;
    private $last_name;
    private $user_corporate;
    private $email;
    private $phone;
    private $password;
    private $id_rol;
    private $id_area;
    private $role_authorization;

    private $modeloDB;
    private $encrip;


    

    public function __construct(){
        $this-> name = '';
        $this-> first_name= '';
        $this-> last_name= '';
        $this-> user_corporate= '';
        $this-> email= '';
        $this-> phone= '';
        $this-> password= '';
        $this-> id_rol= '';
        $this-> id_area= '';
        $this-> role_authorization = 0;

        $this->modeloDB = new Database();
        $this->encrip = new abCrypt();
    }

    public function validateUserandPassword($usergneric){
        try{
            if($row = $this->userExists($usergneric)) {
              return $this->comparePasswords($this->getPassword(), $row['password']);
            }
            return -1;
        }catch(PDOException $e){
            echo $e;
            return -1;
        }
    }

    public function userExists($usergneric){
        try{
            $query = $this->modeloDB->connect()->prepare('SELECT * FROM d29_user WHERE user_corporate = :user_corporate');  
            $query->execute([ 'user_corporate' =>$usergneric]);
          
            return $query->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo $e;
            return null;
        }
    }

    private function comparePasswords($passFront, $passDB){
         return strcmp($this->encrip->decryptthis($passFront), $this->encrip->decryptthis($passDB));;  
    }

    public function getAreaDB(){
        $items = [];
        try{
            $query = $this->modeloDB->connect()->prepare('SELECT * FROM d29_area');  
             $query->execute();
             while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = ['id'=> $p['id'],
                           'area'=> $p['area']
                ];
             array_push( $items,$item);
            }
            return $items;
        }catch(PDOException $e){
            echo $e;
            return null;
        }
    }



    public function getJob(){
        $items = [];
        try{
            $query = $this->modeloDB->connect()->prepare('SELECT * FROM d29_role');  
             $query->execute();
             while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = ['id'=> $p['id'],
                           'job'=> $p['role']
                ];
             array_push( $items,$item);
            }
            return $items;
        }catch(PDOException $e){
            echo $e;
            return null;
        }
    }

    public function save(){
        var_dump( $this->first_name,$this->last_name,$this->user_corporate,$this->email,$this->password,$this->phone,$this->id_rol,$this->id_area,$this->role_authorization);
        try{
            $query = $this->modeloDB->connect()->prepare('INSERT INTO d29_user (username , first_name, last_name, user_corporate, email, password, phone, id_rol, id_area, role_authorization ) VALUES ( :username, :first_name, :last_name, :user_corporate, :email, :password, :phone, :id_rol, :id_area, :role_authorization )');
            $query->execute([
                'username'  => $this->name, 
                'first_name'  => $this->first_name,
                'last_name'      => $this->last_name,
                'user_corporate'    => $this->user_corporate,
                'email'     => $this->email,
                'password'      => $this->password,
                'phone'      => $this->phone,
                'id_rol'      => $this->id_rol,
                'id_area'      => $this->id_area,
                'role_authorization' => $this->role_authorization
                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    } 

    
    function updateBudget($budget, $iduser){
        $query =$this->modeloDB->connect()->prepare('SELECT * FROM d29_user WHERE user_corporate = :user_corporate');  
        $query->execute([ 'user_corporate' =>'']);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        try{
            $query = $this->modeloDB->connect()->prepare('UPDATE users SET budget = :val WHERE id = :id');
            $query->execute(['val' => $budget, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    function updateName($name, $iduser){
        try{
            $query = $this->modeloDB->connect()->prepare('UPDATE users SET name = :val WHERE id = :id');
            $query->execute(['val' => $name, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    function updatePhoto($name, $iduser){
        try{
            $query = $this->modeloDB->connect()->prepare('UPDATE users SET photo = :val WHERE id = :id');
            $query->execute(['val' => $name, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    function updatePassword($new, $iduser){
        try{
            $hash = password_hash($new, PASSWORD_DEFAULT, ['cost' => 10]);
            $query = $this->modeloDB->connect()->prepare('UPDATE users SET password = :val WHERE id = :id');
            $query->execute(['val' => $hash, 'id' => $iduser]);

            if($query->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        
        }catch(PDOException $e){
            return NULL;
        }
    }

    function comparePasswords1($current, $userid){
        try{
            $query = $this->modeloDB->connect()->prepare('SELECT id, password FROM USERS WHERE id = :id');
            $query->execute(['id' => $userid]);
            
            if($row = $query->fetch(PDO::FETCH_ASSOC)) return password_verify($current, $row['password']);

            return NULL;
        }catch(PDOException $e){
            return NULL;
        }
    }

    public function getAll(){
        $items = [];

        try{
           /* $query = $this->query('SELECT * FROM users');

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new UserModel();
                $item->setId($p['id']);
                $item->setUsername($p['username']);
                $item->setPassword($p['password'], false);
                $item->setRole($p['role']);
                $item->setBudget($p['budget']);
                $item->setPhoto($p['photo']);
                $item->setName($p['name']);
                

                array_push($items, $item);
            }*/
            return $items;


        }catch(PDOException $e){
            echo $e;
        }
    }

    /**
     *  Gets an item
     */
    public function get($id){
        try{
           /* $query = $this->prepare('SELECT * FROM users WHERE id = :id');
            $query->execute([ 'id' => $id]);
            $user = $query->fetch(PDO::FETCH_ASSOC);

            $this->id = $user['id'];
            $this->username = $user['username'];
            $this->password = $user['password'];
            $this->role = $user['role'];
            $this->budget = $user['budget'];
            $this->photo = $user['photo'];
            $this->name = $user['name'];*/

            return $this;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        try{
           /* $query = $this->prepare('DELETE FROM users WHERE id = :id');
            $query->execute([ 'id' => $id]);*/
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function update(){
        try{
          /*  $query = $this->prepare('UPDATE users SET username = :username, password = :password, budget = :budget, photo = :photo, name = :name WHERE id = :id');
            $query->execute([
                'id'        => $this->id,
                'username' => $this->username, 
                'password' => $this->password,
                'budget' => $this->budget,
                'photo' => $this->photo,
                'name' => $this->name
                ]);*/
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

   

    public function from($array){
        /*$this->id = $array['id'];
        $this->username = $array['username'];
        $this->password = $array['password'];
        $this->role = $array['role'];
        $this->budget = $array['budget'];
        $this->photo = $array['photo'];
        $this->name = $array['name'];*/
    }


    


    //FIXME: validar si se requiere el parametro de hash
    public function setPassword($password, $hash = true){ 
        if($hash){
            $this->password = $this->encrip->encryptthis($password);
        }else{
            $this->password = $password;
        }
    }


    public function setUsername($user_corporate){ $this->user_corporate = $user_corporate;}
    public function setName($name){ $this->name = $name;}
    public function setId($id){ $this->id = $id;}
    public function setRole($id_rol){$this->id_rol = (int)$id_rol;}
    public function setFirtName($first_name){  $this->first_name = $first_name;}
    public function setLastName($last_name){  $this->last_name = $last_name;}
    public function setEmail($email){  $this-> email = $email;}
    public function setPhone($phone){  $this-> phone = $phone;}
    public function setArea($id_area){  $this-> id_area = (int)$id_area;}
   
    public function getId(){        return $this->id;}
    public function getUsername(){  return $this->user_corporate;}
    public function getName(){      return $this->name;}
    public function getRole(){   return $this->id_rol;}
    public function getFirtName(){  return $this->first_name;}
    public function getLastName(){   return $this->last_name;}
    public function getEmail(){  return $this->email;}
    public function getPhone(){   return $this->phone;}
    public function getArea(){   return $this->id_area;}
    public function getPassword(){   return $this->password;}
}

?>