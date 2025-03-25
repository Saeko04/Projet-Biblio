-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 25 mars 2025 à 12:28
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `cotation` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `auteur` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `date_sortie` date DEFAULT NULL,
  `image_url` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cotation` (`cotation`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `cotation`, `auteur`, `date_sortie`, `image_url`) VALUES
(1, 'Chats!', 'B', 'Frédéric Brémaud', '2019-10-15', ''),
(2, 'Lou!', 'B', 'Julien Neel', '2004-01-01', ''),
(3, 'Elles', 'B', 'Kid Toussaint', '2021-01-01', ''),
(4, 'Garfield - Tome 72 - Chat de bibliothèque', 'B', 'Jim Davis', '2019-11-06', ''),
(5, 'Sonic the Hedgehog', 'B', 'Ian Flynn', '1991-06-23', ''),
(6, 'Superman', 'B', 'Jerry Siegel et Joe Shuster', '1938-04-18', ''),
(7, 'Les Aventures de Tintin', 'B', 'Hergé', '1929-01-10', ''),
(8, 'Astérix', 'B', 'René Goscinny, Albert Uderzo', '1959-10-29', ''),
(9, 'Supergirl', 'B', 'Michael Green, Mike Johnson, Mahmud Asrar', '1959-05-01', ''),
(10, 'La Face cachée du Monde', 'D', 'Pierre Péan/Philippe Cohen', '2003-01-01', ''),
(11, 'Sharko m\'a tuer', 'D', 'Fabrice Lhomme/Gérard Davet', '2018-01-01', ''),
(12, 'L\'anthologie illustree des animaux fascinants', 'D', 'Marie Leymarie', '2020-01-01', ''),
(13, 'Le Manuel des Echecs', 'D', 'Tristan Garnier et Louis Vendel', '2005-01-01', ''),
(14, 'Les explorateurs de L\'univers', 'D', 'Galfard Christophe', '1950-01-01', ''),
(15, 'Tu mourras moins bête', 'D', 'Marion Montaigne<', '2012-01-01', ''),
(16, 'Black Code', 'D', 'Ronald J. Deibert', '2017-01-01', ''),
(17, 'Homo Deus, Une brève histoire de l\'avenir', 'D', 'Yuval Noah Harari', '2016-09-08', ''),
(18, 'La Seconde guerre mondiale', 'D', 'Antony Beevor', '1947-01-01', ''),
(19, 'Sailor Moon', 'M', 'Naoko Takeuchi', '1992-02-28', ''),
(20, 'Blue Lock', 'M', 'Kaneshiro Muneyuki', '2018-08-01', ''),
(21, 'Les Carnets de l\'Apothicaire', 'M', 'Natsu Hyuuga/Itsuki Nanao', '2011-01-01', ''),
(22, 'Dragon Ball Super', 'M', 'Toyotaro', '2015-06-20', ''),
(23, 'Dragon Ball', 'M', 'Akira Toriyama', '1984-12-03', ''),
(24, 'Naruto', 'M', 'Masashi Kishimoto', '1999-09-21', ''),
(25, 'City Hunter', 'M', 'Tsukasa Hojo', '1985-03-06', ''),
(26, 'Cat\'s Eye', 'M', 'Tsukasa Hojo', '1981-01-01', ''),
(27, 'Assassination Classroom', 'M', 'Yusei Matsui', '2012-07-02', ''),
(28, 'Six couronnes écarlates', 'R', 'Elizabeth Lim', '2022-01-01', ''),
(29, 'Le Prince Cruel', 'R', 'Holly Black', '2018-05-02', ''),
(30, 'La nuit où les étoiles se sont éteintes', 'R', 'Marie Alhinho, Nine Gorman', '2020-01-01', ''),
(31, 'Le Père Goriot', 'R', 'Honoré de Balzac', '1835-01-01', ''),
(32, 'Le Tour du Monde en 80 Jours', 'R', 'Jules Verne', '1873-01-30', ''),
(33, '1984', 'R', 'George Orwell', '1949-06-08', ''),
(34, 'Le Petit Prince', 'R', 'Antoine de Saint-Exupéry', '1943-04-06', ''),
(35, 'Il s\'appelait... le soldat inconnu', 'R', 'Arthur Ténor', '2018-01-01', ''),
(36, 'Mary Poppins', 'R', 'Pamela Lyndon Travers', '1934-01-01', ''),
(37, 'Dune', 'S', 'Frank Hebert', '1965-08-01', ''),
(38, 'La Parabole du semeur', 'S', 'Octavia Estelle Butle', '1993-01-01', ''),
(39, 'Fahrenheit 451', 'S', 'Ray Bradbury', '1953-10-19', ''),
(40, 'Alien: Le huitième passager', 'S', 'Alan Dean Foste', '1979-01-01', ''),
(41, 'Hypérion', 'S', 'Dan Simmons', '1989-05-26', ''),
(42, 'La Planète Des Singes', 'S', 'Pierre Boulle', '1963-01-01', ''),
(43, 'Exo', 'S', 'Fonda Lee', '2015-01-01', ''),
(44, 'Les Mange-Forêts', 'S', 'Kim Aldany', '2019-01-01', ''),
(45, 'Neuromancien', 'S', 'William Gibson', '1984-07-01', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `livres`
--
ALTER TABLE `livres`
  ADD CONSTRAINT `fk_cotation` FOREIGN KEY (`cotation`) REFERENCES `genres` (`id_cotation`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
