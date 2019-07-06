-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2019 at 12:36 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

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
-- Table structure for table `tb_hasil`
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
-- Dumping data for table `tb_hasil`
--

INSERT INTO `tb_hasil` (`id_hasil`, `id_penilaian`, `id_pemohon`, `bobot`, `hasil`, `keterangan`, `status`) VALUES
(5, 'PNL1905003', 'PEM1905005', 0.148548, '1', '0.148548180094 : 0.14854812716016 : 0.14854812623524 ', 'Proses'),
(6, 'PNL1905003', 'PEM1905006', 0.0933732, '1', '0.093373233406588 : 0.093373201693678 : 0.093373201139549 ', 'Proses'),
(7, 'PNL1905003', 'PEM1905003', 0.0316749, '1', '0.031674868825724 : 0.031674844210139 : 0.031674843780028 ', 'Proses'),
(8, 'PNL1905003', 'PEM1905007', 0.00000134219, '3', '1.342179610688E-6 : 1.3421925345589E-6 : 1.3421927603799E-6 ', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemohon`
--

CREATE TABLE `tb_pemohon` (
  `id_pemohon` varchar(20) NOT NULL,
  `nama_pemohon` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `upload_kk` varchar(100) NOT NULL,
  `upload_ktp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemohon`
--

INSERT INTO `tb_pemohon` (`id_pemohon`, `nama_pemohon`, `jenis_kelamin`, `tlp`, `email`, `alamat`, `no_kk`, `upload_kk`, `upload_ktp`) VALUES
('PEM1905001', 'Surya Adi Jaya', 'Laki-Laki', '07897987977897', 'adi123@gmail.com', 'Jakarta Selatan ,12320', '1234243242331', 'Clouds-Above-Houses-Wallpaper-924663.jpeg', 'Full-HD-Wallpapers-Nature-4.jpg'),
('PEM1905002', 'Rasyid Bahri', 'Laki-Laki', '089807987625', 'Bahrihasim@gmail.com', 'Jl. Pondok Kelapa Selatan', '17777778888888889', 'Full-HD-Wallpapers-Nature-4.jpg', 'Clouds-Above-Houses-Wallpaper-924663.jpeg'),
('PEM1905003', 'Fakhrurozi', 'Laki-Laki', '089897475218', 'fakhrurozi88@gmail.com', 'Jalan Pondok Kelapa Selatan Rt 011/05', '3175070707590006', 'avatar.jpg', 'avatar.jpg'),
('PEM1905004', 'Nova Eko Ariyanto', 'Laki-Laki', '0812992877635', 'nova12@gmail.com', 'Jl. Swakarsa IV, Pondok Kelapa, Jakarta Timur', '3175081127751009', 'avatar.jpg', 'avatar.jpg'),
('PEM1905005', 'Tito Nurahman', 'Laki-Laki', '0812887288726', 'nurahmantito@gmail.com', 'Jl. Pondok Kelapa Selatan, Pondok Kelapa, Jakarta Timur', '3175076403790015', 'avatar.jpg', 'avatar.jpg'),
('PEM1905006', 'Junaedi', 'Laki-Laki', '089989982938', 'junaedi59@gmail.com', 'Jl. Kenangan III', '3175072002670018', 'avatar.jpg', 'avatar.jpg'),
('PEM1905007', 'Edie Rusmanto Wirasno', 'Laki-Laki', '08785217652', 'rusmantoedie388@gmail.com', 'Jl. Pangkalan Jati No. 9 Kecamatan Pondok Gede', '3175084205870006', 'avatar.jpg', 'avatar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
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
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`id_penilaian`, `tgl_penilaian`, `nama_penilaian`, `deskripsi`, `status`, `keterangan`) VALUES
('PNL1905001', '2019-05-14', 'Penilaian Terbaik', '-', 'Proses', '-'),
('PNL1905002', '2019-05-22', 'BPNT', 'Pengajuan BPNT', 'Proses', 'KK, KTP'),
('PNL1905003', '2019-05-21', 'Pemyaluran BTL Jan 2019', 'Dana Hibah PT AMG', 'Proses', 'prioritas 10 warga');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian_detail`
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
-- Dumping data for table `tb_penilaian_detail`
--

INSERT INTO `tb_penilaian_detail` (`id`, `id_penilaian`, `id_pemohon`, `c1`, `c2`, `c3`, `c4`, `c5`, `status_detail`, `keterangan`) VALUES
(8, 'PNL1905003', 'PEM1905007', 'Buruh', '1', '2', 'Rumah Sendiri', 'Ada', '', ''),
(9, 'PNL1905003', 'PEM1905003', 'Wirausaha', '3', '3', 'Mengontrak', 'Ada', '', ''),
(10, 'PNL1905003', 'PEM1905006', 'Wiraswasta', '4', '4', 'Rumah Sendiri', 'Tidak Ada', '', ''),
(11, 'PNL1905003', 'PEM1905005', 'Pegawai Tetap', '5', '5', 'Rumah Sendiri', 'Ada', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
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
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `tlp_user`, `email`, `username`, `password`, `status`) VALUES
('USR001', 'Budi Iskandar', '0886676575775', 'bid@gmail.com', 'b', 'b', 'Aktif'),
('USR002', 'Jordan Nur Akbar', '081292732328', 'jordan.unsada@gmail.com', 'jordan', 'jordan', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tb_pemohon`
--
ALTER TABLE `tb_pemohon`
  ADD PRIMARY KEY (`id_pemohon`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `tb_penilaian_detail`
--
ALTER TABLE `tb_penilaian_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_hasil` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_penilaian_detail`
--
ALTER TABLE `tb_penilaian_detail`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
