-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 03 Décembre 2017 à 21:17
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `tp_article`
--

CREATE TABLE `tp_article` (
  `idnum` tinyint(4) NOT NULL,
  `designation` varchar(16) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `quantite` int(100) NOT NULL,
  `date` date NOT NULL,
  `prix` float(12,0) NOT NULL,
  `iddcom` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tp_article`
--

INSERT INTO `tp_article` (`idnum`, `designation`, `quantite`, `date`, `prix`, `iddcom`) VALUES
(1, 'stylo rouge', 5, '2016-11-18', 2, 1),
(2, 'crayon', 8, '2016-11-18', 1, 1),
(3, 'stylo bleu', 11, '2016-11-25', 1, 1),
(4, 'stylo bleu', 12, '2016-11-25', 1, 1),
(5, 'stylo vert', 2, '2016-11-25', 1, 1),
(6, 'Feuilles 80g', 500, '2016-11-25', 5, 1),
(7, 'Feuilles 70g', 500, '2016-11-25', 4, 1),
(8, 'feuilles 80g', 2, '2016-01-01', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tp_commande`
--

CREATE TABLE `tp_commande` (
  `idd` tinyint(4) NOT NULL,
  `idFournisseur` tinyint(4) NOT NULL,
  `idArticle` tinyint(4) NOT NULL,
  `status` varchar(6) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `quantité` tinyint(4) NOT NULL,
  `idService` tinyint(4) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prix` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tp_commande`
--

INSERT INTO `tp_commande` (`idd`, `idFournisseur`, `idArticle`, `status`, `quantité`, `idService`, `date`, `prix`) VALUES
(40, 1, 1, 'c', 6, 4, '2017-12-02 23:00:00', 12),
(41, 1, 1, 'c', 6, 4, '2017-12-02 23:00:00', 12),
(42, 1, 1, 'c', 6, 4, '2017-12-02 23:00:00', 12),
(43, 3, 5, 'c', 6, 4, '2017-12-02 23:00:00', 6);

-- --------------------------------------------------------

--
-- Structure de la table `tp_fournisseur`
--

CREATE TABLE `tp_fournisseur` (
  `idd` tinyint(4) NOT NULL,
  `nom` varchar(16) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `adresse` text CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `telephone` varchar(20) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Structure de la table `tp_historique`
--

CREATE TABLE `tp_historique` (
  `idd` tinyint(4) NOT NULL,
  `idnumA` tinyint(4) NOT NULL,
  `idnumS` tinyint(4) NOT NULL,
  `quantité` tinyint(4) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tp_service`
--

CREATE TABLE `tp_service` (
  `idd` tinyint(4) NOT NULL,
  `libelle` varchar(16) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tp_service`
--

INSERT INTO `tp_service` (`idd`, `libelle`, `date`) VALUES
(1, 'repro', '2016-11-22 14:58:27'),
(2, 'dsi', '2016-11-22 14:58:27'),
(3, 'valorisation', '2016-11-22 15:10:08'),
(4, 'commande', '2016-11-22 15:11:34'),
(5, 'communication', '2016-11-22 15:11:58'),
(6, 'restauration', '2016-11-22 15:21:15'),
(7, 'technique', '2016-11-25 09:31:45'),
(8, 'location', '2016-11-25 09:36:19'),
(9, 'juridique', '2016-11-25 09:44:21');

-- --------------------------------------------------------

--
-- Structure de la table `tp_stock`
--

CREATE TABLE `tp_stock` (
  `idd` tinyint(4) NOT NULL,
  `idnum` tinyint(4) NOT NULL,
  `quantité` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `tp_article`
--
ALTER TABLE `tp_article`
  ADD PRIMARY KEY (`idnum`);

--
-- Index pour la table `tp_commande`
--
ALTER TABLE `tp_commande`
  ADD PRIMARY KEY (`idd`);

--
-- Index pour la table `tp_fournisseur`
--
ALTER TABLE `tp_fournisseur`
  ADD PRIMARY KEY (`idd`);

--
-- Index pour la table `tp_historique`
--
ALTER TABLE `tp_historique`
  ADD PRIMARY KEY (`idd`);

--
-- Index pour la table `tp_service`
--
ALTER TABLE `tp_service`
  ADD PRIMARY KEY (`idd`);

--
-- Index pour la table `tp_stock`
--
ALTER TABLE `tp_stock`
  ADD PRIMARY KEY (`idd`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `tp_article`
--
ALTER TABLE `tp_article`
  MODIFY `idnum` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `tp_commande`
--
ALTER TABLE `tp_commande`
  MODIFY `idd` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `tp_fournisseur`
--
ALTER TABLE `tp_fournisseur`
  MODIFY `idd` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `tp_historique`
--
ALTER TABLE `tp_historique`
  MODIFY `idd` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tp_service`
--
ALTER TABLE `tp_service`
  MODIFY `idd` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `tp_stock`
--
ALTER TABLE `tp_stock`
  MODIFY `idd` tinyint(4) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
