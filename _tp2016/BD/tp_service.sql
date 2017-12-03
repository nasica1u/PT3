-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 28 Novembre 2016 à 10:57
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `tp_service`
--

CREATE TABLE IF NOT EXISTS `tp_service` (
  `idd` tinyint(4) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(16) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idd`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `tp_service`
--

INSERT INTO `tp_service` (`idd`, `libelle`, `date`) VALUES
(1, 'repro', '2016-11-22 15:58:27'),
(2, 'dsi', '2016-11-22 15:58:27'),
(3, 'valorisation', '2016-11-22 16:10:08'),
(4, 'commande', '2016-11-22 16:11:34'),
(5, 'communication', '2016-11-22 16:11:58'),
(6, 'restauration', '2016-11-22 16:21:15'),
(7, 'technique', '2016-11-25 10:31:45'),
(8, 'location', '2016-11-25 10:36:19'),
(9, 'juridique', '2016-11-25 10:44:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
