<?php

class Db{
    protected $db;  
    
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=warfriends', 'Fireloup', 'fireloupsql');
    }
}

