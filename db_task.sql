-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2022 at 04:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_to_do`
--

CREATE TABLE `tb_to_do` (
  `id` int(10) NOT NULL,
  `name_td` varchar(255) NOT NULL,
  `details_td` text NOT NULL,
  `subject_td` varchar(255) NOT NULL,
  `priority_td` varchar(255) NOT NULL,
  `deadline_td` date NOT NULL,
  `status_td` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_to_do`
--

INSERT INTO `tb_to_do` (`id`, `name_td`, `details_td`, `subject_td`, `priority_td`, `deadline_td`, `status_td`) VALUES
(1, 'ERD', 'Bikin ERD', 'Basis Data', 'High', '2022-03-28', 'Sudah'),
(6, 'TMD', 'Beresin TMD', 'Struktur Data', 'High', '2022-04-30', 'Belum'),
(9, 'TP4', 'Kerjain TP4', 'DPBO', 'High', '2022-03-28', 'Belum'),
(16, 'LATIHAN7DPBO2022', 'Kerjain beb', 'DPBO', 'High', '2022-04-04', 'Belum'),
(17, 'UTS', 'UTS SAY', 'Struktur Data', 'Low', '2022-04-05', 'Sudah'),
(18, 'UTS DPW', 'kerjain utsnya say', 'Other', 'Medium', '2022-04-06', 'Belum'),
(19, 'bikin db_vtuber', 'bikin db_vtuber isinya tentang vtuber', 'Basis Data', 'Low', '2022-04-30', 'Belum'),
(20, 'UTS LORDDD', 'ya lord berikan ketabahan bagi hambamu ini', 'Other', 'Medium', '2022-04-14', 'Belum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_to_do`
--
ALTER TABLE `tb_to_do`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_to_do`
--
ALTER TABLE `tb_to_do`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
