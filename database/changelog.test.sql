--liquibase formatted sql

--changeset nagyzekkyandras:1 labels:user context:user
--comment: create test admin user
INSERT INTO mongoose.users (name, password, email, auth_type, permission, create_date, last_login)
VALUES ('admin', 'admin', 'admin@admin.hu', 'native', 'admin', now(), now());
--rollback DELETE FROM users WHERE name=admin;

--changeset nagyzekkyandras:2 labels:user context:user
--comment: create test admin user
INSERT INTO mongoose.users (name, password, email, auth_type, permission, create_date, last_login)
VALUES ('tesztelek', 'password', 'teszt@elek.hu', 'native', 'user', now(), now());
--rollback DELETE FROM users WHERE name=tesztelek;
