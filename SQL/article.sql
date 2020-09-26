CREATE TABLE article
(

    id int
(11) PRIMARY KEY NOT NULL
    AUTO_INCREMENT,

title varchar
    (100) NOT NULL,

content text NOT NULL,

author varchar
    (100) NOT NULL,

chapo varchar
    (255) NOT NULL,

createdAt datetime NOT NULL


) ENGINE=InnoDB DEFAULT CHARSET=utf8;