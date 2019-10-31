-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 18 mai 2019 à 10:27
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
-- Base de données :  `cours`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `idCours` int(11) NOT NULL,
  `nomCours` varchar(152) COLLATE utf8_bin NOT NULL,
  `specialité` varchar(220) COLLATE utf8_bin NOT NULL,
  `descriptionCours` varchar(255) COLLATE utf8_bin NOT NULL,
  `id_Spe` int(20) NOT NULL,
  `fileCours` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`idCours`, `nomCours`, `specialité`, `descriptionCours`, `id_Spe`, `fileCours`) VALUES
(3, 'informatique', 'pdf', 'zergzegzeg', 41, 'cours/primitives exercices.pdf'),
(4, 'sécurité', 'java', 'ddddd', 48, 'cours/Convocation Entretien.pdf'),
(5, 'informatique', 'pdf', 'ffffffffffffffffffff', 48, 'cours/Convocation Entretien.pdf'),
(6, 'initialisation algoritheme', 'pdf', 'premier cours', 48, 'cours/'),
(7, 'php', 'informatique', 'cours sur php', 48, ''),
(8, 'php', 'informatique', 'cours sur php', 48, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`idCours`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `idCours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
