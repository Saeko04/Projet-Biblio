-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 18 mars 2025 à 13:24
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
-- Structure de la table `Livres`
--

CREATE TABLE `Livres` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `date_sortie` varchar(20) NOT NULL,
  `cotation` varchar(50) NOT NULL,
  `auteur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Livres`
--

INSERT INTO `Livres` (`id`, `titre`, `date_sortie`, `cotation`, `auteur`) VALUES
(1, 'Chats!', '15/10/2019', 'B', 'Frédéric Brrémaud'),
(2, 'Lou!', '01/01/2004', 'B', 'Julien Neel'),
(3, 'Elles', '01/01/2021', 'B', 'Kid Toussaint'),
(4, 'Garfield - Tome 72 - Chat de bibliothèque', '06/11/2019', 'B', 'Jim Davis'),
(5, 'Sonic the Hedgehog', '23/06/1991', 'B', 'Ian Flynn'),
(6, 'Superman', '18/04/1938', 'B', 'Jerry Siegel et Joe Shuster'),
(7, 'Les Aventures de Tintin', '10/01/1929', 'B', 'Hergé'),
(8, 'Astérix', '29/10/1959', 'B', 'René Goscinny, Albert Uderzo'),
(9, 'Supergirl', '01/05/1959', 'B', 'Michael Green, Mike Johnson, Mahmud Asrar'),
(10, 'La Face cachée du Monde', '01/01/2003', 'D', 'Pierre Péan/Philippe Cohen'),
(11, 'Sharko m\'a tuer', '01/01/2018', 'D', 'Fabrice Lhomme/Gérard Davet'),
(12, 'L\'anthologie illustree des animaux fascinants', '01/01/2020', 'D', 'Marie Leymarie'),
(13, 'Le Manuel des Echecs', '01/01/2005', 'D', 'Tristan Garnier et Louis Vendel'),
(14, 'Les explorateurs de L\'univers', '01/01/1950', 'D', 'Galfard Christophe'),
(15, 'Tu mourras moins bête', '01/01/2012', 'D', 'Marion Montaigne<'),
(16, 'Black Code', '01/01/2017', 'D', 'Ronald J. Deibert'),
(17, 'Homo Deus, Une brève histoire de l\'avenir', '08/09/2016', 'D', 'Yuval Noah Harari'),
(18, 'La Seconde guerre mondiale', '01/01/1947', 'D', 'Antony Beevor'),
(19, 'Sailor Moon', '28/02/1992', 'M', 'Naoko Takeuchi'),
(20, 'Blue Lock', '01/08/2018', 'M', 'Kaneshiro Muneyuki'),
(21, 'Les Carnets de l\'Apothicaire', '01/01/2011', 'M', 'Natsu Hyuuga/Itsuki Nanao'),
(22, 'Dragon Ball Super', '20/06/2015', 'M', 'Toyotaro'),
(23, 'Dragon Ball', '03/12/1984', 'M', 'Akira Toriyama'),
(24, 'Naruto', '21/09/1999', 'M', 'Masashi Kishimoto'),
(25, 'City Hunter', '06/03/1985', 'M', 'Tsukasa Hojo'),
(26, 'Cat\'s Eye', '01/01/1981', 'M', '18/11/2015'),
(27, 'Assassination Classroom', '02/07/2012', 'M', 'Yusei Matsui'),
(28, 'Six couronnes écarlates', '01/01/2022', 'R', 'Elizabeth Lim'),
(29, 'Le Prince Cruel', '02/05/2018', 'R', 'Holly Black'),
(30, 'La nuit où les étoiles se sont éteintes', '01/01/2020', 'R', 'Marie Alhinho, Nine Gorman'),
(31, 'Le Père Goriot', '01/01/1835', 'R', 'Honoré de Balzac'),
(32, 'Le Tour du Monde en 80 Jours', '30/01/1873', 'R', 'Jules Verne'),
(33, '1984', '08/06/1949', 'R', 'George Orwell'),
(34, 'Le Petit Prince', '06/04/1943', 'R', 'Antoine de Saint-Exupéry'),
(35, 'Il s\'appelait... le soldat inconnu', '01/01/2018', 'R', 'Arthur Ténor'),
(36, 'Mary Poppins', '01/01/1934', 'R', 'Pamela Lyndon Travers'),
(37, 'Dune', '01/08/1965', 'S', 'Frank Hebert'),
(38, 'La Parabole du semeur', '01/01/1993', 'S', 'Octavia Estelle Butle'),
(39, 'Fahrenheit 451', '19/10/1953', 'S', 'Ray Bradbury'),
(40, 'Alien: Le huitième passager', '01/01/1979', 'S', 'Alan Dean Foste'),
(41, 'Hypérion', '26/05/1989', 'S', 'Dan Simmons'),
(42, 'La Planète Des Singes', '01/01/1963', 'S', 'Pierre Boulle'),
(43, 'Exo', '01/01/2015', 'S', 'Fonda Lee'),
(44, 'Les Mange-Forêts', '01/01/2019', 'S', 'Kim Aldany'),
(45, 'Neuromancien', '01/07/1984', 'S', 'William Gibson');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Livres`
--
ALTER TABLE `Livres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cotation` (`cotation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Livres`
--
ALTER TABLE `Livres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Livres`
--
ALTER TABLE `Livres`
  ADD CONSTRAINT `fk_cotation` FOREIGN KEY (`cotation`) REFERENCES `Genres` (`id_cotation`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
