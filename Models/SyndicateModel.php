<?php

class Syndicate extends Db{
    public $id;
    public $name;
    public $image;
    
    public function __construct(){
      parent::__construct();  
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
    
    public function getSyndicateInfosById() {
        $query = 'SELECT wfd_Syndicate.name,wfd_Syndicate.image,wfd_Syndicate.id FROM wfd_Syndicate WHERE wfd_Syndicate.id = :id';
        $getSyndicateInfosById = $this->db->prepare($query);
        $getSyndicateInfosById->bindValue(':id', $this->id, PDO::PARAM_STR);
        
        if($getSyndicateInfosById->execute()):

        $getInfosById = $getSyndicateInfosById->fetchAll(PDO::FETCH_ASSOC);
        
        $this->id = $getInfosById[0]['id'];
        $this->image = $getInfosById[0]['image'];
        $this->name = $getInfosById[0]['name'];
        return $getInfosById;
        endif;
    }
    
    public function getSyndicateInfosByName() {
        $query = 'SELECT wfd_Syndicate.name,wfd_Syndicate.image,wfd_Syndicate.id FROM wfd_Syndicate WHERE wfd_Syndicate.name = :name';
        $getSyndicateInfos = $this->db->prepare($query);
        $getSyndicateInfos->bindValue(':name', $this->name, PDO::PARAM_STR);
        
        if($getSyndicateInfos->execute()):

        $getInfos = $getSyndicateInfos->fetchAll(PDO::FETCH_ASSOC);
        
        $this->id = $getInfos[0]['id'];
        $this->image = $getInfos[0]['image'];
        $this->name = $getInfos[0]['name'];
        return $getInfos;
        endif;
    }
    
    public function getAllSyndicates(){
        $query = 'SELECT * FROM wfd_Syndicate';
        $getSyndicates = $this->db->query($query);
        $getAllSyndicates = $getSyndicates->fetchAll(PDO::FETCH_ASSOC);
        return $getAllSyndicates;
    }
    
    public function updateSyndicatesName(){
        $query = 'UPDATE wfd_Syndicate SET wfd_Syndicate.name = :name WHERE wfd_Syndicate.id=:id';
        $updateSyndicateName = $this->db->prepare($query);
        $updateSyndicateName->bindValue(':name', $this->name, PDO::PARAM_STR);
        $updateSyndicateName->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($updateSyndicateName->execute()):
            return true;
        endif;
    }
    
    public function updateSyndicatesImage(){
        $query = 'UPDATE wfd_Syndicate SET wfd_Syndicate.image = :image WHERE wfd_Syndicate.id=:id';
        $updateSyndicateImage = $this->db->prepare($query);
        $updateSyndicateImage->bindValue(':image', $this->image, PDO::PARAM_STR);
        $updateSyndicateImage->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($updateSyndicateImage->execute()):
            return true;
        endif;
    }
    
    public function deleteSyndicate() {
        $query = 'DELETE FROM wfd_Syndicate WHERE wfd_Syndicate.id=:id';
        $deleteSyndicate = $this->db->prepare($query);
        $deleteSyndicate->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($deleteSyndicate->execute()):
            return true;
        endif;
    }
    
    public function getSyndicateNumber(){
        $query = 'SELECT COUNT(*) AS number FROM wfd_Syndicate';
        $getNumber = $this->db->query($query);
        $getSyndicateNumber = $getNumber->fetchAll(PDO::FETCH_ASSOC);
        return $getSyndicateNumber;
    }
    
    
}
