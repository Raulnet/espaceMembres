-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 23 Juillet 2014 à 17:29
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `place_member`
--

-- --------------------------------------------------------

--
-- Structure de la table `link_member`
--

CREATE TABLE IF NOT EXISTS `link_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` mediumint(9) NOT NULL,
  `member_linked` mediumint(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `civil` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `surname` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `icon` tinyint(2) DEFAULT NULL,
  `suscrib_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_title` tinyint(4) NOT NULL,
  `activity` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`,`email`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_member_title_member1_idx` (`id_title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2304 ;

-- --------------------------------------------------------

--
-- Structure de la table `title_member`
--

CREATE TABLE IF NOT EXISTS `title_member` (
  `id_title` tinyint(4) NOT NULL,
  `name_title` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `title_member`
--

INSERT INTO `title_member` (`id_title`, `name_title`) VALUES
(1, 'Webmaster'),
(2, 'Lead developper'),
(3, 'Designer'),
(4, 'Commercial'),
(5, 'Directeur');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `fk_member_title_member1` FOREIGN KEY (`id_title`) REFERENCES `title_member` (`id_title`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
