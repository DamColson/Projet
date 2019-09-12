-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 12 Septembre 2019 à 14:19
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `warfriends`
--

-- --------------------------------------------------------

--
-- Structure de la table `wfd_Admin`
--

CREATE TABLE `wfd_Admin` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Contenu de la table `wfd_Admin`
--

INSERT INTO `wfd_Admin` (`id`, `pseudo`, `password`) VALUES
(1, 'Fireloup', '$2y$10$K7hKUxCVONaq5PkqYxE67OJ0RvMMEyIXm8UXHOtO5tTh6nUAxOiPG');

-- --------------------------------------------------------

--
-- Structure de la table `wfd_Armors`
--

CREATE TABLE `wfd_Armors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Contenu de la table `wfd_Armors`
--

INSERT INTO `wfd_Armors` (`id`, `name`) VALUES
(1, 'Ash'),
(2, 'Atlas'),
(3, 'Banshee'),
(4, 'Baruuk'),
(5, 'Chroma'),
(6, 'Ember'),
(7, 'Equinox'),
(8, 'Excalibur'),
(9, 'Frost'),
(10, 'Gara'),
(11, 'Garuda'),
(12, 'Harrow'),
(13, 'Hildryn'),
(14, 'Hydroid'),
(15, 'Inaros'),
(16, 'Ivara'),
(17, 'Khora'),
(18, 'Limbo'),
(19, 'Loki'),
(20, 'Mag'),
(21, 'Mesa'),
(22, 'Mirage'),
(23, 'Nekros'),
(24, 'Nezha'),
(25, 'Nidus'),
(26, 'Nova'),
(27, 'Nyx'),
(28, 'Oberon'),
(29, 'Octavia'),
(30, 'Revenant'),
(31, 'Rhino'),
(32, 'Saryn'),
(33, 'Titania'),
(34, 'Trinity'),
(35, 'Valkyr'),
(36, 'Vauban'),
(37, 'Volt'),
(38, 'Wisp'),
(39, 'Wukong'),
(40, 'Zephyr'),
(41, 'AshPrime'),
(42, 'BansheePrime'),
(43, 'ChromaPrime'),
(44, 'EmberPrime'),
(45, 'EquinoxPrime'),
(46, 'ExcaliburPrime'),
(47, 'FrostPrime'),
(48, 'HydroidPrime'),
(49, 'LimboPrime'),
(50, 'LokiPrime'),
(51, 'MagPrime'),
(52, 'MesaPrime'),
(53, 'MiragePrime'),
(54, 'NekrosPrime'),
(55, 'NovaPrime'),
(56, 'NyxPrime'),
(57, 'OberonPrime'),
(58, 'RhinoPrime'),
(59, 'SarynPrime'),
(60, 'TrinityPrime'),
(61, 'ValkyrPrime'),
(62, 'VaubanPrime'),
(63, 'VoltPrime'),
(64, 'ZephyrPrime');

-- --------------------------------------------------------

--
-- Structure de la table `wfd_Message`
--

CREATE TABLE `wfd_Message` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `message` varchar(2000) COLLATE utf8mb4_bin NOT NULL,
  `id_wfd_sender` int(11) DEFAULT NULL,
  `id_wfd_recipient` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Structure de la table `wfd_recipient`
--

CREATE TABLE `wfd_recipient` (
  `id` int(11) NOT NULL,
  `id_wfd_UsersInfos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Structure de la table `wfd_sender`
--

