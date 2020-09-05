CREATE TABLE `user`
(
`id` int
(11) NOT NULL,
`pseudo` varchar
(100) NOT NULL,
`firstName` varchar
(100) NOT NULL,
`lastName` varchar
(100) NOT NULL,
`email` varchar
(100) NOT NULL,
`password` varchar
(60) NOT NULL,
`createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `user`
ADD PRIMARY KEY
(`id`);

ALTER TABLE `user`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;