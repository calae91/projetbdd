-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 19 Décembre 2017 à 09:53
-- Version du serveur :  10.1.26-MariaDB-1
-- Version de PHP :  7.0.22-3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

CREATE DATABASE projet;
-- --------------------------------------------------------

--
-- Structure de la table `Combat`
--

CREATE TABLE `Combat` (
  `idCombat` int(3) NOT NULL,
  `IdTerrain` int(3) NOT NULL,
  `IdMonstre` int(3) NOT NULL,
  `IdPersonnage` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Combat`
--

INSERT INTO `Combat` (`idCombat`, `IdTerrain`, `IdMonstre`, `IdPersonnage`) VALUES
(1, 2, 2, 2),
(2, 1, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Equipement`
--

CREATE TABLE `Equipement` (
  `IdEquipement` int(3) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `PV` int(3) NOT NULL,
  `ATK` int(3) NOT NULL,
  `VIT` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Equipement`
--

INSERT INTO `Equipement` (`IdEquipement`, `Nom`, `PV`, `ATK`, `VIT`) VALUES
(1, 'Torse en plaque', 30, 5, -5),
(2, 'Bottes en plaque', 30, 0, 0),
(5, 'Casque en plaque', 30, 0, -5),
(6, 'Bouclier en fer', 45, 5, -5),
(7, 'Espadon du guerrier', 10, 25, -10),
(8, 'Epee en fer', 5, 20, 10),
(9, 'Torse en cuir', 20, 10, 5),
(10, 'Bottes en cuir', 20, 10, 10),
(11, 'Casque en cuir', 20, 10, 10),
(12, 'Arc en bois', 5, 30, 10),
(13, 'Torse en tissu', 10, 20, 5),
(14, 'Bottes en tissu', 10, 20, 5),
(15, 'Coiffe en tissu', 10, 20, 5),
(16, 'Baton de magie', 5, 35, 5);

-- --------------------------------------------------------

--
-- Structure de la table `Equiper`
--

CREATE TABLE `Equiper` (
  `IdPersonnage` int(3) NOT NULL,
  `IdEquipement` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Equiper`
--

INSERT INTO `Equiper` (`IdPersonnage`, `IdEquipement`) VALUES
(2, 1),
(2, 5),
(2, 2),
(2, 7),
(2, 6),
(3, 9),
(3, 10),
(3, 11),
(3, 12);

-- --------------------------------------------------------

--
-- Structure de la table `Monstre`
--

CREATE TABLE `Monstre` (
  `IdMonstre` int(3) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `PV` int(3) NOT NULL,
  `ATK` int(3) NOT NULL,
  `VIT` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Monstre`
--

INSERT INTO `Monstre` (`IdMonstre`, `Nom`, `PV`, `ATK`, `VIT`) VALUES
(1, 'Troll', 200, 20, 15),
(2, 'Gobelin', 50, 5, 10),
(3, 'Archer gobelin', 25, 8, 10),
(4, 'Rat', 10, 2, 20),
(5, 'Dragon', 500, 25, 60);

-- --------------------------------------------------------

--
-- Structure de la table `Personnage`
--

CREATE TABLE `Personnage` (
  `IdPersonnage` int(3) NOT NULL,
  `Nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Personnage`
--

INSERT INTO `Personnage` (`IdPersonnage`, `Nom`) VALUES
(1, 'Magus'),
(2, 'Warrior'),
(3, 'Archer');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `stats_Monstre_par_Combat`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `stats_Monstre_par_Combat` (
`idCombat` int(3)
,`Nom` varchar(30)
,`PV` int(3)
,`ATK` bigint(12)
,`VIT` bigint(12)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `stats_Personnage_par_Combat`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `stats_Personnage_par_Combat` (
`idCombat` int(3)
,`Nom` varchar(30)
,`PV` decimal(32,0)
,`ATK` decimal(33,0)
,`VIT` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Structure de la table `Terrain`
--

CREATE TABLE `Terrain` (
  `IdTerrain` int(33) NOT NULL,
  `Nom` varchar(30) NOT NULL,
  `ATKPersonnage` int(3) NOT NULL,
  `VITPersonnage` int(3) NOT NULL,
  `ATKMonstre` int(3) NOT NULL,
  `VITMonstre` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Terrain`
--

INSERT INTO `Terrain` (`IdTerrain`, `Nom`, `ATKPersonnage`, `VITPersonnage`, `ATKMonstre`, `VITMonstre`) VALUES
(1, 'Forest', -5, -5, 5, 10),
(2, 'plain', 5, 5, 0, 0),
(3, 'mountain', 5, -5, 5, -10);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `Id` int(33) NOT NULL,
  `login` varchar(33) NOT NULL,
  `password` varchar(33) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Id`, `login`, `password`, `credit`) VALUES
(1, 'utilisateur', 'user', 1),
(2, 'administrateur', 'admin', 3),
(3, 'moderateur', 'mod', 2);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `vue_ensemble`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `vue_ensemble` (
`Id` int(3)
,`Personnage` varchar(30)
,`Monstre` varchar(30)
,`Terrain` varchar(30)
);

-- --------------------------------------------------------

--
-- Structure de la vue `stats_Monstre_par_Combat`
--
DROP TABLE IF EXISTS `stats_Monstre_par_Combat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stats_Monstre_par_Combat`  AS  (select `C`.`idCombat` AS `idCombat`,`M`.`Nom` AS `Nom`,`M`.`PV` AS `PV`,(`M`.`ATK` + `T`.`ATKMonstre`) AS `ATK`,(`M`.`VIT` + `T`.`VITMonstre`) AS `VIT` from ((`Monstre` `M` join `Combat` `C`) join `Terrain` `T`) where ((`M`.`IdMonstre` = `C`.`IdMonstre`) and (`C`.`IdTerrain` = `T`.`IdTerrain`)) group by `C`.`idCombat`) ;

-- --------------------------------------------------------

--
-- Structure de la vue `stats_Personnage_par_Combat`
--
DROP TABLE IF EXISTS `stats_Personnage_par_Combat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stats_Personnage_par_Combat`  AS  (select `C`.`idCombat` AS `idCombat`,`P`.`Nom` AS `Nom`,sum(`Eq`.`PV`) AS `PV`,(sum(`Eq`.`ATK`) + `T`.`ATKPersonnage`) AS `ATK`,(sum(`Eq`.`VIT`) + `T`.`VITPersonnage`) AS `VIT` from ((((`Personnage` `P` join `Combat` `C`) join `Terrain` `T`) join `Equiper` `E`) join `Equipement` `Eq`) where ((`P`.`IdPersonnage` = `C`.`IdPersonnage`) and (`C`.`IdTerrain` = `T`.`IdTerrain`) and (`P`.`IdPersonnage` = `E`.`IdPersonnage`) and (`E`.`IdEquipement` = `Eq`.`IdEquipement`)) group by `C`.`idCombat`) ;

-- --------------------------------------------------------

--
-- Structure de la vue `vue_ensemble`
--
DROP TABLE IF EXISTS `vue_ensemble`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vue_ensemble`  AS  (select `Combat`.`idCombat` AS `Id`,`Personnage`.`Nom` AS `Personnage`,`Monstre`.`Nom` AS `Monstre`,`Terrain`.`Nom` AS `Terrain` from (((`Combat` join `Terrain` on((`Combat`.`IdTerrain` = `Terrain`.`IdTerrain`))) join `Personnage` on((`Combat`.`IdPersonnage` = `Personnage`.`IdPersonnage`))) join `Monstre` on((`Combat`.`IdMonstre` = `Monstre`.`IdMonstre`)))) ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Combat`
--
ALTER TABLE `Combat`
  ADD PRIMARY KEY (`idCombat`),
  ADD KEY `FK_IdTerrain` (`IdTerrain`),
  ADD KEY `FK_IdMonstre` (`IdMonstre`),
  ADD KEY `FK_IdPersonnage` (`IdPersonnage`);

--
-- Index pour la table `Equipement`
--
ALTER TABLE `Equipement`
  ADD PRIMARY KEY (`IdEquipement`);

--
-- Index pour la table `Equiper`
--
ALTER TABLE `Equiper`
  ADD KEY `FK_IdPerso` (`IdPersonnage`),
  ADD KEY `FK_IDEquip` (`IdEquipement`);

--
-- Index pour la table `Monstre`
--
ALTER TABLE `Monstre`
  ADD PRIMARY KEY (`IdMonstre`);

--
-- Index pour la table `Personnage`
--
ALTER TABLE `Personnage`
  ADD PRIMARY KEY (`IdPersonnage`);

--
-- Index pour la table `Terrain`
--
ALTER TABLE `Terrain`
  ADD PRIMARY KEY (`IdTerrain`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Combat`
--
ALTER TABLE `Combat`
  MODIFY `idCombat` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Equipement`
--
ALTER TABLE `Equipement`
  MODIFY `IdEquipement` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `Monstre`
--
ALTER TABLE `Monstre`
  MODIFY `IdMonstre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Personnage`
--
ALTER TABLE `Personnage`
  MODIFY `IdPersonnage` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Terrain`
--
ALTER TABLE `Terrain`
  MODIFY `IdTerrain` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `Id` int(33) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Combat`
--
ALTER TABLE `Combat`
  ADD CONSTRAINT `FK_IdMonstre` FOREIGN KEY (`IdMonstre`) REFERENCES `Monstre` (`IdMonstre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_IdPersonnage` FOREIGN KEY (`IdPersonnage`) REFERENCES `Personnage` (`IdPersonnage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_IdTerrain` FOREIGN KEY (`IdTerrain`) REFERENCES `Terrain` (`IdTerrain`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Equiper`
--
ALTER TABLE `Equiper`
  ADD CONSTRAINT `FK_IDEquip` FOREIGN KEY (`IdEquipement`) REFERENCES `Equipement` (`IdEquipement`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_IdPerso` FOREIGN KEY (`IdPersonnage`) REFERENCES `Personnage` (`IdPersonnage`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
