DROP DATABASE IF EXISTS SAV;
-- Créer la base de données SAV
CREATE DATABASE SAV;
USE SAV;

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `motdepasse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `prenom`, `email`, `motdepasse`) VALUES
(1, 'Admin', 'JEFI', 'JEFI@admin.com', 'mdpAdmin');

-- --------------------------------------------------------

--
-- Structure de la table `ARTICLE`
--

CREATE TABLE `ARTICLE` (
  `CODE_ARTICLE` int(11) NOT NULL,
  `NOM_ARTICLE` varchar(50) DEFAULT NULL,
  `NOM_KIT_ARTICLE` varchar(20) DEFAULT NULL,
  `STOCK_ARTICLE` int(11) DEFAULT NULL,
  `PRIX_ARTICLE` int(11) DEFAULT NULL,
  `ID_GARANTIE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ARTICLE`
--

INSERT INTO `ARTICLE` (`CODE_ARTICLE`, `NOM_ARTICLE`, `NOM_KIT_ARTICLE`, `STOCK_ARTICLE`, `PRIX_ARTICLE`, `ID_GARANTIE`) VALUES
(1, 'pergola', NULL, NULL, 800, NULL),
(2, 'portail de jardin', NULL, NULL, 500, NULL),
(3, 'tonnelle', NULL, NULL, 600, NULL),
(4, 'clôture', NULL, NULL, 400, NULL),
(5, 'abri de jardin', NULL, NULL, 1000, NULL),
(6, 'arceau de jardin', NULL, NULL, 300, NULL),
(7, 'treillis', NULL, NULL, 200, NULL),
(8, 'gazebo', NULL, NULL, 900, NULL),
(9, 'pergola en bois', NULL, NULL, 1200, NULL),
(10, 'portillon', NULL, NULL, 350, NULL),
(11, 'tonnelle de jardin', NULL, NULL, 700, NULL),
(12, 'auvent de jardin', NULL, NULL, 450, NULL),
(13, 'kiosque de jardin', NULL, NULL, 1500, NULL),
(14, 'serre de jardin', NULL, NULL, 1300, NULL),
(15, 'arcade de jardin', NULL, NULL, 250, NULL),
(16, 'pergola en aluminium', NULL, NULL, 1000, NULL),
(17, 'portail coulissant', NULL, NULL, 700, NULL),
(18, 'treillage', NULL, NULL, 150, NULL),
(19, 'gloriette', NULL, NULL, 1100, NULL),
(20, 'barrière de jardin', NULL, NULL, 450, NULL),
(21, 'pergola adossée', NULL, NULL, 850, NULL),
(22, 'portail en fer forgé', NULL, NULL, 900, NULL),
(23, 'tonnelle pliante', NULL, NULL, 300, NULL),
(24, 'brise-vue', NULL, NULL, 200, NULL),
(25, 'pergola avec store', NULL, NULL, 1500, NULL),
(26, 'portail automatique', NULL, NULL, 1200, NULL),
(27, 'pergola', NULL, NULL, 800, NULL),
(28, 'portail de jardin', NULL, NULL, 500, NULL),
(29, 'tonnelle', NULL, NULL, 600, NULL),
(30, 'clôture', NULL, NULL, 400, NULL),
(31, 'abri de jardin', NULL, NULL, 1000, NULL),
(32, 'arceau de jardin', NULL, NULL, 300, NULL),
(33, 'treillis', NULL, NULL, 200, NULL),
(34, 'gazebo', NULL, NULL, 900, NULL),
(35, 'pergola en bois', NULL, NULL, 1200, NULL),
(36, 'portillon', NULL, NULL, 350, NULL),
(37, 'tonnelle de jardin', NULL, NULL, 700, NULL),
(38, 'auvent de jardin', NULL, NULL, 450, NULL),
(39, 'kiosque de jardin', NULL, NULL, 1500, NULL),
(40, 'serre de jardin', NULL, NULL, 1300, NULL),
(41, 'arcade de jardin', NULL, NULL, 250, NULL),
(42, 'pergola en aluminium', NULL, NULL, 1000, NULL),
(43, 'portail coulissant', NULL, NULL, 700, NULL),
(44, 'treillage', NULL, NULL, 150, NULL),
(45, 'gloriette', NULL, NULL, 1100, NULL),
(46, 'barrière de jardin', NULL, NULL, 450, NULL),
(47, 'pergola adossée', NULL, NULL, 850, NULL),
(48, 'portail en fer forgé', NULL, NULL, 900, NULL),
(49, 'tonnelle pliante', NULL, NULL, 300, NULL),
(50, 'brise-vue', NULL, NULL, 200, NULL),
(51, 'pergola avec store', NULL, NULL, 1500, NULL),
(52, 'portail automatique', NULL, NULL, 1200, NULL),
(53, 'pergola bioclimatique', NULL, NULL, 2000, NULL),
(54, 'bordure de jardin', NULL, NULL, 50, NULL),
(55, 'pergola en kit', NULL, NULL, 600, NULL),
(56, 'portail battant', NULL, NULL, 600, NULL),
(57, 'gloriette de jardin', NULL, NULL, 1800, NULL),
(58, 'auvent en bois', NULL, NULL, 800, NULL),
(59, 'treillis métallique', NULL, NULL, 250, NULL),
(60, 'pergola sur mesure', NULL, NULL, 2500, NULL),
(61, 'portail en bois', NULL, NULL, 550, NULL),
(62, 'tonnelle en fer forgé', NULL, NULL, 1000, NULL),
(63, 'brise-vent', NULL, NULL, 120, NULL),
(64, 'pergola en acier', NULL, NULL, 1800, NULL),
(65, 'portail en aluminium', NULL, NULL, 800, NULL),
(66, 'claustra', NULL, NULL, 300, NULL),
(67, 'pergola avec toit polycarbonate', NULL, NULL, 1600, NULL),
(68, 'portail en PVC', NULL, NULL, 400, NULL),
(69, 'balustrade de jardin', NULL, NULL, 700, NULL),
(70, 'pergola adossée murale', NULL, NULL, 700, NULL),
(71, 'portail design', NULL, NULL, 950, NULL),
(72, 'treillis bois', NULL, NULL, 180, NULL),
(73, 'pergola en fer forgé', NULL, NULL, 2200, NULL),
(74, 'portillon en bois', NULL, NULL, 300, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `CLIENT`
--

CREATE TABLE `CLIENT` (
  `ID_CLIENT` bigint(20) NOT NULL,
  `NOM_CLIENT` varchar(15) DEFAULT NULL,
  `PRENOM_CLIENT` varchar(20) DEFAULT NULL,
  `ADRESSE_MAIL` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `CLIENT`
--

INSERT INTO `CLIENT` (`ID_CLIENT`, `NOM_CLIENT`, `PRENOM_CLIENT`, `ADRESSE_MAIL`) VALUES
(1, 'Dupont', 'Jean', 'client1@example.com'),
(2, 'Dubois', 'Marie', 'client2@example.com'),
(3, 'Martin', 'Pierre', 'client3@example.com'),
(4, 'Bernard', 'Sophie', 'client4@example.com'),
(5, 'Thomas', 'Julie', 'client5@example.com'),
(6, 'Petit', 'Nicolas', 'client6@example.com'),
(7, 'Robert', 'Laura', 'client7@example.com'),
(8, 'Richard', 'Antoine', 'client8@example.com'),
(9, 'Durand', 'Emma', 'client9@example.com'),
(10, 'Leroy', 'Lucas', 'client10@example.com'),
(11, 'Moreau', 'Camille', 'client11@example.com'),
(12, 'Simon', 'Chloé', 'client12@example.com'),
(13, 'Laurent', 'Pauline', 'client13@example.com'),
(14, 'Lefebvre', 'Mathieu', 'client14@example.com'),
(15, 'Michel', 'Manon', 'client15@example.com'),
(16, 'Garcia', 'Thomas', 'client16@example.com'),
(17, 'David', 'Juliette', 'client17@example.com'),
(18, 'Bertrand', 'Alexandre', 'client18@example.com'),
(19, 'Roux', 'Caroline', 'client19@example.com'),
(20, 'Vincent', 'Hugo', 'client20@example.com');

-- --------------------------------------------------------

--
-- Structure de la table `COMMANDE`
--

CREATE TABLE `COMMANDE` (
  `NUM_COMMANDE` int(11) NOT NULL,
  `DATE_COM` date DEFAULT NULL,
  `VILLE_CLIENT` varchar(30) DEFAULT NULL,
  `CODE_POSTAL_CLIENT` int(11) DEFAULT NULL,
  `RUE_CLIENT` varchar(30) DEFAULT NULL,
  `ID_CLIENT` bigint(20) NOT NULL,
  `STATU_COMMANDE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `COMMANDE`
