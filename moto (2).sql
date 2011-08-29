-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Lun 29 Août 2011 à 16:46
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `moto`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'GT'),
(2, 'course'),
(3, 'cross'),
(4, 'supermotar'),
(5, 'classic'),
(6, 'custom');

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE IF NOT EXISTS `piece` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `piece`
--

INSERT INTO `piece` (`id`, `nom`) VALUES
(1, 'selle confort'),
(2, 'pot sport'),
(3, 'suspensions hydrauliques'),
(4, 'disques de frein sport'),
(5, 'pneus course'),
(6, 'pneus pluie'),
(7, 'suspensions sport'),
(8, 'selle course'),
(9, 'fourche sport');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE IF NOT EXISTS `vehicule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_id` int(11) DEFAULT NULL,
  `nom_proprietaire` varchar(255) NOT NULL,
  `prenom_proprietaire` varchar(255) NOT NULL,
  `nom_vehicule` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D0599D4BBCF5E72D` (`categorie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `vehicule`
--

INSERT INTO `vehicule` (`id`, `categorie_id`, `nom_proprietaire`, `prenom_proprietaire`, `nom_vehicule`) VALUES
(1, 2, 'Berroir', 'Emmanuel', 'Yamaha 900 GTX');

-- --------------------------------------------------------

--
-- Structure de la table `vehicule_piece`
--

CREATE TABLE IF NOT EXISTS `vehicule_piece` (
  `vehicule_id` int(11) NOT NULL,
  `piece_id` int(11) NOT NULL,
  PRIMARY KEY (`vehicule_id`,`piece_id`),
  KEY `IDX_7413F3714A4A3511` (`vehicule_id`),
  KEY `IDX_7413F371C40FCFA8` (`piece_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vehicule_piece`
--

INSERT INTO `vehicule_piece` (`vehicule_id`, `piece_id`) VALUES
(1, 1),
(1, 3),
(1, 5),
(1, 9);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `vehicule_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `vehicule_piece`
--
ALTER TABLE `vehicule_piece`
  ADD CONSTRAINT `vehicule_piece_ibfk_1` FOREIGN KEY (`vehicule_id`) REFERENCES `vehicule` (`id`),
  ADD CONSTRAINT `vehicule_piece_ibfk_2` FOREIGN KEY (`piece_id`) REFERENCES `piece` (`id`);
