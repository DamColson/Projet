<?php

class Armors extends Db{
    public $id;
    public $name;
    public $url;
    
    public function __construct(){
        
    }
    
    public function addArmor(){
        $query = 'INSERT INTO Armors(name,url)VALUE(:name,:url)';
        $addArmor = $this->db->prepare($query);
        $addArmor->bindValue(':name',$this->name,PDO::PARAM_STR);
        $addArmor->bindValue(':url',$this->url,PDO::PARAM_STR);
        
        if($addArmor->execute()):
            return true;
        endif;
    }
}