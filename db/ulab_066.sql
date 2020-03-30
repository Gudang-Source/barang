-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Des 2017 pada 16.59
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ulab_123`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_123`
--

CREATE TABLE IF NOT EXISTS `barang_123` (
`kode_barang` int(4) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_barang` int(9) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `barang_123`
--

INSERT INTO `barang_123` (`kode_barang`, `nama_barang`, `harga_barang`) VALUES
(1, 'PS 4', 4000000),
(2, 'PS 3', 3000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan_123`
--

CREATE TABLE IF NOT EXISTS `pelanggan_123` (
`id_pelanggan` int(3) NOT NULL,
  `nama_pelanggan` varchar(35) NOT NULL,
  `hp_pelanggan` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `pelanggan_123`
--

INSERT INTO `pelanggan_123` (`id_pelanggan`, `nama_pelanggan`, `hp_pelanggan`) VALUES
(2, 'Kiki', '0865761726152'),
(3, 'Kuku', '0871626128812');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_123`
--

CREATE TABLE IF NOT EXISTS `transaksi_123` (
`id_transaksi` int(4) NOT NULL,
  `id_pelanggan` int(4) NOT NULL,
  `kode_barang` int(4) NOT NULL,
  `cara_pembayaran` int(1) NOT NULL,
  `uang_muka` int(9) NOT NULL,
  `jangka_waktu` int(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `transaksi_123`
--

INSERT INTO `transaksi_123` (`id_transaksi`, `id_pelanggan`, `kode_barang`, `cara_pembayaran`, `uang_muka`, `jangka_waktu`) VALUES
(1, 3, 2, 1, 3000000, 0),
(2, 2, 1, 2, 500000, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_123`
--
ALTER TABLE `barang_123`
 ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `pelanggan_123`
--
ALTER TABLE `pelanggan_123`
 ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `transaksi_123`
--
ALTER TABLE `transaksi_123`
 ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_123`
--
ALTER TABLE `barang_123`
MODIFY `kode_barang` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pelanggan_123`
--
ALTER TABLE `pelanggan_123`
MODIFY `id_pelanggan` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi_123`
--
ALTER TABLE `transaksi_123`
MODIFY `id_transaksi` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
