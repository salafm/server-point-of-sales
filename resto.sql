-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Sep 2017 pada 18.43
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

--
-- Dumping data untuk tabel `apikeys`
--

INSERT INTO `apikeys` (`id`, `user_id`, `apikey`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 11, '123456', 10, 0, 0, NULL, 0),
(2, 69, 'zNmuaf2NleNR5KTl', 10, 0, 0, '192.168.1.7', 0),
(9, 64, 'FP8fuJ1IvuNDobMV', 10, 0, 0, '192.168.1.1', 0);

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

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `idbarang`, `nama`, `harga`, `stok`, `satuan`) VALUES
(2, '0002', 'Pasta gigi', 50000, 28, 'Buah'),
(5, '0005', 'Lemari', 75000, 30, 'Buah'),
(6, '0006', 'Mangga', 10000, 20, 'buah'),
(7, '00100', 'Marimas', 2500, 965, 'kg'),
(11, '00120', 'Steak', 100000, 100, 'pc'),
(12, '00123', 'Daging', 12000, 39, 'kg'),
(14, '00150', 'Sikat', 5000, 33, 'pcs'),
(15, '00190', 'Gorden', 25000, 42, 'buah'),
(18, 'jamur001', 'jamur', 5000, 0, 'kg'),
(19, 'kentang01', 'Kentang', 5000, 40, 'kg'),
(20, 'minyak01', 'Minyak Goreng', 10000, 67, 'liter'),
(21, 'broko01', 'brokoli', 7500, 68, 'kg'),
(22, 'chiki01', 'Chiki', 500, 0, 'pcs'),
(23, 'coba001', 'coba', 150, 100, 'apapun'),
(24, 'cocacola01', 'coca cola', 4500, 12, 'botol 1 li');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangclient`
--

CREATE TABLE `barangclient` (
  `id` int(11) NOT NULL,
  `idbarang` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `idcabang` varchar(10) NOT NULL,
  `harga` int(11) UNSIGNED NOT NULL,
  `stok` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barangclient`
--

