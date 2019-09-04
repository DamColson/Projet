<?php

class SyndicateDetails extends Db{
    
    //Attributs
    
    public $id;
    public $rank;
    public $id_wfd_UsersInfos;
    public $id_wfd_Syndicate;
    
    //Contruct qui recupere le construct de son parent Db
    
    public function __construct(){
        parent::__construct();
    }
    
    //Méthode qui update les detail des syndicat dans la bdd, si aucune entrée n'est présente, 
    //alors elles sont créées dans la bdd,si elles existent,elles sont mises à jour.
    
    public function updateSyndicateDetails(){
        try{
        $selectQuery = 'SELECT COUNT(wfd_SyndicateDetails.id) AS count FROM wfd_SyndicateDetails WHERE wfd_SyndicateDetails.id_wfd_UsersInfos = :id_wfd_UsersInfos AND id_wfd_Syndicate = :id_wfd_Syndicate';
        $checkPresence = $this->db->prepare($selectQuery);
        $checkPresence->bindValue(':id_wfd_UsersInfos',$this->id_wfd_UsersInfos,PDO::PARAM_INT);
        $checkPresence->bindValue(':id_wfd_Syndicate',$this->id_wfd_Syndicate,PDO::PARAM_INT);
        $checkPresence->execute();
        $entryCount = $checkPresence->fetchAll(PDO::FETCH_ASSOC);
        
        if((int)$entryCount[0]['count'] == 0):
            $query = 'INSERT INTO wfd_SyndicateDetails(rank,id_wfd_UsersInfos,id_wfd_Syndicate)VALUE(:rank,:id_wfd_UsersInfos,:id_wfd_Syndicate)';
            $addSyndicateDetail = $this->db->prepare($query);
            $addSyndicateDetail->bindValue(':rank',$this->rank,PDO::PARAM_STR);
            $addSyndicateDetail->bindValue(':id_wfd_UsersInfos',$this->id_wfd_UsersInfos,PDO::PARAM_INT);
            $addSyndicateDetail->bindValue(':id_wfd_Syndicate',$this->id_wfd_Syndicate,PDO::PARAM_INT);
        
            if($addSyndicateDetail->execute()):
                return true;
            endif;
        elseif($entryCount[0]['count'] == 1):
            $query = 'UPDATE wfd_SyndicateDetails SET wfd_SyndicateDetails.rank = :rank WHERE wfd_SyndicateDetails.id_wfd_UsersInfos=:id_wfd_UsersInfos AND id_wfd_Syndicate=:id_wfd_Syndicate';
            $updateSyndicateDetail = $this->db->prepare($query);
            $updateSyndicateDetail->bindValue(':rank',$this->rank, PDO::PARAM_STR);
            $updateSyndicateDetail->bindValue(':id_wfd_UsersInfos', $this->id_wfd_UsersInfos, PDO::PARAM_INT);
            $updateSyndicateDetail->bindValue(':id_wfd_Syndicate', $this->id_wfd_Syndicate, PDO::PARAM_INT);

            if ($updateSyndicateDetail->execute()):
                return true;
            endif; 
                
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
        
    }
    
    //Méthode permettant de recuperer le rank qu'un joueur a dans les syndicats via une jointure
    
    public function getSyndicateInfos(){
        try{
        $query = 'SELECT wfd_SyndicateDetails.rank FROM wfd_SyndicateDetails INNER JOIN wfd_UsersInfos ON wfd_SyndicateDetails.id_wfd_UsersInfos = wfd_UsersInfos.id WHERE wfd_SyndicateDetails.id_wfd_UsersInfos = :id_wfd_UsersInfos';
        $getSyndicateInfos = $this->db->prepare($query);
        $getSyndicateInfos->bindValue(':id_wfd_UsersInfos',(int)$this->id_wfd_UsersInfos,PDO::PARAM_INT);
        $getSyndicateInfos->execute();
        
        $getAllInfos = $getSyndicateInfos->fetchAll(PDO::FETCH_ASSOC);
        
        return $getAllInfos;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui retourne le nombre de fois qu'un syndicat a été choisi par les utilisateurs. ( check de sa popularité )
    
    public function getSyndicateNumber(){
        try{
        $query = "SELECT COUNT(*) AS number FROM wfd_SyndicateDetails WHERE id_wfd_Syndicate = :id AND rank != 'Moins de 2'";
        $getNumber = $this->db->prepare($query);
        $getNumber->bindValue(':id',$this->id_wfd_Syndicate,PDO::PARAM_INT);
        
        $getNumber->execute();
        $getSyndicateNumber = $getNumber->fetchAll(PDO::FETCH_ASSOC);
        return $getSyndicateNumber;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
}
    
