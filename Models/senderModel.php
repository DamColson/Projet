<?php

class Sender{
    public $id;
    public $id_UsersInfos;
    
    public function __construct() {
        
    }
    
    public function addSenders(){
        $query = 'INSERT INTO sender(id_UsersInfos)VALUE(:id_UsersInfos)';
        $addsender = $this->db->prepare($query);
        $addsender->bindValue(':id_UsersInfos',$this->id_UsersInfos,PDO::PARAM_STR);
        
        if($addsender->execute()):
            return true;
        endif;
    }
}