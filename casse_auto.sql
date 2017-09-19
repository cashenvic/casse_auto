-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 21 Avril 2017 à 12:24
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `casse_auto`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE `achat` (
  `id_achat` int(100) NOT NULL,
  `id_client` int(100) NOT NULL,
  `id_voiture` int(100) NOT NULL,
  `date_achat` date NOT NULL,
  `prix_achat` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `achat`
--

INSERT INTO `achat` (`id_achat`, `id_client`, `id_voiture`, `date_achat`, `prix_achat`) VALUES
(2, 1, 2, '2017-03-07', 1),
(3, 5, 4, '2016-06-23', 1800000),
(4, 4, 6, '2016-02-17', 4000000);

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `nom_admin` varchar(100) NOT NULL,
  `prenom_admin` varchar(100) NOT NULL,
  `mot_passe` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(100) NOT NULL,
  `email_client` varchar(50) NOT NULL,
  `nom_client` varchar(100) NOT NULL,
  `prenom_client` varchar(100) NOT NULL,
  `tel_client` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_client`, `email_client`, `nom_client`, `prenom_client`, `tel_client`) VALUES
(1, 'kemo@koi', 'BARRO', 'Bintou', 123456777),
(2, 'kemo@keitus.com', 'KEITA', 'Mohamed', 7899000),
(3, 'drisss@gmail', 'cisse', 'drissa', 129867),
(4, 'doko@gmail', 'KANTE', 'Bamoussa', 129867),
(5, 'daoisma@dao.da', 'DAO', 'IsmaÃ«l', 76666666);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` text NOT NULL,
  `signup_date` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `avatar`, `signup_date`) VALUES
(1, 'kadi', 'kadi', 'kadi', 'protege', 0),
(4, 'kadi2', 'f44d75f8e1b56f97112c9f299176e74ed2ff289e', 'kadi@kad.kd', '', 1491038982),
(7, 'User Super', 'c991eab6e3870478311c82ca60a812d37cfd42ff', 'user@use.use', '', 1490867852),
(8, 'Djoko', 'e26a273e8afa6728ee2a0496a5fdbe9c271e735f', 'djoko@use.net', '', 1490879329);

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE `voiture` (
  `id_voiture` int(100) NOT NULL,
  `type_voiture` varchar(100) NOT NULL,
  `marque` varchar(100) NOT NULL,
  `prix` int(100) NOT NULL,
  `couleur` varchar(100) NOT NULL,
  `type_moteur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `voiture`
--

INSERT INTO `voiture` (`id_voiture`, `type_voiture`, `marque`, `prix`, `couleur`, `type_moteur`) VALUES
(2, 'Break', 'porche', 18700000, 'rose', 'diesel'),
(3, 'Benne', 'mercedes', 1800000, 'verte', 'diesel'),
(4, '4*4', 'mercedes', 1800000, 'Rose', 'diesel'),
(5, '4*4', 'mercedes', 1800000, 'noir', 'essence'),
(6, '4*4', 'V8', 1800000, 'blanche', 'diesel'),
(7, '4*4', 'mercedes', 1800000, 'blanche', 'essence'),
(8, '4*4', 'mercedes', 1800000, 'blanche', 'diesel'),
(9, 'CoupÃ©', 'Toyota', 4500000, 'Rouge', 'essence'),
(10, '4x4', 'Chevrolet', 8450000, 'Grise', 'diesel'),
(11, 'Break', 'Toyota', 3600000, 'Brune', 'hybride'),
(12, 'Cabriolet', 'Audi', 8450000, 'Grise', 'essence'),
(13, 'Break', 'CitroÃ«n', 5600000, 'Bleue marine', 'hybride'),
(14, 'Break', 'Peugeot', 4500000, 'Grise metallique', 'essence'),
(15, 'CoupÃ©', 'Toyota', 4000000, 'Verte', 'essence'),
(16, '4*4', 'Hundai', 8700000, 'Blanche', 'diesel'),
(17, 'Cabriolet', 'Honda', 4000000, 'Noire', 'diesel'),
(18, '4*4', 'VolksWagen', 12000000, 'Blanche', 'diesel'),
(19, 'Cabriolet', 'Opel', 5000000, 'Jaune', 'essence'),
(20, 'Break', 'Suzuki', 7300000, 'Bleue', 'diesel');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`id_achat`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email_admin` (`email_admin`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `email_client` (`email_client`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id_voiture`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `achat`
--
ALTER TABLE `achat`
  MODIFY `id_achat` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id_voiture` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
