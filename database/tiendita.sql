-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 01:54 AM
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
  `gusto_Cliente` varchar(255) NOT NULL,
  `password_Cliente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id_Cliente`, `nombre_Cliente`, `apPaterno_Cliente`, `apMaterno_Cliente`, `ciudad_Cliente`, `calle_Cliente`, `noCalle_Cliente`, `cPostal_Cliente`, `tarjeta_Cliente`, `colonia_Cliente`, `gusto_Cliente`, `password_Cliente`) VALUES
(1, 'Victor Luna', 'Delgado', 'Luna', 'Aguascalientes', 'Santa Rosa', 128, 20250, 123456789, 'La huerta', 'Simulación', '$2y$10$R/j59U38Iyh8XoLXiBY1T.mUfRtBBJcNHDN/9PQXuTSq17ZZIcw3K');

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
  `descripcion_Producto` varchar(1500) NOT NULL,
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
(1, 'Halo Reach Xbox 360', 'Halo: Reach es un videojuego de disparos en primera persona. Los jugadores asumen el papel de Noble 6, un supersoldado en combate contra un grupo alienígena conocida como el Covenant. El sistema de juego es más parecido al original de Halo 1 Combat Evolved que los juegos posteriores de la serie. El personaje del jugador está equipado con un escudo de energía que absorbe los daños causados por armas de fuego y los impactos. Cuando el protector de la energía se agota, el personaje pierde la salud, cuando la salud del personaje llega a cero, el juego vuelve a cargar desde el último punto de control. La salud se repone con el uso de paquetes de salud esparcidos por los niveles de Reach. En Halo 3, los jugadores tenían la opción de tomar y desplegar artículos con habilidades especiales, llamados «Potenciadores» de un solo uso y que además tenían un tiempo limitado dándole al jugador ventajas ofensivas o defensivas. 7​8​ Este sistema de potenciadores se sustituye en Halo: Reach por las habilidades de armadura reutilizables y persistentes que se mantienen con un jugador hasta que sean sustituidos, los cuales requieren un tiempo de recarga. Otra de las cosas que se ha removido del juego es la habilidad de portar dos armas a la vez, en este caso, una en cada mano.9​ Además de ajustes y cambios en las armas existentes de la serie Halo, Reach cuenta con nuevas armas de diversas funciones de combate.', 2, 299, 'haloreachxbox360.jpg', 4, 'Acción'),
(2, 'Grand Theft Auto V PS4', 'Grand Theft Auto V, comúnmente abreviado como GTA V, es la decimoquinta entrega de la saga Grand Theft Auto que fue lanzado el 17 de septiembre de 2013. Su juego predecesor es Grand Theft Auto: The Ballad of Gay Tony, lanzado para las mismas plataformas. Es la segunda entrega de la saga para consolas de \"última generación\", con mejoras gráficas muy notables, un mundo Sandbox más grande y realista, motor físico anteriormente utilizado para GTA IV. Superó en una semana y media los mil millones de dólares acumulados, también nombrado el juego del año en primer lugar.', 6, 899, 'gtavps4.jpg', 5, 'Rol'),
(3, 'Minecraft Xbox One Edition', 'Minecraft para Xbox One es una versión del éxito de Mojang para la consola de nueva generación de Microsoft. Permite a los usuarios crear objetos con piezas, conseguir recursos y construir sus propios mundos.\r\nTambién conocido como Minecraft.', 25, 657, 'minecraftxboxone.jpg', 4, 'Aventura'),
(4, 'FIFA 22 PS4', 'FIFA 22 es un videojuego de fútbol desarrollado por EA Vancouver y EA Romania, siendo publicado por EA Sports. Está disponible para PlayStation 4, PlayStation 5, Xbox Series X/S, Xbox One, Microsoft Windows, Google Stadia y Nintendo Switch. Es la vigésimo novena entrega en la serie FIFA y fue lanzado el 1 de octubre de manera global.\r\n\r\nEl primer tráiler del juego fue presentado el día 11 de julio de 20214​ y muestra la nueva tecnología Hypermotion, que según palabras de EA brindará nueva experiencia más realista. Estas innovaciones están disponibles únicamente para PlayStation 5, Xbox Series y Stadia.\r\n\r\nKylian Mbappé será el rostro de la portada por segunda vez consecutiva.', 32, 1200, 'fifa22ps4.jpg', 3, 'Deportes'),
(5, 'Gears 5 Xbox One', 'Gears 5 es la séptima entrega de la saga Gears of War. Es un videojuego de género shooter en tercera persona, desarrollado por The Coalition y publicado por Microsoft Studios. Se estrenó el 10 de septiembre de 2019 para Xbox One y Windows 10 y el 10 de noviembre de 2020 para Xbox Series X y Series S. Fue anunciado oficialmente durante la conferencia de prensa de Xbox en la E3 de 2018.', 26, 999, 'gears5xboxone', 4, 'Acción'),
(6, 'Far Cry 6 PS5', 'Far Cry 6 es un videojuego de acción first person shooter a cargo de Ubisoft Toronto y Ubisoft para PC, PlayStation 4, Xbox One, PlayStation 5, Xbox Series y Stadia. ... Far Cry 6 lanza a los jugadores al mundo cargado de adrenalina de una revolución guerrillera actual.', 36, 1299, 'farcry6ps5', 3, 'Acción'),
(7, 'Godfall PS5', 'Domina las cinco clases de armas, cada una con estilos de juego únicos y una variedad de espadas largas, armas de asta, martillos de guerra, espadas grandes y espadas dobles. Sube de nivel, aprende nuevas habilidades y descubre armas legendarias con efectos devastadores en el campo de batalla. Desbloquea 12 placas de valor: trajes de armadura divinos, inspirados en el zodíaco que te permiten destruir a todos los enemigos entre tú y Macros. Pon a prueba tus habilidades en la torre de pruebas y desafíate a ti mismo contra los enemigos más duros y gana botines de primer nivel. Lucha solo o junto a amigos con el juego cooperativo en línea pve para tres jugadores', 16, 713, 'godfallps5', 2, 'Aventura'),
(8, 'Tony Hawk Pro Skater 1+2 PS5', 'Tony Hawk\'s Pro Skater 1+2 es un remake de los dos juegos que sirvieron de inicio a esta saga de deportes extremos, y que recupera de manera casi intacta su esencia, a la vez que la amplía y le da un importante lavado de cara.', 250, 1599, 'tonyhawkproskater12ps5.jpg', 5, 'Deportes'),
(9, 'Returnal PS5', 'Descubrirás que así como el planeta cambia con cada ciclo, también lo hacen los elementos a tu disposición. Cada bucle ofrece nuevas combinaciones, lo que te obliga a superar tus límites y a realizar cada vez un una estrategia diferente para el combate.', 25, 1103, 'returnalps5.jpg', 3, 'Aventura'),
(10, 'Mario Kart 8 Deluxe Nintendo Switch', 'Los populares circuitos y personajes de la versión de Wii U están de vuelta, junto a los circuitos y personajes descargables, y además se unen a la parrilla personajes nuevos: Inkling chico e Inkling chica, de Splatoon; el Rey Boo; Huesitos y Bowsy el modo batalla se renueva por completo con la batalla de globos y el Bob-ombardeo.', 15, 1059, 'mariokart8ns.jpg', 5, 'Aventura'),
(11, 'Super Smash Bros Ultimate', 'Nuevos luchadores, como Inkling de la serie Splatoon y Ridley de la serie Metroid, hacen su debut en la serie Super Smash Bros. Combates rápidos, nuevos elementos, nuevos ataques, nuevas opciones defensivas y más mantendrán la batalla en rabia, ya sea que estés en casa o en movimiento', 29, 999, 'smashbrosns.jpg', 5, 'Acción'),
(12, 'Super Mario 3D World + Bowser’s Fury', 'El gato se salió de la caja ¡Super Mario 3D World + Bowser’s Fury llega a la consola Nintendo Switch! ¡Lánzate y escala a través de una gran cantidad de coloridos niveles!\r\nMario (y sus amigos) podrán utilizar mejoras como la supercampana, la cual te concede habilidades similares a las de un gato, como la habilidad de escalar o de rasguñar Trabaja en equipo de forma local o en línea con hasta tres jugadores para alcanzar la meta y ver quién obtiene una mejor puntuación. El juego Super Mario 3D World + Bowser’s Fury contiene la misma gran jugabilidad cooperativa, creativos niveles y mejoras del juego original, y mucho más', 55, 999, 'supermario3dworldns.jpg', 5, 'Aventura');

-- --------------------------------------------------------

--
-- Table structure for table `resena`
--

CREATE TABLE `resena` (
  `id_Resena` int(11) NOT NULL,
  `descripcion_Resena` varchar(555) NOT NULL,
  `calificacion_Resena` int(11) NOT NULL,
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
  MODIFY `id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
