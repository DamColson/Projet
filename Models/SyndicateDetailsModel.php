<?php

class SyndicateDetails extends Db{
    
    public $id;
    public $rank;
    public $id_wfd_UsersInfos;
    public $id_wfd_Syndicate;
    
    public function __construct(){
        parent::__construct();
    }
    
    public function updateSyndicateDetails(){
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
        
    }
    
    public function getSyndicateInfos(){
        $query = 'SELECT wfd_SyndicateDetails.rank FROM wfd_SyndicateDetails INNER JOIN wfd_UsersInfos ON wfd_SyndicateDetails.id_wfd_UsersInfos = wfd_UsersInfos.id WHERE wfd_SyndicateDetails.id_wfd_UsersInfos = :id_wfd_UsersInfos';
        $getSyndicateInfos = $this->db->prepare($query);
        $getSyndicateInfos->bindValue(':id_wfd_UsersInfos',(int)$this->id_wfd_UsersInfos,PDO::PARAM_INT);
        $getSyndicateInfos->execute();
        
        $getAllInfos = $getSyndicateInfos->fetchAll(PDO::FETCH_ASSOC);
        
        return $getAllInfos;
    }
    
    public function getSyndicateNumber(){
        $query = "SELECT COUNT(*) AS number FROM wfd_SyndicateDetails WHERE id_wfd_Syndicate = :id AND rank != 'Moins de 2'";
        $getNumber = $this->db->prepare($query);
        $getNumber->bindValue(':id',$this->id_wfd_Syndicate,PDO::PARAM_INT);
        
        $getNumber->execute();
        $getSyndicateNumber = $getNumber->fetchAll(PDO::FETCH_ASSOC);
        return $getSyndicateNumber;
    }
    
//    public function getArbiterNumber(){
//        $query = "SELECT COUNT(*) AS number FROM wfd_SyndicateDetails WHERE id_wfd_Syndicate = 2 AND rank != 'Moins de 2'";
//        $getNumber = $this->db->query($query);
//        $getArbiterNumber = $getNumber->fetchAll(PDO::FETCH_ASSOC);
//        return $getArbiterNumber;
//    }
//    
//    public function getCephalonNumber(){
//        $query = "SELECT COUNT(*) AS number FROM wfd_SyndicateDetails WHERE id_wfd_Syndicate = 3 AND rank != 'Moins de 2'";
//        $getNumber = $this->db->query($query);
//        $getCephalonNumber = $getNumber->fetchAll(PDO::FETCH_ASSOC);
//        return $getCephalonNumber;
//    }
//    
//    public function getPerrinNumber(){
//        $query = "SELECT COUNT(*) AS number FROM wfd_SyndicateDetails WHERE id_wfd_Syndicate = 4 AND rank != 'Moins de 2'";
//        $getNumber = $this->db->query($query);
//        $getPerrinNumber = $getNumber->fetchAll(PDO::FETCH_ASSOC);
//        return $getPerrinNumber;
//    }
//    
//    public function getVeilNumber(){
//        $query = "SELECT COUNT(*) AS number FROM wfd_SyndicateDetails WHERE id_wfd_Syndicate = 5 AND rank != 'Moins de 2'";
//        $getNumber = $this->db->query($query);
//        $getVeilNumber = $getNumber->fetchAll(PDO::FETCH_ASSOC);
//        return $getVeilNumber;
//    }
//    
//    public function getLokaNumber(){
//        $query = "SELECT COUNT(*) AS number FROM wfd_SyndicateDetails WHERE id_wfd_Syndicate = 6 AND rank != 'Moins de 2'";
//        $getNumber = $this->db->query($query);
//        $getLokaNumber = $getNumber->fetchAll(PDO::FETCH_ASSOC);
//        return $getLokaNumber;
//    }
}
    
