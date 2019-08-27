<?php

class Armors extends Db {
    //Atributs
    
    public $id;
    public $name;
    
    //Construct qui recupere le construct du parentDb
    
    public function __construct() {
        parent::__construct();
    }
    
    //Méthode qui ajoute une frame a la bdd
    
    public function addArmor() {
        try{
        $query = 'INSERT INTO wfd_Armors(name)VALUE(:name)';
        $addArmor = $this->db->prepare($query);
        $addArmor->bindValue(':name', $this->name, PDO::PARAM_STR);


        if ($addArmor->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui retourne le nom d'une frame en fonction de son id
    
    public function getArmorsName() {
        try{
        $query = 'SELECT wfd_Armors.id,wfd_Armors.name FROM wfd_Armors WHERE wfd_Armors.id = :armorId';
        $getArmorName = $this->db->prepare($query);
        $getArmorName->bindValue(':armorId', $this->id, PDO::PARAM_INT);

        if ($getArmorName->execute()):
            $getName = $getArmorName->fetchAll(PDO::FETCH_ASSOC);
            $this->name = $getName[0]['name'];
            return $getName;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui permet de modifier les infosmations d'une frame dans la bdd
    
    public function updateFrame(){
        try{
        $query = 'UPDATE wfd_Armors SET wfd_Armors.name = :name WHERE wfd_Armors.id=:id';
        $updateFrame = $this->db->prepare($query);
        $updateFrame->bindValue(':name', $this->name, PDO::PARAM_STR);
        $updateFrame->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($updateFrame->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui retourne tout les frames présente dans la bdd
    
    public function getAllFrame(){
        try{
        $query = 'SELECT * FROM wfd_Armors';
        $getFrames = $this->db->query($query);
        $getAllFrames = $getFrames->fetchAll(PDO::FETCH_ASSOC);
        return $getAllFrames;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui permet de recupérer l'id d'une frame en fonction de son nom
    
    public function getFrameIds() {
        try{
        $query = 'SELECT wfd_Armors.id,wfd_Armors.name FROM wfd_Armors WHERE wfd_Armors.name = :name';
        $getFrameId = $this->db->prepare($query);
        $getFrameId->bindValue(':name', $this->name, PDO::PARAM_STR);
        
        if($getFrameId->execute()):

        $getId = $getFrameId->fetchAll(PDO::FETCH_ASSOC);
        $this->id = $getId[0]['id'];
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui permet de supprimer une frame de la bdd en fonction de son id
    
    public function deleteFrame() {
        try{
        $query = 'DELETE FROM wfd_Armors WHERE wfd_Armors.id=:id';
        $deleteFrame = $this->db->prepare($query);
        $deleteFrame->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($deleteFrame->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui retourne le nombre de frame présente dans la bdd
    
    public function getFrameNumber(){
        try{
        $query = 'SELECT COUNT(*) AS number FROM wfd_Armors';
        $getNumber = $this->db->query($query);
        $getFrameNumber = $getNumber->fetchAll(PDO::FETCH_ASSOC);
        return $getFrameNumber;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui retourne la frame la plus choisies pas les utilisateurs
    
    public function getMostFavFrame(){
        try{
        $query = "SELECT wfd_Armors.name,COUNT(*) AS number FROM wfd_UsersInfos INNER JOIN wfd_Armors ON wfd_UsersInfos.id_wfd_Armors = wfd_Armors.id GROUP BY wfd_Armors.name ORDER BY number DESC LIMIT 1";
        $getFav = $this->db->query($query);
        $getMostFav = $getFav->fetchAll(PDO::FETCH_ASSOC);
        return $getMostFav;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
}
