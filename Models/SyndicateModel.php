<?php

class Syndicate extends Db{
    
    //Attributs
    
    public $id;
    public $name;
    public $image;
    
    //Construct qui recupere le construct du parent Db
    
    public function __construct(){
      parent::__construct();  
    }
    
    //Méthode qui permet d'ajouter un syndicat à la bdd
    
    public function addSyndicates(){
        try{
        $query = 'INSERT INTO wfd_Syndicate(name,image)VALUE(:name,:image)';
        $addSyndicate = $this->db->prepare($query);
        $addSyndicate->bindValue(':name',$this->name,PDO::PARAM_STR);
        $addSyndicate->bindValue(':image',$this->image,PDO::PARAM_STR);
        
        if($addSyndicate->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui retourne les infos d'un syndicat en fonction de son id
    
    public function getSyndicateInfosById() {
        try{
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
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui retourne les infos d'un syndicat en fonction de son nom
    
    public function getSyndicateInfosByName() {
        try{
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
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui retourne tout les syndicatset leurs infos
    
    public function getAllSyndicates(){
        try{
        $query = 'SELECT * FROM wfd_Syndicate';
        $getSyndicates = $this->db->query($query);
        $getAllSyndicates = $getSyndicates->fetchAll(PDO::FETCH_ASSOC);
        return $getAllSyndicates;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui update le nom d'un syndicat en fonction de son id
    
    public function updateSyndicatesName(){
        try{
        $query = 'UPDATE wfd_Syndicate SET wfd_Syndicate.name = :name WHERE wfd_Syndicate.id=:id';
        $updateSyndicateName = $this->db->prepare($query);
        $updateSyndicateName->bindValue(':name', $this->name, PDO::PARAM_STR);
        $updateSyndicateName->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($updateSyndicateName->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui update l'image d'un syndicat en fonction de son id
    
    public function updateSyndicatesImage(){
        try{
        $query = 'UPDATE wfd_Syndicate SET wfd_Syndicate.image = :image WHERE wfd_Syndicate.id=:id';
        $updateSyndicateImage = $this->db->prepare($query);
        $updateSyndicateImage->bindValue(':image', $this->image, PDO::PARAM_STR);
        $updateSyndicateImage->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($updateSyndicateImage->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui supprime un syndicat de la bdd en fonction de son id
    
    public function deleteSyndicate() {
        try{
        $query = 'DELETE FROM wfd_Syndicate WHERE wfd_Syndicate.id=:id';
        $deleteSyndicate = $this->db->prepare($query);
        $deleteSyndicate->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($deleteSyndicate->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui retourne le nombre de syndicats dans la bdd
    
    public function getSyndicateNumber(){
        try{
        $query = 'SELECT COUNT(*) AS number FROM wfd_Syndicate';
        $getNumber = $this->db->query($query);
        $getSyndicateNumber = $getNumber->fetchAll(PDO::FETCH_ASSOC);
        return $getSyndicateNumber;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    
}
