-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 21 oct. 2020 à 14:37
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `Matheo-blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `chapo` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `thumb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `chapo`, `createdAt`, `user_id`, `updatedAt`, `thumb`) VALUES
(1, 'If You Don\'t Stop It... You\'ll Go Blind!!!', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 'Acute lacrimal canaliculitis', '2020-10-20 12:04:04', 14, '2020-10-19 11:47:44', ''),
(2, 'Ghost Adventures', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 'Corrosion of second degree of right foot, sequela', '2020-10-20 12:04:11', 14, '2020-10-20 12:04:36', ''),
(3, 'Everybody\'s Fine', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\n\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\n\nFusce consequat. Nulla nisl. Nunc nisl.', 'Solitary bone cyst, ulna and radius', '2020-10-20 12:04:13', 14, '2020-10-20 12:04:39', ''),
(4, 'Luna de Avellaneda', 'In congue. Etiam justo. Etiam pretium iaculis justo.\n\nIn hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.\n\nNulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', 'Traumatic rupture of right ear drum, subsequent encounter', '2020-10-20 12:04:16', 15, '2020-10-20 12:04:41', ''),
(5, 'Easy A', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\n\nProin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', 'Toxic effect of carb monx from mtr veh exhaust, accidental', '2020-10-20 12:04:18', 11, '2020-10-20 12:04:43', ''),
(6, 'Cat Soup (Nekojiru-so)', 'Fusce consequat. Nulla nisl. Nunc nisl.', 'Muscle wasting and atrophy, NEC, right lower leg', '2020-10-20 12:04:21', 11, '2020-10-20 12:04:45', ''),
(7, 'Monsturd', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 'Explosion on board sailboat', '2020-10-20 12:04:23', 12, '2020-10-20 12:04:47', ''),
(8, 'Zatoichi\'s Flashing Sword (Zatôichi abare tako) (Zatôichi 7)', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', 'Other fracture of occiput, unspecified side, 7thD', '2020-10-20 12:04:26', 12, '2020-10-20 12:04:49', ''),
(9, 'Brown Sugar', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 'Unsp inj unsp musc/fasc/tend at thi lev, unsp thigh, sequela', '2020-10-20 12:04:28', 12, '2020-10-20 12:04:51', ''),
(10, 'Humble Pie (American Fork)', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\n\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\n\nPhasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 'Postproc hemor of an endo sys org fol an endo sys procedure', '2020-10-20 12:04:30', 13, '2020-10-19 11:47:16', ''),
(11, 'I\'ll Sleep When I\'m Dead', 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.\n\nSed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 'Nondisp avulsion fx tuberosity of unsp calcaneus, sequela', '2020-10-20 12:04:33', 12, '2020-10-20 12:04:54', ''),
(18, 'Title', 'Content', 'Chapopopopop', '2020-10-20 11:52:38', 12, '2020-10-20 11:52:38', 'Capture d’écran 2020-10-19 à 17.11.13.png'),
(19, 'Title', 'aaaaaaaa', 'ccccccccccaaa', '2020-10-20 16:19:14', 12, '2020-10-20 16:19:14', 'image001.png'),
(20, 'Title', 'aaaa', 'ccccccccccaaa', '2020-10-20 16:51:10', 12, '2020-10-20 16:51:10', 'Capture d’écran 2020-10-12 à 09.41.44.png');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `createdAt` datetime NOT NULL,
  `role_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `pseudo`, `password`, `createdAt`, `role_id`) VALUES
(11, 'Zeller', 'Mathéo', 'matheo.zeller@gmail.com', 'LeZellus', '$2y$10$2nYw2GbSy.6w2uXkBWzEh.KaMiJiSvIgKnISFGP5CBF59NcKosv5m', '2020-09-28 17:25:56', 2),
(12, 'Mathéo', 'Zeller', 'matheo.zeller@gmail.com', 'Admin', '$2y$10$PigUCXpyOoJZzlp58Ip67eo6ThKWF5kMD4TDa2crADdOGgyvjGeSW', '2020-09-28 17:26:38', 1),
(13, 'Test', 'Test', 'matheo.zeller@gmail.com', 'Test', '$2y$10$2nOja/wLKxqNG.oL2gYaGeKHCp8CoNs6QSBo6s8o873E3DEb5P75i', '2020-09-30 16:10:29', 1),
(14, 'Mathéo', 'Zeller', 'matheo.zeller@gmail.com', 'LeZellus', '$2y$10$ewg5KxblDMyJQ2VgmWdAVuaaCx9uvR7j/aFXD.DF3VWMjj88CcLvK', '2020-10-14 11:46:11', 1),
(15, 'Mathéo', 'Zeller', 'matheo.zeller@gmail.com', 'Admin', '$2y$10$3XwMMjG/8VlK9KnHNxwQSeJSDC7ymmKZAZ5BOu8i.ioaqtKvtwc6C', '2020-10-15 09:36:17', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_article_id` (`article_id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);