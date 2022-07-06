-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 05, 2022 at 01:14 PM
-- Server version: 8.0.29-0ubuntu0.22.04.2
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rol` int NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `usuario`, `password`, `rol`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '1234', 1, 1),
(2, 'Javier', 'javier@gmail.com', 'Javi', '1234', 2, 0),
(4, 'Javier Eduardo Aquino Vasquez', 'ecjvasquez@gmail.com', 'Javier222', '12345', 0, 0),
(5, 'Jennifer Calderón', 'Ecjavitd411@gmail.com', 'Jennifer', '1234', 0, 1),
(6, 'Eduardo', 'Eduardo@gmail.com', 'Edy', '1234', 2, 1),
(7, 'Jarol Saul Espaillat Cruz', 'ejarolsaul@gmail.com', 'sweetb720x', 'Espaillat123-', 1, 1),
(8, 'La patrulla policial', 'latuya@gmail.com', 'la tuya', '123', 0, 1),
(11, 'Lebro James', 'ljames@gmail.com', 'LeJames', 'kingjames', 0, 1),
(12, 'Stephen Curry', 'scurry@gmail.com', 'Curry30', 'curry1597', 0, 1),
(13, 'Alan Turing', 'aturing@gmail.com', 'turing', 'aturing3571', 0, 1),
(14, 'Jason viernes 13', 'jviernes13@gmail.com', 'viernes13', '852369', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
