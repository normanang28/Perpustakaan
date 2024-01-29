-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 07:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(4) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `jenis_buku` varchar(255) NOT NULL,
  `tahun_terbit` varchar(255) NOT NULL,
  `file_buku` text NOT NULL,
  `jumlah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `jenis_buku`, `tahun_terbit`, `file_buku`, `jumlah`) VALUES
(2, 'agama buddha - 12', 'pendidikan', 'Juni 2018 , 242 Halaman', '1706424143_cfeaad59991487904e70.pdf', '8'),
(4, 'coba', 'coba', 'coba', '1706498828_aea38682551644148cd8.pdf', '0');

-- --------------------------------------------------------

--
-- Table structure for table `buku_masuk`
--

CREATE TABLE `buku_masuk` (
  `id_buku_masuk` int(4) NOT NULL,
  `id_buku_buku` int(4) NOT NULL,
  `stok` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku_masuk`
--

INSERT INTO `buku_masuk` (`id_buku_masuk`, `id_buku_buku`, `stok`) VALUES
(4, 1, '2'),
(6, 2, '10');

--
-- Triggers `buku_masuk`
--
DELIMITER $$
CREATE TRIGGER `hapus` AFTER DELETE ON `buku_masuk` FOR EACH ROW update buku set jumlah = jumlah-old.stok WHERE id_buku = old.id_buku_buku
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `masuk` AFTER INSERT ON `buku_masuk` FOR EACH ROW UPDATE buku SET jumlah = jumlah + new.stok WHERE id_buku = new.id_buku_buku
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `favorit`
--

CREATE TABLE `favorit` (
  `id_favorit` int(4) NOT NULL,
  `id_buku` int(4) NOT NULL,
  `maker_favorit` int(4) NOT NULL,
  `tanggal_favorit` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorit`
--

INSERT INTO `favorit` (`id_favorit`, `id_buku`, `maker_favorit`, `tanggal_favorit`) VALUES
(8, 2, 1, '2024-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_buku`
--

CREATE TABLE `peminjaman_buku` (
  `id_peminjaman_buku` int(4) NOT NULL,
  `id_buku_buku` int(4) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `maker_peminjaman_buku` int(4) NOT NULL,
  `tanggal_peminjaman_buku` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman_buku`
--

INSERT INTO `peminjaman_buku` (`id_peminjaman_buku`, `id_buku_buku`, `stok`, `status`, `maker_peminjaman_buku`, `tanggal_peminjaman_buku`) VALUES
(14, 1, '1', 'Diterima', 2, '2024-01-28'),
(15, 1, '2', 'Tidak Diterima', 2, '2024-01-28'),
(16, 2, '1', 'Diterima', 2, '2024-01-28'),
(17, 2, '2', 'Diterima', 2, '2024-01-28'),
(18, 2, '1', 'Tidak Diterima', 2, '2024-01-28'),
(19, 2, '1', 'Tidak Diterima', 1, '2024-01-28');

--
-- Triggers `peminjaman_buku`
--
DELIMITER $$
CREATE TRIGGER `peminjaman` AFTER UPDATE ON `peminjaman_buku` FOR EACH ROW UPDATE buku SET jumlah = jumlah - new.stok WHERE id_buku = new.id_buku_buku AND new.id_buku_buku IN (SELECT id_buku_buku FROM peminjaman_buku WHERE status = 'Diterima')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_buku`
--

CREATE TABLE `pengembalian_buku` (
  `id_pengembalian_buku` int(4) NOT NULL,
  `id_buku_buku` int(4) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `id_pengguna` int(4) NOT NULL,
  `tanggal_pengembalian` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian_buku`
--

INSERT INTO `pengembalian_buku` (`id_pengembalian_buku`, `id_buku_buku`, `stok`, `id_pengguna`, `tanggal_pengembalian`) VALUES
(4, 1, '1', 1, '2024-01-28'),
(5, 2, '1', 1, '2024-01-28');

--
-- Triggers `pengembalian_buku`
--
DELIMITER $$
CREATE TRIGGER `hapus_pengembalian` AFTER DELETE ON `pengembalian_buku` FOR EACH ROW update buku set jumlah = jumlah-old.stok WHERE id_buku = old.id_buku_buku
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pengambalian` AFTER INSERT ON `pengembalian_buku` FOR EACH ROW UPDATE buku SET jumlah = jumlah + new.stok WHERE id_buku = new.id_buku_buku
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(4) NOT NULL,
  `id_user_pengguna` int(4) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tanggal_pengguna` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_user_pengguna`, `nama_pengguna`, `no_telp`, `status`, `tanggal_pengguna`) VALUES
(1, 1, 'norman ang', '081371035253', 'Aktif', '2024-01-25 17:37:13'),
(3, 9, '1', '1', 'Aktif', '2024-01-29 12:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(4) NOT NULL,
  `id_user_petugas` int(4) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `maker_petugas` int(4) NOT NULL,
  `tanggal_petugas` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `id_user_petugas`, `nama_petugas`, `nip`, `ttl`, `jk`, `status`, `maker_petugas`, `tanggal_petugas`) VALUES
(1, 2, 'admin admin', '2147483647', 'batam, 28 oktober 2006', 'Perempuan', 'Aktif', 1, '2024-01-25 18:34:40'),
(6, 8, 'petugas Perpustakaan 01', '12345678901233', 'batam, 08 desember 2004', 'Laki-Laki', 'Aktif', 2, '2024-01-25 19:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(4) NOT NULL,
  `id_buku` int(4) NOT NULL,
  `ulasan` varchar(255) NOT NULL,
  `maker_ulasan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_buku`, `ulasan`, `maker_ulasan`) VALUES
(1, 2, 'bukunya bagus', 1),
(2, 2, 'bukunya bagu', 2),
(3, 2, 'jelek', 1),
(4, 4, 'coba', 1),
(5, 2, 'coba', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(1) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `foto`) VALUES
(1, 'norman', '9ac915832a9a1c970c1564708917c3aa', 3, ''),
(2, 'admin', '3dcf34a6023633a0d92521ec9c8d5ae4', 1, ''),
(8, 'petugas 01', '3dcf34a6023633a0d92521ec9c8d5ae4', 2, ''),
(9, '1', 'c4ca4238a0b923820dcc509a6f75849b', 3, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `JUDUL_BUKU` (`judul_buku`);

--
-- Indexes for table `buku_masuk`
--
ALTER TABLE `buku_masuk`
  ADD PRIMARY KEY (`id_buku_masuk`);

--
-- Indexes for table `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id_favorit`);

--
-- Indexes for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  ADD PRIMARY KEY (`id_peminjaman_buku`);

--
-- Indexes for table `pengembalian_buku`
--
ALTER TABLE `pengembalian_buku`
  ADD PRIMARY KEY (`id_pengembalian_buku`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `NO_TELP` (`no_telp`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `NIP` (`nip`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `USERNAME` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buku_masuk`
--
ALTER TABLE `buku_masuk`
  MODIFY `id_buku_masuk` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id_favorit` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peminjaman_buku`
--
ALTER TABLE `peminjaman_buku`
  MODIFY `id_peminjaman_buku` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pengembalian_buku`
--
ALTER TABLE `pengembalian_buku`
  MODIFY `id_pengembalian_buku` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