CREATE TABLE `wfd_sender` (
  `id` int(11) NOT NULL,
  `id_wfd_UsersInfos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Structure de la table `wfd_Syndicate`
--

CREATE TABLE `wfd_Syndicate` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `image` varchar(500) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Contenu de la table `wfd_Syndicate`
--

INSERT INTO `wfd_Syndicate` (`id`, `name`, `image`) VALUES
(1, 'Steel Meridian', 'smallsteelicon.png'),
(2, 'Arbiter Of Hexis', 'smallarbitericon.png'),
(3, 'Cephalon Suda', 'smallcephalonicon.png'),
(4, 'The Perrin Sequence', 'smallperrinsequenceicon.png'),
(5, 'Red Veil', 'smallredveilicon.png'),
(6, 'New Loka', 'smalllokaicon.png');

-- --------------------------------------------------------

--
-- Structure de la table `wfd_SyndicateDetails`
--

CREATE TABLE `wfd_SyndicateDetails` (
  `id` int(11) NOT NULL,
  `rank` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `id_wfd_UsersInfos` int(11) NOT NULL,
  `id_wfd_Syndicate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Contenu de la table `wfd_SyndicateDetails`
--

INSERT INTO `wfd_SyndicateDetails` (`id`, `rank`, `id_wfd_UsersInfos`, `id_wfd_Syndicate`) VALUES
(52, '2', 11, 1),
(53, '3', 11, 2),
(54, 'Moins de 2', 11, 3),
(55, 'Moins de 2', 11, 4),
(56, '5', 11, 5),
(57, 'Moins de 2', 11, 6),
(64, '2', 16, 1),
(65, '3', 16, 2),
(66, 'Moins de 2', 16, 3),
(67, '5', 16, 4),
(68, 'Moins de 2', 16, 5),
(69, 'Moins de 2', 16, 6),
(70, '5', 14, 1),
(71, '3', 14, 2),
(72, '4', 14, 3),
(73, 'Moins de 2', 14, 4),
(74, 'Moins de 2', 14, 5),
(75, 'Moins de 2', 14, 6),
(76, 'Moins de 2', 23, 1),
(77, '5', 23, 2),
(78, '4', 23, 3),
(79, 'Moins de 2', 23, 4),
(80, 'Moins de 2', 23, 5),
(81, '3', 23, 6),
(82, 'Moins de 2', 17, 1),
(83, 'Moins de 2', 17, 2),
(84, 'Moins de 2', 17, 3),
(85, '5', 17, 4),
(86, '5', 17, 5),
(87, '5', 17, 6),
(88, '5', 18, 1),
(89, '5', 18, 2),
(90, 'Moins de 2', 18, 3),
(91, 'Moins de 2', 18, 4),
(92, 'Moins de 2', 18, 5),
(93, '5', 18, 6),
(94, 'Moins de 2', 21, 1),
(95, 'Moins de 2', 21, 2),
(96, '3', 21, 3),
(97, '5', 21, 4),
(98, '4', 21, 5),
(99, 'Moins de 2', 21, 6),
(100, 'Moins de 2', 15, 1),
(101, 'Moins de 2', 15, 2),
(102, '5', 15, 3),
(103, '5', 15, 4),
(104, 'Moins de 2', 15, 5),
(105, '5', 15, 6),
(106, '2', 22, 1),
(107, 'Moins de 2', 22, 2),
(108, '2', 22, 3),
(109, '4', 22, 4),
(110, 'Moins de 2', 22, 5),
(111, 'Moins de 2', 22, 6),
(112, 'Moins de 2', 20, 1),
(113, '5', 20, 2),
(114, '5', 20, 3),
(115, '5', 20, 4),
(116, 'Moins de 2', 20, 5),
(117, 'Moins de 2', 20, 6),
(118, '5', 19, 1),
(119, 'Moins de 2', 19, 2),
(120, 'Moins de 2', 19, 3),
(121, 'Moins de 2', 19, 4),
(122, '5', 19, 5),
(123, '5', 19, 6),
(124, 'Moins de 2', 13, 1),
(125, '5', 13, 2),
(126, '5', 13, 3),
(127, '5', 13, 4),
(128, 'Moins de 2', 13, 5),
(129, 'Moins de 2', 13, 6),
(130, 'Moins de 2', 25, 1),
(131, '3', 25, 2),
(132, '3', 25, 3),
(133, 'Moins de 2', 25, 4),
(134, '5', 25, 5),
(135, 'Moins de 2', 25, 6),
(136, '4', 26, 1),
(137, 'Moins de 2', 26, 2),
(138, '5', 26, 3),
(139, 'Moins de 2', 26, 4),
(140, '2', 26, 5),
(141, 'Moins de 2', 26, 6),
(142, '2', 27, 1),
(143, 'Moins de 2', 27, 2),
(144, '5', 27, 3),
(145, 'Moins de 2', 27, 4),
(146, 'Moins de 2', 27, 5),
(147, '5', 27, 6),
(148, 'Moins de 2', 28, 1),
(149, 'Moins de 2', 28, 2),
(150, '5', 28, 4),
(151, 'Moins de 2', 28, 5),
(152, '5', 28, 6),
(153, '5', 28, 3),
(154, 'Moins de 2', 29, 1),
(155, '5', 29, 2),
(156, '5', 29, 3),
(157, 'Moins de 2', 29, 4),
(158, 'Moins de 2', 29, 5),
(159, '3', 29, 6),
(160, 'Moins de 2', 31, 1),
(161, '5', 31, 2),
(162, 'Moins de 2', 31, 3),
(163, '2', 31, 4),
(164, '5', 31, 5),
(165, 'Moins de 2', 31, 6),
(166, 'Moins de 2', 32, 1),
(167, '3', 32, 2),
(168, '3', 32, 3),
(169, 'Moins de 2', 32, 4),
(170, '5', 32, 5),
(171, 'Moins de 2', 32, 6);

-- --------------------------------------------------------

--
-- Structure de la table `wfd_UsersInfos`
--

CREATE TABLE `wfd_UsersInfos` (
  `id` int(11) NOT NULL,
  `warframePseudo` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `warfriendsPseudo` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `mail` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `tagDiscord` varchar(20) COLLATE utf8mb4_bin DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `birthday` date NOT NULL,
  `showDiscord` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `showMail` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `id_wfd_Armors` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Contenu de la table `wfd_UsersInfos`
--

INSERT INTO `wfd_UsersInfos` (`id`, `warframePseudo`, `warfriendsPseudo`, `mail`, `tagDiscord`, `password`, `birthday`, `showDiscord`, `showMail`, `id_wfd_Armors`) VALUES
(11, 'DarkJC', 'DarkJC', 'darkJC@gmail.com', 'darkJC#1234', '$2y$10$yCtdCfOhBPHNvp20/mH1MulKuEdB/x/xiMq.GRDZh8VwI4XT52Uey', '1985-06-20', 'Yes', 'Yes', 27),
(13, 'El Ventilator', 'Bernard', 'bernard@gmail.com', 'Bernard#1234', '$2y$10$Sah7oUbLTcWJXRQ.5BXKreLqjpkosYn.8UVr15MJjE1EXb2dcPZC.', '1986-06-27', 'Yes', 'Yes', 64),
(14, 'Fireloup', 'Fireloup', 'fireloup@gmail.com', 'fireloup#1234', '$2y$10$TWUSebIvwKs07kuqEJLNZuV6LlwSioeTIxoxzkPEreaS5GCuILfZi', '1986-12-30', 'Yes', 'Yes', 45),
(15, 'Yoyo', 'Yoyo', 'yoyo@gmail.com', 'Yoyo#1234', '$2y$10$MVbCvjUWLHF1BcXglSHFpO8IMrtCGfuPjvYxoPKl6tOArFgJ3SdT.', '1988-10-14', 'Yes', 'No', 39),
(16, 'Michou', 'Michou', 'michou@gmail.com', 'michou#1234', '$2y$10$XxTKPuE.W1JSqrNTkjRPbOPBw7TZO2d8AXnQQWIOc/vfN3AfJgE8e', '1986-01-20', 'Yes', 'Yes', 52),
(17, 'Ekareya', 'Ekareya', 'ekareya@gmail.com', 'ekareya#1234', '$2y$10$Jp2Wg.jQhm27T8EWu3Y5sOtxytkcDzXlrupL.nnQKjCX1CkG4BgUS', '1986-11-28', 'Yes', 'Yes', 50),
(18, 'Lulu', 'Lulu', 'lulu@gmail.com', 'lulu#1234', '$2y$10$lBrKno9PSsFIhYXqvfEK/.0lI/XsrFYsg0DHnZYzjT/rY4MBNlkT.', '1989-09-12', 'Yes', 'Yes', 33),
(19, 'Shiixy', 'Shiixy', 'shiixy@gmail.com', 'shiixy#1234', '$2y$10$A6sJw4/sLVhPUuCq1SU56eQWblgV7FwysmBSphNFnvR7MXIPJzRV.', '1996-04-18', 'Yes', 'No', 11),
(20, 'Tori', 'Tori', 'tori@gmail.com', 'tori#1234', '$2y$10$0gck1LaLQxc5PdPr0xrlQuVlYyDAA0DjtpRm7zz6shbwU65uEipC.', '1987-12-31', 'Yes', 'Yes', 62),
(21, 'Elsa', 'Elsa', 'elsa@gmail.com', 'elsa#1234', '$2y$10$dxk.YBFLpNemOhb6I02kA./X5mxoEKpIYr5rfHT0ROMx69DvcnLcu', '1992-06-17', 'Yes', 'Yes', 29),
(22, 'Pink Louise', 'Pink Louise', 'pinkLouise@gmail.com', 'pinkLouise#1234', '$2y$10$55s.RgLpzSC35iOSuepMSuQpWAO9zvRNGOzHCRVswU/zTwtKC/8fm', '1997-06-28', 'Yes', 'Yes', 44),
(23, 'Quentin', 'Quentin', 'quentin@gmail.com', 'quentin#1234', '$2y$10$0l0YNncm8.5vDBIon0R7yuNGpzZ7vSzNPoE6UyiCZhetmVzpRImkW', '1990-05-16', 'Yes', 'Yes', 49),
(25, 'SuperPatoche', 'Patoche', 'patoche@gmail.com', 'patoche#1234', '$2y$10$lmtSqGf3NUP/DKKzTvUvDu00uMnA37ZAcQiFBmo/lZnCg8O/iOO7e', '1989-06-30', 'Yes', 'Yes', 14),
(26, 'Anousone', 'Anousone', 'anousone@gmail.com', 'anou#1234', '$2y$10$kd/2vC5LrEzTdgJKiKDY3.IfdrTaDWhkUxmsX88HX9ocJoU2k0N/y', '1987-05-29', 'Yes', 'Yes', 17),
(27, 'Yomab', 'Yomab', 'yomab@gmail.com', 'yomab#1234', '$2y$10$/lKFAmFdYmCuuMuwz.tTcusu5Tl3fP5SDWck.je4/n4MTR9ZwLMYq', '1973-07-31', 'Yes', 'Yes', 10),
(28, 'Laura', 'Laura', 'laura@gmail.com', 'Laura#1234', '$2y$10$VNoaFZbe65nVUdvrMveKdOxbB3Mwhv0l.I9mTlJL1nw6Z3jbnCEVy', '1985-02-21', 'Yes', 'No', 30),
(29, 'Causette', 'Causette', 'causette@gmail.com', 'causette#1234', '$2y$10$cDA7/DZGIK5CEA3mFml.XuAzrmSQX.ybWQzy7k1076zQQ/AQRjkgW', '1982-06-17', 'Yes', 'Yes', 1),
(30, 'Beber', 'Bertrand', 'bertrand@gmail.com', 'bertrand#1234', '$2y$10$S.FIWYOvvqtLvmvc1.iL7e/i339IyaAP2YMN10bwjTtq4Zk7TRYha', '1989-07-19', 'Yes', 'Yes', 1),
(31, 'Tintin le jeune', 'Tintin', 'tintin@gmail.com', 'tintin#1234', '$2y$10$OhlXGOLpWOpQ4IpZK9aee.6goXSB3PxiP29AbgSC4PUqOPWGsy476', '2001-08-23', 'Yes', 'Yes', 38),
(32, 'Nico', 'Nico', 'nico@gmail.com', 'nico#1234', '$2y$10$UUm6lvdz45OAmAOJAaJx1uZt.D4Egw3HuHc8rZWQ44GRUbPI2DFk.', '1993-08-03', 'Yes', 'Yes', 5),
(33, 'Aurelie', 'Aurelie', 'aurelie@gmail.com', 'aurelie#1234', '$2y$10$/Fs3Ub/G4AkZ4EX3/1CLJ.NqoTSG.erIGrjStycn.UpMsc9A9OqRm', '1993-08-03', 'No', 'Yes', 12);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `wfd_Admin`
--
ALTER TABLE `wfd_Admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wfd_Armors`
--
ALTER TABLE `wfd_Armors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wfd_Message`
--
ALTER TABLE `wfd_Message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wfd_Message_wfd_sender_FK` (`id_wfd_sender`),
  ADD KEY `wfd_Message_wfd_recipient0_FK` (`id_wfd_recipient`);

--
-- Index pour la table `wfd_recipient`
--
ALTER TABLE `wfd_recipient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wfd_recipient_wfd_UsersInfos_FK` (`id_wfd_UsersInfos`);

--
-- Index pour la table `wfd_sender`
--
ALTER TABLE `wfd_sender`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wfd_sender_wfd_UsersInfos_FK` (`id_wfd_UsersInfos`);

--
-- Index pour la table `wfd_Syndicate`
--
ALTER TABLE `wfd_Syndicate`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wfd_SyndicateDetails`
--
ALTER TABLE `wfd_SyndicateDetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wfd_SyndicateDetails_wfd_UsersInfos_FK` (`id_wfd_UsersInfos`),
  ADD KEY `wfd_SyndicateDetails_wfd_Syndicate0_FK` (`id_wfd_Syndicate`);

--
-- Index pour la table `wfd_UsersInfos`
--
ALTER TABLE `wfd_UsersInfos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wfd_UsersInfos_wfd_Armors_FK` (`id_wfd_Armors`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `wfd_Admin`
--
ALTER TABLE `wfd_Admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `wfd_Armors`
--
ALTER TABLE `wfd_Armors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT pour la table `wfd_Message`
--
ALTER TABLE `wfd_Message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `wfd_recipient`
--
ALTER TABLE `wfd_recipient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `wfd_sender`
--
ALTER TABLE `wfd_sender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `wfd_Syndicate`
--
ALTER TABLE `wfd_Syndicate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `wfd_SyndicateDetails`
--
ALTER TABLE `wfd_SyndicateDetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;
--
-- AUTO_INCREMENT pour la table `wfd_UsersInfos`
--
ALTER TABLE `wfd_UsersInfos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `wfd_Message`
--
ALTER TABLE `wfd_Message`
  ADD CONSTRAINT `wfd_Message_wfd_recipient0_FK` FOREIGN KEY (`id_wfd_recipient`) REFERENCES `wfd_recipient` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wfd_Message_wfd_sender_FK` FOREIGN KEY (`id_wfd_sender`) REFERENCES `wfd_sender` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `wfd_recipient`
--
ALTER TABLE `wfd_recipient`
  ADD CONSTRAINT `wfd_recipient_wfd_UsersInfos_FK` FOREIGN KEY (`id_wfd_UsersInfos`) REFERENCES `wfd_UsersInfos` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `wfd_sender`
--
ALTER TABLE `wfd_sender`
  ADD CONSTRAINT `wfd_sender_wfd_UsersInfos_FK` FOREIGN KEY (`id_wfd_UsersInfos`) REFERENCES `wfd_UsersInfos` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `wfd_SyndicateDetails`
--
ALTER TABLE `wfd_SyndicateDetails`
  ADD CONSTRAINT `wfd_SyndicateDetails_wfd_Syndicate0_FK` FOREIGN KEY (`id_wfd_Syndicate`) REFERENCES `wfd_Syndicate` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wfd_SyndicateDetails_wfd_UsersInfos_FK` FOREIGN KEY (`id_wfd_UsersInfos`) REFERENCES `wfd_UsersInfos` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `wfd_UsersInfos`
--
ALTER TABLE `wfd_UsersInfos`
  ADD CONSTRAINT `wfd_UsersInfos_wfd_Armors_FK` FOREIGN KEY (`id_wfd_Armors`) REFERENCES `wfd_Armors` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
