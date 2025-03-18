-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 18 mars 2025 à 13:23
-- Version du serveur : 10.3.39-MariaDB-0+deb10u1
-- Version de PHP : 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dblogin4169`
--

-- --------------------------------------------------------

--
-- Structure de la table `Genres`
--

CREATE TABLE `Genres` (
  `nom` varchar(20) NOT NULL,
  `id` int(10) NOT NULL,
  `id_cotation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Genres`
--

INSERT INTO `Genres` (`nom`, `id`, `id_cotation`) VALUES
('BD', 1, 'B'),
('documentaires', 2, 'D'),
('mangas', 3, 'M'),
('romans', 4, 'R'),
('SF', 5, 'S');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Genres`
--
ALTER TABLE `Genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id_cotation` (`id_cotation`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
