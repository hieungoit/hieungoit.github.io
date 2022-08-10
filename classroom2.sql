-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 12:59 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroom2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bai_tap`
--

CREATE TABLE `bai_tap` (
  `id_bai_tap` int(11) NOT NULL,
  `id_lop_hoc` int(11) NOT NULL,
  `ten_bai_tap` text NOT NULL,
  `mo_ta` text NOT NULL,
  `ngay_bat_dau` datetime DEFAULT NULL,
  `ngay_ket_thuc` datetime DEFAULT NULL,
  `file_bai_tap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bai_tap`
--

INSERT INTO `bai_tap` (`id_bai_tap`, `id_lop_hoc`, `ten_bai_tap`, `mo_ta`, `ngay_bat_dau`, `ngay_ket_thuc`, `file_bai_tap`) VALUES
(5, 1, 'asd', 'ad21', '2020-12-01 14:35:00', '2020-12-27 20:33:00', '../hinhanhdaidien/JSON (1).png'),
(8, 2, 'asda', 'asdasdad', '2020-12-12 09:06:00', '2020-12-11 09:07:00', '../hinhanhdaidien/true.png'),
(9, 1, 'asd', 'ad', NULL, NULL, '../hinhanhdaidien/true (3).png');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_bai_tap` int(11) NOT NULL,
  `ten_dang_nhap` text NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_bai_tap`, `ten_dang_nhap`, `comment`) VALUES
(223, 8, 'admin', 'asdad');

-- --------------------------------------------------------

--
-- Table structure for table `dang_nhap`
--

CREATE TABLE `dang_nhap` (
  `id_dang_nhap` int(11) NOT NULL,
  `ten_dang_nhap` varchar(50) NOT NULL,
  `mat_khau` varchar(50) NOT NULL,
  `ho_ten` text NOT NULL,
  `ngay_sinh` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `so_dien_thoai` int(10) NOT NULL,
  `loai_tai_khoan` varchar(20) NOT NULL DEFAULT 'HV'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dang_nhap`
--

INSERT INTO `dang_nhap` (`id_dang_nhap`, `ten_dang_nhap`, `mat_khau`, `ho_ten`, `ngay_sinh`, `email`, `so_dien_thoai`, `loai_tai_khoan`) VALUES
(1, 'admin', 'admin', 'admin', '2020-11-04', 'admin@gmail.com', 123456789, 'AD'),
(3, 'GV', 'admin', 'admin', '2020-11-04', 'admin@gmail.com', 123456789, 'GV'),
(4, 'asd', '1022202160', 'asd', '2020-12-02', 'asd', 0, 'HV');

-- --------------------------------------------------------

--
-- Table structure for table `lop_hoc`
--

CREATE TABLE `lop_hoc` (
  `id_lop_hoc` int(11) NOT NULL,
  `ten_dang_nhap` text NOT NULL,
  `ten_lop_hoc` text NOT NULL,
  `mon_hoc` text NOT NULL,
  `hinh_anh_dai_dien` varchar(100) NOT NULL,
  `ma_lop_hoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lop_hoc`
--

INSERT INTO `lop_hoc` (`id_lop_hoc`, `ten_dang_nhap`, `ten_lop_hoc`, `mon_hoc`, `hinh_anh_dai_dien`, `ma_lop_hoc`) VALUES
(1, 'admin', 'Hệ thống', 'IT002', 'hinhanhdaidien/JSON (2).png', 1783920080),
(2, 'GV', 'asd', 'asd', 'hinhanhdaidien/true (3).png', 988441982),
(3, 'admin', 'asdasd', 'asdsa', 'hinhanhdaidien/c4af878f-e9d5-411b-ae6d-211bcdef21f3_200x200 (1).png', 594628069);

-- --------------------------------------------------------

--
-- Table structure for table `nop_bai_tap`
--

CREATE TABLE `nop_bai_tap` (
  `id_nop_bai_tap` int(11) NOT NULL,
  `ten_dang_nhap` text NOT NULL,
  `id_bai_tap` int(11) NOT NULL,
  `file_nop_bai_tap` varchar(100) NOT NULL,
  `ngay_nop` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nop_bai_tap`
--

INSERT INTO `nop_bai_tap` (`id_nop_bai_tap`, `ten_dang_nhap`, `id_bai_tap`, `file_nop_bai_tap`, `ngay_nop`) VALUES
(5, 'admin', 5, '../filenopbaitap/true (2).png', '2020-12-01 09:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `thanh_vien`
--

CREATE TABLE `thanh_vien` (
  `id_thanh_vien` int(11) NOT NULL,
  `id_lop_hoc` int(11) NOT NULL,
  `ten_dang_nhap` text NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thanh_vien`
--

INSERT INTO `thanh_vien` (`id_thanh_vien`, `id_lop_hoc`, `ten_dang_nhap`, `trang_thai`) VALUES
(2, 1, 'asd', 1),
(3, 2, 'asd', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bai_tap`
--
ALTER TABLE `bai_tap`
  ADD PRIMARY KEY (`id_bai_tap`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `dang_nhap`
--
ALTER TABLE `dang_nhap`
  ADD PRIMARY KEY (`id_dang_nhap`),
  ADD UNIQUE KEY `.'l;` (`ten_dang_nhap`);

--
-- Indexes for table `lop_hoc`
--
ALTER TABLE `lop_hoc`
  ADD PRIMARY KEY (`id_lop_hoc`),
  ADD UNIQUE KEY `ma_lop_hoc` (`ma_lop_hoc`);

--
-- Indexes for table `nop_bai_tap`
--
ALTER TABLE `nop_bai_tap`
  ADD PRIMARY KEY (`id_nop_bai_tap`);

--
-- Indexes for table `thanh_vien`
--
ALTER TABLE `thanh_vien`
  ADD PRIMARY KEY (`id_thanh_vien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bai_tap`
--
ALTER TABLE `bai_tap`
  MODIFY `id_bai_tap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `dang_nhap`
--
ALTER TABLE `dang_nhap`
  MODIFY `id_dang_nhap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lop_hoc`
--
ALTER TABLE `lop_hoc`
  MODIFY `id_lop_hoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nop_bai_tap`
--
ALTER TABLE `nop_bai_tap`
  MODIFY `id_nop_bai_tap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `thanh_vien`
--
ALTER TABLE `thanh_vien`
  MODIFY `id_thanh_vien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
