<?php

class Admin extends Db{
    
    //Atributs
    
    public $id;
    public $pseudo;
    public $password;
    
    //construct recupere le construct du parent Db
    
    public function __construct(){
         parent::__construct();
    }
    
    //Méthode d'insertion d'admin dans la bdd
    
    public function addAdmins(){
        try{
        $query = 'INSERT INTO wfd_Admin(pseudo,password)VALUE(:pseudo,:password)';
        $addAdmin = $this->db->prepare($query);
        $addAdmin->bindValue(':pseudo',$this->pseudo,PDO::PARAM_STR);
        $addAdmin->bindValue(':password',$this->password,PDO::PARAM_STR);
        
        if($addAdmin->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode pour récupérer les infos d'un admin en fonction de son pseudo
    
    public function getInfos() {
        try{
        $query = 'SELECT * FROM wfd_Admin WHERE wfd_Admin.pseudo = :pseudo';
        $getAdminInfos = $this->db->prepare($query);
        $getAdminInfos->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $getAdminInfos->execute();

        $getAdminPass = $getAdminInfos->fetchAll(PDO::FETCH_ASSOC);

        return $getAdminPass;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode pour modifier le password d'un admin
    
    public function updateAdminPassword() {
        try{
        $query = 'UPDATE wfd_Admins SET password = :password WHERE Admin.pseudo=:pseudo';
        $updatePassword = $this->db->prepare($query);
        $updatePassword->bindValue(':password', $this->password, PDO::PARAM_STR);
        $updatePassword->bindValue(':pseudo', $this->name, PDO::PARAM_INT);

        if ($updatePassword->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
}