<?php
//On demarre les sessions
session_start();

/******************************************************
----------------Configuration Obligatoire--------------

******************************************************/

//On se connecte a la base de donnee
$bdd = new PDO('mysql:host=localhost;dbname=casse_auto', 'root', '');
//mysql_select_db('casque_auto');

//Email du webmaster
$mail_webmaster = 'example@example.com';

//Adresse du dossier de la top site
$url_root = 'http://www.example.com/';

/******************************************************
----------------Configuration Optionelle---------------
******************************************************/

//Nom du fichier de laccueil
$url_home = 'index.php';

//Nom du design
$design = 'default';
?>