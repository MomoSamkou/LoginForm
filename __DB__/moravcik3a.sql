-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Št 13.Jún 2024, 15:43
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `moravcik3a`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `auto`
--

CREATE TABLE `auto` (
  `id` int(11) NOT NULL,
  `model_auta` varchar(150) DEFAULT NULL,
  `rok_vyroby` int(11) DEFAULT NULL,
  `cena` float DEFAULT NULL,
  `vyrobca` varchar(100) DEFAULT NULL,
  `typ_auta` int(11) DEFAULT NULL,
  `najazdene_km` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `auto`
--

INSERT INTO `auto` (`id`, `model_auta`, `rok_vyroby`, `cena`, `vyrobca`, `typ_auta`, `najazdene_km`) VALUES
(1, 'Fiat  Multipla', 2002, 25000, 'Fiat', 1, 450000),
(2, 'Camry', 2005, 2300, 'Toyota', 2, 50000),
(3, 'Meriva', 2014, 3600, 'Opel', 3, 15000),
(4, 'Lamborghini ', 2003, 5000000, 'Lamborghini', 2, 2000),
(5, 'Audi RS6 avant', 2022, 150000, 'Audi', 1, 1500),
(6, '911 GT3RS', 2021, 1600000, 'Porsche', 2, 15000),
(7, 'BMW M5 Competition', 2004, 150000, 'BMW', 2, 50000),
(8, 'Hyundai i20 n', 2014, 25000, 'Hyundai', 2, 15000),
(9, 'BMW e36', 2012, 25000, 'BMW', 1, 15000),
(10, 'Ferrari ', 2014, 5000000, 'Ferrari ', 2, 450000);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `kategoria`
--

CREATE TABLE `kategoria` (
  `id` int(11) NOT NULL,
  `typ_auta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `kategoria`
--

INSERT INTO `kategoria` (`id`, `typ_auta`) VALUES
(1, 'Mini MPV'),
(2, 'Šport'),
(3, 'Sedán'),
(4, 'Coupé\r\n'),
(5, 'Hatchback'),
(6, 'Kombi');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `t_user`
--

CREATE TABLE `t_user` (
  `id` bigint(150) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `email`, `password`) VALUES
(1, 'jozko', 'jozko@jozko.sk', '123'),
(2, 'ferko', 'ferko@ferko.sk', '321'),
(7, 'samo', 'fsjfsa@b.com', 'samuel');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `auto`
--
ALTER TABLE `auto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pre tabuľku `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` bigint(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
