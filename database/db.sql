-- to create a new database
CREATE DATABASE iptvs;

-- to use database
use iptvs;

-- creating a new table
CREATE TABLE `iptv` (
  `id_iptv` int NOT NULL AUTO_INCREMENT,
  `nom_Iptv` varchar(30) NOT NULL,
  `duree` varchar(20) NOT NULL,
  `id_fournisseur` varchar(30) NOT NULL,
  PRIMARY KEY (`id_iptv`)

);
CREATE TABLE `fournisseur` (
  `id_fournisseur` varchar(30) NOT NULL AUTO_INCREMENT, 
  `nom_fournisseur` varchar(30) NOT NULL,
  PRIMARY KEY (`id_fournisseur`)
);
CREATE TABLE `chaine` (
  `id_chaine` varchar(20) NOT NULL,
  `nom_chaine` varchar(30) NOT NULL,
  `id_iptv` varchar(30) NOT NULL,
  `url` varchar(30) NOT NULL,
  PRIMARY KEY (`id_chaine`)
);


-- to show all tables
show tables;

-- to describe table
describe iptv;