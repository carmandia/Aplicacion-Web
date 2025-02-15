-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2024 a las 09:28:55
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `Nombre` varchar(45) NOT NULL,
  `Pais` varchar(45) DEFAULT NULL,
  `Escala_UCI` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`Nombre`, `Pais`, `Escala_UCI`) VALUES
('Criterium du Dauphine', 'Francia', 'UCI.WR.C1.Stage'),
('Donostia San Sebastian Klasikoa', 'España', 'UCI.WR.C2'),
('Giro dItalia', 'Italia', 'UCI.WR.GT.B.Stage'),
('Il Lombardia', 'Italia', 'UCI.WR.Monument'),
('Itzulia Basque Country', 'España', 'UCI.WR.C2.Stage'),
('La Vuelta Ciclista a España', 'España', 'UCI.WR.GT.B.Stage'),
('Liege-Bastogne-Liege', 'Belgica', 'UCI.WR.Monument'),
('Milano-Sanremo', 'Italia', 'UCI.WR.Monument'),
('Paris-Niza', 'Francia', 'UCI.WR.C1.Stage'),
('Paris-Roubaix', 'Francia', 'UCI.WR.Monument'),
('Ronde van Vlaanderen-Tour des Flanders', 'Belgica', 'UCI.WR.Monument'),
('Strade Bianche', 'Italia', 'UCI.WR.C2'),
('Tirreno-Adriatico', 'Italia', 'UCI.WR.C1.Stage'),
('Tour de France', 'Francia', 'UCI.WR.GT.A.Stage'),
('Tour de Romandie', 'Suiza', 'UCI.WR.C1.Stage'),
('Tour de Suisse', 'Suiza', 'UCI.WR.C1.Stage'),
('Volta Ciclista a Catalunya', 'España', 'UCI.WR.C2.Stage');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera_de_un_dia`
--

CREATE TABLE `carrera_de_un_dia` (
  `Carrera_Nombre` varchar(45) NOT NULL,
  `Distancia_Recorrida` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `carrera_de_un_dia`
--

INSERT INTO `carrera_de_un_dia` (`Carrera_Nombre`, `Distancia_Recorrida`) VALUES
('Donostia San Sebastian Klasikoa', 233),
('Il Lombardia', 0),
('Liege-Bastogne-Liege', 258),
('Milano-Sanremo', 294),
('Paris-Roubaix', 257),
('Ronde van Vlaanderen-Tour des Flanders', 273),
('Strade Bianche', 184);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera_por_etapas`
--

