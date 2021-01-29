-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2017 at 04:27 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_antrian`
--

CREATE TABLE `client_antrian` (
  `id` int(11) NOT NULL,
  `client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_antrian`
--

INSERT INTO `client_antrian` (`id`, `client`) VALUES
(120, 1),
(121, 2);

-- --------------------------------------------------------

--
-- Table structure for table `data_antrian`
--

CREATE TABLE `data_antrian` (
  `id` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `waktu` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_antrian`
--

INSERT INTO `data_antrian` (`id`, `counter`, `waktu`, `status`) VALUES
(1, 1, '2017-11-08 15:46:26', 2),
(2, 1, '2017-11-08 15:46:48', 2),
(3, 2, '2017-11-08 15:47:01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`) VALUES
(1, 'Frans', '', 'frans', '123'),
(2, 'admin', '', 'admin', 'admin'),
(3, 'Ambarita', 'franscodes@gmail.com', 'batak', '123'),
(4, 'ssad', 'sdasd', 'asd', '123'),
(5, 'Hafidz', 'wandrifo@gmail.com', 'hafidz', '123'),
(6, 'Miyan Yesica', 'miyan yesica', 'miyan', '123'),
(7, 'Indah Siska', 'indah@gmail.com', 'indah', 'indah'),
(8, 'cindy', 'cindy', 'cindy', '123'),
(9, 'Frans Ambarita', 'frans@gmail.com', 'ambaritafrans', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_antrian`
--
ALTER TABLE `client_antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_antrian`
--
ALTER TABLE `data_antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_antrian`
--
ALTER TABLE `client_antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `data_antrian`
--
ALTER TABLE `data_antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
