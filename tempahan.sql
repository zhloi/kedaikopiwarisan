-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2025 at 01:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tempahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurujual`
--

CREATE TABLE `jurujual` (
  `idjurujual` varchar(3) NOT NULL,
  `katalaluan` varchar(8) DEFAULT NULL,
  `namajurujual` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurujual`
--

INSERT INTO `jurujual` (`idjurujual`, `katalaluan`, `namajurujual`) VALUES
('J01', 'abcd', 'Hazeeq'),
('J02', 'def', 'Loi'),
('J03', 'Ain7890', 'Ain'),
('J04', '987', 'Josh'),
('J05', '654', 'Tron'),
('J06', '321', 'Luke');

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `idmakanan` varchar(3) NOT NULL,
  `namamakanan` varchar(20) DEFAULT NULL,
  `gambar` varchar(20) DEFAULT NULL,
  `harga` double(6,2) DEFAULT NULL,
  `idjurujual` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`idmakanan`, `namamakanan`, `gambar`, `harga`, `idjurujual`) VALUES
('M01', 'Mee Goreng', 'M01.png', 5.00, 'J01'),
('M02', 'Kopi Ice', 'M02.png', 2.50, 'J02'),
('M03', 'Nasi Lemak', 'M03.png', 4.00, 'J01'),
('M04', 'Chilli Pan mee', 'M04.png', 7.50, 'J01'),
('M05', 'Murtabak Ayam', 'M05.png', 6.00, 'J02'),
('M06', 'Teh Tarikh', 'M06.png', 2.50, 'J02'),
('M07', 'Char Kway Teow', 'M07.png', 7.50, 'J02'),
('M08', 'Mee Bandung', 'M08.png', 7.50, 'J01');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idpelanggan` varchar(4) NOT NULL,
  `katalaluan` varchar(8) DEFAULT NULL,
  `namapelanggan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `katalaluan`, `namapelanggan`) VALUES
('P001', '1234', 'Yap'),
('P002', '456', 'Sheng Thong\r\n'),
('P003', '789', 'Naufal\r\n'),
('P004', '1234', 'John'),
('P005', '12312321', 'LOL');

-- --------------------------------------------------------

--
-- Table structure for table `tempahan`
--

CREATE TABLE `tempahan` (
  `idpelanggan` varchar(4) NOT NULL,
  `idmakanan` varchar(3) NOT NULL,
  `tarikh` date NOT NULL,
  `bilangan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tempahan`
--

INSERT INTO `tempahan` (`idpelanggan`, `idmakanan`, `tarikh`, `bilangan`) VALUES
('P001', 'M01', '0000-00-00', 3),
('P001', 'M02', '2025-07-06', 1),
('P001', 'M04', '2025-07-06', 1),
('P001', 'M06', '2025-07-06', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurujual`
--
ALTER TABLE `jurujual`
  ADD PRIMARY KEY (`idjurujual`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`idmakanan`),
  ADD KEY `idjurujual` (`idjurujual`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indexes for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD PRIMARY KEY (`idpelanggan`,`idmakanan`,`tarikh`),
  ADD KEY `idpelanggan` (`idpelanggan`),
  ADD KEY `idmakanan` (`idmakanan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `makanan`
--
ALTER TABLE `makanan`
  ADD CONSTRAINT `makanan_jurujual` FOREIGN KEY (`idjurujual`) REFERENCES `jurujual` (`idjurujual`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tempahan`
--
ALTER TABLE `tempahan`
  ADD CONSTRAINT `tempahan_makanan` FOREIGN KEY (`idmakanan`) REFERENCES `makanan` (`idmakanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tempahan_pelanggan` FOREIGN KEY (`idpelanggan`) REFERENCES `pelanggan` (`idpelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
