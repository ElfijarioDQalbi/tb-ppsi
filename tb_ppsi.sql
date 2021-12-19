-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 10:51 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tb_ppsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `email`, `password`, `no_hp`) VALUES
('1234512412414', 'Fio DQalbi', 'Bukittinggi', 'fioelfijario@gmail.com', 'ab05f7fdd670cacb3730780c6022c116', '085241678216'),
('13617135135', 'Mahasiswa1', 'Jakarta', 'mahasiswa1@gmail.com', '8eac357684eb8c36513235c7e77bfdfb', '08646241462'),
('1911521021', 'Elfijario Direnda Qalbi', 'Bukittinggi', 'elfijario@gmail.com', 'ab05f7fdd670cacb3730780c6022c116', '08778969491'),
('1911521036', 'Abdul Gofar', 'Bukittinggi', 'abdulgofar@gmail.com', '852a9874340b2601747efe7213ebe960', '086453245245'),
('35002374502734', 'rashad', 'Padang', 'rashad1@gmail.com', 'e240995fc48533b8efbde0d49f73dec0', '089345896345');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(5) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nim` varchar(16) NOT NULL,
  `isi_pengaduan` varchar(300) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nim`, `isi_pengaduan`, `foto`, `status`) VALUES
(8, '2021-03-23', '359300972304', 'wifi lag', '230320210612wenakk.jpg', 'selesai'),
(9, '2021-03-23', '359300972304', 'wifi lemot', '230320210241wenakk.jpg', 'selesai'),
(10, '2021-03-23', '359300972304', '', 'noImage.png', 'selesai'),
(11, '2021-12-13', '359300972304', 'pintu rusak', 'noImage.png', 'selesai'),
(12, '2021-12-19', '359300972304', 'wifi mati dilantai 3', 'noImage.png', 'proses'),
(13, '2021-12-19', '359300972304', 'wifi mati', 'noImage.png', 'proses');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`nip`, `nama`, `password`, `no_hp`, `level`, `alamat`, `email`) VALUES
('1241151616', 'Admin1', 'e00cf25ad42683b3df678c61f42c6bda', '08745863453', 'admin', 'Medan', 'admin1@gmail.com'),
('15136136173', 'Petugas1', 'b53fe7751b37e40ff34d012c7774d65f', '084567864857', 'petugas', 'Padang', 'petugas1@gmail.com'),
('86262724252', 'Petugas2', 'ac5604a8b8504d4ff5b842480df02e91', '08673452532', 'petugas', 'Pekanbaru', 'petugas2@gmail.com'),
('89389461924693', 'Hendri Kasim', '47cbe287d01676034b7a5b40c2727989', '0853135136', 'admin', 'Padang', 'hendri123@gmail.com'),
('987154125415', 'Leonel Akbar', 'e177b26fdb95fb2fd902d134d4f321e3', '0852448442', 'admin', 'Bandung', 'akbar1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `respon`
--

CREATE TABLE `respon` (
  `id_respon` int(5) NOT NULL,
  `id_pengaduan` int(5) NOT NULL,
  `tgl_respon` date NOT NULL,
  `isi_respon` varchar(300) NOT NULL,
  `nip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `respon`
--

INSERT INTO `respon` (`id_respon`, `id_pengaduan`, `tgl_respon`, `isi_respon`, `nip`) VALUES
(1, 1, '2020-02-13', 'berarti awak nan punyo tu mah', '2'),
(2, 4, '2021-03-22', 'indihome ngambek', '2'),
(4, 6, '2021-03-22', 'tanya pln', '4'),
(6, 8, '2021-03-23', 'kabel fiber bermasalah', '7'),
(7, 9, '2021-03-23', 'hubungi telkom', '7'),
(8, 10, '2021-03-23', '', '7'),
(9, 11, '2021-12-13', 'pintu akan segera diperbaiki', '7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `respon`
--
ALTER TABLE `respon`
  ADD PRIMARY KEY (`id_respon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `respon`
--
ALTER TABLE `respon`
  MODIFY `id_respon` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
