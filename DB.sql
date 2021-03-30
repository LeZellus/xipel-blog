-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 30 mars 2021 à 08:37
-- Version du serveur :  5.7.30
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Matheo-blog`
--
CREATE DATABASE IF NOT EXISTS `Matheo-blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Matheo-blog`;

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
(41, 'Occaecati dolor officiis non vel nemo optio voluptate.', 'At laudantium voluptatem animi voluptas consequuntur et. Natus explicabo voluptatibus consequatur officia suscipit occaecati libero. Eligendi qui fuga enim ut rerum autem.', 'Qui illo enim veniam neque perspiciatis totam.', '1004-08-13 02:13:30', 33, '1899-02-15 11:54:22', 'randomThumbs/thumb-0.jpeg'),
(42, 'Atque maiores quibusdam a aut.', 'Quaerat eum enim porro non optio neque. At qui id illo aut doloribus. Error fugiat et et et.', 'Perferendis alias et eos maxime sed laborum.', '1709-05-10 13:16:23', 33, '0977-12-09 18:46:23', 'randomThumbs/thumb-1.jpeg'),
(43, 'Perspiciatis aut nostrum enim eum.', 'Voluptas optio sunt qui beatae labore alias omnis. Perspiciatis eos quasi voluptate laudantium vero.', 'Quae dicta et corporis voluptas.', '2021-03-10 15:32:56', 33, '2021-03-10 15:32:56', 'randomThumbs/thumb-2.jpeg'),
(44, 'Aut at doloremque reprehenderit error incidunt modi debitis et.', 'Beatae tempore debitis voluptas neque eius. Necessitatibus eos dignissimos in corporis dolores quo eaque. Velit repellendus molestias aliquam voluptatibus modi aut.', 'Soluta molestias quia eveniet ad sed.', '0563-01-05 10:37:29', 33, '0392-03-16 15:58:43', 'randomThumbs/thumb-3.jpeg'),
(45, 'Voluptatem nulla omnis ut ex nemo.', 'Incidunt corrupti consectetur quia distinctio aliquid. Id non ut animi minus et. Asperiores distinctio sit aut distinctio quibusdam. Nesciunt rerum numquam sed quis.', 'Aut illum officia beatae omnis numquam commodi.', '0161-05-19 10:26:31', 33, '0594-07-05 23:31:48', 'randomThumbs/thumb-4.jpeg'),
(46, 'Voluptatem fugiat id non illo beatae.', 'Dolor expedita ut aut debitis quam aliquam sed. Ullam sapiente consequatur ipsam ad.', 'Aut aut rerum cum adipisci facere.', '0665-10-30 19:28:22', 33, '1362-08-16 22:26:41', 'randomThumbs/thumb-5.jpeg'),
(47, 'Ut qui totam cupiditate est.', 'Hic ut minus expedita facilis hic provident pariatur. Voluptas autem nam est ducimus quidem molestias. Adipisci et culpa amet maiores rem est praesentium. Praesentium possimus porro eius aut.', 'Et vel quia consectetur dolorum repudiandae quia.', '1679-12-06 12:31:12', 33, '0828-12-13 22:31:47', 'randomThumbs/thumb-6.jpeg'),
(48, 'Minus facere maiores quia nostrum.', 'Aut perspiciatis facere reprehenderit rerum. Accusamus hic aliquid ipsa eligendi et. Exercitationem sint dignissimos dolore deleniti rem ipsum.', 'Dolores quasi est ullam doloribus quam.', '1257-01-21 21:30:43', 33, '1499-02-25 03:35:27', 'randomThumbs/thumb-7.jpeg'),
(49, 'Nam itaque exercitationem est corporis.', 'Dolorem doloribus delectus sequi tenetur soluta ipsum. Delectus ut voluptas ea voluptatem saepe. Omnis assumenda nihil sint ut non quis. Omnis libero quaerat ut nisi.', 'Quod nihil amet sint voluptas ad.', '0778-07-15 06:07:34', 33, '0566-01-28 10:38:23', 'randomThumbs/thumb-8.jpeg'),
(50, 'Accusamus explicabo et sit illo laborum incidunt aut.', 'Fugiat rem sunt nihil. Corporis ut aut mollitia. Corrupti perferendis aut vel dolor.', 'Totam quia laboriosam earum.', '1685-03-02 17:16:56', 33, '1928-03-13 14:32:25', 'randomThumbs/thumb-9.jpeg'),
(51, 'Ut est fugit corrupti excepturi qui tempora.', 'Impedit assumenda veritatis ducimus quasi blanditiis. Suscipit omnis et error inventore in. Est temporibus quae eveniet rem. Eum consequatur nihil rerum.', 'Distinctio dolores quidem voluptas maxime.', '1453-10-18 07:23:45', 33, '0523-05-19 22:42:48', 'randomThumbs/thumb-10.jpeg'),
(54, 'Voluptas necessitatibus a expedita enim velit.', 'Voluptatem ea blanditiis sit culpa aut consectetur. Sit facere accusamus autem tempora explicabo nostrum. Ducimus voluptates eos omnis id ut.', 'Et esse iure saepe.', '1275-07-10 08:32:41', 33, '1055-06-10 01:44:06', 'randomThumbs/thumb-13.jpeg'),
(55, 'Iure et ut quisquam aut.', '<p>Nam quas est itaque dolorum non ut aliquam dolore. Ut illum non sed sapiente mollitia sequi quo. Maiores dolorem deleniti dolor nesciunt illo ut ut. Illum fugit sint aut.</p>', 'In earum inventore sed qui.', '0430-01-23 16:52:26', 34, '2021-03-30 10:25:25', 'randomThumbs/thumb-14.jpeg');

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

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `pseudo`, `content`, `createdAt`, `flag`, `article_id`) VALUES
(1, 'Visiteur', 'Génial !', '2021-03-30 10:11:34', 1, 55),
(2, 'Visiteur', 'Trop bien !', '2021-03-30 10:11:50', 1, 55),
(3, 'Visiteur', 'Trop bien !', '2021-03-30 10:13:15', 1, 51),
(4, 'Visiteur', 'Article génial !', '2021-03-30 10:13:31', 1, 47),
(5, 'Visiteur', 'Article génial !', '2021-03-30 10:13:36', 1, 54),
(6, 'Visiteur', 'Article génial !', '2021-03-30 10:13:41', 1, 49),
(7, 'Visiteur', 'Article génial !', '2021-03-30 10:13:50', 1, 46),
(8, 'admin', 'Génial !', '2021-03-30 10:24:31', 0, 55),
(9, 'admin', 'Génial !', '2021-03-30 10:24:58', 0, 55),
(10, 'admin', 'Cet article est bien !', '2021-03-30 10:27:00', 0, 55);

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
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `pseudo`, `password`, `createdAt`, `role_id`) VALUES
(33, 'Mathéo', 'Zeller', 'matheo.zeller@gmail.com', 'LeZellus', '$2y$10$0kbM6tHuHElq2ToUmHY7oOsyYFyKoKTHjLh5Woj3/gNMT2aH3ssNi', '2021-03-23 10:45:56', 1),
(34, 'Admin', 'Admin', 'admin@exemple.fr', 'Admin', '$2y$10$IXgxrGFEfXC5HHh5OAlUfuVoChreY3izynRbvymFa1beqM5LG3jRS', '2021-03-30 09:57:42', 1),
(35, 'Visiteur', 'Visiteur', 'visiteur@exemple.fr', 'Visiteur', '$2y$10$fZVF3v.O//BLyNImYh/zwemp6E7A6u1tGlk0ziFWvrFbB3akkoqZO', '2021-03-30 09:58:54', 2);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
