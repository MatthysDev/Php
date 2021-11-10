-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  sam. 23 jan. 2021 à 16:06
-- Version du serveur :  5.7.24
-- Version de PHP :  7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `langages`
--

CREATE TABLE `langages` (
                            `id` int(11) UNSIGNED NOT NULL,
                            `titre` varchar(50) NOT NULL,
                            `resume` text NOT NULL,
                            `logo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `langages`
--

INSERT INTO `langages` (`id`, `titre`, `resume`, `logo`) VALUES
(1, 'HTML', 'Le HTML est un langage de balisage. Il permet de mettre en forme un document en distinguant les titres, les paragraphes, les images, les liens hypertexte...', '1_html.png'),
(2, 'CSS', 'Les feuilles de style en cascade, g&eacute;n&eacute;ralement appel&eacute;es CSS de l&#039;anglais Cascading Style Sheets, forment un langage informatique qui d&eacute;crit la pr&eacute;sentation des documents HTML et XML (wikipedia).', '2_css.png'),
(3, 'JavaScript', 'JavaScript est un langage de programmation de scripts principalement employé dans les pages web (Wikipédia).', '3_javascript.png'),
(4, 'PHP', 'PHP: Hypertext Preprocessor, plus connu sous son sigle PHP, est un langage de programmation libre, principalement utilis&eacute; pour produire des pages Web dynamiques via un serveur HTTP (Wikip&eacute;dia).', '4_php.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `langages`
--
ALTER TABLE `langages`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `langages`
--
ALTER TABLE `langages`
    MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