INSERT INTO `barangclient` (`id`, `idbarang`, `nama`, `idcabang`, `harga`, `stok`, `satuan`) VALUES
(27, '0006', 'mangga', '26', 1000, 10, 'potong'),
(28, '00100', 'Marimas', '26', 250, 0, 'sendok'),
(29, 'kentang01', 'Kentang', '26', 5000, 0, 'kg'),
(30, 'minyak01', 'Minyak', '26', 10000, 0, 'liter'),
(31, 'broko01', 'brokoli', '26', 7500, 0, 'kg'),
(32, 'kentang01', 'Kentang', '33', 5000, 0, 'kg'),
(33, 'minyak01', 'Minyak', '33', 10000, 0, 'liter'),
(34, '0006', 'mangga', '33', 10000, 0, 'buah'),
(35, '00100', 'Marimas', '33', 2500, 0, 'kg'),
(36, 'broko01', 'brokoli', '33', 7500, 0, 'kg'),
(37, '0002', 'Pasta gigi', '26', 5000, 0, 'Buah'),
(38, '00150', 'Sikat', '26', 5000, 0, 'pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangkeluar`
--

CREATE TABLE `barangkeluar` (
  `id` int(11) NOT NULL,
  `idtransaksi` varchar(10) NOT NULL,
  `idcabang` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data untuk tabel `barangkeluar`
--

INSERT INTO `barangkeluar` (`id`, `idtransaksi`, `idcabang`, `nama`, `deskripsi`, `tanggal`) VALUES
(24, 'out1', 26, 'Alfamart', 'coba pertama', '2017-09-17 10:58:49.188593'),
(25, 'out2', 33, 'Tokopedia', 'Beli Kedua', '2017-09-17 11:20:49.593115'),
(26, 'out3', 33, 'Tokopedia', 'Tambah lagi', '2017-09-17 11:23:20.358739'),
(27, 'out004', 33, 'Tokopedia', 'Coba tambah stok', '2017-09-17 20:49:08.657470'),
(28, 'out100', 26, 'Alfamart', 'Beli perlengkapan mandi', '2017-09-19 13:38:08.377697');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangkeluar_details`
--

CREATE TABLE `barangkeluar_details` (
  `id` int(11) NOT NULL,
  `idtransaksi` varchar(10) NOT NULL,
  `idproduk` varchar(10) NOT NULL,
  `harga` int(11) UNSIGNED DEFAULT '0',
  `jumlah` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barangkeluar_details`
--

INSERT INTO `barangkeluar_details` (`id`, `idtransaksi`, `idproduk`, `harga`, `jumlah`) VALUES
(45, 'out1', 'prod002', 15000, 3),
(46, 'out1', 'prod003', 45000, 2),
(47, 'out1', 'prod005', 40000, 1),
(48, 'out2', 'prod003', 45000, 1),
(49, 'out3', 'prod002', 15000, 1),
(52, 'out004', 'prod005', 40000, 1),
(53, 'out004', 'prod003', 45000, 2),
(54, 'out100', 'prod006', 55000, 2);

--
-- Trigger `barangkeluar_details`
--
DELIMITER $$
CREATE TRIGGER `minus_stok` AFTER INSERT ON `barangkeluar_details` FOR EACH ROW UPDATE barang INNER JOIN produk_details ON produk_details.idbarang = barang.idbarang SET stok = stok - (jumlah*NEW.jumlah) WHERE idproduk = NEW.idproduk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `id` int(11) NOT NULL,
  `idtransaksi` varchar(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data untuk tabel `barangmasuk`
--

INSERT INTO `barangmasuk` (`id`, `idtransaksi`, `deskripsi`, `tanggal`) VALUES
(30, 'apapun', 'coba', '2017-09-13 20:49:22.313164'),
(31, 'in00123', 'Nyoba id transaksi', '2017-09-13 21:00:16.003553'),
(32, 'in001000', 'Tambah Stok', '2017-09-15 18:09:35.256593');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangmasuk_details`
--

CREATE TABLE `barangmasuk_details` (
  `id` int(11) NOT NULL,
  `idtransaksi` varchar(10) NOT NULL,
  `idbarang` varchar(10) NOT NULL,
  `harga` int(11) UNSIGNED NOT NULL,
  `jumlah` int(5) UNSIGNED NOT NULL,
  `satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barangmasuk_details`
--

INSERT INTO `barangmasuk_details` (`id`, `idtransaksi`, `idbarang`, `harga`, `jumlah`, `satuan`) VALUES
(50, 'apapun', 'coba001', 150, 100, 'apapun'),
(51, 'in00123', 'cocacola01', 4500, 12, 'botol 1 li'),
(52, 'in00123', '00150', 5550, 13, 'pcs'),
(53, 'in001000', '0002', 10000, 15, 'Buah'),
(54, 'in001000', '0005', 50000, 15, 'Buah');

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
  `ip` text,
  `dibuat` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data untuk tabel `cabang`
--

INSERT INTO `cabang` (`id`, `user`, `pass`, `nama`, `ip`, `dibuat`) VALUES
(26, 'alfa', 'password2', 'Alfamart', '::1', '2017-09-09 04:31:39.142479'),
(33, 'tokped', 'tokpedpass', 'Tokopedia', '192.168.1.7', '2017-09-09 04:31:39.142479'),
(37, 'olx''', 'olxpass', 'OLX', NULL, '2017-09-09 04:31:39.142479'),
(38, 'shopeeuser', 'shopeepass', 'Shopee', NULL, '2017-09-09 04:31:39.142479'),
(39, 'giant', 'giantpass', 'Giant', NULL, '2017-09-09 04:31:39.142479'),
(40, 'cf', 'cfpass', 'Carrefour', NULL, '2017-09-09 04:31:39.142479'),
(46, 'indomart', 'indopass', 'Indomart', NULL, '2017-09-09 04:31:39.142479'),
(47, '3vago', '3vagopass', 'Trivago', NULL, '2017-09-09 04:31:39.142479'),
(49, 'shopie', 'shopie123', 'Shopie', NULL, '2017-09-09 04:31:39.142479'),
(52, 'mthr', 'mthrpass', 'Matahari Mall', '192.168.3.4', '2017-09-09 11:42:00.898399'),
(64, 'dpstore', 'dstorepass', 'Dipo Store', '192.168.1.1', '2017-09-17 17:13:53.606772');

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
  `rtime` float DEFAULT NULL,
  `authorized` varchar(1) NOT NULL,
  `response_code` smallint(3) DEFAULT '0'
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

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `idcabang`, `user`, `pass`, `nama`, `email`, `last`, `count`) VALUES
(2, 38, 'petugas', 'petugas', 'Petugas Baru', '0', '2017-09-19 12:44:23.066219', 1),
(3, 26, 'petugas2', 'password', 'Petugas', '0', '2017-09-19 03:30:32.368876', 1),
(4, 26, 'petugaskedua', 'Password2', 'Petugas', 'petugas@email.com', '2017-09-19 11:09:39.786154', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `idproduk` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(11) UNSIGNED DEFAULT '0',
  `tanggal` datetime(6) DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `idproduk`, `nama`, `harga`, `tanggal`) VALUES
(2, 'prod002', 'Jus Mangga', 15000, '2017-09-11 10:21:33.264869'),
(4, 'prod003', 'French Fries', 45000, '2017-09-14 01:49:20.141581'),
(5, 'prod004', 'Jamur Goreng', 35000, '2017-09-14 10:12:27.730212'),
(6, 'prod005', 'Brokolli Goreng', 40000, '2017-09-14 10:16:39.028585'),
(7, 'prod006', 'Perlengkapan Mandi', 55000, '2017-09-19 13:37:29.899496');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produkclient`
--

CREATE TABLE `produkclient` (
  `id` int(11) NOT NULL,
  `idproduk` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `idcabang` varchar(10) NOT NULL,
  `harga` int(11) UNSIGNED NOT NULL,
  `stok` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produkclient`
--

INSERT INTO `produkclient` (`id`, `idproduk`, `nama`, `idcabang`, `harga`, `stok`) VALUES
(18, 'prod002', 'Jus Mangga', '26', 3500, 0),
(19, 'prod003', 'French Fries', '26', 45000, 0),
(20, 'prod005', 'Brokolli Goreng', '26', 40000, 0),
(21, 'prod003', 'French Fries', '33', 45000, 0),
(22, 'prod002', 'Jus Mangga', '33', 15000, 0),
(23, 'prod005', 'Brokolli Goreng', '33', 40000, 0),
(24, 'prod006', 'Perlengkapan Mandi', '26', 10000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produkclient_details`
--

CREATE TABLE `produkclient_details` (
  `id` int(11) UNSIGNED NOT NULL,
  `idcabang` int(11) UNSIGNED NOT NULL,
  `idproduk` varchar(10) NOT NULL,
  `idbarang` varchar(10) NOT NULL,
  `jumlah` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produkclient_details`
--

INSERT INTO `produkclient_details` (`id`, `idcabang`, `idproduk`, `idbarang`, `jumlah`) VALUES
(7, 26, 'prod002', '0006', 1),
(8, 26, 'prod002', '00100', 10),
(9, 26, 'prod003', 'kentang01', 5),
(10, 26, 'prod003', 'minyak01', 2),
(11, 26, 'prod005', 'broko01', 4),
(12, 26, 'prod005', 'minyak01', 1),
(13, 33, 'prod003', 'kentang01', 5),
(14, 33, 'prod003', 'minyak01', 2),
(15, 33, 'prod002', '0006', 1),
(16, 33, 'prod002', '00100', 2),
(17, 33, 'prod005', 'broko01', 4),
(18, 33, 'prod005', 'minyak01', 1),
(19, 26, 'prod006', '0002', 1),
(20, 26, 'prod006', '00150', 1);

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
-- Dumping data untuk tabel `produk_details`
--

INSERT INTO `produk_details` (`id`, `idproduk`, `idbarang`, `jumlah`) VALUES
(3, 'prod002', '0006', 1),
(4, 'prod002', '00100', 2),
(6, 'prod003', 'kentang01', 5),
(7, 'prod003', 'minyak01', 2),
(8, 'prod004', 'jamur001', 5),
(9, 'prod004', 'minyak01', 1),
(10, 'prod005', 'broko01', 4),
(11, 'prod005', 'minyak01', 1),
(12, 'prod006', '0002', 1),
(13, 'prod006', '00150', 1);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produkclient`
--
ALTER TABLE `produkclient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produkclient_details`
--
ALTER TABLE `produkclient_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_details`
--
ALTER TABLE `produk_details`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `barangclient`
--
ALTER TABLE `barangclient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barangkeluar_details`
--
ALTER TABLE `barangkeluar_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `barangmasuk_details`
--
ALTER TABLE `barangmasuk_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produkclient`
--
ALTER TABLE `produkclient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `produkclient_details`
--
ALTER TABLE `produkclient_details`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `produk_details`
--
ALTER TABLE `produk_details`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
