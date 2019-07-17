<?php

class SyndicateDetails extends Db{
    
    public $id;
    public $rank;
    public $id_UsersInfos;
    public $id_Syndicate;
    
    public function __construct(){
        parent::__construct();
    }
    
    public function updateSyndicateDetails(){
        $selectQuery = 'SELECT COUNT(SyndicateDetails.id) AS count FROM SyndicateDetails WHERE id_UsersInfos = :id_UsersInfos AND id_Syndicate = :id_Syndicate';
        $checkPresence = $this->db->prepare($selectQuery);
        $checkPresence->bindValue(':id_UsersInfos',$this->id_UsersInfos,PDO::PARAM_INT);
        $checkPresence->bindValue(':id_Syndicate',$this->id_Syndicate,PDO::PARAM_INT);
        $checkPresence->execute();
        $entryCount = $checkPresence->fetchAll(PDO::FETCH_ASSOC);
        
        if((int)$entryCount[0]['count'] == 0):
            $query = 'INSERT INTO SyndicateDetails(rank,id_UsersInfos,id_Syndicate)VALUE(:rank,:id_UsersInfos,:id_Syndicate)';
            $addSyndicateDetail = $this->db->prepare($query);
            $addSyndicateDetail->bindValue(':rank',$this->rank,PDO::PARAM_STR);
            $addSyndicateDetail->bindValue(':id_UsersInfos',$this->id_UsersInfos,PDO::PARAM_INT);
            $addSyndicateDetail->bindValue(':id_Syndicate',$this->id_Syndicate,PDO::PARAM_INT);
        
            if($addSyndicateDetail->execute()):
                return true;
            endif;
        elseif($entryCount[0]['count'] == 1):
            $query = 'UPDATE SyndicateDetails SET SyndicateDetails.rank = :rank WHERE id_UsersInfos=:id_UsersInfos AND id_Syndicate=:id_Syndicate';
            $updateSyndicateDetail = $this->db->prepare($query);
            $updateSyndicateDetail->bindValue(':rank',$this->rank, PDO::PARAM_STR);
            $updateSyndicateDetail->bindValue(':id_UsersInfos', $this->id_UsersInfos, PDO::PARAM_INT);
            $updateSyndicateDetail->bindValue(':id_Syndicate', $this->id_Syndicate, PDO::PARAM_INT);

            if ($updateSyndicateDetail->execute()):
                return true;
            endif; 
                
        endif;    
        
    }
    
    public function getSyndicateInfos(){
        $query = 'SELECT SyndicateDetails.rank FROM SyndicateDetails INNER JOIN UsersInfos ON SyndicateDetails.id_UsersInfos = UsersInfos.id WHERE id_UsersInfos = :id_UsersInfos';
        $getSyndicateInfos = $this->db->prepare($query);
        $getSyndicateInfos->bindValue(':id_UsersInfos',(int)$this->id_UsersInfos,PDO::PARAM_INT);
        $getSyndicateInfos->execute();
        
        $getAllInfos = $getSyndicateInfos->fetchAll(PDO::FETCH_ASSOC);
        
        return $getAllInfos;
    }
}
    
