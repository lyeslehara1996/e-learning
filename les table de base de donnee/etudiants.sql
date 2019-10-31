-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 18 mai 2019 à 10:29
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `etudiants`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `idEtu` int(255) NOT NULL,
  `nomEtu` varchar(60) COLLATE utf8_bin NOT NULL,
  `prenomEtu` varchar(60) COLLATE utf8_bin NOT NULL,
  `pseudoEtu` varchar(60) COLLATE utf8_bin NOT NULL,
  `emailEtu` varchar(255) COLLATE utf8_bin NOT NULL,
  `adresseEtu` varchar(255) COLLATE utf8_bin NOT NULL,
  `passwordEtu` varchar(100) COLLATE utf8_bin NOT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_bin NOT NULL,
  `confirmed_at` date NOT NULL,
  `photoEtu` text COLLATE utf8_bin NOT NULL,
  `date_NEtu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`idEtu`, `nomEtu`, `prenomEtu`, `pseudoEtu`, `emailEtu`, `adresseEtu`, `passwordEtu`, `confirmation_token`, `confirmed_at`, `photoEtu`, `date_NEtu`) VALUES
(19, 'MANSOURA', 'kamel', 'etudiant', 'mansourakociela@gmail.com', 'souk el had', '$2y$10$dxVzbRIn432ho.qqlRYImOv5LFtLPSqQGDnwhYKqksTUEigHk2yFO', '', '2019-05-03', 'photos/', '1997-09-21');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`idEtu`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `idEtu` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
