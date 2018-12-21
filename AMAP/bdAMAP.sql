-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 30 Mai 2018 à 13:15
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdberrue`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'feculent'),
(2, 'fruit');

-- --------------------------------------------------------

--
-- Structure de la table `colis`
--

CREATE TABLE `colis` (
  `ref` int(11) NOT NULL,
  `montanttotal` float DEFAULT NULL,
  `id_livraison` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `id_Produit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `colis`
--

INSERT INTO `colis` (`ref`, `montanttotal`, `id_livraison`, `quantite`, `id_Produit`) VALUES
(1, 50, 1, 100, 1),
(2, 100, 1, 200, 1),
(3, 50, 2, 100, 1),
(4, 3, 3, 3, 8),
(5, 16, 4, 1, 5),
(6, 16, 5, 1, 5),
(7, 16, 6, 1, 5),
(8, 16, 7, 1, 5),
(9, 16, 8, 1, 5),
(10, 9, 9, 10, 6),
(15, 48, 12, 3, 5),
(16, 48, 13, 3, 5),
(17, 9, 14, 10, 6),
(18, 10, 14, 10, 8),
(19, 10, 14, 10, 9),
(20, 2, 15, 2, 8),
(21, 80, 15, 5, 5),
(22, 6, 16, 6, 9),
(25, 0.9, 19, 1, 6),
(26, 16, 21, 1, 5),
(27, 7, 22, 7, 9);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `livraison`
--

INSERT INTO `livraison` (`id`, `id_utilisateur`) VALUES
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(12, 3),
(13, 3),
(14, 3),
(16, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(15, 4);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `libelle` varchar(25) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `prixunitaire` float DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `nom_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `description`, `prixunitaire`, `quantite`, `id_utilisateur`, `id_categorie`, `nom_image`) VALUES
(1, 'Patate', 'des patates', 0.5, 840, 2, 1, '1'),
(2, 'Pomme', 'des pommes', 0.7, 620, 2, 2, '2'),
(5, 'Asperges', 'Des asperges.', 16, 1, 2, 1, '4eebf24b3ca64833ab084808e1d0878e'),
(6, 'Betterave', 'Des betteraves.', 0.9, 952, 2, 1, '6'),
(7, 'Carotte', 'Des carottes.', 1, 119, 2, 1, '7'),
(8, 'Figue', 'Des figues', 1, 0, 2, 2, '8'),
(9, 'Kiwi', 'Des kiwis.', 1, 259, 2, 2, '9'),
(10, 'Laitue', 'Des laitues.', 1, 321, 2, 1, '10'),
(11, 'Pruneau', 'Des pruneaux', 1, 32, 2, 2, '11');

-- --------------------------------------------------------

--
-- Structure de la table `ravitailler`
--

CREATE TABLE `ravitailler` (
  `quantite` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

CREATE TABLE `type_utilisateur` (
  `id` int(11) NOT NULL,
  `libelle` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_utilisateur`
--

INSERT INTO `type_utilisateur` (`id`, `libelle`) VALUES
(1, 'admin'),
(2, 'producteur'),
(3, 'consommateur'),
(4, 'secretaire');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` char(25) DEFAULT NULL,
  `prenom` char(25) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `tel` int(11) NOT NULL,
  `codepostal` int(11) NOT NULL,
  `ville` char(100) NOT NULL,
  `mdp` varchar(500) NOT NULL,
  `login` varchar(25) DEFAULT NULL,
  `id_Type_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `adresse`, `mail`, `tel`, `codepostal`, `ville`, `mdp`, `login`, `id_Type_utilisateur`) VALUES
(1, 'Dupont', 'Patrice', '52 rue michelet', 'patrice@gmail.com', 638323471, 45000, 'Orléans', 'Admin', 'Admin', 1),
(2, 'Trassard', 'Robin', '42 rue du chateau', 'robin@gmail.com', 632323232, 45000, 'Orléans', 'Producteur', 'Producteur', 2),
(3, 'Benardeau', 'Quentin', '54 rue du moulin', 'quentin@gmail.com', 608142710, 45000, 'Orléans', 'Conso', 'Conso', 3),
(4, 'Smith', 'Sabine', '75 rue du secret', 'sabine@gmail.com', 635466789, 45000, 'Orléans', 'Secretaire', 'Secretaire', 4);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `v_cat`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `v_cat` (
`libelle` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure de la vue `v_cat`
--
DROP TABLE IF EXISTS `v_cat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_cat`  AS  select `categorie`.`libelle` AS `libelle` from `categorie` where (`categorie`.`id` = 1) ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `colis`
--
ALTER TABLE `colis`
  ADD PRIMARY KEY (`ref`),
  ADD KEY `FK_colis_id` (`id_livraison`),
  ADD KEY `FK_colis_id_Produit` (`id_Produit`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_livraison_id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Produit_id_utilisateur` (`id_utilisateur`),
  ADD KEY `FK_Produit_id_categorie` (`id_categorie`);

--
-- Index pour la table `ravitailler`
--
ALTER TABLE `ravitailler`
  ADD PRIMARY KEY (`id`,`id_utilisateur`),
  ADD KEY `FK_ravitailler_id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `type_utilisateur`
--
ALTER TABLE `type_utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_utilisateur_id_Type_utilisateur` (`id_Type_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `colis`
--
ALTER TABLE `colis`
  MODIFY `ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `type_utilisateur`
--
ALTER TABLE `type_utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `colis`
--
ALTER TABLE `colis`
  ADD CONSTRAINT `FK_colis_id` FOREIGN KEY (`id_livraison`) REFERENCES `livraison` (`id`),
  ADD CONSTRAINT `FK_colis_id_Produit` FOREIGN KEY (`id_Produit`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `FK_livraison_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_Produit_id_categorie` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `FK_Produit_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `ravitailler`
--
ALTER TABLE `ravitailler`
  ADD CONSTRAINT `FK_ravitailler_id` FOREIGN KEY (`id`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `FK_ravitailler_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_utilisateur_id_Type_utilisateur` FOREIGN KEY (`id_Type_utilisateur`) REFERENCES `type_utilisateur` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
