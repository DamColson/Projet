<?php

class Admin extends Db{
    public $id;
    public $pseudo;
    public $password;
    
    public function __construct(){
         parent::__construct();
    }
    
    public function addAdmins(){
        $query = 'INSERT INTO wfd_Admin(pseudo,password)VALUE(:pseudo,:password)';
        $addAdmin = $this->db->prepare($query);
        $addAdmin->bindValue(':pseudo',$this->pseudo,PDO::PARAM_STR);
        $addAdmin->bindValue(':password',$this->password,PDO::PARAM_STR);
        
        if($addAdmin->execute()):
            return true;
        endif;
    }
    
    public function getInfos() {
        $query = 'SELECT * FROM wfd_Admin WHERE wfd_Admin.pseudo = :pseudo';
        $getAdminInfos = $this->db->prepare($query);
        $getAdminInfos->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $getAdminInfos->execute();

        $getAdminPass = $getAdminInfos->fetchAll(PDO::FETCH_ASSOC);

        return $getAdminPass;
    }
}