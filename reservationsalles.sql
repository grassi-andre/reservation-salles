-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 10 fév. 2022 à 17:55
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservationsalles`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(5, 'dfghjk', 'dfghyujikol', '2022-02-16 09:00:00', '2022-02-16 10:00:00', 1),
(6, 'ghlkg', 'mjghkmjgb', '2022-02-16 10:00:00', '2022-02-16 11:00:00', 1),
(7, 'lele', 'lele', '2022-02-04 10:00:00', '2022-02-04 11:00:00', 1),
(8, ' bbn,;', 'njkl:', '2022-02-05 10:00:00', '2022-02-05 11:00:00', 1),
(9, 'test a', 'test a', '2022-02-06 11:20:00', '2022-02-06 12:20:00', 1),
(10, 'test b', 'test b ', '2022-02-06 17:23:00', '2022-02-06 18:23:00', 1),
(11, 'test c ', 'test c ', '2022-02-06 17:25:00', '2022-02-06 18:25:00', 1),
(12, 'b n,;', 'bn,;', '2022-02-04 14:31:00', '2022-02-04 15:31:00', 1),
(14, 'soins du visage', 'soin peau ', '2022-02-25 10:00:00', '2022-02-25 11:00:00', 16),
(15, 'soins du visage ', 'gommage au charbon ', '2022-02-16 13:00:00', '2022-02-16 14:00:00', 16),
(16, 'soins', 'sois du visage', '2022-02-09 09:37:00', '2022-02-09 10:37:00', 17);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'sss', 'bf9661defa3daecacfde5bde0214c4a439351d4d'),
(2, 'vv', '4cf997735475afd79f8711e22efaa9d306294785'),
(3, 'yuygyg', '54fd1711209fb1c0781092374132c66e79e2241b'),
(4, 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8'),
(5, 'e', '58e6b3a414a1e090dfc6029add0f3555ccba127f'),
(6, '', ''),
(7, 't', '8efd86fb78a56a5145ed7739dcb00c78581c5375'),
(8, 'zzz', '40fa37ec00c761c7dbb6ebdee6d4a260b922f5f4'),
(9, 'ccc', 'f36b4825e5db2cf7dd2d2593b3f5c24c0311d8b2'),
(10, 'azazaz', '56e14d6bb3f0af52f90cf8a4300114e648d8de88'),
(11, 'ppp', 'b3054ff0797ff0b2bbce03ec897fe63e0b6490e0'),
(12, 'tony', '1001e8702733cced254345e193c88aaa47a4f5de'),
(13, 'ok', '7a85f4764bbd6daf1c3545efbbf0f279a6dc0beb'),
(14, 'okkkk', 'a23bf742ec97c0b86a51d387bf7ec94159a7ec6c'),
(15, 'z', '395df8f7c51f007019cb30201c49e884b46b92fa'),
(16, 'tony rsa', '3bdec47a7c74eb308896fa7e1fdb4921bec80427'),
(17, 'melissa', 'de4ab6e26db462b930510ba83e9f80b7db2bef88');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ffffffff` (`id_utilisateur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `ffffffff` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
