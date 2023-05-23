-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 23 mai 2023 à 11:18
-- Version du serveur :  5.7.36
-- Version de PHP : 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `login`
--
CREATE DATABASE IF NOT EXISTS `login` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `login`;

-- --------------------------------------------------------

--
-- Structure de la table `commendes`
--

DROP TABLE IF EXISTS `commendes`;
CREATE TABLE `commendes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `user_name` varchar(25) DEFAULT NULL,
  `commende_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commendes`
--

INSERT INTO `commendes` (`id`, `product_id`, `product_name`, `user_name`, `commende_date`) VALUES
(1, 26, 'Logitech keyboard bluetooth fil-No', 'adnane', '2022-06-13 03:56:49'),
(2, 26, 'Logitech Keyboard', 'adnane', '2022-06-13 03:56:50'),
(3, 26, 'Apple Watch ', 'adnane', '2022-06-13 03:56:50'),
(4, 26, 'Android Framwork Notes for Developers', 'adnane', '2022-06-13 03:56:50'),
(5, 26, 'AngularJS Framwork Notes for Developers', 'adnane', '2022-06-13 03:56:50'),
(6, 26, 'Dell Mouse', 'adnane', '2022-06-13 03:56:51'),
(7, 26, 'Lenovo Laptop', 'adnane', '2022-06-13 03:56:53'),
(8, 26, 'Logitech keyboard bluetooth fil-No', 'adnane', '2022-06-13 03:57:21'),
(9, 26, 'Logitech Keyboard', 'adnane', '2022-06-13 03:57:21'),
(10, 26, 'Dell Mouse', 'adnane', '2022-06-13 03:57:21'),
(11, 26, 'AngularJS Framwork Notes for Developers', 'adnane', '2022-06-13 03:57:21'),
(12, 26, 'Android Framwork Notes for Developers', 'adnane', '2022-06-13 03:57:21'),
(13, 26, 'Apple Watch ', 'adnane', '2022-06-13 03:57:21'),
(14, 26, 'Lenovo Laptop', 'adnane', '2022-06-13 03:57:22'),
(15, 12, 'Razer Mouse', 'adnane', '2022-06-13 03:59:33'),
(16, 12, 'Logitech Mouse', 'adnane', '2022-06-13 03:59:33'),
(17, 12, 'Logitech H800-Casque ', 'adnane', '2022-06-13 03:59:34'),
(18, 6, 'Logitech H800-Casque bluetooth fil-Noir', 'ayman', '2022-06-15 14:03:12'),
(19, 11, 'Logitech H800-Casque bluetooth fil-Noir', 'ayman', '2022-06-15 16:47:55'),
(20, 11, 'Logitech keyboard bluetooth fil-No', 'ayman', '2022-06-15 16:47:55');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `Product_id` int(11) DEFAULT NULL,
  `Client_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `Product_id`, `Client_name`) VALUES
(1, 18, 'ana'),
(2, 16, 'teest');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `prix` float NOT NULL,
  `quantite` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `categorie` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `img`, `prix`, `quantite`, `description`, `categorie`) VALUES
(6, 'casque', '/img/headphone1.png', 15, 3, 'Logitech H800-Casque bluetooth fil-Noir', 'headphone'),
(7, 'Keyboard', '/img/Keyboard.png', 35, 1, 'Carbon evollution pour longue uses', 'Keyboard'),
(10, '.NET', '/img/book.NET.png', 11, 2, 'Net Framwork Notes for Developers', 'book'),
(11, 'keyboard', '/img/keyboard3.png', 50, 3, 'Logitech keyboard bluetooth fil-No', 'keyboard'),
(12, 'casque', '/img/headphone4.png', 60, 2, 'Logitech H800-Casque ', 'headphone'),
(13, 'headphones', '/img/headphone2.png', 25, 12, 'Razer Headphone', 'headphone'),
(14, 'Android', '/img/bookandroid.png', 15, 7, 'Android Framwork Notes for Developers', 'book'),
(15, 'AngularJS', '/img/bookangularjs.png', 12, 3, 'AngularJS Framwork Notes for Developers', 'book'),
(16, 'C', '/img/bookc.png', 12, 6, 'C Framwork Notes for Developers', 'book'),
(17, 'Mouse', '/img/mouse1.png', 60, 12, 'Logitech Mouse', 'mouse'),
(18, 'Mouse', '/img/mouse2.png', 45, 8, 'HyperX Mouse', 'mouse'),
(19, 'Mouse', '/img/mouse3.png', 60, 7, 'Razer Mouse', 'mouse'),
(20, 'Mouse', '/img/mouse4.png', 45, 6, 'Dell Mouse', 'mouse'),
(21, 'keyboard', '/img/keyboard5.png', 60, 3, 'Logitech Keyboard', 'keyboard'),
(23, 'Smartwatch', '/img/smartwatch1.png', 75, 12, 'Apple Watch ', 'smartwatch'),
(24, 'Smartwatch', '/img/smartwatch2.png', 65, 6, 'Samsung Galaxy Gear', 'smartwatch'),
(25, 'Laptop', '/img/laptop.png', 999, 5, 'Macbook Pro', 'laptop'),
(26, 'Laptop', '/img/laptop2.png', 899, 8, 'Lenovo Laptop', 'laptop'),
(27, 'Phone', '/img/phone1.png', 899, 2, 'Iphone 13 Pro Max', 'phone');

-- --------------------------------------------------------

--
-- Structure de la table `usertable`
--

DROP TABLE IF EXISTS `usertable`;
CREATE TABLE `usertable` (
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_type` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `usertable`
--

INSERT INTO `usertable` (`username`, `email`, `password`, `user_type`) VALUES
('admin', 'admin@gmail.com', 'admin123', 'admin'),
('adnane', 'adnane@gmail.com', 'adnane123', 'user'),
('ana', 'kiwi.afk@gmail.com', 'ana123', 'user'),
('ayman', 'ayman@gmail.com', 'ayman123', 'user'),
('teest', 'teest@gmail.com', 'teest123', 'user'),
('test', 'test@gmail.com', 'test123', 'user'),
('user', 'user@gmail.com', 'user123', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commendes`
--
ALTER TABLE `commendes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `product_name` (`product_name`),
  ADD KEY `user_name` (`user_name`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Client_name` (`Client_name`),
  ADD KEY `Product_id` (`Product_id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nom` (`nom`);

--
-- Index pour la table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`username`,`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commendes`
--
ALTER TABLE `commendes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commendes`
--
ALTER TABLE `commendes`
  ADD CONSTRAINT `commendes_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `commendes_ibfk_2` FOREIGN KEY (`user_name`) REFERENCES `usertable` (`username`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`Client_name`) REFERENCES `usertable` (`username`),
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `produit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
