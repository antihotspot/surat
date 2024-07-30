-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 25 Jul 2024 pada 04.45
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_request_skd`
--

CREATE TABLE `data_request_skd` (
  `id_request_skd` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `scan_ktp` text NOT NULL,
  `scan_kk` text NOT NULL,
  `keperluan` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(20) NOT NULL DEFAULT 'DOMISILI',
  `status` int(11) NOT NULL DEFAULT 0,
  `acc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_request_skd`
--

INSERT INTO `data_request_skd` (`id_request_skd`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `keperluan`, `keterangan`, `request`, `status`, `acc`) VALUES
(21, '1111111111111111', '2021-10-18 06:46:28', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', 'Administrasi Bank', 'Surat dicetak, bisa diambil!', 'DOMISILI', 3, '2021-10-18'),
(22, '5', '2024-07-20 13:22:10', '5_.jpg', '5_.jpg', 'sekolah', 'Data sedang diperiksa oleh Staf', 'DOMISILI', 0, NULL),
(23, '5', '2024-07-22 13:36:35', '5_.jpg', '5_.jpg', 'keringanan', 'Data sedang diperiksa oleh Staf', 'DOMISILI', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_request_skp`
--

CREATE TABLE `data_request_skp` (
  `id_request_skp` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `scan_ktp` text DEFAULT NULL,
  `scan_kk` text DEFAULT NULL,
  `keperluan` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(20) NOT NULL DEFAULT 'LAINNYA',
  `status` int(11) NOT NULL DEFAULT 0,
  `acc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_request_skp`
--

INSERT INTO `data_request_skp` (`id_request_skp`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `keperluan`, `keterangan`, `request`, `status`, `acc`) VALUES
(10, '1111111111111111', '2021-10-18 06:14:07', '1111111111111111_.jpg', '1111111111111111_.jpg', 'KTP Hilang', 'Surat dicetak, bisa diambil!', 'LAINNYA', 3, '2021-10-18'),
(14, '5', '2024-07-20 12:47:49', '5_.jpg', '5_.jpg', 'pppppp', 'Data sedang diperiksa oleh Staf', 'LAINNYA', 0, NULL),
(15, '5', '2024-07-20 12:49:20', '5_.jpg', '5_.jpg', 'keringanan', 'Data sedang diperiksa oleh Staf', 'LAINNYA', 0, NULL),
(16, '5', '2024-07-20 13:04:41', '5_.jpg', '5_.jpg', 'sekolah', 'Data sedang diperiksa oleh Staf', 'LAINNYA', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_request_sktm`
--

CREATE TABLE `data_request_sktm` (
  `id_request_sktm` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `scan_ktp` text NOT NULL,
  `scan_kk` text NOT NULL,
  `keperluan` text NOT NULL,
  `request` varchar(20) NOT NULL DEFAULT 'TIDAK MAMPU',
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Staf',
  `status` int(11) NOT NULL DEFAULT 0,
  `acc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_request_sktm`
--

INSERT INTO `data_request_sktm` (`id_request_sktm`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `keperluan`, `request`, `keterangan`, `status`, `acc`) VALUES
(50, '1111111111111111', '2021-10-17 10:06:35', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', 'Beasiswa Sekolah', 'TIDAK MAMPU', 'Surat dicetak, bisa diambil!', 3, '2021-10-17'),
(51, '0987', '2024-07-10 08:19:12', '0987 - Karina Aespa_ktp_1721019201.jpg', '0987 - Karina Aespa_kk_1721019201.jpg', 'Rekomendasi beasiswa Bank Indonesia', 'TIDAK MAMPU', 'Data sedang diperiksa oleh Staf', 1, NULL),
(59, '1111111111111111', '2024-07-15 03:30:22', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', 'Bank Indonesia 2024', 'TIDAK MAMPU', 'Surat dicetak, bisa diambil!', 3, '2024-07-15'),
(61, '777', '2024-07-22 02:32:52', '777_.jpg', '777_.jpg', 'tes', 'TIDAK MAMPU', 'Data sedang diperiksa oleh Staf', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_request_sku`
--

CREATE TABLE `data_request_sku` (
  `id_request_sku` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `scan_ktp` text DEFAULT NULL,
  `scan_kk` text DEFAULT NULL,
  `usaha` varchar(30) NOT NULL,
  `keperluan` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(20) NOT NULL DEFAULT 'USAHA',
  `status` int(11) NOT NULL DEFAULT 0,
  `acc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_request_sku`
--

INSERT INTO `data_request_sku` (`id_request_sku`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `usaha`, `keperluan`, `keterangan`, `request`, `status`, `acc`) VALUES
(9, '1111111111111111', '2021-10-17 10:37:58', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', 'Warung Kopi', 'Bantuan UMKM', 'Surat dicetak, bisa diambil!', 'USAHA', 3, '2021-10-17'),
(15, '0987', '2024-07-18 03:53:34', '0987_.jpg', '0987_.jpg', 'Kambing Guling', 'keringanan', 'Surat sedang dalam proses cetak', 'USAHA', 2, '2024-07-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `nik` varchar(16) NOT NULL,
  `password` varchar(225) NOT NULL,
  `hak_akses` varchar(225) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `jekel` varchar(20) NOT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `status_warga` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`nik`, `password`, `hak_akses`, `nama`, `tanggal_lahir`, `tempat_lahir`, `jekel`, `agama`, `alamat`, `telepon`, `status_warga`) VALUES
('009908', 'kjnkjn', 'Pemohon', 'NJBKJBH', '2021-12-11', 'kjnkj', 'Laki-Laki', '', 'kjnhkjn', '', 'Kerja'),
('012345', 'YAAllah', 'Pemohon', 'Jeebanoff', '2024-07-13', 'Mojokerto', 'Laki-Laki', 'Islam', 'tuban', '098766', 'Kerja'),
('0987', '0987', 'Pemohon', 'Karina Aespa', '2002-01-24', 'Banyuwangi', 'Perempuan', 'Kristen', ' Banyuwangi', '082334099575', 'Kerja'),
('098755555', '3456', 'Pemohon', 'arsha albar', '2024-06-30', 'Mojokerto', 'Laki-Laki', 'Islam', 'dfgdg', '78787', 'Sekolah'),
('0988665', '040487', 'Pemohon', 'Jeno NCT', '2024-07-09', 'Mojokerto', 'Laki-Laki', 'Islam', 'panjen', '098766', 'Kerja'),
('1', '1', 'Lurah', 'coba', '2021-10-20', 'coba', 'Laki-Laki', '', 'coba', '', 'Kerja'),
('1111111111111111', '12345', 'Pemohon', 'Fachri Shofiyyuddin Ahmad', '2021-10-17', 'Jakarta', 'Laki-Laki', 'Islam', '        Jakarta RT 01/RW 07', '087897315639', 'Sekolah'),
('2', '2', 'Staf', 'coba', '2021-10-20', 'coba', 'Perempuan', '', 'coba', '', 'Kerja'),
('2222222', '1234', 'Pemohon', 'Wisata', '2024-07-04', 'Mojokerto', 'Laki-Laki', 'Islam', 'mlk', '78787', 'Sekolah'),
('5', 'mm', 'Pemohon', 'kilkml', '2024-07-19', 'mjk', 'Laki-Laki', NULL, NULL, NULL, NULL),
('777', '12345', 'Pemohon', 'a', '2021-10-20', 'oke', 'Laki-Laki', 'Islam', 'xn', '08987', 'Sekolah'),
('888', '12345', 'Pemohon', 'cobalagi', '2021-10-20', 'cobalagi', 'Perempuan', '', 'coba', '', 'Sekolah'),
('8923478923789489', 'tes', 'Pemohon', 'coba', '2022-05-22', 'kudus', 'Laki-Laki', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lembar_disposisi`
--

CREATE TABLE `lembar_disposisi` (
  `no_agenda` varchar(50) NOT NULL,
  `dari` text NOT NULL,
  `nomor_surat` text NOT NULL,
  `tanggal_surat` varchar(20) NOT NULL,
  `jam_diterima` varchar(25) NOT NULL,
  `perihal` text NOT NULL,
  `tanggal_masuk` varchar(20) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_request_skd`
--
ALTER TABLE `data_request_skd`
  ADD PRIMARY KEY (`id_request_skd`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indeks untuk tabel `data_request_skp`
--
ALTER TABLE `data_request_skp`
  ADD PRIMARY KEY (`id_request_skp`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indeks untuk tabel `data_request_sktm`
--
ALTER TABLE `data_request_sktm`
  ADD PRIMARY KEY (`id_request_sktm`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indeks untuk tabel `data_request_sku`
--
ALTER TABLE `data_request_sku`
  ADD PRIMARY KEY (`id_request_sku`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `lembar_disposisi`
--
ALTER TABLE `lembar_disposisi`
  ADD PRIMARY KEY (`no_agenda`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_request_skd`
--
ALTER TABLE `data_request_skd`
  MODIFY `id_request_skd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `data_request_skp`
--
ALTER TABLE `data_request_skp`
  MODIFY `id_request_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `data_request_sktm`
--
ALTER TABLE `data_request_sktm`
  MODIFY `id_request_sktm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `data_request_sku`
--
ALTER TABLE `data_request_sku`
  MODIFY `id_request_sku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_request_skd`
--
ALTER TABLE `data_request_skd`
  ADD CONSTRAINT `data_request_skd_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_request_skp`
--
ALTER TABLE `data_request_skp`
  ADD CONSTRAINT `data_request_skp_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_request_sktm`
--
ALTER TABLE `data_request_sktm`
  ADD CONSTRAINT `data_request_sktm_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_request_sku`
--
ALTER TABLE `data_request_sku`
  ADD CONSTRAINT `data_request_sku_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
