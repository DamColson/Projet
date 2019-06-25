#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Armors
#------------------------------------------------------------

CREATE TABLE Armors(
        id   Int  Auto_increment  NOT NULL ,
        Name Varchar (100) NOT NULL ,
        Url  Varchar (200) NOT NULL
	,CONSTRAINT Armors_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Syndicate
#------------------------------------------------------------

CREATE TABLE Syndicate(
        id   Int  Auto_increment  NOT NULL ,
        Name Varchar (200) NOT NULL
	,CONSTRAINT Syndicate_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: UsersInfos
#------------------------------------------------------------

CREATE TABLE UsersInfos(
        id               Int  Auto_increment  NOT NULL ,
        WarframePseudo   Varchar (50) NOT NULL ,
        WarfriendsPseudo Varchar (50) NOT NULL ,
        Mail             Varchar (150) NOT NULL ,
        TagDiscord       Varchar (20) ,
        Password         Varchar (20) NOT NULL ,
        id_Armors        Int NOT NULL
	,CONSTRAINT UsersInfos_PK PRIMARY KEY (id)

	,CONSTRAINT UsersInfos_Armors_FK FOREIGN KEY (id_Armors) REFERENCES Armors(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: SyndicateDetails
#------------------------------------------------------------

CREATE TABLE SyndicateDetails(
        id        Int  Auto_increment  NOT NULL ,
        ValidRank Varchar (3) NOT NULL ,
        Standing  Int
	,CONSTRAINT SyndicateDetails_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Link_Users_Syndicate_SyndicateDetails
#------------------------------------------------------------

CREATE TABLE Link_Users_Syndicate_SyndicateDetails(
        id                  Int NOT NULL ,
        id_UsersInfos       Int NOT NULL ,
        id_SyndicateDetails Int NOT NULL
	,CONSTRAINT Link_Users_Syndicate_SyndicateDetails_PK PRIMARY KEY (id,id_UsersInfos,id_SyndicateDetails)

	,CONSTRAINT Link_Users_Syndicate_SyndicateDetails_Syndicate_FK FOREIGN KEY (id) REFERENCES Syndicate(id)
	,CONSTRAINT Link_Users_Syndicate_SyndicateDetails_UsersInfos0_FK FOREIGN KEY (id_UsersInfos) REFERENCES UsersInfos(id)
	,CONSTRAINT Link_Users_Syndicate_SyndicateDetails_SyndicateDetails1_FK FOREIGN KEY (id_SyndicateDetails) REFERENCES SyndicateDetails(id)
)ENGINE=InnoDB;

