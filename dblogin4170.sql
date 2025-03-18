-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 13 mars 2025 à 10:20
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
-- Base de données : `dblogin4170`
--

-- --------------------------------------------------------

--
-- Structure de la table `Genre`
--

CREATE TABLE `Genre` (
  `id` int(11) NOT NULL,
  `nom` int(20) NOT NULL,
  `id_livre` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Livres`
--

CREATE TABLE `Livres` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `date_sortie` varchar(20) NOT NULL,
  `cotation` varchar(50) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `resume` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Livres`
--

INSERT INTO `Livres` (`id`, `titre`, `date_sortie`, `cotation`, `auteur`, `resume`) VALUES
(1, 'Chats!', 'Fevrier 2010', 'B1-400', 'Frédéric Brrémaud', 'Des chats variés, et Pamplemousse, vif et tigré !'),
(2, 'Lou!', 'Fevrier 2010', 'B2-400', 'Julien Neel', 'Lou, fille complice, styliste et rêveuse en amour.'),
(3, 'Elles', '26 Mars 2021', 'B3-400', 'Kid Toussaint', 'Elle est unique. Au collège, elle cache cinq personnalités.'),
(4, 'Garfield - Tome 72         Chat de bibliothèque', '8 octobre 2021', 'B4-400', 'Jim Davis', 'Garfield adore les livres, mais préfère les lasagnes.\r\n\r\n'),
(5, 'Sonic the Hedgehog', 'Ian Flynn', 'B5-400', '8 octobre 2017', 'Sonic sent une menace, il rassemble ses amis.'),
(6, 'Superman', '18 mai 1939', 'B6-400', 'Jerry Siegel et Joe Shuster', 'Superman, né Kal-El, a grandi chez les Kent.'),
(7, 'Les Aventures de Tintin', '09/09/1998', 'B7-400', 'Hergé', 'Tintin et Haddock partent à la chasse au trésor.'),
(8, 'Astérix', '19/10/2016', 'B8-400', 'René Goscinny, Albert Uderzo', 'Les 12 Travaux d\'Astérix, un album culte à découvrir.\r\n\r\n'),
(9, 'Supergirl', '21/10/2019', 'B9-400', 'Michael Green, Mike Johnson, Mahmud Asrar', 'Kara Zor-El découvre la Terre et ses nouveaux pouvoirs.'),
(10, 'La Face cachée du Monde', 'Fevrier 2003', 'O1-300', 'Pierre Péan/Philippe Cohen', 'Le Monde a dérivé, influençant la politique et le pouvoir.'),
(11, 'Sharko m\'a tuer', '31 Aout 2011', 'O2-300', 'Fabrice Lhomme/Gérard Davet', 'Des victimes du sarkozysme révèlent la face cachée du pouvoir.'),
(12, 'L\'anthologie illustree des animaux fascinants', '11 Octobre 2018', 'O3-300', 'Marie Leymarie', 'Livre documentaire sur 100 animaux classiques et originaux.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n'),
(13, 'Le Manuel des Echecs', '2024', 'O4-300', 'Tristan Garnier et Louis Vendel', 'Apprenez les principes des échecs avec une bande dessinée.'),
(14, 'Les explorateurs de L\'univers', '2024', 'O5-300', 'Galfard Christophe', 'Zoé, Aidan et Kookab partent dans un voyage cosmique.'),
(15, 'Tu mourras moins bête', '2011', 'O6-300', 'Marion Montaigne<', 'La Professeur Moustache démystifie les erreurs scientifiques au cinéma.'),
(16, 'Black Code', '19/11/2013', 'O7-300', 'Ronald J. Deibert', 'Livre sur l\'impact des technologies numériques sur la vie privée.'),
(17, 'Homo Deus, Une brève histoire de l\'avenir', '06/09/2017', 'O8-300', 'Yuval Noah Harari', 'Homo Deus explore l\'avenir avec les nouvelles technologies.'),
(18, 'La Seconde guerre mondiale', '10/10/2012', 'O9-300', 'Antony Beevor', 'La Seconde Guerre mondiale : un conflit qui a marqué l’histoire mondiale.'),
(19, 'Sailor Moon', '27 Juin 2012', 'M1-200', 'Naoko Takeuchi', 'Usagi devient Sailor Moon pour protéger le Cristal d’Argent.'),
(20, 'Blue Lock', '2 Juin 2021', 'M2-200', 'Kaneshiro Muneyuki', 'Blue Lock forme l’attaquant ultime après l’échec du Japon.'),
(21, 'Les Carnets de l\'Apothicaire', '21 Janvier 2021', 'M3-200', 'Natsu Hyuuga/Itsuki Nanao', 'Mao Mao enquête sur des meurtres au palais impérial.'),
(22, 'Dragon Ball Super', '2015', 'M4-200', 'Toyotaro', 'Dragon Ball Super poursuit les aventures de Goku après Buu.'),
(23, 'Dragon Ball', '1984', 'M5-200', 'Akira Toriyama', 'Son Goku et Bulma partent en quête des Dragon Balls.'),
(24, 'Naruto', '1999', 'M6-200', 'Masashi Kishimoto', 'Naruto rêve de devenir Hokage malgré son passé difficile.'),
(25, 'City Hunter', '21/09/2022', 'M7-200', 'Tsukasa Hojo', 'City Hunter traque les criminels de Shinjuku sans relâche.'),
(26, 'Cat\'s Eye', '18/11/2015', 'M8-200', '18/11/2015', 'Cat’s Eye, trois sœurs voleuses, défient la police et l’amour.'),
(27, 'Assassination Classroom', '04/10/2013', 'M9-200', 'Yusei Matsui', 'Des élèves doivent assassiner leur professeur insolite.\r\n\r\n'),
(28, 'Six couronnes écarlates', '19/04/2023 ', 'R1-100', 'Elizabeth Lim', 'Shiori doit briser un sort pour sauver ses frères et son royaume.'),
(29, 'Le Prince Cruel', '2 janvier 2018', 'R2-100', 'Holly Black', 'Jude lutte pour sa place à la cour face aux cruels Fæs.'),
(30, 'La nuit où les étoiles se sont éteintes', '30 Juin 2021', 'R3-100', 'Marie Alhinho, Nine Gorman', 'Finn sombre mais trouve une lueur d’espoir avec Nate.'),
(31, 'Le Père Goriot', '1834', 'R4-100', 'Honoré de Balzac', 'Goriot se sacrifie pour ses filles ingrates et meurt seul.'),
(32, 'Le Tour du Monde en 80 Jours', '1872', 'R5-100', 'Jules Verne', 'Phileas Fogg tente un pari fou : faire le tour du monde.'),
(33, '1984', '1949', 'R6-100', 'George Orwell', 'En 1984, un régime totalitaire contrôle chaque aspect de la vie.'),
(34, 'Le Petit Prince', '23/02/1999', 'R7-100', 'Antoine de Saint-Exupéry', 'Un aviateur rencontre un mystérieux enfant dans le désert.'),
(35, 'Il s\'appelait... le soldat inconnu<', '28/10/2010', 'R8-100', 'Arthur Ténor', 'François part en guerre et devient le Soldat inconnu.'),
(36, 'Mary Poppins', '07/11/2018', 'R9-100', 'Pamela Lyndon Travers', 'Mary Poppins transforme la vie des enfants Banks par magie.'),
(37, 'Dune', '26 Aout 2021', 'S1-500', 'Frank Hebert', 'Une planète désertique, une épice convoitée, un destin prophétique.'),
(38, 'La Parabole du semeur', '08 Octobre 2020', 'S2-500', 'Octavia Estelle Butle', 'Une jeune femme rédige une Bible d\'espoir dans un monde en ruines.'),
(39, 'Fahrenheit 451', 'Octobre 2000', 'S3-500', 'Ray Bradbury', 'Dans une société où les livres sont interdits, un pompier se révolte'),
(40, 'Alien: Le huitième passager', '1980 ', 'S4-500', 'Alan Dean Foste', 'Un équipage spatial affronte une créature mortelle.'),
(41, 'Hypérion', '1989 ', 'S5-500', 'Dan Simmons', 'Sept pèlerins cherchent des réponses sur une planète mystérieuse.'),
(42, 'La Planète Des Singes', '1963 ', 'S6-500', 'Pierre Boulle', 'Des humains dominés par des singes dans un monde renversé.'),
(43, 'Exo', '21/02/2018', 'S7-500', 'Fonda Lee', 'Donovan, Exo, déchiré entre Zhrees et révolte.'),
(44, 'Les Mange-Forêts', '07/04/2005', 'S8-500', 'Kim Aldany', 'Deux ados affrontent un monde dangereux pour retrouver des parents disparus.'),
(45, 'Neuromancien', '01/07/1984', 'S9-500', 'William Gibson', 'Un hacker en disgrâce plonge dans le cyberespace pour une mission risquée.');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `pseudo` varchar(20) NOT NULL,
  `mot de passe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Genre`
--
ALTER TABLE `Genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_livre` (`id_livre`);

--
-- Index pour la table `Livres`
--
ALTER TABLE `Livres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Genre`
--
ALTER TABLE `Genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Livres`
--
ALTER TABLE `Livres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Genre`
--
ALTER TABLE `Genre`
  ADD CONSTRAINT `Genre_ibfk_1` FOREIGN KEY (`id_livre`) REFERENCES `Genre` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
