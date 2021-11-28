-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tiendita
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id_Cliente` int NOT NULL AUTO_INCREMENT,
  `nombre_Cliente` varchar(255) NOT NULL,
  `apPaterno_Cliente` varchar(255) NOT NULL,
  `apMaterno_Cliente` varchar(255) NOT NULL,
  `ciudad_Cliente` varchar(255) NOT NULL,
  `calle_Cliente` varchar(255) NOT NULL,
  `noCalle_Cliente` int NOT NULL,
  `cPostal_Cliente` int NOT NULL,
  `tarjeta_Cliente` int NOT NULL,
  `colonia_Cliente` varchar(255) NOT NULL,
  `gusto_Cliente` varchar(255) NOT NULL,
  `password_Cliente` varchar(255) NOT NULL,
  `email_Cliente` varchar(45) NOT NULL,
  `telefono_Cliente` int NOT NULL,
  `fechaNacimiento_Cliente` varchar(45) NOT NULL,
  PRIMARY KEY (`id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Victor Luna','Delgado','Luna','Aguascalientes','Santa Rosa',128,20250,123456789,'La huerta','Simulación','$2y$10$R/j59U38Iyh8XoLXiBY1T.mUfRtBBJcNHDN/9PQXuTSq17ZZIcw3K','',0,'');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuentas` (
  `id_Cuenta` int NOT NULL AUTO_INCREMENT,
  `nombre_Cuenta` varchar(255) NOT NULL,
  `password_Cuenta` varchar(255) NOT NULL,
  `email_Cuenta` varchar(45) NOT NULL,
  PRIMARY KEY (`id_Cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
INSERT INTO `cuentas` VALUES (1,'GranZenote','$2y$10$df1DLzOKm4MSDDr06V4nne9CBxaFzuCssdoQR/2CppwwO8UdqaagW',''),(2,'admin','$2y$10$Xe67GxAuX.4yvGxgZodsbOmbWxTzo2158RJErI7m/tnM3HEZh9.nK',''),(3,'admin','$2y$10$MHmDvRByHj7VZjy/RIhdPObHjLtwQgnq8cPRnXbfbNpztmcFdqmhq',''),(4,'VictorAdmin','$2y$10$APJMNmUMQ3zBiOp9hOouOuqxQAZPKl4mIbpl8OArgzEuvmkBzLCHW',''),(5,'admin5','$2y$10$qrCJwPVmRLZ0dFkI8ij5GOpKGCLNElSbJ2OjmaPyLGZjIAmZhpclm',''),(6,'admin7','$2y$10$CL3wJ0inwxRi8pOU2Rcd6uQNS9ZOA/foP5E1a.C/d2V07IANcnrk6',''),(7,'admin10','$2y$10$a1H4gQbnAAzyqLC.q4T6yO7QgprFiNJ./J4Mp/iPp7db2Lv7hFdvy','casillas.vdl@gmail.com');
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagen`
--

DROP TABLE IF EXISTS `imagen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagen` (
  `id_Imagen` int NOT NULL AUTO_INCREMENT,
  `url_Imagen` varchar(255) NOT NULL,
  `id_Producto` int NOT NULL,
  PRIMARY KEY (`id_Imagen`),
  KEY `id_Producto` (`id_Producto`),
  CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`id_Producto`) REFERENCES `producto` (`id_Producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagen`
--

LOCK TABLES `imagen` WRITE;
/*!40000 ALTER TABLE `imagen` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `id_Producto` int NOT NULL AUTO_INCREMENT,
  `nombre_Producto` varchar(255) NOT NULL,
  `descripcion_Producto` varchar(1500) NOT NULL,
  `stock_Producto` int NOT NULL,
  `precioUnitario_Producto` float NOT NULL,
  `imagen_Producto` varchar(255) NOT NULL,
  `estrellas_Producto` int NOT NULL,
  `categoria_Producto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_Producto`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'Halo Reach Xbox 360','Halo: Reach es un videojuego de disparos en primera persona. Los jugadores asumen el papel de Noble 6, un supersoldado en combate contra un grupo alienígena conocida como el Covenant. El sistema de juego es más parecido al original de Halo 1 Combat Evolved que los juegos posteriores de la serie. El personaje del jugador está equipado con un escudo de energía que absorbe los daños causados por armas de fuego y los impactos. Cuando el protector de la energía se agota, el personaje pierde la salud, cuando la salud del personaje llega a cero, el juego vuelve a cargar desde el último punto de control. La salud se repone con el uso de paquetes de salud esparcidos por los niveles de Reach. En Halo 3, los jugadores tenían la opción de tomar y desplegar artículos con habilidades especiales, llamados «Potenciadores» de un solo uso y que además tenían un tiempo limitado dándole al jugador ventajas ofensivas o defensivas. 7​8​ Este sistema de potenciadores se sustituye en Halo: Reach por las habilidades de armadura reutilizables y persistentes que se mantienen con un jugador hasta que sean sustituidos, los cuales requieren un tiempo de recarga. Otra de las cosas que se ha removido del juego es la habilidad de portar dos armas a la vez, en este caso, una en cada mano.9​ Además de ajustes y cambios en las armas existentes de la serie Halo, Reach cuenta con nuevas armas de diversas funciones de combate.',1,299,'haloreachxbox360.jpg',4,'Acción'),(2,'Grand Theft Auto V PS4','Grand Theft Auto V, comúnmente abreviado como GTA V, es la decimoquinta entrega de la saga Grand Theft Auto que fue lanzado el 17 de septiembre de 2013. Su juego predecesor es Grand Theft Auto: The Ballad of Gay Tony, lanzado para las mismas plataformas. Es la segunda entrega de la saga para consolas de \"última generación\", con mejoras gráficas muy notables, un mundo Sandbox más grande y realista, motor físico anteriormente utilizado para GTA IV. Superó en una semana y media los mil millones de dólares acumulados, también nombrado el juego del año en primer lugar.',0,899,'gtavps4.jpg',5,'Rol'),(3,'Minecraft Xbox One Edition','Minecraft para Xbox One es una versión del éxito de Mojang para la consola de nueva generación de Microsoft. Permite a los usuarios crear objetos con piezas, conseguir recursos y construir sus propios mundos.\r\nTambién conocido como Minecraft.',25,657,'minecraftxboxone.jpg',4,'Aventura'),(4,'FIFA 22 PS4','FIFA 22 es un videojuego de fútbol desarrollado por EA Vancouver y EA Romania, siendo publicado por EA Sports. Está disponible para PlayStation 4, PlayStation 5, Xbox Series X/S, Xbox One, Microsoft Windows, Google Stadia y Nintendo Switch. Es la vigésimo novena entrega en la serie FIFA y fue lanzado el 1 de octubre de manera global.\r\n\r\nEl primer tráiler del juego fue presentado el día 11 de julio de 20214​ y muestra la nueva tecnología Hypermotion, que según palabras de EA brindará nueva experiencia más realista. Estas innovaciones están disponibles únicamente para PlayStation 5, Xbox Series y Stadia.\r\n\r\nKylian Mbappé será el rostro de la portada por segunda vez consecutiva.',32,1200,'fifa22ps4.jpg',3,'Deportes'),(5,'Gears 5 Xbox One','Gears 5 es la séptima entrega de la saga Gears of War. Es un videojuego de género shooter en tercera persona, desarrollado por The Coalition y publicado por Microsoft Studios. Se estrenó el 10 de septiembre de 2019 para Xbox One y Windows 10 y el 10 de noviembre de 2020 para Xbox Series X y Series S. Fue anunciado oficialmente durante la conferencia de prensa de Xbox en la E3 de 2018.',26,999,'gears5xboxone.jpg',4,'Acción'),(6,'Far Cry 6 PS5','Far Cry 6 es un videojuego de acción first person shooter a cargo de Ubisoft Toronto y Ubisoft para PC, PlayStation 4, Xbox One, PlayStation 5, Xbox Series y Stadia. ... Far Cry 6 lanza a los jugadores al mundo cargado de adrenalina de una revolución guerrillera actual.',36,1299,'farcry6ps5.jpg',3,'Acción'),(7,'Godfall PS5','Domina las cinco clases de armas, cada una con estilos de juego únicos y una variedad de espadas largas, armas de asta, martillos de guerra, espadas grandes y espadas dobles. Sube de nivel, aprende nuevas habilidades y descubre armas legendarias con efectos devastadores en el campo de batalla. Desbloquea 12 placas de valor: trajes de armadura divinos, inspirados en el zodíaco que te permiten destruir a todos los enemigos entre tú y Macros. Pon a prueba tus habilidades en la torre de pruebas y desafíate a ti mismo contra los enemigos más duros y gana botines de primer nivel. Lucha solo o junto a amigos con el juego cooperativo en línea pve para tres jugadores',16,713,'godfallps5.jpg',2,'Aventura'),(8,'Tony Hawk Pro Skater 1+2 PS5','Tony Hawk\'s Pro Skater 1+2 es un remake de los dos juegos que sirvieron de inicio a esta saga de deportes extremos, y que recupera de manera casi intacta su esencia, a la vez que la amplía y le da un importante lavado de cara.',231,1599,'tonyhawkproskater12ps5.jpg',5,'Deportes'),(9,'Returnal PS5','Descubrirás que así como el planeta cambia con cada ciclo, también lo hacen los elementos a tu disposición. Cada bucle ofrece nuevas combinaciones, lo que te obliga a superar tus límites y a realizar cada vez un una estrategia diferente para el combate.',25,1103,'returnalps5.jpg',3,'Aventura'),(10,'Mario Kart 8 Deluxe Nintendo Switch','Los populares circuitos y personajes de la versión de Wii U están de vuelta, junto a los circuitos y personajes descargables, y además se unen a la parrilla personajes nuevos: Inkling chico e Inkling chica, de Splatoon; el Rey Boo; Huesitos y Bowsy el modo batalla se renueva por completo con la batalla de globos y el Bob-ombardeo.',13,1059,'mariokart8ns.jpg',5,'Aventura'),(11,'Super Smash Bros Ultimate','Nuevos luchadores, como Inkling de la serie Splatoon y Ridley de la serie Metroid, hacen su debut en la serie Super Smash Bros. Combates rápidos, nuevos elementos, nuevos ataques, nuevas opciones defensivas y más mantendrán la batalla en rabia, ya sea que estés en casa o en movimiento',28,999,'smashbrosns.jpg',5,'Acción'),(12,'Super Mario 3D World + Bowser’s Fury','El gato se salió de la caja ¡Super Mario 3D World + Bowser’s Fury llega a la consola Nintendo Switch! ¡Lánzate y escala a través de una gran cantidad de coloridos niveles!\r\nMario (y sus amigos) podrán utilizar mejoras como la supercampana, la cual te concede habilidades similares a las de un gato, como la habilidad de escalar o de rasguñar Trabaja en equipo de forma local o en línea con hasta tres jugadores para alcanzar la meta y ver quién obtiene una mejor puntuación. El juego Super Mario 3D World + Bowser’s Fury contiene la misma gran jugabilidad cooperativa, creativos niveles y mejoras del juego original, y mucho más',53,999,'supermario3dworldns.jpg',5,'Aventura'),(13,'Deathloop PS5','DEATHLOOP es un disparador de primera generación de Arkane Lyon, el galardonado estudio detrás de Dishonored En el mundo de la muerte, dos asesinos rivales están atrapados en un misterioso timeloop en la isla de Blackreef, condenados a repetir el mismo día para la eternidad Aprende de cada ciclo: prueba nuevos caminos, recoge intelectuales, encuentra nuevas armas y habilidades, y haz lo que sea necesario para romper el bucle',5,1200,'deathloopps5.jpg',4,'Aventura'),(14,'Elden Ring PS5','ELDEN RING es una aventura fantástica de acción y RPG ambientada en un mundo creado por Hidetaka Miyazaki, creador de la influyente serie de videojuegos DARK SOULS. y George RR Martin, autor de la canción de fantasía más vendida del New York Times, A Song of Ice and Fire HIDETAKA MIYAZAKI: Presidente y Director de Juego de FromSoftware Inc. Conocido por dirigir juegos aclamados por la crítica en franquicias queridas que incluyen Armored Core y Dark Souls GEORGE RR MARTIN: el # 1 El best seller de The New York Times de muchas novelas, entre ellas la aclamada serie A Song of Ice and Fire: A Game of Thrones, A Clash of Kings, A Storm of Swords, A Feast For Crows y A Bailar con dragones El peligro y el descubrimiento acechan en cada esquina del juego más grande de FromSoftware hasta la fecha',52,999,'eldenringps5.jpg',3,'Aventura'),(15,'Horizon II: Forbidden West PS5','Embárcate en una aventura cautivadora con una mecánica de compañero única y combate apasionante Encuentra a los Rots: Espíritus tímidos e ilusorios dispersos por el bosque Construye tu equipo: Encuentra y recoge Rot para obtener poderosas habilidades, hacer descubrimientos y transformar el entorno Explora: Un pueblo olvidado y una extraña maldición; recurre al poder del Reino de los Espíritus Combate rápido: Los espíritus se han corrompido, atrapado y no pueden seguir adelante, desafiando a Kena en cada momento',10,1199,'horizoniips5.jpg',4,'Rol'),(16,'Kena. Bridge of Spirits PS5','Embárcate en una aventura cautivadora con una mecánica de compañero única y combate apasionante Encuentra a los Rots: Espíritus tímidos e ilusorios dispersos por el bosque Construye tu equipo: Encuentra y recoge Rot para obtener poderosas habilidades, hacer descubrimientos y transformar el entorno Explora: Un pueblo olvidado y una extraña maldición; recurre al poder del Reino de los Espíritus Combate rápido: Los espíritus se han corrompido, atrapado y no pueden seguir adelante, desafiando a Kena en cada momento',44,599,'kenaps5.jpg',3,'Aventura'),(17,'Gran Turismo 7 - 25th Anniversary Edition','Gran Turismo 7 se basa en 25 años de experiencia para ofrecerte las mejores características de la historia de la franquicia. Ya sea que seas un corredor competitivo o casual, un coleccionista, diseñador o fotógrafo, encuentre tu camino con una asombrosa colección de modos de juego que incluyen los favoritos de los fanáticos como GT Campaign, Arcade y Driving School. Con la reintroducción del legendario modo de simulación GT, compra, afina, vende y compite tu camino a través de una gratificante campaña en solitario mientras desbloqueas nuevos autos y desafíos. Y si te encanta enfrentarte cara a cara con los demás, perfecciona tus habilidades y compite en el modo GT Sport. Con más de 420 autos disponibles en Brand Central y el concesionario de autos usados desde el primer día, Gran Turismo 7 recrea la apariencia de los motores clásicos y los superdeportivos de última generación con un detalle incomparable. Cada automóvil se maneja de manera diferente y se siente único mientras navega en más de 90 pistas en condiciones climáticas dinámicas, incluidos los recorridos clásicos de la historia de GT.',12,1199,'granturismo7ps5.jpg',5,'Deportes'),(18,'Call of Duty: Vanguard PS5','Regresa la galardona saga Call of Duty con Call of Duty: Vanguard, donde los jugadores experimentarán batallas memorables de la Segunda Guerra Mundial mientras forjan la victoria en los frentes oriental y occidental de Europa, el Pacífico y el norte de África. MULTIJUGADOR Crea y consolida tu legado mientras la experiencia multijugador característica de Call of Duty lanza un ataque en todos los frentes. Sé testigo de las Fuerzas es conforme los jugadores entran a nuevos lugares con armamentos auténticos de la Segunda Guerra Mundial. ZOMBIS Los jugadores también pondrán a prueba su fortaleza conforme intentan sobrevivir a la implacable horda de no muertos en una nueva y escalofriante experiencia de Zombis desarrollada por Treyarch Studios. WARZONE Call of Duty: Vanguardtambién marcará el comienzo de una nueva integración sin igual de Call of Duty: Warzone tras el lanzamiento.',13,1099,'callofdutyvanguardps5.jpg',4,'Acción'),(19,'Metroid Dread Nintendo Switch','Las aventuras intergalácticas regresan con un estallido en Ratchet & Clank: Rift Apart. Arsenal alucinante Un malvado emperador robótico está decidido a conquistar mundos interdimensionales, y tiene la mira puesta en la dimensión de Ratchet y Clank. Tendrás que desempolvar el arsenal alucinante de esta pareja dinámica y poner fin a la amenaza de un colapso dimensional. Ábrete paso con un nuevo arsenal de armas explosivas, como la Pistola de ráfaga, el Rociador botánico y la Protogranada. Surca paisajes urbanos, entra en combate a toda velocidad y atraviesa dimensaiones con nuevos artilugios que desafían a la física. Nuevas caras Únete al equipo doble supremo con un elenco de aliados familiares y nuevas caras, como una luchadora de la resistencia Lombax nueva que tiene la misma determinación de eliminar al azote robótico. Juega como Ratchet y como la nueva Lombax misteriosa de otra dimensión. Descubre las nuevas mecánicas interdimensionales de Clank.',25,1099,'metroiddeadns.jpg',4,'Aventura'),(20,'Ratchet & Clank: Rift Apart PS5','Las aventuras intergalácticas regresan con un estallido en Ratchet & Clank: Rift Apart. Arsenal alucinante Un malvado emperador robótico está decidido a conquistar mundos interdimensionales, y tiene la mira puesta en la dimensión de Ratchet y Clank. Tendrás que desempolvar el arsenal alucinante de esta pareja dinámica y poner fin a la amenaza de un colapso dimensional. Ábrete paso con un nuevo arsenal de armas explosivas, como la Pistola de ráfaga, el Rociador botánico y la Protogranada. Surca paisajes urbanos, entra en combate a toda velocidad y atraviesa dimensaiones con nuevos artilugios que desafían a la física. Nuevas caras Únete al equipo doble supremo con un elenco de aliados familiares y nuevas caras, como una luchadora de la resistencia Lombax nueva que tiene la misma determinación de eliminar al azote robótico. Juega como Ratchet y como la nueva Lombax misteriosa de otra dimensión. Descubre las nuevas mecánicas interdimensionales de Clank.',12,1099,'ratchetclankps5.jpg',4,'Aventura'),(21,'Grand Theft Auto: The Trilogy PS4','Incorpora una amplia diversidad de mejoras en los controles para adaptarlos al estilo moderno de Grand Theft Auto V, como reajustes en la puntería y la fijación de objetivos, así como un importante número de adiciones gráficas como un sistema de iluminación totalmente rediseñado\nMejoras en las sombras, el clima y los reflejos; retoques en los personajes y los vehículos; y una mayor resolución de texturas en edificios, armas, carreteras, interiores y demás\nRockstar Games a los jugadores a conocer, o volver a descubrir, tres de sus lanzamientos más importantes, aclamados por el público y la crítica especializada por su capacidad para ofrecer una libertad y una inmersión sin precedentes en tres mundos vivos llenos de acción y diversión\nPresentan una rica trama cinemática, personajes clásicos y música inolvidable',52,799,'gtatrilogyps4.jpg',3,'Acción'),(22,'Demon\'s Souls PS5','Paquete completo: todos los DLC, imágenes remasterizadas, nuevos comentarios de los desarrolladores Ahora en PlayStation: una gran audiencia nueva que ha estado demandando a Alan Wake durante años Calidad comprobada: un clásico de culto muy querido con una puntuación de 83 Metacritic y más de 5 millones de copias vendidas hasta la fecha',22,1199,'demonssoulsps5.jpg',5,'Rol'),(23,'Alan Wake Remastered PS5','Paquete completo: todos los DLC, imágenes remasterizadas, nuevos comentarios de los desarrolladores Ahora en PlayStation: una gran audiencia nueva que ha estado demandando a Alan Wake durante años Calidad comprobada: un clásico de culto muy querido con una puntuación de 83 Metacritic y más de 5 millones de copias vendidas hasta la fecha',21,999,'alanwakeps5.jpg',5,'Aventura'),(24,'Scarlet Nexus PS5','AMPLIO MUNDO ABIERTO: participa en la vida de una ciudad envuelta en una nueva era oscura. Descubre diferentes caminos y pasajes ocultos mientras exploras sus múltiples niveles y ubicaciones. COMBATE CREATIVO Y BRUTAL: Aprovecha tus habilidades de parkour para inclinar la balanza incluso del encuentro más brutal. El pensamiento inteligente, las trampas y las armas creativas serán tus mejores amigos CICLO DE DÍA Y NOCHE - Espera a que la noche se aventure en los oscuros escondites de los Infectados. La luz del sol los mantiene a raya, pero una vez que se va, los monstruos comienzan la caza, dejando sus guaridas libres para explorar.',22,799,'scarletnexusps5.jpg',2,'Acción'),(25,'Dying Light 2 PS5','AMPLIO MUNDO ABIERTO: participa en la vida de una ciudad envuelta en una nueva era oscura. Descubre diferentes caminos y pasajes ocultos mientras exploras sus múltiples niveles y ubicaciones. COMBATE CREATIVO Y BRUTAL: Aprovecha tus habilidades de parkour para inclinar la balanza incluso del encuentro más brutal. El pensamiento inteligente, las trampas y las armas creativas serán tus mejores amigos CICLO DE DÍA Y NOCHE - Espera a que la noche se aventure en los oscuros escondites de los Infectados. La luz del sol los mantiene a raya, pero una vez que se va, los monstruos comienzan la caza, dejando sus guaridas libres para explorar.',39,1099,'dyingligthps5.jpg',4,'Aventura'),(26,'The Dark Pictures. House of Ashes PS5','Clasificación del juego: Pendiente Más detalles oficiales del lanzamiento por confirmarse. Producto Oficial Nintendo',12,899,'darkpicturesps5.jpg',3,'Aventura'),(27,'The Legend of Zelda: Breath of the Wild Sequel Nintendo Switch','Clasificación del juego: Pendiente Más detalles oficiales del lanzamiento por confirmarse. Producto Oficial Nintendo',0,1299,'zeldasequelns.jpg',5,'Aventura'),(28,'Red Dead Redemption 2 PS4','Desarrollado por Rockstar Games, los creadores de exitosos juegos com Grand Theft Auto 5 Este juego monta las bases para una nueva experiencia multijugador online Extraordinaria atmósfera y ambientación te atraparán mientras te abres camino a base de robos y peleas para sobrevivir. Epopeya de vaqueros o western',16,999,'reddead2ps4.jpg',5,'Aventura'),(29,'Red Dead Redemption 2 Xbox One','Desarrollado por Rockstar Games, los creadores de exitosos juegos com Grand Theft Auto 5 Este juego monta las bases para una nueva experiencia multijugador online Extraordinaria atmósfera y ambientación te atraparán mientras te abres camino a base de robos y peleas para sobrevivir. Epopeya de vaqueros o western',10,999,'reddead2xboxone.jpg',5,'Aventura'),(30,'Spider-Man GOTY PS4','Una auténtica aventura de Spider-Man. Sony Interactive Entertainment, Insomniac Games y Marvel se han unido para crear una auténtica aventura de Spider-Man. Este no es el Hombre Araña que conocías o que habías visto antes. Este es un experimentado Peter Parker quien es extraordinario en la lucha contra el crimen en la Nueva York de Marvel. Quien, al mismo tiempo, está luchando por equilibrar su caótica vida personal y su carrera mientras el destino de millones de neoyorquinos descansa sobre sus hombros. En la Game of the Year Edition encontrarás el juego completo, así como un cupón para todo el Marvel’s Spider-Man: The City That Never Sleeps DLC, que incluye 3 capítulos con misiones adicionales, trajes y personajes. Capítulos que cuentan su propia y espectacular historia post juego.',11,999,'spidermanps4.jpg',5,'Aventura'),(31,'Marvel\'s Guardians of the Galaxy PS5','LIDERA A LOS GUARDIANES DE LA GALAXIA Encarnarás a Star-Lord, así que nada está fuera de los límites en tu estilo de combate osado: blásters elementales, patadas voladoras propulsadas por tus botas jet o palizas en equipo. Lucha con los Guardianes y da órdenes para abrumar a tus rivales con ataques es. Además, tus acciones tienen consecuencias, leves o totalmente inesperadas, a medida que avanzas en la aventura. UNA NUEVA HISTORIA Tu banda recién formada de inadaptados legendarios tendrá que salvar al universo en esta novedosa pero fiel entrega de Guardianes de la Galaxia. Al parecer, desatas una serie de eventos catastróficos que te propulsarán a una aventura por fantásticos mundos habitados por personajes de Marvel icónicos y originales. Ponte unos temas de los 80 y que empiece la diversión.',54,1299,'guardianesgalaxiaps5.jpg',4,'Acción'),(32,'Marvel\'s Guardians of the Galaxy Xbox Series X','LIDERA A LOS GUARDIANES DE LA GALAXIA Encarnarás a Star-Lord, así que nada está fuera de los límites en tu estilo de combate osado: blásters elementales, patadas voladoras propulsadas por tus botas jet o palizas en equipo. Lucha con los Guardianes y da órdenes para abrumar a tus rivales con ataques es. Además, tus acciones tienen consecuencias, leves o totalmente inesperadas, a medida que avanzas en la aventura. UNA NUEVA HISTORIA Tu banda recién formada de inadaptados legendarios tendrá que salvar al universo en esta novedosa pero fiel entrega de Guardianes de la Galaxia. Al parecer, desatas una serie de eventos catastróficos que te propulsarán a una aventura por fantásticos mundos habitados por personajes de Marvel icónicos y originales. Ponte unos temas de los 80 y que empiece la diversión.',12,1299,'guardianesgalaxiaseriesx.jpg',4,'Acción'),(33,'Marvel\'s Guardians of the Galaxy PS4','LIDERA A LOS GUARDIANES DE LA GALAXIA Encarnarás a Star-Lord, así que nada está fuera de los límites en tu estilo de combate osado: blásters elementales, patadas voladoras propulsadas por tus botas jet o palizas en equipo. Lucha con los Guardianes y da órdenes para abrumar a tus rivales con ataques es. Además, tus acciones tienen consecuencias, leves o totalmente inesperadas, a medida que avanzas en la aventura. UNA NUEVA HISTORIA Tu banda recién formada de inadaptados legendarios tendrá que salvar al universo en esta novedosa pero fiel entrega de Guardianes de la Galaxia. Al parecer, desatas una serie de eventos catastróficos que te propulsarán a una aventura por fantásticos mundos habitados por personajes de Marvel icónicos y originales. Ponte unos temas de los 80 y que empiece la diversión.',22,1299,'guardianesgalaxiaps4.jpg',22,'Acción'),(34,'Ghost of Tsushima Director\'s Cut PS5','Clasificación del juego: C Adultos +18 Años Ghost of Tsushima DIRECTOR’S CUT incluye: Juego Completo. Expansión Isla Iki. Modo en línea cooperativo Leyendas. Minilibro de arte digital. Comentarios del director. Conjunto de diseños Héroe de Tsushima. Resolución 4K dinámica hasta 60 fps: experimenta Ghost of Tsushima como nunca antes con nuevas opciones de resolución 4K y frame rates mejorados (requiere un televisor o pantalla 4K compatible). Carga rápida: aprovecha los tiempos de carga casi instantáneos con el SSD de ultra alta velocidad de la consola PlayStation5. Sincronización de labios en japonés: disfruta de una experiencia más auténtica con la sincronización de labios para voz en japonés, que es posible gracias a la capacidad de la consola PS5 para reproducir cinemáticas en tiempo real.',31,1299,'ghostoftsushimaps5.jpg',5,'Aventura'),(35,'Sackboy. A Big Adventure PS5','Clasificación del juego: A Todo Público UNA ARRIESGADA EXPERIENCIA DE PLATAFORMAS Explora aquí, allá y en todas partes mientras utilizas el fantástico y variado conjunto de movimientos de Sackboy para enfrentarte a una gran variedad de emocionantes desafíos, feroces enemigos e increíbles sorpresas. RELLENO. RE-COSIDO, RE-SELLADO. Sackboy regresa a lo grande, repleto de nuevos movimientos y dispositivos que cambian el juego en una asombrosa aventura en 3D y extremadamente divertida en este nuevo pero familiar mundo',32,1100,'sackboyps5.jpg',4,'Aventura'),(36,'Back 4 Blood PS5','Campaña Cooperativa de Historia – Combate a través de una campaña de historia cooperativa para cuatro jugadores y trabajen juntos para sobrevivir misiones cada vez más retadoras. Trabaja en equipo en línea con opción de entrar y salir en el modo cooperativo para combatir la amenaza creciente de los Ridden o jugar la campaña en solitario con tres compañeros con IA. Multijugador Competitivo – Juega con o contra amigos en un PvP en línea que tiene soporte para hasta ocho jugadores. Alterna entre jugar como Cleaner o como los horrendos Ridden. Personajes y Armas Personalizables – Elige de entre ocho Cleaners personalizables, un alto rango de armas letales y un set diverso de artículos para derrotar mejor a un enemigo que se adapta.',45,999,'back4blood.jpg',3,'Aventura'),(37,'Back 4 Blood PS4','Campaña Cooperativa de Historia – Combate a través de una campaña de historia cooperativa para cuatro jugadores y trabajen juntos para sobrevivir misiones cada vez más retadoras. Trabaja en equipo en línea con opción de entrar y salir en el modo cooperativo para combatir la amenaza creciente de los Ridden o jugar la campaña en solitario con tres compañeros con IA. Multijugador Competitivo – Juega con o contra amigos en un PvP en línea que tiene soporte para hasta ocho jugadores. Alterna entre jugar como Cleaner o como los horrendos Ridden. Personajes y Armas Personalizables – Elige de entre ocho Cleaners personalizables, un alto rango de armas letales y un set diverso de artículos para derrotar mejor a un enemigo que se adapta.',15,999,'back4bloodps4.jpg',3,'Aventura'),(38,'Back 4 Blood Xbox Series X','Campaña Cooperativa de Historia – Combate a través de una campaña de historia cooperativa para cuatro jugadores y trabajen juntos para sobrevivir misiones cada vez más retadoras. Trabaja en equipo en línea con opción de entrar y salir en el modo cooperativo para combatir la amenaza creciente de los Ridden o jugar la campaña en solitario con tres compañeros con IA. Multijugador Competitivo – Juega con o contra amigos en un PvP en línea que tiene soporte para hasta ocho jugadores. Alterna entre jugar como Cleaner o como los horrendos Ridden. Personajes y Armas Personalizables – Elige de entre ocho Cleaners personalizables, un alto rango de armas letales y un set diverso de artículos para derrotar mejor a un enemigo que se adapta.',23,1299,'back4bloodseriesx.jpg',3,'Aventura'),(39,'Grand Theft Auto: The Trilogy Xbox One','Incorpora una amplia diversidad de mejoras en los controles para adaptarlos al estilo moderno de Grand Theft Auto V, como reajustes en la puntería y la fijación de objetivos, así como un importante número de adiciones gráficas como un sistema de iluminación totalmente rediseñado\r\nMejoras en las sombras, el clima y los reflejos; retoques en los personajes y los vehículos; y una mayor resolución de texturas en edificios, armas, carreteras, interiores y demás\r\nRockstar Games a los jugadores a conocer, o volver a descubrir, tres de sus lanzamientos más importantes, aclamados por el público y la crítica especializada por su capacidad para ofrecer una libertad y una inmersión sin precedentes en tres mundos vivos llenos de acción y diversión\r\nPresentan una rica trama cinemática, personajes clásicos y música inolvidable',52,799,'gtatrilogyxboxone.jpg',3,'Acción'),(40,'Grand Theft Auto: The Trilogy Nintendo Switch','Incorpora una amplia diversidad de mejoras en los controles para adaptarlos al estilo moderno de Grand Theft Auto V, como reajustes en la puntería y la fijación de objetivos, así como un importante número de adiciones gráficas como un sistema de iluminación totalmente rediseñado\r\nMejoras en las sombras, el clima y los reflejos; retoques en los personajes y los vehículos; y una mayor resolución de texturas en edificios, armas, carreteras, interiores y demás\r\nRockstar Games a los jugadores a conocer, o volver a descubrir, tres de sus lanzamientos más importantes, aclamados por el público y la crítica especializada por su capacidad para ofrecer una libertad y una inmersión sin precedentes en tres mundos vivos llenos de acción y diversión\r\nPresentan una rica trama cinemática, personajes clásicos y música inolvidable',52,799,'gtatrilogyns.jpg',3,'Acción'),(41,'Elden Ring PS4','ELDEN RING es una aventura fantástica de acción y RPG ambientada en un mundo creado por Hidetaka Miyazaki, creador de la influyente serie de videojuegos DARK SOULS. y George RR Martin, autor de la canción de fantasía más vendida del New York Times, A Song of Ice and Fire HIDETAKA MIYAZAKI: Presidente y Director de Juego de FromSoftware Inc. Conocido por dirigir juegos aclamados por la crítica en franquicias queridas que incluyen Armored Core y Dark Souls GEORGE RR MARTIN: el # 1 El best seller de The New York Times de muchas novelas, entre ellas la aclamada serie A Song of Ice and Fire: A Game of Thrones, A Clash of Kings, A Storm of Swords, A Feast For Crows y A Bailar con dragones El peligro y el descubrimiento acechan en cada esquina del juego más grande de FromSoftware hasta la fecha',52,999,'eldenringps4.jpg',3,'Aventura'),(42,'Warhammer. Chaosbane Xbox Series X','EL PRIMER RPG DE ACCIÓN ambientado en el mundo de Warhammer Fantasy Battles\r\n6 CLASES DE PERSONAJES, cada una con un juego, habilidades y equipo únicos\r\nUN BESTIARIO XXL con más de 70 monstruos alineados con los dioses del Caos y batallas épicas contra jefes\r\nOPTIMIZADO PARA COOPERATIVO: solo o con hasta 4 jugadores, local o en línea, purga el Caos del mundo\r\nLA ÚLTIMA VERSIÓN DEL JUEGO: desbloquea todos los DLC con esta edición para disfrutar de una experiencia de juego mejorada y una capacidad de reproducción ilimitada.',32,999,'warhammerseriesx.jpg',4,'Rol'),(43,'Warhammer. Chaosbane PS5','EL PRIMER RPG DE ACCIÓN ambientado en el mundo de Warhammer Fantasy Battles\r\n6 CLASES DE PERSONAJES, cada una con un juego, habilidades y equipo únicos\r\nUN BESTIARIO XXL con más de 70 monstruos alineados con los dioses del Caos y batallas épicas contra jefes\r\nOPTIMIZADO PARA COOPERATIVO: solo o con hasta 4 jugadores, local o en línea, purga el Caos del mundo\r\nLA ÚLTIMA VERSIÓN DEL JUEGO: desbloquea todos los DLC con esta edición para disfrutar de una experiencia de juego mejorada y una capacidad de reproducción ilimitada.',32,999,'warhammerps5.jpg',4,'Rol'),(44,'Call Of Duty Black Ops: Cold War Xbox Series X','Incluye la versión para Xbox One y Xbox Series X desde el día de su lanzamiento\r\nComo operador de élite, perseguirás a una misteriosa figura, Perseus, cuya misión es desestabilizar el equilibrio de poder mundial y cambiar el curso de la historia. Adéntrate en esta conspiración global junto con los legendarios Woods, Mason y Hudson, así como con nuevos operadores dispuestos a detener una conspiración que lleva décadas urdiéndose.\r\nAdemás de la Campaña, los jugadores llevarán un arsenal de armas y equipamiento de la Guerra Fría a la siguiente generación de los modos Multijugador y Zombis.\r\nLos jugadores de Xbox Series X y Series S pueden esperar soporte de 120Hz para una latencia de entrada reducida y una experiencia de juego más fluida, y ray tracing basado en hardware.',14,1199,'blackopscoldwarseriesx.jpg',4,'Acción'),(45,'Assassins Creed Valhalla Xbox Series X','Versión Limited Edition (Day 1): Compra antes del lanzamiento para acceder anticipadamente a la misión adicional The Way of the Berserker.\r\nLidera épicos saqueos vikingos contra las tropas y fortalezas sajonas.\r\nEmpuña dos poderosas armas y revive el visceral estilo de pelea de los vikingos.\r\nDesafíate a ti mismo con la mayor variedad de mortales enemigos jamás antes vista en Assassin\'s Creed.\r\nDa forma al crecimiento de tu personaje con cada decisión y labra tu camino hacia la gloria.\r\nExplora un mundo abierto de la edad oscura, desde las costas de Noruega hasta los reinos ingleses.',25,1111,'valhallaseriesx.jpg',4,'Aventura'),(46,'Control Ultimate Edition','Control Ultimate Edition incluye el juego principal y todas las expansiones lanzadas (\"La Fundación\" y \"SMA\") en un único pack a un gran precio.\r\n\r\nImportante: esta versión del juego es exclusiva de Xbox Series X|S. No incluye la versión de Xbox One de Control Ultimate Edition.\r\n\r\nDisfruta de una auténtica experiencia de juego de última generación con mayor fidelidad visual gracias a los gráficos 4K y un modo de alto rendimiento a 60 fps.',19,1232,'controlseriesx.jpg',3,'Rol'),(47,'Observer. System Redux  Xbox Series X','Observer System Redux es una videojuego de aventuras y suspense que, ubicado en el año 2084, nos presentado un oscuro mundo de estética cyberpunk en el que el jugador ha de convertirse en un detective neuronal y piratear las mentes de los demás.\r\nObserver System Redux está desarrollado por Blooper Team, conocidos por el primer Observer, Layers of Fear y Blair Witch.',5,999,'observerseriesx.jpg',2,'Rol'),(48,'Observer. System Redux PS4','Observer System Redux es una videojuego de aventuras y suspense que, ubicado en el año 2084, nos presentado un oscuro mundo de estética cyberpunk en el que el jugador ha de convertirse en un detective neuronal y piratear las mentes de los demás.\r\nObserver System Redux está desarrollado por Blooper Team, conocidos por el primer Observer, Layers of Fear y Blair Witch.',5,999,'observersps4jpg',2,'Rol'),(49,'Werewolf: The Apocalypse Xbox Series X','Una experiencia única llena de combates salvajes y aventuras místicas, inspirada en el famoso juego de rol.\r\nEres Cahal, un poderoso Garou que eligió exiliarse tras perder el control de su ira destructiva. Puedes transformarte en un lobo y en un Crinos, una enorme bestia feroz.\r\nDebes dominar los poderes de tus tres formas, como humano, lobo y Crinos, para castigar a quienes deshonran a Gaia, la Madre Tierra. Pero tu peor enemigo eres tú mismo: si no contienes tu ira, puede destruirte una vez más…\r\nCada forma tiene sus ventajas: el lobo puede moverse sigilosamente sin ser detectado; Cahal, al ser humano, puede interactuar con otras personas; y el Hombre Lobo puede desatar su ira para despedazar a los enemigos. Esta ira es tu mayor fortaleza, pero también tu debilidad…',25,599,'werewolfseriesx.jpg',2,'Rol'),(50,'Judgment Xbox Series X','Judgment (antes conocido como Project Judge) es una aventura de acción para PS4 desarrollada por los autores de la saga Yakuza, donde encarnamos al detective privado Takayuki Yagami (interpretado por Takuya Kimura), siguiendo un caso de asesino en serie en la ciudad de Tokio.\r\nReforzando el posicionamiento del juego como thriller judicial y representando la sensación de convertirse en un detective, los jugadores de Project Judge tendrán que utilizar habilidades clave de investigación para desvelar las verdades ocultas de la trama central del videojuego.',47,599,'judgmentseriesx.jpg',2,'Rol'),(51,'The Falconeer Xbox Series X','The Falconeer es un videojuego que te lleva al mundo de The Great Ursee, en el que se esconden dioses y ancestros olvidados por una civilización antigua como la propia existencia.\r\nVolarás por intrincados escenarios en los que deberás enfrentarte a distintas amenazas aéreas y marinas, que buscarán darte caza para acabar con tu misión por Ursee.\r\nBusca secretos y descifra sus parajes para disfrutar de una aventura única y exclusiva para PC.',12,799,'falconeerseriesx.jpg',4,'Aventura'),(52,'Gears Tactics Xbox Series X','Historia inmersiva y basada en personajes\r\n\r\nJuega como el desafiante soldado Gabe Díaz, rescatando y construyendo tus tropas en un viaje de liderazgo, supervivencia y sacrificio.\r\n\r\nEscuadrón y equipamiento personalizables\r\n\r\nPrepara tus tropas para enfrentar a enemigos duros mejorando sus habilidades y equipándolos con el botín recolectado en misiones desafiantes.\r\n\r\nJuego agresivo\r\n\r\nDirige a tu escuadrón en batallas rápidas por turnos, avanzando y sobreviviendo a encuentros intensos y viscerales con el imparable enemigo.\r\n\r\nBatallas masivas de jefes\r\n\r\nDerrota los jefes mortales que desafían tus estrategias y cambia por completo la escala de la batalla.\r\n\r\n ',45,899,'gearstacticsseriesx.jpg',3,'Estrategia'),(53,'Hades Xbox Series X','Hades es un videojuego de los autores de Bastion y Transistor. Se trata de una aventura de acción roguelite ambientada en la mitología griega. En el papel de Zagreo tendrás que escapar del Inframundo luchando contra los monstruos del averno comandados por el dios de la muerte.\r\nCon una narrativa bien trabajada, Hades hace uso de un sistema de combate al más puro estilo hack and slash en perspectiva isométrica.\r\nEn este videojuego de Supergiant podemos hacer uso de habilidades especiales propias de los dioses del Olimpo llamadas bendiciones a la vez que disfrutamos de un cuidadísimo apartado artístico con diseños a mano en escenarios y personajes.',95,299,'hadesseriesx.jpg',3,'Rol'),(54,'Maneater Xbox Series X','Historia única: juega a a través de una campaña narrativa y basada en historias narrada por Chris Parnell (Saturday Night Live, 30 Rock, Rick y Morty) y se coloca contra el telón de fondo de un programa de televisión real\r\nCombate diverso e convincente: combate la fauna salvaje feroz incluyendo otros depredadores de ápice o lucha contra varios tipos de cazadores humanos – que van desde los drunks de la ciudad, hasta la Guardia Costera\r\nConviértete en una leyenda: alimenta a los seres humanos y la fauna silvestre para cultivar tu tiburón, y encuentra el botín de tiburón para evolucionar a tu tiburón en múltiples caminos posibles\r\nExplora 7 grandes regiones, incluyendo bayous de la costa del golfo, playas de resorts, muelles industriales, océano abierto, y más, experimenta un mundo de vida con un ciclo completo de día/noche',25,699,'meneaterseriesx.jpg',4,'Estrategia');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resena`
--

DROP TABLE IF EXISTS `resena`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resena` (
  `id_Resena` int NOT NULL AUTO_INCREMENT,
  `descripcion_Resena` varchar(555) NOT NULL,
  `calificacion_Resena` int NOT NULL,
  `id_Producto` int NOT NULL,
  `id_Cliente` int NOT NULL,
  PRIMARY KEY (`id_Resena`),
  KEY `id_Producto` (`id_Producto`),
  KEY `id_Cliente` (`id_Cliente`),
  CONSTRAINT `resena_ibfk_1` FOREIGN KEY (`id_Producto`) REFERENCES `producto` (`id_Producto`),
  CONSTRAINT `resena_ibfk_2` FOREIGN KEY (`id_Cliente`) REFERENCES `cliente` (`id_Cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resena`
--

LOCK TABLES `resena` WRITE;
/*!40000 ALTER TABLE `resena` DISABLE KEYS */;
INSERT INTO `resena` VALUES (1,'fef',4,8,1);
/*!40000 ALTER TABLE `resena` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venta` (
  `id_Venta` int NOT NULL AUTO_INCREMENT,
  `id_Cliente` int NOT NULL,
  `fecha_Venta` date NOT NULL,
  PRIMARY KEY (`id_Venta`),
  KEY `id_Cliente` (`id_Cliente`),
  CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_Cliente`) REFERENCES `cliente` (`id_Cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta_producto`
--

DROP TABLE IF EXISTS `venta_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venta_producto` (
  `id_Venta` int NOT NULL,
  `id_Producto` int NOT NULL,
  KEY `id_Venta` (`id_Venta`),
  KEY `id_Producto` (`id_Producto`),
  CONSTRAINT `venta_producto_ibfk_1` FOREIGN KEY (`id_Venta`) REFERENCES `venta` (`id_Venta`),
  CONSTRAINT `venta_producto_ibfk_2` FOREIGN KEY (`id_Producto`) REFERENCES `producto` (`id_Producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta_producto`
--

LOCK TABLES `venta_producto` WRITE;
/*!40000 ALTER TABLE `venta_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta_producto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-27 22:08:06
