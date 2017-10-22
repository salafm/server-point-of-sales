-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Okt 2017 pada 13.36
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(1) NOT NULL,
  `user` varchar(10) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `nama`, `email`) VALUES
(1, 'admin', 'admin123', 'SuperAdmin', 'admin@mart.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `apikeys`
--

CREATE TABLE `apikeys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `apikey` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `idbarang` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(11) UNSIGNED NOT NULL,
  `stok` int(11) UNSIGNED NOT NULL,
  `satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangclient`
--

CREATE TABLE `barangclient` (
  `id` int(11) NOT NULL,
  `idcabang` int(11) UNSIGNED NOT NULL,
  `idbarang` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(11) UNSIGNED NOT NULL,
  `stok` decimal(10,3) UNSIGNED NOT NULL DEFAULT '0.000',
  `satuan` varchar(15) NOT NULL,
  `flag` int(1) UNSIGNED NOT NULL DEFAULT '0',
  `cons` decimal(10,5) UNSIGNED NOT NULL DEFAULT '1.00000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `barangclient`
--
DELIMITER $$
CREATE TRIGGER `delete_barang` AFTER DELETE ON `barangclient` FOR EACH ROW INSERT INTO deleted (idcabang, kolom, idkolom)
VALUES (OLD.idcabang,'idbarang',OLD.idbarang)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangkeluar`
--

CREATE TABLE `barangkeluar` (
  `id` int(11) NOT NULL,
  `idtransaksi` varchar(12) NOT NULL,
  `idcabang` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangkeluar_details`
--

CREATE TABLE `barangkeluar_details` (
  `id` int(11) NOT NULL,
  `idtransaksi` varchar(12) NOT NULL,
  `idbarang` varchar(10) NOT NULL,
  `harga` int(11) UNSIGNED DEFAULT '0',
  `jumlah` int(11) UNSIGNED NOT NULL,
  `satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `barangkeluar_details`
--
DELIMITER $$
CREATE TRIGGER `minus_stok` BEFORE INSERT ON `barangkeluar_details` FOR EACH ROW UPDATE barang SET stok = stok - NEW.jumlah WHERE idbarang = NEW.idbarang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `id` int(11) NOT NULL,
  `idtransaksi` varchar(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangmasuk_details`
--

CREATE TABLE `barangmasuk_details` (
  `id` int(11) NOT NULL,
  `idtransaksi` varchar(11) NOT NULL,
  `idbarang` varchar(10) NOT NULL,
  `harga` int(11) UNSIGNED NOT NULL,
  `jumlah` int(5) UNSIGNED NOT NULL,
  `satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `barangmasuk_details`
--
DELIMITER $$
CREATE TRIGGER `update_stok` AFTER INSERT ON `barangmasuk_details` FOR EACH ROW UPDATE barang SET stok = stok+NEW.jumlah
    WHERE idbarang = NEW.idbarang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang`
--

CREATE TABLE `cabang` (
  `id` int(11) UNSIGNED NOT NULL,
  `user` varchar(15) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telfon` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `ip` text,
  `dibuat` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `deleted`
--

CREATE TABLE `deleted` (
  `id` int(11) UNSIGNED NOT NULL,
  `idcabang` int(11) UNSIGNED NOT NULL,
  `kolom` varchar(10) NOT NULL,
  `idkolom` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `method` varchar(6) NOT NULL,
  `params` text,
  `api_key` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `time` int(11) NOT NULL,
  `rtime` decimal(10,0) DEFAULT '0',
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT '0',
  `terbaca` int(1) NOT NULL DEFAULT '0',
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(5) UNSIGNED NOT NULL,
  `idcabang` int(4) UNSIGNED NOT NULL,
  `user` varchar(15) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `last` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) UNSIGNED NOT NULL,
  `idproduk` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(11) UNSIGNED DEFAULT '0',
  `tanggal` datetime(6) DEFAULT CURRENT_TIMESTAMP
) ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produkclient`
--

CREATE TABLE `produkclient` (
  `id` int(11) NOT NULL,
  `idproduk` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `idcabang` int(11) UNSIGNED NOT NULL,
  `harga` int(11) UNSIGNED NOT NULL,
  `stok` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `flag` int(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `produkclient`
--
DELIMITER $$
CREATE TRIGGER `delete_produk` AFTER DELETE ON `produkclient` FOR EACH ROW INSERT INTO deleted (idcabang, kolom, idkolom)
VALUES (OLD.idcabang,'idproduk',OLD.idproduk)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produkclient_details`
--

CREATE TABLE `produkclient_details` (
  `id` int(11) UNSIGNED NOT NULL,
  `idcabang` int(11) UNSIGNED NOT NULL,
  `idproduk` varchar(10) NOT NULL,
  `idbarang` varchar(10) NOT NULL,
  `jumlah` decimal(10,3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_details`
--

CREATE TABLE `produk_details` (
  `id` int(11) UNSIGNED NOT NULL,
  `idproduk` varchar(10) NOT NULL,
  `idbarang` varchar(10) NOT NULL,
  `jumlah` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apikeys`
--
ALTER TABLE `apikeys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idbarang` (`idbarang`);

--
-- Indexes for table `barangclient`
--
ALTER TABLE `barangclient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcabang` (`idcabang`,`idbarang`);

--
-- Indexes for table `barangkeluar_details`
--
ALTER TABLE `barangkeluar_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangmasuk_details`
--
ALTER TABLE `barangmasuk_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deleted`
--
ALTER TABLE `deleted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produkclient`
--
ALTER TABLE `produkclient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcabang` (`idcabang`,`idproduk`);

--
-- Indexes for table `produkclient_details`
--
ALTER TABLE `produkclient_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcabang` (`idcabang`,`idbarang`),
  ADD KEY `FK_produkclient` (`idcabang`,`idproduk`);

--
-- Indexes for table `produk_details`
--
ALTER TABLE `produk_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idbarang` (`idbarang`),
  ADD KEY `idproduk` (`idproduk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `apikeys`
--
ALTER TABLE `apikeys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barangclient`
--
ALTER TABLE `barangclient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barangkeluar_details`
--
ALTER TABLE `barangkeluar_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barangmasuk_details`
--
ALTER TABLE `barangmasuk_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deleted`
--
ALTER TABLE `deleted`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produkclient`
--
ALTER TABLE `produkclient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produkclient_details`
--
ALTER TABLE `produkclient_details`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produk_details`
--
ALTER TABLE `produk_details`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produkclient_details`
--
ALTER TABLE `produkclient_details`
  ADD CONSTRAINT `FK_barangclient` FOREIGN KEY (`idcabang`,`idbarang`) REFERENCES `barangclient` (`idcabang`, `idbarang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_produkclient` FOREIGN KEY (`idcabang`,`idproduk`) REFERENCES `produkclient` (`idcabang`, `idproduk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk_details`
--
ALTER TABLE `produk_details`
  ADD CONSTRAINT `FK_barang` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `produk_details_ibfk_1` FOREIGN KEY (`idproduk`) REFERENCES `produk` (`idproduk`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
