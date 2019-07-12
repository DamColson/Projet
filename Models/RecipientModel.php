<?php

class Recipient{
    public $id;
    public $id_UsersInfos;
    
    public function __construct(){
        
    }
    
    public function addRecipients(){
        $query = 'INSERT INTO recipient(id_UsersInfos)VALUE(:id_UsersInfos)';
        $addRecipient = $this->db->prepare($query);
        $addRecipient->bindValue(':id_UsersInfos',$this->id_UsersInfos,PDO::PARAM_INT);
        
        if($addRecipient->execute()):
            return true;
        endif;
    }
}