SELECT `UsersInfos`.`WarfriendsPseudo` AS `Pseudo Warfriends`,`UsersInfos`.`WarframePseudo` AS `Pseudo Warframe`,`Armors`.`Name` 
AS `Armure Favorite`,GROUP_CONCAT(`Syndicate`.`Name`) AS `Syndicat : Rang >=2 ?` 
FROM `UsersInfos` INNER JOIN `Armors` ON `UsersInfos`.`id_Armors`=`Armors`.`id` INNER JOIN `Link_Users_Syndicate_SyndicateDetails` 
ON `Link_Users_Syndicate_SyndicateDetails`.`id_UsersInfos` = `UsersInfos`.`id` INNER JOIN `Syndicate` 
ON `Syndicate`.`id` = `Link_Users_Syndicate_SyndicateDetails`.`id` INNER JOIN `SyndicateDetails` 
ON `SyndicateDetails`.`id` = `Link_Users_Syndicate_SyndicateDetails`.`id_SyndicateDetails`GROUP BY `UsersInfos`.`id`;


-- SELECT `Nom Serie`,`Nom Acteur` FROM `Serie` INNER JOIN `relation` ON `Serie`.`id`=`relation`.`id_Serie` INNER JOIN `Acteur` ON `Acteur`.`id`=`relation`.`id_acteur`;