ALTER TABLE user
ADD COLUMN role_id int
(11) NOT NULL;

ALTER TABLE user
ADD CONSTRAINT fk_role_id FOREIGN KEY
(role_id) REFERENCES role
(id);