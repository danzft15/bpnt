-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Agu 2019 pada 17.43
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `00f_unsadaspk_bpnt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` int(8) NOT NULL,
  `id_penilaian` varchar(15) NOT NULL,
  `id_pemohon` varchar(15) NOT NULL,
  `bobot` float NOT NULL,
  `hasil` varchar(15) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_hasil`
--

INSERT INTO `tb_hasil` (`id_hasil`, `id_penilaian`, `id_pemohon`, `bobot`, `hasil`, `keterangan`, `status`) VALUES
(194, 'PNL1908001', 'PEM1908001', 0.534788, 'Tidak Layak', '0.53478785694366 : 0.53478785694236 ', 'Proses'),
(195, 'PNL1908001', 'PEM1908003', 0.534788, 'Tidak Layak', '0.53478785694366 : 0.53478785694236 ', 'Proses'),
(196, 'PNL1908001', 'PEM1905005', 0.000000487193, 'Layak', '4.8719276454502E-7 : 4.871927646091E-7 ', 'Proses'),
(197, 'PNL1908001', 'PEM1908004', 0.497658, 'Tidak Layak', '0.49765824593587 : 0.49765824593429 ', 'Proses'),
(198, 'PNL1908001', 'PEM1905002', 0.180621, 'Tidak Layak', '0.18062061200305 : 0.18062061200208 ', 'Proses'),
(199, 'PNL1908001', 'PEM1905004', 1.24739, 'Tidak Layak', '1.2473901511747 : 1.247390151172 ', 'Proses'),
(200, 'PNL1908001', 'PEM1908007', 1.02354, 'Tidak Layak', '1.0235371220173 : 1.0235371220149 ', 'Proses'),
(201, 'PNL1908001', 'PEM1908005', 0.610046, 'Tidak Layak', '0.61004631218855 : 0.61004631218674 ', 'Proses'),
(202, 'PNL1908001', 'PEM1908002', 0.496016, 'Tidak Layak', '0.49601570425112 : 0.4960157042499 ', 'Proses'),
(203, 'PNL1908001', 'PEM1908010', 0.00286823, 'Tidak Layak', '0.0028682281849446 : 0.0028682281849141 ', 'Proses'),
(204, 'PNL1908001', 'PEM1908008', 0.568586, 'Tidak Layak', '0.56858616862993 : 0.56858616862822 ', 'Proses'),
(205, 'PNL1908001', 'PEM1905006', 0.672356, 'Tidak Layak', '0.67235617887567 : 0.67235617887433 ', 'Proses'),
(206, 'PNL1908001', 'PEM1905003', 0.711989, 'Tidak Layak', '0.71198884238845 : 0.71198884238647 ', 'Proses'),
(207, 'PNL1908001', 'PEM1905007', 0.538527, 'Tidak Layak', '0.5385274276697 : 0.53852742766846 ', 'Proses'),
(208, 'PNL1908001', 'PEM1908009', 0.610046, 'Tidak Layak', '0.61004631218855 : 0.61004631218674 ', 'Proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemohon`
--