--

INSERT INTO `COMMANDE` (`NUM_COMMANDE`, `DATE_COM`, `VILLE_CLIENT`, `CODE_POSTAL_CLIENT`, `RUE_CLIENT`, `ID_CLIENT`, `STATU_COMMANDE`) VALUES
(21, '2024-03-14', 'Paris', 75001, 'Rue de Rivoli', 1, NULL),
(22, '2024-03-14', 'Lyon', 69001, 'Rue de la République', 2, NULL),
(23, '2024-03-14', 'Bordeaux', 33000, 'Rue Sainte-Catherine', 3, NULL),
(24, '2024-03-14', 'Toulouse', 31000, 'Place du Capitole', 4, NULL),
(25, '2024-03-14', 'Marseille', 13001, 'Rue de la République', 5, 'En cours'),
(26, '2024-03-14', 'Nice', 6000, 'Promenade des Anglais', 6, NULL),
(27, '2024-03-14', 'Nantes', 44000, 'Rue de la République', 7, 'En cours'),
(28, '2024-03-14', 'Lille', 59000, 'Rue de la République', 8, 'En cours'),
(29, '2024-03-14', 'Lyon', 69002, 'Rue de la République', 9, NULL),
(30, '2024-03-14', 'Marseille', 13002, 'Rue de la République', 10, NULL),
(31, '2024-03-14', 'Rennes', 35000, 'Rue de la Visitation', 11, NULL),
(32, '2024-03-14', 'Strasbourg', 67000, 'Rue du Dôme', 12, 'Terminee'),
(33, '2024-03-14', 'Montpellier', 34000, 'Place de la Comédie', 13, NULL),
(34, '2024-03-14', 'Tours', 37000, 'Rue Nationale', 14, NULL),
(35, '2024-03-14', 'Nancy', 54000, 'Place Stanislas', 15, NULL),
(36, '2024-03-14', 'Lyon', 69003, 'Rue de la République', 16, NULL),
(37, '2024-03-14', 'Lille', 59000, 'Rue de la République', 17, NULL),
(38, '2024-03-14', 'Paris', 75002, 'Rue de Rivoli', 18, NULL),
(39, '2024-03-14', 'Bordeaux', 33000, 'Rue Sainte-Catherine', 19, 'Terminee'),
(40, '2024-03-14', 'Paris', 75003, 'Rue de Rivoli', 20, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `CONCERNE`
--

CREATE TABLE `CONCERNE` (
  `CODE_ARTICLE` int(11) NOT NULL,
  `NUM_COMMANDE` int(11) NOT NULL,
  `QUANTITE_CONCERNE` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `CONCERNE`
--

INSERT INTO `CONCERNE` (`CODE_ARTICLE`, `NUM_COMMANDE`, `QUANTITE_CONCERNE`) VALUES
(1, 21, 3),
(2, 21, 3),
(1, 27, 2),
(2, 22, 2),
(2, 28, 3),
(3, 24, 1),
(3, 29, 4),
(4, 25, 2),
(5, 21, 2),
(6, 26, 3),
(7, 22, 1),
(7, 27, 1),
(8, 24, 3),
(8, 28, 2),
(9, 25, 1),
(9, 29, 1),
(10, 21, 5),
(11, 26, 2),
(12, 22, 3),
(12, 27, 3),
(13, 24, 2),
(13, 28, 1),
(14, 25, 4),
(14, 29, 3),
(15, 21, 1),
(16, 26, 1),
(17, 23, 4),
(17, 27, 4),
(18, 24, 1),
(18, 28, 2),
(19, 25, 3),
(19, 29, 2),
(20, 21, 4),
(21, 26, 4),
(22, 23, 2),
(23, 26, 2),
(24, 25, 2),
(24, 29, 1),
(25, 23, 1);

-- --------------------------------------------------------

--
-- Structure de la table `GARANTIE`
--

CREATE TABLE `GARANTIE` (
  `ID_GARANTIE` int(11) NOT NULL,
  `DATE_COMMANDE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `techniciens`
--

CREATE TABLE `techniciens` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `poste` enum('SAV','Hotline') DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `motdepasse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `techniciens`
--

INSERT INTO `techniciens` (`id`, `nom`, `prenom`, `poste`, `email`, `motdepasse`) VALUES
(2, 'Martin', 'Paul', 'Hotline', 'paul.martin@example.com', 'mdpPaul456'),
(3, 'Dubois', 'Marie', 'Hotline', 'marie.dubois@example.com', 'mdpMarie789'),
(4, 'Leclerc', 'Pierre', 'Hotline', 'pierre.leclerc@example.com', 'mdpPierre987'),
(5, 'Lefebvre', 'Sophie', 'Hotline', 'sophie.lefebvre@example.com', 'mdpSophie654'),
(6, 'Moreau', 'Luc', 'Hotline', 'luc.moreau@example.com', 'mdpLuc321'),
(7, 'Roux', 'Emilie', 'Hotline', 'emilie.roux@example.com', 'mdpEmilie234'),
(8, 'Garcia', 'Thomas', 'SAV', 'thomas.garcia@example.com', 'mdpThomas567'),
(9, 'Fournier', 'Julie', 'SAV', 'julie.fournier@example.com', 'mdpJulie890');

-- --------------------------------------------------------

--
-- Structure de la table `TICKET`
--

CREATE TABLE `TICKET` (
  `ID_TICKET` int(11) NOT NULL,
  `ERREUR_TICKET` varchar(255) DEFAULT NULL,
  `NUM_COMMANDE` int(11) DEFAULT NULL,
  `CODE_ARTICLE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `TICKET_EXP`
--

CREATE TABLE `TICKET_EXP` (
  `NUM_TICKET` int(11) NOT NULL,
  `NUM_COMMANDE` int(11) DEFAULT NULL,
  `CODE_TICKET` varchar(10) DEFAULT NULL,
  `STATUT_TICKET` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  ADD PRIMARY KEY (`CODE_ARTICLE`),
  ADD KEY `ID_GARANTIE` (`ID_GARANTIE`);

--
-- Index pour la table `CLIENT`
--
ALTER TABLE `CLIENT`
  ADD PRIMARY KEY (`ID_CLIENT`);

--
-- Index pour la table `COMMANDE`
--
ALTER TABLE `COMMANDE`
  ADD PRIMARY KEY (`NUM_COMMANDE`),
  ADD KEY `ID_CLIENT` (`ID_CLIENT`);

--
-- Index pour la table `CONCERNE`
--
ALTER TABLE `CONCERNE`
  ADD PRIMARY KEY (`CODE_ARTICLE`,`NUM_COMMANDE`);

--
-- Index pour la table `GARANTIE`
--
ALTER TABLE `GARANTIE`
  ADD PRIMARY KEY (`ID_GARANTIE`);

--
-- Index pour la table `techniciens`
--
ALTER TABLE `techniciens`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `TICKET`
--
ALTER TABLE `TICKET`
  ADD PRIMARY KEY (`ID_TICKET`),
  ADD KEY `NUM_COMMANDE` (`NUM_COMMANDE`),
  ADD KEY `CODE_ARTICLE` (`CODE_ARTICLE`);

--
-- Index pour la table `TICKET_EXP`
--
ALTER TABLE `TICKET_EXP`
  ADD PRIMARY KEY (`NUM_TICKET`),
  ADD KEY `NUM_COMMANDE` (`NUM_COMMANDE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  MODIFY `CODE_ARTICLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT pour la table `CLIENT`
--
ALTER TABLE `CLIENT`
  MODIFY `ID_CLIENT` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `COMMANDE`
--
ALTER TABLE `COMMANDE`
  MODIFY `NUM_COMMANDE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `GARANTIE`
--
ALTER TABLE `GARANTIE`
  MODIFY `ID_GARANTIE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `techniciens`
--
ALTER TABLE `techniciens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `TICKET`
--
ALTER TABLE `TICKET`
  MODIFY `ID_TICKET` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `TICKET_EXP`
--
ALTER TABLE `TICKET_EXP`
  MODIFY `NUM_TICKET` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`ID_GARANTIE`) REFERENCES `GARANTIE` (`ID_GARANTIE`);

--
-- Contraintes pour la table `COMMANDE`
--
ALTER TABLE `COMMANDE`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`ID_CLIENT`) REFERENCES `CLIENT` (`ID_CLIENT`);

--
-- Contraintes pour la table `TICKET`
--
ALTER TABLE `TICKET`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`NUM_COMMANDE`) REFERENCES `COMMANDE` (`NUM_COMMANDE`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`CODE_ARTICLE`) REFERENCES `ARTICLE` (`CODE_ARTICLE`);

--
-- Contraintes pour la table `TICKET_EXP`
--
ALTER TABLE `TICKET_EXP`
  ADD CONSTRAINT `ticket_exp_ibfk_1` FOREIGN KEY (`NUM_COMMANDE`) REFERENCES `commande` (`NUM_COMMANDE`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;