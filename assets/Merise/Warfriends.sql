#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: wfd_Armors
#------------------------------------------------------------

CREATE TABLE wfd_Armors(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (100) NOT NULL
	,CONSTRAINT wfd_Armors_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: wfd_Syndicate
#------------------------------------------------------------

CREATE TABLE wfd_Syndicate(
        id    Int  Auto_increment  NOT NULL ,
        name  Varchar (200) NOT NULL ,
        image Varchar (500) NOT NULL
	,CONSTRAINT wfd_Syndicate_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: wfd_UsersInfos
#------------------------------------------------------------

CREATE TABLE wfd_UsersInfos(
        id               Int  Auto_increment  NOT NULL ,
        warframePseudo   Varchar (50) NOT NULL ,
        warfriendsPseudo Varchar (50) NOT NULL ,
        mail             Varchar (150) NOT NULL ,
        tagDiscord       Varchar (20) ,
        password         Varchar (200) NOT NULL ,
        birthday         Date NOT NULL ,
        showDiscord      Varchar (50) NOT NULL ,
        showMail         Varchar (50) NOT NULL ,
        id_wfd_Armors    Int NOT NULL
	,CONSTRAINT wfd_UsersInfos_PK PRIMARY KEY (id)

	,CONSTRAINT wfd_UsersInfos_wfd_Armors_FK FOREIGN KEY (id_wfd_Armors) REFERENCES wfd_Armors(id) ON DELETE CASCADE
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: wfd_SyndicateDetails
#------------------------------------------------------------

CREATE TABLE wfd_SyndicateDetails(
        id                Int  Auto_increment  NOT NULL ,
        rank              Varchar (50) ,
        id_wfd_UsersInfos Int NOT NULL ,
        id_wfd_Syndicate  Int NOT NULL
	,CONSTRAINT wfd_SyndicateDetails_PK PRIMARY KEY (id)

	,CONSTRAINT wfd_SyndicateDetails_wfd_UsersInfos_FK FOREIGN KEY (id_wfd_UsersInfos) REFERENCES wfd_UsersInfos(id) ON DELETE CASCADE
	,CONSTRAINT wfd_SyndicateDetails_wfd_Syndicate0_FK FOREIGN KEY (id_wfd_Syndicate) REFERENCES wfd_Syndicate(id) ON DELETE CASCADE
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: wfd_Admin
#------------------------------------------------------------

CREATE TABLE wfd_Admin(
        id       Int  Auto_increment  NOT NULL ,
        pseudo   Varchar (50) NOT NULL ,
        password Varchar (500) NOT NULL
	,CONSTRAINT wfd_Admin_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: wfd_sender
#------------------------------------------------------------

CREATE TABLE wfd_sender(
        id                Int  Auto_increment  NOT NULL ,
        id_wfd_UsersInfos Int
	,CONSTRAINT wfd_sender_PK PRIMARY KEY (id)

	,CONSTRAINT wfd_sender_wfd_UsersInfos_FK FOREIGN KEY (id_wfd_UsersInfos) REFERENCES wfd_UsersInfos(id) ON DELETE CASCADE
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: wfd_recipient
#------------------------------------------------------------

CREATE TABLE wfd_recipient(
        id                Int  Auto_increment  NOT NULL ,
        id_wfd_UsersInfos Int
	,CONSTRAINT wfd_recipient_PK PRIMARY KEY (id)

	,CONSTRAINT wfd_recipient_wfd_UsersInfos_FK FOREIGN KEY (id_wfd_UsersInfos) REFERENCES wfd_UsersInfos(id) ON DELETE CASCADE
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: wfd_Message
#------------------------------------------------------------

CREATE TABLE wfd_Message(
        id               Int  Auto_increment  NOT NULL ,
        date             Datetime NOT NULL ,
        title            Varchar (200) NOT NULL ,
        message          Varchar (2000) NOT NULL ,
        id_wfd_sender    Int ,
        id_wfd_recipient Int
	,CONSTRAINT wfd_Message_PK PRIMARY KEY (id)

	,CONSTRAINT wfd_Message_wfd_sender_FK FOREIGN KEY (id_wfd_sender) REFERENCES wfd_sender(id) ON DELETE CASCADE
	,CONSTRAINT wfd_Message_wfd_recipient0_FK FOREIGN KEY (id_wfd_recipient) REFERENCES wfd_recipient(id) ON DELETE CASCADE
)ENGINE=InnoDB;

