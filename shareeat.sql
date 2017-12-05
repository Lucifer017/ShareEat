-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 Des 2017 pada 04.46
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shareeat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_user`
--

CREATE TABLE `info_user` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info_user`
--

INSERT INTO `info_user` (`username`, `nama`, `no_hp`, `lokasi`, `password`, `email`) VALUES
('HabibM', 'Muhammad Habib\r\n      ', '08080808080', '', 'habib', 'habib@email.com'),
('LuciferQueen', 'Irfan Firdaus', '08121409681', '{lat:-6.9323,lng:107.7295}', 'i wanna be your end game', 'irfandauss0@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info_user`
--
ALTER TABLE `info_user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
