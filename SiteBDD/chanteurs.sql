CREATE TABLE `chanteurs` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom` varchar(30) CHARACTER SET latin1 NOT NULL,
  `prenom` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `site` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `photo` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chanteurs`
--

INSERT INTO `chanteurs` (`id`, `nom`, `prenom`, `site`, `photo`) VALUES
(1, 'Renaud', 'Séchan', 'http://www.renaud-lesite.fr', '1_Renaud.jpg'),
(2, 'Roussel', 'Gaëtan', 'https://www.universalmusic.fr/artiste/13872-gaetan-roussel-1', '2_Roussel.jpg'),
(3, 'Sers', 'Gauvain', 'http://www.gauvainsers.com', '3_Sers.jpg'),
(5, 'Olivier', 'Christian', 'http://christian-olivier.net', '4_Olivier.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chanteurs`
--
ALTER TABLE `chanteurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chanteurs`
--
ALTER TABLE `chanteurs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;