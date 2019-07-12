<?php

class Syndicate extends Db{
    public $id;
    public $name;
    
    public function __construct(){
        
    }
    
    public function addSyndicates(){
        $query = 'INSERT INTO Syndicate(name)VALUE(:name)';
        $addSyndicate = $this->db->prepare($query);
        $addSyndicate->bindValue(':name',$this->name,PDO::PARAM_STR);

        
        if($addSyndicate->execute()):
            return true;
        endif;
    }
}
