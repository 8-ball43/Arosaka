-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Lis 07, 2025 at 11:22 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arosaka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `administratozy`
--

CREATE TABLE `administratozy` (
  `id_admina` int(11) NOT NULL,
  `id_uzytkownika` int(11) DEFAULT NULL,
  `data_przyznania_uprawnien` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administratozy`
--

INSERT INTO `administratozy` (`id_admina`, `id_uzytkownika`, `data_przyznania_uprawnien`) VALUES
(1, 33, '2025-11-07 10:15:51');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uwagi`
--

CREATE TABLE `uwagi` (
  `id_uwagi` int(11) NOT NULL,
  `id_uzytkownika` int(11) DEFAULT NULL,
  `temat` varchar(25) DEFAULT NULL,
  `tresc` text DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uwagi`
--

INSERT INTO `uwagi` (`id_uwagi`, `id_uzytkownika`, `temat`, `tresc`, `data`) VALUES
(1, 27, '2', 'WW', '2025-11-05 10:37:40'),
(2, 27, '7', 'wtt', '2025-11-05 11:33:20'),
(3, 31, 'ttttt', 'ttttttttttt', '2025-11-05 12:00:46');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_uzytkownika` int(11) NOT NULL,
  `login` varchar(25) DEFAULT NULL,
  `haslo` varchar(25) DEFAULT NULL,
  `adres` varchar(50) DEFAULT NULL,
  `srodki_USD` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id_uzytkownika`, `login`, `haslo`, `adres`, `srodki_USD`) VALUES
(23, 'Mateusz', '1234567890', 'mateuszzawisza13@gmail.com', 0),
(26, 'Zawisza', '0987654321', 'mateuszzawisza2@gmail.com', 0),
(27, 'Rob', '1234567890', 'brzuski@gmail.com', 0),
(30, 'Mati', '1234567890', 'mateuszzawisza3@gmail.com', 0),
(31, 'mateuszzawisza13@gmial.co', '0987654321', 'lukaro.pozyczki@gmail.com', 0),
(32, 'Pan', '1234567890', 'pan.ciaston@gmail.com', 0),
(33, '8-ball', '1234567890', 'm@gmail.com', 0),
(34, 'Luqaro', '1234567890', 'mz@gmail.com', 0),
(35, 'Kuba', '1234567890', 'b@gmail.com', 84);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wplaty`
--

CREATE TABLE `wplaty` (
  `id_wplaty` int(11) NOT NULL,
  `id_uzytkownika` int(11) DEFAULT NULL,
  `kwota` float DEFAULT NULL,
  `opis` text DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wplaty`
--

INSERT INTO `wplaty` (`id_wplaty`, `id_uzytkownika`, `kwota`, `opis`, `data`) VALUES
(1, 31, 10, 'EUR', '2025-11-05 12:42:23'),
(2, 31, 10, 'EUR', '2025-11-05 12:43:50'),
(3, 31, 10, 'USD', '2025-11-05 13:52:36'),
(4, 34, 10, 'USD', '2025-11-06 08:19:47'),
(5, 34, 10, 'USD', '2025-11-06 08:20:38'),
(6, 34, 10, 'USD', '2025-11-06 08:21:49'),
(7, 34, 10, 'EUR', '2025-11-06 08:24:29'),
(8, 34, 10, 'USD', '2025-11-06 08:25:51'),
(9, 34, 10, 'EUR', '2025-11-06 08:25:56'),
(10, 34, 10, 'EUR', '2025-11-06 08:26:21'),
(11, 34, 10, 'EUR', '2025-11-06 08:26:39'),
(12, 34, 24, 'EUR', '2025-11-06 11:25:01'),
(13, 34, 10000000, 'PLN', '2025-11-06 11:31:11'),
(14, 34, 10, NULL, '2025-11-06 12:27:47'),
(15, 34, 10, 'EUR', '2025-11-06 12:28:09'),
(16, 34, 10, NULL, '2025-11-06 12:28:09'),
(17, 34, 10, 'EUR', '2025-11-06 12:29:29'),
(18, 35, 10, 'PLN', '2025-11-07 08:10:44'),
(19, 35, 10, 'EUR', '2025-11-07 08:10:56'),
(20, 35, 10, 'USD', '2025-11-07 08:24:09'),
(21, 35, 10, 'USD', '2025-11-07 08:25:02'),
(22, 35, 10, 'USD', '2025-11-07 08:30:11'),
(23, 35, 10, 'USD', '2025-11-07 08:30:51'),
(24, 35, 10, 'USD', '2025-11-07 08:32:22'),
(25, 35, 10, 'EUR', '2025-11-07 08:32:34'),
(26, 35, 10, 'USD', '2025-11-07 08:32:41'),
(27, 35, 10, 'EUR', '2025-11-07 08:32:56'),
(28, 35, 10, 'USD', '2025-11-07 08:32:59'),
(29, 35, 10, 'USD', '2025-11-07 08:33:46'),
(30, 35, 2, 'USD', '2025-11-07 08:34:04'),
(31, 35, 10, NULL, '2025-11-07 08:37:45'),
(32, 35, 10, 'PLN', '2025-11-07 08:37:49'),
(33, 35, 10, 'USD', '2025-11-07 08:37:53'),
(34, 35, 10, 'USD', '2025-11-07 08:37:57'),
(35, 35, 101, 'USD', '2025-11-07 08:38:12'),
(36, 35, 10, 'USD', '2025-11-07 08:43:31'),
(37, 35, 10, 'USD', '2025-11-07 08:58:00'),
(38, 35, 10, 'USD', '2025-11-07 08:59:14'),
(39, 35, 10, 'USD', '2025-11-07 09:05:04'),
(40, 35, 10, 'PLN', '2025-11-07 09:05:09'),
(41, 35, 10, 'EUR', '2025-11-07 09:05:12'),
(42, 35, 10, 'USD', '2025-11-07 09:05:26'),
(43, 35, 10, 'EUR', '2025-11-07 09:05:30'),
(44, 35, 10, 'USD', '2025-11-07 09:19:45');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `administratozy`
--
ALTER TABLE `administratozy`
  ADD PRIMARY KEY (`id_admina`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `uwagi`
--
ALTER TABLE `uwagi`
  ADD PRIMARY KEY (`id_uwagi`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id_uzytkownika`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `adres` (`adres`);

--
-- Indeksy dla tabeli `wplaty`
--
ALTER TABLE `wplaty`
  ADD PRIMARY KEY (`id_wplaty`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administratozy`
--
ALTER TABLE `administratozy`
  MODIFY `id_admina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uwagi`
--
ALTER TABLE `uwagi`
  MODIFY `id_uwagi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `wplaty`
--
ALTER TABLE `wplaty`
  MODIFY `id_wplaty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administratozy`
--
ALTER TABLE `administratozy`
  ADD CONSTRAINT `administratozy_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`);

--
-- Constraints for table `uwagi`
--
ALTER TABLE `uwagi`
  ADD CONSTRAINT `uwagi_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`);

--
-- Constraints for table `wplaty`
--
ALTER TABLE `wplaty`
  ADD CONSTRAINT `wplaty_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownicy` (`id_uzytkownika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
