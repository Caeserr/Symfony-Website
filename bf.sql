-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 15 juil. 2021 à 08:21
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bf`
--

-- --------------------------------------------------------

--
-- Structure de la table `accessoire`
--

DROP TABLE IF EXISTS `accessoire`;
CREATE TABLE IF NOT EXISTS `accessoire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_accessoire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_accessoire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `accessoire`
--

INSERT INTO `accessoire` (`id`, `nom_accessoire`, `description_accessoire`) VALUES
(1, 'Rechargement rapide', 'Augmente la vitesse de rechargement de l’arme de 15%'),
(2, 'Visée Rapide', 'Vous visez 33 % plus rapidement avec votre arme'),
(3, 'Poignées améliorées', 'Augmente la précision des tirs au jugé'),
(7, 'Mécanisme poli', 'Réduit l\'imprécision du tir au jugé d\'environ 40 % et permet à votre EMP d\'être précis plus longtemps.');

-- --------------------------------------------------------

--
-- Structure de la table `arme`
--

DROP TABLE IF EXISTS `arme`;
CREATE TABLE IF NOT EXISTS `arme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_arme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_arme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `arme`
--

INSERT INTO `arme` (`id`, `nom_arme`, `type_arme`) VALUES
(1, 'AK47', 'Fusil d\'assault'),
(3, 'Kark87', 'Fusil d\'éclaireur'),
(4, 'Sublimario', 'Mitrailleuse');

-- --------------------------------------------------------

--
-- Structure de la table `arme_accessoire`
--

DROP TABLE IF EXISTS `arme_accessoire`;
CREATE TABLE IF NOT EXISTS `arme_accessoire` (
  `arme_id` int(11) NOT NULL,
  `accessoire_id` int(11) NOT NULL,
  PRIMARY KEY (`arme_id`,`accessoire_id`),
  KEY `IDX_DE0808C221D9C0A` (`arme_id`),
  KEY `IDX_DE0808C2D23B67ED` (`accessoire_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `arme_accessoire`
--

INSERT INTO `arme_accessoire` (`arme_id`, `accessoire_id`) VALUES
(1, 2),
(3, 2),
(4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210713111906', '2021-07-13 11:19:14', 41),
('DoctrineMigrations\\Version20210713112138', '2021-07-13 11:21:46', 88),
('DoctrineMigrations\\Version20210713114703', '2021-07-13 11:47:09', 29),
('DoctrineMigrations\\Version20210713123910', '2021-07-13 12:39:19', 44);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `arme_accessoire`
--
ALTER TABLE `arme_accessoire`
  ADD CONSTRAINT `FK_DE0808C221D9C0A` FOREIGN KEY (`arme_id`) REFERENCES `arme` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_DE0808C2D23B67ED` FOREIGN KEY (`accessoire_id`) REFERENCES `accessoire` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
