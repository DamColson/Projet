<?php

class Armors extends Db{
    public $id;
    public $name;
    public $url;
    
    public function __construct(){
        parent::__construct();
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
    
    public function getArmorsName(){
        $query = 'SELECT Armors.name FROM Armors WHERE Armors.id = :armorId';
        $getArmorName = $this->db->prepare($query);
        $getArmorName->bindValue(':armorId',$this->id,PDO::PARAM_INT);
        $getArmorName->execute();
        
        $getName = $getArmorName->fetchAll(PDO::FETCH_ASSOC);
        
        return $getName;
    }
}