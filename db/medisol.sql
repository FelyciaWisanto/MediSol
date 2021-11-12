-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2021 pada 11.14
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medisol`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
('04031a0f-308c-11ec-8f91-88d7f69998cf', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
('16ef35de-309c-11ec-8f91-88d7f69998cf', 'wahyu', 'wahyu', '32c9e71e866ecdbc93e497482aa6779f');

-- --------------------------------------------------------

--
-- Struktur dari tabel `apotek`
--

CREATE TABLE `apotek` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `longitude` text NOT NULL,
  `langitude` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `apotek`
--

INSERT INTO `apotek` (`id`, `nama`, `alamat`, `longitude`, `langitude`) VALUES
('013a07e1-30b1-11ec-8f91-88d7f69998cf', 'Apotek 1', 'Jln Alamat', '123456', '654321'),
('0da1afa1-30b1-11ec-8f91-88d7f69998cf', 'Apotek 2', 'Alamat 2', '0', '01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `komposisi` text NOT NULL,
  `efek_samping` varchar(255) NOT NULL,
  `indikasi` text NOT NULL,
  `dosis` varchar(255) NOT NULL,
  `aturan_pakai` text NOT NULL,
  `perhatian` text NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id`, `nama`, `komposisi`, `efek_samping`, `indikasi`, `dosis`, `aturan_pakai`, `perhatian`, `keterangan`, `gambar`) VALUES
('448a12d5-3244-11ec-a377-88d7f69998cf', 'C2dawd', 'Karbon', 'Ngantuk', 'Over', '1x1 Sehari', 'Anjuran Dokter', 'Tidak ada', '<ol><li>jangan tidur</li><li>jangan makan</li></ol>', 'image_2021-10-18_10-36-126.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat_apotek`
--

CREATE TABLE `obat_apotek` (
  `id` varchar(255) NOT NULL,
  `id_apotek` varchar(255) NOT NULL,
  `id_obat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `apotek`
--
ALTER TABLE `apotek`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `obat_apotek`
--
ALTER TABLE `obat_apotek`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
