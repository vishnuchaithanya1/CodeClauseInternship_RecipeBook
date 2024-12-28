CREATE DATABASE recipe_platform;

USE recipe_platform;

CREATE TABLE recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    ingredients TEXT NOT NULL,
    image LONGBLOB NOT NULL
);

