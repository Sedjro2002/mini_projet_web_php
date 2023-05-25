mysql -u utilisateur -p

CREATE DATABASE nom_base_de_donnees;

USE testdb;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(50),
  prenoms VARCHAR(50),
  email VARCHAR(100),
  mot_de_passe VARCHAR(255)
);

CREATE TABLE student (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(50),
  prenoms VARCHAR(50),
  sexe VARCHAR(10),
  profession VARCHAR(50),
  description TEXT,
  contact VARCHAR(100),
  competences VARCHAR(100),
  interets VARCHAR(100)
);

CREATE TABLE images (INSERT INTO student (
    id,
    nom,
    prenoms,
    sexe,
    profession,
    description,
    contact,
    competences,
    interets
  )
VALUES (
    id:int,
    'nom:varchar',
    'prenoms:varchar',
    'sexe:varchar',
    'profession:varchar',
    'description:text',
    'contact:varchar',
    'competences:longtext',
    'interets:longtext'
  );
  id INT AUTO_INCREMENT PRIMARY KEY,
  image VARCHAR(100),
  description TEXT
);
