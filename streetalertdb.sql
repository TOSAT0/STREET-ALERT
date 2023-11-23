-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Nov 23, 2023 alle 17:38
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `streetalertdb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `alerts`
--

CREATE TABLE `alerts` (
  `id_alert` int(11) NOT NULL COMMENT 'PK for alerts',
  `photo` varchar(255) NOT NULL COMMENT 'directory for photos',
  `lat` float(8,6) NOT NULL COMMENT 'latitude for alerts',
  `lon` float(8,6) NOT NULL COMMENT 'longitude for alerts',
  `category` enum('Segnale stradale','Buca stradale','Gardrail','Segnaletica orizzontale','Carcassa animale','Altro') NOT NULL COMMENT 'enum of categories for alerts ',
  `description` varchar(255) NOT NULL COMMENT 'description for alerts',
  `state` enum('Nuovo','Visto','Risolto') NOT NULL COMMENT 'state for alerts',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL COMMENT 'PK for user',
  `email` varchar(255) NOT NULL COMMENT 'Unique email for user',
  `password` varchar(255) NOT NULL COMMENT 'Password for user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table for user';

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id_alert`),
  ADD KEY `id_user` (`id_user`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id_alert` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK for alerts';

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK for user';

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `alerts`
--
ALTER TABLE `alerts`
  ADD CONSTRAINT `alerts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
