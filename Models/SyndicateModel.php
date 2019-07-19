<?php

class Syndicate extends Db{
    public $id;
    public $name;
    public $image;
    
    public function __construct(){
        
    }
    
    public function addSyndicates(){
        $query = 'INSERT INTO wfd_Syndicate(name,image)VALUE(:name,:image)';
        $addSyndicate = $this->db->prepare($query);
        $addSyndicate->bindValue(':name',$this->name,PDO::PARAM_STR);
        $addSyndicate->bindValue(':image',$this->image,PDO::PARAM_STR);
        
        if($addSyndicate->execute()):
            return true;
        endif;
    }
}
