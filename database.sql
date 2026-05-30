CREATE DATABASE IF NOT EXISTS asena_actas;
USE asena_actas;

CREATE TABLE IF NOT EXISTS actas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255),
    fecha DATE,
    descripcion TEXT,
    responsable VARCHAR(100),
    estado VARCHAR(50),
    archivo LONGBLOB,
    nombre_archivo VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS responsables(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255)
);
