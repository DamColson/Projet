<?php

class Admin extends Db{
    public $id;
    public $pseudo;
    public $password;
    
    public function __construct(){
        
    }
    
    public function addAdmins(){
        $query = 'INSERT INTO Admin(pseudo,password)VALUE(:pseudo,:password)';
        $addAdmin = $this->db->prepare($query);
        $addAdmin->bindValue(':pseudo',$this->pseudo,PDO::PARAM_STR);
        $addAdmin->bindValue(':password',$this->password,PDO::PARAM_STR);
        
        if($addAdmin->execute()):
            return true;
        endif;
    }
}