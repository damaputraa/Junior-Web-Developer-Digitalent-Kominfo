-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Agu 2021 pada 14.52
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasien`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `nik_ktp` varchar(16) NOT NULL,
  `keluhan` varchar(50) NOT NULL,
  `jk` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nama`, `alamat`, `nik_ktp`, `keluhan`, `jk`) VALUES
('P001', 'Rachmad Ananda Damaputra', 'jl.patin 4', '6271019283192418', 'Demam dan Batuk', 'Laki-Laki'),
('P002', 'alvin', 'Jl. Timun 31', '6271124512124125', ' Demam dan Batuk ', ' Laki-Laki ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` tinyint(2) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `user_role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `user_role`) VALUES
(0, 'bang', 'admin', '-'),
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
