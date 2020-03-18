-- Verwijder de databes en de tabel uit PHPmyAdmin
-- DROP DATABASE IF EXISTS `registratie`;
-- DROP TABLE `klant` FROM `registratie` IF EXISTS;
--
-- Maak de database registratie aan
CREATE DATABASE IF NOT EXISTS `sfeer`;
-- Gebruik de database registratie
USE `registratie`;
-- Maak de tabel klant aan
CREATE TABLE if NOT EXISTS `klant` (
  `klantnummer` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `voornaam` VARCHAR(100) NOT NULL,
  `achternaam` VARCHAR(100) NOT NULL,
  `gebruikersnaam` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `wachtwoord` VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;