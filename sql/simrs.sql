-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 07, 2020 at 02:43 PM
-- Server version: 10.3.18-MariaDB-0+deb10u1
-- PHP Version: 7.3.11-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` varchar(128) NOT NULL,
  `nama_dokter` varchar(100) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `alamat`, `no_telepon`) VALUES
('0c45302f-7490-466c-b4cc-ae565f20795e', 'Aisyah', 'Kandungan', 'Sidoarjo', '087652123111');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` varchar(128) NOT NULL,
  `nama_obat` varchar(70) NOT NULL,
  `ket_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `ket_obat`) VALUES
('0f193b40-27fa-488e-b9ab-51965883bfc9', 'Paracetamol', 'Obat penurun panas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(128) NOT NULL,
  `nomor_identitas` varchar(100) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nomor_identitas`, `nama_pasien`, `jenis_kelamin`, `alamat`, `no_telepon`) VALUES
('a14b15c8-a96e-4c92-8ace-eea7f313348a', '1112223334', 'Andriansyah', 'L', 'Parung Bogor', '087212761312');

-- --------------------------------------------------------

--
-- Table structure for table `tb_poliklinik`
--

CREATE TABLE `tb_poliklinik` (
  `id_poliklinik` varchar(128) NOT NULL,
  `nama_poliklinik` varchar(128) NOT NULL,
  `gedung` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_poliklinik`
--

INSERT INTO `tb_poliklinik` (`id_poliklinik`, `nama_poliklinik`, `gedung`) VALUES
('31970dfa-69c5-4baa-af2b-d042ded91616', 'Poli Gigi', 'Gedung A lt 2'),
('d746e338-6b21-4b9b-9cf0-0e4f069c7a05', 'Poli Anak', 'Gedung A Lt 1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekam_medis`
--

CREATE TABLE `tb_rekam_medis` (
  `id_rekam_medis` varchar(128) NOT NULL,
  `id_pasien` varchar(128) NOT NULL,
  `id_dokter` varchar(128) NOT NULL,
  `id_poliklinik` varchar(128) NOT NULL,
  `keluhan` text NOT NULL,
  `diagnosa` text NOT NULL,
  `tanggal_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekam_medis`
--

INSERT INTO `tb_rekam_medis` (`id_rekam_medis`, `id_pasien`, `id_dokter`, `id_poliklinik`, `keluhan`, `diagnosa`, `tanggal_periksa`) VALUES
('4967f5f5-9a43-4ec5-8ce3-53f768b06f5e', 'a14b15c8-a96e-4c92-8ace-eea7f313348a', '0c45302f-7490-466c-b4cc-ae565f20795e', '31970dfa-69c5-4baa-af2b-d042ded91616', '<p>Nyeri gigi</p>\r\n', '<p>Gigi berlubang</p>\r\n', '2020-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekam_medis_obat`
--

CREATE TABLE `tb_rekam_medis_obat` (
  `id_rekam_medis_obat` int(8) NOT NULL,
  `id_rekam_medis` varchar(128) NOT NULL,
  `id_obat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekam_medis_obat`
--

INSERT INTO `tb_rekam_medis_obat` (`id_rekam_medis_obat`, `id_rekam_medis`, `id_obat`) VALUES
(1, '4967f5f5-9a43-4ec5-8ce3-53f768b06f5e', '0f193b40-27fa-488e-b9ab-51965883bfc9');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` varchar(128) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` enum('admin','pegawai') NOT NULL DEFAULT 'pegawai',
  `foto` varchar(128) NOT NULL DEFAULT 'default.png',
  `created` int(11) NOT NULL,
  `login` int(11) NOT NULL,
  `logout` int(11) NOT NULL,
  `online` int(1) NOT NULL DEFAULT 0,
  `facebook` varchar(128) DEFAULT NULL,
  `twitter` varchar(128) DEFAULT NULL,
  `github` varchar(128) DEFAULT NULL,
  `instagram` varchar(128) DEFAULT NULL,
  `biografi` text NOT NULL DEFAULT 'Your biografy text is here',
  `job` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama_depan`, `nama_belakang`, `username`, `email`, `password`, `level`, `foto`, `created`, `login`, `logout`, `online`, `facebook`, `twitter`, `github`, `instagram`, `biografi`, `job`) VALUES
('c7c527a5-ae2f-4d35-9379-39e4d9b5f1ce', 'akhir', 'udin', 'akhir', 'akhir@gmail.com', '$2y$10$VU3JttBPlpXTQMx5OA5S0OlPh/VigGGoMQBZmf4rHC8LwpqLhZeUK', 'pegawai', '9a175204fee71933e5edcfbef32c618c.png', 1576431949, 1578339880, 1578340041, 0, 'null', 'null', 'kosong', 'kosong', '<p>Not yet complete here just be something</p>\r\n', 'Freelance'),
('cc0ede3a-ec02-4655-a79a-998a2670d43e', 'awal', 'prasetyo', 'awal', 'awal@gmail.com', '$2y$10$tFFg5tD/HKXz1MWfNWQgKeZP6qcBOKP0qh5pWaPVPg4VBsiMC2bUq', 'admin', 'c2baade58086726cdb0f191fd96925fd.png', 1576427029, 1578339730, 1578339753, 0, 'www.facebook.com/awalprasetyo', 'www.twitter.com/awalpras', 'www.github.com/awaluwalakhiru', 'www.instagram.com/awalprasetyo4', '<p>Seorang Fresh graduated dengan passion antusias dengan web programming</p>\r\n', 'IT Programmer'),
('dbe2c585-2290-439e-9aa2-b778cd72d976', 'juremi', 'memi', 'memi', 'memi@gmail.com', '$2y$10$kke9v6Wft1XHYouYr..8cOdKZ.BKDharGJe8FXr7mRjcFwPqxs.7G', 'pegawai', 'default.png', 1576432353, 1576483827, 1576483934, 0, NULL, NULL, NULL, NULL, 'Your biografy text is here', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_token`
--

CREATE TABLE `tb_user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `nomor_identitas` (`nomor_identitas`);

--
-- Indexes for table `tb_poliklinik`
--
ALTER TABLE `tb_poliklinik`
  ADD PRIMARY KEY (`id_poliklinik`),
  ADD UNIQUE KEY `nama_poliklinik` (`nama_poliklinik`);

--
-- Indexes for table `tb_rekam_medis`
--
ALTER TABLE `tb_rekam_medis`
  ADD PRIMARY KEY (`id_rekam_medis`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_poliklinik` (`id_poliklinik`);

--
-- Indexes for table `tb_rekam_medis_obat`
--
ALTER TABLE `tb_rekam_medis_obat`
  ADD PRIMARY KEY (`id_rekam_medis_obat`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_rekam_medis` (`id_rekam_medis`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_user_token`
--
ALTER TABLE `tb_user_token`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_rekam_medis_obat`
--
ALTER TABLE `tb_rekam_medis_obat`
  MODIFY `id_rekam_medis_obat` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user_token`
--
ALTER TABLE `tb_user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_rekam_medis`
--
ALTER TABLE `tb_rekam_medis`
  ADD CONSTRAINT `tb_rekam_medis_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`),
  ADD CONSTRAINT `tb_rekam_medis_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`),
  ADD CONSTRAINT `tb_rekam_medis_ibfk_3` FOREIGN KEY (`id_poliklinik`) REFERENCES `tb_poliklinik` (`id_poliklinik`);

--
-- Constraints for table `tb_rekam_medis_obat`
--
ALTER TABLE `tb_rekam_medis_obat`
  ADD CONSTRAINT `tb_rekam_medis_obat_ibfk_1` FOREIGN KEY (`id_rekam_medis`) REFERENCES `tb_rekam_medis` (`id_rekam_medis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rekam_medis_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
