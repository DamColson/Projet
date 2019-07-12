<?php

class Users extends Db {

    public $id;
    public $birthday;
    public $warframePseudo;
    public $warfriendsPseudo;
    public $mail;
    public $tagDiscord;
    public $password;
    public $id_Armors;

    
    public function __construct(){
        parent::__construct();
    }
    
    public function addUsers() {
        $query = 'INSERT INTO UsersInfos(warframePseudo,warfriendsPseudo,mail,tagDiscord,password,birthday,id_Armors)VALUE(:warframePseudo,:warfriendsPseudo,:mail,:tagDiscord,:password,:birthday,:id_Armors)';
        $addUser = $this->db->prepare($query);
        $addUser->bindValue(':warframePseudo', $this->warframePseudo, PDO::PARAM_STR);
        $addUser->bindValue(':birthday', $this->birthday, PDO::PARAM_STR);
        $addUser->bindValue(':warfriendsPseudo', $this->warfriendsPseudo, PDO::PARAM_STR);
        $addUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $addUser->bindValue(':tagDiscord', $this->tagDiscord, PDO::PARAM_STR);
        $addUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $addUser->bindValue(':id_Armors', $this->id_Armors, PDO::PARAM_INT);

        if($addUser->execute()):
            return true;
        endif;
    }

    public function updateUsers() {
        
        foreach($_POST as $key=>$value):
            
            if (!empty($_POST[$key]) && $key!='submitFormButton'):
               
                $query = 'UPDATE UsersInfos SET :key = :value WHERE id=:id';
                $updateUser = $this->db->prepare($query);
                $updateUser->bindValue(':value', $value, PDO::PARAM_STR);
                $updateUser->bindValue(':key', $key, PDO::PARAM_STR);
                $updateUser->bindValue(':id', $this->id, PDO::PARAM_INT);

                if ($updateUser->execute()):
                    return true;
                endif;
            endif; 
        endforeach;
        
    }
    

    
    public function getUserIds(){
        $query = 'SELECT UsersInfos.id FROM UsersInfos WHERE UsersInfos.warfriendsPseudo = :pseudo';
        $getUserId = $this->db->prepare($query);
        $getUserId -> bindValue(':pseudo',$this->warfriendsPseudo,PDO::PARAM_STR);
        $getUserId->execute();
        
        $getId = $getUserId->fetchAll(PDO::FETCH_ASSOC);
        $this->id = $getId[0]['id'];
    }
    
    public function getInfos(){
        $query = 'SELECT * FROM UsersInfos WHERE UsersInfos.warfriendsPseudo = :pseudo';
        $getUserInfos = $this->db->prepare($query);
        $getUserInfos->bindValue(':pseudo',$this->warfriendsPseudo,PDO::PARAM_STR);
        $getUserInfos->execute();
        
        $getInfos = $getUserInfos->fetchAll(PDO::FETCH_ASSOC);
        
        return $getInfos;
    }
}
