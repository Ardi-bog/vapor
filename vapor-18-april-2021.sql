-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2021 pada 19.29
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vapor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `background`
--

CREATE TABLE `background` (
  `ID_BACKGROUND` int(11) NOT NULL,
  `NAMA_WEB` varchar(15) NOT NULL,
  `NAMA_BACKGROUND` varchar(50) NOT NULL,
  `KODE_WARNA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `background`
--

INSERT INTO `background` (`ID_BACKGROUND`, `NAMA_WEB`, `NAMA_BACKGROUND`, `KODE_WARNA`) VALUES
(1, 'vaporhitz', 'primary-color', '#8a00d4'),
(2, 'vaporhitz', 'secondary-color', '#d527b7'),
(3, 'vaporhitz', 'button-color', '#f782c2'),
(4, 'nicotine', 'primary-color', '#00CFE8'),
(5, 'nicotine', 'secondary-color', '#E4EAFF'),
(6, 'nicotine', 'button-color', '#31B0D5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `ID_BANNER` int(11) NOT NULL,
  `NAMA_WEB` varchar(15) NOT NULL,
  `JUDUL_BANNER` varchar(100) NOT NULL,
  `DESKRIPSI` varchar(255) NOT NULL,
  `GAMBAR` varchar(250) NOT NULL,
  `TGL_POSTING` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`ID_BANNER`, `NAMA_WEB`, `JUDUL_BANNER`, `DESKRIPSI`, `GAMBAR`, `TGL_POSTING`) VALUES
(1, 'nicotine', 'Banner 1', 'ini deskripsi banner 1', 'banner-1.jpg', '2021-03-18'),
(2, 'nicotine', 'Banner 2', 'ini deskripsi banner 2', 'banner-2.jpg', '2021-03-16'),
(3, 'nicotine', 'Banner 3', 'ini deskripsi banner 3', 'banner-3.jpg', '2021-03-17'),
(7, 'nicotine', 'Banner 4', 'x', 'banner-7.jpg', '2021-03-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang`
--

CREATE TABLE `cabang` (
  `KODE_CABANG` int(11) NOT NULL,
  `NAMA_CABANG` varchar(100) NOT NULL,
  `TANGGAL_DAFTAR` date NOT NULL,
  `TELP_CABANG` varchar(15) NOT NULL,
  `KODE_WILAYAH` int(11) NOT NULL,
  `ALAMAT_CABANG` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cabang`
--

INSERT INTO `cabang` (`KODE_CABANG`, `NAMA_CABANG`, `TANGGAL_DAFTAR`, `TELP_CABANG`, `KODE_WILAYAH`, `ALAMAT_CABANG`) VALUES
(1, 'cabang 1', '2021-04-07', '0877', 256, 'jalan xy'),
(2, 'cabang 2', '2021-04-10', '098888', 330, 'jalan x');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kunjungan`
--

CREATE TABLE `data_kunjungan` (
  `ID_KUNJUNGAN` int(11) NOT NULL,
  `IP` varchar(20) NOT NULL,
  `TANGGAL` date NOT NULL,
  `HITS` int(11) NOT NULL,
  `ONLINE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pengiriman`
--

CREATE TABLE `detail_pengiriman` (
  `ID_DET_PENGIRIMAN` int(11) NOT NULL,
  `KODE_PENGIRIMAN` varchar(20) NOT NULL,
  `ID_PRODUK` int(11) NOT NULL,
  `JUMLAH_DIKIRIM` int(11) NOT NULL,
  `JUMLAH_DITERIMA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_pengiriman`
--

INSERT INTO `detail_pengiriman` (`ID_DET_PENGIRIMAN`, `KODE_PENGIRIMAN`, `ID_PRODUK`, `JUMLAH_DIKIRIM`, `JUMLAH_DITERIMA`) VALUES
(11, 'DELV202104160001', 3, 1, 1),
(12, 'DELV202104160001', 2, 1, 1),
(13, 'DELV202104160002', 3, 1, 0),
(14, 'DELV202104160002', 2, 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_permintaan`
--

CREATE TABLE `detail_permintaan` (
  `ID_DET_PERMINTAAN` int(11) NOT NULL,
  `ID_PERMINTAAN` varchar(15) NOT NULL,
  `ID_PRODUK` int(11) NOT NULL,
  `JUMLAH_REQ` int(11) NOT NULL,
  `APPROVED_JUMLAH_REQ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_permintaan`
--

INSERT INTO `detail_permintaan` (`ID_DET_PERMINTAAN`, `ID_PERMINTAAN`, `ID_PRODUK`, `JUMLAH_REQ`, `APPROVED_JUMLAH_REQ`) VALUES
(10, 'REQ202104140001', 3, 1, 1),
(11, 'REQ202104140001', 2, 1, 1),
(12, 'REQ202104150001', 3, 3, 0),
(13, 'REQ202104160001', 3, 1, 1),
(14, 'REQ202104160001', 2, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_return`
--

CREATE TABLE `detail_return` (
  `ID_RETURN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_produk`
--

CREATE TABLE `gambar_produk` (
  `ID_GAMBAR` int(11) NOT NULL,
  `ID_PRODUK` int(11) DEFAULT NULL,
  `GAMBAR` varchar(250) NOT NULL,
  `KET` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman_statis`
--

CREATE TABLE `halaman_statis` (
  `ID_HALAMAN` int(11) NOT NULL,
  `JUDUL_HALAMAN` varchar(100) NOT NULL,
  `ISI_HALAMAN` text NOT NULL,
  `TGL_POSTING` date NOT NULL,
  `GAMBAR` varchar(250) DEFAULT NULL,
  `USER` varchar(100) NOT NULL,
  `DIBACA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_pengiriman`
--

CREATE TABLE `harga_pengiriman` (
  `ID_HARGA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='harga jika barang atau pesanan dikirimkan ke konsumen atau b';

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas_web`
--

CREATE TABLE `identitas_web` (
  `ID_IDENTITAS` int(11) NOT NULL,
  `NAMA_WEBSITE` varchar(100) NOT NULL,
  `EMAIL_ADMIN` varchar(100) NOT NULL,
  `FACEBOOK` varchar(255) DEFAULT NULL,
  `INSTAGRAM` varchar(255) DEFAULT NULL,
  `TWITTER` varchar(255) DEFAULT NULL,
  `YOUTUBE` varchar(255) DEFAULT NULL,
  `NO_WA` varchar(15) NOT NULL,
  `DESKRIPSI` varchar(255) NOT NULL,
  `MAPS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `identitas_web`
--

INSERT INTO `identitas_web` (`ID_IDENTITAS`, `NAMA_WEBSITE`, `EMAIL_ADMIN`, `FACEBOOK`, `INSTAGRAM`, `TWITTER`, `YOUTUBE`, `NO_WA`, `DESKRIPSI`, `MAPS`) VALUES
(1, 'vaporhitz', 'web@gmail.com', 'https://web.facebook.com/', 'https://www.instagram.com/', '', NULL, '0877662', 'ini deskripsi', 'map'),
(2, 'nicotine', 'web@gmail.com', 'https://web.facebook.com/a', 'https://www.instagram.com/a', '', '', '08888669', 'ini deskripsi', 'map');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_menu`
--

CREATE TABLE `jenis_menu` (
  `ID_JENIS_MENU` int(11) NOT NULL,
  `JENIS_MENU` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_menu`
--

INSERT INTO `jenis_menu` (`ID_JENIS_MENU`, `JENIS_MENU`) VALUES
(2, 'Makanan'),
(3, 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `ID_KATEGORI` int(11) NOT NULL,
  `NAMA_KATEGORI` varchar(100) NOT NULL,
  `KET` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`ID_KATEGORI`, `NAMA_KATEGORI`, `KET`) VALUES
(1, 'Kategori 1', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `ID_KONFIRMASI` int(11) NOT NULL,
  `TOTAL_TRANSFER` varchar(20) NOT NULL,
  `NAMA_PENGIRIM` varchar(100) NOT NULL,
  `TANGGAL_TRANSFER` date NOT NULL,
  `BUKTI_TRANSFER` varchar(255) NOT NULL,
  `WAKTU_KONFIRMASI` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `ID_KURIR` int(11) NOT NULL,
  `NAMA_KURIR` varchar(100) NOT NULL,
  `TELEPON` varchar(15) NOT NULL,
  `ALAMAT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`ID_KURIR`, `NAMA_KURIR`, `TELEPON`, `ALAMAT`) VALUES
(2, 'kurir 1', '8766431', 'desa kecamatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logo`
--

CREATE TABLE `logo` (
  `ID_LOGO` int(11) NOT NULL,
  `NAMA_WEB` varchar(15) NOT NULL,
  `GAMBAR` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `logo`
--

INSERT INTO `logo` (`ID_LOGO`, `NAMA_WEB`, `GAMBAR`) VALUES
(1, 'vaporhitz', 'logo1.png'),
(2, 'nicotine', 'logo-2.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `ID_MENU` int(11) NOT NULL,
  `NAMA_MENU` varchar(50) NOT NULL,
  `JENIS_MENU` int(11) NOT NULL,
  `DESKRIPSI` varchar(255) NOT NULL,
  `HARGA` double NOT NULL,
  `DISKON` int(11) NOT NULL,
  `GAMBAR` varchar(255) DEFAULT NULL,
  `BARCODE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`ID_MENU`, `NAMA_MENU`, `JENIS_MENU`, `DESKRIPSI`, `HARGA`, `DISKON`, `GAMBAR`, `BARCODE`) VALUES
(1, 'Chicken Wing', 2, 'Crispy chicken wings served with special costess recipe', 15000, 0, 'chickenwings.jpg', 'menu-1.jpg'),
(15, 'coba2xxxx', 2, 'xxxxxxxxx', 15000, 10, 'menu-15.jpg', 'menu-15.jpg'),
(17, 'Apple sparkle', 3, 'minuman dengan apel', 9000, 10, 'menu-17.jpg', 'menu-17.jpg'),
(19, 'coba 3', 3, 'xxxxxxxxx', 177000, 0, 'menu-19.jpg', 'menu-19.jpg'),
(20, 'coba 5', 2, 'xxxxxxxxx', 17000, 0, 'menu-20.jpg', 'menu-20.jpg'),
(22, 'coba 7', 3, 'xxxxxxxxx', 2799, 0, NULL, 'menu-22.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merek_produk`
--

CREATE TABLE `merek_produk` (
  `ID_MEREK` int(11) NOT NULL,
  `NAMA_MEREK` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `merek_produk`
--

INSERT INTO `merek_produk` (`ID_MEREK`, `NAMA_MEREK`) VALUES
(1, 'merek a'),
(2, 'merek b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `KODE_PENGIRIMAN` varchar(20) NOT NULL,
  `TANGGAL_PENGIRIMAN` date NOT NULL,
  `LOKASI_PENGIRIMAN` varchar(100) NOT NULL,
  `PENERIMA` varchar(100) NOT NULL,
  `ID_KURIR` int(11) NOT NULL,
  `NOMOR_KENDARAAN` varchar(20) NOT NULL,
  `KETERANGAN` text NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`KODE_PENGIRIMAN`, `TANGGAL_PENGIRIMAN`, `LOKASI_PENGIRIMAN`, `PENERIMA`, `ID_KURIR`, `NOMOR_KENDARAAN`, `KETERANGAN`, `STATUS`) VALUES
('DELV202104160001', '2021-04-16', 'jalan xy, ', '1', 2, 'aug 201 ab', 'ini keterangan pengiriman', 1),
('DELV202104160002', '2021-04-16', 'jalan x, ', '2', 2, 'aug 201 ab', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan`
--

CREATE TABLE `permintaan` (
  `KODE_PERMINTAAN` varchar(15) NOT NULL,
  `TGL_PERMINTAAN` date NOT NULL,
  `KODE_CABANG` int(11) NOT NULL,
  `CATATAN` varchar(255) NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `permintaan`
--

INSERT INTO `permintaan` (`KODE_PERMINTAAN`, `TGL_PERMINTAAN`, `KODE_CABANG`, `CATATAN`, `STATUS`) VALUES
('REQ202104140001', '2021-04-14', 1, '', 2),
('REQ202104150001', '2021-04-15', 1, '', 0),
('REQ202104160001', '2021-04-16', 2, '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `ID_PRODUK` int(11) NOT NULL,
  `ID_MEREK` int(11) NOT NULL,
  `ID_KATEGORI` int(11) NOT NULL,
  `ID_VARIAN` int(11) NOT NULL,
  `NAMA_PRODUK` varchar(200) NOT NULL,
  `DISKON` int(11) NOT NULL,
  `HARGA_BELI` double NOT NULL,
  `HARGA_JUAL` double NOT NULL,
  `HARGA_GROSIR` double DEFAULT NULL,
  `BERAT_PRODUK` int(11) NOT NULL,
  `DATE_PUBLISED` date DEFAULT NULL,
  `DESKRIPSI` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`ID_PRODUK`, `ID_MEREK`, `ID_KATEGORI`, `ID_VARIAN`, `NAMA_PRODUK`, `DISKON`, `HARGA_BELI`, `HARGA_JUAL`, `HARGA_GROSIR`, `BERAT_PRODUK`, `DATE_PUBLISED`, `DESKRIPSI`) VALUES
(1, 1, 1, 1, 'Produk 1', 0, 15000, 15000, NULL, 100, '2021-04-08', 'produk deskripsi 1'),
(2, 2, 1, 1, 'Produk 2', 0, 17000, 17000, NULL, 200, '2021-04-08', 'produk deskripsi 2'),
(3, 1, 1, 1, 'Produk 3', 0, 10000, 10000, NULL, 50, '2021-04-08', 'produk deskripsi 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_toko`
--

CREATE TABLE `profil_toko` (
  `KODE_TOKO` varchar(5) NOT NULL,
  `ID_KOTA` int(11) DEFAULT NULL,
  `NAMA_TOKO` varchar(100) NOT NULL,
  `STATUS_TOKO` varchar(10) NOT NULL,
  `STATUSNYA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil_toko`
--

INSERT INTO `profil_toko` (`KODE_TOKO`, `ID_KOTA`, `NAMA_TOKO`, `STATUS_TOKO`, `STATUSNYA`) VALUES
('NCTNB', 256, 'Toko bar', 'nicotine', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `ID_PROMO` int(11) NOT NULL,
  `JUDUL_PROMO` varchar(100) NOT NULL,
  `DESKRIPSI` varchar(100) NOT NULL,
  `URL` varchar(100) DEFAULT NULL,
  `GAMBAR` varchar(250) NOT NULL,
  `TGL_POSTING` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`ID_PROMO`, `JUDUL_PROMO`, `DESKRIPSI`, `URL`, `GAMBAR`, `TGL_POSTING`) VALUES
(2, 'coba2', 'x', '#', 'buy-one-get-one-free-sticker-label-design_1017-16289.jpg', '2021-03-11'),
(10, 'coba235325', 'x', '#', '338buktiPenghargaan-107060200111008-1.jpg', '2021-03-17'),
(14, 'coba 4', 'xxxxxxxxx', '#', 'promo-14.png', '2021-03-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_admin`
--

CREATE TABLE `rb_admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `ID_KOTA` int(11) DEFAULT NULL,
  `NAMA_ADMIN` varchar(100) NOT NULL,
  `EMAIL` varchar(60) NOT NULL,
  `JENIS_KELAMIN` varchar(10) NOT NULL,
  `ALAMAT_LENGKAP` text NOT NULL,
  `KECAMATAN` varchar(100) NOT NULL,
  `NO_HP` varchar(15) NOT NULL,
  `TANGGAL_MASUK` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rb_admin`
--

INSERT INTO `rb_admin` (`ID_ADMIN`, `ID_KOTA`, `NAMA_ADMIN`, `EMAIL`, `JENIS_KELAMIN`, `ALAMAT_LENGKAP`, `KECAMATAN`, `NO_HP`, `TANGGAL_MASUK`) VALUES
(1, 999, 'Super-Admin', 'super@gmail.com', 'Perempuan', 'alamat jalan satu', 'kecamatan jalan', '098000', '2021-02-17'),
(6, 256, 'admin satu', 'admin@gmail.com', 'Laki-laki', 'jalan', 'campurt', '08886665', '2021-02-09'),
(11, 4, 'coba 31', 'coba31@poltekom.ac.id', 'Perempuan', 'desauuku', 'campurty', '890888', '2021-03-26'),
(12, 399, 'coba 5', 'dikri.coolman@facebook.com', 'Laki-laki', 'desak sak', 'campurt', '07879879', '2021-03-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_konsumen`
--

CREATE TABLE `rb_konsumen` (
  `ID_KONSUMEN` int(11) NOT NULL,
  `ID_KOTA` int(11) DEFAULT NULL,
  `NAMA_LENGKAP` varchar(100) NOT NULL,
  `EMAIL` varchar(60) NOT NULL,
  `JENIS_KELAMIN` varchar(10) NOT NULL,
  `TANGGAL_LAHIR` date NOT NULL,
  `TEMPAT_LAHIR` varchar(100) NOT NULL,
  `ALAMAT_LENGKAP` text NOT NULL,
  `KECAMATAN` varchar(100) NOT NULL,
  `NO_HP` varchar(15) NOT NULL,
  `TANGGAL_MASUK` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_kota`
--

CREATE TABLE `rb_kota` (
  `ID_KOTA` int(11) NOT NULL,
  `ID_PROVINSI` int(11) DEFAULT NULL,
  `NAMA_KOTA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rb_kota`
--

INSERT INTO `rb_kota` (`ID_KOTA`, `ID_PROVINSI`, `NAMA_KOTA`) VALUES
(1, 21, 'Aceh Barat'),
(2, 21, 'Aceh Barat Daya'),
(3, 21, 'Aceh Besar'),
(4, 21, 'Aceh Jaya'),
(5, 21, 'Aceh Selatan'),
(6, 21, 'Aceh Singkil'),
(7, 21, 'Aceh Tamiang'),
(8, 21, 'Aceh Tengah'),
(9, 21, 'Aceh Tenggara'),
(10, 21, 'Aceh Timur'),
(11, 21, 'Aceh Utara'),
(12, 32, 'Agam'),
(13, 23, 'Alor'),
(14, 19, 'Ambon'),
(15, 34, 'Asahan'),
(16, 24, 'Asmat'),
(17, 1, 'Badung'),
(18, 13, 'Balangan'),
(19, 15, 'Balikpapan'),
(20, 21, 'Banda Aceh'),
(21, 18, 'Bandar Lampung'),
(22, 9, 'Bandung'),
(23, 9, 'Bandung'),
(24, 9, 'Bandung Barat'),
(25, 29, 'Banggai'),
(26, 29, 'Banggai Kepulauan'),
(27, 2, 'Bangka'),
(28, 2, 'Bangka Barat'),
(29, 2, 'Bangka Selatan'),
(30, 2, 'Bangka Tengah'),
(31, 11, 'Bangkalan'),
(32, 1, 'Bangli'),
(33, 13, 'Banjar'),
(34, 9, 'Banjar'),
(35, 13, 'Banjarbaru'),
(36, 13, 'Banjarmasin'),
(37, 10, 'Banjarnegara'),
(38, 28, 'Bantaeng'),
(39, 5, 'Bantul'),
(40, 33, 'Banyuasin'),
(41, 10, 'Banyumas'),
(42, 11, 'Banyuwangi'),
(43, 13, 'Barito Kuala'),
(44, 14, 'Barito Selatan'),
(45, 14, 'Barito Timur'),
(46, 14, 'Barito Utara'),
(47, 28, 'Barru'),
(48, 17, 'Batam'),
(49, 10, 'Batang'),
(50, 8, 'Batang Hari'),
(51, 11, 'Batu'),
(52, 34, 'Batu Bara'),
(53, 30, 'Bau-Bau'),
(54, 9, 'Bekasi'),
(55, 9, 'Bekasi'),
(56, 2, 'Belitung'),
(57, 2, 'Belitung Timur'),
(58, 23, 'Belu'),
(59, 21, 'Bener Meriah'),
(60, 26, 'Bengkalis'),
(61, 12, 'Bengkayang'),
(62, 4, 'Bengkulu'),
(63, 4, 'Bengkulu Selatan'),
(64, 4, 'Bengkulu Tengah'),
(65, 4, 'Bengkulu Utara'),
(66, 15, 'Berau'),
(67, 24, 'Biak Numfor'),
(68, 22, 'Bima'),
(69, 22, 'Bima'),
(70, 34, 'Binjai'),
(71, 17, 'Bintan'),
(72, 21, 'Bireuen'),
(73, 31, 'Bitung'),
(74, 11, 'Blitar'),
(75, 11, 'Blitar'),
(76, 10, 'Blora'),
(77, 7, 'Boalemo'),
(78, 9, 'Bogor'),
(79, 9, 'Bogor'),
(80, 11, 'Bojonegoro'),
(81, 31, 'Bolaang Mongondow (Bolmong)'),
(82, 31, 'Bolaang Mongondow Selatan'),
(83, 31, 'Bolaang Mongondow Timur'),
(84, 31, 'Bolaang Mongondow Utara'),
(85, 30, 'Bombana'),
(86, 11, 'Bondowoso'),
(87, 28, 'Bone'),
(88, 7, 'Bone Bolango'),
(89, 15, 'Bontang'),
(90, 24, 'Boven Digoel'),
(91, 10, 'Boyolali'),
(92, 10, 'Brebes'),
(93, 32, 'Bukittinggi'),
(94, 1, 'Buleleng'),
(95, 28, 'Bulukumba'),
(96, 16, 'Bulungan (Bulongan)'),
(97, 8, 'Bungo'),
(98, 29, 'Buol'),
(99, 19, 'Buru'),
(100, 19, 'Buru Selatan'),
(101, 30, 'Buton'),
(102, 30, 'Buton Utara'),
(103, 9, 'Ciamis'),
(104, 9, 'Cianjur'),
(105, 10, 'Cilacap'),
(106, 3, 'Cilegon'),
(107, 9, 'Cimahi'),
(108, 9, 'Cirebon'),
(109, 9, 'Cirebon'),
(110, 34, 'Dairi'),
(111, 24, 'Deiyai (Deliyai)'),
(112, 34, 'Deli Serdang'),
(113, 10, 'Demak'),
(114, 1, 'Denpasar'),
(115, 9, 'Depok'),
(116, 32, 'Dharmasraya'),
(117, 24, 'Dogiyai'),
(118, 22, 'Dompu'),
(119, 29, 'Donggala'),
(120, 26, 'Dumai'),
(121, 33, 'Empat Lawang'),
(122, 23, 'Ende'),
(123, 28, 'Enrekang'),
(124, 25, 'Fakfak'),
(125, 23, 'Flores Timur'),
(126, 9, 'Garut'),
(127, 21, 'Gayo Lues'),
(128, 1, 'Gianyar'),
(129, 7, 'Gorontalo'),
(130, 7, 'Gorontalo'),
(131, 7, 'Gorontalo Utara'),
(132, 28, 'Gowa'),
(133, 11, 'Gresik'),
(134, 10, 'Grobogan'),
(135, 5, 'Gunung Kidul'),
(136, 14, 'Gunung Mas'),
(137, 34, 'Gunungsitoli'),
(138, 20, 'Halmahera Barat'),
(139, 20, 'Halmahera Selatan'),
(140, 20, 'Halmahera Tengah'),
(141, 20, 'Halmahera Timur'),
(142, 20, 'Halmahera Utara'),
(143, 13, 'Hulu Sungai Selatan'),
(144, 13, 'Hulu Sungai Tengah'),
(145, 13, 'Hulu Sungai Utara'),
(146, 34, 'Humbang Hasundutan'),
(147, 26, 'Indragiri Hilir'),
(148, 26, 'Indragiri Hulu'),
(149, 9, 'Indramayu'),
(150, 24, 'Intan Jaya'),
(151, 6, 'Jakarta Barat'),
(152, 6, 'Jakarta Pusat'),
(153, 6, 'Jakarta Selatan'),
(154, 6, 'Jakarta Timur'),
(155, 6, 'Jakarta Utara'),
(156, 8, 'Jambi'),
(157, 24, 'Jayapura'),
(158, 24, 'Jayapura'),
(159, 24, 'Jayawijaya'),
(160, 11, 'Jember'),
(161, 1, 'Jembrana'),
(162, 28, 'Jeneponto'),
(163, 10, 'Jepara'),
(164, 11, 'Jombang'),
(165, 25, 'Kaimana'),
(166, 26, 'Kampar'),
(167, 14, 'Kapuas'),
(168, 12, 'Kapuas Hulu'),
(169, 10, 'Karanganyar'),
(170, 1, 'Karangasem'),
(171, 9, 'Karawang'),
(172, 17, 'Karimun'),
(173, 34, 'Karo'),
(174, 14, 'Katingan'),
(175, 4, 'Kaur'),
(176, 12, 'Kayong Utara'),
(177, 10, 'Kebumen'),
(178, 11, 'Kediri'),
(179, 11, 'Kediri'),
(180, 24, 'Keerom'),
(181, 10, 'Kendal'),
(182, 30, 'Kendari'),
(183, 4, 'Kepahiang'),
(184, 17, 'Kepulauan Anambas'),
(185, 19, 'Kepulauan Aru'),
(186, 32, 'Kepulauan Mentawai'),
(187, 26, 'Kepulauan Meranti'),
(188, 31, 'Kepulauan Sangihe'),
(189, 6, 'Kepulauan Seribu'),
(190, 31, 'Kepulauan Siau Tagulandang Biaro (Sitaro)'),
(191, 20, 'Kepulauan Sula'),
(192, 31, 'Kepulauan Talaud'),
(193, 24, 'Kepulauan Yapen (Yapen Waropen)'),
(194, 8, 'Kerinci'),
(195, 12, 'Ketapang'),
(196, 10, 'Klaten'),
(197, 1, 'Klungkung'),
(198, 30, 'Kolaka'),
(199, 30, 'Kolaka Utara'),
(200, 30, 'Konawe'),
(201, 30, 'Konawe Selatan'),
(202, 30, 'Konawe Utara'),
(203, 13, 'Kotabaru'),
(204, 31, 'Kotamobagu'),
(205, 14, 'Kotawaringin Barat'),
(206, 14, 'Kotawaringin Timur'),
(207, 26, 'Kuantan Singingi'),
(208, 12, 'Kubu Raya'),
(209, 10, 'Kudus'),
(210, 5, 'Kulon Progo'),
(211, 9, 'Kuningan'),
(212, 23, 'Kupang'),
(213, 23, 'Kupang'),
(214, 15, 'Kutai Barat'),
(215, 15, 'Kutai Kartanegara'),
(216, 15, 'Kutai Timur'),
(217, 34, 'Labuhan Batu'),
(218, 34, 'Labuhan Batu Selatan'),
(219, 34, 'Labuhan Batu Utara'),
(220, 33, 'Lahat'),
(221, 14, 'Lamandau'),
(222, 11, 'Lamongan'),
(223, 18, 'Lampung Barat'),
(224, 18, 'Lampung Selatan'),
(225, 18, 'Lampung Tengah'),
(226, 18, 'Lampung Timur'),
(227, 18, 'Lampung Utara'),
(228, 12, 'Landak'),
(229, 34, 'Langkat'),
(230, 21, 'Langsa'),
(231, 24, 'Lanny Jaya'),
(232, 3, 'Lebak'),
(233, 4, 'Lebong'),
(234, 23, 'Lembata'),
(235, 21, 'Lhokseumawe'),
(236, 32, 'Lima Puluh Koto/Kota'),
(237, 17, 'Lingga'),
(238, 22, 'Lombok Barat'),
(239, 22, 'Lombok Tengah'),
(240, 22, 'Lombok Timur'),
(241, 22, 'Lombok Utara'),
(242, 33, 'Lubuk Linggau'),
(243, 11, 'Lumajang'),
(244, 28, 'Luwu'),
(245, 28, 'Luwu Timur'),
(246, 28, 'Luwu Utara'),
(247, 11, 'Madiun'),
(248, 11, 'Madiun'),
(249, 10, 'Magelang'),
(250, 10, 'Magelang'),
(251, 11, 'Magetan'),
(252, 9, 'Majalengka'),
(253, 27, 'Majene'),
(254, 28, 'Makassar'),
(255, 11, 'Kab Malang'),
(256, 11, 'Kota Malang'),
(257, 16, 'Malinau'),
(258, 19, 'Maluku Barat Daya'),
(259, 19, 'Maluku Tengah'),
(260, 19, 'Maluku Tenggara'),
(261, 19, 'Maluku Tenggara Barat'),
(262, 27, 'Mamasa'),
(263, 24, 'Mamberamo Raya'),
(264, 24, 'Mamberamo Tengah'),
(265, 27, 'Mamuju'),
(266, 27, 'Mamuju Utara'),
(267, 31, 'Manado'),
(268, 34, 'Mandailing Natal'),
(269, 23, 'Manggarai'),
(270, 23, 'Manggarai Barat'),
(271, 23, 'Manggarai Timur'),
(272, 25, 'Manokwari'),
(273, 25, 'Manokwari Selatan'),
(274, 24, 'Mappi'),
(275, 28, 'Maros'),
(276, 22, 'Mataram'),
(277, 25, 'Maybrat'),
(278, 34, 'Medan'),
(279, 12, 'Melawi'),
(280, 8, 'Merangin'),
(281, 24, 'Merauke'),
(282, 18, 'Mesuji'),
(283, 18, 'Metro'),
(284, 24, 'Mimika'),
(285, 31, 'Minahasa'),
(286, 31, 'Minahasa Selatan'),
(287, 31, 'Minahasa Tenggara'),
(288, 31, 'Minahasa Utara'),
(289, 11, 'Mojokerto'),
(290, 11, 'Mojokerto'),
(291, 29, 'Morowali'),
(292, 33, 'Muara Enim'),
(293, 8, 'Muaro Jambi'),
(294, 4, 'Muko Muko'),
(295, 30, 'Muna'),
(296, 14, 'Murung Raya'),
(297, 33, 'Musi Banyuasin'),
(298, 33, 'Musi Rawas'),
(299, 24, 'Nabire'),
(300, 21, 'Nagan Raya'),
(301, 23, 'Nagekeo'),
(302, 17, 'Natuna'),
(303, 24, 'Nduga'),
(304, 23, 'Ngada'),
(305, 11, 'Nganjuk'),
(306, 11, 'Ngawi'),
(307, 34, 'Nias'),
(308, 34, 'Nias Barat'),
(309, 34, 'Nias Selatan'),
(310, 34, 'Nias Utara'),
(311, 16, 'Nunukan'),
(312, 33, 'Ogan Ilir'),
(313, 33, 'Ogan Komering Ilir'),
(314, 33, 'Ogan Komering Ulu'),
(315, 33, 'Ogan Komering Ulu Selatan'),
(316, 33, 'Ogan Komering Ulu Timur'),
(317, 11, 'Pacitan'),
(318, 32, 'Padang'),
(319, 34, 'Padang Lawas'),
(320, 34, 'Padang Lawas Utara'),
(321, 32, 'Padang Panjang'),
(322, 32, 'Padang Pariaman'),
(323, 34, 'Padang Sidempuan'),
(324, 33, 'Pagar Alam'),
(325, 34, 'Pakpak Bharat'),
(326, 14, 'Palangka Raya'),
(327, 33, 'Palembang'),
(328, 28, 'Palopo'),
(329, 29, 'Palu'),
(330, 11, 'Pamekasan'),
(331, 3, 'Pandeglang'),
(332, 9, 'Pangandaran'),
(333, 28, 'Pangkajene Kepulauan'),
(334, 2, 'Pangkal Pinang'),
(335, 24, 'Paniai'),
(336, 28, 'Parepare'),
(337, 32, 'Pariaman'),
(338, 29, 'Parigi Moutong'),
(339, 32, 'Pasaman'),
(340, 32, 'Pasaman Barat'),
(341, 15, 'Paser'),
(342, 11, 'Pasuruan'),
(343, 11, 'Pasuruan'),
(344, 10, 'Pati'),
(345, 32, 'Payakumbuh'),
(346, 25, 'Pegunungan Arfak'),
(347, 24, 'Pegunungan Bintang'),
(348, 10, 'Pekalongan'),
(349, 10, 'Pekalongan'),
(350, 26, 'Pekanbaru'),
(351, 26, 'Pelalawan'),
(352, 10, 'Pemalang'),
(353, 34, 'Pematang Siantar'),
(354, 15, 'Penajam Paser Utara'),
(355, 18, 'Pesawaran'),
(356, 18, 'Pesisir Barat'),
(357, 32, 'Pesisir Selatan'),
(358, 21, 'Pidie'),
(359, 21, 'Pidie Jaya'),
(360, 28, 'Pinrang'),
(361, 7, 'Pohuwato'),
(362, 27, 'Polewali Mandar'),
(363, 11, 'Ponorogo'),
(364, 12, 'Pontianak'),
(365, 12, 'Pontianak'),
(366, 29, 'Poso'),
(367, 33, 'Prabumulih'),
(368, 18, 'Pringsewu'),
(369, 11, 'Probolinggo'),
(370, 11, 'Probolinggo'),
(371, 14, 'Pulang Pisau'),
(372, 20, 'Pulau Morotai'),
(373, 24, 'Puncak'),
(374, 24, 'Puncak Jaya'),
(375, 10, 'Purbalingga'),
(376, 9, 'Purwakarta'),
(377, 10, 'Purworejo'),
(378, 25, 'Raja Ampat'),
(379, 4, 'Rejang Lebong'),
(380, 10, 'Rembang'),
(381, 26, 'Rokan Hilir'),
(382, 26, 'Rokan Hulu'),
(383, 23, 'Rote Ndao'),
(384, 21, 'Sabang'),
(385, 23, 'Sabu Raijua'),
(386, 10, 'Salatiga'),
(387, 15, 'Samarinda'),
(388, 12, 'Sambas'),
(389, 34, 'Samosir'),
(390, 11, 'Sampang'),
(391, 12, 'Sanggau'),
(392, 24, 'Sarmi'),
(393, 8, 'Sarolangun'),
(394, 32, 'Sawah Lunto'),
(395, 12, 'Sekadau'),
(396, 28, 'Selayar (Kepulauan Selayar)'),
(397, 4, 'Seluma'),
(398, 10, 'Semarang'),
(399, 10, 'Semarang'),
(400, 19, 'Seram Bagian Barat'),
(401, 19, 'Seram Bagian Timur'),
(402, 3, 'Serang'),
(403, 3, 'Serang'),
(404, 34, 'Serdang Bedagai'),
(405, 14, 'Seruyan'),
(406, 26, 'Siak'),
(407, 34, 'Sibolga'),
(408, 28, 'Sidenreng Rappang/Rapang'),
(409, 11, 'Sidoarjo'),
(410, 29, 'Sigi'),
(411, 32, 'Sijunjung (Sawah Lunto Sijunjung)'),
(412, 23, 'Sikka'),
(413, 34, 'Simalungun'),
(414, 21, 'Simeulue'),
(415, 12, 'Singkawang'),
(416, 28, 'Sinjai'),
(417, 12, 'Sintang'),
(418, 11, 'Situbondo'),
(419, 5, 'Sleman'),
(420, 32, 'Solok'),
(421, 32, 'Solok'),
(422, 32, 'Solok Selatan'),
(423, 28, 'Soppeng'),
(424, 25, 'Sorong'),
(425, 25, 'Sorong'),
(426, 25, 'Sorong Selatan'),
(427, 10, 'Sragen'),
(428, 9, 'Subang'),
(429, 21, 'Subulussalam'),
(430, 9, 'Sukabumi'),
(431, 9, 'Sukabumi'),
(432, 14, 'Sukamara'),
(433, 10, 'Sukoharjo'),
(434, 23, 'Sumba Barat'),
(435, 23, 'Sumba Barat Daya'),
(436, 23, 'Sumba Tengah'),
(437, 23, 'Sumba Timur'),
(438, 22, 'Sumbawa'),
(439, 22, 'Sumbawa Barat'),
(440, 9, 'Sumedang'),
(441, 11, 'Sumenep'),
(442, 8, 'Sungaipenuh'),
(443, 24, 'Supiori'),
(444, 11, 'Surabaya'),
(445, 10, 'Surakarta (Solo)'),
(446, 13, 'Tabalong'),
(447, 1, 'Tabanan'),
(448, 28, 'Takalar'),
(449, 25, 'Tambrauw'),
(450, 16, 'Tana Tidung'),
(451, 28, 'Tana Toraja'),
(452, 13, 'Tanah Bumbu'),
(453, 32, 'Tanah Datar'),
(454, 13, 'Tanah Laut'),
(455, 3, 'Tangerang'),
(456, 3, 'Tangerang'),
(457, 3, 'Tangerang Selatan'),
(458, 18, 'Tanggamus'),
(459, 34, 'Tanjung Balai'),
(460, 8, 'Tanjung Jabung Barat'),
(461, 8, 'Tanjung Jabung Timur'),
(462, 17, 'Tanjung Pinang'),
(463, 34, 'Tapanuli Selatan'),
(464, 34, 'Tapanuli Tengah'),
(465, 34, 'Tapanuli Utara'),
(466, 13, 'Tapin'),
(467, 16, 'Tarakan'),
(468, 9, 'Tasikmalaya'),
(469, 9, 'Tasikmalaya'),
(470, 34, 'Tebing Tinggi'),
(471, 8, 'Tebo'),
(472, 10, 'Tegal'),
(473, 10, 'Tegal'),
(474, 25, 'Teluk Bintuni'),
(475, 25, 'Teluk Wondama'),
(476, 10, 'Temanggung'),
(477, 20, 'Ternate'),
(478, 20, 'Tidore Kepulauan'),
(479, 23, 'Timor Tengah Selatan'),
(480, 23, 'Timor Tengah Utara'),
(481, 34, 'Toba Samosir'),
(482, 29, 'Tojo Una-Una'),
(483, 29, 'Toli-Toli'),
(484, 24, 'Tolikara'),
(485, 31, 'Tomohon'),
(486, 28, 'Toraja Utara'),
(487, 11, 'Trenggalek'),
(488, 19, 'Tual'),
(489, 11, 'Tuban'),
(490, 18, 'Tulang Bawang'),
(491, 18, 'Tulang Bawang Barat'),
(492, 11, 'Tulungagung'),
(493, 28, 'Wajo'),
(494, 30, 'Wakatobi'),
(495, 24, 'Waropen'),
(496, 18, 'Way Kanan'),
(497, 10, 'Wonogiri'),
(498, 10, 'Wonosobo'),
(499, 24, 'Yahukimo'),
(500, 24, 'Yalimo'),
(501, 5, 'Yogyakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_pegawai`
--

CREATE TABLE `rb_pegawai` (
  `ID_PEGAWAI` int(11) NOT NULL,
  `ID_KOTA` int(11) DEFAULT NULL,
  `NAMA_LENGKAP` varchar(100) NOT NULL,
  `EMAIL` varchar(60) NOT NULL,
  `JENIS_KELAMIN` varchar(10) NOT NULL,
  `ALAMAT_LENGKAP` text NOT NULL,
  `KECAMATAN` varchar(100) NOT NULL,
  `NO_HP` varchar(15) NOT NULL,
  `TANGGAL_MASUK` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rb_pegawai`
--

INSERT INTO `rb_pegawai` (`ID_PEGAWAI`, `ID_KOTA`, `NAMA_LENGKAP`, `EMAIL`, `JENIS_KELAMIN`, `ALAMAT_LENGKAP`, `KECAMATAN`, `NO_HP`, `TANGGAL_MASUK`) VALUES
(7, 256, 'pegawai1', 'pegawai1@gmail.com', 'Laki-laki', 'jalan', 'campurt', '08886665', '2021-03-08'),
(14, 1, 'pegawai 2', 'pegawai2@poltekom.ac.id', 'Perempuan', 'desaku cccc', 'bcvbvcb', '8768768678', '2021-03-17'),
(17, 215, 'coba2', 'coba2@gmail.com', 'Laki-laki', 'vbcvbcvbcvb', 'cvbcvbcvb', '0897484', '2021-03-20'),
(19, 256, 'pegawai 5', 'pegawai5@gmail.com', 'Perempuan', 'desa', 'kecamatan jalan', '087755', '2021-03-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_pembelian`
--

CREATE TABLE `rb_pembelian` (
  `ID_PEMBELIAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_pembelian_detail`
--

CREATE TABLE `rb_pembelian_detail` (
  `ID_PEMBELIAN_DETAIL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_penjualan`
--

CREATE TABLE `rb_penjualan` (
  `NO_FAKTUR_PENJUALAN` varchar(20) NOT NULL,
  `TGL_PENJUALAN` date NOT NULL,
  `ID_USER_KASIR` int(11) NOT NULL,
  `NAMA_PELANGGAN` varchar(50) DEFAULT NULL,
  `NOMOR_MEJA` int(11) DEFAULT NULL,
  `TOTAL_HARGA` varchar(100) NOT NULL,
  `SISA` varchar(100) DEFAULT NULL,
  `CATATAN` text DEFAULT NULL,
  `KET` varchar(100) DEFAULT NULL,
  `STATUS` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rb_penjualan`
--

INSERT INTO `rb_penjualan` (`NO_FAKTUR_PENJUALAN`, `TGL_PENJUALAN`, `ID_USER_KASIR`, `NAMA_PELANGGAN`, `NOMOR_MEJA`, `TOTAL_HARGA`, `SISA`, `CATATAN`, `KET`, `STATUS`) VALUES
('NCTNB21032300006', '2021-03-23', 1, 'Dikri', NULL, '', NULL, NULL, 'offline', 'belum'),
('NCTNB21032900006', '2021-03-29', 1, NULL, NULL, '', NULL, NULL, 'offline', 'belum'),
('NCTNB210403268139', '2021-04-03', 1, 'cinta', 0, '54000', '0', '', 'offline', 'selesai'),
('NCTNB210403646982', '2021-04-03', 1, 'cici', 12, '27000', '0', '', 'offline', 'selesai'),
('NCTNB210403758943', '2021-04-03', 1, 'hapx', 0, '42000', '0', '', 'offline', 'selesai'),
('NCTNB210403768202', '2021-04-03', 1, 'budi', 0, '15000', '0', '', 'offline', 'selesai'),
('NCTNB210403855052', '2021-04-03', 1, 'eko', 0, '193200', '0', '', 'offline', 'selesai'),
('NCTNB210403893261', '2021-04-03', 1, 'fitri', 0, '45000', '0', '', 'offline', 'selesai'),
('NCTNB21040893262', '2021-04-08', 1, NULL, NULL, '', NULL, NULL, 'offline', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_penjualan_detail`
--

CREATE TABLE `rb_penjualan_detail` (
  `ID_PENJUALAN_DETAIL` int(11) NOT NULL,
  `NO_FAKTUR_PENJUALAN` varchar(20) NOT NULL,
  `ID_PRODUK` int(11) NOT NULL,
  `NAMA_PRODUK` varchar(200) NOT NULL,
  `UKURAN` varchar(100) NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  `HARGA` int(11) NOT NULL,
  `DISKON` int(11) NOT NULL,
  `SUB_TOTAL_HARGA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rb_penjualan_detail`
--

INSERT INTO `rb_penjualan_detail` (`ID_PENJUALAN_DETAIL`, `NO_FAKTUR_PENJUALAN`, `ID_PRODUK`, `NAMA_PRODUK`, `UKURAN`, `JUMLAH`, `HARGA`, `DISKON`, `SUB_TOTAL_HARGA`) VALUES
(3, 'NCTNB210403758943', 15, 'coba2xxxx', '', 2, 13500, 10, 27000),
(5, 'NCTNB210403758943', 1, 'Chicken Wing', '', 1, 15000, 0, 15000),
(6, 'NCTNB210403646982', 15, 'coba2xxxx', '', 2, 13500, 10, 27000),
(7, 'NCTNB210403893261', 1, 'Chicken Wing', '', 3, 15000, 0, 45000),
(8, 'NCTNB210403768202', 1, 'Chicken Wing', '', 1, 15000, 0, 15000),
(9, 'NCTNB210403268139', 15, 'coba2xxxx', '', 4, 13500, 10, 54000),
(11, 'NCTNB210403855052', 17, 'Apple sparkle', '', 2, 8100, 10, 16200),
(12, 'NCTNB210403855052', 19, 'coba 3', '', 1, 177000, 0, 177000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_provinsi`
--

CREATE TABLE `rb_provinsi` (
  `ID_PROVINSI` int(11) NOT NULL,
  `NAMA_PROVINSI` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rb_provinsi`
--

INSERT INTO `rb_provinsi` (`ID_PROVINSI`, `NAMA_PROVINSI`) VALUES
(1, 'Bali'),
(2, 'Bangka Belitung'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nanggroe Aceh Darussalam (NAD)'),
(22, 'Nusa Tenggara Barat (NTB)'),
(23, 'Nusa Tenggara Timur (NTT)'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rb_rekening`
--

CREATE TABLE `rb_rekening` (
  `ID_REKENING` int(11) NOT NULL,
  `NAMA_BANK` varchar(50) NOT NULL,
  `NO_REKENING` varchar(50) NOT NULL,
  `PEMILIK_REKENING` varchar(150) NOT NULL,
  `USERNAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `ID_SLIDER` int(11) NOT NULL,
  `JUDUL_SLIDER` varchar(100) NOT NULL,
  `URL` varchar(100) DEFAULT NULL,
  `GAMBAR` varchar(250) NOT NULL,
  `TGL_POSTING` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `ID_STOK` int(11) NOT NULL,
  `ID_CABANG` int(11) NOT NULL COMMENT '0 = pusat',
  `ID_PRODUK` int(11) NOT NULL,
  `STOK_MASUK` int(11) NOT NULL,
  `STOK_KELUAR` int(11) NOT NULL,
  `JUMLAH_STOK` int(11) NOT NULL,
  `DATE_TIME_UPDATED` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stok`
--

INSERT INTO `stok` (`ID_STOK`, `ID_CABANG`, `ID_PRODUK`, `STOK_MASUK`, `STOK_KELUAR`, `JUMLAH_STOK`, `DATE_TIME_UPDATED`) VALUES
(1, 0, 1, 10, 10, 0, '2021-04-08 08:00:00'),
(2, 0, 2, 15, 3, 12, '2021-04-08 05:45:28'),
(4, 0, 3, 10, 7, 3, '2021-04-08 05:34:31'),
(5, 2, 1, 10, 2, 8, '2021-04-08 11:25:34'),
(6, 1, 3, 1, 0, 1, '2021-04-16 11:07:03'),
(7, 1, 2, 1, 0, 1, '2021-04-16 11:07:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tracking_pengiriman`
--

CREATE TABLE `tracking_pengiriman` (
  `ID_TRACKING` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `ID_USERS` int(11) NOT NULL,
  `ID_USERNYA` int(11) NOT NULL,
  `ID_KOTA` int(11) DEFAULT NULL,
  `NAMA_USER` varchar(100) NOT NULL,
  `LEVEL_USERS` varchar(30) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `FOTO` varchar(255) DEFAULT NULL,
  `STATUS_AKUN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`ID_USERS`, `ID_USERNYA`, `ID_KOTA`, `NAMA_USER`, `LEVEL_USERS`, `USERNAME`, `PASSWORD`, `FOTO`, `STATUS_AKUN`) VALUES
(1, 1, 999, 'Super-Admin', 'super-admin', 'superadmin', 'ff17dcc695256811bfe47a149c981d6b4c81e8956e9508d5cd917f9f82247cf72dc801661d369efa5f29add12d9f28fb49e3f07fb58f92b7dcfce39e0f843c0e', 'user12.png', 1),
(5, 6, 256, 'admin satu', 'admin', 'admin01', 'a0f4d5799abbaff16107c22c7344c69f0590658b0373ccd76f8e311d10bd6a4b66f1758a4b60794fee410ea5190cfcb799d230cbd1d3ebbe3285bce0bf662e9d', 'user122.png', 1),
(7, 7, 256, 'pegawai1', 'pegawai', 'pegawai1', '9970f16668b0ce09b694293b5164ae2b211fb9a23e9026bb4d0d1aef370f192120dd5f5a8e78c06d57fa036de0975c09b528ea7dc49262aee10c3247e62964fa', 'img1.png', 1),
(11, 14, 1, 'pegawai 2', 'pegawai', 'cxz', '97ea9ed79871155b0600d1eff06769a9d3a533aebafb85644307a71b119a6ed7c07934950196284691a6a08b1cf4914b737f68f968c7a202d6c358896e10ee93', 'foto-cxz.jpg', 1),
(14, 17, 215, 'coba2', 'kasir', 'coba2', '662dead27c01f7e1f4afe7c8fa1ac47c4ca79199a1ab758ee9b07575b4eb47a5487c80a217bcad2906b93e696eba3e36253c09807c515bd4a9a5f1b3dfe8151a', 'user121.png', 1),
(18, 11, 4, 'coba 31', 'admin-wilayah', 'coba3', 'dca7e6acc6f6db3c6213f91a1fbf2276915e0decc5ca9660d73365222228c7ce981ae0c6f4a5126fb256b7288b26fb2a9e88a698ad50b835236d938e34eefd8b', 'foto-coba3.jpg', 1),
(19, 12, 399, 'coba 5', 'admin-wilayah', 'coba5', '585b97f4fe91fe1f4d26f8cf9bd967de0adae7e1af3d4761bc0f30f4e8326fc833497f1a751dbd8ddbb874660f21af522ee7b054677da70aeb213e83e0ddf7fc', 'foto-coba5.jpg', 1),
(20, 19, 256, 'pegawai 5', '', 'pegawai5', 'adab11e2d17d7c454467e11d8dae77adc09f18ad13c19c472222f83e76c1a90ca71a5ff351401272f1c336ae19adcda3685ab2505c8100c52e91c659101f6ce8', 'foto-pegawai5.jpg', 1),
(21, 2, 256, 'kurir 1', 'kurir', 'kurir1', 'a6a7d20e0129858996759506e08db4daaffe805f6da053d931cf05039cca009af5cde0cd86b8dbd23cc837b9d067172923fa2722d38d4094e55125e7e3153575', 'foto-kurir1.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `varian_produk`
--

CREATE TABLE `varian_produk` (
  `ID_VARIAN` int(11) NOT NULL,
  `NAMA_VARIAN` varchar(100) NOT NULL,
  `KET` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `varian_produk`
--

INSERT INTO `varian_produk` (`ID_VARIAN`, `NAMA_VARIAN`, `KET`) VALUES
(1, 'varian 1', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `venom`
--

CREATE TABLE `venom` (
  `ID_VENOM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `background`
--
ALTER TABLE `background`
  ADD PRIMARY KEY (`ID_BACKGROUND`);

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`ID_BANNER`),
  ADD KEY `nama_web` (`NAMA_WEB`);

--
-- Indeks untuk tabel `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`KODE_CABANG`);

--
-- Indeks untuk tabel `data_kunjungan`
--
ALTER TABLE `data_kunjungan`
  ADD PRIMARY KEY (`ID_KUNJUNGAN`);

--
-- Indeks untuk tabel `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  ADD PRIMARY KEY (`ID_DET_PENGIRIMAN`);

--
-- Indeks untuk tabel `detail_permintaan`
--
ALTER TABLE `detail_permintaan`
  ADD PRIMARY KEY (`ID_DET_PERMINTAAN`);

--
-- Indeks untuk tabel `detail_return`
--
ALTER TABLE `detail_return`
  ADD PRIMARY KEY (`ID_RETURN`);

--
-- Indeks untuk tabel `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD PRIMARY KEY (`ID_GAMBAR`),
  ADD KEY `FK_RELATIONSHIP_7` (`ID_PRODUK`);

--
-- Indeks untuk tabel `halaman_statis`
--
ALTER TABLE `halaman_statis`
  ADD PRIMARY KEY (`ID_HALAMAN`);

--
-- Indeks untuk tabel `harga_pengiriman`
--
ALTER TABLE `harga_pengiriman`
  ADD PRIMARY KEY (`ID_HARGA`);

--
-- Indeks untuk tabel `identitas_web`
--
ALTER TABLE `identitas_web`
  ADD PRIMARY KEY (`ID_IDENTITAS`);

--
-- Indeks untuk tabel `jenis_menu`
--
ALTER TABLE `jenis_menu`
  ADD PRIMARY KEY (`ID_JENIS_MENU`);

--
-- Indeks untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indeks untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`ID_KONFIRMASI`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`ID_KURIR`);

--
-- Indeks untuk tabel `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`ID_LOGO`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID_MENU`);

--
-- Indeks untuk tabel `merek_produk`
--
ALTER TABLE `merek_produk`
  ADD PRIMARY KEY (`ID_MEREK`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`KODE_PENGIRIMAN`);

--
-- Indeks untuk tabel `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`KODE_PERMINTAAN`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ID_PRODUK`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_MEREK`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_VARIAN`),
  ADD KEY `FK_RELATIONSHIP_6` (`ID_KATEGORI`);

--
-- Indeks untuk tabel `profil_toko`
--
ALTER TABLE `profil_toko`
  ADD PRIMARY KEY (`KODE_TOKO`),
  ADD KEY `FK_RELATIONSHIP_10` (`ID_KOTA`);

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`ID_PROMO`);

--
-- Indeks untuk tabel `rb_admin`
--
ALTER TABLE `rb_admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indeks untuk tabel `rb_konsumen`
--
ALTER TABLE `rb_konsumen`
  ADD PRIMARY KEY (`ID_KONSUMEN`),
  ADD KEY `FK_RELATIONSHIP_12` (`ID_KOTA`);

--
-- Indeks untuk tabel `rb_kota`
--
ALTER TABLE `rb_kota`
  ADD PRIMARY KEY (`ID_KOTA`),
  ADD KEY `FK_RELATIONSHIP_8` (`ID_PROVINSI`);

--
-- Indeks untuk tabel `rb_pegawai`
--
ALTER TABLE `rb_pegawai`
  ADD PRIMARY KEY (`ID_PEGAWAI`),
  ADD KEY `FK_RELATIONSHIP_9` (`ID_KOTA`);

--
-- Indeks untuk tabel `rb_pembelian`
--
ALTER TABLE `rb_pembelian`
  ADD PRIMARY KEY (`ID_PEMBELIAN`);

--
-- Indeks untuk tabel `rb_pembelian_detail`
--
ALTER TABLE `rb_pembelian_detail`
  ADD PRIMARY KEY (`ID_PEMBELIAN_DETAIL`);

--
-- Indeks untuk tabel `rb_penjualan`
--
ALTER TABLE `rb_penjualan`
  ADD PRIMARY KEY (`NO_FAKTUR_PENJUALAN`);

--
-- Indeks untuk tabel `rb_penjualan_detail`
--
ALTER TABLE `rb_penjualan_detail`
  ADD PRIMARY KEY (`ID_PENJUALAN_DETAIL`);

--
-- Indeks untuk tabel `rb_provinsi`
--
ALTER TABLE `rb_provinsi`
  ADD PRIMARY KEY (`ID_PROVINSI`);

--
-- Indeks untuk tabel `rb_rekening`
--
ALTER TABLE `rb_rekening`
  ADD PRIMARY KEY (`ID_REKENING`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`ID_SLIDER`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`ID_STOK`),
  ADD KEY `fk_produk` (`ID_PRODUK`);

--
-- Indeks untuk tabel `tracking_pengiriman`
--
ALTER TABLE `tracking_pengiriman`
  ADD PRIMARY KEY (`ID_TRACKING`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_USERS`);

--
-- Indeks untuk tabel `varian_produk`
--
ALTER TABLE `varian_produk`
  ADD PRIMARY KEY (`ID_VARIAN`);

--
-- Indeks untuk tabel `venom`
--
ALTER TABLE `venom`
  ADD PRIMARY KEY (`ID_VENOM`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `background`
--
ALTER TABLE `background`
  MODIFY `ID_BACKGROUND` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `ID_BANNER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `cabang`
--
ALTER TABLE `cabang`
  MODIFY `KODE_CABANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_kunjungan`
--
ALTER TABLE `data_kunjungan`
  MODIFY `ID_KUNJUNGAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  MODIFY `ID_DET_PENGIRIMAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `detail_permintaan`
--
ALTER TABLE `detail_permintaan`
  MODIFY `ID_DET_PERMINTAAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `detail_return`
--
ALTER TABLE `detail_return`
  MODIFY `ID_RETURN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gambar_produk`
--
ALTER TABLE `gambar_produk`
  MODIFY `ID_GAMBAR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `halaman_statis`
--
ALTER TABLE `halaman_statis`
  MODIFY `ID_HALAMAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `harga_pengiriman`
--
ALTER TABLE `harga_pengiriman`
  MODIFY `ID_HARGA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `identitas_web`
--
ALTER TABLE `identitas_web`
  MODIFY `ID_IDENTITAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_menu`
--
ALTER TABLE `jenis_menu`
  MODIFY `ID_JENIS_MENU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `ID_KATEGORI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `ID_KONFIRMASI` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `ID_KURIR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `logo`
--
ALTER TABLE `logo`
  MODIFY `ID_LOGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `ID_MENU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `merek_produk`
--
ALTER TABLE `merek_produk`
  MODIFY `ID_MEREK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `ID_PRODUK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `promo`
--
ALTER TABLE `promo`
  MODIFY `ID_PROMO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `rb_admin`
--
ALTER TABLE `rb_admin`
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `rb_konsumen`
--
ALTER TABLE `rb_konsumen`
  MODIFY `ID_KONSUMEN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rb_kota`
--
ALTER TABLE `rb_kota`
  MODIFY `ID_KOTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT untuk tabel `rb_pegawai`
--
ALTER TABLE `rb_pegawai`
  MODIFY `ID_PEGAWAI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `rb_pembelian`
--
ALTER TABLE `rb_pembelian`
  MODIFY `ID_PEMBELIAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rb_pembelian_detail`
--
ALTER TABLE `rb_pembelian_detail`
  MODIFY `ID_PEMBELIAN_DETAIL` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rb_penjualan_detail`
--
ALTER TABLE `rb_penjualan_detail`
  MODIFY `ID_PENJUALAN_DETAIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `rb_provinsi`
--
ALTER TABLE `rb_provinsi`
  MODIFY `ID_PROVINSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `rb_rekening`
--
ALTER TABLE `rb_rekening`
  MODIFY `ID_REKENING` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `ID_SLIDER` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `ID_STOK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tracking_pengiriman`
--
ALTER TABLE `tracking_pengiriman`
  MODIFY `ID_TRACKING` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `ID_USERS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `varian_produk`
--
ALTER TABLE `varian_produk`
  MODIFY `ID_VARIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `venom`
--
ALTER TABLE `venom`
  MODIFY `ID_VENOM` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_PRODUK`) REFERENCES `produk` (`ID_PRODUK`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_MEREK`) REFERENCES `merek_produk` (`ID_MEREK`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_VARIAN`) REFERENCES `varian_produk` (`ID_VARIAN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori_produk` (`ID_KATEGORI`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `profil_toko`
--
ALTER TABLE `profil_toko`
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`ID_KOTA`) REFERENCES `rb_kota` (`ID_KOTA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `rb_konsumen`
--
ALTER TABLE `rb_konsumen`
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`ID_KOTA`) REFERENCES `rb_kota` (`ID_KOTA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `rb_kota`
--
ALTER TABLE `rb_kota`
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ID_PROVINSI`) REFERENCES `rb_provinsi` (`ID_PROVINSI`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `rb_pegawai`
--
ALTER TABLE `rb_pegawai`
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`ID_KOTA`) REFERENCES `rb_kota` (`ID_KOTA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `fk_produk` FOREIGN KEY (`ID_PRODUK`) REFERENCES `produk` (`ID_PRODUK`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
