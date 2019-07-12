<?php

class Message{
    public $id;
    public $date;
    public $title;
    public $message;
    public $read;
    public $id_sender;
    public $id_recipient;
    
    public function __construct(){
        
    }
    
    public function addMessages(){
        $query = 'INSERT INTO Message(date,title,message,read,id_sender,id_recipient)VALUE(:date,:title,:message,:read,:id_sender,:id_recipient)';
        $addMessage = $this->db->prepare($query);
        $addMessage->bindValue(':date',$this->date,PDO::PARAM_STR);
        $addMessage->bindValue(':title',$this->title,PDO::PARAM_STR);
        $addMessage->bindValue(':message',$this->message,PDO::PARAM_STR);
        $addMessage->bindValue(':read',$this->read,PDO::PARAM_BOOL);
        $addMessage->bindValue(':id_sender',$this->id_sender,PDO::PARAM_INT);
        $addMessage->bindValue(':id_recipient',$this->id_recipient,PDO::PARAM_INT);
        
        if($addMessage->execute()):
            return true;
        endif;
    }
}