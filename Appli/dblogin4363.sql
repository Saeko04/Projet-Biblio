-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 25 mars 2025 à 21:05
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
-- Base de données : `admin`
--

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `nom` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `id_cotation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`nom`, `id`, `id_cotation`) VALUES
('BD', 1, 'B'),
('documentaires', 2, 'D'),
('mangas', 3, 'M'),
('romans', 4, 'R'),
('SF', 5, 'S');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `cotation` varchar(50) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `date_sortie` date DEFAULT NULL,
  `resume` varchar(100) NOT NULL,
  `image_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `titre`, `cotation`, `auteur`, `date_sortie`, `resume`, `image_url`) VALUES
(1, 'Chats!', 'B', 'Frédéric Brrémaud', '2019-10-15', 'Des chats variés, et Pamplemousse, vif et tigré !', ''),
(2, 'Lou!', 'B', 'Julien Neel', '2004-01-01', 'Lou, fille complice, styliste et rêveuse en amour.', ''),
(3, 'Elles', 'B', 'Kid Toussaint', '2021-01-01', 'Elle est unique. Au collège, elle cache cinq personnalités.', ''),
(4, 'Garfield - Tome 72 - Chat de bibliothèque', 'B', 'Jim Davis', '2019-11-06', 'Garfield adore les livres, mais préfère les lasagnes.', ''),
(5, 'Sonic the Hedgehog', 'B', 'Ian Flynn', '1991-06-23', 'Sonic sent une menace, il rassemble ses amis.', ''),
(6, 'Superman', 'B', 'Jerry Siegel et Joe Shuster', '1938-04-18', 'Superman, né Kal-El, a grandi chez les Kent.', ''),
(7, 'Les Aventures de Tintin', 'B', 'Hergé', '1929-01-10', 'Tintin et Haddock partent à la chasse au trésor.', ''),
(8, 'Astérix', 'B', 'René Goscinny, Albert Uderzo', '1959-10-29', 'Les 12 Travaux d\'Astérix, un album culte à découvrir.', ''),
(9, 'Supergirl', 'B', 'Michael Green, Mike Johnson, Mahmud Asrar', '1959-05-01', 'Kara Zor-El découvre la Terre et ses nouveaux pouvoirs.', ''),
(10, 'La Face cachée du Monde', 'O', 'Pierre Péan/Philippe Cohen', '2003-01-01', 'Le Monde a dérivé, influençant la politique et le pouvoir.', ''),
(11, 'Sharko m\'a tuer', 'O', 'Fabrice Lhomme/Gérard Davet', '2018-01-01', 'Des victimes du sarkozysme révèlent la face cachée du pouvoir.', ''),
(12, 'L\'anthologie illustrée des animaux fascinants', 'O', 'Marie Leymarie', '2020-01-01', 'Livre documentaire sur 100 animaux classiques et originaux.', ''),
(13, 'Le Manuel des Échecs', 'O', 'Tristan Garnier et Louis Vendel', '2005-01-01', 'Apprenez les principes des échecs avec une bande dessinée.', ''),
(14, 'Les explorateurs de l\'univers', 'O', 'Galfard Christophe', '1950-01-01', 'Zoé, Aidan et Kookab partent dans un voyage cosmique.', ''),
(15, 'Tu mourras moins bête', 'O', 'Marion Montaigne', '2012-01-01', 'La Professeur Moustache démystifie les erreurs scientifiques au cinéma.', ''),
(16, 'Black Code', 'O', 'Ronald J. Deibert', '2017-01-01', 'Livre sur l\'impact des technologies numériques sur la vie privée.', ''),
(17, 'Homo Deus, Une brève histoire de l\'avenir', 'O', 'Yuval Noah Harari', '2016-09-08', 'Homo Deus explore l\'avenir avec les nouvelles technologies.', ''),
(18, 'La Seconde guerre mondiale', 'O', 'Antony Beevor', '1947-01-01', 'La Seconde Guerre mondiale : un conflit qui a marqué l’histoire mondiale.', ''),
(19, 'Sailor Moon', 'M', 'Naoko Takeuchi', '1992-02-28', 'Usagi devient Sailor Moon pour protéger le Cristal d’Argent.', ''),
(20, 'Blue Lock', 'M', 'Kaneshiro Muneyuki', '2018-08-01', 'Blue Lock forme l’attaquant ultime après l’échec du Japon.', ''),
(21, 'Les Carnets de l\'Apothicaire', 'M', 'Natsu Hyuuga/Itsuki Nanao', '2011-01-01', 'Mao Mao enquête sur des meurtres au palais impérial.', ''),
(22, 'Dragon Ball Super', 'M', 'Toyotaro', '2015-06-20', 'Dragon Ball Super poursuit les aventures de Goku après Buu.', ''),
(23, 'Dragon Ball', 'M', 'Akira Toriyama', '1984-12-03', 'Son Goku et Bulma partent en quête des Dragon Balls.', ''),
(24, 'Naruto', 'M', 'Masashi Kishimoto', '1999-09-21', 'Naruto rêve de devenir Hokage malgré son passé difficile.', ''),
(25, 'City Hunter', 'M', 'Tsukasa Hojo', '1985-03-06', 'City Hunter traque les criminels de Shinjuku sans relâche.', ''),
(26, 'Cat\'s Eye', 'M', 'Tsukasa Hojo', '1981-01-01', 'Cat’s Eye, trois sœurs voleuses, défient la police et l’amour.', ''),
(27, 'Assassination Classroom', 'M', 'Yusei Matsui', '2012-07-02', 'Des élèves doivent assassiner leur professeur insolite.', ''),
(28, 'Six couronnes écarlates', 'R', 'Elizabeth Lim', '2022-01-01', 'Shiori doit briser un sort pour sauver ses frères et son royaume.', ''),
(29, 'Le Prince Cruel', 'R', 'Holly Black', '2018-05-02', 'Jude lutte pour sa place à la cour face aux cruels Fæs.', ''),
(30, 'La nuit où les étoiles se sont éteintes', 'R', 'Marie Alhinho, Nine Gorman', '2020-01-01', 'Finn sombre mais trouve une lueur d’espoir avec Nate.', ''),
(31, 'Le Père Goriot', 'R', 'Honoré de Balzac', '1835-01-01', 'Goriot se sacrifie pour ses filles ingrates et meurt seul.', ''),
(32, 'Le Tour du Monde en 80 Jours', 'R', 'Jules Verne', '1873-01-30', 'Phileas Fogg tente un pari fou : faire le tour du monde.', ''),
(33, '1984', 'R', 'George Orwell', '1949-06-08', 'En 1984, un régime totalitaire contrôle chaque aspect de la vie.', ''),
(34, 'Le Petit Prince', 'R', 'Antoine de Saint-Exupéry', '1943-04-06', 'Un aviateur rencontre un mystérieux enfant dans le désert.', ''),
(35, 'Il s\'appelait... le soldat inconnu', 'R', 'Arthur Ténor', '2018-01-01', 'François part en guerre et devient le Soldat inconnu.', ''),
(36, 'Mary Poppins', 'R', 'Pamela Lyndon Travers', '1934-01-01', 'Mary Poppins transforme la vie des enfants Banks par magie.', ''),
(37, 'Dune', 'S', 'Frank Hebert', '1965-08-01', 'Une planète désertique, une épice convoitée, un destin prophétique.', ''),
(38, 'La Parabole du semeur', 'S', 'Octavia Estelle Butle', '1993-01-01', 'Une jeune femme rédige une Bible d\'espoir dans un monde en ruines.', ''),
(39, 'Fahrenheit 451', 'S', 'Ray Bradbury', '1953-10-19', 'Dans une société où les livres sont interdits, un pompier se révolte.', ''),
(40, 'Alien: Le huitième passager', 'S', 'Alan Dean Foste', '1979-01-01', 'Un équipage spatial affronte une créature mortelle.', ''),
(41, 'Hypérion', 'S', 'Dan Simmons', '1989-05-26', 'Sept pèlerins cherchent des réponses sur une planète mystérieuse.', ''),
(42, 'La Planète Des Singes', 'S', 'Pierre Boulle', '1963-01-01', 'Des humains dominés par des singes dans un monde renversé.', ''),
(43, 'Exo', 'S', 'Fonda Lee', '2015-01-01', 'Donovan, Exo, déchiré entre Zhrees et révolte.', ''),
(44, 'Les Mange-Forêts', 'S', 'Kim Aldany', '2019-01-01', 'Deux ados affrontent un monde dangereux pour retrouver des parents.', ''),
(45, 'Les Mange-Forêts', 'S', 'Kim Aldany', '2019-01-01', 'Deux ados affrontent un monde dangereux pour retrouver des parents disparus.', '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id_cotation` (`id_cotation`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cotation` (`cotation`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
