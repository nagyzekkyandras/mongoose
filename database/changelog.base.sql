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

--changeset nagyzekkyandras:2 labels:base context:base
--comment: create nexus table
CREATE TABLE nexus (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NULL,
  url VARCHAR(255) NOT NULL,
  create_date DATE NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id ASC) VISIBLE);