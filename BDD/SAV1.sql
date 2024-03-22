-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 22 mars 2024 à 16:19
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `SAV`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `motdepasse` varchar(255) DEFAULT NULL,
  `poste` varchar(50) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `prenom`, `email`, `motdepasse`, `poste`) VALUES
(1, 'Admin', 'JEFI', 'JEFI@admin.com', 'mdpAdmin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `ARTICLE`
--

CREATE TABLE `ARTICLE` (
  `CODE_ARTICLE` int(11) NOT NULL,
  `NOM_ARTICLE` varchar(50) DEFAULT NULL,
  `NOM_KIT_ARTICLE` varchar(20) DEFAULT NULL,
  `PRIX_ARTICLE` int(11) DEFAULT NULL,
  `ID_GARANTIE` int(11) DEFAULT NULL,
  `STOCK_ARTICLE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ARTICLE`
--

INSERT INTO `ARTICLE` (`CODE_ARTICLE`, `NOM_ARTICLE`, `NOM_KIT_ARTICLE`, `PRIX_ARTICLE`, `ID_GARANTIE`, `STOCK_ARTICLE`) VALUES
(1, 'pergola', NULL, 800, NULL, 12),
(2, 'portail de jardin', NULL, 500, NULL, 10),
(3, 'tonnelle', NULL, 600, NULL, 10),
(4, 'clôture', NULL, 400, NULL, 10),
(5, 'abri de jardin', NULL, 1000, NULL, 10),
(6, 'arceau de jardin', NULL, 300, NULL, 10),
(7, 'treillis', NULL, 200, NULL, 10),
(8, 'gazebo', NULL, 900, NULL, 10),
(9, 'pergola en bois', NULL, 1200, NULL, 10),
(10, 'portillon', NULL, 350, NULL, 10),
(11, 'tonnelle de jardin', NULL, 700, NULL, 10),
(12, 'auvent de jardin', NULL, 450, NULL, 10),
(13, 'kiosque de jardin', NULL, 1500, NULL, 10),
(14, 'serre de jardin', NULL, 1300, NULL, 10),
(15, 'arcade de jardin', NULL, 250, NULL, 10),
(16, 'pergola en aluminium', NULL, 1000, NULL, 10),
(17, 'portail coulissant', NULL, 700, NULL, 10),
(18, 'treillage', NULL, 150, NULL, 10),
(19, 'gloriette', NULL, 1100, NULL, 10),
(20, 'barrière de jardin', NULL, 450, NULL, 10),
(21, 'pergola adossée', NULL, 850, NULL, 10),
(22, 'portail en fer forgé', NULL, 900, NULL, 10),
(23, 'tonnelle pliante', NULL, 300, NULL, 10),
(24, 'brise-vue', NULL, 200, NULL, 10),
(25, 'pergola avec store', NULL, 1500, NULL, 10),
(26, 'portail automatique', NULL, 1200, NULL, 10),
(27, 'pergola', NULL, 800, NULL, 10),
(28, 'portail de jardin', NULL, 500, NULL, 10),
(29, 'tonnelle', NULL, 600, NULL, 10),
(30, 'clôture', NULL, 400, NULL, 10),
(31, 'abri de jardin', NULL, 1000, NULL, 10),
(32, 'arceau de jardin', NULL, 300, NULL, 10),
(33, 'treillis', NULL, 200, NULL, 10),
(34, 'gazebo', NULL, 900, NULL, 10),
(35, 'pergola en bois', NULL, 1200, NULL, 10),
(36, 'portillon', NULL, 350, NULL, 10),
(37, 'tonnelle de jardin', NULL, 700, NULL, 10),
(38, 'auvent de jardin', NULL, 450, NULL, 10),
(39, 'kiosque de jardin', NULL, 1500, NULL, 10),
(40, 'serre de jardin', NULL, 1300, NULL, 10),
(41, 'arcade de jardin', NULL, 250, NULL, 10),
(42, 'pergola en aluminium', NULL, 1000, NULL, 10),
(43, 'portail coulissant', NULL, 700, NULL, 10),
(44, 'treillage', NULL, 150, NULL, 10),
(45, 'gloriette', NULL, 1100, NULL, 10),
(46, 'barrière de jardin', NULL, 450, NULL, 10),
(47, 'pergola adossée', NULL, 850, NULL, 10),
(48, 'portail en fer forgé', NULL, 900, NULL, 10),
(49, 'tonnelle pliante', NULL, 300, NULL, 10),
(50, 'brise-vue', NULL, 200, NULL, 10),
(51, 'pergola avec store', NULL, 1500, NULL, 10),
(52, 'portail automatique', NULL, 1200, NULL, 10),
(53, 'pergola bioclimatique', NULL, 2000, NULL, 10),
(54, 'bordure de jardin', NULL, 50, NULL, 10),
(55, 'pergola en kit', NULL, 600, NULL, 10),
(56, 'portail battant', NULL, 600, NULL, 10),
(57, 'gloriette de jardin', NULL, 1800, NULL, 10),
(58, 'auvent en bois', NULL, 800, NULL, 10),
(59, 'treillis métallique', NULL, 250, NULL, 10),
(60, 'pergola sur mesure', NULL, 2500, NULL, 10),
(61, 'portail en bois', NULL, 550, NULL, 10),
(62, 'tonnelle en fer forgé', NULL, 1000, NULL, 10),
(63, 'brise-vent', NULL, 120, NULL, 10),
(64, 'pergola en acier', NULL, 1800, NULL, 10),
(65, 'portail en aluminium', NULL, 800, NULL, 10),
(66, 'claustra', NULL, 300, NULL, 10),
(67, 'pergola avec toit polycarbonate', NULL, 1600, NULL, 10),
(68, 'portail en PVC', NULL, 400, NULL, 10),
(69, 'balustrade de jardin', NULL, 700, NULL, 10),
(70, 'pergola adossée murale', NULL, 700, NULL, 10),
(71, 'portail design', NULL, 950, NULL, 10),
(72, 'treillis bois', NULL, 180, NULL, 10),
(73, 'pergola en fer forgé', NULL, 2200, NULL, 10),
(74, 'portillon en bois', NULL, 300, NULL, 10);

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
-- Structure de la table `STOCK_PRINCIPAL`
--

CREATE TABLE `STOCK_PRINCIPAL` (
  `CODE_ARTICLE` int(11) NOT NULL DEFAULT 0,
  `NOM_ARTICLE` varchar(50) DEFAULT NULL,
  `QUANTITE` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `STOCK_PRINCIPAL`
--

INSERT INTO `STOCK_PRINCIPAL` (`CODE_ARTICLE`, `NOM_ARTICLE`, `QUANTITE`) VALUES
(1, 'pergola', 12),
(2, 'portail de jardin', 10),
(3, 'tonnelle', 10),
(4, 'clôture', 166),
(5, 'abri de jardin', 10),
(6, 'arceau de jardin', 10),
(7, 'treillis', 10),
(8, 'gazebo', 10),
(9, 'pergola en bois', 10),
(10, 'portillon', 10),
(11, 'tonnelle de jardin', 10),
(12, 'auvent de jardin', 10),
(13, 'kiosque de jardin', 10),
(14, 'serre de jardin', 10),
(15, 'arcade de jardin', 10),
(16, 'pergola en aluminium', 10),
(17, 'portail coulissant', 10),
(18, 'treillage', 10),
(19, 'gloriette', 10),
(20, 'barrière de jardin', 10),
(21, 'pergola adossée', 10),
(22, 'portail en fer forgé', 10),
(23, 'tonnelle pliante', 10),
(24, 'brise-vue', 10),
(25, 'pergola avec store', 10),
(26, 'portail automatique', 10),
(27, 'pergola', 10),
(28, 'portail de jardin', 10),
(29, 'tonnelle', 10),
(30, 'clôture', 10),
(31, 'abri de jardin', 10),
(32, 'arceau de jardin', 10),
(33, 'treillis', 10),
(34, 'gazebo', 10),
(35, 'pergola en bois', 10),
(36, 'portillon', 10),
(37, 'tonnelle de jardin', 10),
(38, 'auvent de jardin', 10),
(39, 'kiosque de jardin', 10),
(40, 'serre de jardin', 10),
(41, 'arcade de jardin', 10),
(42, 'pergola en aluminium', 10),
(43, 'portail coulissant', 10),
(44, 'treillage', 10),
(45, 'gloriette', 10),
(46, 'barrière de jardin', 10),
(47, 'pergola adossée', 10),
(48, 'portail en fer forgé', 10),
(49, 'tonnelle pliante', 10),
(50, 'brise-vue', 10),
(51, 'pergola avec store', 10),
(52, 'portail automatique', 10),
(53, 'pergola bioclimatique', 10),
(54, 'bordure de jardin', 10),
(55, 'pergola en kit', 10),
(56, 'portail battant', 10),
(57, 'gloriette de jardin', 10),
(58, 'auvent en bois', 10),
(59, 'treillis métallique', 10),
(60, 'pergola sur mesure', 10),
(61, 'portail en bois', 10),
(62, 'tonnelle en fer forgé', 10),
(63, 'brise-vent', 10),
(64, 'pergola en acier', 10),
(65, 'portail en aluminium', 10),
(66, 'claustra', 10),
(67, 'pergola avec toit polycarbonate', 10),
(68, 'portail en PVC', 10),
(69, 'balustrade de jardin', 10),
(70, 'pergola adossée murale', 10),
(71, 'portail design', 10),
(72, 'treillis bois', 10),
(73, 'pergola en fer forgé', 10),
(74, 'portillon en bois', 10);

-- --------------------------------------------------------

--
-- Structure de la table `STOCK_SAV`
--

CREATE TABLE `STOCK_SAV` (
  `CODE_ARTICLE` int(11) NOT NULL,
  `NOM_ARTICLE` varchar(255) DEFAULT NULL,
  `QTE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `STOCK_SAV`
--

INSERT INTO `STOCK_SAV` (`CODE_ARTICLE`, `NOM_ARTICLE`, `QTE`) VALUES
(4, 'clôture', 2);

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
(8, 'Garcia', 'Thomas', 'SAV', 'Thomas.garcia@example.com', 'mdpThomas567'),
(9, 'Fournier', 'Julie', 'SAV', 'julie.fournier@example.com', 'mdpJulie890'),
(11, 'okok', 'okok', 'SAV', 'julie.fourzenier@example.com', 'azerty');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE `ticket` (
  `NUM_TICKET` int(11) NOT NULL,
  `CODE_TICKET` varchar(255) DEFAULT NULL,
  `NUM_COMMANDE` int(11) DEFAULT NULL,
  `CODE_ARTICLE` int(11) DEFAULT NULL,
  `STATUT_TICKET` varchar(20) DEFAULT NULL,
  `id_technicien` int(11) DEFAULT NULL,
  `QUANTITE_CONCERNEE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`NUM_TICKET`, `CODE_TICKET`, `NUM_COMMANDE`, `CODE_ARTICLE`, `STATUT_TICKET`, `id_technicien`, `QUANTITE_CONCERNEE`) VALUES
(10, 'EC', 25, 9, 'ouvert', NULL, 1),
(11, 'EC', 23, 3, 'ouvert', NULL, 1),
(12, 'EC', 23, 17, 'ouvert', NULL, 1),
(13, 'EC', 23, 22, 'ouvert', NULL, 1),
(14, 'EC', 23, 22, 'ouvert', NULL, 2),
(15, 'EC', 26, 6, 'ouvert', NULL, 3),
(16, 'EC', 26, 11, 'ouvert', NULL, 1),
(17, 'EC', 25, 4, 'ouvert', NULL, 2),
(18, 'EC', 25, 14, 'ouvert', NULL, 3),
(19, 'EC', 25, 14, 'ouvert', NULL, 1),
(20, 'EC', 25, 14, 'ouvert', NULL, 1),
(21, 'EC', 25, 4, 'ouvert', NULL, 2),
(22, 'EC', 25, 4, 'ouvert', NULL, 1),
(23, 'EC', 25, 4, 'ouvert', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `TICKET_EXP`
--

CREATE TABLE `TICKET_EXP` (
  `NUM_TICKET` int(11) NOT NULL,
  `NUM_COMMANDE` int(11) DEFAULT NULL,
  `CODE_TICKET` varchar(10) DEFAULT NULL,
  `STATUT_TICKET` varchar(20) DEFAULT NULL,
  `ID` int(11) DEFAULT NULL
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
-- Index pour la table `STOCK_SAV`
--
ALTER TABLE `STOCK_SAV`
  ADD PRIMARY KEY (`CODE_ARTICLE`);

--
-- Index pour la table `techniciens`
--
ALTER TABLE `techniciens`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`NUM_TICKET`),
  ADD KEY `NUM_COMMANDE` (`NUM_COMMANDE`),
  ADD KEY `CODE_ARTICLE` (`CODE_ARTICLE`),
  ADD KEY `fk_technicien` (`id_technicien`);

--
-- Index pour la table `TICKET_EXP`
--
ALTER TABLE `TICKET_EXP`
  ADD PRIMARY KEY (`NUM_TICKET`),
  ADD KEY `NUM_COMMANDE` (`NUM_COMMANDE`),
  ADD KEY `ID` (`ID`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `NUM_TICKET` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_technicien` FOREIGN KEY (`id_technicien`) REFERENCES `techniciens` (`id`),
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`NUM_COMMANDE`) REFERENCES `COMMANDE` (`NUM_COMMANDE`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`CODE_ARTICLE`) REFERENCES `ARTICLE` (`CODE_ARTICLE`);

--
-- Contraintes pour la table `TICKET_EXP`
--
ALTER TABLE `TICKET_EXP`
  ADD CONSTRAINT `ticket_exp_ibfk_1` FOREIGN KEY (`NUM_COMMANDE`) REFERENCES `commande` (`NUM_COMMANDE`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_exp_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `techniciens` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
