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
-- Structure de la table `tp_fournisseur`
--

CREATE TABLE IF NOT EXISTS `tp_fournisseur` (
  `idd` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nom` varchar(16) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `adresse` text CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `telephone` varchar(20) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`idd`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tp_fournisseur`
--

INSERT INTO `tp_fournisseur` (`idd`, `nom`, `adresse`, `telephone`) VALUES
(1, 'bureau 2b', 'Borgo', '0495200000'),
(2, 'bureau+', 'Ajaccio', '0495200001'),
(3, 'bureau valle', 'Bastia', '0495200002'),
(4, 'bureau 2a', 'Ajaccio', '0495200011'),
(5, 'AlloBureau', 'vers ici', ''),
(6, 'MicroMedia', 'tu voudrais savoir', '00000000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
