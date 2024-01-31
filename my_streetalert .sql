-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Dic 20, 2023 alle 14:28
-- Versione del server: 8.0.30
-- Versione PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_streetalert`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `alerts`
--

CREATE TABLE `alerts` (
  `id_alert` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT 'PK for alerts',
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'directory for photos',
  `date` datetime NOT NULL,
  `lat` float(8,6) NOT NULL COMMENT 'latitude for alerts',
  `lon` float(8,6) NOT NULL COMMENT 'longitude for alerts',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'description for alerts',
  `state` enum('NEW','SEEN','SOLVED') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'state for alerts',
  `id_user` int NOT NULL,
  `id_type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `types`
--

CREATE TABLE `types` (
  `id_type` int NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `types`
--

INSERT INTO `types` (`id_type`, `type`) VALUES
(0, 'test');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL COMMENT 'PK for user',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Unique email for user',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Password for user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table for user';

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`) VALUES
(0, 'streetalert.it@gmail.com', 'Passw0rd');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id_alert`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_type` (`id_type`);

--
-- Indici per le tabelle `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id_type`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id_alert` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'PK for alerts';

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT COMMENT 'PK for user', AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `alerts`
--
ALTER TABLE `alerts`
  ADD CONSTRAINT `alerts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `alerts_ibfk_2` FOREIGN KEY (`id_type`) REFERENCES `types` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
