<?php

class Armors extends Db {

    public $id;
    public $name;

    public function __construct() {
        parent::__construct();
    }

    public function addArmor() {
        $query = 'INSERT INTO wfd_Armors(name)VALUE(:name)';
        $addArmor = $this->db->prepare($query);
        $addArmor->bindValue(':name', $this->name, PDO::PARAM_STR);


        if ($addArmor->execute()):
            return true;
        endif;
    }

    public function getArmorsName() {
        $query = 'SELECT wfd_Armors.id,wfd_Armors.name FROM wfd_Armors WHERE wfd_Armors.id = :armorId';
        $getArmorName = $this->db->prepare($query);
        $getArmorName->bindValue(':armorId', $this->id, PDO::PARAM_INT);

        if ($getArmorName->execute()):
            $getName = $getArmorName->fetchAll(PDO::FETCH_ASSOC);
            $this->name = $getName[0]['name'];
            return $getName;
        endif;
    }

    public function updateFrame(){
        $query = 'UPDATE wfd_Armors SET wfd_Armors.name = :name WHERE wfd_Armors.id=:id';
        $updateFrame = $this->db->prepare($query);
        $updateFrame->bindValue(':name', $this->name, PDO::PARAM_STR);
        $updateFrame->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($updateFrame->execute()):
            return true;
        endif;
    }
    
    public function getAllFrame(){
        $query = 'SELECT * FROM wfd_Armors';
        $getFrames = $this->db->query($query);
        $getAllFrames = $getFrames->fetchAll(PDO::FETCH_ASSOC);
        return $getAllFrames;
    }
    
    public function getFrameIds() {
        $query = 'SELECT wfd_Armors.id,wfd_Armors.name FROM wfd_Armors WHERE wfd_Armors.name = :name';
        $getFrameId = $this->db->prepare($query);
        $getFrameId->bindValue(':name', $this->name, PDO::PARAM_STR);
        
        if($getFrameId->execute()):

        $getId = $getFrameId->fetchAll(PDO::FETCH_ASSOC);
        $this->id = $getId[0]['id'];
        endif;
    }
    
    public function deleteFrame() {
        $query = 'DELETE FROM wfd_Armors WHERE wfd_Armors.id=:id';
        $deleteFrame = $this->db->prepare($query);
        $deleteFrame->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($deleteFrame->execute()):
            return true;
        endif;
    }
}
