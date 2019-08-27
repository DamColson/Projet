<?php

class Db{
    protected $db;  
    
    //Connexion à la bdd
    
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=warfriends', 'Fireloup', 'fireloupsql');
    }
}

