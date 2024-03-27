-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: St 27.Mar 2024, 13:11
-- Verzia serveru: 10.4.24-MariaDB
-- Verzia PHP: 8.1.6

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
-- Štruktúra tabuľky pre tabuľku `t_user`
--

CREATE TABLE `t_user` (
  `id` bigint(150) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `email`, `password`) VALUES
(1, 'jozko', 'jozko@jozko.sk', '123'),
(2, 'ferko', 'ferko@ferko.sk', '321');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` bigint(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
