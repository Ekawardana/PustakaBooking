-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2022 at 07:07 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pustaka`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` varchar(12) NOT NULL,
  `tgl_booking` date NOT NULL,
  `batas_ambil` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking_detail`
--

CREATE TABLE `booking_detail` (
  `id` int(11) NOT NULL,
  `id_booking` varchar(12) NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `pengarang` varchar(60) NOT NULL,
  `penerbit` varchar(60) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `isbn` varchar(60) NOT NULL,
  `stok` int(11) NOT NULL,
  `dipinjam` int(11) NOT NULL,
  `dibooking` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul_buku`, `id_kategori`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `stok`, `dipinjam`, `dibooking`, `image`) VALUES
(1, 'Statistika Dengan Pemrograman Komputer', 1, 'Ahmad Kholiqul Amin', 'Deep Publish', 2014, '9786022809432', 7, 0, 2, 'img1645688846.jpg'),
(2, 'Mudah Belajar Komputer Untuk Anak', 1, 'Bambang Agus Setiawan', 'Huta Media', 2014, '9786025118500', 7, 0, 1, 'img1557402397.jpg'),
(3, 'PHP Komplet', 1, 'Jubilee', 'Elex Media Komputindo', 2017, '834676753547', 7, 0, 1, 'img1555522493.jpg'),
(4, 'Detektif Conan Eps 200', 9, 'Okigawa Sasuke', 'Cultura', 2016, '874387583987', 7, 0, 0, 'img1557401465.jpg'),
(5, 'Bahasa Indonesia', 2, 'Umri Nur\'aini dan Indriyani', 'Pusat Perbukuan', 2015, '757254724884', 3, 0, 0, 'img1557402703.jpg'),
(6, 'Komunikasi Lintas Budaya', 5, 'Dr. Deddy Kurnia', 'Published', 2015, '878674646488', 5, 0, 0, 'img1557403156.jpg'),
(7, 'Kolaborasi Codigniter dan Ajax', 1, 'Anton Subagia', 'Elex Media Computindo', 2017, '43345356577', 5, 0, 0, 'img1557403502.jpg'),
(8, 'From Hobby to Money', 4, 'Deasylawati', 'Elex Media Komputindo', 2015, '8796868678789', 5, 0, 0, 'img1557403658.jpg'),
(9, 'Buku Saku Pramuka', 8, 'Rudi Himawan', 'Pusat Perbukuan', 2016, '97868687978796', 6, 0, 0, 'img1557404613.jpg'),
(10, 'Bahasa Keajaiban Bumi', 3, 'Nurul Ihsan', 'Luxima', 2014, '56575656578868', 5, 0, 0, 'img1557404689.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Komputer'),
(2, 'Bahasa'),
(3, 'Sains'),
(4, 'Hobby'),
(5, 'Komunikasi'),
(6, 'Hukum'),
(7, 'Agama'),
(8, 'Populer'),
(9, 'Komik');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `no_pinjam` varchar(12) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `id_booking` varchar(12) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `status` enum('Pinjam','Kembali','','') NOT NULL,
  `total_denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`no_pinjam`, `tgl_pinjam`, `id_booking`, `id_user`, `tgl_kembali`, `tgl_pengembalian`, `status`, `total_denda`) VALUES
('26022022001', '2022-02-26', '26022022001', 2, '2022-02-28', '2022-02-26', 'Kembali', 0),
('26022022002', '2022-02-26', '26022022001', 4, '2022-02-28', '2022-02-26', 'Kembali', 0),
('26022022003', '2022-02-26', '26022022001', 4, '2022-03-01', '2022-02-26', 'Kembali', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_detail`
--

CREATE TABLE `pinjam_detail` (
  `id` int(11) NOT NULL,
  `no_pinjam` varchar(12) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `tgl_booking` datetime NOT NULL,
  `id_user` varchar(12) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Eka Wardana', 'ekaskitzo25@gmail.com', 'default.jpg', '$2y$10$AcP.X7Wo29Hf6KYG8kf3kOoU7tQ6rS3CwyKwZQoas9MEvK0iipRMW', 1, 1, 1645592425),
(2, 'Surya Intan', 'surya@gmail.com', '246665451.jpg', '$2y$10$e75hHePfRN5CpXuFASZZfufVCeiZUbjJSGJWQTAtVJc9wTcGEN/xO', 2, 1, 1645677874),
(4, 'Ahmad', 'ahmad@gmail.com', 'default.jpg', '$2y$10$UE/vzFtz1YwYZXHREc5x/utwrYjBmqSjYEF58.RlQH9B2cvnzYNwK', 2, 1, 1645714337),
(5, 'Shenny Riski', 'shenny@gmail.com', 'default.jpg', '$2y$10$5KZ/Q3UfYmLSDyi5Mo2B0umFh/8mM5J9RFmRlP9aZIw1KR9szjKxO', 2, 1, 1645844939);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`no_pinjam`);

--
-- Indexes for table `pinjam_detail`
--
ALTER TABLE `pinjam_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_detail`
--
ALTER TABLE `booking_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pinjam_detail`
--
ALTER TABLE `pinjam_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
