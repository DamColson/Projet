<?php

//Création d'une classe Users dont le parent est Db qui représente la table usersInfos.

class Users extends Db {
    
    //Attributs publique,accessible partout.
    
    public $id;
    public $birthday;
    public $warframePseudo;
    public $warfriendsPseudo;
    public $mail;
    public $tagDiscord;
    public $password;
    public $id_wfd_Armors;
    public $search;
    public $showDiscord;
    public $showMail;
    
    //Construct qui recupere le construct de son parent Db
    
    public function __construct() {
        parent::__construct();
    }
    
    //Méthode qui ajoute un utilisateur et ses infos à la bdd
    
    public function addUsers() {
        try{
        $query = 'INSERT INTO wfd_UsersInfos(warframePseudo,warfriendsPseudo,mail,tagDiscord,password,birthday,id_wfd_Armors,showDiscord,showMail)VALUE(:warframePseudo,:warfriendsPseudo,:mail,:tagDiscord,:password,:birthday,:id_wfd_Armors,:showDiscord,:showMail)';
        $addUser = $this->db->prepare($query);
        $addUser->bindValue(':warframePseudo', $this->warframePseudo, PDO::PARAM_STR);
        $addUser->bindValue(':birthday', $this->birthday, PDO::PARAM_STR);
        $addUser->bindValue(':warfriendsPseudo', $this->warfriendsPseudo, PDO::PARAM_STR);
        $addUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $addUser->bindValue(':tagDiscord', $this->tagDiscord, PDO::PARAM_STR);
        $addUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $addUser->bindValue(':id_wfd_Armors', $this->id_wfd_Armors, PDO::PARAM_INT);
        $addUser->bindValue(':showDiscord', $this->showDiscord, PDO::PARAM_STR);
        $addUser->bindValue(':showMail', $this->showMail, PDO::PARAM_STR);

        if ($addUser->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui update le password d'un utilisateur en fonction de son id
    
    public function updateUsersPassword() {
        try{
        $query = 'UPDATE wfd_UsersInfos SET password = :password WHERE id=:id';
        $updatePassword = $this->db->prepare($query);
        $updatePassword->bindValue(':password', $this->password, PDO::PARAM_STR);
        $updatePassword->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($updatePassword->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui update le tag discord d'un utilisateur en fonction de son id
    
    public function updateUsersDiscordTags() {
        try{
        $query = 'UPDATE wfd_UsersInfos SET tagDiscord = :discord WHERE id=:id';
        $updateDiscord = $this->db->prepare($query);
        $updateDiscord->bindValue(':discord', $this->tagDiscord, PDO::PARAM_STR);
        $updateDiscord->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($updateDiscord->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui update le pseudo d'un utilisateur en fonction de son id
    
    public function updateUsersWarfriendsPseudos() {
        try{
        $query = 'UPDATE wfd_UsersInfos SET warfriendsPseudo = :warfriendsPseudo WHERE id=:id';
        $updateWarfriendsPseudo = $this->db->prepare($query);
        $updateWarfriendsPseudo->bindValue(':warfriendsPseudo', $this->warfriendsPseudo, PDO::PARAM_STR);
        $updateWarfriendsPseudo->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($updateWarfriendsPseudo->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui update le pseudo Warframe d'un utilisateur en fonction de son id
    
    public function updateUsersWarframePseudos() {
        try{
        $query = 'UPDATE wfd_UsersInfos SET warframePseudo = :warframePseudo WHERE id=:id';
        $updateWarframePseudo = $this->db->prepare($query);
        $updateWarframePseudo->bindValue(':warframePseudo', $this->warframePseudo, PDO::PARAM_STR);
        $updateWarframePseudo->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($updateWarframePseudo->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui update le mail d'un utilisateur en fonction de son id
    
    public function updateUsersMails() {
        try{
        $query = 'UPDATE wfd_UsersInfos SET mail = :mail WHERE id=:id';
        $updateMail = $this->db->prepare($query);
        $updateMail->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $updateMail->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($updateMail->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui update la frame favorite d'un utilisateur en fonction de son id
    
    public function updateUsersFavArmors() {
        try{
        $query = 'UPDATE wfd_UsersInfos SET id_wfd_Armors = :favArmor WHERE id=:id';
        $updateFavArmor = $this->db->prepare($query);
        $updateFavArmor->bindValue(':favArmor', $this->id_wfd_Armors, PDO::PARAM_INT);
        $updateFavArmor->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($updateFavArmor->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui update la visibilité du tag discord d'un utilisateur en fonction de son id
    
    public function updateShowDiscord() {
        try{
        $query = 'UPDATE wfd_UsersInfos SET showDiscord = :showDiscord WHERE id=:id';
        $updateShowDiscord = $this->db->prepare($query);
        $updateShowDiscord->bindValue(':showDiscord', $this->showDiscord, PDO::PARAM_STR);
        $updateShowDiscord->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($updateShowDiscord->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui update la visibilité du mail d'un utilisateur en fonction de son id
    
    public function updateShowMail() {
        try{
        $query = 'UPDATE wfd_UsersInfos SET showMail = :showMail WHERE id=:id';
        $updateShowMail = $this->db->prepare($query);
        $updateShowMail->bindValue(':showMail', $this->showMail, PDO::PARAM_STR);
        $updateShowMail->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($updateShowMail->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }

    public function getUserIds() {
        $query = 'SELECT wfd_UsersInfos.id FROM wfd_UsersInfos WHERE wfd_UsersInfos.warfriendsPseudo = :pseudo';
        $getUserId = $this->db->prepare($query);
        $getUserId->bindValue(':pseudo', $this->warfriendsPseudo, PDO::PARAM_STR);
        $getUserId->execute();

        $getId = $getUserId->fetchAll(PDO::FETCH_ASSOC);
        $this->id = $getId[0]['id'];
    }
    
    //Méthode qui recupère les infos d'un utilisateur en fonction de son pseudo Warfriends
    
    public function getInfos() {
        try{
        $query = 'SELECT * FROM wfd_UsersInfos WHERE wfd_UsersInfos.warfriendsPseudo = :pseudo';
        $getUserInfos = $this->db->prepare($query);
        $getUserInfos->bindValue(':pseudo', $this->warfriendsPseudo, PDO::PARAM_STR);
        
        if($getUserInfos->execute()):
            
            $getInfos = $getUserInfos->fetchAll(PDO::FETCH_ASSOC);
       
            $this->id = $getInfos[0]['id'];
            $this->warfriendsPseudo = $getInfos[0]['warfriendsPseudo'];
            $this->warframePseudo = $getInfos[0]['warframePseudo'];
            $this->birthday = $getInfos[0]['birthday'];
            $this->mail = $getInfos[0]['mail'];
            $this->tagDiscord = $getInfos[0]['tagDiscord'];
            $this->id_wfd_Armors = $getInfos[0]['id_wfd_Armors'];
            
            return $getInfos;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }       
    }
    
    //Méthode qui supprime un utilisateurs de la bdd
    
    public function deleteUsers() {
        try{
        $query = 'DELETE FROM wfd_UsersInfos WHERE wfd_UsersInfos.id=:id';
        $deleteUser = $this->db->prepare($query);
        $deleteUser->bindValue(':id', $this->id, PDO::PARAM_INT);

        if ($deleteUser->execute()):
            return true;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui retourne les 12 derniers utilisateurs ajoutés à la bdd
    
    public function getLastTwelve() {
        try{
        $query = "SELECT wfd_UsersInfos.showDiscord,wfd_UsersInfos.showMail,wfd_UsersInfos.mail,wfd_UsersInfos.tagDiscord,wfd_UsersInfos.id,wfd_UsersInfos.warfriendsPseudo FROM wfd_SyndicateDetails INNER JOIN wfd_Syndicate ON wfd_Syndicate.id = wfd_SyndicateDetails.id_wfd_Syndicate INNER JOIN wfd_UsersInfos ON wfd_UsersInfos.id = wfd_SyndicateDetails.id_wfd_UsersInfos WHERE wfd_SyndicateDetails.id_wfd_UsersInfos = wfd_UsersInfos.id AND wfd_Syndicate.id = 1 ORDER BY wfd_UsersInfos.id DESC LIMIT 6";

        $getLastTwelve = $this->db->prepare($query);
        $getLastTwelve->execute();

        $lastTwelve = $getLastTwelve->fetchAll(PDO::FETCH_ASSOC);

        return $lastTwelve;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui retourne les rank des syndicats des 12 derniers utilisateurs ajoutés à la bdd
    
    public function getLastTwelvesRanks() {
        try {
            $query = "SELECT wfd_Syndicate.name AS name,wfd_Syndicate.image AS image,wfd_SyndicateDetails.rank AS rank FROM wfd_Syndicate INNER JOIN wfd_SyndicateDetails ON wfd_SyndicateDetails.id_wfd_Syndicate = wfd_Syndicate.id INNER JOIN wfd_UsersInfos ON wfd_SyndicateDetails.id_wfd_UsersInfos = wfd_UsersInfos.id WHERE wfd_UsersInfos.id = :wfd_UsersInfosId AND wfd_SyndicateDetails.rank != 'Moins de 2' ORDER BY wfd_SyndicateDetails.rank DESC";

            $getLastTwelvesRank = $this->db->prepare($query);
            $getLastTwelvesRank->bindValue(':wfd_UsersInfosId', $this->id, PDO::PARAM_INT);

            if ($getLastTwelvesRank->execute()):
                $lastTwelvesRank = $getLastTwelvesRank->fetchAll(PDO::FETCH_ASSOC);
                return $lastTwelvesRank;
            endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui renvoie le résultat d'une recherche (input et/ou checkbox ) + pagination des résultats
    
    public function research() {
        try {
            $query = "SELECT wfd_UsersInfos.showDiscord,wfd_UsersInfos.showMail,wfd_UsersInfos.mail,wfd_UsersInfos.tagDiscord,wfd_UsersInfos.id, wfd_UsersInfos.warfriendsPseudo FROM wfd_Syndicate INNER JOIN wfd_SyndicateDetails ON wfd_SyndicateDetails.id_wfd_Syndicate = wfd_Syndicate.id INNER JOIN wfd_UsersInfos ON wfd_SyndicateDetails.id_wfd_UsersInfos = wfd_UsersInfos.id WHERE (wfd_Syndicate.name LIKE :search OR wfd_UsersInfos.warfriendsPseudo LIKE :search OR wfd_Syndicate.name = :meridian OR wfd_Syndicate.name = :arbiter OR wfd_Syndicate.name = :cephalon OR wfd_Syndicate.name = :perrin OR wfd_Syndicate.name = :redVeil OR wfd_Syndicate.name = :loka) AND wfd_SyndicateDetails.rank != 'Moins de 2' GROUP BY wfd_UsersInfos.id LIMIT :warfriendsPerPage OFFSET :start";

            $search = $this->db->prepare($query);

            if (!empty($_GET['searchBar'])):
                $searchVal = '%' . $this->search . '%';
            elseif (empty($_GET['searchBar'])):
                $searchVal = NULL;
            endif;

            $warfriendsPerPage = 6;
            $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;

            $start = ($page - 1) * $warfriendsPerPage;


            $search->bindValue(':search', $searchVal, PDO::PARAM_STR);
            $search->bindValue(':start', $start, PDO::PARAM_INT);
            $search->bindValue(':warfriendsPerPage', $warfriendsPerPage, PDO::PARAM_INT);

            if (!empty($_GET['meridianCheckbox'])):
                $search->bindValue(':meridian', $_GET['meridianCheckbox'], PDO::PARAM_STR);
            elseif (empty($_GET['meridianCheckbox'])):
                $search->bindValue(':meridian', NULL, PDO::PARAM_STR);
            endif;

            if (!empty($_GET['arbiterCheckbox'])):
                $search->bindValue(':arbiter', $_GET['arbiterCheckbox'], PDO::PARAM_STR);
            elseif (empty($_GET['arbiterCheckbox'])):
                $search->bindValue(':arbiter', NULL, PDO::PARAM_STR);
            endif;

            if (!empty($_GET['cephalonCheckbox'])):
                $search->bindValue(':cephalon', $_GET['cephalonCheckbox'], PDO::PARAM_STR);
            elseif (empty($_GET['cephalonCheckbox'])):
                $search->bindValue(':cephalon', NULL, PDO::PARAM_STR);
            endif;

            if (!empty($_GET['perrinCheckbox'])):
                $search->bindValue(':perrin', $_GET['perrinCheckbox'], PDO::PARAM_STR);
            elseif (empty($_GET['perrinCheckbox'])):
                $search->bindValue(':perrin', NULL, PDO::PARAM_STR);
            endif;

            if (!empty($_GET['redVeilCheckbox'])):
                $search->bindValue(':redVeil', $_GET['redVeilCheckbox'], PDO::PARAM_STR);
            elseif (empty($_GET['redVeilCheckbox'])):
                $search->bindValue(':redVeil', NULL, PDO::PARAM_STR);
            endif;

            if (!empty($_GET['lokaCheckbox'])):
                $search->bindValue(':loka', $_GET['lokaCheckbox'], PDO::PARAM_STR);
            elseif (empty($_GET['lokaCheckbox'])):
                $search->bindValue(':loka', NULL, PDO::PARAM_STR);
            endif;

            if ($search->execute()):
                $searchResult = $search->fetchAll(PDO::FETCH_ASSOC);
                return $searchResult;
            endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui renvoie les infos des syndicats dont les rangs 
    //sont supérieurs ou égal à 2 pour un utilisateur donné ( en fonction de son id )
    
    public function getRanks() {
        try {
            $query = "SELECT wfd_Syndicate.name AS name,wfd_Syndicate.image AS image,wfd_SyndicateDetails.rank AS rank FROM wfd_Syndicate INNER JOIN wfd_SyndicateDetails ON wfd_SyndicateDetails.id_wfd_Syndicate = wfd_Syndicate.id INNER JOIN wfd_UsersInfos ON wfd_SyndicateDetails.id_wfd_UsersInfos = wfd_UsersInfos.id WHERE wfd_UsersInfos.id = :wfd_UsersInfosId AND wfd_SyndicateDetails.rank != 'Moins de 2' ORDER BY wfd_SyndicateDetails.rank DESC";


            $getLastTwelvesRank = $this->db->prepare($query);

            $getLastTwelvesRank->bindValue(':wfd_UsersInfosId', $this->id, PDO::PARAM_INT);

            if ($getLastTwelvesRank->execute()):
                $lastTwelvesRank = $getLastTwelvesRank->fetchAll(PDO::FETCH_ASSOC);
                return $lastTwelvesRank;
            endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui renvoie un tableau contenant tout les utilisateurs correspondant au résultat de la recherche, chaque utilisateur n'apparaissant qu'une fois, 
    //utilisé ensuite pour obtenir la taille du tableau en question ce qui permet d'obtenir le nombre total d'utilisateur correspondant à la recherche, 
    //utilisé pour la pagination.
    
    public function researchCount() {
        try {
            $query = "SELECT wfd_UsersInfos.id, wfd_UsersInfos.warfriendsPseudo FROM wfd_Syndicate INNER JOIN wfd_SyndicateDetails ON wfd_SyndicateDetails.id_wfd_Syndicate = wfd_Syndicate.id INNER JOIN wfd_UsersInfos ON wfd_SyndicateDetails.id_wfd_UsersInfos = wfd_UsersInfos.id WHERE (wfd_Syndicate.name LIKE :search OR wfd_UsersInfos.warfriendsPseudo LIKE :search OR wfd_Syndicate.name = :meridian OR wfd_Syndicate.name = :arbiter OR wfd_Syndicate.name = :cephalon OR wfd_Syndicate.name = :perrin OR wfd_Syndicate.name = :redVeil OR wfd_Syndicate.name = :loka) AND wfd_SyndicateDetails.rank != 'Moins de 2' GROUP BY wfd_UsersInfos.id";

            $search = $this->db->prepare($query);

            if (!empty($_GET['searchBar'])):
                $searchVal = '%' . $this->search . '%';
            elseif (empty($_GET['searchBar'])):
                $searchVal = NULL;
            endif;

            $search->bindValue(':search', $searchVal, PDO::PARAM_STR);

            if (!empty($_GET['meridianCheckbox'])):
                $search->bindValue(':meridian', $_GET['meridianCheckbox'], PDO::PARAM_STR);
            elseif (empty($_GET['meridianCheckbox'])):
                $search->bindValue(':meridian', NULL, PDO::PARAM_STR);
            endif;

            if (!empty($_GET['arbiterCheckbox'])):
                $search->bindValue(':arbiter', $_GET['arbiterCheckbox'], PDO::PARAM_STR);
            elseif (empty($_GET['arbiterCheckbox'])):
                $search->bindValue(':arbiter', NULL, PDO::PARAM_STR);
            endif;

            if (!empty($_GET['cephalonCheckbox'])):
                $search->bindValue(':cephalon', $_GET['cephalonCheckbox'], PDO::PARAM_STR);
            elseif (empty($_GET['cephalonCheckbox'])):
                $search->bindValue(':cephalon', NULL, PDO::PARAM_STR);
            endif;

            if (!empty($_GET['perrinCheckbox'])):
                $search->bindValue(':perrin', $_GET['perrinCheckbox'], PDO::PARAM_STR);
            elseif (empty($_GET['perrinCheckbox'])):
                $search->bindValue(':perrin', NULL, PDO::PARAM_STR);
            endif;

            if (!empty($_GET['redVeilCheckbox'])):
                $search->bindValue(':redVeil', $_GET['redVeilCheckbox'], PDO::PARAM_STR);
            elseif (empty($_GET['redVeilCheckbox'])):
                $search->bindValue(':redVeil', NULL, PDO::PARAM_STR);
            endif;

            if (!empty($_GET['lokaCheckbox'])):
                $search->bindValue(':loka', $_GET['lokaCheckbox'], PDO::PARAM_STR);
            elseif (empty($_GET['lokaCheckbox'])):
                $search->bindValue(':loka', NULL, PDO::PARAM_STR);
            endif;

            if ($search->execute()):
                $searchResult = $search->fetchAll(PDO::FETCH_ASSOC);
                return $searchResult;
            endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui vérifie lors de l'inscription si le pseudo Warfriends est déjà présent ou non dans la bdd, ce dernier devant être unique
    
    public function checkPseudoPresence() {
        try{
        $query = 'SELECT COUNT(wfd_UsersInfos.id) AS pseudoPresence FROM wfd_UsersInfos WHERE wfd_UsersInfos.warfriendsPseudo = :pseudo';

        $checkPseudo = $this->db->prepare($query);
        $checkPseudo->bindValue(':pseudo', $this->warfriendsPseudo, PDO::PARAM_STR);

        if ($checkPseudo->execute()):
            $checkPseudoPresence = $checkPseudo->fetchAll(PDO::FETCH_ASSOC);
            return $checkPseudoPresence;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui vérifie lors de l'inscription si le tag discord est déjà présent ou non dans la bdd, ce dernier devant être unique
    
    public function checkDiscordPresence() {
        try{
        $query = 'SELECT COUNT(wfd_UsersInfos.id) AS discordPresence FROM wfd_UsersInfos WHERE wfd_UsersInfos.tagDiscord = :discord';

        $checkDiscord = $this->db->prepare($query);
        $checkDiscord->bindValue(':discord', $this->tagDiscord, PDO::PARAM_STR);

        if ($checkDiscord->execute()):
            $checkDiscordPresence = $checkDiscord->fetchAll(PDO::FETCH_ASSOC);
            return $checkDiscordPresence;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui vérifie lors de l'inscription si le mail est déjà présent ou non dans la bdd, ce dernier devant être unique
    
    public function checkMailPresence() {
        try{
        $query = 'SELECT COUNT(wfd_UsersInfos.id) AS mailPresence FROM wfd_UsersInfos WHERE wfd_UsersInfos.mail = :mail';

        $checkMail = $this->db->prepare($query);
        $checkMail->bindValue(':mail', $this->mail, PDO::PARAM_STR);

        if ($checkMail->execute()):
            $checkMailPresence = $checkMail->fetchAll(PDO::FETCH_ASSOC);
            return $checkMailPresence;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui retourne un tableau contenant la totalité des utilisateurs
    
    public function getAllUsers() {
        try{
        $query = 'SELECT * FROM wfd_UsersInfos';
        $getUsers = $this->db->query($query);
        $getAllUsers = $getUsers->fetchAll(PDO::FETCH_ASSOC);
        return $getAllUsers;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui renvoie les infos d'un utilisateur en fonction de son id
    
    public function getInfosById() {
        try{
        $query = 'SELECT * FROM wfd_UsersInfos WHERE wfd_UsersInfos.id = :id';
        $getUserInfosById = $this->db->prepare($query);
        $getUserInfosById->bindValue(':id', $this->id, PDO::PARAM_INT);


        if ($getUserInfosById->execute()):
            
            $getInfosById = $getUserInfosById->fetchAll(PDO::FETCH_ASSOC);
            $this->id = $getInfosById[0]['id'];
            $this->warfriendsPseudo = $getInfosById[0]['warfriendsPseudo'];
            $this->warframePseudo = $getInfosById[0]['warframePseudo'];
            $this->birthday = $getInfosById[0]['birthday'];
            $this->mail = $getInfosById[0]['mail'];
            $this->tagDiscord = $getInfosById[0]['tagDiscord'];
            $this->id_wfd_Armors = $getInfosById[0]['id_wfd_Armors'];

            return $getInfosById;
        endif;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui renvoie les entrées 7 à 12 de la bdd en partant de la fin
    
    public function getLastSixOffsetSix() {
        try{
        $query = "SELECT wfd_UsersInfos.id,wfd_UsersInfos.warfriendsPseudo FROM wfd_SyndicateDetails INNER JOIN wfd_Syndicate ON wfd_Syndicate.id = wfd_SyndicateDetails.id_wfd_Syndicate INNER JOIN wfd_UsersInfos ON wfd_UsersInfos.id = wfd_SyndicateDetails.id_wfd_UsersInfos WHERE wfd_SyndicateDetails.id_wfd_UsersInfos = wfd_UsersInfos.id AND wfd_Syndicate.id = 1 ORDER BY wfd_UsersInfos.id DESC LIMIT 6 OFFSET 6";

        $getLastSixOffsetSix = $this->db->query($query);

        $lastSixOffsetSix = $getLastSixOffsetSix->fetchAll(PDO::FETCH_ASSOC);

        return $lastSixOffsetSix;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui renvoie le nombre d'utilisateur présent dans la bdd
    
    public function getUsersNumber(){
        try{
        $query = 'SELECT COUNT(wfd_UsersInfos.id) AS number FROM wfd_UsersInfos';
        $getNumber = $this->db->query($query);
        $getUsersNumber = $getNumber->fetchAll(PDO::FETCH_ASSOC);
        return $getUsersNumber;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    //Méthode qui renvoie le nombre de frame différentes choisies par les utilisateurs ( ne compte pas les doublons )
    
    public function getDistinctFavNumber(){
        try{
        $query = 'SELECT COUNT(DISTINCT id_wfd_Armors) AS number from wfd_UsersInfos';
        $getNumber = $this->db->query($query);
        $getFavNumber = $getNumber->fetchAll(PDO::FETCH_ASSOC);
        return $getFavNumber;
        } catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
    
    public function syndicateCount(){
        try{
            $query = 'SELECT count(wfd_SyndicateDetails.rank) AS count FROM wfd_SyndicateDetails INNER JOIN wfd_UsersInfos ON wfd_UsersInfos.id = wfd_SyndicateDetails.id_wfd_UsersInfos WHERE wfd_UsersInfos.id = :id';
            $getCount = $this->db->prepare($query);
            $getCount->bindvalue(':id',$this->id,PDO::PARAM_INT);
            if($getCount->execute()):
                $getSyndicateCount = $getCount->fetchAll(PDO::FETCH_ASSOC);
                return $getSyndicateCount;
            endif;
        }catch (PDOException $error) {
            $msg = 'ERREUR PDO within ' . $error->getFile() . 'L.' . $error->getLine() . ' : ' . $error->getMessage();
            die($msg);
        }
    }
}

