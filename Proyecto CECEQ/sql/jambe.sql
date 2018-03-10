-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-03-2018 a las 21:05:57
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jambe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `idAutor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoPaterno` varchar(50) NOT NULL,
  `apellidoMaterno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`idAutor`, `nombre`, `apellidoPaterno`, `apellidoMaterno`) VALUES
(1, 'ANONIMO', '', ''),
(2, 'KATHRYN', 'MICKLE', ''),
(3, 'JEFF', 'FRENTZEN', ''),
(4, 'HENRY', 'SOBOTKA', ''),
(5, 'PETER', 'MORVILLE', ''),
(6, 'MATTHEW', 'REYNOLDS', ''),
(7, 'PHILIO', 'COX', ''),
(8, 'DWAYNE', 'GIFFORD', ''),
(9, 'PHILIP R.', 'CATEORA', ''),
(10, 'ROBERTO FERNDO', 'HERNANDEZ', 'SAMPIER'),
(11, 'EDWIN', 'T. MERTZ', ''),
(12, 'WILLIAM ', 'MARCHAL', ''),
(13, 'JHON P.', 'J. PINEL', ''),
(14, 'JAMES G.', 'HOLLAND', ''),
(15, 'ISABELLE', 'DUCEUX', ''),
(16, 'LOUIS', 'ROSENFELD', ''),
(17, 'NICOLAS', 'MAQUIAVELO', ''),
(18, 'JEAN', 'DELUMEAU', ''),
(19, 'MANDINO', 'OG', ''),
(20, 'JUAN J.', 'AMADOR', ''),
(21, 'SOF?A', 'M?NDEZ', ''),
(22, 'IAN', 'STEWART', ''),
(23, 'ROBERT', 'CONQUEST', ''),
(24, 'WILLIAM N.', 'CHAMBERS', ''),
(25, 'HERN??N', 'LARA', ''),
(26, 'GERALD H.', 'ZUK', ''),
(27, 'GERALD A.', 'MICHAELSON', ''),
(28, 'TOM', 'SHELDON', ''),
(29, 'DOUGLAS ', 'LIND', ''),
(30, 'JOHN L.', 'GRAHAM', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombre`) VALUES
(0, 'Generalidades'),
(10, 'Bibliograf?a'),
(20, 'Bibliotecnolog?a y ciencias de la informaci?n'),
(30, 'Obras enciclop?dicas generales'),
(50, 'Publicaciones seriadas generales'),
(60, 'Organizaciones generales y museolog?a'),
(70, 'Medios noticiosos, periodismo, publicaci?n'),
(80, 'Colecciones generales'),
(90, 'Manuscritos y libros raros'),
(100, 'Filosof?a y psicolog?a'),
(110, 'Metaf?sica'),
(120, 'Epistemolog?a, causalidad, g?nero humano'),
(130, 'Fen?menos paranormales'),
(140, 'Escuelas filos?ficas espec?ficas'),
(150, 'Psicolog?a'),
(160, 'L?gica'),
(170, 'Etica (Filosof?a moral)'),
(180, 'Filosof?a antigua, medieval, oriental'),
(190, 'Filosof?a moderna occidental'),
(200, 'Religi?n'),
(210, 'Filosof?a y teor?a de la religi?n'),
(220, 'La Biblia'),
(230, 'Cristianismo Teolog?a cristiana'),
(240, 'Moral cristiana y teolog?a piadosa'),
(250, '?rdenes cristianas e iglesia local'),
(260, 'Teolog?a social y eclesi?stica'),
(270, 'Historia del cristianismo y de la iglesia cristian'),
(280, 'Confesiones y sectas cristianas'),
(290, 'Religi?n comparada y otras religiones'),
(300, 'Ciencias sociales'),
(310, 'Colecciones de estad?stica general'),
(320, 'Ciencia pol?tica'),
(330, 'Econom?a'),
(340, 'Derecho'),
(350, 'Administraci?n p?blica y ciencia militar'),
(360, 'Problemas y servicios sociales; asociaciones'),
(370, 'Educaci?n'),
(380, 'Comercio, comunicaciones, transporte'),
(390, 'Costumbres, etiqueta, folclor'),
(400, 'Lenguas'),
(410, 'Ling??stica'),
(420, 'Ingl?s e ingl?s antiguo'),
(430, 'Lenguas germ?nicas Alem?n'),
(440, 'Lenguas romances Franc?s'),
(450, 'Italiano, rumano, retorromano'),
(460, 'Lengua espa?ola y portuguesa'),
(470, 'Lenguas it?licas Lat?n'),
(480, 'Lenguas hel?nicas Griego cl?sico'),
(490, 'Otras lenguas'),
(500, 'Ciencias naturales y matem?ticas'),
(510, 'Matem?ticas'),
(520, 'Astronom?a y ciencias afines'),
(530, 'F?sica'),
(540, 'Qu?mica y ciencias afines'),
(550, 'Ciencias de la tierra'),
(560, 'Paleontolog?a Paleozoolog?a'),
(570, 'Ciencias de la vida Biolog?a'),
(580, 'Plantas'),
(590, 'Animales'),
(600, 'Tecnolog?a (Ciencias aplicadas)'),
(610, 'Ciencias m?dicas Medicina'),
(620, 'Ingenier?aa y operaciones afines'),
(630, 'Agricultura y tecnolog?a relacionadas'),
(640, 'Econom?a dom?stica y vida familiar'),
(650, 'Gerencia y servicios auxiliares'),
(660, 'Ingenier?a qu?mica'),
(670, 'Manufactura'),
(680, 'Manufactura para usos espec?ficos'),
(690, 'Construcci?n'),
(700, 'Las artes Bellas artes y artes decorativas'),
(710, 'Urbanismo y arte paisaj?stico'),
(720, 'Arquitectura'),
(730, 'Artes pl?sticas Escultura'),
(740, 'Dibujo y artes decorativas'),
(750, 'Pintura y pinturas'),
(760, 'Artes gr?ficas Arte de grabar y grabados'),
(770, 'Fotograf?a y fotograf?as'),
(780, 'M?sica'),
(790, 'Artes recreativas y de la actuaci?n'),
(800, 'Literatura y ret?rica'),
(810, 'Literatura norteamericana en ingl?s'),
(820, 'Literaturas inglesa e inglesa antigua'),
(830, 'Literaturas de lenguas germ?nicas'),
(840, 'Literaturas de lenguas romances'),
(850, 'Literaturas italiana, rumana, retorromana'),
(860, 'Literaturas espa?ola y portuguesa'),
(870, 'Literaturas it?licas Literatura latina'),
(880, 'Literaturas hel?nicas Literatura griega cl?sica'),
(890, 'Literaturas de otras lenguas'),
(900, 'Geograf?a e historia'),
(910, 'Geograf?a y viajes'),
(920, 'Biograf?a genealog?a, insignias'),
(930, 'Historia del mundo antiguo hasta ca. 499'),
(940, 'Historia general de Europa'),
(950, 'Historia general de Asia Lejano Oriente'),
(960, 'Historia general de ??frica'),
(970, 'Historia general de Am?rica del Norte'),
(980, 'Historia general de Am?rica del Sur'),
(990, 'Historia general de otras ?reas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credencial`
--

CREATE TABLE `credencial` (
  `idCredencial` int(11) NOT NULL,
  `idVisitante` int(11) NOT NULL,
  `fechaExpedicion` date NOT NULL,
  `foto` varchar(100) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `cp` int(5) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nombreTrabajo` varchar(50) NOT NULL,
  `telefonoTrabajo` varchar(12) NOT NULL,
  `coloniaTrabajo` varchar(50) NOT NULL,
  `calleTrabajo` varchar(50) NOT NULL,
  `numeroTrabajo` varchar(50) NOT NULL,
  `cpTrabajo` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `credencial`
--

INSERT INTO `credencial` (`idCredencial`, `idVisitante`, `fechaExpedicion`, `foto`, `colonia`, `calle`, `numero`, `cp`, `telefono`, `correo`, `nombreTrabajo`, `telefonoTrabajo`, `coloniaTrabajo`, `calleTrabajo`, `numeroTrabajo`, `cpTrabajo`) VALUES
(1, 2, '2017-11-26', 'fakepath/1.jpg', 'Valverde', 'Tota Carbjal', '151', 76898, '4427856434', 'asdfasdfa_adsf@hotmail.com', 'Instituto Juan Carlos Valverde', '4422497771', 'Las Brujas', 'Roncopollo', '8', 2147483647),
(2, 3, '2017-11-27', 'fakepath/2.jpg', 'Menchaca', 'Ol?mpica', '6', 76435, '4426789876', 'asdfa.sfda@gmail.com', 'ITESM', '4423222341', 'Alamos', 'Castilla', '134', 2147483647),
(3, 4, '2017-11-28', 'fakepath/3.jpg', 'Brisas del Rinc?n', 'Grecia', '474', 76483, '4423637389', 'asdfasdf.asdf@gmail.com', 'Maicrosof', '4427678877', 'Jurica', 'Cedros', '152', 2147483647),
(4, 5, '2017-11-29', 'fakepath/4.jpg', 'Pedregal del C?rmen', 'Pino', '56', 76494, '4423635343', 'ji.ji.ji@hotmail.com', 'Oracle', '4428765432', 'Las Brujas', 'Roncopollo', '4321', 2147483647),
(5, 6, '2017-11-30', 'fakepath/5.jpg', 'Visca?no', 'Benito Ju?rez', '76', 76023, '4428765463', 'asdf2334@hotmail.com', 'Facebook', '4429998877', 'Alamos', 'Castilla', '5415', 2147483647),
(6, 7, '2017-12-01', 'fakepath/6.jpg', 'Pie de la Cuesta', 'Guanajuato', '867', 76835, '4427879567', 'gigigi345@gmail.com', 'Tesla Motors', '4422223344', 'Jurica', 'Cedros', '153', 2147483647),
(7, 8, '2017-12-02', 'fakepath/7.jpg', 'Calcio', 'Colina', '5', 76534, '4421234122', 'ji.3.4ñlkajf@hotmail.com', 'Amazon', '4421112323', 'Las Brujas', 'Roncopollo', '657', 2147483647),
(8, 9, '2017-12-03', 'fakepath/8.jpg', 'Valverde', 'Monte', '67', 76111, '4436565758', 'añaña@gmail.com', 'National Instruments', '4421232211', 'Alamos', 'Castilla', '874', 2147483647),
(9, 10, '2017-12-04', 'fakepath/9.jpg', 'Bellavista', 'Quetzal', '999', 76222, '4421615243', 'jojojojojijiji@gmail.com', 'Tata Consulting Services', '4420991212', 'Jurica', 'Cedros', '347', 2147483647),
(10, 11, '2017-12-05', 'fakepath/10.jpg', 'Con?feras', 'Villa de las flores', '7', 76321, '4420009878', 'gogoliko@gmail.com', 'Tata Consulting Services', '4427877766', 'Las Brujas', 'Roncopollo', '232', 2147483647),
(11, 12, '2017-12-06', 'fakepath/11.jpg', 'Fray Jun?pero Serra', 'Sor Juana Inés de la Cruz', '456', 76453, '4427870008', 'nino.nino.nino@outlook.com', 'Tata Consulting Services', '4420987667', 'Alamos', 'Castilla', '654', 2147483647),
(12, 13, '2017-12-07', 'fakepath/12.jpg', 'Con?n', 'Pilares', '467', 76333, '4429090901', 'ja.je.ji.jo.ju@outlook.com', 'Space X', '4420909988', 'Jurica', 'Cedros', '941', 2147483647),
(13, 14, '2017-12-08', 'fakepath/13.jpg', 'Juan Pablo II', 'Atlantes', '45', 76444, '4429879871', 'asdf34@gmail.com@outlook.com', 'X.com', '4421112323', 'Las Brujas', 'Roncopollo', '456', 2147483647),
(14, 15, '2017-12-09', 'fakepath/14.jpg', 'San Jos?', 'Pir?mide del sol', '2435', 76454, '4421234567', 'xxxkiritoxxx@outlook.com', 'Facebook', '4420009988', 'Alamos', 'Castilla', '24', 2147483647),
(15, 16, '2017-12-10', 'fakepath/15.jpg', 'Col?n', 'Juan Mart?n Gonz?lez', '151', 76445, '4428977509', 'golongolito@gmail.com', 'Google', '4425330909', 'Jurica', 'Cedros', '154', 2147483647),
(16, 17, '2017-12-11', 'fakepath/16.jpg', 'San Bartolomé de las Casas', 'Epigmenio Gonz?lez', '2', 76888, '4420099009', 'juan.pineda_loko@yahoo.mx', 'Amazon', '4421112211', 'Las Brujas', 'Roncopollo', '5', 2147483647),
(17, 18, '2017-12-12', 'fakepath/17.jpg', 'Fray Jos? Iturrugu?a', 'Ping?inos', '2', 76889, '4423113311', 'gonzalezpuku@gmail.com', 'National Instruments', '4424422497', 'Alamos', 'Castilla', '2', 2147483647),
(18, 19, '2017-12-13', 'fakepath/18.jpg', 'Pinos', 'Cormoranes', '1', 76988, '4428899008', 'juancarlosmaney13@gmail.com', 'Tata Consulting Services', '4421230909', 'Jurica', 'Cedros', '234', 2147483647),
(19, 20, '2017-12-14', 'fakepath/19.jpg', 'Jarabe', 'Tuc?n', '100', 76999, '4421111123', 'mamey3215@yahoo.mx', 'The Boring Company', '4422717942', 'Las Brujas', 'Roncopollo', '105', 2147483647),
(20, 1, '2017-12-15', 'fakepath/20.jpg', 'Dulzura', 'Ballena Azul', '151', 76808, '4685656561', 'kirito7814@yahoo.mx', 'The Boring Company', '4427776012', 'Alamos', 'Castilla', '2357', 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credencial_fiador`
--

CREATE TABLE `credencial_fiador` (
  `idCredencial` int(11) NOT NULL,
  `idFiador` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `credencial_fiador`
--

INSERT INTO `credencial_fiador` (`idCredencial`, `idFiador`, `fecha`) VALUES
(1, 12, '0000-00-00'),
(2, 13, '0000-00-00'),
(3, 14, '0000-00-00'),
(4, 15, '0000-00-00'),
(5, 16, '0000-00-00'),
(6, 17, '0000-00-00'),
(7, 18, '0000-00-00'),
(8, 19, '0000-00-00'),
(9, 20, '0000-00-00'),
(10, 1, '0000-00-00'),
(11, 2, '0000-00-00'),
(12, 3, '0000-00-00'),
(13, 4, '0000-00-00'),
(14, 5, '0000-00-00'),
(15, 6, '0000-00-00'),
(16, 7, '0000-00-00'),
(17, 8, '0000-00-00'),
(18, 9, '0000-00-00'),
(19, 10, '0000-00-00'),
(20, 11, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplar`
--

CREATE TABLE `ejemplar` (
  `idEjemplar` int(11) NOT NULL,
  `ISBN` char(13) NOT NULL,
  `estante` varchar(10) NOT NULL,
  `editorial` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `volumen` int(11) DEFAULT NULL,
  `fechaIngreso` date NOT NULL,
  `claveIngreso` varchar(50) NOT NULL,
  `idTitulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ejemplar`
--

INSERT INTO `ejemplar` (`idEjemplar`, `ISBN`, `estante`, `editorial`, `year`, `volumen`, `fechaIngreso`, `claveIngreso`, `idTitulo`) VALUES
(1, '968-19-1080-X', 'N/A', 'ALAMAH', 2002, 0, '0000-00-00', 'CL', 1),
(2, '968-19-1080-X', 'N/A', 'ALAMAH', 2002, 0, '0000-00-00', 'CL', 1),
(3, '84-481-2124-4', 'N/A', 'MC GRAW HILL', 1999, 0, '0000-00-00', 'DG 242', 2),
(4, '970-10-2628-4', 'N/A', 'MC GRAW HILL', 2000, 0, '0000-00-00', 'DG 243', 3),
(5, '84-95318-59-8', 'N/A', 'INFOR BOOKS', 2000, 0, '0000-00-00', 'DG248', 4),
(6, '0-07-212433-4', 'N/A', 'OSBORNE', 2001, 0, '0000-00-00', 'DG 340', 5),
(7, '1-861002-53-X', 'N/A', 'WROX PRESS', 1999, 0, '0000-00-00', 'DG 357', 6),
(8, '978-0-07-1105', 'N/A', 'MC GRAW HILL', 2007, 0, '0000-00-00', 'DG 422', 7),
(9, '970-10-3632-8', 'N/A', 'MC GRAW HILL', 2003, 0, '0000-00-00', 'DG 431', 8),
(10, '968-439-058-0', 'N/A', 'PC', 1970, 0, '0000-00-00', 'DG 433', 9),
(11, '0-07-286824-4', 'N/A', 'MC GRAW HILL', 2006, 0, '0000-00-00', 'DG 1182', 10),
(12, '978-84-782-90', 'N/A', 'PEARSON EDUCACIÓN', 2007, 0, '0000-00-00', 'CL 54', 11),
(13, 'SN', 'N/A', 'MCGRAW-HILL', 1961, 0, '0000-00-00', 'DG', 12),
(14, '978-607-462-0', 'N/A', 'EEL COLEGIO DE MEXICO', 2009, 0, '0000-00-00', 'DG', 13),
(15, 'SN', 'N/A', 'EL COLEGIO DE MEXICO', 1980, 0, '0000-00-00', 'DG', 14),
(16, 'SN', 'N/A', 'IEEQ', 2005, 0, '0000-00-00', 'DG', 15),
(17, '84-02-04361-5', 'N/A', 'BRUGUERA', 1975, 0, '0000-00-00', 'DG', 16),
(18, 'SN', 'N/A', 'INEGI', 2004, 0, '0000-00-00', 'DG', 17),
(19, '968-19-0933-X', 'N/A', 'TAURUS', 2003, 0, '0000-00-00', 'CL', 18),
(20, '968-19-0933-X', 'N/A', 'TAURUS', 2003, 0, '0000-00-00', 'CL', 18),
(21, '968-19-0933-X', 'N/A', 'TAURUS', 2003, 0, '0000-00-00', 'CL', 18),
(22, '968-19-0933-X', 'N/A', 'TAURUS', 2003, 0, '0000-00-00', 'CL', 18),
(23, '968-19-0933-X', 'N/A', 'TAURUS', 2003, 0, '0000-00-00', 'CL', 18),
(24, '968-19-0933-X', 'N/A', 'TAURUS', 2003, 0, '0000-00-00', 'CL', 18),
(25, '968-16-4976-1', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 1996, 27, '0000-00-00', 'DO', 19),
(26, '968-16-4738-6', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 1995, 26, '0000-00-00', 'DO', 20),
(27, '968-16-4710-6', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 1995, 25, '0000-00-00', 'DO', 21),
(28, '968-16-4478-6', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 1994, 24, '0000-00-00', 'DO', 22),
(29, 'SN', 'N/A', 'DIANA', 1976, 0, '0000-00-00', 'DG', 23),
(30, '968-6361-49-9', 'N/A', 'CONSEJO ESTATAL PARA LA CULTURA', 1996, 0, '0000-00-00', 'DG', 24),
(31, 'SN', 'N/A', 'PLAZA & JANÉS', 1980, 6, '0000-00-00', 'DG', 25),
(32, '968-16-1697-9', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 1984, 0, '0000-00-00', 'DG', 26),
(33, '968-16-1697-9', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 1984, 0, '0000-00-00', 'DG', 26),
(34, '968-16-6717-4', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 2002, 0, '0000-00-00', 'CL', 27),
(35, 'SN', 'N/A', 'TRILLAS', 1968, 0, '0000-00-00', 'DG', 28),
(36, 'SN', 'N/A', 'UTEHA', 1967, 0, '0000-00-00', 'DG', 29),
(37, '970-9026-40-2', 'N/A', 'SECRETARIA DE DESARROLLO SOCIAL', 1999, 0, '0000-00-00', 'DG', 30),
(38, '970-9026-40-2', 'N/A', 'SECRETARIA DE DESARROLLO SOCIAL', 1999, 0, '0000-00-00', 'DG', 30),
(39, '970-9026-40-2', 'N/A', 'SECRETARIA DE DESARROLLO SOCIAL', 1999, 0, '0000-00-00', 'DG', 30),
(40, '968-16-1063-6', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 1982, 0, '0000-00-00', 'DG', 31),
(41, '968-16-1063-6', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 1982, 0, '0000-00-00', 'DG', 31),
(42, '968-16-1063-6', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 1982, 0, '0000-00-00', 'DG', 31),
(43, '84-481-4187-3', 'N/A', 'MCGRAW-HILL', 2004, 0, '0000-00-00', 'CL', 32),
(44, '84-481-4187-3', 'N/A', 'MCGRAW-HILL', 2004, 0, '0000-00-00', 'CL', 32),
(45, '84-481-4187-3', 'N/A', 'MCGRAW-HILL', 2004, 0, '0000-00-00', 'CL', 32),
(46, '84-481-4187-3', 'N/A', 'MCGRAW-HILL', 2004, 0, '0000-00-00', 'CL', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplar_credencial`
--

CREATE TABLE `ejemplar_credencial` (
  `idEjemplar` int(11) NOT NULL,
  `idCredencial` int(11) NOT NULL,
  `fechaPrestamo` datetime NOT NULL,
  `fechaDevolucion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ejemplar_credencial`
--

INSERT INTO `ejemplar_credencial` (`idEjemplar`, `idCredencial`, `fechaPrestamo`, `fechaDevolucion`) VALUES
(1, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplar_estado`
--

CREATE TABLE `ejemplar_estado` (
  `idEjemplar` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ejemplar_estado`
--

INSERT INTO `ejemplar_estado` (`idEjemplar`, `idEstado`, `fecha`) VALUES
(1, 5, '0000-00-00'),
(2, 5, '0000-00-00'),
(3, 5, '0000-00-00'),
(4, 5, '0000-00-00'),
(5, 5, '0000-00-00'),
(6, 5, '0000-00-00'),
(7, 5, '0000-00-00'),
(8, 5, '0000-00-00'),
(9, 5, '0000-00-00'),
(10, 5, '0000-00-00'),
(11, 5, '0000-00-00'),
(12, 5, '0000-00-00'),
(13, 5, '0000-00-00'),
(14, 5, '0000-00-00'),
(15, 5, '0000-00-00'),
(16, 5, '0000-00-00'),
(17, 5, '0000-00-00'),
(18, 5, '0000-00-00'),
(19, 5, '0000-00-00'),
(20, 5, '0000-00-00'),
(21, 5, '0000-00-00'),
(22, 5, '0000-00-00'),
(23, 5, '0000-00-00'),
(24, 5, '0000-00-00'),
(25, 5, '0000-00-00'),
(26, 5, '0000-00-00'),
(27, 5, '0000-00-00'),
(28, 5, '0000-00-00'),
(29, 5, '0000-00-00'),
(30, 5, '0000-00-00'),
(31, 5, '0000-00-00'),
(32, 5, '0000-00-00'),
(33, 5, '0000-00-00'),
(34, 5, '0000-00-00'),
(35, 5, '0000-00-00'),
(36, 5, '0000-00-00'),
(37, 5, '0000-00-00'),
(38, 5, '0000-00-00'),
(39, 5, '0000-00-00'),
(40, 5, '0000-00-00'),
(41, 5, '0000-00-00'),
(42, 5, '0000-00-00'),
(43, 5, '0000-00-00'),
(44, 5, '0000-00-00'),
(45, 5, '0000-00-00'),
(46, 5, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idVisitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`timestamp`, `idVisitante`) VALUES
('0000-00-00 00:00:00', 1),
('0000-00-00 00:00:00', 3),
('0000-00-00 00:00:00', 4),
('0000-00-00 00:00:00', 5),
('0000-00-00 00:00:00', 6),
('0000-00-00 00:00:00', 7),
('0000-00-00 00:00:00', 8),
('0000-00-00 00:00:00', 9),
('0000-00-00 00:00:00', 10),
('0000-00-00 00:00:00', 13),
('0000-00-00 00:00:00', 14),
('0000-00-00 00:00:00', 15),
('0000-00-00 00:00:00', 17),
('0000-00-00 00:00:00', 18),
('0000-00-00 00:00:00', 19),
('0000-00-00 00:00:00', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `nombre`, `descripcion`) VALUES
(1, 'Prestado', 'El libro está prestado'),
(2, 'En Reparación', 'El libro está en reparación'),
(3, 'Descarte', 'El libro está por ser eliminado'),
(4, 'Dañado', 'El libro está dañado'),
(5, 'Disponible', 'El libro está disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fiador`
--

CREATE TABLE `fiador` (
  `idFiador` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoPaterno` varchar(50) NOT NULL,
  `apellidoMaterno` varchar(50) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `cp` int(5) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `ocupacion` varchar(50) NOT NULL,
  `nombreTrabajo` varchar(50) NOT NULL,
  `telefonoTrabajo` varchar(12) NOT NULL,
  `coloniaTrabajo` varchar(50) NOT NULL,
  `calleTrabajo` varchar(50) NOT NULL,
  `numeroTrabajo` varchar(50) NOT NULL,
  `cpTrabajo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fiador`
--

INSERT INTO `fiador` (`idFiador`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `colonia`, `calle`, `numero`, `cp`, `telefono`, `correo`, `ocupacion`, `nombreTrabajo`, `telefonoTrabajo`, `coloniaTrabajo`, `calleTrabajo`, `numeroTrabajo`, `cpTrabajo`) VALUES
(1, 'Emilio', 'Lopez', 'Gutierrez', 'Calesa', 'Avenida 5 de Febrero', '334', 76020, '6455068143', 'augurare@fornari.gov', 'Cient?fico de datos', 'Maleficiau plan?ssim fembrer SLU', '8829335892', 'Carolina', 'Avenida 5 de Febrero', '765', 76177),
(2, 'Natalia ', 'Buedo', 'Mangas', 'Carolina', 'Abasolo', '700', 76177, '6380447423', 'halurgies@arpegen.gov', 'Especialista en SEO', 'Desestanyant bronquinej?veu debateg?ssiu SA', '8635122373', 'Calesa', 'Abasolo', '544', 76020),
(3, 'Berthana ', 'Tufio ', 'Cortaza', 'Casa Blanca', 'Abelardo Ávila', '500', 76224, '6186496839', 'edipiques@diligenciarien.es', 'Dise?ador de videojuegos', 'Caracterol?giques forcons SL', '7499508681', 'El Campanario', 'Abelardo ?vila', '537', 76146),
(4, 'Eddy ', 'Ballugera ', 'Cabanela', 'El Arco', 'Abedul', '456', 76134, '8759996217', 'animosos@ecliptic.es', 'Comprador/vendedor de acciones', 'Desavenien neonatologies SA', '8398212739', 'El Carrizal', 'Abedul', '654', 76030),
(5, 'Juan ', 'Gabi ', 'Remolino', 'El Campanario', 'Abetal', '321', 76146, '7316257605', 'residissin@pobretejarem.eu', 'Bombero', 'Desempolain? tombassejaves atrevida SLU', '816271255', 'Jacarandas', 'Abetal', '234', 76029),
(6, 'Virgilio ', 'Raon ', 'Garate', 'El Carrizal', 'De Los Arquitos', '453', 76030, '796519563', 'voltegi@reingressarieu.net', 'Profesional en comunicaciones corporativas', 'Llotejant perxers eric?ssem', '6182565221', 'Industrial', 'De Los Arquitos', '634', 76130),
(7, 'Laila', 'O?iderra', 'Aldana', 'Eucaliptos I', 'De los Jesuitas', '963', 76160, '6254014051', 'esprintas@amansir.gov', 'Salvavidas', 'Esperonarien vesessen psicofisi?loga SA', '8278884795', 'Jacarandas', 'De los Jesuitas', '897', 76029),
(8, 'Laureano ', 'Mayllar ', 'Maria', 'Fray Juan P', 'Felipe Luna', '1513', 76036, '7144082397', 'pencut@sintetitzesses.eu', 'Gu?a tur?stico', 'Futur?logues accentuarà invents SL', '866644802', 'Insurgentes', 'Felipe Luna', '1523', 76117),
(9, 'Evangelina', 'Mendieta', 'Vi?ales', 'Hidalgo', 'Felipe Carrillo', '549', 76057, '6547455781', 'executaven@desentestau.es', 'Ayudante de oficina', 'Laiter Development', '8964720483', 'Industrial', 'Felipe Carrillo', '2134', 76130),
(10, 'Rainier ', 'Roson ', 'Acitores', 'Huertas La Joya', 'Izcoatl', '348', 76137, '8638489602', 'patronegeu@xilles.com', 'Analista de inversiones', 'Maltractaria borroners circumnavegam SL', '6588856338', 'Independencia', 'Izcoatl', '2456', 76147),
(11, 'Yamila ', 'Dobale ', 'Badas', 'Calesa', 'Jacaranda', '95', 76020, '7493808678', 'inaugurarien@desordenaven.net', 'Help-desk technician', 'Suspendre xemicava SA', '7640387549', 'Casa Blanca', 'Jacaranda', '974', 76224),
(12, 'Cirilo ', 'Perea', 'Quintairos', 'Casa Blanca', 'Jacinto', '115', 76224, '8341585821', 'destorbs@retrovenguis.gov', 'Ayudante de oficina', 'Xaparan moquejar? sobreafeg?sseu SA', '8365916296', 'Calesa', 'Jacinto', '234', 76020),
(13, 'Amargura ', 'Leyte ', 'Arizmendi', 'Independencia', 'Acceso Norte', '653', 76147, '8511548191', 'apletassim@cintre.gov', 'Notario', 'Boscada aflorarem margo', '8611829233', 'Huertas La Joya', 'Acceso Norte', '541', 76137),
(14, 'Perla', 'Reigadas', 'Balbas', 'Industrial', 'Bel?n', '536', 76130, '7828078027', 'reproduixen@presumptiu.org', 'Instructor de fitness', 'Xorr? reu apinyat SA', '8755280898', 'Hidalgo', 'Bel?n', '365', 76057),
(15, 'Pr?xedes ', 'Zubeldia', 'Alzola', 'Insurgentes', 'Berenice', '981', 76117, '8884629692', 'escloscavem@deflegmaveu.eu', 'Dise?ador de videojuegos', 'Laqui blasquisme SLU', '6821863442', 'Fray Juan P', 'Berenice', '234', 76036),
(16, 'Ryan ', 'Folgueral ', 'Cainzos', 'Jacarandas', 'Adolfo De La Huerta', '1345', 76029, '8810230781', 'voluntaris@puntualitzaveu.net', 'Cientifico', 'Rossejar?eu doloreig SL', '6452189012', 'Eucaliptos I', 'Adolfo De La Huerta', '356', 76160),
(17, 'Neudis ', 'Lezama ', 'Abad?a', 'Industrial', 'Acero', '875', 76130, '7998485655', 'desnatat@malcriem.org', 'Maestro sustituto', 'Enrandes espolseu distorsion? SL', '6921092363', 'El Campanario', 'Acero', '986', 76146),
(18, 'Ricardo ', 'Chave ', 'Mariategui', 'Jacarandas', 'Argentina', '932', 76029, '6737434542', 'testamentaria@entremesclessis.net', 'Ingeniero de Software', 'Remugaments esmorteixin SA', '6816393316', 'El Carrizal', 'Argentina', '235', 76030),
(19, 'Rita', 'Lombana ', 'Mugica', 'El Carrizal', 'Aries', '324', 76030, '7454203769', 'doble@bretxifiqueu.eu', 'Help-desk technician', 'Saltironeg?s parrell SL', '7214468080', 'El Arco', 'Aries', '2124', 76134),
(20, 'Brandol ', 'Congey ', 'Viz', 'El Campanario', 'Arist?teles', '563', 76146, '8606826404', 'sedavienques@retrogradarien.net', 'Profesional en comunicaciones corporativas', 'Bogu?ssim arrel', '6229028586', 'Casa Blanca', 'Arist?teles', '5212', 76224);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gradoestudios`
--

CREATE TABLE `gradoestudios` (
  `idGrado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gradoestudios`
--

INSERT INTO `gradoestudios` (`idGrado`, `nombre`) VALUES
(1, 'Ninguno'),
(2, 'Primaria'),
(3, 'Secundaria'),
(4, 'Preparatoria'),
(5, 'Universidad'),
(6, 'Maestria'),
(7, 'Doctorado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion`
--

CREATE TABLE `operacion` (
  `idOperacion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `operacion`
--

INSERT INTO `operacion` (`idOperacion`, `nombre`, `descripcion`) VALUES
(1, 'Consultar Actividades', 'Acceder a la interfaz que contiene el calendario d'),
(2, 'Consultar catalogo de libros', 'Ver el catálogo completo de libros registrados, bu'),
(3, 'Registrar entrada', 'Registrar la entrada de una persona a la bibliotec'),
(4, 'Tramitar credencial', 'Asignar una credencial a un usuario, ingresando lo'),
(5, 'Visualizar usuarios', 'Visualizar la lista de usuarios.'),
(6, 'Buscar visitante', 'Obtener la información completa de un visitante bu'),
(7, 'Actualizar información de un visitante', 'Modificar la información asociada con un visitante'),
(8, 'Imprimir credencial', 'Obtener un formato para imprimir una credencial co'),
(9, 'Consultar estadisticas', 'Consultar las estadísticas de entradas a la biblio'),
(10, 'Imprimir estadísticas', 'Obtener un formato para imprimir el reporte estadí'),
(11, 'Generar reporte de DGB', 'Generar un reporte con los datos que se reportan a'),
(12, 'Imprimir reporte de DGB', 'Crear un formato para imprimir el reporte de la DG'),
(13, 'Exportar estadísticas de DBG a excel', 'Exportar el reporte par la DGB a un documento de e'),
(14, 'Registrar préstamo de libro (s)', 'Registrar el préstamo de un libro a un usuario.'),
(15, 'Registrar devolución de libro(s)', 'Registrar la devolución de un libro prestado a un '),
(16, 'Fijar fecha de fin de suspensión', 'Determinar la fecha en que un usuario que entregó '),
(17, 'Imprimir códigos de barras', 'Imprimir una hoja con una lista filtrada de código'),
(18, 'Consultar listado de cuentas', 'Consultar la lista de cuentahabientes del sistema.'),
(19, 'Consultar usuarios con sanciones', 'Consultar la lista de usuarios sancionados.'),
(20, 'Agregar sanción a usuario', 'Agregar una sanción a un usuario, incluyendo la fe'),
(21, 'Quitar sanción a usuario', 'Eliminar la sanción de un usuario. '),
(22, 'Editar ejemplar', 'Editar los datos de un ejemplar.'),
(23, 'Agregar ejemplar de libro', 'Agregar un ejemplar a la base de datos.'),
(24, 'Eliminar ejemplares', 'Eliminar un ejemplar específico.'),
(25, 'Importar libros desde archivo de Excel', 'Registrar libros en la base de datos importando de'),
(26, 'Agregar cuenta', 'Dar de alta a un cuentahabiente para que pueda hac'),
(27, 'Eliminar cuenta', 'Dar de baja a un cuentahabiente para que ya no pue'),
(28, 'Editar cuenta', 'Editar el perfil de un cuentahabiente para cambiar'),
(29, 'Consultar roles', 'Consultar los roles que han sido creados.'),
(30, 'Agregar rol', 'Se crea un nuevo rol, por ejemplo: Asistente de bi'),
(31, 'Quitar rol', 'Se elimina un rol.'),
(32, 'Editar rol', 'Edita atributos del rol, como el nombre, descripci'),
(33, 'Asignar rol a cuenta', 'Asignarle a un cuentahabiente en especifico su rol'),
(34, 'Quitar rol de cuenta', 'Quitarle a un cuentahabiente en especifico su rol.'),
(35, 'Asignar permiso a rol', 'Agregarle a un rol un permiso.'),
(36, 'Quitar permiso a rol', 'Quitarle a un rol uno de sus permisos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombre`, `descripcion`) VALUES
(1, 'administrador', 'Puede utilizar todas las funciones del sistema, pu'),
(2, 'subadministrador', 'Puede hacer todo excepto dar de alta o baja a otro'),
(3, 'bibliotecario', 'No puede gestionar usuarios ni roles ni editar la '),
(4, 'becario', 'No puede gestionar usuarios ni roles, tampoco edit'),
(5, 'usuario anónimo', 'Solo puede acceder al catálogo de libros y buscar ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_operacion`
--

CREATE TABLE `rol_operacion` (
  `idRol` int(11) NOT NULL,
  `idOperacion` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol_operacion`
--

INSERT INTO `rol_operacion` (`idRol`, `idOperacion`, `fecha`) VALUES
(1, 1, '0000-00-00 00:00:00'),
(1, 2, '0000-00-00 00:00:00'),
(1, 3, '0000-00-00 00:00:00'),
(1, 4, '0000-00-00 00:00:00'),
(1, 5, '0000-00-00 00:00:00'),
(1, 6, '0000-00-00 00:00:00'),
(1, 7, '0000-00-00 00:00:00'),
(1, 8, '0000-00-00 00:00:00'),
(1, 9, '0000-00-00 00:00:00'),
(1, 10, '0000-00-00 00:00:00'),
(1, 11, '0000-00-00 00:00:00'),
(1, 12, '0000-00-00 00:00:00'),
(1, 13, '0000-00-00 00:00:00'),
(1, 14, '0000-00-00 00:00:00'),
(1, 15, '0000-00-00 00:00:00'),
(1, 16, '0000-00-00 00:00:00'),
(1, 17, '0000-00-00 00:00:00'),
(1, 18, '0000-00-00 00:00:00'),
(1, 19, '0000-00-00 00:00:00'),
(1, 20, '0000-00-00 00:00:00'),
(1, 21, '0000-00-00 00:00:00'),
(1, 22, '0000-00-00 00:00:00'),
(1, 23, '0000-00-00 00:00:00'),
(1, 24, '0000-00-00 00:00:00'),
(1, 25, '0000-00-00 00:00:00'),
(1, 26, '0000-00-00 00:00:00'),
(1, 27, '0000-00-00 00:00:00'),
(1, 28, '0000-00-00 00:00:00'),
(1, 29, '0000-00-00 00:00:00'),
(1, 30, '0000-00-00 00:00:00'),
(1, 31, '0000-00-00 00:00:00'),
(1, 32, '0000-00-00 00:00:00'),
(1, 33, '0000-00-00 00:00:00'),
(1, 34, '0000-00-00 00:00:00'),
(1, 35, '0000-00-00 00:00:00'),
(1, 36, '0000-00-00 00:00:00'),
(2, 1, '0000-00-00 00:00:00'),
(2, 2, '0000-00-00 00:00:00'),
(2, 3, '0000-00-00 00:00:00'),
(2, 4, '0000-00-00 00:00:00'),
(2, 5, '0000-00-00 00:00:00'),
(2, 6, '0000-00-00 00:00:00'),
(2, 7, '0000-00-00 00:00:00'),
(2, 8, '0000-00-00 00:00:00'),
(2, 9, '0000-00-00 00:00:00'),
(2, 10, '0000-00-00 00:00:00'),
(2, 11, '0000-00-00 00:00:00'),
(2, 12, '0000-00-00 00:00:00'),
(2, 13, '0000-00-00 00:00:00'),
(2, 14, '0000-00-00 00:00:00'),
(2, 15, '0000-00-00 00:00:00'),
(2, 16, '0000-00-00 00:00:00'),
(2, 17, '0000-00-00 00:00:00'),
(2, 18, '0000-00-00 00:00:00'),
(2, 19, '0000-00-00 00:00:00'),
(2, 20, '0000-00-00 00:00:00'),
(2, 21, '0000-00-00 00:00:00'),
(2, 22, '0000-00-00 00:00:00'),
(2, 23, '0000-00-00 00:00:00'),
(2, 24, '0000-00-00 00:00:00'),
(2, 25, '0000-00-00 00:00:00'),
(3, 1, '0000-00-00 00:00:00'),
(3, 2, '0000-00-00 00:00:00'),
(3, 3, '0000-00-00 00:00:00'),
(3, 4, '0000-00-00 00:00:00'),
(3, 5, '0000-00-00 00:00:00'),
(3, 6, '0000-00-00 00:00:00'),
(3, 7, '0000-00-00 00:00:00'),
(3, 8, '0000-00-00 00:00:00'),
(3, 9, '0000-00-00 00:00:00'),
(3, 10, '0000-00-00 00:00:00'),
(3, 11, '0000-00-00 00:00:00'),
(3, 12, '0000-00-00 00:00:00'),
(3, 13, '0000-00-00 00:00:00'),
(3, 14, '0000-00-00 00:00:00'),
(3, 15, '0000-00-00 00:00:00'),
(3, 16, '0000-00-00 00:00:00'),
(3, 17, '0000-00-00 00:00:00'),
(3, 19, '0000-00-00 00:00:00'),
(4, 1, '0000-00-00 00:00:00'),
(4, 2, '0000-00-00 00:00:00'),
(4, 3, '0000-00-00 00:00:00'),
(4, 4, '0000-00-00 00:00:00'),
(4, 5, '0000-00-00 00:00:00'),
(4, 6, '0000-00-00 00:00:00'),
(4, 8, '0000-00-00 00:00:00'),
(4, 9, '0000-00-00 00:00:00'),
(4, 10, '0000-00-00 00:00:00'),
(4, 11, '0000-00-00 00:00:00'),
(4, 12, '0000-00-00 00:00:00'),
(4, 13, '0000-00-00 00:00:00'),
(4, 14, '0000-00-00 00:00:00'),
(4, 15, '0000-00-00 00:00:00'),
(4, 16, '0000-00-00 00:00:00'),
(4, 17, '0000-00-00 00:00:00'),
(5, 1, '0000-00-00 00:00:00'),
(5, 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sancion`
--

CREATE TABLE `sancion` (
  `idSancion` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `idVisitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sancion`
--

INSERT INTO `sancion` (`idSancion`, `descripcion`, `fechaInicio`, `fechaFin`, `idVisitante`) VALUES
(1, 'Mal uso del material de la biblioteca.', '2017-11-04', '2017-12-04', 1),
(2, 'Mal uso de las instalaciones de la biblioteca.', '2017-11-05', '2017-12-05', 2),
(3, 'Regresó libro en mal estado.', '2017-11-06', '2017-12-06', 3),
(4, 'Regresó libro con 2 meses de retardo.', '2017-11-07', '2017-12-07', 4),
(5, 'Intentó retirar libros del inmueble sin préstamo.', '2017-11-08', '2017-12-08', 5),
(6, 'Mal uso del máterial de la biblioteca.', '2017-11-09', '2017-12-09', 6),
(7, 'Ingresó alimentos a la biblioteca y reaacionó mal ', '2017-11-10', '2017-12-10', 7),
(8, 'Fue grosero con el personal multiples veces.', '2017-11-11', '2017-12-11', 8),
(9, 'Regresó libro en mal estado.', '2017-11-12', '2017-12-12', 9),
(10, 'Mal uso de las instalaciones de la biblioteca.', '2017-11-13', '2017-12-13', 10),
(11, 'Ingresó un conejo y se negaba a retirarse. ', '2017-11-14', '2017-12-14', 11),
(12, 'Mal uso de las instalaciones de la biblioteca.', '2017-11-15', '2017-12-15', 12),
(13, 'Mal uso de las instalaciones de la biblioteca.', '2017-11-16', '2017-12-16', 13),
(14, 'Ingresó en estado alcoholico y mal comportamiento.', '2017-11-17', '2017-12-17', 14),
(15, 'Regresó libro en mal estado.', '2017-11-18', '2017-12-18', 15),
(16, 'Mal uso del máterial de la biblioteca.', '2017-11-19', '2017-12-19', 16),
(17, 'Regresó libro en mal estado.', '2017-11-20', '2017-12-20', 17),
(18, 'Regresó libro con 8 meses de retardo.', '2017-11-21', '2017-12-21', 18),
(19, 'Intentó retirar libros del inmueble sin préstamo.', '2017-11-22', '2017-12-22', 19),
(20, 'Regresó libro en mal estado.', '2017-11-23', '2017-12-23', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo`
--

CREATE TABLE `titulo` (
  `idTitulo` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `titulo`
--

INSERT INTO `titulo` (`idTitulo`, `titulo`, `year`) VALUES
(1, 'FENG-SHUI PARA LA VIDA', 2002),
(2, 'SUPERUTILIDADES PARA JAVA SCRIPT', 1999),
(3, 'ARQUITECTURA DE LA IMFORMACION PARA EL WWW', 2000),
(4, 'DISEÑO Y PROGRAMACION DE APLICACIONES PARA E-COMME', 2000),
(5, 'WINDOWS 2000 SECURITY HANDBOOK', 2001),
(6, 'OUTLOOK 2000 VBA PROGRAMMERS REFERENCE', 1999),
(7, 'INTERNATIONAL MARKETING', 2007),
(8, 'METODOLOGIA DE LA INVESTIGACION', 2003),
(9, 'BIOQUIMICA', 1970),
(10, 'ESTADISTICA APLICADA A LOS NEGOCIOS Y LA ECONOMIA', 2006),
(11, 'BIOPSICOLOGÍA', 2007),
(12, 'THE ANALYSIS OF BEHAVIOR', 1961),
(13, 'LA INTRODUCCION DEL ARISTOTELISMO EN CHINA A TRAVE', 2009),
(14, 'MIGRACION Y DESARROLLO 5', 1980),
(15, 'RETROSPECTIVA ELECTORAL', 2005),
(16, 'EL PRINCIPE (OBRAS INMORTALES)', 1975),
(17, 'ANUARIO ESTADÍSTICO DE LOS ESTADOS UNIDOS MEXICANO', 2004),
(18, 'HISTORIA DEL PARAÍSO', 2003),
(19, 'ANTOLOGÍA DE LA PLANEACIÓN EN MÉXICO (TOMO 27)', 1996),
(20, 'ANTOLOGÍA DE LA PLANEACIÓN EN MÉXICO (TOMO 26)', 1995),
(21, 'ANTOLOGÍA DE LA PLANEACIÓN EN MÉXICO (TOMO 25)', 1995),
(22, 'ANTOLOGÍA DE LA PLANEACIÓN EN MÉXICO (TOMO 24)', 1994),
(23, 'EL VENDEDOR MAS GRANDE DEL MUNDO', 1976),
(24, 'POEMAS DE LAS AVES Y LOS AÑOS', 1996),
(25, 'LOS PREMIOS PULITZER DE NOVELA VI', 1980),
(26, 'LA CRISIS INTERNACIONAL Y LA AMÉRICA LATINA', 1984),
(27, '¿QUÉ SON LAS MATEMÁTICAS?', 2002),
(28, 'EL MARXISMO HOY EN DÍA', 1968),
(29, 'LA DEMOGRACIA EN LA ACTUALIDAD', 1967),
(30, 'REGIONES PRIORITARIAS', 1999),
(31, 'PSICOTERAPIA FAMILIAR', 1982),
(32, 'ESTRATEGIA DE MARKETING SUN TZU', 2004);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo_autor`
--

CREATE TABLE `titulo_autor` (
  `idAutor` int(11) NOT NULL,
  `idTitulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `titulo_autor`
--

INSERT INTO `titulo_autor` (`idAutor`, `idTitulo`) VALUES
(1, 2),
(2, 3),
(3, 16),
(4, 6),
(5, 7),
(6, 8),
(7, 9),
(8, 10),
(9, 11),
(10, 29),
(11, 13),
(12, 14),
(13, 15),
(14, 1),
(15, 1),
(16, 17),
(17, 1),
(18, 18),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 19),
(24, 20),
(25, 1),
(26, 21),
(27, 22),
(28, 23),
(29, 24),
(30, 25),
(31, 26),
(32, 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo_categoria`
--

CREATE TABLE `titulo_categoria` (
  `idCategoria` int(11) NOT NULL,
  `idTitulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `titulo_categoria`
--

INSERT INTO `titulo_categoria` (`idCategoria`, `idTitulo`) VALUES
(1, 190),
(2, 600),
(3, 720),
(4, 600),
(5, 600),
(6, 600),
(7, 70),
(8, 70),
(9, 660),
(10, 310),
(11, 150),
(12, 120),
(13, 190),
(14, 60),
(15, 320),
(16, 800),
(17, 80),
(18, 810),
(19, 80),
(20, 80),
(21, 80),
(22, 80),
(23, 380),
(24, 810),
(25, 120),
(26, 330),
(27, 500),
(28, 320),
(29, 900),
(30, 900),
(31, 150),
(32, 670);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(25) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `nombre`, `password`) VALUES
('Admin', 'Admin1', 'Elon Musk'),
('Agonzales', '7iNxm', 'Andrea González Pérez'),
('Bmartinez', '7iNxm', 'Brenda Eugenia Martínez Pérez'),
('Cmunoz', '7iNxm', 'Catalina Muñoz Pérez'),
('Cvazquez', 'hS6#8', 'Claudia Guadalupe Vázquez Vázquez'),
('diegoB', 'Lagatadelaiter#1', 'Diego Betanzos'),
('Dlopez', 'Ea@7!', 'Daniel López Correa'),
('Dojeda', 'hS6#8', 'Daniel Ojeda Pérez'),
('Ecabrera', 'Ea@7!', 'Ernestina Cabrera Ramírez'),
('Elopez', 'Ea@7!', 'Eugenio López Cardona'),
('Fsolis', '7iNxm', 'Fernando Solís Perea'),
('Jgonzales', 'hS6#8', 'Juana Guadalupe González de la Cruz'),
('Jmartinez', 'hS6#8', 'Juan Carlos Martínez López'),
('Jperez', 'hS6#8', 'Juan Pérez Rosales'),
('Lgonzales', '7iNxm', 'Luz Elena González Martínez'),
('Mcruz', '7iNxm', 'María del Carmen de la Cruz Martínez'),
('Mguadaluoe', 'hS6#8', 'María Guadalupe Ramírez Castro'),
('Mguitierrez', 'hS6#8', 'Manuel Gutiérrez Pérez'),
('Mlopez', 'Ea@7!', 'Margarita López Correa'),
('Mperez', 'Ea@7!', 'María Pérez López'),
('Rcruz', 'Ea@7!', 'Roberto Cruz Pérez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE `usuario_rol` (
  `usuario` varchar(25) NOT NULL,
  `idRol` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`usuario`, `idRol`, `fecha`) VALUES
('Admin', 1, '0000-00-00 00:00:00'),
('Agonzales', 2, '0000-00-00 00:00:00'),
('Bmartinez', 4, '0000-00-00 00:00:00'),
('Cmunoz', 2, '0000-00-00 00:00:00'),
('Cvazquez', 3, '0000-00-00 00:00:00'),
('Dlopez', 4, '0000-00-00 00:00:00'),
('Dojeda', 3, '0000-00-00 00:00:00'),
('Ecabrera', 3, '0000-00-00 00:00:00'),
('Elopez', 1, '0000-00-00 00:00:00'),
('Fsolis', 4, '0000-00-00 00:00:00'),
('Jgonzales', 4, '0000-00-00 00:00:00'),
('Jmartinez', 3, '0000-00-00 00:00:00'),
('Jperez', 4, '0000-00-00 00:00:00'),
('Lgonzales', 5, '0000-00-00 00:00:00'),
('Mcruz', 4, '0000-00-00 00:00:00'),
('Mguadaluoe', 3, '0000-00-00 00:00:00'),
('Mguitierrez', 4, '0000-00-00 00:00:00'),
('Mlopez', 2, '0000-00-00 00:00:00'),
('Mperez', 3, '0000-00-00 00:00:00'),
('Rcruz', 3, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitante`
--

CREATE TABLE `visitante` (
  `idVisitante` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoPaterno` varchar(50) NOT NULL,
  `apellidoMaterno` varchar(50) DEFAULT NULL,
  `fechaNacimiento` date NOT NULL,
  `genero` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `visitante`
--

INSERT INTO `visitante` (`idVisitante`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `fechaNacimiento`, `genero`) VALUES
(1, 'Jorge Alberto', 'Niño', 'Cabal', '0000-00-00', 'M'),
(2, 'Eduardo', 'Cuesta', 'Córdova', '0000-00-00', 'O'),
(3, 'Bernardo', 'Laing', 'Bernal', '0000-00-00', 'O'),
(4, 'Paulo', 'Solis', 'Alvarez', '0000-00-00', 'M'),
(5, 'Alberto', 'Einstein', 'de la Llave', '0000-00-00', 'M'),
(6, 'Martin', 'Vivanco', 'Martinez', '0000-00-00', 'M'),
(7, 'Ariadna', 'Güemes', 'Ramirez', '0000-00-00', 'F'),
(8, 'Dante', 'Sanchez', 'Gomez', '0000-00-00', 'M'),
(9, 'Susana', 'Puga', 'Martinez', '0000-00-00', 'F'),
(10, 'Andres', 'Colinas', 'Cruz', '0000-00-00', 'M'),
(11, 'Bernardo', 'Ramirez', 'Gomez', '0000-00-00', 'M'),
(12, 'Juliana', 'Montero', 'Torres', '0000-00-00', 'F'),
(13, 'Ernesto', 'Colinas', 'Cruz', '0000-00-00', 'M'),
(14, 'Adriana', 'Martinez', 'Muñoz', '0000-00-00', 'F'),
(15, 'Frida', 'Castillo', 'Cruz', '0000-00-00', 'F'),
(16, 'Jorge Alberto', 'Bringas', 'Coutiño', '0000-00-00', 'M'),
(17, 'Mariana', 'Alvarez', 'Dominguez', '0000-00-00', 'F'),
(18, 'Cesar', 'Cancino', 'Perez', '0000-00-00', 'M'),
(19, 'Benjamin', 'Terrazas', 'Figueroa', '0000-00-00', 'M'),
(20, 'Walter', 'Nuñez', 'Mercado', '0000-00-00', 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitante_gradoestudios`
--

CREATE TABLE `visitante_gradoestudios` (
  `idVisitante` int(11) NOT NULL,
  `idGrado` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `visitante_gradoestudios`
--

INSERT INTO `visitante_gradoestudios` (`idVisitante`, `idGrado`, `fecha`) VALUES
(1, 1, '0000-00-00 00:00:00'),
(2, 2, '0000-00-00 00:00:00'),
(3, 3, '0000-00-00 00:00:00'),
(4, 4, '0000-00-00 00:00:00'),
(5, 4, '0000-00-00 00:00:00'),
(6, 2, '0000-00-00 00:00:00'),
(7, 4, '0000-00-00 00:00:00'),
(8, 1, '0000-00-00 00:00:00'),
(9, 6, '0000-00-00 00:00:00'),
(10, 7, '0000-00-00 00:00:00'),
(11, 4, '0000-00-00 00:00:00'),
(12, 5, '0000-00-00 00:00:00'),
(13, 8, '0000-00-00 00:00:00'),
(14, 3, '0000-00-00 00:00:00'),
(15, 4, '0000-00-00 00:00:00'),
(16, 5, '0000-00-00 00:00:00'),
(17, 5, '0000-00-00 00:00:00'),
(18, 5, '0000-00-00 00:00:00'),
(19, 2, '0000-00-00 00:00:00'),
(20, 7, '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `credencial`
--
ALTER TABLE `credencial`
  ADD PRIMARY KEY (`idCredencial`),
  ADD KEY `idVisitante` (`idVisitante`);

--
-- Indices de la tabla `credencial_fiador`
--
ALTER TABLE `credencial_fiador`
  ADD PRIMARY KEY (`idCredencial`,`idFiador`,`fecha`),
  ADD KEY `idCredencial` (`idCredencial`),
  ADD KEY `idFiador` (`idFiador`);

--
-- Indices de la tabla `ejemplar`
--
ALTER TABLE `ejemplar`
  ADD PRIMARY KEY (`idEjemplar`),
  ADD KEY `idTitulo` (`idTitulo`);

--
-- Indices de la tabla `ejemplar_credencial`
--
ALTER TABLE `ejemplar_credencial`
  ADD PRIMARY KEY (`idEjemplar`,`idCredencial`,`fechaPrestamo`),
  ADD KEY `idEjemplar` (`idEjemplar`),
  ADD KEY `idCredencial` (`idCredencial`);

--
-- Indices de la tabla `ejemplar_estado`
--
ALTER TABLE `ejemplar_estado`
  ADD PRIMARY KEY (`idEjemplar`,`idEstado`,`fecha`),
  ADD KEY `idEjemplar` (`idEjemplar`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`timestamp`,`idVisitante`),
  ADD KEY `idVisitante` (`idVisitante`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `fiador`
--
ALTER TABLE `fiador`
  ADD PRIMARY KEY (`idFiador`);

--
-- Indices de la tabla `gradoestudios`
--
ALTER TABLE `gradoestudios`
  ADD PRIMARY KEY (`idGrado`);

--
-- Indices de la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD PRIMARY KEY (`idOperacion`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `rol_operacion`
--
ALTER TABLE `rol_operacion`
  ADD PRIMARY KEY (`idRol`,`idOperacion`,`fecha`),
  ADD KEY `idOperacion` (`idRol`),
  ADD KEY `idRol` (`idOperacion`);

--
-- Indices de la tabla `sancion`
--
ALTER TABLE `sancion`
  ADD PRIMARY KEY (`idSancion`),
  ADD KEY `idVisitante` (`idVisitante`);

--
-- Indices de la tabla `titulo`
--
ALTER TABLE `titulo`
  ADD PRIMARY KEY (`idTitulo`);

--
-- Indices de la tabla `titulo_autor`
--
ALTER TABLE `titulo_autor`
  ADD PRIMARY KEY (`idAutor`,`idTitulo`),
  ADD KEY `idAutor` (`idAutor`),
  ADD KEY `idTitulo` (`idTitulo`);

--
-- Indices de la tabla `titulo_categoria`
--
ALTER TABLE `titulo_categoria`
  ADD PRIMARY KEY (`idCategoria`,`idTitulo`),
  ADD KEY `idTitulo` (`idCategoria`),
  ADD KEY `idCategoria` (`idTitulo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`);

--
-- Indices de la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD PRIMARY KEY (`usuario`,`idRol`,`fecha`),
  ADD KEY `idUsuario` (`usuario`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `visitante`
--
ALTER TABLE `visitante`
  ADD PRIMARY KEY (`idVisitante`);

--
-- Indices de la tabla `visitante_gradoestudios`
--
ALTER TABLE `visitante_gradoestudios`
  ADD PRIMARY KEY (`idVisitante`,`idGrado`,`fecha`),
  ADD KEY `idVisitante` (`idVisitante`),
  ADD KEY `idGrado` (`idGrado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=991;

--
-- AUTO_INCREMENT de la tabla `credencial`
--
ALTER TABLE `credencial`
  MODIFY `idCredencial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `ejemplar`
--
ALTER TABLE `ejemplar`
  MODIFY `idEjemplar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `fiador`
--
ALTER TABLE `fiador`
  MODIFY `idFiador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `gradoestudios`
--
ALTER TABLE `gradoestudios`
  MODIFY `idGrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `operacion`
--
ALTER TABLE `operacion`
  MODIFY `idOperacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sancion`
--
ALTER TABLE `sancion`
  MODIFY `idSancion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `titulo`
--
ALTER TABLE `titulo`
  MODIFY `idTitulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `visitante`
--
ALTER TABLE `visitante`
  MODIFY `idVisitante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `credencial_fiador`
--
ALTER TABLE `credencial_fiador`
  ADD CONSTRAINT `fkCredencial` FOREIGN KEY (`idCredencial`) REFERENCES `credencial` (`idCredencial`),
  ADD CONSTRAINT `fkFiador` FOREIGN KEY (`idFiador`) REFERENCES `fiador` (`idFiador`);

--
-- Filtros para la tabla `ejemplar`
--
ALTER TABLE `ejemplar`
  ADD CONSTRAINT `fkTituloEjemplar` FOREIGN KEY (`idTitulo`) REFERENCES `titulo` (`idTitulo`);

--
-- Filtros para la tabla `ejemplar_credencial`
--
ALTER TABLE `ejemplar_credencial`
  ADD CONSTRAINT `fkidCredencial` FOREIGN KEY (`idCredencial`) REFERENCES `credencial` (`idCredencial`),
  ADD CONSTRAINT `fkidEjemplar` FOREIGN KEY (`idEjemplar`) REFERENCES `ejemplar` (`idEjemplar`);

--
-- Filtros para la tabla `ejemplar_estado`
--
ALTER TABLE `ejemplar_estado`
  ADD CONSTRAINT `fkEjemplar` FOREIGN KEY (`idEjemplar`) REFERENCES `ejemplar` (`idEjemplar`),
  ADD CONSTRAINT `fkEstado` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`);

--
-- Filtros para la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `fkVisitanteEntra` FOREIGN KEY (`idVisitante`) REFERENCES `visitante` (`idVisitante`);

--
-- Filtros para la tabla `rol_operacion`
--
ALTER TABLE `rol_operacion`
  ADD CONSTRAINT `fkOperacion` FOREIGN KEY (`idOperacion`) REFERENCES `operacion` (`idOperacion`),
  ADD CONSTRAINT `foreignKeyRol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);

--
-- Filtros para la tabla `sancion`
--
ALTER TABLE `sancion`
  ADD CONSTRAINT `fkVisitanteSancion` FOREIGN KEY (`idVisitante`) REFERENCES `visitante` (`idVisitante`);

--
-- Filtros para la tabla `titulo_autor`
--
ALTER TABLE `titulo_autor`
  ADD CONSTRAINT `fkAutor` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`idAutor`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkTituloAutor` FOREIGN KEY (`idTitulo`) REFERENCES `titulo` (`idTitulo`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `titulo_categoria`
--
ALTER TABLE `titulo_categoria`
  ADD CONSTRAINT `fkCategoria` FOREIGN KEY (`idTitulo`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `fkTitulo` FOREIGN KEY (`idCategoria`) REFERENCES `titulo` (`idTitulo`);

--
-- Filtros para la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `fkRol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`),
  ADD CONSTRAINT `fkUsuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`usuario`);

--
-- Filtros para la tabla `visitante_gradoestudios`
--
ALTER TABLE `visitante_gradoestudios`
  ADD CONSTRAINT `fkGrado` FOREIGN KEY (`idGrado`) REFERENCES `gradoestudios` (`idGrado`),
  ADD CONSTRAINT `fkVisitanteG` FOREIGN KEY (`idVisitante`) REFERENCES `visitante` (`idVisitante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
