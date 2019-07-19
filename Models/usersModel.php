<?php

class Users extends Db {

    public $id;
    public $birthday;
    public $warframePseudo;
    public $warfriendsPseudo;
    public $mail;
    public $tagDiscord;
    public $password;
    public $id_wfd_Armors;

    
    public function __construct(){
        parent::__construct();
    }
    
    public function addUsers() {
        $query = 'INSERT INTO wfd_UsersInfos(warframePseudo,warfriendsPseudo,mail,tagDiscord,password,birthday,id_wfd_Armors)VALUE(:warframePseudo,:warfriendsPseudo,:mail,:tagDiscord,:password,:birthday,:id_wfd_Armors)';
        $addUser = $this->db->prepare($query);
        $addUser->bindValue(':warframePseudo', $this->warframePseudo, PDO::PARAM_STR);
        $addUser->bindValue(':birthday', $this->birthday, PDO::PARAM_STR);
        $addUser->bindValue(':warfriendsPseudo', $this->warfriendsPseudo, PDO::PARAM_STR);
        $addUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $addUser->bindValue(':tagDiscord', $this->tagDiscord, PDO::PARAM_STR);
        $addUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $addUser->bindValue(':id_wfd_Armors', $this->id_wfd_Armors, PDO::PARAM_INT);

        if($addUser->execute()):
            return true;
        endif;
    }

    public function updateUsersPassword() {
                $query = 'UPDATE wfd_UsersInfos SET password = :password WHERE id=:id';
                $updatePassword = $this->db->prepare($query);
                $updatePassword->bindValue(':password',$this->password, PDO::PARAM_STR);
                $updatePassword->bindValue(':id', $this->id, PDO::PARAM_INT);

                if ($updatePassword->execute()):
                    return true;
                endif;    
    }
    
    public function updateUsersDiscordTags() {
                $query = 'UPDATE wfd_UsersInfos SET tagDiscord = :discord WHERE id=:id';
                $updateDiscord = $this->db->prepare($query);
                $updateDiscord->bindValue(':discord',$this->tagDiscord, PDO::PARAM_STR);
                $updateDiscord->bindValue(':id', $this->id, PDO::PARAM_INT);

                if ($updateDiscord->execute()):
                    return true;
                endif;    
    }
    
    public function updateUsersWarfriendsPseudos() {
                $query = 'UPDATE wfd_UsersInfos SET warfriendsPseudo = :warfriendsPseudo WHERE id=:id';
                $updateWarfriendsPseudo = $this->db->prepare($query);
                $updateWarfriendsPseudo->bindValue(':warfriendsPseudo',$this->warfriendsPseudo, PDO::PARAM_STR);
                $updateWarfriendsPseudo->bindValue(':id', $this->id, PDO::PARAM_INT);

                if ($updateWarfriendsPseudo->execute()):
                    return true;
                endif;    
    }
    
    public function updateUsersWarframePseudos() {
                $query = 'UPDATE wfd_UsersInfos SET warframePseudo = :warframePseudo WHERE id=:id';
                $updateWarframePseudo = $this->db->prepare($query);
                $updateWarframePseudo->bindValue(':warframePseudo',$this->warframePseudo, PDO::PARAM_STR);
                $updateWarframePseudo->bindValue(':id', $this->id, PDO::PARAM_INT);

                if ($updateWarframePseudo->execute()):
                    return true;
                endif;    
    }
    
    public function updateUsersMails() {
                $query = 'UPDATE wfd_UsersInfos SET mail = :mail WHERE id=:id';
                $updateMail = $this->db->prepare($query);
                $updateMail->bindValue(':mail',$this->mail, PDO::PARAM_STR);
                $updateMail->bindValue(':id', $this->id, PDO::PARAM_INT);

                if ($updateMail->execute()):
                    return true;
                endif;    
    }
    
