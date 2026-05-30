CREATE DATABASE asena_actas;
USE asena_actas;

CREATE TABLE actas(
id INT AUTO_INCREMENT PRIMARY KEY,
titulo VARCHAR(255),
fecha DATE,
descripcion TEXT,
responsable VARCHAR(100),
estado VARCHAR(50)
);
