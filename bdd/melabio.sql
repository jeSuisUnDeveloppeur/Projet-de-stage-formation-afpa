-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 11 juin 2024 à 20:02
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `melabio`
--

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `id_offre` int(255) NOT NULL,
  `nom_offre` varchar(255) NOT NULL,
  `description_offre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id_offre`, `nom_offre`, `description_offre`) VALUES
(1, 'produit de beauté', 'produits de beautés à moins 15% sur tout achat de prestations dès 80€ d\'achat.'),
(2, 'tirage cartomancie ', 'Tirage en 3, en 5 ou du mois offert pour 50€ d\'achat produits ou prestation !'),
(3, 'bilan energétique', 'un bilan energétique offert pour 50€ d\'achat en produits ou prestation.'),
(4, 'gommage', 'un gommage au choix offert dès 80€ d\'achat en produits ou prestations.'),
(5, 'modelage dos', 'un modelage dos offert dès 120€ d\'achat en produits ou prestations.'),
(6, 'épilation menton/ligne ombilical', 'l\'épilation menton et ligne ombilical offerte pour tout achat de 40€ en produits ou prestations.'),
(7, 'pose de vernis bio pied', 'la pose de vernis bio pour les pieds offerte dès 80€ d\'achat en produits ou prestations.'),
(8, 'pose de vernis bio mains', 'la pose de vernis bio pour les mains offerte dès 80€ d\'achats en produits ou prestations.'),
(9, 'épilation sourcils + lèvres + menton', 'l\'épilation sourcils, lèvres et menton offerte pour tout achat de 100€ en produits ou prestations.'),
(10, 'épilation cuisse + épaule', 'l\'épilation cuisse et épaule offerte pour tout achat de 70€ en produits ou prestations.'),
(11, 'tirage carte professionnelle', 'le tirage cartomancie professionnelle offert dès 50€ d\'achat en produits ou prestation.'),
(12, 'épilation torse ', 'l\'épilation torse à partir de (zone que vous souhaitez) offert dès 50€ d\'achat en produits ou prestations.'),
(27, 'Aucune Offre', 'Bonjour, en ce moment il n&#039;y a pas d&#039;offre du moment');

-- --------------------------------------------------------

--
-- Structure de la table `offre_publier`
--

CREATE TABLE `offre_publier` (
  `id_offre` int(255) NOT NULL,
  `nom_offre` varchar(255) NOT NULL,
  `description_offre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offre_publier`
--

INSERT INTO `offre_publier` (`id_offre`, `nom_offre`, `description_offre`) VALUES
(2, 'tirage cartomancie ', 'Tirage en 3, en 5 ou du mois offert pour 50€ d\'achat produits ou prestation !');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(255) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo`, `mot_de_passe`, `email`, `token`) VALUES
(6, 'Mélanie_Mélabio', '$2y$10$tBpXyzdn8nGZjfeCfM9.fOrYUbK5v1tInm75Lwl4JdxTntNulThP2', 'grdmelanie09@gmail.com', NULL),
(9, 'Rémi', '$2y$10$CY8bZ1HEFIK2IWYQ2QLwMeGWN6aK2VYACNYFQoLwf3z08V3CYfAJ.', 'remideschamps2662@gmail.com', '665f1af234123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id_offre`);

--
-- Index pour la table `offre_publier`
--
ALTER TABLE `offre_publier`
  ADD PRIMARY KEY (`id_offre`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id_offre` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `offre_publier`
--
ALTER TABLE `offre_publier`
  MODIFY `id_offre` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
