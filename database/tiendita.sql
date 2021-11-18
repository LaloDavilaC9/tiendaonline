-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 04:59 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiendita`
--

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id_Cliente` int(11) NOT NULL,
  `nombre_Cliente` varchar(255) NOT NULL,
  `apPaterno_Cliente` varchar(255) NOT NULL,
  `apMaterno_Cliente` varchar(255) NOT NULL,
  `ciudad_Cliente` varchar(255) NOT NULL,
  `calle_Cliente` varchar(255) NOT NULL,
  `noCalle_Cliente` int(11) NOT NULL,
  `cPostal_Cliente` int(11) NOT NULL,
  `tarjeta_Cliente` int(11) NOT NULL,
  `colonia_Cliente` varchar(255) NOT NULL,
  `gusto_Cliente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cuentas`
--

CREATE TABLE `cuentas` (
  `id_Cuenta` int(11) NOT NULL,
  `nombre_Cuenta` varchar(255) NOT NULL,
  `password_Cuenta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `imagen`
--

CREATE TABLE `imagen` (
  `id_Imagen` int(11) NOT NULL,
  `url_Imagen` varchar(255) NOT NULL,
  `id_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id_Producto` int(11) NOT NULL,
  `nombre_Producto` varchar(255) NOT NULL,
  `descripcion_Producto` varchar(255) NOT NULL,
  `stock_Producto` int(11) NOT NULL,
  `precioUnitario_Producto` float NOT NULL,
  `imagen_Producto` varchar(255) NOT NULL,
  `estrellas_Producto` int(11) NOT NULL,
  `categoria_Producto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id_Producto`, `nombre_Producto`, `descripcion_Producto`, `stock_Producto`, `precioUnitario_Producto`, `imagen_Producto`, `estrellas_Producto`, `categoria_Producto`) VALUES
(1, 'Halo Reach', 'Juega Halo jejeje', 2, 1200, 'haloreach.jpg', 4, 'Acción'),
(2, 'GTA V', 'Juega a disparar y a atropellar gente', 6, 2500, 'gtav.jpg', 5, 'Rol');

-- --------------------------------------------------------

--
-- Table structure for table `resena`
--

CREATE TABLE `resena` (
  `id_Resena` int(11) NOT NULL,
  `descripcion_Resena` varchar(555) NOT NULL,
  `calificacion_Resena` int(5) NOT NULL,
  `id_Producto` int(11) NOT NULL,
  `id_Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

CREATE TABLE `venta` (
  `id_Venta` int(11) NOT NULL,
  `id_Cliente` int(11) NOT NULL,
  `fecha_Venta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `venta_producto`
--

CREATE TABLE `venta_producto` (
  `id_Venta` int(11) NOT NULL,
  `id_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_Cliente`);

--
-- Indexes for table `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id_Cuenta`);

--
-- Indexes for table `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_Imagen`),
  ADD KEY `id_Producto` (`id_Producto`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_Producto`);

--
-- Indexes for table `resena`
--
ALTER TABLE `resena`
  ADD PRIMARY KEY (`id_Resena`),
  ADD KEY `id_Producto` (`id_Producto`),
  ADD KEY `id_Cliente` (`id_Cliente`);

--
-- Indexes for table `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_Venta`),
  ADD KEY `id_Cliente` (`id_Cliente`);

--
-- Indexes for table `venta_producto`
--
ALTER TABLE `venta_producto`
  ADD KEY `id_Venta` (`id_Venta`),
  ADD KEY `id_Producto` (`id_Producto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_Cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id_Cuenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_Imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resena`
--
ALTER TABLE `resena`
  MODIFY `id_Resena` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `venta`
--
ALTER TABLE `venta`
  MODIFY `id_Venta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`id_Producto`) REFERENCES `producto` (`id_Producto`);

--
-- Constraints for table `resena`
--
ALTER TABLE `resena`
  ADD CONSTRAINT `resena_ibfk_1` FOREIGN KEY (`id_Producto`) REFERENCES `producto` (`id_Producto`),
  ADD CONSTRAINT `resena_ibfk_2` FOREIGN KEY (`id_Cliente`) REFERENCES `cliente` (`id_Cliente`);

--
-- Constraints for table `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_Cliente`) REFERENCES `cliente` (`id_Cliente`);

--
-- Constraints for table `venta_producto`
--
ALTER TABLE `venta_producto`
  ADD CONSTRAINT `venta_producto_ibfk_1` FOREIGN KEY (`id_Venta`) REFERENCES `venta` (`id_Venta`),
  ADD CONSTRAINT `venta_producto_ibfk_2` FOREIGN KEY (`id_Producto`) REFERENCES `producto` (`id_Producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
