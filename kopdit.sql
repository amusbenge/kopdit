-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2020 pada 14.08
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopdit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nm_admin` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `role_id` int(1) NOT NULL,
  `status` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nm_admin`, `email`, `image`, `role_id`, `status`, `password`, `is_active`, `date_created`) VALUES
(1, 'Yohanes Sason Selan', 'yohanesselan@gmail.com', 'ka-laras-maharani-copy.jpg', 2, 'Manager', '$2y$10$6qDcqlF.XHONP.JbBcrxcOqqQ6f5WlVEAYSPerLaWQfpuVj9k4DoC', 1, 1586347594),
(2, 'Agustinus Meo', 'agusmeo@gmail.com', 'default.jpg', 1, 'Admin', '$2y$10$7MI.yYq4yQHO/y.Yfaluc.c8bofsAZXd5GxyJ3AkVNPqt0enniTva', 1, 1586347594);

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_access_menu`
--

CREATE TABLE `admin_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(2) NOT NULL,
  `menu_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_access_menu`
--

INSERT INTO `admin_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(2, 1, 1),
(3, 1, 2),
(4, 1, 3),
(6, 2, 1),
(8, 2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(2) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `menu_id`, `menu`) VALUES
(1, 1, 'Admin'),
(2, 2, 'Data Master'),
(3, 3, 'Proses Profile Matching'),
(5, 4, 'Data Master');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_sub_menu`
--

CREATE TABLE `admin_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(2) NOT NULL,
  `title` varchar(25) NOT NULL,
  `url` varchar(20) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_sub_menu`
--

INSERT INTO `admin_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Profil', 'user', 'fas fa-fw fa-user', 1),
(2, 1, 'Ubat Profil', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(3, 1, 'Ubah Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(4, 4, 'Data Admin', 'admin', 'fas fa-fw fa-user-shield', 1),
(5, 4, 'Data Anggota', 'anggota', 'fas fa-fw fa-table', 1),
(6, 2, 'Data Anggota', 'anggota', 'fas fa-fw fa-table', 1),
(8, 3, 'Pengajuan Kredit', 'kredit', 'fas fa-fw fa-table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `no_agt` varchar(10) NOT NULL,
  `nm_agt` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tmpt_lahir` varchar(25) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `jns_kelamin` enum('Lelaki','Perempuan','','','') NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `rt_rw` varchar(10) NOT NULL,
  `kel_des` varchar(25) NOT NULL,
  `kec` varchar(25) NOT NULL,
  `kota_kab` varchar(25) NOT NULL,
  `prov` varchar(25) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL,
  `usaha` varchar(25) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `password` varchar(100) NOT NULL,
  `aktif` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `no_agt`, `nm_agt`, `nik`, `tmpt_lahir`, `tgl_lhr`, `agama`, `no_hp`, `email`, `foto`, `jns_kelamin`, `alamat`, `rt_rw`, `kel_des`, `kec`, `kota_kab`, `prov`, `kode_pos`, `pendidikan`, `pekerjaan`, `usaha`, `tgl_masuk`, `password`, `aktif`) VALUES
