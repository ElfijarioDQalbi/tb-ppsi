-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2021 pada 12.31
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

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
-- Struktur dari tabel `mahasiswa`
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
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `email`, `password`, `no_hp`) VALUES
('1234512412414', 'Fio DQalbi', 'Bukittinggi', 'fioelfijario@gmail.com', 'ab05f7fdd670cacb3730780c6022c116', '085241678216'),
('13617135135', 'Mahasiswa1', 'Jakarta', 'mahasiswa1@gmail.com', '8eac357684eb8c36513235c7e77bfdfb', '08646241462'),
('1911521021', 'Elfijario Direnda Qalbi', 'Bukittinggi', 'elfijario@gmail.com', 'ab05f7fdd670cacb3730780c6022c116', '08778969491'),
('1911521036', 'Abdul Gofar', 'Bukittinggi', 'abdulgofar@gmail.com', '852a9874340b2601747efe7213ebe960', '086453245245'),
('35002374502734', 'rashad', 'Padang', 'rashad1@gmail.com', 'e240995fc48533b8efbde0d49f73dec0', '089345896345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
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
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nim`, `isi_pengaduan`, `foto`, `status`) VALUES
(14, '2021-12-20', '1911521021', 'wifi lemot', 'nol.png', 'proses'),
(15, '2021-12-09', '1911521036', 'keran kamar mandi lt 2 rusak', 'nolImage.png', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `nip` varchar(20) NOT NULL,
  `nama_petugas` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`nip`, `nama_petugas`, `password`, `no_hp`, `level`, `alamat`, `email`) VALUES
('1241151616', 'Admin1', 'e00cf25ad42683b3df678c61f42c6bda', '08745863453', 'admin', 'Medan', 'admin1@gmail.com'),
('15136136173', 'Petugas1', 'b53fe7751b37e40ff34d012c7774d65f', '084567864857', 'petugas', 'Padang', 'petugas1@gmail.com'),
('86262724252', 'Petugas2', 'ac5604a8b8504d4ff5b842480df02e91', '08673452532', 'petugas', 'Pekanbaru', 'petugas2@gmail.com'),
('89389461924693', 'Hendri Kasim', '47cbe287d01676034b7a5b40c2727989', '0853135136', 'admin', 'Padang', 'hendri123@gmail.com'),
('987154125415', 'Leonel Akbar', 'e177b26fdb95fb2fd902d134d4f321e3', '0852448442', 'admin', 'Bandung', 'akbar1@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `respon`
--

CREATE TABLE `respon` (
  `id_respon` int(5) NOT NULL,
  `id_pengaduan` int(5) NOT NULL,
  `tgl_respon` date NOT NULL,
  `isi_respon` varchar(300) NOT NULL,
  `nip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `respon`
--

INSERT INTO `respon` (`id_respon`, `id_pengaduan`, `tgl_respon`, `isi_respon`, `nip`) VALUES
(10, 14, '2021-12-21', 'petugas indihome akan datang', '86262724252'),
(11, 15, '2021-12-20', 'akan diperbaiki', '15136136173');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `respon`
--
ALTER TABLE `respon`
  ADD PRIMARY KEY (`id_respon`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `nip` (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `respon`
--
ALTER TABLE `respon`
  MODIFY `id_respon` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `respon`
--
ALTER TABLE `respon`
  ADD CONSTRAINT `respon_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respon_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `petugas` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
