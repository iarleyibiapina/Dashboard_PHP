-- Mysql

-- ?migrate
CREATE DATABASE IF NOT EXISTS teste;

USE teste;

-- ?migrations
CREATE TABLE IF NOT EXISTS users(
    id_user INT PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(255) NOT NULL,
);

-- ?seeder
INSERT INTO users VALUES ("John"), ("Mike");

