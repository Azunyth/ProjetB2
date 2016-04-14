-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 14 Avril 2016 à 14:46
-- Version du serveur :  5.5.47-0+deb8u1
-- Version de PHP :  5.6.19-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `classroom`
--

-- --------------------------------------------------------

--
-- Structure de la table `absences`
--

CREATE TABLE IF NOT EXISTS `absences` (
`id_absences` int(11) NOT NULL,
  `user_absences` varchar(255) NOT NULL,
  `date_absences` date NOT NULL,
  `motif_absences` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `devoirs`
--

CREATE TABLE IF NOT EXISTS `devoirs` (
`id_devoirs` int(11) NOT NULL,
  `matiere_devoirs` varchar(255) NOT NULL,
  `date_devoirs` date NOT NULL,
  `todo_devoirs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
`id_files` int(11) NOT NULL,
  `owner_files` varchar(255) NOT NULL,
  `date_files` datetime NOT NULL,
  `url_files` varchar(255) NOT NULL,
  `name_files` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `firstname_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `alias_user` varchar(255) NOT NULL,
  `birthday_user` date NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `lastname_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `wall`
--

CREATE TABLE IF NOT EXISTS `wall` (
`id_wall` int(11) NOT NULL,
  `content_wall` text NOT NULL,
  `date_wall` datetime NOT NULL,
  `author_wall` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `absences`
--
ALTER TABLE `absences`
 ADD PRIMARY KEY (`id_absences`);

--
-- Index pour la table `devoirs`
--
ALTER TABLE `devoirs`
 ADD PRIMARY KEY (`id_devoirs`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
 ADD PRIMARY KEY (`id_files`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Index pour la table `wall`
--
ALTER TABLE `wall`
 ADD PRIMARY KEY (`id_wall`), ADD UNIQUE KEY `id_wall` (`id_wall`), ADD KEY `author_wall` (`author_wall`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `absences`
--
ALTER TABLE `absences`
MODIFY `id_absences` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `devoirs`
--
ALTER TABLE `devoirs`
MODIFY `id_devoirs` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
MODIFY `id_files` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `wall`
--
ALTER TABLE `wall`
MODIFY `id_wall` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `wall`
--
ALTER TABLE `wall`
ADD CONSTRAINT `wall_ibfk_1` FOREIGN KEY (`author_wall`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
