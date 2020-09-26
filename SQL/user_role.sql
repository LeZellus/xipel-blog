CREATE TABLE role
(
    id int
(11) NOT NULL,
    name varchar
(15) NOT NULL
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO role
    (
    id,name
    )
VALUES
    ('1', 'admin'),
    ('2', 'user');

ALTER TABLE role
ADD PRIMARY KEY
(id);