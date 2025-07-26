-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 30 juil. 2024 à 13:48
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `room_detente`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `name`, `lastname`, `email`, `message`, `date`) VALUES
(1, 'Mels', 'Nidjy', 'l.nidjy@live.fr', 'Subject : Message test', '0000-00-00 00:00:00'),
(2, 'Bede', 'Alexia', 'bede.alexia@gmail.com', 'Subject : Message Test 2\r\nJe ne sais pas trop quoi dire, mais en tout cas tu fais du bon boulot, Big Up !', '2024-06-01 20:49:39'),
(4, 'Gallagan', 'Blake', 'test@gmail.com', 'Subject : Test envoi de message', '2024-07-24 13:33:14'),
(5, 'Chirac', 'Pierre', 'cp_test@gmail.com', 'Subject : Test Message \r\nIl est 2h37 et la date d\'aujourd\'hui est le 24/07/2024.\r\nMerci', '2024-07-24 14:38:04');

-- --------------------------------------------------------

--
-- Structure de la table `fidelity`
--

CREATE TABLE `fidelity` (
  `id` int(11) NOT NULL,
  `points` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `account_activation_hash` varchar(64) DEFAULT NULL,
  `password_hash` varchar(256) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `date_of_birth`, `phone`, `email`, `account_activation_hash`, `password_hash`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(1, 'Mels', 'Nidjy', NULL, 782656547, 'l.nidjy@live.fr', NULL, '$2y$10$P4ntUbF5mzyNa5hDbTw4.OFdox39lj8Omgxum2ALrDOA/hmobewtK', NULL, NULL),
(2, 'Auclert', 'Axelle', '2001-04-14', NULL, 'Axelle.auclert@yahoo.fr', NULL, '', NULL, NULL),
(3, 'Wastiaux\r\n', 'Daphné', '2001-05-18', NULL, 'Daphné.pub1805@gmail.com', NULL, '', NULL, NULL),
(4, 'Delisle', 'Beatrice', '1979-11-14', NULL, 'Beatrice.theojade@gmail.com', NULL, '', NULL, NULL),
(5, 'Comblain', 'Tifanie', '1987-04-21', NULL, '', NULL, '', NULL, NULL),
(6, 'Grâce', 'Ingrid', '1984-02-15', NULL, '1@gmail.com', NULL, '', NULL, NULL),
(7, 'Flores', 'Sandrine', '1975-01-04', NULL, 'Flores.sandrine04@yahoo.com', NULL, '', NULL, NULL),
(8, 'Lecamus', 'Maryse', '1969-09-25', NULL, 'Maryle_1@hotmail.com', NULL, '', NULL, NULL),
(9, 'Sicot', 'Monique', NULL, NULL, 'Monique.sicot@free.fr', NULL, '', NULL, NULL),
(10, 'Bloenen', 'Paula', '1965-10-12', NULL, 'Paulabloenen@gmail.com', NULL, '', NULL, NULL),
(11, 'Verdier', 'Caroline', '1984-04-18', NULL, 'Cverdier94@yahoo.fr', NULL, '', NULL, NULL),
(12, 'Rivas Valor\r\n', 'Solyaneth', '1978-02-07', NULL, '2@gmail.com', NULL, '', NULL, NULL),
(13, 'Henon', 'Pauline', '1982-09-24', NULL, 'Henon.pauline75@hotmail.fr', NULL, '', NULL, NULL),
(14, 'Evora', 'Amandia', '1964-01-01', NULL, 'a@gmail.com', NULL, '', NULL, NULL),
(15, 'Isidoro', 'Elodie', '1989-06-04', NULL, 'Didikinsley@hotmail.fr', NULL, '', NULL, NULL),
(66, 'TEst', 'Johny', NULL, 712345678, 'lnidjy@gmail.com', NULL, '$2y$10$JloQcTxSadFUGwUF1J.qoeGEYLLJOwSqNoUufApFJZElYiDiNR58i', NULL, NULL),
(2305, 'Mels', 'Julie', '1999-04-23', 666918009, 'admin@roomdetente.com', '324e2f523719e01b281a0a44e19dc758d5fb9b6626022abb3773a8ea20b74b21', '$2y$10$sJp5AG5M1OvSuKjvzXwIYu9HOzGajN2aOcIUy2KWrsO43dQNUp36.', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `fidelity`
--
ALTER TABLE `fidelity`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`),
  ADD UNIQUE KEY `account_activation_hash` (`account_activation_hash`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `fidelity`
--
ALTER TABLE `fidelity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2307;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
