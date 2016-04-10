-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 10 Apr 2016 pada 09.38
-- Versi Server: 5.6.14
-- Versi PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `warungku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `barang_id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_kode` varchar(18) NOT NULL,
  `barang_nama` varchar(50) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `satuan_id` varchar(3) NOT NULL,
  `stock_awal` int(10) NOT NULL,
  `barang_keluar` int(11) NOT NULL,
  `stock_akhir` int(11) NOT NULL,
  `harga_dasar` decimal(10,0) NOT NULL,
  `harga_jual` decimal(10,0) NOT NULL,
  PRIMARY KEY (`barang_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`barang_id`, `barang_kode`, `barang_nama`, `kategori_id`, `satuan_id`, `stock_awal`, `barang_keluar`, `stock_akhir`, `harga_dasar`, `harga_jual`) VALUES
(1, 'B001', 'SUSU ENAK', 1, '14', 6, 3, 9, '1500', '2000'),
(3, 'S001', 'Sinar Laut', 8, '7', 1103, 3, 1100, '2', '3000'),
(6, 'sss', 'sss', 4, '8', 4, 1, 5, '200', '5000'),
(7, 'Q', '1', 12, '16', 1000, 10, 990, '1000', '1000'),
(9, 'aa', 'C', 17, '19', 1000, 100, 900, '1000', '1000'),
(10, '', '', 0, '', 0, 0, 0, '0', '0'),
(11, 'S002', 'D', 11, '16', 0, 0, 0, '0', '0'),
(14, 'A', 'a', 12, '19', 1, 0, 1, '2', '0'),
(15, 'Q2', '12', 17, '19', 0, 0, 0, '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(10) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`) VALUES
(5, 'Rokok'),
(8, 'ssss'),
(9, 'ssss'),
(10, 'ssss'),
(11, 'Minyak'),
(12, 'ddd'),
(14, '22'),
(16, 'bungga'),
(17, 'dewa'),
(18, 'Kecap'),
(19, 'rokok2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT,
  `pelanggan_nama` varchar(50) NOT NULL,
  `pelanggan_alamat` text NOT NULL,
  `pelanggan_telp` varchar(12) NOT NULL,
  PRIMARY KEY (`pelanggan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `pelanggan_nama`, `pelanggan_alamat`, `pelanggan_telp`) VALUES
(1, 'Umum', 'Lampung', '0'),
(2, 'd', 'd', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `pembelian_kode` varchar(20) NOT NULL,
  `nomor_nota` varchar(20) NOT NULL,
  `tanggal_nota` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `total_pembelian` decimal(10,2) NOT NULL,
  PRIMARY KEY (`pembelian_kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`pembelian_kode`, `nomor_nota`, `tanggal_nota`, `tanggal_terima`, `supplier_id`, `total_pembelian`) VALUES
('SD/Mar/2016/000001', 's', '0000-00-00', '0000-00-00', 2, '99999999.99'),
('SD/Mar/2016/000002', 'dsd', '0000-00-00', '0000-00-00', 2, '1.00'),
('SD/Mar/2016/000003', 'dsd', '0000-00-00', '0000-00-00', 2, '1000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_detail`
--

CREATE TABLE IF NOT EXISTS `pembelian_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pembelian_kode` varchar(20) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `qty_pembelian` int(11) NOT NULL,
  `harga_beli` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id`, `pembelian_kode`, `barang_id`, `satuan_id`, `qty_pembelian`, `harga_beli`, `sub_total`, `status`) VALUES
(1, 'SD/Mar/2016/000001', 1, 12, 2, '2500.00', '5000.00', '1'),
(13, 'SD/Mar/2016/000001', 3, 14, 1100, '3001000.00', '99999999.99', '1'),
(18, 'SD/Mar/2016/000001', 0, 0, 0, '0.00', '0.00', '1'),
(19, 'SD/Mar/2016/000002', 1, 17, 1, '1.00', '1.00', '1'),
(20, 'SD/Mar/2016/000003', 3, 7, 1, '1000.00', '1000.00', '1'),
(21, 'SD/Mar/2016/000004', 6, 7, 1, '1.00', '1.00', '0'),
(22, 'SD/Mar/2016/000004', 3, 17, 1, '1000.00', '1000.00', '0'),
(24, 'SD/Mar/2016/000004', 6, 17, 2, '200.00', '400.00', '0'),
(25, 'SD/Apr/2016/000004', 14, 7, 1, '2.00', '2.00', '0');

--
-- Trigger `pembelian_detail`
--
DROP TRIGGER IF EXISTS `d_stok_barang_beli`;
DELIMITER //
CREATE TRIGGER `d_stok_barang_beli` AFTER DELETE ON `pembelian_detail`
 FOR EACH ROW BEGIN
	UPDATE barang SET stock_akhir=stock_akhir-OLD.qty_pembelian
	WHERE barang_id=OLD.barang_id;

	UPDATE barang SET stock_awal=stock_awal-OLD.qty_pembelian
	WHERE barang_id=OLD.barang_id;

	UPDATE barang SET harga_dasar=OLD.harga_beli
	WHERE barang_id=OLD.barang_id;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `stok_barang_beli`;
DELIMITER //
CREATE TRIGGER `stok_barang_beli` AFTER INSERT ON `pembelian_detail`
 FOR EACH ROW BEGIN
	UPDATE barang SET stock_akhir=stock_akhir+NEW.qty_pembelian
	WHERE barang_id=NEW.barang_id;

	UPDATE barang SET stock_awal=stock_awal+NEW.qty_pembelian
	WHERE barang_id=NEW.barang_id;

	UPDATE barang SET harga_dasar=NEW.harga_beli
	WHERE barang_id=NEW.barang_id;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `u_stok_barang_beli`;
DELIMITER //
CREATE TRIGGER `u_stok_barang_beli` AFTER UPDATE ON `pembelian_detail`
 FOR EACH ROW BEGIN
	UPDATE barang SET stock_akhir=stock_akhir-OLD.qty_pembelian
	WHERE barang_id=OLD.barang_id;

	UPDATE barang SET stock_akhir=stock_akhir+NEW.qty_pembelian
	WHERE barang_id=NEW.barang_id;

	UPDATE barang SET stock_awal=stock_awal-OLD.qty_pembelian
	WHERE barang_id=OLD.barang_id;

	UPDATE barang SET stock_awal=stock_awal+NEW.qty_pembelian
	WHERE barang_id=NEW.barang_id;

	UPDATE barang SET harga_dasar=OLD.harga_beli
	WHERE barang_id=OLD.barang_id;

	UPDATE barang SET harga_dasar=NEW.harga_beli
	WHERE barang_id=NEW.barang_id;

	UPDATE barang SET satuan_id=OLD.satuan_id
	WHERE barang_id=OLD.barang_id;

	UPDATE barang SET satuan_id=NEW.satuan_id
	WHERE barang_id=NEW.barang_id;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
  `satuan_id` int(11) NOT NULL AUTO_INCREMENT,
  `satuan_kode` varchar(5) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  PRIMARY KEY (`satuan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`satuan_id`, `satuan_kode`, `keterangan`) VALUES
(1, 'Kg', 'Kilogram'),
(2, 'Ltr', 'Liter'),
(7, 'Btl', 'Botol'),
(8, 'Ls', 'Lusin'),
(9, 'Rt', 'Renteng'),
(10, 'Lp', 'Lempeng'),
(11, 'PCS', 'Pecs'),
(12, 'Pk', 'Pack'),
(13, 'TPLS', 'Toples'),
(14, 'BKS', 'Bungkus'),
(15, 'DUS', 'Dus'),
(16, 'KTG', 'Kantong'),
(17, 'BTG', 'Batang'),
(19, 'KRT', 'Karton'),
(21, 'kg2', 'kilogram');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_nama` varchar(45) NOT NULL,
  `supplier_alamat` text NOT NULL,
  `supplier_telp` varchar(12) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_nama`, `supplier_alamat`, `supplier_telp`) VALUES
(2, 'BW CV', 'Lampung', '323');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
