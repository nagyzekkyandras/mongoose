--liquibase formatted sql

--changeset nagyzekkyandras:1 labels:base context:base
--comment: create users table
CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  password VARCHAR(255) NULL,
  email VARCHAR(255) NOT NULL,
  auth_type VARCHAR(255) NOT NULL,
  permission VARCHAR(255) NOT NULL,
  create_date DATE NOT NULL,
  last_login DATE NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id ASC) VISIBLE);

--changeset nagyzekkyandras:2 labels:test context:test
--comment: create test admin user
INSERT INTO mongoose.users (name, password, email, auth_type, permission, create_date, last_login)
VALUES ('admin', 'admin', 'admin@admin.hu', 'native', 'admin', now(), now());
--rollback DELETE FROM users WHERE name=admin;

--changeset nagyzekkyandras:3 labels:test context:test
--comment: create test admin user
INSERT INTO mongoose.users (name, password, email, auth_type, permission, create_date, last_login)
VALUES ('tesztelek', 'password', 'teszt@elek.hu', 'native', 'user', now(), now());
--rollback DELETE FROM users WHERE name=tesztelek;