-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 13 oct. 2021 à 23:52
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `aero_space`
--
CREATE DATABASE IF NOT EXISTS `aero_space` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `aero_space`;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `idCli` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `idevent` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `time` date NOT NULL,
  `startdate` date NOT NULL,
  `finishdate` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `available` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

CREATE TABLE `hotel` (
  `id` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `etoile` int(100) NOT NULL,
  `hebergement` varchar(100) NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `Path_image` varchar(255) NOT NULL,
  `Path_video` varchar(255) NOT NULL,
  `chambre` varchar(100) NOT NULL,
  `ch_In` int(255) NOT NULL,
  `ch_db` int(255) NOT NULL,
  `ch_tr` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `hotel`
--

INSERT INTO `hotel` (`id`, `nom`, `etoile`, `hebergement`, `lieu`, `Path_image`, `Path_video`, `chambre`) VALUES
('0', 'dad', 252, 'okop', 'zad', 'C:UsersBadis KhalsiDocumentsCapture d’écran 2021-09-11 123210.png', 'C:UsersBadis KhalsiVideosCapturesIonic App - Opera 2021-09-27 20-09-18.mp4', ''),
('1', 'bb', 2, 'aaa', 'sousse', 'C:UsersBadis KhalsiPictures\0004.jpg', 'C:UsersBadis KhalsiVideosCapturesIonic App - Opera 2021-09-27 20-09-18.mp4', 'Single/ '),
('12', 'Badis', 2, 'hahah', 'soussse', '0', '0', ''),
('1215', 'baada', 252, 'fezf', 'zefze', 'C:UsersBadis KhalsiPictureshotel.PNG', 'C:UsersBadis KhalsiVideosCapturesIonic App - Opera 2021-09-27 20-09-18.mp4', 'Chambre Quadriple Chambre Single '),
('1262', 'baada', 252, 'fezf', 'zefze', 'C:UsersBadis KhalsiPictureshotel.PNG', 'C:UsersBadis KhalsiVideosCapturesIonic App - Opera 2021-09-27 20-09-18.mp4', 'Chambre Triple '),
('555', 'ffff', 2, 'fefe', 'tun', '0', '0', ''),
('99', 'dvd', 898, 'sds', 'fvds', '0', '0', '');

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `idoffre` varchar(255) NOT NULL,
  `id_reservation` varchar(255) NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `date_validite` date NOT NULL,
  `taux_de_remise` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `Path_image` varchar(255) NOT NULL,
  `Path_video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `resevation`
--

CREATE TABLE `resevation` (
  `idRes` varchar(255) NOT NULL,
  `idH` varchar(255) NOT NULL,
  `referance` varchar(255) NOT NULL,
  `numv` varchar(255) NOT NULL,
  `idCli` varchar(255) NOT NULL,
  `idevent` varchar(255) NOT NULL,
  `dateValidation` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `pos_map` int(11) NOT NULL,
  `prixT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `transport`
--

CREATE TABLE `transport` (
  `reference` varchar(255) NOT NULL,
  `typee` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `driver` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

CREATE TABLE `vol` (
  `nomv` varchar(255) NOT NULL,
  `numv` varchar(255) NOT NULL,
  `dated` date NOT NULL,
  `datea` date NOT NULL,
  `chauffeur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--
Create table employees(
idvarchar(6) PRIMARY KEY,
sex varchar(5),
name varchar (30),
phone varchar (13),
adress varchar(30),
email varchar(30),
salary varchar(20),
province varchar(30),
RegDate DATE
)


-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) DEFAULT NULL,
  `title` varchar(45) NOT NULL,
  `author` varchar(45) NOT NULL,
  `year` int(4) NOT NULL,
  `pages` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `year`, `pages`) VALUES
(123, 'elyes', 'gggh', 100, 1),
(12, 'a', 'a', 123456, 1),
(11, '22', '33', 44, 55);

-- --------------------------------------------------------

--
-- Structure de la table `factures_clients`
--

CREATE TABLE `factures_clients` (
  `id_Fac` varchar(42) NOT NULL,
  `nom_client` varchar(42) NOT NULL,
  `date_fac` date NOT NULL,
  `reglement_fac` varchar(42) NOT NULL,
  `etat_fac` varchar(42) NOT NULL,
  `TVA_fac` int(42) NOT NULL,
  `remise_fac` int(42) NOT NULL,
  `NB_fac` varchar(42) NOT NULL,
  `Totale_fac` int(42) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `factures_clients`
--

INSERT INTO `factures_clients` (`id_Fac`, `nom_client`, `date_fac`, `reglement_fac`, `etat_fac`, `TVA_fac`, `remise_fac`, `NB_fac`, `Totale_fac`) VALUES
('NQHVGJ', 'rrrr', '2021-09-30', 'Espece', 'factures archivée', 1, 1, 'dd', 1),
('XSSCLR', 'wajih', '2021-09-30', 'Espece', 'factures archivÃ©e', 1, 1, 'dd', 1);

-- --------------------------------------------------------

--
-- Structure de la table `factures_employes`
--

CREATE TABLE `factures_employes` (
  `id_Emp` varchar(42) NOT NULL,
  `nom_emp` varchar(42) NOT NULL,
  `date_fac` date NOT NULL,
  `reglement_fac` varchar(42) NOT NULL,
  `etat_fac` varchar(42) NOT NULL,
  `TVA_fac` int(8) NOT NULL,
  `bonus_fac` int(8) NOT NULL,
  `NB_fac` varchar(42) NOT NULL,
  `Totale_fac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `factures_employes`
--

INSERT INTO `factures_employes` (`id_Emp`, `nom_emp`, `date_fac`, `reglement_fac`, `etat_fac`, `TVA_fac`, `bonus_fac`, `NB_fac`, `Totale_fac`) VALUES
('BFPBKN', 'aymen', '2021-10-05', 'Le salaire a été envoyé', 'Carte', 1000, 1000, '1000', 1000),
('HPVGFS', 'amine', '2021-09-29', 'Le salaire a été envoyé', 'Espece', 1, 1, 'aaaaa', 20),
('HVYBUO', 'aa11', '2021-09-30', 'pas en coré', 'Espece', 1, 1, '1', 1),
('PMGQCJ', 'aa', '2021-09-30', 'Le salaire a été envoyé', 'Espece', 1, 1, '1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `offvsres`
--

CREATE TABLE `offvsres` (
  `Vres` int(11) NOT NULL,
  `Voff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `offvsres`
--

INSERT INTO `offvsres` (`Vres`, `Voff`) VALUES
(120, 50);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `factures_clients`
--
ALTER TABLE `factures_clients`
  ADD PRIMARY KEY (`id_Fac`);

--
-- Index pour la table `factures_employes`
--
ALTER TABLE `factures_employes`
  ADD PRIMARY KEY (`id_Emp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`idCli`),
  ADD KEY `idCli` (`idCli`),
  ADD KEY `idCli_2` (`idCli`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`idevent`),
  ADD KEY `idevent` (`idevent`);

--
-- Index pour la table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`idoffre`),
  ADD KEY `id_reservation` (`id_reservation`);

--
-- Index pour la table `resevation`
--
ALTER TABLE `resevation`
  ADD PRIMARY KEY (`idRes`),
  ADD UNIQUE KEY `idH` (`id`),
  ADD KEY `idH_2` (`idH`),
  ADD KEY `referance` (`referance`),
  ADD KEY `numv` (`numv`),
  ADD KEY `idH_3` (`idH`),
  ADD KEY `idCli` (`idCli`),
  ADD KEY `idRes` (`idRes`),
  ADD KEY `idevent` (`idevent`);

--
-- Index pour la table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`reference`),
  ADD KEY `reference` (`reference`);

--
-- Index pour la table `vol`
--
ALTER TABLE `vol`
  ADD PRIMARY KEY (`numv`),
  ADD UNIQUE KEY `numv` (`numv`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `offre_ibfk_1` FOREIGN KEY (`id_reservation`) REFERENCES `resevation` (`idRes`);

--
-- Contraintes pour la table `resevation`
--
ALTER TABLE `resevation`
  ADD CONSTRAINT `resevation_ibfk_10` FOREIGN KEY (`idevent`) REFERENCES `events` (`idevent`),
  ADD CONSTRAINT `resevation_ibfk_6` FOREIGN KEY (`numv`) REFERENCES `vol` (`numv`),
  ADD CONSTRAINT `resevation_ibfk_7` FOREIGN KEY (`idH`) REFERENCES `hotel` (`id`),
  ADD CONSTRAINT `resevation_ibfk_8` FOREIGN KEY (`referance`) REFERENCES `transport` (`reference`),
  ADD CONSTRAINT `resevation_ibfk_9` FOREIGN KEY (`idCli`) REFERENCES `clients` (`idCli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
