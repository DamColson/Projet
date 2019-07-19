-- SELECT `UsersInfos`.`WarfriendsPseudo` AS `Pseudo Warfriends`,`UsersInfos`.`WarframePseudo` AS `Pseudo Warframe`,`Armors`.`Name` 
-- AS `Armure Favorite`,GROUP_CONCAT(`Syndicate`.`Name`) AS `Syndicat : Rang >=2 ?` 
-- FROM `UsersInfos` INNER JOIN `Armors` ON `UsersInfos`.`id_Armors`=`Armors`.`id` INNER JOIN `Link_Users_Syndicate_SyndicateDetails` 
-- ON `Link_Users_Syndicate_SyndicateDetails`.`id_UsersInfos` = `UsersInfos`.`id` INNER JOIN `Syndicate` 
-- ON `Syndicate`.`id` = `Link_Users_Syndicate_SyndicateDetails`.`id` INNER JOIN `SyndicateDetails` 
-- ON `SyndicateDetails`.`id` = `Link_Users_Syndicate_SyndicateDetails`.`id_SyndicateDetails`GROUP BY `UsersInfos`.`id`;


-- SELECT `Nom Serie`,`Nom Acteur` FROM `Serie` INNER JOIN `relation` ON `Serie`.`id`=`relation`.`id_Serie` INNER JOIN `Acteur` ON `Acteur`.`id`=`relation`.`id_acteur`;


SELECT `wfd_UsersInfos`.`id`,`wfd_UsersInfos`.`warfriendsPseudo` FROM `wfd_UsersInfos` ORDER BY `wfd_UsersInfos`.`id` DESC LIMIT 5;

-- SELECT wfd_Syndicate.`name`,wfd_Syndicate.image,wfd_SyndicateDetails.rank FROM wfd_Syndicate INNER JOIN wfd_SyndicateDetails ON wfd_SyndicateDetails.id_wfd_Syndicate = wfd_Syndicate.id INNER JOIN wfd_UsersInfos ON wfd_SyndicateDetails.id_wfd_UsersInfos = wfd_UsersInfos.id WHERE wfd_UsersInfos.id = 5 AND wfd_SyndicateDetails.rank != '<2';

-- SELECT `wfd_UsersInfos`.`id`,`wfd_UsersInfos`.`warfriendsPseudo` FROM `wfd_UsersInfos` INNER JOIN wfd_SyndicateDetails ON wfd_SyndicateDetails.id_wfd_UsersInfos = wfd_UsersInfos.id WHERE EXISTS (SELECT wfd_SyndicateDetails.id, wfd_UsersInfos.id FROM wfd_SyndicateDetails INNER JOIN wfd_Syndicate ON wfd_Syndicate.id = wfd_SyndicateDetails.id_wfd_Syndicate INNER JOIN wfd_UsersInfos ON wfd_UsersInfos.id = wfd_SyndicateDetails.id_wfd_UsersInfos WHERE wfd_SyndicateDetails.id_wfd_UsersInfos = wfd_UsersInfos.id AND wfd_Syndicate.id = 1) ORDER BY `wfd_UsersInfos`.`id` DESC LIMIT 5;

SELECT wfd_UsersInfos.id,wfd_UsersInfos.warfriendsPseudo FROM wfd_SyndicateDetails INNER JOIN wfd_Syndicate ON wfd_Syndicate.id = wfd_SyndicateDetails.id_wfd_Syndicate INNER JOIN wfd_UsersInfos ON wfd_UsersInfos.id = wfd_SyndicateDetails.id_wfd_UsersInfos WHERE wfd_SyndicateDetails.id_wfd_UsersInfos = wfd_UsersInfos.id AND wfd_Syndicate.id = 1 ORDER BY wfd_UsersInfos.id DESC LIMIT 5;