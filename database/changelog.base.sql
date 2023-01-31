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

--changeset nagyzekkyandras:3 labels:base context:base
--comment: create gitlab table
CREATE TABLE gitlab (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  url VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id ASC) VISIBLE);

--changeset nagyzekkyandras:4 labels:base context:base
--comment: create pipeline table
CREATE TABLE pipeline (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  gitlab_id INT,
  gitlab_pipeline_id VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (gitlab_id) REFERENCES gitlab(id),
  UNIQUE INDEX id_UNIQUE (id ASC) VISIBLE);

--changeset nagyzekkyandras:5 labels:base context:base
--comment: create trigger table
CREATE TABLE triggers (
  id INT NOT NULL AUTO_INCREMENT,
  pipeline_id INT,
  gitlab_id INT,
  nexus_id INT,
  PRIMARY KEY (id),
  FOREIGN KEY (gitlab_id) REFERENCES gitlab(id),
  FOREIGN KEY (pipeline_id) REFERENCES pipeline(id),
  FOREIGN KEY (pipeline_id) REFERENCES pipeline(id),
  UNIQUE INDEX id_UNIQUE (id ASC) VISIBLE);