    public function updateUsersFavArmors() {
                $query = 'UPDATE wfd_UsersInfos SET id_wfd_Armors = :favArmor WHERE id=:id';
                $updateFavArmor = $this->db->prepare($query);
                $updateFavArmor->bindValue(':favArmor',$this->id_wfd_Armors, PDO::PARAM_INT);
                $updateFavArmor->bindValue(':id', $this->id, PDO::PARAM_INT);

                if ($updateFavArmor->execute()):
                    return true;
                endif;    
    }
    
    public function getUserIds(){
        $query = 'SELECT wfd_UsersInfos.id FROM wfd_UsersInfos WHERE wfd_UsersInfos.warfriendsPseudo = :pseudo';
        $getUserId = $this->db->prepare($query);
        $getUserId -> bindValue(':pseudo',$this->warfriendsPseudo,PDO::PARAM_STR);
        $getUserId->execute();
        
        $getId = $getUserId->fetchAll(PDO::FETCH_ASSOC);
        $this->id = $getId[0]['id'];
    }
    
    public function getInfos(){
        $query = 'SELECT * FROM wfd_UsersInfos WHERE wfd_UsersInfos.warfriendsPseudo = :pseudo';
        $getUserInfos = $this->db->prepare($query);
        $getUserInfos->bindValue(':pseudo',$this->warfriendsPseudo,PDO::PARAM_STR);
        $getUserInfos->execute();
        
        $getInfos = $getUserInfos->fetchAll(PDO::FETCH_ASSOC);
        
        return $getInfos;
    }
    
    public function deleteUsers(){
        $query = 'DELETE FROM wfd_UsersInfos WHERE wfd_UsersInfos.id=:id';
        $deleteUser = $this->db->prepare($query);
        $deleteUser->bindValue(':id',$this->id,PDO::PARAM_INT);
        
        if ($deleteUser->execute()):
                    return true;
        endif;
    }
    
    public function getLastFive(){
        $query = "SELECT wfd_UsersInfos.id,wfd_UsersInfos.warfriendsPseudo FROM wfd_SyndicateDetails INNER JOIN wfd_Syndicate ON wfd_Syndicate.id = wfd_SyndicateDetails.id_wfd_Syndicate INNER JOIN wfd_UsersInfos ON wfd_UsersInfos.id = wfd_SyndicateDetails.id_wfd_UsersInfos WHERE wfd_SyndicateDetails.id_wfd_UsersInfos = wfd_UsersInfos.id AND wfd_Syndicate.id = 1 ORDER BY wfd_UsersInfos.id DESC LIMIT 5";
        
        $getLastFive = $this->db->prepare($query);
        $getLastFive->execute();
        
        $lastFive = $getLastFive->fetchAll(PDO::FETCH_ASSOC);
        
        return $lastFive;
    }
    
    public function getLastFivesRanks(){
        try{
        $query = "SELECT wfd_Syndicate.name AS name,wfd_Syndicate.image AS image,wfd_SyndicateDetails.rank AS rank FROM wfd_Syndicate INNER JOIN wfd_SyndicateDetails ON wfd_SyndicateDetails.id_wfd_Syndicate = wfd_Syndicate.id INNER JOIN wfd_UsersInfos ON wfd_SyndicateDetails.id_wfd_UsersInfos = wfd_UsersInfos.id WHERE wfd_UsersInfos.id = :wfd_UsersInfosId AND wfd_SyndicateDetails.rank != '<2'";
        
//        $getLastFivesRank = $this->db->prepare($query);
        $getLastFivesRank = $this->db->prepare($query);

        $getLastFivesRank->bindValue(':wfd_UsersInfosId',$this->id,PDO::PARAM_INT);
        
        if($getLastFivesRank->execute()):        
            $lastFivesRank = $getLastFivesRank->fetchAll(PDO::FETCH_ASSOC);
            return $lastFivesRank;
        endif;
    }catch(PDOException $error){
        $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
        die($msg);
    }
    }
}
