#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Armors
#------------------------------------------------------------

CREATE TABLE Armors(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (100) NOT NULL ,
        url  Varchar (200) NOT NULL
	,CONSTRAINT Armors_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Syndicate
#------------------------------------------------------------

CREATE TABLE Syndicate(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (200) NOT NULL
	,CONSTRAINT Syndicate_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: UsersInfos
#------------------------------------------------------------

CREATE TABLE UsersInfos(
        id               Int  Auto_increment  NOT NULL ,
        warframePseudo   Varchar (50) NOT NULL ,
        warfriendsPseudo Varchar (50) NOT NULL ,
        mail             Varchar (150) NOT NULL ,
        tagDiscord       Varchar (20) ,
        password         Varchar (200) NOT NULL ,
        birthday         Date NOT NULL ,
        id_Armors        Int NOT NULL
	,CONSTRAINT UsersInfos_PK PRIMARY KEY (id)

	,CONSTRAINT UsersInfos_Armors_FK FOREIGN KEY (id_Armors) REFERENCES Armors(id) 
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: SyndicateDetails
#------------------------------------------------------------

CREATE TABLE SyndicateDetails(
        id            Int  Auto_increment  NOT NULL ,
        rank          Varchar (50) ,
        id_UsersInfos Int NOT NULL ,
        id_Syndicate  Int NOT NULL
	,CONSTRAINT SyndicateDetails_PK PRIMARY KEY (id)

	,CONSTRAINT SyndicateDetails_UsersInfos_FK FOREIGN KEY (id_UsersInfos) REFERENCES UsersInfos(id) ON DELETE CASCADE
	,CONSTRAINT SyndicateDetails_Syndicate0_FK FOREIGN KEY (id_Syndicate) REFERENCES Syndicate(id) ON DELETE CASCADE
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Admin
#------------------------------------------------------------

CREATE TABLE Admin(
        id       Int  Auto_increment  NOT NULL ,
        pseudo   Varchar (50) NOT NULL ,
        password Varchar (500) NOT NULL
	,CONSTRAINT Admin_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sender
#------------------------------------------------------------

CREATE TABLE sender(
        id            Int  Auto_increment  NOT NULL ,
        id_UsersInfos Int
	,CONSTRAINT sender_PK PRIMARY KEY (id)

	,CONSTRAINT sender_UsersInfos_FK FOREIGN KEY (id_UsersInfos) REFERENCES UsersInfos(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: recipient
#------------------------------------------------------------

CREATE TABLE recipient(
        id            Int  Auto_increment  NOT NULL ,
        id_UsersInfos Int
	,CONSTRAINT recipient_PK PRIMARY KEY (id)

	,CONSTRAINT recipient_UsersInfos_FK FOREIGN KEY (id_UsersInfos) REFERENCES UsersInfos(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Message
#------------------------------------------------------------

CREATE TABLE Message(
        id           Int  Auto_increment  NOT NULL ,
        date         Datetime NOT NULL ,
        title        Varchar (200) NOT NULL ,
        message      Varchar (2000) NOT NULL ,
        id_sender    Int ,
        id_recipient Int
	,CONSTRAINT Message_PK PRIMARY KEY (id)

	,CONSTRAINT Message_sender_FK FOREIGN KEY (id_sender) REFERENCES sender(id)
	,CONSTRAINT Message_recipient0_FK FOREIGN KEY (id_recipient) REFERENCES recipient(id)
)ENGINE=InnoDB;

