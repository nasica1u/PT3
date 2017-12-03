-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 28 Novembre 2016 à 10:47
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
-- Structure de la table `tp_article`
--

CREATE TABLE IF NOT EXISTS `tp_article` (
  `idnum` tinyint(4) NOT NULL AUTO_INCREMENT,
  `designation` varchar(16) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `quantite` int(100) NOT NULL,
  `date` date NOT NULL,
  `prix` float(12,0) NOT NULL,
  `iddcom` tinyint(4) NOT NULL,
  PRIMARY KEY (`idnum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `tp_article`
--

INSERT INTO `tp_article` (`idnum`, `designation`, `quantite`, `date`, `prix`, `iddcom`) VALUES
(1, 'stylo rouge', 10, '2016-11-18', 2, 1),
(2, 'crayon', 8, '2016-11-18', 1, 1),
(3, 'stylo bleu', 12, '2016-11-25', 1, 1),
(4, 'stylo bleu', 12, '2016-11-25', 1, 1),
(5, 'stylo vert', 2, '2016-11-25', 1, 1),
(6, 'Feuilles 80g', 500, '2016-11-25', 5, 1),
(7, 'Feuilles 70g', 500, '2016-11-25', 4, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
