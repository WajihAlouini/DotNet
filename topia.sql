-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 09 mai 2023 à 13:43
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `topia`
--

-- --------------------------------------------------------

--
-- Structure de la table `actor`
--

CREATE TABLE `actor` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `dateN` date NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `actor`
--

INSERT INTO `actor` (`id`, `nom`, `prenom`, `dateN`, `img`) VALUES
(22, 'actor1', 'a', '2023-04-12', 'téléchargement.jpeg'),
(23, 'actor2', 'z', '2023-04-08', 'ChrisEvans-2019_r.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `nomB` varchar(50) NOT NULL,
  `DescB` varchar(700) NOT NULL,
  `UrlB` varchar(255) NOT NULL,
  `duree` varchar(255) NOT NULL,
  `Released` date NOT NULL,
  `imgB` varchar(255) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `types_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `nomB`, `DescB`, `UrlB`, `duree`, `Released`, `imgB`, `writer_id`, `types_id`) VALUES
(1, 'eya', 'eya', 'j2_R9JHQAMs', '123', '2003-12-12', 'téléchargement.jpeg', 1, 1),
(2, 'atomic', 'asdfds', 'j2_R9JHQAMs', '231', '1996-12-13', 'spider.jpg', 1, 1),
(3, 'eya', 'eya', 'j2_R9JHQAMs', '133', '2004-12-12', 'ChrisEvans-2019_r.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `nomg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id`, `nomg`) VALUES
(7, 'Action, Adventure, Science Fiction, Drama'),
(8, 'Drama, History');

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `DescF` varchar(400) NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `UrlF` varchar(255) NOT NULL,
  `duree` varchar(255) NOT NULL,
  `Released` date NOT NULL,
  `imgs` varchar(255) NOT NULL,
  `actor_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `movie`
--

INSERT INTO `movie` (`id`, `nom`, `DescF`, `trailer`, `UrlF`, `duree`, `Released`, `imgs`, `actor_id`, `genre_id`) VALUES
(5, 'Avatar', 'In the 22nd century, a paraplegic Marine is dispatched to the moon Pandora on a unique mission, but becomes torn between following orders and protecting an alien civilization.', 'CM79GTEm2ps', 'ZekafEW6vJs', '162', '2009-08-10', 'avatar.jpeg', 22, 7),
(6, 'Spider-Man: Homecoming', 'Following the events of Captain America: Civil War, Peter Parker, with the help of his mentor Tony Stark, tries to balance his life as an ordinary high school student in Queens, New York City, with fighting crime as his superhero alter ego Spider-Man as a new threat, the Vulture, emerges.', 'rk-dF1lIbIg', 'S8ZUtWTuHT4', '133', '2017-05-07', 'spider.jpg', 23, 8),
(8, 'MADAGASCAR', 'Le film met en scène des animaux du zoo de Central Park dans l\'arrondissement new-yorkais de Manhattan, qui vont devoir retrouver Marty, le seul zèbre du zoo qui s\'est échappé. Mais malencontreusement, cette mission de sauvetage va les emmener tout droit à Madagascar.', 'orAqhC-Hp_o', 'iIKOCMNvm70', '190', '2008-08-02', 'MADAGASCAR.jpg', 22, 8);

-- --------------------------------------------------------

--
-- Structure de la table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rate`
--

INSERT INTO `rate` (`id`, `rating`, `movie_id`, `genre_id`) VALUES
(2, '5', 6, 8),
(3, '3', 8, 8),
(4, '5', 8, 8),
(5, '1', 8, 8),
(6, '4', 8, 8),
(7, '5', 8, 8),
(8, '4', 5, 7),
(9, '5', 5, 7),
(10, '5', 8, 8),
(11, '4', 6, 8);

-- --------------------------------------------------------

--
-- Structure de la table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `book_id` int(11) NOT NULL,
  `types_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rates`
--

INSERT INTO `rates` (`id`, `rating`, `book_id`, `types_id`) VALUES
(1, '5', 2, 1),
(2, '2', 2, 1),
(3, '4', 2, 1),
(4, '4', 2, 1),
(5, '3', 2, 1),
(6, '4', 1, 1),
(7, '5', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `nomt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `nomt`) VALUES
(1, 'History');

-- --------------------------------------------------------

--
-- Structure de la table `writer`
--

CREATE TABLE `writer` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `daten` date NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `writer`
--

INSERT INTO `writer` (`id`, `nom`, `prenom`, `daten`, `img`) VALUES
(1, 'eyaaaa', 'eya', '2001-12-12', 'avatar.jpeg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writer_id` (`writer_id`),
  ADD KEY `types_id` (`types_id`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actor_id` (`actor_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Index pour la table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Index pour la table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `types_id` (`types_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `writer`
--
ALTER TABLE `writer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `writer`
--
ALTER TABLE `writer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`writer_id`) REFERENCES `writer` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`types_id`) REFERENCES `types` (`id`);

--
-- Contraintes pour la table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`id`),
  ADD CONSTRAINT `movie_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);

--
-- Contraintes pour la table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`),
  ADD CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);

--
-- Contraintes pour la table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_ibfk_1` FOREIGN KEY (`types_id`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `rates_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
