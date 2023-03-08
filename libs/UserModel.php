<?php

include_once 'imodel.php';
include_once 'database.php';
include_once 'abCrypt.php';



class UserModel  implements IModel{

    private $id;
    private $username;
    private $password;
    private $role;
    private $budget;
    private $photo;
    private $name;
    private $modeloDB;
    private $encrip;
    

    public function __construct(){
        $this->username = '';
        $this->password = '';
        $this->role = '';
        $this->budget = 0.0;
        $this->photo = '';
        $this->name = '';
        $this->modeloDB = new Database();
        $this->encrip = new abCrypt();
    }

    public function existsUser($usergneric){
        try{
            $query = $this->modeloDB->connect()->prepare('SELECT * FROM d29_user WHERE user_corporate = :user_corporate');  
            $query->execute([ 'user_corporate' =>$usergneric]);
            if($row = $query->fetch(PDO::FETCH_ASSOC)) {
                var_dump($this->comparePasswords($this->getPassword(), $row['password']));
              return $this->comparePasswords($this->getPassword(), $row['password']);
            }
            return -1;
        }catch(PDOException $e){
            echo $e;
            return -1;
        }
    }

    private function comparePasswords($passFront, $passDB){
         return strcmp($this->encrip->decryptthis($passFront), $this->encrip->decryptthis($passDB));;  
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



    public function save(){
        try{
        /*    $query = $this->prepare('INSERT INTO users (username, password, role, budget, photo, name) VALUES(:username, :password, :role, :budget, :photo, :name )');
            $query->execute([
                'username'  => $this->username, 
                'password'  => $this->password,
                'role'      => $this->role,
                'budget'    => $this->budget,
                'photo'     => $this->photo,
                'name'      => $this->name
                ]);*/
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
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
        $this->id = $array['id'];
        $this->username = $array['username'];
        $this->password = $array['password'];
        $this->role = $array['role'];
        $this->budget = $array['budget'];
        $this->photo = $array['photo'];
        $this->name = $array['name'];
    }


    public function setUsername($username){ $this->username = $username;}


    //FIXME: validar si se requiere el parametro de hash
    public function setPassword($password, $hash = true){ 
        if($hash){
            $this->password = $this->encrip->encryptthis($password);
        }else{
            $this->password = $password;
        }
    }
    public function setId($id){             $this->id = $id;}
    public function setRole($role){         $this->role = $role;}
    public function setBudget($budget){     $this->budget = $budget;}
    public function setPhoto($photo){       $this->photo = $photo;}
    public function setName($name){         $this->name = $name;}

    public function getId(){        return $this->id;}
    public function getUsername(){  return $this->username;}
    public function getPassword(){  return $this->password;}
    public function getRole(){      return $this->role;}
    public function getBudget(){    return $this->budget;}
    public function getPhoto(){     return $this->photo;}
    public function getName(){      return $this->name;}
}

?>