(7, '3', 'Reina Schroeder', '', '2013-12-10', '2013-03-10', '', '', '', '', '', 'Juanita Pine', '', '', '', '', '', 0, '', 'Group', '', '2007-09-08', '', 0),
(8, '4', 'Jeanette Christiansen', '', '1983-03-13', '1982-03-15', '', '', '', '', '', 'Beau Mills', '', '', '', '', '', 0, '', 'and Sons', '', '1994-01-24', '', 0),
(9, '3', 'Robin Krajcik', '', '2000-11-27', '1992-04-25', '', '', '', '', '', 'Rolfson Common', '', '', '', '', '', 0, '', 'PLC', '', '2010-10-13', '', 0),
(10, '7', 'Mrs. Sydnie Kulas Jr.', '', '1995-01-30', '1999-08-22', '', '', '', '', '', 'Carter Street', '', '', '', '', '', 0, '', 'PLC', '', '2007-02-02', '', 0),
(11, '3', 'Ms. Maiya Champlin', '', '2016-09-03', '2019-06-11', '', '', '', '', '', 'Novella Union', '', '', '', '', '', 0, '', 'PLC', '', '1983-12-05', '', 0),
(12, '6', 'Selmer Bogisich', '', '2006-02-27', '2005-04-29', '', '', '', '', '', 'Bernhard Pass', '', '', '', '', '', 0, '', 'PLC', '', '2004-11-27', '', 0),
(13, '5', 'Estella Mosciski', '', '1993-03-12', '2002-03-14', '', '', '', '', '', 'Nolan Camp', '', '', '', '', '', 0, '', 'LLC', '', '1993-09-28', '', 0),
(14, '9', 'Antonio Gulgowski V', '', '1972-01-28', '2011-02-20', '', '', '', '', '', 'Charlotte Grove', '', '', '', '', '', 0, '', 'Ltd', '', '1987-02-26', '', 0),
(15, '1', 'Norma Pfeffer', '', '1980-09-16', '2019-07-09', '', '', '', '', '', 'Pearline Road', '', '', '', '', '', 0, '', 'Inc', '', '1987-03-23', '', 0),
(16, '8', 'Jordane Vandervort DDS', '', '1993-05-13', '1976-12-26', '', '', '', '', '', 'Kreiger Cliff', '', '', '', '', '', 0, '', 'Group', '', '1977-07-17', '', 0),
(17, '3', 'Clint Flatley MD', '', '1989-08-13', '1976-09-05', '', '', '', '', '', 'Alia Extensions', '', '', '', '', '', 0, '', 'LLC', '', '2007-04-12', '', 0),
(18, '9', 'Mrs. Desiree Schumm', '', '1992-01-28', '2005-02-11', '', '', '', '', '', 'Kassulke Meadows', '', '', '', '', '', 0, '', 'LLC', '', '2006-07-28', '', 0),
(19, '3', 'Ashley Parisian', '', '1982-09-01', '2008-07-25', '', '', '', '', '', 'Winona Wall', '', '', '', '', '', 0, '', 'Ltd', '', '1988-09-30', '', 0),
(20, '3', 'Mr. Colt Steuber DVM', '', '2005-03-24', '1974-04-10', '', '', '', '', '', 'Vella Lakes', '', '', '', '', '', 0, '', 'Group', '', '1975-03-22', '', 0),
(21, '2', 'Ellie Nader', '', '1995-08-06', '1982-10-12', '', '', '', '', '', 'Verona Run', '', '', '', '', '', 0, '', 'Ltd', '', '2018-04-18', '', 0),
(22, '5', 'Madge Bogisich III', '', '1987-04-14', '1986-06-25', '', '', '', '', '', 'Madyson Extension', '', '', '', '', '', 0, '', 'Inc', '', '1990-12-15', '', 0),
(23, '2', 'Valentina Pouros', '', '1995-05-22', '2013-03-05', '', '', '', '', '', 'Isabella Loaf', '', '', '', '', '', 0, '', 'Group', '', '1997-07-07', '', 0),
(24, '6', 'Pearline Witting', '', '2020-06-27', '1984-04-01', '', '', '', '', '', 'Efrain Village', '', '', '', '', '', 0, '', 'Ltd', '', '2007-03-05', '', 0),
(25, '8', 'Noemy Feest', '', '2003-01-31', '2011-12-25', '', '', '', '', '', 'Damien Spring', '', '', '', '', '', 0, '', 'Ltd', '', '1973-05-23', '', 0),
(26, '9', 'Prof. Travis Kautzer Sr.', '', '2014-07-11', '2001-05-09', '', '', '', '', '', 'Meredith Garden', '', '', '', '', '', 0, '', 'Group', '', '1976-10-09', '', 0),
(27, '4', 'Adrienne Mante', '', '1986-11-30', '1970-09-24', '', '', '', '', '', 'Kylie Hollow', '', '', '', '', '', 0, '', 'PLC', '', '1998-02-22', '', 0),
(28, '', 'Prof. Gardner Koch IV', '', '1981-12-17', '1989-07-02', '', '', '', '', '', 'Cortez Branch', '', '', '', '', '', 0, '', 'PLC', '', '2013-10-15', '', 0),
(29, '6', 'Talia Hane', '', '1987-09-02', '1974-03-15', '', '', '', '', '', 'Zachary Point', '', '', '', '', '', 0, '', 'Inc', '', '1980-12-07', '', 0),
(30, '7', 'Derek Towne', '', '1986-02-01', '2007-05-12', '', '', '', '', '', 'Farrell Roads', '', '', '', '', '', 0, '', 'Ltd', '', '1971-05-05', '', 0),
(31, '7', 'Beatrice Kub', '', '1992-06-08', '1993-10-19', '', '', '', '', '', 'Ramona Grove', '', '', '', '', '', 0, '', 'Group', '', '1985-09-28', '', 0),
(32, '3', 'Reagan Kerluke', '', '2001-09-24', '1979-01-04', '', '', '', '', '', 'Jack Crest', '', '', '', '', '', 0, '', 'Ltd', '', '1986-12-11', '', 0),
(33, '4', 'Daryl Fay DDS', '', '1972-04-09', '1993-05-21', '', '', '', '', '', 'Emard Ville', '', '', '', '', '', 0, '', 'PLC', '', '1993-10-04', '', 0),
(34, '3', 'Dr. Trevion Monahan', '', '2000-12-01', '2007-10-27', '', '', '', '', '', 'Dietrich Divide', '', '', '', '', '', 0, '', 'and Sons', '', '1977-01-28', '', 0),
(35, '5', 'Savannah Schultz', '', '1995-01-05', '1970-08-21', '', '', '', '', '', 'Terry Street', '', '', '', '', '', 0, '', 'Group', '', '2020-03-30', '', 0),
(36, '', 'Ms. Claudie Morissette IV', '', '2009-09-28', '1993-03-18', '', '', '', '', '', 'Alfonzo Trace', '', '', '', '', '', 0, '', 'Inc', '', '2009-05-05', '', 0),
(37, '7', 'Dena Trantow', '', '1994-09-28', '2005-06-17', '', '', '', '', '', 'Adams Way', '', '', '', '', '', 0, '', 'Group', '', '1988-03-12', '', 0),
(38, '4', 'Alexanne Orn', '', '1993-05-19', '2009-12-09', '', '', '', '', '', 'Krajcik Dam', '', '', '', '', '', 0, '', 'Ltd', '', '1982-06-07', '', 0),
(39, '7', 'Nedra Jakubowski Sr.', '', '2002-05-18', '2011-11-26', '', '', '', '', '', 'Dusty Islands', '', '', '', '', '', 0, '', 'Ltd', '', '1975-03-31', '', 0),
(40, '3', 'Elta Gleichner', '', '1999-10-17', '2012-10-07', '', '', '', '', '', 'Nolan Plains', '', '', '', '', '', 0, '', 'Inc', '', '1974-12-29', '', 0),
(41, '1', 'Ezequiel Dooley', '', '1992-07-09', '1995-07-04', '', '', '', '', '', 'Beer Roads', '', '', '', '', '', 0, '', 'and Sons', '', '1982-06-20', '', 0),
(42, '2', 'Hailee Greenholt', '', '1987-03-06', '1987-08-20', '', '', '', '', '', 'Jaclyn Wall', '', '', '', '', '', 0, '', 'LLC', '', '1992-09-03', '', 0),
(43, '5', 'Garret Jenkins I', '', '1970-04-01', '1992-12-31', '', '', '', '', '', 'Kihn Gateway', '', '', '', '', '', 0, '', 'and Sons', '', '2008-11-06', '', 0),
(44, '4', 'Matilde Dicki', '', '2016-03-11', '1987-05-03', '', '', '', '', '', 'Thad Fort', '', '', '', '', '', 0, '', 'Group', '', '2012-12-10', '', 0),
(45, '8', 'Mr. Kennedy Pfeffer', '', '2018-07-26', '1983-09-18', '', '', '', '', '', 'O\'Hara Plaza', '', '', '', '', '', 0, '', 'Group', '', '2013-02-13', '', 0),
(46, '8', 'Dr. Logan Morar', '', '1989-04-29', '2011-12-24', '', '', '', '', '', 'Hartmann Curve', '', '', '', '', '', 0, '', 'and Sons', '', '1992-05-03', '', 0),
(47, '4', 'Marcelle Nitzsche', '', '1972-12-08', '2017-03-30', '', '', '', '', '', 'Blanda Harbor', '', '', '', '', '', 0, '', 'and Sons', '', '2017-11-18', '', 0),
(48, '8', 'Miss Carole Willms II', '', '1977-08-12', '1994-06-26', '', '', '', '', '', 'Gaylord Knolls', '', '', '', '', '', 0, '', 'Inc', '', '2000-10-23', '', 0),
(49, '7', 'Jerrell Kuhlman', '', '2010-04-01', '2009-05-14', '', '', '', '', '', 'Von Fords', '', '', '', '', '', 0, '', 'LLC', '', '1993-05-12', '', 0),
(50, '3', 'Ramiro Abernathy', '', '1975-01-28', '1993-04-19', '', '', '', '', '', 'Ned Mews', '', '', '', '', '', 0, '', 'and Sons', '', '1992-06-07', '', 0),
(51, '7', 'Dustin Denesik DVM', '', '1988-04-30', '1988-06-12', '', '', '', '', '', 'Littel Highway', '', '', '', '', '', 0, '', 'LLC', '', '1998-07-26', '', 0),
(52, '6', 'Cassie Jacobi', '', '1974-03-11', '2005-05-10', '', '', '', '', '', 'Hayes Neck', '', '', '', '', '', 0, '', 'Inc', '', '1977-10-07', '', 0),
(53, '2', 'Mr. Lucious Berge II', '', '1997-03-15', '2008-12-01', '', '', '', '', '', 'Gulgowski Turnpike', '', '', '', '', '', 0, '', 'Group', '', '1986-01-15', '', 0),
(54, '9', 'Lavern Leuschke', '', '1972-08-20', '2005-12-15', '', '', '', '', '', 'Adams Hollow', '', '', '', '', '', 0, '', 'Group', '', '2016-05-28', '', 0),
(55, '6', 'Prof. Gretchen Metz', '', '1978-11-28', '1994-08-03', '', '', '', '', '', 'Darron River', '', '', '', '', '', 0, '', 'LLC', '', '2011-07-14', '', 0),
(56, '', 'Maxie Gleason', '', '2006-11-28', '1984-01-12', '', '', '', '', '', 'Delphia Coves', '', '', '', '', '', 0, '', 'PLC', '', '1988-04-22', '', 0),
(57, '2', 'Myles Koelpin', '', '2020-05-14', '2016-05-28', '', '', '', '', '', 'Laurence Manors', '', '', '', '', '', 0, '', 'PLC', '', '2017-05-25', '', 0),
(58, '8', 'Rhoda Howell', '', '1993-10-18', '1970-03-02', '', '', '', '', '', 'Beaulah Shoal', '', '', '', '', '', 0, '', 'Inc', '', '2006-10-27', '', 0),
(59, '6', 'Claudie Volkman', '', '1987-02-17', '2011-03-27', '', '', '', '', '', 'Jackeline Run', '', '', '', '', '', 0, '', 'and Sons', '', '1985-03-08', '', 0),
(60, '7', 'Noel Kihn', '', '2008-03-08', '1981-07-18', '', '', '', '', '', 'Paige Ports', '', '', '', '', '', 0, '', 'LLC', '', '2000-08-24', '', 0),
(61, '6', 'Sidney Skiles', '', '2019-02-01', '2004-10-04', '', '', '', '', '', 'Drew Common', '', '', '', '', '', 0, '', 'and Sons', '', '2018-08-20', '', 0),
(62, '4', 'Alysha Bartoletti', '', '1984-10-23', '1995-10-13', '', '', '', '', '', 'Bryana Plain', '', '', '', '', '', 0, '', 'PLC', '', '1995-04-17', '', 0),
(63, '3', 'Jerome Schaefer', '', '2019-07-12', '1981-07-01', '', '', '', '', '', 'Donnelly View', '', '', '', '', '', 0, '', 'LLC', '', '1981-05-16', '', 0),
(64, '6', 'Kenya Tillman IV', '', '1993-10-20', '2003-03-22', '', '', '', '', '', 'Mohr Neck', '', '', '', '', '', 0, '', 'Inc', '', '2005-10-12', '', 0),
(65, '', 'Mr. Clifford Padberg DVM', '', '2015-12-26', '1978-06-15', '', '', '', '', '', 'Constantin Road', '', '', '', '', '', 0, '', 'Group', '', '2000-08-02', '', 0),
(66, '4', 'Dr. Susan Hintz', '', '1992-08-31', '1993-10-05', '', '', '', '', '', 'Elliott Glens', '', '', '', '', '', 0, '', 'Ltd', '', '1976-03-26', '', 0),
(67, '6', 'Prof. Mckenna Weber', '', '2006-01-20', '2007-01-12', '', '', '', '', '', 'Gaston Drive', '', '', '', '', '', 0, '', 'Group', '', '2018-06-17', '', 0),
(68, '5', 'Prof. Triston Oberbrunner III', '', '2012-02-12', '1972-07-21', '', '', '', '', '', 'Gerald Plaza', '', '', '', '', '', 0, '', 'Ltd', '', '1992-03-01', '', 0),
(69, '5', 'Eusebio Donnelly', '', '1991-11-05', '1988-06-25', '', '', '', '', '', 'Wuckert Mills', '', '', '', '', '', 0, '', 'Inc', '', '1977-08-21', '', 0),
(70, '1', 'Katrine Zboncak', '', '1982-01-29', '1995-07-30', '', '', '', '', '', 'Bogan Mills', '', '', '', '', '', 0, '', 'LLC', '', '1994-08-13', '', 0),
(71, '5', 'Ms. Marjory Hodkiewicz DDS', '', '2006-08-12', '1979-05-29', '', '', '', '', '', 'Labadie Port', '', '', '', '', '', 0, '', 'PLC', '', '1976-02-19', '', 0),
(72, '5', 'Allene Bernier', '', '1984-04-12', '1992-09-27', '', '', '', '', '', 'Ian Glen', '', '', '', '', '', 0, '', 'Ltd', '', '2011-10-27', '', 0),
(73, '8', 'Larue Buckridge', '', '1971-03-08', '1989-11-22', '', '', '', '', '', 'Toy Path', '', '', '', '', '', 0, '', 'Group', '', '1996-05-21', '', 0),
(74, '7', 'Ms. Fatima Cormier', '', '1972-07-13', '1985-01-22', '', '', '', '', '', 'Alejandrin Mills', '', '', '', '', '', 0, '', 'Ltd', '', '1993-07-29', '', 0),
(75, '5', 'Dr. Luella Macejkovic', '', '1994-11-21', '1987-02-18', '', '', '', '', '', 'Homenick Groves', '', '', '', '', '', 0, '', 'Inc', '', '1992-12-12', '', 0),
(76, '', 'Rudolph Rodriguez', '', '1986-10-15', '1984-04-03', '', '', '', '', '', 'Sierra Walk', '', '', '', '', '', 0, '', 'Group', '', '1995-04-25', '', 0),
(77, '9', 'Royal Wehner MD', '', '1996-12-19', '2017-07-13', '', '', '', '', '', 'Kimberly Falls', '', '', '', '', '', 0, '', 'Group', '', '2012-04-15', '', 0),
(78, '7', 'Luisa Mayert', '', '1971-10-14', '2009-02-20', '', '', '', '', '', 'Elliott Passage', '', '', '', '', '', 0, '', 'PLC', '', '1996-02-16', '', 0),
(79, '5', 'Prof. Marisa King III', '', '1987-12-21', '1994-11-04', '', '', '', '', '', 'Fay Pines', '', '', '', '', '', 0, '', 'Inc', '', '2001-12-22', '', 0),
(80, '', 'Prof. Tanya Erdman I', '', '2003-02-18', '2006-10-22', '', '', '', '', '', 'Kevon Wall', '', '', '', '', '', 0, '', 'LLC', '', '2000-11-20', '', 0),
(81, '2', 'Juwan Bartell', '', '1993-04-22', '1997-06-05', '', '', '', '', '', 'Bashirian Forges', '', '', '', '', '', 0, '', 'and Sons', '', '2020-03-21', '', 0),
(82, '9', 'Baron Quitzon', '', '2013-07-21', '2016-03-19', '', '', '', '', '', 'Schuppe Forks', '', '', '', '', '', 0, '', 'PLC', '', '1992-07-26', '', 0),
(83, '6', 'Kaya Considine', '', '2005-03-22', '1992-03-17', '', '', '', '', '', 'Madalyn Divide', '', '', '', '', '', 0, '', 'PLC', '', '2005-03-15', '', 0),
(84, '9', 'Dr. Rodrick Pacocha', '', '2006-06-26', '1979-08-31', '', '', '', '', '', 'Taya Square', '', '', '', '', '', 0, '', 'and Sons', '', '1993-11-14', '', 0),
(85, '3', 'Scot Mitchell', '', '1991-12-03', '1994-01-14', '', '', '', '', '', 'Treutel Forks', '', '', '', '', '', 0, '', 'Group', '', '2009-02-02', '', 0),
(86, '4', 'Addison Feest', '', '1979-11-01', '1978-08-04', '', '', '', '', '', 'Amaya Overpass', '', '', '', '', '', 0, '', 'and Sons', '', '2005-10-23', '', 0),
(87, '7', 'Miss Eva Beatty', '', '1990-03-31', '1973-08-08', '', '', '', '', '', 'Amir Stravenue', '', '', '', '', '', 0, '', 'Ltd', '', '2008-03-05', '', 0),
(88, '8', 'Margret Auer', '', '1997-02-05', '2006-12-05', '', '', '', '', '', 'Baumbach Rest', '', '', '', '', '', 0, '', 'PLC', '', '1973-12-23', '', 0),
(89, '8', 'Mr. Brett Davis DVM', '', '1987-11-04', '1980-07-11', '', '', '', '', '', 'Leilani Circle', '', '', '', '', '', 0, '', 'PLC', '', '1975-08-24', '', 0),
(90, '8', 'Prof. Miller Thompson', '', '2016-09-25', '2006-04-22', '', '', '', '', '', 'Lebsack Groves', '', '', '', '', '', 0, '', 'LLC', '', '1985-08-26', '', 0),
(91, '9', 'Dr. Buddy Schaefer', '', '2006-03-13', '2013-04-25', '', '', '', '', '', 'Mertz Dale', '', '', '', '', '', 0, '', 'Inc', '', '1973-01-28', '', 0),
(92, '6', 'Elza Williamson IV', '', '2016-08-21', '1982-02-25', '', '', '', '', '', 'Klein Trail', '', '', '', '', '', 0, '', 'LLC', '', '1985-10-28', '', 0),
(93, '1', 'Rickie Bergstrom', '', '1982-10-18', '1984-04-13', '', '', '', '', '', 'Shields Bypass', '', '', '', '', '', 0, '', 'and Sons', '', '1979-09-30', '', 0),
(94, '2', 'Lillian Lowe DVM', '', '2014-11-26', '2015-12-08', '', '', '', '', '', 'Kuphal Port', '', '', '', '', '', 0, '', 'PLC', '', '1985-11-05', '', 0),
(95, '1', 'Carlos Mohr', '', '2018-03-06', '2016-04-27', '', '', '', '', '', 'Casandra Avenue', '', '', '', '', '', 0, '', 'LLC', '', '1996-11-22', '', 0),
(96, '9', 'Flossie Wolff', '', '2003-04-20', '2004-09-06', '', '', '', '', '', 'Rolfson Ridge', '', '', '', '', '', 0, '', 'and Sons', '', '1974-03-17', '', 0),
(97, '2', 'Edison Yundt', '', '2005-07-03', '1979-05-04', '', '', '', '', '', 'Renner Spring', '', '', '', '', '', 0, '', 'and Sons', '', '2012-02-04', '', 0),
(98, '9', 'Seth Langworth', '', '1974-07-26', '1978-07-08', '', '', '', '', '', 'Shayne Crossing', '', '', '', '', '', 0, '', 'Inc', '', '1973-08-28', '', 0),
(99, '6', 'Justyn Turcotte I', '', '2009-10-11', '2004-01-13', '', '', '', '', '', 'Saige Groves', '', '', '', '', '', 0, '', 'Group', '', '1995-06-03', '', 0),
(100, '3', 'Dr. Bart Maggio MD', '', '2013-01-14', '1990-12-21', '', '', '', '', '', 'Koelpin Course', '', '', '', '', '', 0, '', 'Group', '', '1999-04-01', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(1) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(2, 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `admin_access_menu`
--
ALTER TABLE `admin_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin_sub_menu`
--
ALTER TABLE `admin_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`no_agt`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `admin_access_menu`
--
ALTER TABLE `admin_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `admin_sub_menu`
--
ALTER TABLE `admin_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`id`) REFERENCES `admin` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