CREATE TABLE `carrera_por_etapas` (
  `Carrera_Nombre` varchar(45) NOT NULL,
  `Distancia_total` int(11) DEFAULT NULL,
  `nº_etapas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `carrera_por_etapas`
--

INSERT INTO `carrera_por_etapas` (`Carrera_Nombre`, `Distancia_total`, `nº_etapas`) VALUES
('Criterium du Dauphine', 1212, 8),
('Giro dItalia', 3356, 21),
('Itzulia Basque Country', 1001, 6),
('La Vuelta Ciclista a España', 3157, 21),
('Paris-Niza', 1081, 8),
('Tirreno-Adriatico', 1169, 7),
('Tour de France', 3407, 21),
('Tour de Romandie', 693, 5),
('Tour de Suisse', 1046, 8),
('Volta Ciclista a Catalunya', 1186, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cod.postal`
--

CREATE TABLE `cod.postal` (
  `Codigo` int(11) NOT NULL,
  `Municipio_Nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cod.postal`
--

INSERT INTO `cod.postal` (`Codigo`, `Municipio_Nombre`) VALUES
(48290, 'Amorebieta'),
(8001, 'Barcelona'),
(8002, 'Barcelona'),
(6688, 'Bastoña'),
(8000, 'Brugge'),
(8200, 'Brugge'),
(63790, 'Chambon-sur-Lac'),
(7000, 'Chur'),
(63000, 'Clermont-Ferrand'),
(22100, 'Como'),
(47360, 'Cours'),
(1023, 'Crissier'),
(20002, 'Donostia-San Sebastian'),
(77920, 'Fontainebleau'),
(28440, 'Guadarrama'),
(4000, 'Lieja'),
(28001, 'Madrid'),
(28002, 'Madrid'),
(8301, 'Mataro'),
(40090, 'Mont-de-Marsan'),
(6000, 'Nice'),
(6300, 'Nice'),
(9636, 'Oudenaarde'),
(86786, 'Oudenaarde'),
(31001, 'Pamplona'),
(70123, 'Paris'),
(75000, 'Paris'),
(75003, 'Paris'),
(42, 'Roma'),
(100, 'Roma'),
(123, 'Roma'),
(59100, 'Roubaix'),
(84121, 'Salerno'),
(63074, 'San Benedetto del Tronto'),
(18038, 'Sanremo'),
(53100, 'Siena'),
(1950, 'Sion'),
(1700, 'Tafers'),
(15057, 'Tortona'),
(64018, 'Tortoreto'),
(47001, 'Valladolid'),
(24100, 'Vergamo'),
(1001, 'Vitoria-Gasteiz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corre`
--

CREATE TABLE `corre` (
  `Etapa_Carrera_nombre` varchar(45) NOT NULL,
  `Etapa_nº_etapa` int(11) NOT NULL,
  `Presentacion_Id` int(11) NOT NULL,
  `PosicionEtp` int(11) DEFAULT NULL,
  `PtosUCIposicionEtp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `corre`
--

INSERT INTO `corre` (`Etapa_Carrera_nombre`, `Etapa_nº_etapa`, `Presentacion_Id`, `PosicionEtp`, `PtosUCIposicionEtp`) VALUES
('Criterium du Dauphine', 1, 22, 25, 0),
('Criterium du Dauphine', 1, 36, 24, 0),
('Criterium du Dauphine', 1, 40, 1, 50),
('Criterium du Dauphine', 2, 22, 31, 0),
('Criterium du Dauphine', 2, 36, 21, 0),
('Criterium du Dauphine', 2, 40, 4, 13),
('Giro dItalia', 1, 7, 9, 8),
('Giro dItalia', 1, 15, 16, 0),
('Giro dItalia', 1, 44, 22, 0),
('Giro dItalia', 1, 50, 66, 0),
('Giro dItalia', 6, 7, 33, 0),
('Giro dItalia', 6, 15, 39, 0),
('Giro dItalia', 6, 44, 22, 0),
('Giro dItalia', 6, 50, 70, 0),
('Giro dItalia', 16, 7, 2, 50),
('Giro dItalia', 16, 15, 6, 15),
('Giro dItalia', 16, 44, 11, 5),
('Giro dItalia', 16, 50, 15, 1),
('Itzulia Basque Country', 3, 114, 5, 10),
('Itzulia Basque Country', 3, 126, 36, 0),
('Itzulia Basque Country', 3, 130, 10, 1),
('Itzulia Basque Country', 6, 114, 6, 7),
('Itzulia Basque Country', 6, 126, 16, 0),
('Itzulia Basque Country', 6, 130, 75, 0),
('La Vuelta Ciclista a España', 2, 33, 76, 0),
('La Vuelta Ciclista a España', 2, 43, 67, 0),
('La Vuelta Ciclista a España', 2, 77, 59, 0),
('La Vuelta Ciclista a España', 2, 82, 19, 0),
('La Vuelta Ciclista a España', 9, 33, 15, 1),
('La Vuelta Ciclista a España', 9, 43, 1, 80),
('La Vuelta Ciclista a España', 9, 77, 11, 5),
('La Vuelta Ciclista a España', 9, 82, 155, 0),
('La Vuelta Ciclista a España', 13, 33, 2, 50),
('La Vuelta Ciclista a España', 13, 43, 91, 0),
('La Vuelta Ciclista a España', 13, 77, 19, 0),
('La Vuelta Ciclista a España', 13, 82, 128, 0),
('Paris-Niza', 4, 55, 13, 0),
('Paris-Niza', 4, 112, 54, 0),
('Paris-Niza', 4, 113, 2, 30),
('Paris-Niza', 8, 55, 3, 18),
('Paris-Niza', 8, 112, 49, 0),
('Paris-Niza', 8, 113, 46, 0),
('Tirreno-Adriatico', 1, 9, 43, 0),
('Tirreno-Adriatico', 1, 32, 20, 0),
('Tirreno-Adriatico', 1, 71, 99, 0),
('Tirreno-Adriatico', 7, 9, 137, 0),
('Tirreno-Adriatico', 7, 32, 38, 0),
('Tirreno-Adriatico', 7, 71, 103, 0),
('Tour de France', 4, 21, 46, 0),
('Tour de France', 4, 24, 24, 0),
('Tour de France', 4, 34, 62, 0),
('Tour de France', 4, 35, 25, 0),
('Tour de France', 6, 21, 9, 14),
('Tour de France', 6, 24, 1, 100),
('Tour de France', 6, 34, 14, 2),
('Tour de France', 6, 35, 2, 70),
('Tour de France', 19, 21, 43, 0),
('Tour de France', 19, 24, 42, 0),
('Tour de France', 19, 34, 38, 0),
('Tour de France', 19, 35, 37, 0),
('Tour de Romandie', 3, 56, 39, 0),
('Tour de Romandie', 3, 125, 15, 0),
('Tour de Romandie', 3, 127, 54, 0),
('Tour de Romandie', 4, 56, 39, 0),
('Tour de Romandie', 4, 125, 25, 0),
('Tour de Romandie', 4, 127, 16, 0),
('Tour de Suisse', 4, 19, 14, 0),
('Tour de Suisse', 4, 45, 10, 1),
('Tour de Suisse', 4, 63, 101, 0),
('Tour de Suisse', 5, 19, 1, 50),
('Tour de Suisse', 5, 45, 22, 0),
('Tour de Suisse', 5, 63, 53, 0),
('Volta Ciclista a Catalunya', 2, 14, 3, 18),
('Volta Ciclista a Catalunya', 2, 18, 6, 7),
('Volta Ciclista a Catalunya', 2, 80, 31, 0),
('Volta Ciclista a Catalunya', 3, 14, 1, 50),
('Volta Ciclista a Catalunya', 3, 18, 5, 10),
('Volta Ciclista a Catalunya', 3, 80, 34, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corredor`
--

CREATE TABLE `corredor` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Nacionalidad` varchar(45) DEFAULT NULL,
  `Altura` decimal(3,0) DEFAULT NULL,
  `Peso` int(11) DEFAULT NULL,
  `Fecha_nacimiento` date DEFAULT NULL,
  `Nº_carreras_corridas` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `corredor`
--

INSERT INTO `corredor` (`Id`, `Nombre`, `Apellido`, `Nacionalidad`, `Altura`, `Peso`, `Fecha_nacimiento`, `Nº_carreras_corridas`) VALUES
(1, 'Filippo', 'Ganna', 'Italia', 193, 83, '1996-07-25', '18'),
(2, 'Egan', 'Bernal', 'Colombia', 175, 60, '1997-01-13', '8'),
(3, 'Thomas', 'Pidcock', 'Inglaterra', 170, 58, '1999-07-30', '12'),
(4, 'Geraint', 'Thomas', 'Inglaterra', 183, 71, '1986-05-25', '8'),
(5, 'Julian', 'Alaphilippe', 'Francia', 173, 62, '1992-06-11', '27'),
(6, 'Kasper', 'Asgreen', 'Dinamarca', 192, 75, '1995-02-08', '24'),
(7, 'Remco', 'Evenepoel', 'Belgica', 171, 61, '2000-01-25', '14'),
(8, 'Ilan', 'Van Wilder', 'Belgica', 171, 64, '2000-05-14', '23'),
(9, 'Joao', 'Almeida', 'Portugal', 178, 63, '1998-08-05', '13'),
(10, 'Juan', 'Ayuso', 'España', 183, 65, '2002-09-16', '9'),
(11, 'Adam', 'Yates', 'Inglaterra', 173, 58, '1992-08-07', '12'),
(12, 'Tadej', 'Pogacar', 'Eslovenia', 176, 66, '1998-09-21', '19'),
(13, 'Juan Pedro', 'Lopez', 'España', 170, 60, '1997-07-31', '15'),
(14, 'Jasper', 'Stuyven', 'Belgica', 187, 78, '1992-04-17', '24'),
(15, 'Giulio', 'Ciccone', 'Italia', 176, 58, '1994-12-20', '15'),
(16, 'Mads', 'Pedersen', 'Dinamarca', 180, 70, '1995-12-18', '21'),
(17, 'Sepp', 'Kuss', 'Estados Unidos', 182, 61, '1994-09-13', '5'),
(18, 'Jonas', 'Vingegaard', 'Dinamarca', 175, 60, '1996-12-10', '6'),
(19, 'Wout', 'Van Aert', 'Belgica', 190, 78, '1994-09-15', '19'),
(20, 'Christophe ', 'Laporte', 'Francia', 175, 76, '1992-12-11', '19'),
(21, 'Emanuel', 'Buchmann', 'Alemania', 180, 59, '1992-11-18', '16'),
(22, 'Lennard', 'Kamna', 'Alemania', 181, 65, '1996-09-09', '16'),
(23, 'Maximilian', 'Schachmann', 'Alemania', 183, 70, '1994-01-09', '20'),
(24, 'Jai', 'Hindley', 'Australia', 175, 60, '1996-05-05', '18'),
(25, 'Filippo', 'Zana', 'Italia', 185, 65, '1999-03-18', '18'),
(26, 'Simon', 'Yates', 'Inglaterra', 172, 58, '1992-08-07', '18'),
(27, 'Michael', 'Matthews', 'Australia', 178, 72, '1990-09-26', '25'),
(28, 'Chris', 'Harper', 'Australia', 185, 67, '1994-11-23', '18'),
(29, 'Alberto', 'Bettiol', 'Italia', 180, 69, '1993-10-29', '19'),
(30, 'Neilson', 'Powless', 'Estados Unidos', 183, 67, '1996-09-03', '19'),
(31, 'Rigoberto', 'Uran', 'Colombia', 173, 63, '1987-01-26', '11'),
(32, 'Stefan', 'Bissegger', 'Suiza', 181, 78, '1998-09-13', '23'),
(33, 'Kaden', 'Groves', 'Australia', 176, 76, '1998-12-23', '16'),
(34, 'Jasper', 'Philipsen', 'Belgica', 176, 75, '1998-03-02', '25'),
(35, 'Mathieu', 'Van der Poel', 'Paises Bajos', 184, 75, '1995-01-19', '16'),
(36, 'Gianni', 'Vermeersch', 'Belgica', 173, 68, '1992-11-19', '30'),
(37, 'Clement', 'Champoussin', 'Francia', 180, 61, '1998-05-29', '29'),
(38, 'Arnaud', 'Demare', 'Francia', 181, 76, '1991-08-26', '20'),
(39, 'Cristian', 'Rodriguez', 'España', 178, 56, '1995-03-03', '20'),
(40, 'Elie', 'Gesbert', 'Francia', 181, 63, '1995-07-01', '28'),
(41, 'Samuele', 'Battistella', 'Italia', 180, 67, '1998-11-14', '18'),
(42, 'Alexey', 'Lutsenko', 'Kazajistan', 174, 74, '1992-09-07', '23'),
(43, 'Harold', 'Tejada', 'Colombia', 180, 63, '1997-04-27', '20'),
(44, 'Simone', 'Velasco', 'Italia', 170, 59, '1995-12-02', '34'),
(45, 'Pello', 'Bilbao', 'España', 174, 60, '1990-02-25', '15'),
(46, 'Jack', 'Haig', 'Australia', 190, 67, '1993-09-06', '10'),
(47, 'Matej', 'Mohoric', 'Eslovenia', 186, 72, '1994-10-19', '22'),
(48, 'Wout', 'Poels', 'Paises Bajos', 186, 66, '1987-10-01', '11'),
(49, 'Bryan', 'Coquard', 'Francia', 171, 59, '1992-04-25', '14'),
(50, 'Simon', 'Geschke', 'Alemania', 171, 64, '1986-03-13', '24'),
(51, 'Ion', 'Izaguirre', 'España', 173, 60, '1989-02-04', '23'),
(52, 'Guillaume', 'Martin', 'Francia', 173, 55, '1993-06-09', '34'),
(53, 'Felix', 'Gall', 'Austria', 178, 66, '1998-02-27', '15'),
(54, 'Ben', 'OConnor', 'Australia', 188, 67, '1995-11-25', '19'),
(55, 'Benoit', 'Cosnefroy', 'Francia', 179, 65, '1995-10-17', '29'),
(56, 'Dorian', 'Godon', 'Francia', 190, 73, '1996-05-25', '21'),
(57, 'David', 'Gaudu', 'Francia', 172, 53, '1996-10-10', '13'),
(58, 'Stefan', 'Kung', 'Suiza', 193, 83, '1993-10-16', '18'),
(59, 'Quentin', 'Pacher', 'Francia', 179, 62, '1992-01-06', '22'),
(60, 'Lenny', 'Martinez', 'Francia', 168, 52, '2003-07-11', '20'),
(61, 'Biniam', 'Girmay', 'Eritrea', 184, 70, '2000-04-02', '26'),
(62, 'Lorenzo', 'Rota', 'Italia', 173, 62, '1995-05-23', '35'),
(63, 'Rein', 'Taaramae', 'Estonia', 186, 68, '1987-04-24', '21'),
(64, 'Louis', 'Meintjes', 'Sudafrica', 173, 58, '1992-02-21', '19'),
(65, 'Alex ', 'Aranburu', 'España', 178, 63, '1995-09-19', '25'),
(66, 'Ivan', 'Garcia Cortina', 'España', 183, 77, '1995-11-20', '29'),
(67, 'Fernando', 'Gaviria', 'Colombia', 180, 71, '1994-08-19', '15'),
(68, 'Gregor', 'Muhlberger', 'Austria', 180, 64, '1994-04-04', '18'),
(69, 'John', 'Degenkolb', 'Alemania', 180, 82, '1989-01-07', '25'),
(70, 'Chris', 'Hamilton', 'Australia', 178, 70, '1995-05-18', '16'),
(71, 'Lorenzo', 'Milesi', 'Italia', 180, 70, '2002-03-19', '17'),
(72, 'Kevin', 'Vermaerke', 'Estados Unidos', 181, 67, '2000-10-16', '25'),
(73, 'Simon', 'Clarke', 'Australia', 175, 63, '1986-07-18', '23'),
(74, 'Hugo', 'Houle', 'Canada', 183, 72, '1990-09-27', '23'),
(75, 'Matthew', 'Riccitello', 'Estados Unidos', 172, 55, '2002-03-05', '7'),
(76, 'Michael', 'Woods', 'Canada', 175, 64, '1986-10-12', '17'),
(77, 'Victor', 'Campenaerts', 'Belgica', 173, 68, '1991-10-28', '22'),
(78, 'Andreas', 'Kron', 'Dinamarca', 177, 63, '1998-06-01', '12'),
(79, 'Arnaud', 'De Lie', 'Belgica', 182, 78, '2002-03-16', '33'),
(80, 'Florian', 'Vermeersch', 'Belgica', 193, 85, '1999-03-12', '37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `Nombre` varchar(45) NOT NULL,
  `Abreviacion` varchar(45) DEFAULT NULL,
  `Marca_bici` varchar(45) DEFAULT NULL,
  `Nº_puntos_UCI_totales` int(11) DEFAULT NULL,
  `Nacionalidad` varchar(45) DEFAULT NULL,
  `maillot` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`Nombre`, `Abreviacion`, `Marca_bici`, `Nº_puntos_UCI_totales`, `Nacionalidad`, `maillot`) VALUES
('AG2R Citroen Team', 'ACT', 'BMC', 6469, 'Francia', 'Imagenes/10538-1_1.webp'),
('Alpecin-Deceunick', 'ADC', 'Canyon', 8593, 'Belgica', 'Imagenes/Alpecin.avif'),
('Astana Qazaqstan team', 'AST', 'Wilier Triestina', 4289, 'Kazajistan', 'Imagenes/Astana.avif'),
('Bahrain-Victorious', 'TBV', 'Merida', 9307, 'Bahrein', 'Imagenes/ale-maillot-manga-corta-prime-bahrain-victorious-2024.jpg'),
('BORA-hansgrohe', 'BOH', 'Specialized', 9196, 'Alemania', 'Imagenes/Bora.jpg'),
('Cofidis', 'COF', 'LOOK', 7069, 'Francia', 'Imagenes/cofidis.01339143'),
('EF Education-EasyPost', 'EFE', 'Cannondale', 7908, 'Estados Unidos', 'Imagenes/EF.jpg'),
('Groupama-FDJ', 'GFC', 'Lapierre', 8720, 'Francia', 'Imagenes/groupama.jpg'),
('INEOS Grenadiers', 'IGD', 'Pinarello', 10727, 'Inglaterra', 'Imagenes/ineos.avif'),
('Intermarche-Circus-Wanty', 'ICW', 'Cube', 7521, 'Belgica', 'Imagenes/na-5921-6229-c_001.webp'),
('Israel-Premier Tech', 'IPT', 'Factor', 6380, 'Israel', 'Imagenes/israel-premier-tech-roland-jersey-2_1920x1920.webp'),
('Jumbo-Visma', 'TJV', 'Cerv', 15182, 'Paises Bajos', 'Imagenes/agu-maillot-manga-corta-replica-visma-_-lease-a-bike-2024.jpg'),
('Lidl-Trek', 'LTK', 'Trek', 8887, 'Estados Unidos', 'Imagenes/lidl.jpg'),
('Lotto Dstny', 'LTD', 'Ridley', 8859, 'Belgica', 'Imagenes/19934-1_1_1280x1280.avif'),
('Movistar Team', 'MOV', 'Canyon', 7414, 'España', 'Imagenes/gbk-8434738138902-c_001.avif'),
('Soudal- Quick Step', 'SOQ', 'Specialized', 11607, 'Belgica', 'Imagenes/Soudal.avif'),
('Team Arkea Samsic', 'ARK', 'Bianchi', 5645, 'Francia', 'Imagenes/arkea.jpeg'),
('Team dsm- firmenich', 'DSM', 'SCOTT', 6123, 'Paises Bajos', 'Imagenes/10524-1_1.jpg'),
('Team Jayco Alula', 'JAY', 'Giant', 7195, 'Australia', 'Imagenes/ale-maillot-manga-corta-prime-jayco-2024.jpg'),
('UAE Team Emirates', 'UAD', 'Colnago', 17319, 'Emiratos Arabes Unidos', 'Imagenes/10476-1_1.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es`
--

CREATE TABLE `es` (
  `Id_lider` int(11) NOT NULL,
  `Id_gregario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `es`
--

INSERT INTO `es` (`Id_lider`, `Id_gregario`) VALUES
(8, 1),
(13, 16),
(24, 21),
(30, 28),
(35, 34),
(36, 40),
(37, 39),
(43, 41),
(48, 42),
(50, 53),
(51, 49),
(70, 66),
(70, 68),
(70, 72),
(77, 79),
(85, 83),
(86, 81),
(89, 91),
(89, 96),
(102, 100),
(104, 97),
(104, 101),
(108, 109),
(121, 124),
(123, 122),
(127, 125),
(160, 159);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esta_vinculado`
--

CREATE TABLE `esta_vinculado` (
  `Equipo_Nombre` varchar(45) NOT NULL,
  `Corredor_Id` int(11) NOT NULL,
  `Periodo_Año_inicio_vinc` int(11) NOT NULL,
  `Periodo_Año_fin_vinc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `esta_vinculado`
--

INSERT INTO `esta_vinculado` (`Equipo_Nombre`, `Corredor_Id`, `Periodo_Año_inicio_vinc`, `Periodo_Año_fin_vinc`) VALUES
('AG2R Citroen Team', 37, 2019, 2022),
('AG2R Citroen Team', 53, 2022, 2025),
('AG2R Citroen Team', 54, 2021, 2024),
('AG2R Citroen Team', 55, 2017, 2025),
('AG2R Citroen Team', 56, 2019, 2025),
('Alpecin-Deceuninck', 33, 2023, 2024),
('Alpecin-Deceuninck', 34, 2021, 2024),
('Alpecin-Deceuninck', 35, 2020, 2025),
('Alpecin-Deceuninck', 36, 2020, 2025),
('Astana Qazaqstan Team', 41, 2021, 2024),
('Astana Qazaqstan Team', 42, 2021, 2024),
('Astana Qazaqstan Team', 43, 2020, 2024),
('Astana Qazaqstan Team', 44, 2022, 2025),
('Astana Qazaqstan Team', 51, 2019, 2021),
('Astana Qazaqstan Team', 65, 2020, 2021),
('Astana Qazaqstan Team', 75, 2018, 2021),
('Bahrain-Victorious', 45, 2021, 2025),
('Bahrain-Victorious', 46, 2020, 2026),
('Bahrain-Victorious', 47, 2018, 2025),
('Bahrain-Victorious', 48, 2020, 2024),
('Bahrain-Victorious', 66, 2017, 2020),
('BORA-hansgrohe', 21, 2017, 2024),
('BORA-hansgrohe', 22, 2020, 2024),
('BORA-hansgrohe', 23, 2019, 2024),
('BORA-hansgrohe', 24, 2022, 2024),
('BORA-hansgrohe', 68, 2017, 2020),
('Cofidis', 20, 2014, 2021),
('Cofidis', 49, 2022, 2025),
('Cofidis', 50, 2021, 2024),
('Cofidis', 51, 2022, 2024),
('Cofidis', 52, 2020, 2024),
('EF Education-EasyPost', 29, 2019, 2024),
('EF Education-EasyPost', 30, 2020, 2027),
('EF Education-EasyPost', 31, 2020, 2024),
('EF Education-EasyPost', 32, 2021, 2024),
('Groupama-FDJ', 38, 2018, 2022),
('Groupama-FDJ', 57, 2018, 2025),
('Groupama-FDJ', 58, 2019, 2025),
('Groupama-FDJ', 59, 2022, 2025),
('Groupama-FDJ', 60, 2023, 2024),
('INEOS Grenadiers', 1, 2019, 2027),
('INEOS Grenadiers', 2, 2019, 2026),
('INEOS Grenadiers', 3, 2021, 2027),
('INEOS Grenadiers', 4, 2020, 2025),
('INEOS Grenadiers', 11, 2021, 2022),
('INEOS Grenadiers', 48, 2015, 2019),
('Intermarche-Circus-Wanty', 61, 2021, 2026),
('Intermarche-Circus-Wanty', 62, 2021, 2024),
('Intermarche-Circus-Wanty', 63, 2021, 2024),
('Intermarche-Circus-Wanty', 64, 2021, 2025),
('Israel-Premier Tech', 73, 2022, 2024),
('Israel-Premier Tech', 74, 2022, 2024),
('Israel-Premier Tech', 75, 2022, 2025),
('Israel-Premier Tech', 76, 2021, 2025),
('Jumbo-Visma', 17, 2018, 2024),
('Jumbo-Visma', 18, 2019, 2027),
('Jumbo-Visma', 19, 2020, 2026),
('Jumbo-Visma', 20, 2022, 2026),
('Jumbo-Visma', 28, 2020, 2022),
('Lidl-Trek', 13, 2020, 2025),
('Lidl-Trek', 14, 2016, 2025),
('Lidl-Trek', 15, 2019, 2027),
('Lidl-Trek', 16, 2017, 2025),
('Lotto-Dstny', 69, 2020, 2022),
('Lotto-Dstny', 77, 2022, 2024),
('Lotto-Dstny', 78, 2021, 2024),
('Lotto-Dstny', 79, 2022, 2026),
('Lotto-Dstny', 80, 2020, 2024),
('Movistar Team', 65, 2022, 2024),
('Movistar Team', 66, 2021, 2026),
('Movistar Team', 67, 2023, 2024),
('Movistar Team', 68, 2021, 2025),
('Soudal- Quick Step', 5, 2020, 2024),
('Soudal- Quick Step', 6, 2018, 2024),
('Soudal- Quick Step', 7, 2019, 2026),
('Soudal- Quick Step', 8, 2022, 2025),
('Soudal- Quick Step', 9, 2020, 2021),
('Team Arkea Samsic', 37, 2023, 2025),
('Team Arkea Samsic', 38, 2023, 2025),
('Team Arkea Samsic', 39, 2023, 2024),
('Team Arkea Samsic', 40, 2019, 2024),
('Team DSM', 53, 2021, 2021),
('Team dsm-firmenich', 24, 2021, 2021),
('Team dsm-firmenich', 69, 2022, 2024),
('Team dsm-firmenich', 70, 2021, 2025),
('Team dsm-firmenich', 71, 2023, 2025),
('Team dsm-firmenich', 72, 2021, 2025),
('Team Jayco Alula', 25, 2023, 2025),
('Team Jayco Alula', 26, 2021, 2024),
('Team Jayco Alula', 27, 2021, 2025),
('Team Jayco Alula', 28, 2023, 2024),
('Team Jayco Alula', 33, 2020, 2022),
('Team Jayco Alula', 45, 2018, 2020),
('UAE Team Emirates', 9, 2022, 2026),
('UAE Team Emirates', 10, 2022, 2028),
('UAE Team Emirates', 11, 2023, 2025),
('UAE Team Emirates', 12, 2019, 2027),
('UAE Team Emirates', 34, 2019, 2020),
('UAE Team Emirates', 67, 2019, 2022);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapa`
--

CREATE TABLE `etapa` (
  `Carrera_nombre` varchar(45) NOT NULL,
  `Distancia` int(11) DEFAULT NULL,
  `Altimetria` int(11) DEFAULT NULL,
  `nº_etapa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `etapa`
--

INSERT INTO `etapa` (`Carrera_nombre`, `Distancia`, `Altimetria`, `nº_etapa`) VALUES
('Criterium du Dauphine', 158, 2753, 1),
('Criterium du Dauphine', 167, 2865, 2),
('Giro dItalia', 20, 171, 1),
('Giro dItalia', 162, 2581, 6),
('Giro dItalia', 203, 5852, 16),
('Itzulia Basque Country', 163, 2799, 3),
('Itzulia Basque Country', 138, 3472, 6),
('La Vuelta Ciclista a España', 182, 2754, 2),
('La Vuelta Ciclista a España', 185, 3041, 9),
('La Vuelta Ciclista a España', 135, 4266, 13),
('Paris-Niza', 165, 2470, 4),
('Paris-Niza', 117, 2465, 8),
('Tirreno-Adriatico', 12, 3, 1),
('Tirreno-Adriatico', 154, 1660, 7),
('Tour de France', 182, 1427, 4),
('Tour de France', 145, 3894, 6),
('Tour de France', 173, 1934, 19),
('Tour de Romandie', 19, 377, 3),
('Tour de Romandie', 162, 4308, 4),
('Tour de Suisse', 153, 2795, 4),
('Tour de Suisse', 211, 4654, 5),
('Volta Ciclista a Catalunya', 165, 3291, 2),
('Volta Ciclista a Catalunya', 181, 3998, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `Nombre` varchar(45) NOT NULL,
  `Provincia_Nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`Nombre`, `Provincia_Nombre`) VALUES
('Tortoreto', 'Abruzos'),
('Chambon-sur-Lac', 'Auvernia-Ródano-Alpes'),
('Clermont-Ferrand', 'Auvernia-Ródano-Alpes'),
('Bastoña', 'Bastoña'),
('Salerno', 'Campania'),
('Valladolid', 'Castilla y Leon'),
('Barcelona', 'Cataluña'),
('Mataro', 'Cataluña'),
('Oudenaarde', 'Fandes'),
('Brugge', 'Flandes'),
('Chur', 'Grisones'),
('Fontainebleau', 'Isla de Francia'),
('Paris', 'Isla de Francia'),
('Roma', 'Lacio'),
('Lieja', 'Lieja'),
('Sanremo', 'Liguria'),
('Como', 'Lombardia'),
('Cours', 'Lombardia'),
('Vergamo', 'Lombardia'),
('Guadarrama', 'Madrid'),
('Madrid', 'Marcas'),
('San Benedetto del Tronto', 'Marcas'),
('Pamplona', 'Navarra'),
('Roubaix', 'Norte y alta Francia'),
('Mont-de-Marsan', 'Nueva Aquitania'),
('Amorebieta', 'Pais vasco'),
('Donostia-San Sebastian', 'Pais vasco'),
('Vitoria-Gasteiz', 'Pais vasco'),
('Tortona', 'Piamonte'),
('Nice', 'Provenza-Alpes-Costa Azul'),
('Tafers', 'Sense'),
('Siena', 'Toscana'),
('Sion', 'Valais'),
('Crissier', 'Vaud');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `Nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`Nombre`) VALUES
('Belgica'),
('Dinamarca'),
('España'),
('Francia'),
('Italia'),
('Suiza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasa_por`
--

CREATE TABLE `pasa_por` (
  `Carrera_Nombre` varchar(45) NOT NULL,
  `Municipio_Nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `pasa_por`
--

INSERT INTO `pasa_por` (`Carrera_Nombre`, `Municipio_Nombre`) VALUES
('Criterium du Dauphine', 'Chambon-sur-Lac'),
('Criterium du Dauphine', 'Cours'),
('Donostia San Sebastian Klasikoa', 'Donostia-San Sebastian'),
('Giro dItalia', 'Roma'),
('Giro dItalia', 'Salerno'),
('Giro dItalia', 'Tortona'),
('Il Lombardia', 'Como'),
('Il Lombardia', 'Vergamo'),
('Itzulia Basque Country', 'Amorebieta'),
('Itzulia Basque Country', 'Vitoria-Gasteiz'),
('La Vuelta Ciclista a España', 'Guadarrama'),
('La Vuelta Ciclista a España', 'Madrid'),
('La Vuelta Ciclista a España', 'Pamplona'),
('La Vuelta Ciclista a España', 'Valladolid'),
('Liege-Bastogne-Liege', 'Bastoña'),
('Liege-Bastogne-Liege', 'Lieja'),
('Milano-Sanremo', 'Sanremo'),
('Paris-Niza', 'Fontainebleau'),
('Paris-Niza', 'Nice'),
('Paris-Roubaix', 'Roubaix'),
('Ronde van Vlaanderen-Tour des Flanders', 'Brugge'),
('Ronde van Vlaanderen-Tour des Flanders', 'Oudenaarde'),
('Strade Bianche', 'Siena'),
('Tirreno-Adriatico', 'San Benedetto del Tronto'),
('Tirreno-Adriatico', 'Tortoreto'),
('Tour de France', 'Clermont-Ferrand'),
('Tour de France', 'Mont-de-Marsan'),
('Tour de France', 'Paris'),
('Tour de Romandie', 'Crissier'),
('Tour de Romandie', 'Sion'),
('Tour de Suisse', 'Amorebieta'),
('Tour de Suisse', 'Chur'),
('Tour de Suisse', 'Tafers'),
('Volta Ciclista a Catalunya', 'Barcelona'),
('Volta Ciclista a Catalunya', 'Mataro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `Año_inicio_vinc` int(11) NOT NULL,
  `Año_fin_vinc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`Año_inicio_vinc`, `Año_fin_vinc`) VALUES
(2015, 2016),
(2016, 2025),
(2017, 2017),
(2017, 2018),
(2017, 2019),
(2017, 2020),
(2017, 2021),
(2017, 2022),
(2017, 2023),
(2017, 2024),
(2017, 2025),
(2017, 2026),
(2017, 2027),
(2017, 2028),
(2018, 2018),
(2018, 2019),
(2018, 2020),
(2018, 2021),
(2018, 2022),
(2018, 2023),
(2018, 2024),
(2018, 2025),
(2018, 2026),
(2018, 2027),
(2018, 2028),
(2019, 2019),
(2019, 2020),
(2019, 2021),
(2019, 2022),
(2019, 2023),
(2019, 2024),
(2019, 2025),
(2019, 2026),
(2019, 2027),
(2019, 2028),
(2019, 2029),
(2020, 2020),
(2020, 2021),
(2020, 2022),
(2020, 2023),
(2020, 2024),
(2020, 2025),
(2020, 2026),
(2020, 2027),
(2020, 2028),
(2020, 2029),
(2021, 2021),
(2021, 2022),
(2021, 2023),
(2021, 2024),
(2021, 2025),
(2021, 2026),
(2021, 2027),
(2021, 2028),
(2021, 2029),
(2022, 2022),
(2022, 2023),
(2022, 2024),
(2022, 2025),
(2022, 2026),
(2022, 2027),
(2022, 2028),
(2022, 2029),
(2023, 2023),
(2023, 2024),
(2023, 2025),
(2023, 2026),
(2023, 2027),
(2023, 2028),
(2025, 2026),
(2025, 2027),
(2025, 2028);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion`
--

CREATE TABLE `presentacion` (
  `Id` int(11) NOT NULL,
  `Dorsal` varchar(45) DEFAULT NULL,
  `Equipo_Nombre` varchar(45) NOT NULL,
  `Corredor_Id` int(11) NOT NULL,
  `Carrera_Nombre` varchar(45) NOT NULL,
  `PosicionGen` int(11) DEFAULT NULL,
  `Ptos_UCI_posicionGen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `presentacion`
--

INSERT INTO `presentacion` (`Id`, `Dorsal`, `Equipo_Nombre`, `Corredor_Id`, `Carrera_Nombre`, `PosicionGen`, `Ptos_UCI_posicionGen`) VALUES
(1, '36', 'INEOS Grenadiers', 1, 'La Vuelta Ciclista a España', 104, 0),
(2, '41', 'INEOS Grenadiers', 1, 'Paris-Roubaix', 6, 280),
(3, '32', 'INEOS Grenadiers', 2, 'Criterium du Dauphine', 12, 60),
(4, '101', 'INEOS Grenadiers', 2, 'Tour de Romandie', 8, 125),
(5, '101', 'INEOS Grenadiers', 3, 'Strade Bianche', 1, 400),
(6, '26', 'INEOS Grenadiers', 3, 'Tour de France', 13, 140),
(7, '118', 'INEOS Grenadiers', 4, 'Giro dItalia', 2, 885),
(8, '31', 'INEOS Grenadiers', 4, 'La Vuelta Ciclista a España', 31, 25),
(9, '161', 'Soudal-Quick Step', 5, 'Tirreno-Adriatico', 30, 20),
(10, '51', 'Soudal-Quick Step', 5, 'Criterium du Dauphine', 10, 85),
(11, '172', 'Soudal-Quick Step', 6, 'Milano-Sanremo', 36, 15),
(12, '72', 'Soudal-Quick Step', 6, 'Ronde van Vlaanderen-Tour des Flanders', 7, 240),
(13, '1', 'Soudal-Quick Step', 7, 'Liege-Bastogne-Liege', 1, 800),
(14, '51', 'Soudal-Quick Step', 7, 'Volta Ciclista a Catalunya', 2, 320),
(15, '7', 'Soudal-Quick Step', 8, 'Giro dItalia', 12, 130),
(16, '6', 'Soudal-Quick Step', 8, 'Liege-Bastogne-Liege', 22, 30),
(17, '211', 'UAE Team Emirates', 9, 'Giro dItalia', 3, 750),
(18, '21', 'UAE Team Emirates', 9, 'Volta Ciclista a Catalunya', 3, 260),
(19, '171', 'UAE Team Emirates', 10, 'Tour de Suisse', 2, 400),
(20, '11', 'UAE Team Emirates', 10, 'La Vuelta Ciclista a España', 4, 600),
(21, '19', 'UAE Team Emirates', 11, 'Tour de France', 3, 880),
(22, '111', 'UAE Team Emirates', 11, 'Criterium du Dauphine', 2, 400),
(23, '1', 'UAE Team Emirates', 12, 'Il Lombardia', 1, 800),
(24, '11', 'UAE Team Emirates', 12, 'Tour de France', 2, 1040),
(25, '105', 'Lidl-Trek', 13, 'Criterium du Dauphine', 38, 10),
(26, '51', 'Lidl-Trek', 13, 'La Vuelta Ciclista a España', 17, 70),
(27, '55', 'Lidl-Trek', 14, 'Paris-Roubaix', 20, 50),
(28, '226', 'Lidl-Trek', 14, 'Milano-Sanremo', 10, 135),
(29, '55', 'Lidl-Trek', 15, 'Ronde van Vlaanderen-Tour des Flanders', 3, 520),
(30, '51', 'Lidl-Trek', 15, 'Paris-Roubaix', 4, 440),
(31, '111', 'Lidl-Trek', 16, 'Volta Ciclista a Catalunya', 7, 120),
(32, '221', 'Lidl-Trek', 16, 'Tirreno-Adriatico', 5, 225),
(33, '24', 'Jumbo-Visma', 17, 'La Vuelta Ciclista a España', 1, 1100),
(34, '4', 'Jumbo-Visma', 17, 'Tour de France', 12, 165),
(35, '1', 'Jumbo-Visma', 18, 'Tour de France', 1, 1300),
(36, '1', 'Jumbo-Visma', 18, 'Criterium du Dauphine', 1, 500),
(37, '7', 'Jumbo-Visma', 19, 'Paris-Roubaix', 3, 520),
(38, '11', 'Jumbo-Visma', 19, 'Ronde van Vlaanderen-Tour des Flanders', 4, 440),
(39, '3', 'Jumbo-Visma', 20, 'Paris-Roubaix', 10, 135),
(40, '4', 'Jumbo-Visma', 20, 'Criterium du Dauphine', 89, 0),
(41, '73', 'BORA-hansgtohe', 21, 'La Vuelta Ciclista a España', 20, 50),
(42, '43', 'BORA-hansgtohe', 21, 'Criterium du Dauphine', 19, 30),
(43, '75', 'BORA-hansgtohe', 22, 'La Vuelta Ciclista a España', 30, 30),
(44, '56', 'BORA-hansgtohe', 22, 'Giro dItalia', 9, 235),
(45, '51', 'BORA-hansgtohe', 23, 'Tour de Suisse', 14, 40),
(46, '56', 'BORA-hansgtohe', 23, 'Donostia San Sebastian Klasikoa', 74, 0),
(47, '71', 'BORA-hansgtohe', 24, 'Tour de France', 7, 425),
(48, '41', 'BORA-hansgtohe', 24, 'Criterium du Dauphine', 4, 275),
(49, '227', 'Team Jayco Alula', 25, 'Il Lombardia', 79, 0),
(50, '198', 'Team Jayco Alula', 25, 'Giro dItalia', 18, 60),
(51, '221', 'Team Jayco Alula', 26, 'Il Lombardia', 5, 360),
(52, '161', 'Team Jayco Alula', 26, 'Tour de France', 4, 750),
(53, '191', 'Team Jayco Alula', 27, 'Giro dItalia', 63, 0),
(54, '81', 'Team Jayco Alula', 27, 'Ronde van Vlaanderen-Tour des Flanders', 200, 0),
(55, '14', 'Team Jayco Alula', 28, 'Paris-Niza', 20, 30),
(56, '114', 'Team Jayco Alula', 28, 'Tour de Romandie', 36, 10),
(57, '61', 'EF Education-EasyPost', 29, 'Milano-Sanremo', 54, 10),
(58, '76', 'EF Education-EasyPost', 29, 'Giro dItalia', 48, 20),
(59, '81', 'EF Education-EasyPost', 30, 'Donostia San Sebastian Klasikoa', 4, 220),
(60, '96', 'EF Education-EasyPost', 30, 'Ronde van Vlaanderen-Tour des Flanders', 5, 360),
(61, '48', 'EF Education-EasyPost', 31, 'Tour de France', 71, 0),
(62, '77', 'EF Education-EasyPost', 31, 'Il Lombardia', 35, 15),
(63, '72', 'EF Education-EasyPost', 32, 'Tour de Suisse', 49, 10),
(64, '102', 'EF Education-EasyPost', 32, 'La Vuelta Ciclista a España', 117, 0),
(65, '81', 'Alpecin-Deceunick', 33, 'La Vuelta Ciclista a España', 122, 0),
(66, '24', 'Alpecin-Deceunick', 33, 'Paris-Roubaix', 31, 15),
(67, '106', 'Alpecin-Deceunick', 34, 'Tour de France', 97, 0),
(68, '25', 'Alpecin-Deceunick', 34, 'Paris-Roubaix', 2, 640),
(69, '21', 'Alpecin-Deceunick', 35, 'Milano-Sanremo', 1, 800),
(70, '21', 'Alpecin-Deceunick', 35, 'Paris-Roubaix', 1, 800),
(71, '7', 'Alpecin-Deceunick', 36, 'Tirreno-Adriatico', 65, 0),
(72, '27', 'Alpecin-Deceunick', 36, 'Paris-Roubaix', 11, 110),
(73, '203', 'Team Arkea Samsic', 37, 'Il Lombardia', 26, 30),
(74, '33', 'Team Arkea Samsic', 37, 'Donostia San Sebastian Klasikoa', 14, 32),
(75, '91', 'Team Arkea Samsic', 38, 'Milano-Sanremo', 51, 10),
(76, '82', 'Team Arkea Samsic', 38, 'Tour de Suisse', 200, 0),
(77, '178', 'Team Arkea Samsic', 39, 'La Vuelta Ciclista a España', 13, 110),
(78, '31', 'Team Arkea Samsic', 39, 'Itzulia Basque Country', 14, 32),
(79, '172', 'Team Arkea Samsic', 40, 'La Vuelta Ciclista a España', 73, 0),
(80, '123', 'Team Arkea Samsic', 40, 'Volta Ciclista a Catalunya', 22, 16),
(81, '33', 'Astana Qazaqstan team', 41, 'Tour de Suisse', 74, 0),
(82, '191', 'Astana Qazaqstan team', 41, 'La Vuelta Ciclista a España', 121, 0),
(83, '195', 'Astana Qazaqstan team', 42, 'Tour de France', 40, 35),
(84, '21', 'Astana Qazaqstan team', 42, 'Strade Bianche', 11, 56),
(85, '198', 'Astana Qazaqstan team', 43, 'Tour de France', 34, 35),
(86, '36', 'Astana Qazaqstan team', 43, 'Tour de Suisse', 10, 85),
(87, '31', 'Astana Qazaqstan team', 44, 'Il Lombardia', 104, 0),
(88, '172', 'Astana Qazaqstan team', 44, 'Volta Ciclista a Catalunya', 67, 0),
(89, '65', 'Bahrain-Victorious', 45, 'Tour de France', 6, 520),
(90, '141', 'Bahrain-Victorious', 45, 'Donostia San Sebastian Klasikoa', 2, 320),
(91, '66', 'Bahrain-Victorious', 46, 'Tour de France', 28, 40),
(92, '24', 'Bahrain-Victorious', 46, 'Criterium du Dauphine', 5, 225),
(93, '162', 'Bahrain-Victorious', 47, 'Strade Bianche', 6, 140),
(94, '1', 'Bahrain-Victorious', 47, 'Milano-Sanremo', 8, 200),
(95, '46', 'Bahrain-Victorious', 48, 'La Vuelta Ciclista a España', 15, 80),
(96, '69', 'Bahrain-Victorious', 48, 'Tour de France', 27, 40),
(97, '122', 'Cofidis', 49, 'Tour de France', 98, 0),
(98, '93', 'Cofidis', 49, 'Volta Ciclista a Catalunya', 98, 0),
(99, '65', 'Cofidis', 50, 'Il Lombardia', 90, 0),
(100, '64', 'Cofidis', 50, 'Tour de Suisse', 53, 5),
(101, '124', 'Cofidis', 51, 'Tour de France', 45, 25),
(102, '61', 'Cofidis', 51, 'Tour de Suisse', 12, 60),
(103, '61', 'Cofidis', 52, 'Il Lombardia', 52, 10),
(104, '121', 'Cofidis', 52, 'Tour de France', 10, 230),
(105, '95', 'AG2R Citroen Team', 53, 'Tour de France', 8, 360),
(106, '13', 'AG2R Citroen Team', 53, 'Itzulia Basque Country', 10, 68),
(107, '11', 'AG2R Citroen Team', 54, 'Criterium du Dauphine', 3, 325),
(108, '145', 'AG2R Citroen Team', 54, 'Liege-Bastogne-Liege', 50, 5),
(109, '141', 'AG2R Citroen Team', 55, 'Liege-Bastogne-Liege', 54, 10),
(110, '11', 'AG2R Citroen Team', 55, 'Milano-Sanremo', 22, 30),
(111, '113', 'AG2R Citroen Team', 56, 'La Vuelta Ciclista a España', 51, 15),
(112, '95', 'AG2R Citroen Team', 56, 'Paris-Niza', 38, 10),
(113, '61', 'Groupama-FDJ', 57, 'Paris-Niza', 2, 400),
(114, '91', 'Groupama-FDJ', 57, 'Itzulia Basque Country', 4, 220),
(115, '191', 'Groupama-FDJ', 58, 'Ronde van Vlaanderen-Tour des Flanders', 6, 280),
(116, '11', 'Groupama-FDJ', 58, 'Paris-Roubaix', 5, 360),
(117, '106', 'Groupama-FDJ', 59, 'Il Lombardia', 38, 15),
(118, '36', 'Groupama-FDJ', 59, 'Tour de France', 63, 0),
(119, '66', 'Groupama-FDJ', 60, 'Criterium du Dauphine', 18, 30),
(120, '62', 'Groupama-FDJ', 60, 'La Vuelta Ciclista a España', 24, 50),
(121, '111', 'Intermarche-Circus-Wanty', 61, 'Milano-Sanremo', 28, 30),
(122, '111', 'Intermarche-Circus-Wanty', 61, 'Tirreno-Adriatico', 81, 0),
(123, '114', 'Intermarche-Circus-Wanty', 62, 'Tirreno-Adriatico', 25, 20),
(124, '114', 'Intermarche-Circus-Wanty', 62, 'Milano-Sanremo', 31, 15),
(125, '147', 'Intermarche-Circus-Wanty', 63, 'Tour de Romandie', 25, 20),
(126, '106', 'Intermarche-Circus-Wanty', 63, 'Itzulia Basque Country', 15, 28),
(127, '141', 'Intermarche-Circus-Wanty', 64, 'Tour de Romandie', 19, 30),
(128, '81', 'Intermarche-Circus-Wanty', 64, 'Criterium du Dauphine', 7, 150),
(129, '121', 'Movistar Team', 65, 'Donostia San Sebastian Klasikoa', 7, 120),
(130, '123', 'Movistar Team', 65, 'Itzulia Basque Country', 36, 8),
(131, '181', 'Movistar Team', 66, 'Paris-Roubaix', 32, 15),
(132, '201', 'Movistar Team', 66, 'Ronde van Vlaanderen-Tour des Flanders', 21, 30),
(133, '152', 'Movistar Team', 67, 'Giro dItalia', 117, 0),
(134, '83', 'Movistar Team', 67, 'Tour de Romandie', 105, 0),
(135, '175', 'Movistar Team', 68, 'Il Lombardia', 48, 15),
(136, '135', 'Movistar Team', 68, 'Tour de France', 44, 25),
(137, '91', 'Team dsm- firmenich', 69, 'Paris-Roubaix', 7, 240),
(138, '121', 'Team dsm- firmenich', 69, 'Ronde van Vlaanderen-Tour des Flanders', 19, 50),
(139, '56', 'Team dsm- firmenich', 70, 'Paris-Niza', 34, 10),
(140, '145', 'Team dsm- firmenich', 70, 'Tour de Romandie', 61, 0),
(141, '165', 'Team dsm- firmenich', 71, 'Volta Ciclista a Catalunya', 124, 0),
(142, '174', 'Team dsm- firmenich', 71, 'Criterium du Dauphine', 104, 0),
(143, '158', 'Team dsm- firmenich', 72, 'Donostia San Sebastian Klasikoa', 21, 16),
(144, '147', 'Team dsm- firmenich', 72, 'Tour de Suisse', 27, 20),
(145, '121', 'Israel-Premier Tech', 73, 'Strade Bianche', 28, 16),
(146, '103', 'Israel-Premier Tech', 73, 'Liege-Bastogne-Liege', 35, 15),
(147, '201', 'Israel-Premier Tech', 74, 'Paris-Niza', 30, 20),
(148, '164', 'Israel-Premier Tech', 74, 'Ronde van Vlaanderen-Tour des Flanders', 66, 0),
(149, '197', 'Israel-Premier Tech', 75, 'Volta Ciclista a Catalunya', 53, 4),
(150, '136', 'Israel-Premier Tech', 75, 'Giro dItalia', 56, 10),
(151, '137', 'Israel-Premier Tech', 76, 'Il Lombardia', 12, 95),
(152, '151', 'Israel-Premier Tech', 76, 'Tour de France', 48, 25),
(153, '142', 'Lotto Dstny', 77, 'Criterium du Dauphine', 82, 0),
(154, '182', 'Lotto Dstny', 77, 'Tour de France', 64, 0),
(155, '162', 'Lotto Dstny', 78, 'Il Lombardia', 10, 135),
(156, '141', 'Lotto Dstny', 78, 'Strade Bianche', 10, 68),
(157, '143', 'Lotto Dstny', 79, 'Milano-Sanremo', 95, 0),
(158, '83', 'Lotto Dstny', 79, 'Paris-Roubaix', 50, 15),
(159, '47', 'Lotto Dstny', 80, 'Ronde van Vlaanderen-Tour des Flanders', 12, 95),
(160, '81', 'Lotto Dstny', 80, 'Paris-Roubaix', 12, 95);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `Nombre` varchar(45) NOT NULL,
  `Pais_Nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`Nombre`, `Pais_Nombre`) VALUES
('Bastoña', 'Belgica'),
('Fandes', 'Belgica'),
('Lieja', 'Belgica'),
('Andalucia', 'España'),
('Castilla y Leon', 'España'),
('Cataluña', 'España'),
('Madrid', 'España'),
('Navarra', 'España'),
('Pais vasco', 'España'),
('Auvernia-Ródano-Alpes', 'Francia'),
('Isla de Francia', 'Francia'),
('Norte y alta Francia', 'Francia'),
('Nueva Aquitania', 'Francia'),
('Provenza-Alpes-Costa Azul', 'Francia'),
('Abruzos', 'Italia'),
('Campania', 'Italia'),
('Lacio', 'Italia'),
('Liguria', 'Italia'),
('Lombardia', 'Italia'),
('Marcas', 'Italia'),
('Piamonte', 'Italia'),
('Toscana', 'Italia'),
('Grisones', 'Suiza'),
('Sense', 'Suiza'),
('Valais', 'Suiza'),
('Vaud', 'Suiza');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`Nombre`);

--
-- Indices de la tabla `carrera_de_un_dia`
--
ALTER TABLE `carrera_de_un_dia`
  ADD PRIMARY KEY (`Carrera_Nombre`);

--
-- Indices de la tabla `carrera_por_etapas`
--
ALTER TABLE `carrera_por_etapas`
  ADD PRIMARY KEY (`Carrera_Nombre`);

--
-- Indices de la tabla `cod.postal`
--
ALTER TABLE `cod.postal`
  ADD PRIMARY KEY (`Codigo`),
  ADD KEY `fk_Cod.Postal_Municipio1_idx` (`Municipio_Nombre`);

--
-- Indices de la tabla `corre`
--
ALTER TABLE `corre`
  ADD PRIMARY KEY (`Etapa_Carrera_nombre`,`Etapa_nº_etapa`,`Presentacion_Id`),
  ADD KEY `fk_Etapa_has_Presentacion_Presentacion1_idx` (`Presentacion_Id`),
  ADD KEY `fk_Etapa_has_Presentacion_Etapa1_idx` (`Etapa_Carrera_nombre`,`Etapa_nº_etapa`);

--
-- Indices de la tabla `corredor`
--
ALTER TABLE `corredor`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`Nombre`);

--
-- Indices de la tabla `es`
--
ALTER TABLE `es`
  ADD PRIMARY KEY (`Id_lider`,`Id_gregario`),
  ADD KEY `fk_Presentacion_has_Presentacion_Presentacion2_idx` (`Id_gregario`),
  ADD KEY `fk_Presentacion_has_Presentacion_Presentacion1_idx` (`Id_lider`);

--
-- Indices de la tabla `esta_vinculado`
--
ALTER TABLE `esta_vinculado`
  ADD PRIMARY KEY (`Equipo_Nombre`,`Corredor_Id`,`Periodo_Año_inicio_vinc`,`Periodo_Año_fin_vinc`),
  ADD KEY `fk_Equipo_has_Corredor_Corredor1_idx` (`Corredor_Id`),
  ADD KEY `fk_Equipo_has_Corredor_Equipo_idx` (`Equipo_Nombre`),
  ADD KEY `fk_Equipo_has_Corredor_Periodo1_idx` (`Periodo_Año_inicio_vinc`,`Periodo_Año_fin_vinc`);

--
-- Indices de la tabla `etapa`
--
ALTER TABLE `etapa`
  ADD PRIMARY KEY (`Carrera_nombre`,`nº_etapa`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`Nombre`),
  ADD KEY `fk_Municipio_Provincia1_idx` (`Provincia_Nombre`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`Nombre`);

--
-- Indices de la tabla `pasa_por`
--
ALTER TABLE `pasa_por`
  ADD PRIMARY KEY (`Carrera_Nombre`,`Municipio_Nombre`),
  ADD KEY `fk_Carrera_has_Municipio_Municipio1_idx` (`Municipio_Nombre`),
  ADD KEY `fk_Carrera_has_Municipio_Carrera1_idx` (`Carrera_Nombre`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`Año_inicio_vinc`,`Año_fin_vinc`);

--
-- Indices de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_Presentacion_Equipo1_idx` (`Equipo_Nombre`),
  ADD KEY `fk_Presentacion_Corredor1_idx` (`Corredor_Id`),
  ADD KEY `fk_Presentacion_Carrera1_idx` (`Carrera_Nombre`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`Nombre`),
  ADD KEY `fk_Provincia_Pais1_idx` (`Pais_Nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `corredor`
--
ALTER TABLE `corredor`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
