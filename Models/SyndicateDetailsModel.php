<?php

class SyndicateDetails extends Db{
    
    public $id;
    public $validrank;
    public $rank;
    
    public function __construct(){
        
    }
    
    public function addSyndicateDetails(){
        $query = 'INSERT INTO SyndicateDetails(validRank,rank)VALUE(:validRank,:rank)';
        $addSyndicateDetail = $this->db->prepare($query);
        $addSyndicateDetail->bindValue(':validRank',$this->validRank,PDO::PARAM_STR);
        $addSyndicateDetail->bindValue(':rank',$this->rank,PDO::PARAM_STR);
        
        if($addSyndicateDetail->execute()):
            return true;
        endif;
    }
}
