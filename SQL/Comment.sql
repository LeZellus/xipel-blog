CREATE TABLE `comment`
(
   `id` int
(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
   `pseudo` varchar
(100) NOT NULL,
   `content` text NOT NULL,
   `createdAt` datetime NOT NULL,
   `article_id` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `comment`
ADD KEY `fk_article_id`
(`article_id`);

ALTER TABLE `comment`
ADD CONSTRAINT `fk_article_id` FOREIGN KEY
(`article_id`) REFERENCES `article`
(`id`);