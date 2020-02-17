<?php
// A modifier selon les informations d'accès à la base de données
define("dbhost", "localhost"); //adresse du serveur
define("dbuser", "root"); // le nom admin
define("dbname", "project_boudaoud"); // le nom de la base de données
define("dbpass", ""); // le mot de passe


// Accéder à la base de données
try{
	$bdd = new PDO(
	    'mysql:host='.dbhost.';dbname='.dbname,
        dbuser,
        dbpass,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//        echo "acées réussi";
}catch(Exception $e){
	die('Erreur : connection DB -> accès refusé -- ');
}

/*

CREATE DATABASE `project_boudaoud`;
use project_boudaoud;
-- SQL de la table
  CREATE TABLE `compteur` (
	`ip` CHAR(16) NOT NULL,
	`page` VARCHAR(50) NULL DEFAULT NULL,
	`nb_connection` INT(4) NOT NULL,
	`date_connexion` DATETIME NOT NULL,
	`hostname` VARCHAR(200) NOT NULL DEFAULT '',
	`os` VARCHAR(200) NOT NULL DEFAULT '',
	`navivateur` VARCHAR(200) NOT NULL DEFAULT '',
	`commentaire` TEXT NULL,
	`lang` CHAR(6) NULL DEFAULT NULL COLLATE 'utf8_general_mysql500_ci'
)
COLLATE='latin1_swedish_ci'
ENGINE=MyISAM
;

 * */
                