CREATE TABLE `tb_pemohon` (
  `id_pemohon` varchar(20) NOT NULL,
  `nama_pemohon` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `c1` varchar(40) NOT NULL,
  `c2` varchar(40) NOT NULL,
  `c3` varchar(40) NOT NULL,
  `c4` varchar(40) NOT NULL,
  `c5` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pemohon`
--

INSERT INTO `tb_pemohon` (`id_pemohon`, `nama_pemohon`, `jenis_kelamin`, `tlp`, `email`, `alamat`, `no_kk`, `c1`, `c2`, `c3`, `c4`, `c5`, `username`, `password`) VALUES
('PEM1905002', 'Rasyid Bahri', 'Laki-Laki', '089807987625', 'Bahrihasim@gmail.com', 'Jl. Pondok Kelapa Selatan', '3175061212580009', 'Wiraswasta', '1000000', '3', 'Rumah Sendiri', 'Ada', 'rasyid', 'rasyid'),
('PEM1905003', 'Fakhrurozi', 'Laki-Laki', '089897475218', 'fakhrurozi88@gmail.com', 'Jl. Pondok Kelapa Selatan Rt 011/05', '3175070707590006', 'Pemulung', '150000', '2', 'Mengontrak', 'Tidak Ada', 'fakh', 'fakh'),
('PEM1905004', 'Nova Eko Ariyanto', 'Laki-Laki', '0812992877635', 'nova12@gmail.com', 'Jl. Swakarsa IV, Pondok Kelapa, Jakarta Timur', '3175081127751009', 'Tidak Bekerja', '200000', '2', 'Mengontrak', 'Tidak Ada', 'nova', 'nova'),
('PEM1905005', 'Tito Nurahman', 'Laki-Laki', '0812887288726', 'nurahmantito@gmail.com', 'Jl. Pondok Kelapa Selatan, Pondok Kelapa, Jakarta Timur', '3175076403790015', 'Pegawai Tetap', '7500000', '3', 'Rumah Sendiri', 'Ada', 'tito', 'tito'),
('PEM1905006', 'Junaedi', 'Laki-Laki', '089989982938', 'junaedi59@gmail.com', 'Jl. Kenangan III', '3175072002670018', 'Buruh', '1500000', '5', 'Mengontrak', 'Tidak Ada', 'jun', 'jun'),
('PEM1905007', 'Edie Rusmanto Wirasno', 'Laki-Laki', '08785217652', 'rusmantoedie388@gmail.com', 'Jl. Raya Kincan Jaya No. 9 , Pondok Kelapa', '3175084205870006', 'Buruh', '2000000', '4', 'Mengontrak', 'Tidak Ada', 'ed', 'ed'),
('PEM1908001', 'Widodo', 'Laki-Laki', '089854761123', 'widodo11@gmail.com', 'Jl. As, Pondok Kelapa', '3175022307580001', 'Buruh', '1100000', '2', 'Mengontrak', 'Tidak Ada', 'widodo', 'widodo'),
('PEM1908002', 'Marzuki Basna', 'Laki-Laki', '089635970781', 'emrecan@gmail.com', 'Jl. Pondok kelapa raya', '3757008977762000', 'Buruh', '1200000', '3', 'Mengontrak', 'Tidak Ada', 'marzuki', 'marzuki'),
('PEM1908003', 'Wawan Norwanto', 'Laki-Laki', '087898769009', 'norwantojaya@gmail.com', 'Jl. Pondok Kelapa Selatan dalam IIIC', '3175032406680003', 'Buruh', '1250000', '2', 'Mengontrak', 'Tidak Ada', 'wawan', 'wawan'),
('PEM1908004', 'Sumaji', 'Laki-Laki', '081590782142', 'Sumaji@gmail.com', 'Jl. Pondok Kelapa Selatan dalam', '3175011710780012', 'Tukang Ojek Pangkalan', '800000', '3', 'Mengontrak', 'Tidak Ada', 'sumaji', 'sumaji'),
('PEM1908005', 'Muhadi', 'Laki-Laki', '085765788976', 'muhadi@gmail.com', 'Jl. A. Komp DKI', '3175091010880017', 'Supir', '500000', '2', 'Mengontrak', 'Tidak Ada', 'muhadi', 'muhadi'),
('PEM1908007', 'Muhammad Ilham Abdullah', 'Laki-Laki', '081209886288', 'abdullah@gmail.com', 'Jl. Pondok Kelapa 9', '3175050504720001', 'Tukang Batu', '700000', '2', 'Mengontrak', 'Tidak Ada', 'ilham', 'ilham'),
('PEM1908008', 'Khoirun', 'Laki-Laki', '081376547651', 'khoirun@gmail.com', 'Jl. Tapas II', '3175061312730003', 'Supir', '350000', '3', 'Mengontrak', 'Tidak Ada', 'khoirun', 'khoirun'),
('PEM1908009', 'Budi Aditiya', 'Laki-Laki', '089897485218', 'budi@gmail.com', 'Jl. Cakung', '3751998726664', 'Supir', '750000', '2', 'Mengontrak', 'Tidak Ada', 'aditiya', 'aditiya'),
('PEM1908010', 'Mahdi', 'Laki-Laki', '083807485218', 'mahdi@gmail.com', 'Jl. Pondok kelapa', '327519984765888', 'Wiraswasta', '4000000', '2', 'Rumah Sendiri', 'Ada', 'mahdi', 'mahdi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id_penilaian` varchar(15) NOT NULL,
  `tgl_penilaian` date NOT NULL,
  `nama_penilaian` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id_penilaian`, `tgl_penilaian`, `nama_penilaian`, `deskripsi`, `status`, `keterangan`) VALUES
('PNL1908001', '2019-08-21', 'Penyaluran BLT Agustus 2019', 'Penyaluran Tepat Sasaran', 'Proses', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_penilaian_detail`
--

CREATE TABLE `tb_penilaian_detail` (
  `id` int(8) NOT NULL,
  `id_penilaian` varchar(15) NOT NULL,
  `id_pemohon` varchar(15) NOT NULL,
  `c1` varchar(50) NOT NULL,
  `c2` varchar(50) NOT NULL,
  `c3` varchar(50) NOT NULL,
  `c4` varchar(50) NOT NULL,
  `c5` varchar(50) NOT NULL,
  `status_detail` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_penilaian_detail`
--

INSERT INTO `tb_penilaian_detail` (`id`, `id_penilaian`, `id_pemohon`, `c1`, `c2`, `c3`, `c4`, `c5`, `status_detail`, `keterangan`) VALUES
(8, 'PNL1905003', 'PEM1905007', 'Buruh', '1', '2', 'Rumah Sendiri', 'Ada', '', ''),
(9, 'PNL1905003', 'PEM1905003', 'Wirausaha', '3', '3', 'Mengontrak', 'Ada', '', ''),
(10, 'PNL1905003', 'PEM1905006', 'Wiraswasta', '4', '4', 'Rumah Sendiri', 'Tidak Ada', '', ''),
(11, 'PNL1905003', 'PEM1905005', 'Pegawai Tetap', '5', '5', 'Rumah Sendiri', 'Ada', '', ''),
(12, 'PNL1906001', 'PEM1905007', 'Buruh', '1200000', '5', 'Mengontrak', 'Tidak Ada', '', ''),
(13, 'PNL1906001', 'PEM1905003', 'Tukang Batu', '1000000', '4', 'Mengontrak', 'Tidak Ada', '', ''),
(14, 'PNL1906001', 'PEM1905006', 'Pegawai Tetap', '7500000', '5', 'Mengontrak', 'Tidak Ada', '', ''),
(15, 'PNL1906001', 'PEM1905004', 'Supir', '1100000', '5', 'Rumah Sendiri', 'Tidak Ada', '', ''),
(16, 'PNL1906001', 'PEM1905002', 'Tukang Ojek Pangkalan', '800000', '4', 'Mengontrak', 'Tidak Ada', '', ''),
(17, 'PNL1906001', 'PEM1905001', 'Pemulung', '300000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(18, 'PNL1906001', 'PEM1905005', 'Tidak Bekerja', '100000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(26, 'PNL1906002', 'PEM1905007', 'Supir', '800000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(27, 'PNL1906002', 'PEM1905003', 'Supir', '900000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(28, 'PNL1906002', 'PEM1905006', 'Pemulung', '150000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(29, 'PNL1906002', 'PEM1905004', 'Tidak Bekerja', '250000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(30, 'PNL1906002', 'PEM1905002', 'Tukang Batu', '800000', '2', 'Mengontrak', 'Ada', '', ''),
(31, 'PNL1906002', 'PEM1905001', 'Tukang Batu', '1000000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(32, 'PNL1906002', 'PEM1905005', 'Pegawai Tetap', '3500000', '4', 'Rumah Sendiri', 'Ada', '', ''),
(33, 'PNL1906004', 'PEM1905007', 'Buruh', '1200000', '3', 'Rumah Sendiri', 'Tidak Ada', '', ''),
(34, 'PNL1906004', 'PEM1905003', 'Wirausaha', '3500000', '2', 'Mengontrak', 'Ada', '', ''),
(35, 'PNL1906004', 'PEM1905006', 'Pemulung', '1200000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(36, 'PNL1906004', 'PEM1905004', 'Wirausaha', '7000000', '3', 'Mengontrak', 'Ada', '', ''),
(37, 'PNL1906004', 'PEM1905002', 'Pemulung', '100000', '4', 'Mengontrak', 'Ada', '', ''),
(38, 'PNL1906004', 'PEM1905001', 'Pegawai Tetap', '12000000', '2', 'Mengontrak', 'Ada', '', ''),
(39, 'PNL1906004', 'PEM1905005', 'Pegawai Tetap', '12000000', '1', 'Mengontrak', 'Ada', '', ''),
(40, 'PNL1906003', 'PEM1905007', 'Buruh', '3500000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(41, 'PNL1906003', 'PEM1905003', 'Buruh', '3500000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(42, 'PNL1906003', 'PEM1905006', 'Tukang Batu', '250000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(43, 'PNL1906003', 'PEM1905004', 'Tukang Batu', '300000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(44, 'PNL1906003', 'PEM1905002', 'Supir', '300000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(45, 'PNL1906003', 'PEM1905001', 'Tidak Bekerja', '100000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(46, 'PNL1906003', 'PEM1905005', 'Supir', '500000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(61, 'PNL1906005', 'PEM1905007', 'Pemulung', '100000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(62, 'PNL1906005', 'PEM1905003', 'Pegawai Tetap', '7500000', '2', 'Rumah Sendiri', 'Ada', '', ''),
(63, 'PNL1906005', 'PEM1905006', 'Tukang Batu', '200000', '4', 'Mengontrak', 'Tidak Ada', '', ''),
(64, 'PNL1906005', 'PEM1905004', 'Supir', '200000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(65, 'PNL1906005', 'PEM1905002', 'Tidak Bekerja', '100000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(66, 'PNL1906005', 'PEM1905001', 'Tukang Ojek Pangkalan', '200000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(67, 'PNL1906005', 'PEM1905005', 'Supir', '800000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(99, 'PNL1906006', 'PEM1905007', 'Buruh', '2000000', '4', 'Mengontrak', 'Tidak Ada', '', ''),
(100, 'PNL1906006', 'PEM1905003', 'Pemulung', '150000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(101, 'PNL1906006', 'PEM1905006', 'Buruh', '1500000', '5', 'Mengontrak', 'Tidak Ada', '', ''),
(102, 'PNL1906006', 'PEM1905004', 'Tidak Bekerja', '200000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(103, 'PNL1906006', 'PEM1905002', 'Wiraswasta', '1000000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(104, 'PNL1906006', 'PEM1905001', 'Pegawai Tetap', '6500000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(105, 'PNL1906006', 'PEM1905005', 'Pegawai Tetap', '7500000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(106, 'PNL1906007', 'PEM1905007', 'Buruh', '2000000', '4', 'Mengontrak', 'Tidak Ada', '', ''),
(107, 'PNL1906007', 'PEM1905003', 'Pemulung', '150000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(108, 'PNL1906007', 'PEM1905006', 'Buruh', '1500000', '5', 'Mengontrak', 'Tidak Ada', '', ''),
(109, 'PNL1906007', 'PEM1905004', 'Tidak Bekerja', '200000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(110, 'PNL1906007', 'PEM1905002', 'Pegawai Tetap', '6000000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(111, 'PNL1906007', 'PEM1905001', 'Pemulung', '100000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(112, 'PNL1906007', 'PEM1905005', 'Pegawai Tetap', '7500000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(113, 'PNL1907001', 'PEM1905007', 'Buruh', '2000000', '4', 'Mengontrak', 'Tidak Ada', '', ''),
(114, 'PNL1907001', 'PEM1905003', 'Pemulung', '150000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(115, 'PNL1907001', 'PEM1905006', 'Buruh', '1500000', '5', 'Mengontrak', 'Tidak Ada', '', ''),
(116, 'PNL1907001', 'PEM1905004', 'Tidak Bekerja', '200000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(117, 'PNL1907001', 'PEM1905002', 'Wiraswasta', '1000000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(118, 'PNL1907001', 'PEM1905001', 'Pemulung', '100000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(119, 'PNL1907001', 'PEM1905005', 'Pegawai Tetap', '7500000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(120, 'PNL1907002', 'PEM1905007', 'Buruh', '1000000', '4', 'Mengontrak', 'Tidak Ada', '', ''),
(121, 'PNL1907002', 'PEM1905003', 'Pemulung', '150000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(122, 'PNL1907002', 'PEM1905006', 'Buruh', '1500000', '5', 'Mengontrak', 'Tidak Ada', '', ''),
(123, 'PNL1907002', 'PEM1905004', 'Tidak Bekerja', '200000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(124, 'PNL1907002', 'PEM1905002', 'Wiraswasta', '1000000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(125, 'PNL1907002', 'PEM1905001', 'Pemulung', '100000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(126, 'PNL1907002', 'PEM1905005', 'Pegawai Tetap', '7500000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(127, 'PNL1907003', 'PEM1905001', 'Pemulung', '100000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(128, 'PNL1907003', 'PEM1905005', 'Pegawai Tetap', '7500000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(171, 'PNL1908002', 'PEM1905007', 'Buruh', '2000000', '4', 'Mengontrak', 'Tidak Ada', '', ''),
(172, 'PNL1908002', 'PEM1905003', 'Pemulung', '150000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(173, 'PNL1908002', 'PEM1905006', 'Buruh', '1500000', '5', 'Mengontrak', 'Tidak Ada', '', ''),
(174, 'PNL1908002', 'PEM1908008', 'Supir', '350000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(175, 'PNL1908002', 'PEM1908002', 'Buruh', '1200000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(176, 'PNL1908002', 'PEM1908005', 'Supir', '500000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(177, 'PNL1908002', 'PEM1908007', 'Wiraswasta', '7000000', '2', 'Mengontrak', 'Ada', '', ''),
(178, 'PNL1908002', 'PEM1905004', 'Tidak Bekerja', '200000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(179, 'PNL1908002', 'PEM1905002', 'Wiraswasta', '1000000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(180, 'PNL1908002', 'PEM1908004', 'Tukang Ojek Pangkalan', '800000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(181, 'PNL1908002', 'PEM1905001', 'Pemulung', '100000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(182, 'PNL1908002', 'PEM1905005', 'Pegawai Tetap', '7500000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(183, 'PNL1908002', 'PEM1908003', 'Buruh', '1250000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(184, 'PNL1908002', 'PEM1908001', 'Buruh', '1100000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(187, 'PNL1908003', 'PEM1908009', 'Supir', '750000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(188, 'PNL1908003', 'PEM1905007', 'Buruh', '2000000', '4', 'Mengontrak', 'Tidak Ada', '', ''),
(189, 'PNL1908003', 'PEM1905003', 'Pemulung', '150000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(190, 'PNL1908003', 'PEM1905006', 'Buruh', '1500000', '5', 'Mengontrak', 'Tidak Ada', '', ''),
(191, 'PNL1908003', 'PEM1908008', 'Supir', '350000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(192, 'PNL1908003', 'PEM1908002', 'Buruh', '1200000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(193, 'PNL1908003', 'PEM1908005', 'Supir', '500000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(194, 'PNL1908003', 'PEM1908007', 'Tukang Batu', '700000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(195, 'PNL1908003', 'PEM1905004', 'Tidak Bekerja', '200000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(196, 'PNL1908003', 'PEM1905002', 'Wiraswasta', '1000000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(197, 'PNL1908003', 'PEM1908004', 'Tukang Ojek Pangkalan', '800000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(198, 'PNL1908003', 'PEM1905001', 'Pemulung', '100000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(199, 'PNL1908003', 'PEM1905005', 'Pegawai Tetap', '7500000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(200, 'PNL1908003', 'PEM1908003', 'Buruh', '1250000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(201, 'PNL1908003', 'PEM1908001', 'Buruh', '1100000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(202, 'PNL1908004', 'PEM1908009', 'Supir', '750000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(203, 'PNL1908004', 'PEM1905007', 'Buruh', '2000000', '4', 'Mengontrak', 'Tidak Ada', '', ''),
(204, 'PNL1908004', 'PEM1905003', 'Pemulung', '150000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(205, 'PNL1908004', 'PEM1905006', 'Buruh', '1500000', '5', 'Mengontrak', 'Tidak Ada', '', ''),
(206, 'PNL1908004', 'PEM1908008', 'Supir', '350000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(207, 'PNL1908004', 'PEM1908010', 'Wiraswasta', '4000000', '2', 'Rumah Sendiri', 'Ada', '', ''),
(208, 'PNL1908004', 'PEM1908002', 'Buruh', '1200000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(209, 'PNL1908004', 'PEM1908005', 'Supir', '500000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(210, 'PNL1908004', 'PEM1908007', 'Tukang Batu', '700000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(211, 'PNL1908004', 'PEM1905004', 'Tidak Bekerja', '200000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(212, 'PNL1908004', 'PEM1905002', 'Wiraswasta', '1000000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(213, 'PNL1908004', 'PEM1908004', 'Tukang Ojek Pangkalan', '800000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(214, 'PNL1908004', 'PEM1905001', 'Pemulung', '100000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(215, 'PNL1908004', 'PEM1905005', 'Pegawai Tetap', '7500000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(216, 'PNL1908004', 'PEM1908003', 'Buruh', '1250000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(217, 'PNL1908004', 'PEM1908001', 'Buruh', '1100000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(218, 'PNL1908005', 'PEM1908011', 'Pemulung', '100000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(219, 'PNL1908005', 'PEM1908009', 'Supir', '750000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(220, 'PNL1908005', 'PEM1905007', 'Buruh', '2000000', '4', 'Mengontrak', 'Tidak Ada', '', ''),
(221, 'PNL1908005', 'PEM1905003', 'Pemulung', '150000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(222, 'PNL1908005', 'PEM1905006', 'Buruh', '1500000', '5', 'Mengontrak', 'Tidak Ada', '', ''),
(223, 'PNL1908005', 'PEM1908008', 'Supir', '350000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(224, 'PNL1908005', 'PEM1908010', 'Wiraswasta', '4000000', '2', 'Rumah Sendiri', 'Ada', '', ''),
(225, 'PNL1908005', 'PEM1908002', 'Buruh', '1200000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(226, 'PNL1908005', 'PEM1908005', 'Supir', '500000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(227, 'PNL1908005', 'PEM1908007', 'Tukang Batu', '700000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(228, 'PNL1908005', 'PEM1905004', 'Tidak Bekerja', '200000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(229, 'PNL1908005', 'PEM1905002', 'Wiraswasta', '1000000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(230, 'PNL1908005', 'PEM1908004', 'Tukang Ojek Pangkalan', '800000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(231, 'PNL1908005', 'PEM1905001', 'Pemulung', '100000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(232, 'PNL1908005', 'PEM1905005', 'Pegawai Tetap', '7500000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(233, 'PNL1908005', 'PEM1908003', 'Buruh', '1250000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(234, 'PNL1908005', 'PEM1908001', 'Buruh', '1100000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(235, 'PNL1908007', 'PEM1908011', 'Pemulung', '100000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(236, 'PNL1908006', 'PEM1905005', 'Pegawai Tetap', '7500000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(237, 'PNL1908001', 'PEM1908009', 'Supir', '750000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(238, 'PNL1908001', 'PEM1905007', 'Buruh', '2000000', '4', 'Mengontrak', 'Tidak Ada', '', ''),
(239, 'PNL1908001', 'PEM1905003', 'Pemulung', '150000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(240, 'PNL1908001', 'PEM1905006', 'Buruh', '1500000', '5', 'Mengontrak', 'Tidak Ada', '', ''),
(241, 'PNL1908001', 'PEM1908008', 'Supir', '350000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(242, 'PNL1908001', 'PEM1908010', 'Wiraswasta', '4000000', '2', 'Rumah Sendiri', 'Ada', '', ''),
(243, 'PNL1908001', 'PEM1908002', 'Buruh', '1200000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(244, 'PNL1908001', 'PEM1908005', 'Supir', '500000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(245, 'PNL1908001', 'PEM1908007', 'Tukang Batu', '700000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(246, 'PNL1908001', 'PEM1905004', 'Tidak Bekerja', '200000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(247, 'PNL1908001', 'PEM1905002', 'Wiraswasta', '1000000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(248, 'PNL1908001', 'PEM1908004', 'Tukang Ojek Pangkalan', '800000', '3', 'Mengontrak', 'Tidak Ada', '', ''),
(249, 'PNL1908001', 'PEM1905005', 'Pegawai Tetap', '7500000', '3', 'Rumah Sendiri', 'Ada', '', ''),
(250, 'PNL1908001', 'PEM1908003', 'Buruh', '1250000', '2', 'Mengontrak', 'Tidak Ada', '', ''),
(251, 'PNL1908001', 'PEM1908001', 'Buruh', '1100000', '2', 'Mengontrak', 'Tidak Ada', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(15) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `tlp_user` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `tlp_user`, `email`, `username`, `password`, `status`) VALUES
('PTGS01', 'arip', '089875', 'aripmusa@gmail.com', 'arip', 'arip', 'Aktif'),
('USR001', 'Budi Iskandar', '0886676575775', 'bid@gmail.com', 'b', 'b', 'Aktif'),
('USR002', 'Jordan Nur Akbar', '081292732328', 'jordan.unsada@gmail.com', 'jordan', 'jordan', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indeks untuk tabel `tb_pemohon`
--
ALTER TABLE `tb_pemohon`
  ADD PRIMARY KEY (`id_pemohon`);

--
-- Indeks untuk tabel `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indeks untuk tabel `tb_penilaian_detail`
--
ALTER TABLE `tb_penilaian_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_hasil` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT untuk tabel `tb_penilaian_detail`
--
ALTER TABLE `tb_penilaian_detail`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
