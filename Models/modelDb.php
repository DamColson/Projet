<?php

//Class Db,classe qui sera une classe parent de toutes les autres classes à venir

class Db{
    
    protected $db;  
    
    //Connexion à la bdd dans le construct, méthode magique appelée automatiquement.
    //Ici le couple try/catch va dans un premier temps tenter de se connecter à la bdd,s'il n'y arrive pas catch renverra un message d'erreur.
    //l'objet PDO créé a comme paramètre de connexion mysql (le type de bdd),
    //localhost (l'adresse),
    //warfriends(le nom de la bdd),
    //Fireloup (le login)
    //et fireloupsql(le password)
    
    public function __construct(){
        try{
        $this->db = new PDO('mysql:host=localhost;dbname=warfriends', 'Fireloup', 'fireloupsql');
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
}

