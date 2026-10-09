-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 05, 2024 alle 01:37
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
-- Database: `capolavoro`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `biglietti`
--

CREATE TABLE `biglietti` (
  `user` varchar(50) DEFAULT NULL,
  `id_concerto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `biglietti`
--

INSERT INTO `biglietti` (`user`, `id_concerto`) VALUES
('previ', 1),
('previ', 1),
('previ', 4),
('previ', 4),
('previ', 4),
('damo', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `concerti`
--

CREATE TABLE `concerti` (
  `id_concerto` int(11) NOT NULL,
  `cantante` varchar(50) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `concerti`
--

INSERT INTO `concerti` (`id_concerto`, `cantante`, `data`) VALUES
(1, 'tha supreme', '2024-11-29'),
(2, 'madman', '2029-12-07'),
(3, 'nayt', '2025-12-22'),
(4, 'diss gacha', '2023-06-02');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `email` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`email`, `PASSWORD`, `user`) VALUES
('angillettadavide@gmail.com', 'angi', 'angi'),
('damicodavide@gmail.com', 'damo', 'damo'),
('hamzabensaid@gmail.com', 'hamza', 'hamza'),
('misturalorenzo@gmail.com', 'mistu', 'mistu'),
('previciniivan@gmail.com', 'previ', 'previ'),
('renatobardo@gmail.com', 'bardo', 'bardo');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `concerti`
--
ALTER TABLE `concerti`
  ADD PRIMARY KEY (`id_concerto`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
