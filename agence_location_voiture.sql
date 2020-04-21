-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 avr. 2020 à 16:43
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `agence_location_voiture`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_C35F081619EB6921` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `carecteristiques`
--

DROP TABLE IF EXISTS `carecteristiques`;
CREATE TABLE IF NOT EXISTS `carecteristiques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modele_id` int(11) DEFAULT NULL,
  `version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `couleur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nbre_place` int(11) DEFAULT NULL,
  `energie` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boite_vitesse` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puissance_fiscale` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_enregistrement` datetime DEFAULT NULL,
  `moteur` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A10CB08BAC14B70A` (`modele_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cin` int(11) NOT NULL,
  `num_passeport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pseudoname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_inscription` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etat_maj_voiture`
--

DROP TABLE IF EXISTS `etat_maj_voiture`;
CREATE TABLE IF NOT EXISTS `etat_maj_voiture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voiture_id` int(11) DEFAULT NULL,
  `date_enregistrement` datetime NOT NULL,
  `kilometrage` int(11) NOT NULL,
  `descriptif_voiture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_controle` datetime DEFAULT NULL,
  `etat_voiture` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9253196B181A8BA` (`voiture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `file_attachement_client`
--

DROP TABLE IF EXISTS `file_attachement_client`;
CREATE TABLE IF NOT EXISTS `file_attachement_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `permis_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_71A217E63594A24E` (`permis_id`),
  KEY `IDX_71A217E619EB6921` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `file_attachement_voiture`
--

DROP TABLE IF EXISTS `file_attachement_voiture`;
CREATE TABLE IF NOT EXISTS `file_attachement_voiture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voiture_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  `descriptif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_BB3C852A181A8BA` (`voiture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id`, `name`) VALUES
(1, 'Peugeot'),
(2, 'Citroen'),
(3, 'Renault'),
(4, 'Marcedes'),
(5, 'BMW');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200418171051', '2020-04-18 17:11:09');

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

DROP TABLE IF EXISTS `modele`;
CREATE TABLE IF NOT EXISTS `modele` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_100285584827B9B2` (`marque_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modele`
--

INSERT INTO `modele` (`id`, `marque_id`, `name`, `title`) VALUES
(1, 1, 'Peugeot 206', 'Peugeot 206'),
(2, 1, 'Peugeot 307', 'Peugeot 307'),
(3, 2, 'Picasso c4', 'Berlin citroen picasso c4');

-- --------------------------------------------------------

--
-- Structure de la table `permis`
--

DROP TABLE IF EXISTS `permis`;
CREATE TABLE IF NOT EXISTS `permis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_permis` int(11) DEFAULT NULL,
  `date_delivrance` date NOT NULL,
  `date_expiration` date NOT NULL,
  `type_vehicule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1738945319EB6921` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'bedwihamza@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$QS4xc2hSa0hnZXU2dlQ0SQ$IWBQFwDjBiuMnQbabQ05+TxePi7EdtYumX+NE3TM558'),
(2, 'bedwihamza+1@gmail.com', '[]', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marque_id` int(11) DEFAULT NULL,
  `carecteristique_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_plaque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_enregistrement` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E9E2810F9D788BD4` (`carecteristique_id`),
  KEY `IDX_E9E2810F4827B9B2` (`marque_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`id`, `marque_id`, `carecteristique_id`, `nom`, `descriptif`, `numero_plaque`, `date_enregistrement`, `created_at`, `updated_at`, `thumbnail`) VALUES
(1, 1, NULL, 'Citroen bordo', '<ul><li>turi</li><li>etyjetuk</li><li>etukek</li><li>etuk</li></ul>', 'DT-580-ME', '2015-01-21 20:00:00', NULL, '2020-04-19 18:54:50', '1.513518.6[1].jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `FK_C35F081619EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `carecteristiques`
--
ALTER TABLE `carecteristiques`
  ADD CONSTRAINT `FK_A10CB08BAC14B70A` FOREIGN KEY (`modele_id`) REFERENCES `modele` (`id`);

--
-- Contraintes pour la table `etat_maj_voiture`
--
ALTER TABLE `etat_maj_voiture`
  ADD CONSTRAINT `FK_9253196B181A8BA` FOREIGN KEY (`voiture_id`) REFERENCES `voiture` (`id`);

--
-- Contraintes pour la table `file_attachement_client`
--
ALTER TABLE `file_attachement_client`
  ADD CONSTRAINT `FK_71A217E619EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_71A217E63594A24E` FOREIGN KEY (`permis_id`) REFERENCES `permis` (`id`);

--
-- Contraintes pour la table `file_attachement_voiture`
--
ALTER TABLE `file_attachement_voiture`
  ADD CONSTRAINT `FK_BB3C852A181A8BA` FOREIGN KEY (`voiture_id`) REFERENCES `voiture` (`id`);

--
-- Contraintes pour la table `modele`
--
ALTER TABLE `modele`
  ADD CONSTRAINT `FK_100285584827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`);

--
-- Contraintes pour la table `permis`
--
ALTER TABLE `permis`
  ADD CONSTRAINT `FK_1738945319EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `FK_E9E2810F4827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`),
  ADD CONSTRAINT `FK_E9E2810F9D788BD4` FOREIGN KEY (`carecteristique_id`) REFERENCES `carecteristiques` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
