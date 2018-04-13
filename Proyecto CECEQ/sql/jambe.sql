-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2018 a las 19:54:25
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
(30, 'JOHN L.', 'GRAHAM', ''),
(31, 'Martin', 'Vivanco', ''),
(35, 'andres', 'vivanco', ''),
(36, 'pau', '', '');

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
(1, 'Conocimiento '),
(2, 'El libro '),
(3, 'Sistemas '),
(4, 'Procesamiento de datos Ciencia de los computadores'),
(5, 'Programación de computadoras, programas, datos '),
(6, 'Métodos especiales de computación '),
(10, 'Bibliografía '),
(11, 'Bibliografías '),
(12, 'De individuos '),
(13, 'De obras por clases específicas de autores '),
(14, 'De obras anónimas & seudónimas '),
(15, 'De obras de lugares específicos '),
(16, 'De obras sobre temas específicos '),
(17, 'Catálogos generales por materia '),
(18, 'Catálogos ordenados por autor & fecha '),
(19, 'Catálogos diccionario '),
(20, 'Bibliotecología & ciencias de la información '),
(21, 'Relaciones de bibliotecas '),
(22, 'Administración de la planta física '),
(23, 'Administración de personal '),
(25, 'Operaciones bibliotecarias '),
(26, 'Bibliotecas para temas específicos '),
(27, 'Bibliotecas generales '),
(28, 'Lectura, uso de otros medios de información '),
(30, 'Enciclopedias generales '),
(31, 'Norteamericanas '),
(32, 'En inglés '),
(33, 'En otras lenguas germánicas '),
(34, 'En francés, provenzal, catalán '),
(35, 'En italiano, rumano, retorromano '),
(36, 'En español, & portugués '),
(37, 'En lenguas eslavas '),
(38, 'En lenguas escandinavas '),
(39, 'En otras lenguas '),
(50, 'Publicaciones en serie generales '),
(51, 'Norteamericanas '),
(52, 'En inglés '),
(53, 'En otras lenguas germánicas '),
(54, 'En francés, provenzal, catalán '),
(55, 'En italiano, rumano, retorromano '),
(56, 'En español & portugués '),
(57, 'En lenguas eslavas '),
(58, 'En lenguas escandinavas '),
(59, 'En otras lenguas '),
(60, 'Clasificaciones generales & museología '),
(61, 'En América del Norte '),
(62, 'En las Islas Británicas En Inglaterra '),
(63, 'En Europa central En Alemania '),
(64, 'En Francia & Mónaco '),
(65, 'En Italia & territorios adyacentes '),
(66, 'En la Península Ibérica & islas adyacentes '),
(67, 'En Europa oriental Rusia '),
(68, 'En otras áreas '),
(69, 'Museología (Ciencia de los museos) '),
(70, 'Medios noticiosos, periodismo, publicación '),
(71, 'En América del Norte '),
(72, 'En las Islas Británicas En Inglaterra '),
(73, 'En Europa central En Alemania '),
(74, 'En Francia y Mónaco '),
(75, 'En Asia y territorios adyacentes '),
(76, 'En la Península Ibérica & islas adyacentes '),
(77, 'En Europa oriental En Rusia '),
(78, 'En Escandinavia '),
(79, 'En otras áreas '),
(80, 'Colecciones generales '),
(81, 'Norteamericanas '),
(82, 'En ingles '),
(83, 'En otras lenguas germánicas '),
(84, 'En francés, provenzal, catalán '),
(85, 'En italiano, rumano, retorromano '),
(86, 'En español & portugués '),
(87, 'En lenguas eslavas '),
(88, 'En lenguas escandinavas '),
(89, 'En otras lenguas '),
(90, 'Manuscritos & libros raros '),
(91, 'Manuscritos '),
(92, 'Libros xilográficos '),
(93, 'Incunables '),
(94, 'Libros impresos '),
(95, 'Libros notables por su encuadernación '),
(96, 'Libros notables por las ilustraciones '),
(97, 'Libros notables por su propietario u origen '),
(98, 'Obras prohibidas, Falsificaciones, imposturas '),
(99, 'Libros notables por su formato '),
(100, 'Filosofía & psicología '),
(101, 'Teoría de la filosofía '),
(102, 'Miscelánea de filosofía '),
(103, 'Diccionario de filosofía '),
(105, 'Publicaciones en serie de filosofía '),
(106, 'Organizaciones en filosofía '),
(107, 'Educación, investigación en filosofía '),
(108, 'Clases de personas en filosofía '),
(109, 'Tratamiento histórico de la filosofía '),
(110, 'Metafísica '),
(111, 'Ontología '),
(113, 'Cosmología (Filosofía de la naturaleza) '),
(114, 'Espacio '),
(115, 'Tiempo '),
(116, 'Cambio '),
(117, 'Estructura '),
(118, 'Fuerza & Energía '),
(119, 'Números & cantidad '),
(120, 'Epistemología, causalidad, género '),
(121, 'Epistemología (Teoría del conocimiento) '),
(122, 'Causalidad '),
(123, 'Determinismo e indeterminismo '),
(124, 'Teleología '),
(126, 'El yo '),
(127, 'El inconsciente & el subconsciente '),
(128, 'Género humano '),
(129, 'Origen & destino del alma individual '),
(130, 'Fenómenos paranormales '),
(131, 'Métodos ocultos para lograr bienestar '),
(133, 'Parapsicología & ocultismo '),
(135, 'Sueños & misterios '),
(137, 'Grafología adivinatoria '),
(138, 'Fisionomía '),
(139, 'Frenología '),
(140, 'Escuelas filosóficas específicas '),
(141, 'Idealismo & sistemas relacionados '),
(142, 'Filosofía critica '),
(143, 'Intuicionalismo & bergsonismo '),
(144, 'Humanismo & sistemas relacionados '),
(145, 'Sensacionalismo '),
(146, 'Naturalismo & sistemas relacionados '),
(147, 'Panteísmo & sistemas relacionados '),
(148, 'Liberalismo, eclecticismo, tradicionalismo '),
(149, 'Otros sistemas filosóficos '),
(150, 'Psicología '),
(152, 'Percepción, movimiento, emociones, impulsos '),
(153, 'Procesos mentales & inteligencia '),
(154, 'Subconsciente & estados alterados '),
(155, 'Psicología diferencial & del desarrollo '),
(156, 'Psicología comparada '),
(158, 'Psicología aplicada '),
(160, 'Lógica '),
(161, 'Inducción '),
(162, 'Deducción '),
(165, 'Falacias & fuentes de error '),
(166, 'Silogismos '),
(167, 'Hipótesis '),
(168, 'Argumento & persuasión '),
(169, 'Analogía '),
(170, 'Ética (Filosofía moral) '),
(171, 'Sistemas & doctrinas '),
(172, 'Ética política '),
(173, 'Ética de las relaciones familiares '),
(174, 'Ética económica & profesional '),
(175, 'Ética de la recreación & del tiempo libre '),
(176, 'Ética sexual & de la reproducción '),
(177, 'Ética de las relaciones sociales '),
(178, 'Ética del consumo '),
(179, 'Otras normas éticas '),
(180, 'Filosofía antigua, medieval, oriental '),
(181, 'Filosofía oriental '),
(182, 'Filosofías griegas, presocráticas '),
(183, 'Filosofías sofista & socrática '),
(184, 'Filosofía platónica '),
(185, 'Filosofía aristotélica '),
(186, 'Filosofía escéptica & neoplatónica '),
(187, 'Filosofía epicúrea '),
(188, 'Filosofía estoica '),
(189, 'Filosofía medieval occidental '),
(190, 'Filosofía moderna occidental '),
(191, 'Estados Unidos & Canadá '),
(192, 'Islas Británicas '),
(193, 'Alemania & Austria '),
(194, 'Francia '),
(195, 'Italia '),
(196, 'España & Portugal '),
(197, 'Anterior Unión Soviética '),
(198, 'Escandinavia '),
(199, 'Otras áreas geográficas '),
(200, 'Religión '),
(201, 'Filosofía del cristianismo '),
(202, 'Miscelánea del cristianismo '),
(203, 'Diccionarios del cristianismo '),
(204, 'Temas especiales '),
(205, 'Publicaciones en serie del cristianismo '),
(206, 'Organizaciones del cristianismo '),
(207, 'Educación, investigación en cristianismo '),
(208, 'Clases de personas en el cristianismo '),
(209, 'Historia & geografía del cristianismo '),
(210, 'Teología natural '),
(211, 'Conceptos de Dios '),
(212, 'Existencia, atributos de Dios '),
(213, 'Creación '),
(214, 'Teodicea '),
(215, 'Ciencias & religión '),
(216, 'El bien & el mal '),
(218, 'El Hombre '),
(220, 'La Biblia '),
(221, 'Antiguo Testamento '),
(222, 'Libros históricos del Antiguo Testamento '),
(223, 'Libros poéticos del Antiguo Testamento '),
(224, 'Libros proféticos del Antiguo Testamento '),
(225, 'Nuevo Testamento '),
(226, 'Evangelios & Hechos de los Apóstoles '),
(227, 'Epístolas '),
(228, 'Revelación (Apocalipsis de Juan) '),
(229, 'Apócrifos & seudoepígrafes '),
(230, 'Teología cristiana '),
(231, 'Dios '),
(232, 'Jesucristo & su familia '),
(233, 'El hombre '),
(234, 'Salvación (Soteriología) & gracia '),
(235, 'Seres espirituales '),
(236, 'Escatología '),
(238, 'Credos & catecismos '),
(239, 'Apologética & polémica '),
(240, 'Moral cristiana & teología piadosa '),
(241, 'Teología moral '),
(242, 'Literatura piadosa '),
(243, 'Escritos evangelizadores para individuos '),
(245, 'Textos de himnos '),
(246, 'Uso del arte en el cristianismo '),
(247, 'Mobiliario & artículos eclesiásticos '),
(248, 'Experiencia, práctica, vida cristianas '),
(249, 'Observancias cristianas en la vida familiar '),
(250, 'Ordenes cristianas & iglesia local '),
(251, 'Predicación (Homilética) '),
(252, 'Textos de sermones '),
(253, 'Oficio pastoral (Teología pastoral) '),
(254, 'Gobierno & administración de la parroquia '),
(255, 'Congregaciones & ordenes religiosas '),
(259, 'Actividades de la iglesia local '),
(260, 'Teología social cristiana '),
(261, 'Teología social '),
(262, 'Eclesiología '),
(263, 'Tiempos, lugares de observancia religiosa '),
(264, 'Culto público '),
(265, 'Sacramentos, otros ritos & actos '),
(266, 'Misiones '),
(267, 'Asociaciones para trabajo religioso '),
(268, 'Educación religiosa '),
(269, 'Renovación espiritual '),
(270, 'Historia de la iglesia cristiana '),
(271, 'Ordenes religiosas en la historia de la iglesia '),
(272, 'Persecuciones en la historia de la iglesia '),
(273, 'Herejías en la historia de la iglesia '),
(274, 'Iglesia cristiana en Europa '),
(275, 'Iglesia cristiana en Asia '),
(276, 'Iglesia cristiana en África '),
(277, 'Iglesia cristiana en América del Norte '),
(278, 'Iglesia cristiana en América del Sur '),
(279, 'Iglesia cristiana en otras áreas '),
(280, 'Denominaciones & sectas cristianas '),
(281, 'Iglesia primitiva & iglesia oriental '),
(282, 'Iglesia Católica Romana '),
(283, 'Iglesia anglicanas '),
(284, 'Protestantes de origen continental '),
(285, 'Iglesias Presbiterianas, reformadas, congregaciona'),
(286, 'Iglesias bautistas, de los Discípulos de Cristo, a'),
(287, 'Iglesia Metodista & relacionadas '),
(289, 'Otras denominaciones & sectas '),
(290, 'Otras & religión comparada '),
(291, 'Religión comparada '),
(292, 'Religión clásica (griega & romana) '),
(293, 'Religión germánica '),
(294, 'Religiones de origen hindú '),
(295, 'Zoroastrismo (Mazdeismo, Parsismo) '),
(296, 'Judaísmo '),
(297, 'Islamismo & religiones originadas en él '),
(299, 'Otras religiones '),
(300, 'Ciencias sociales '),
(301, 'Sociología & antropología '),
(302, 'Interacción social '),
(303, 'Procesos sociales '),
(304, 'Factores que afectan el comportamiento social '),
(305, 'Grupos sociales '),
(306, 'Cultura & instituciones '),
(307, 'Comunidades '),
(310, 'Estadística general '),
(314, 'De Europa '),
(315, 'De Asia '),
(316, 'De África '),
(317, 'De América del Norte '),
(318, 'De América del Sur '),
(319, 'De otras partes del mundo '),
(320, 'Ciencia política '),
(321, 'Sistemas de gobierno & estados '),
(322, 'Relaciones del Estado con grupos organizados '),
(323, 'Derechos civiles & políticos '),
(324, 'El proceso político '),
(325, 'Migración internacional & colonización '),
(326, 'Esclavitud & emancipación '),
(327, 'Relaciones internacionales '),
(328, 'El proceso legislativo '),
(330, 'Economía '),
(331, 'Economía laboral '),
(332, 'Economía financiera '),
(333, 'Economía de la tierra '),
(334, 'Cooperativas '),
(335, 'Socialismo & sistemas relacionados '),
(336, 'Finanzas públicas '),
(337, 'Economía internacional '),
(338, 'Producción '),
(339, 'Macroeconomía & temas relacionados '),
(340, 'Derecho '),
(341, 'Derecho internacional '),
(342, 'Derecho constitucional & administrativo '),
(343, 'Derecho militar, tributario, mercantil, industrial'),
(344, 'Derecho social, laboral, de bienestar social & rel'),
(345, 'Derecho penal '),
(346, 'Derecho privado '),
(347, 'Procedimiento & tribunales civiles '),
(348, 'Leyes (Estatutos), reglamentaciones, jurisprudenci'),
(349, 'Derecho de jurisprudencia & áreas especificas '),
(350, 'Administración pública '),
(351, 'De gobiernos centrales '),
(352, 'De gobiernos locales '),
(353, 'De gobiernos federales & estatales de Estados Unid'),
(354, 'De gobiernos centrales específicos '),
(355, 'Ciencia militar '),
(356, 'Fuerza y guerra de infantería '),
(357, 'Fuerza & guerra montada '),
(358, 'Otras fuerzas & servicios especializados '),
(359, 'Fuerzas de guerra marítimas (navales) '),
(360, 'Servicios sociales; asociaciones '),
(361, 'Problemas sociales & bienestar social en general '),
(362, 'Problemas & servicios de bienestar social '),
(363, 'Otros problemas & servicios sociales '),
(364, 'Criminología '),
(365, 'Instituciones penales & relacionadas '),
(366, 'Asociaciones '),
(367, 'Clubes de carácter general '),
(368, 'Seguros '),
(369, 'Varias clases de asociaciones '),
(370, 'Educación '),
(371, 'Administración escolar; educación especial '),
(372, 'Educación primaria '),
(373, 'Educación secundaria '),
(374, 'Educación de adultos '),
(375, 'Currículos '),
(376, 'Educación de las mujeres '),
(377, 'Escuelas & religión '),
(378, 'Educación superior '),
(379, 'Reglamentación, control, apoyo gubernamentales '),
(380, 'Comercio, comunicaciones, transporte '),
(381, 'Comercio interno (Comercio doméstico) '),
(382, 'Comercio internacional (Comercio exterior) '),
(383, 'Comunicación postal(Correos) '),
(384, 'Comunicaciones, Telecomunicaciones '),
(385, 'Transporte ferroviario '),
(386, 'Transporte por vía acuática interior & en transbor'),
(387, 'Transporte acuático, aéreo, espacial '),
(388, 'Transporte, Transporte terrestre '),
(389, 'Metrología & normalización '),
(390, 'Costumbres, etiqueta, folclor '),
(391, 'Traje & apariencia personal '),
(392, 'Costumbres del ciclo de vida & de la vida doméstic'),
(393, 'Costumbres mortuorias '),
(394, 'Costumbres generales '),
(395, 'Etiqueta (Modales) '),
(398, 'Folclor '),
(399, 'Costumbres de guerra & diplomacia '),
(400, 'Lenguas '),
(401, 'Filosofía & teoría '),
(402, 'Miscelánea '),
(403, 'Diccionarios & enciclopedias '),
(404, 'Temas especiales '),
(405, 'Publicaciones en serie '),
(406, 'Organizaciones & administración '),
(407, 'Educación, investigación, temas relacionados '),
(408, 'En relación con clases de personas '),
(409, 'Tratamiento geográfico & de personas '),
(410, 'Lingüística '),
(411, 'Sistemas de escritura '),
(412, 'Etimología '),
(413, 'Diccionarios '),
(414, 'Fonología '),
(415, 'Sistemas estructurales (Gramática) '),
(417, 'Dialectología & lingüística histórica '),
(418, 'Uso estándar, Lingüística aplicada '),
(419, 'Lenguajes verbales no hablados ni escritos '),
(420, 'Ingles & inglés antiguo '),
(421, 'Sistema de escritura & fonología inglesa '),
(422, 'Etimología inglesa '),
(423, 'Diccionarios de inglés '),
(425, 'Gramática inglesa '),
(427, 'Variaciones de le lengua inglesa '),
(428, 'Uso del inglés estándar '),
(429, 'Ingles antiguo (Anglosajón) '),
(430, 'Lenguas germánicas, Alemán '),
(431, 'Sistemas de escritura & fonología alemana '),
(432, 'Etimología alemana '),
(433, 'Diccionario de Alemán '),
(435, 'Gramática alemana '),
(437, 'Variaciones de la lengua alemana '),
(438, 'Uso del alemán estándar '),
(439, 'Otras lenguas germánicas '),
(440, 'Lenguas romances, Francés '),
(441, 'Sistema de escritura & fonología franceses '),
(442, 'Etimología francesa '),
(443, 'Diccionario de francés '),
(445, 'Gramática francesa '),
(447, 'Variaciones del francés '),
(448, 'Uso del francés estándar '),
(449, 'Provenzal & catalán '),
(450, 'Italiano, rumano, retorromano '),
(451, 'Sistema de escritura & fonología italianos '),
(452, 'Etimología italiana '),
(453, 'Diccionarios de italiano '),
(455, 'Gramática italiana '),
(457, 'Variaciones del italiano '),
(458, 'Uso del italiano estándar '),
(459, 'Rumano & retorromano '),
(460, 'Lenguas española & portuguesa '),
(461, 'Sistema de escritura & fonología '),
(462, 'Etimología española '),
(463, 'Diccionarios de español '),
(465, 'Gramática española '),
(467, 'Variaciones del español '),
(468, 'Uso del español estándar '),
(469, 'Portugués '),
(470, 'Lenguas itálicas, Latín '),
(471, 'Escritura & fonología latinas clásicas '),
(472, 'Etimología latina clásica '),
(473, 'Diccionarios de latín clásico '),
(475, 'Gramática latina clásica '),
(477, 'Latín arcaico, postclásico, vulgar '),
(478, 'Uso del latín clásico '),
(479, 'Otras lenguas itálicas '),
(480, 'Lenguas helénicas, Griego clásico '),
(481, 'Escritura y fonología griegas clásicas '),
(482, 'Etimología griega clásica '),
(483, 'Diccionarios de griego clásico '),
(485, 'Gramática griega clásica '),
(487, 'Griego preclásico & postclasico '),
(488, 'Uso del griego clásico '),
(489, 'Otras lenguas helénicas '),
(490, 'Otras lenguas '),
(491, 'Lenguas indoeuropeas orientales & celtas '),
(492, 'Lenguas afroasiáticas, Semíticas '),
(493, 'Lenguas afroasiáticas, no semíticas '),
(494, 'Lenguas uralaltaicas, paleosiberianas, dravidas '),
(495, 'Lenguas del oriente & sudoriente de Asia '),
(496, 'Lenguas africanas '),
(497, 'Lenguas nativas de América del Norte '),
(498, 'Lenguas nativas de América del Sur '),
(499, 'Lenguas varias '),
(500, 'Ciencias naturales & matemáticas '),
(501, 'Filosofía & teoría '),
(502, 'Miscelánea '),
(503, 'Diccionarios & enciclopedias '),
(505, 'Publicaciones en serie '),
(506, 'Organizaciones & administración '),
(507, 'Educación, investigación, temas relacionados '),
(508, 'Historia natural '),
(509, 'Tratamiento histórico, geográfico, de personas '),
(510, 'Matemáticas '),
(511, 'Principios generales '),
(512, 'Álgebra & teoría de los números '),
(513, 'Aritmética '),
(514, 'Topología '),
(515, 'Análisis '),
(516, 'Geometría '),
(519, 'Probabilidades & matemáticas aplicadas '),
(520, 'Astronomía & ciencias afines '),
(521, 'Mecánica celeste '),
(522, 'Técnicas, equipo, materiales '),
(523, 'Cuerpos & fenómenos celestes especificos '),
(525, 'La Tierra (Geografía astronómica) '),
(526, 'Geografía matemática '),
(527, 'Navegación celeste '),
(528, 'Efemérides '),
(529, 'Cronología '),
(530, 'Física '),
(531, 'Mecánica clásica, Mecánica de sólidos '),
(532, 'Mecánica de fluidos, Mecánica de líquidos '),
(533, 'Mecánicas de gases '),
(534, 'Sonido & vibraciones relacionadas '),
(535, 'Luz & fenómenos parafóticos '),
(536, 'Calor '),
(537, 'Electricidad & electrónica '),
(538, 'Magnetismo '),
(539, 'Física moderna '),
(540, 'Química & ciencias afines '),
(541, 'Química física & teórica '),
(542, 'Técnicas, equipo, materiales '),
(543, 'Química analítica '),
(544, 'Análisis cualitativo '),
(545, 'Análisis cuantitativo '),
(546, 'Química inorgánica '),
(547, 'Química orgánica '),
(548, 'Cristalografía '),
(549, 'Mineralogía '),
(550, 'Ciencias de la tierra '),
(551, 'Geología, hidrología, meteorología '),
(552, 'Petrología '),
(553, 'Geología económica '),
(554, 'Ciencias de la tierra de Europa '),
(555, 'De Asia '),
(556, 'De África '),
(557, 'De América del Norte '),
(558, 'De América del Sur '),
(559, 'De otras áreas '),
(560, 'Paleontología, Paleozoología '),
(561, 'Paleobotánica '),
(562, 'Invertebrados fósiles '),
(563, 'Filos (phyla) & fósiles primitivos '),
(564, 'Moluscos & Moluscoideos fósiles '),
(565, 'Otros invertebrados fósiles '),
(566, 'Vertebrados fósiles (Craniatos fósiles) '),
(567, 'Vertebrados de sangre fría fósiles '),
(568, 'Aves fósiles (Pájaros fósiles) '),
(569, 'Mamíferos fósiles '),
(570, 'Ciencias de la vida '),
(572, 'Razas humanas '),
(573, 'Antropología física '),
(574, 'Biología '),
(575, 'Evolución & genética '),
(576, 'Microbiología '),
(577, 'Naturaleza general de la vida '),
(578, 'Microscopia en biología '),
(579, 'Colección & preservación '),
(580, 'Ciencias botánicas '),
(581, 'Botánica '),
(582, 'Espermatofitas (plantas con semilla) '),
(583, 'Dicotiledóneas '),
(584, 'Monocotiledóneas '),
(585, 'Gimnospermas (Pinofitas) '),
(586, 'Criptógamas (Plantas sin semilla) '),
(587, 'Pteridofitas (Criptógamas vasculares) '),
(588, 'Briofitas '),
(589, 'Talabiontas & procariotas '),
(590, 'Ciencias zoológicas '),
(591, 'Zoología '),
(592, 'Invertebrados '),
(593, 'Protozoos, Equinodermos, filos (phyla) relacionado'),
(594, 'Moluscos & moluscoideos '),
(595, 'Otros invertebrados '),
(596, 'Vertebrados (Craneados, vertebrados) '),
(597, 'Vertebrados de sangre fría, Peces '),
(598, 'Aves (Pájaros) '),
(599, 'Mamíferos '),
(600, 'Tecnología (Ciencias aplicadas) '),
(601, 'Filosofía & teoría '),
(602, 'Miscelánea '),
(603, 'Diccionarios & enciclopedias '),
(604, 'Temas especiales '),
(605, 'Publicaciones en serie '),
(606, 'Organizaciones '),
(607, 'Educación, investigación, temas relacionados '),
(608, 'Inventos & patentes '),
(609, 'Tratamiento histórico, geográfico, de personas '),
(610, 'Ciencias médicas, Medicina '),
(611, 'Anatomía humana, citología, histología '),
(612, 'Fisiología humana '),
(613, 'Promoción de salud '),
(614, 'Incidencia & prevención de la enfermedad '),
(615, 'Farmacología & terapéutica '),
(616, 'Enfermedades '),
(617, 'Varias ramas de la medicina, Cirugía '),
(618, 'Ginecología & otras especialidades médicas '),
(619, 'Medicina experimental '),
(620, 'Ingeniería & operaciones afines '),
(621, 'Física aplicada '),
(622, 'Minería & operaciones relacionadas '),
(623, 'Ingeniería militar & naval '),
(624, 'Ingeniería civil '),
(625, 'Ingeniería de ferrocarriles, de caminos '),
(627, 'Ingeniería hidráulica '),
(628, 'Ingeniería sanitaria & municipal '),
(629, 'Otras ramas de la ingeniería '),
(630, 'Agricultura '),
(631, 'Técnicas, equipo, materiales '),
(632, 'Lesiones, enfermedades, plagas de las plantas '),
(633, 'Cultivos de campo & plantaciones '),
(634, 'Huertos, frutas, silvicultura '),
(635, 'Cultivos horticolas (Horticultura) '),
(636, 'Producción animal (Zootecnia) '),
(637, 'Procedimiento lechero & productos relacionados '),
(638, 'Cultivo de insectos '),
(639, 'Caza, pesca, conservación '),
(640, 'Economía doméstica & vida familiar '),
(641, 'Alimentos & bebidas '),
(642, 'Comidas & servicio a la mesa '),
(643, 'Vivienda & equipo de la casa '),
(644, 'Servicios de la casa '),
(645, 'Dotación de la casa '),
(646, 'Costura, vestuario, vida personal '),
(647, 'Administración de viviendas públicas '),
(648, 'Manejo de la casa '),
(649, 'Puericultura & atención domiciliaria del enfermo '),
(650, 'Administración & servicios auxiliares '),
(651, 'Servicios de oficina '),
(652, 'Procesos de comunicación escrita '),
(653, 'Taquigrafía '),
(657, 'Contabilidad '),
(658, 'Administración general '),
(659, 'Publicidad & relaciones públicas '),
(660, 'Ingeniería Química '),
(661, 'Tecnología química industrial '),
(662, 'Tecnología de explosivos & combustibles '),
(663, 'Tecnología de las bebidas '),
(664, 'Tecnología de los alimentos '),
(665, 'Aceites industriales, grasas, ceras, gases '),
(666, 'Cerámica & tecnologías afines '),
(667, 'Limpieza, color, tecnologías relacionadas '),
(668, 'Tecnología de otros productos orgánicos '),
(669, 'Metalurgia '),
(670, 'Manufactura '),
(671, 'Metalistería & productos metálicos '),
(672, 'Hierro, acero, otras aleaciones ferrosas '),
(673, 'Metales no ferrosos '),
(674, 'Procesamiento de madera aserrada, productos de mad'),
(675, 'Procesamiento del cuero & piel '),
(676, 'Tecnología de la pulpa & del papel '),
(677, 'Textiles '),
(678, 'Elastómeros & productos del elastómero '),
(679, 'Otros productos de materiales específicos '),
(680, 'Manufactura para usos específicos '),
(681, 'Instrumentos de precisión & otros dispositivos '),
(682, 'Trabajo de forja pequeña (Herrería) '),
(683, 'Ferretería & aparatos de la casa '),
(684, 'Muebles & talleres de hogar '),
(685, 'Productos de cuero, piel, relacionados '),
(686, 'Imprentas & actividades relacionadas '),
(687, 'Vestuario '),
(688, 'Otros productos acabados, empaques '),
(690, 'Construcción '),
(691, 'Materiales de construcción '),
(692, 'Prácticas auxiliares de la construcción '),
(693, 'Materiales & propósitos específicos '),
(694, 'Construcción en madera, Carpintería '),
(695, 'Cubiertas (techos) '),
(696, 'Servicios públicos '),
(697, 'Calefacción, ventilación, aire acondicionado '),
(698, 'Detalles de acabado '),
(700, 'Las artes '),
(701, 'Filosofía & teoría '),
(702, 'Miscelánea '),
(703, 'Diccionarios & enciclopedias '),
(704, 'Temas especiales '),
(705, 'Publicaciones en serie '),
(706, 'Organizaciones & administración '),
(707, 'Educación, investigación, temas relacionados '),
(708, 'Galerías, museos, colecciones privadas '),
(709, 'Tratamiento histórico, geográfico, personas '),
(710, 'Urbanismo & arte del paisaje '),
(711, 'Planificación del espacio (Urbanismo) '),
(712, 'Arquitectura del paisaje '),
(713, 'Arquitectura del paisaje de las vías de tránsito '),
(714, 'Aguas ornamentales '),
(715, 'Plantas leñosas '),
(716, 'Plantas herbáceas '),
(717, 'Estructuras '),
(718, 'Diseño de paisaje de cementerios '),
(719, 'Paisajes naturales '),
(720, 'Arquitectura '),
(721, 'Estructura arquitectónica '),
(722, 'Arquitectura antigua hasta ca. 300 '),
(723, 'Arquitectura desde ca. 300 hasta 1399 '),
(724, 'Arquitectura desde 1400 '),
(725, 'Estructuras públicas '),
(726, 'Edificios para propósitos religiosos '),
(727, 'Edificios para educación & investigación '),
(728, 'Edificios residenciales & relacionados '),
(729, 'Diseño & decoración '),
(730, 'Artes plásticas, Escultura '),
(731, 'Procesos, formas, temas de la escultura '),
(732, 'La escultura hasta ca. 500 '),
(733, 'Escultura griega, etrusca, romana '),
(734, 'Escultura desde ca. 500 hasta 1399 '),
(735, 'Escultura desde 1400 '),
(736, 'Talla & tallado '),
(737, 'Numismátismo & sigilografía '),
(738, 'Artes cerámicas '),
(739, 'Arte en metal '),
(740, 'Dibujo & artes decorativas '),
(741, 'Dibujo & dibujos '),
(742, 'Perspectiva '),
(743, 'Dibujo & dibujos por tema '),
(745, 'Artes decorativas '),
(746, 'Artes textiles '),
(747, 'Decoración de interiores '),
(748, 'Vidrio '),
(749, 'Muebles & accesorios '),
(750, 'Pintura & pinturas '),
(751, 'Técnicas, equipo, formas '),
(752, 'Color '),
(753, 'Simbolismo, alegoría, mitología, leyenda '),
(754, 'Pinturas de género '),
(755, 'Religión & simbolismo religiosos '),
(757, 'Figuras humanas & sus partes '),
(758, 'Otros temas '),
(759, 'Tratamiento histórico, geográfico, de personas '),
(760, 'Artes gráficas, Arte de grabar & grabados '),
(761, 'Procesos en relieve (Grabado en bloque) '),
(763, 'Procesos litográficos (Planográficos) '),
(764, 'Cromolitografia & serigrafía '),
(765, 'Grabado en metal '),
(766, 'Media tinta & procesos relacionados '),
(767, 'Aguafuerte & grabado a buril '),
(769, 'Grabados '),
(770, 'Fotografía & fotografías '),
(771, 'Técnicas, equipo, materiales '),
(772, 'Procesos con sales metálicas '),
(773, 'Procesos de pigmentación de la impresión '),
(774, 'Holografía '),
(778, 'Campos & clases de fotografía '),
(779, 'Fotografía '),
(780, 'Música '),
(781, 'Principios generales & formas musicales '),
(782, 'Música vocal '),
(783, 'Música para voces individuales, la voz '),
(784, 'Instrumentos & conjuntos instrumentales '),
(785, 'Conjuntos con un solo instrumento por parte '),
(786, 'Instrumentos de percusión & otros instrumentos '),
(787, 'Instrumentos de cuerda (Cordófonos) '),
(788, 'Instrumentos de viento (Aerófonos) '),
(790, 'Artes recreativas & de la actuación '),
(791, 'Representaciones públicas '),
(792, 'Representaciones escénicas '),
(793, 'Juegos & pasatiempos bajo techo '),
(794, 'Juegos de destreza bajo techo '),
(795, 'Juegos de suerte '),
(796, 'Deportes & juegos atléticos & al aire libre '),
(797, 'Deportes acuáticos & aéreos '),
(798, 'Deportes ecuestres '),
(799, 'Pesca, caza, tiro '),
(800, 'Literatura & retórica '),
(801, 'Filosofía & retórica '),
(802, 'Miscelánea '),
(803, 'Diccionarios & enciclopedias '),
(805, 'Publicaciones en serie '),
(806, 'Organizaciones '),
(807, 'Educación, investigación, temas relacionados '),
(808, 'Retórica & colecciones de literatura '),
(809, 'Historia & critica literaria '),
(810, 'Literatura americana en inglés '),
(811, 'Poesía '),
(812, 'Teatro '),
(813, 'Novelista '),
(814, 'Ensayo '),
(815, 'Oratoria '),
(816, 'Cartas '),
(817, 'Sátira & humor '),
(818, 'Escritos varios '),
(820, 'Literatura inglesa & inglesa antigua '),
(821, 'Poesía inglesa '),
(822, 'Teatro ingles '),
(823, 'Novelística '),
(824, 'Ensayos '),
(825, 'Oratoria '),
(826, 'Cartas '),
(827, 'Sátira & humor '),
(828, 'Escritos varios '),
(829, 'Literatura inglesa antigua (anglosajona) '),
(830, 'Literatura de lenguas germánicas '),
(831, 'Poesía '),
(832, 'Teatro '),
(833, 'Ficción '),
(834, 'Ensayos '),
(835, 'Oratoria '),
(836, 'Cartas '),
(837, 'Sátira & humor '),
(838, 'Escritos varios '),
(839, 'Otras literaturas germánicas '),
(840, 'Literaturas de Lenguas Romances '),
(841, 'Poesía francesa '),
(842, 'Teatro francés '),
(843, 'Novela francesa '),
(844, 'Ensayos franceses '),
(845, 'Oratoria francesa '),
(846, 'Cartas francesas '),
(847, 'Sátira & humor francés '),
(848, 'Escritos varios franceses '),
(849, 'Provenzal & catalán '),
(850, 'Literaturas italiana, rumana, retorromana '),
(851, 'Poesía italiana '),
(852, 'Teatro italiano '),
(853, 'Ficción italiana '),
(854, 'Ensayos italianos '),
(855, 'Oratoria italiana '),
(856, 'Cartas italianas '),
(857, 'Sátiras & humor italianos '),
(858, 'Escritos varios italianos '),
(859, 'Romano & retorromano '),
(860, 'Literaturas española & portuguesa '),
(861, 'Poesía española '),
(862, 'Teatro español '),
(863, 'Ficción española '),
(864, 'Ensayos españoles '),
(865, 'Oratoria española '),
(866, 'Cartas españolas '),
(867, 'Sátira & humor españoles '),
(868, 'Escritos varios españoles '),
(869, 'Literatura portuguesa '),
(870, 'Literaturas itálicas , Literatura italiana '),
(871, 'Poesía latina '),
(872, 'Poesía dramática & teatro latinos '),
(873, 'Poesía épica y novelística latinas '),
(874, 'Poesía lírica latina '),
(875, 'Oratoria latina '),
(876, 'Cartas latinas '),
(877, 'Sátira & humor latinos '),
(878, 'Escritos varios latinos '),
(879, 'Literaturas de otras lenguas itálicas '),
(880, 'Literaturas helénica, Griega clásica '),
(881, 'Poesía griega clásica '),
(882, 'Teatro griego clásico '),
(883, 'Poesía épica & novelística griega clásica '),
(884, 'Poesía lírica griega clásica '),
(885, 'Oratoria griega clásica '),
(886, 'Cartas griegas clásicas '),
(887, 'Sátira & humor griegos clásicos '),
(888, 'Escritos varios griegos clásicos '),
(889, 'Literatura griega moderna '),
(890, 'Literaturas de otras lenguas '),
(891, 'Indoeuropeas, orientales & célticas '),
(892, 'Afroasiáticas, Semíticas '),
(893, 'Afroasiáticas no semíticas '),
(894, 'Uralaltaicas, paleosiberianas & darvinianas '),
(895, 'Del oriente & Sudoriente de Asia '),
(897, 'Nativas de América del Norte '),
(898, 'Nativas de América del Sur '),
(899, 'Otras lenguas '),
(900, 'Geografía e historia '),
(901, 'Filosofía & teoría de la historia '),
(902, 'Miscelánea '),
(903, 'Diccionarios & enciclopedias '),
(904, 'Colecciones de relatos de eventos '),
(905, 'Publicaciones en serie '),
(906, 'Organizaciones & administración '),
(907, 'Educación, investigación, temas relacionados '),
(908, 'En relación con clases de personas '),
(909, 'Historia universal '),
(910, 'Geografía & viajes '),
(911, 'Geografía histórica '),
(912, 'Representaciones gráficas de la tierra '),
(913, 'Mundo antiguo '),
(914, 'Europa '),
(915, 'Asia '),
(916, 'África '),
(917, 'América del Norte '),
(918, 'América del Sur '),
(919, 'Otras áreas '),
(920, 'Biografía, genealogía, emblemas '),
(929, 'Genealogía, nombres, emblemas '),
(930, 'Historia del mundo antiguo '),
(931, 'China '),
(932, 'Egipto '),
(933, 'Palestina '),
(934, 'India '),
(935, 'Mesopotamia & Meseta Iraní '),
(936, 'Europa al norte y al occidente de Italia '),
(937, 'Italia & territorios adyacentes '),
(938, 'Grecia '),
(939, 'Otras partes del mundo antiguo '),
(940, 'Historia general de Europa '),
(941, 'Islas Británicas '),
(942, 'Inglaterra & Gales '),
(943, 'Europa Central, Alemania '),
(944, 'Francia & Mónaco '),
(945, 'Península Itálica e islas adyacentes '),
(946, 'Península Ibérica e islas adyacentes '),
(947, 'Europa Oriental, Rusia '),
(948, 'Europa del norte, Escandinavia '),
(949, 'Otras partes de Europa '),
(950, 'Historia general de Asia, Extremo Oriente '),
(951, 'China & áreas adyacentes '),
(952, 'Japón '),
(953, 'Península de Arabia & áreas adyacentes '),
(954, 'Asia de Sur, India '),
(955, 'Irán '),
(956, 'Medio Oriente (Cercano Oriente) '),
(957, 'Siberia (Rusia asiática) '),
(958, 'Asia central '),
(959, 'Asia sudoriental '),
(960, 'Historia general de África '),
(961, 'Túnez & Libia '),
(962, 'Egipto & Sudán '),
(963, 'Etiopía '),
(964, 'Marruecos e Islas Canarias '),
(965, 'Argelia '),
(966, 'África occidental e islas cercanas '),
(967, 'África central e islas cercanas '),
(968, 'África del Sur '),
(969, 'Islas del Océano Indico del Sur '),
(970, 'Historia General de América del Norte '),
(971, 'Canadá '),
(972, 'Mesoamérica, México '),
(973, 'Estados Unidos '),
(974, 'Noroccidente de Estados Unidos '),
(975, 'Sudoriente de Estados Unidos '),
(976, 'Centro-sur de Estados Unidos '),
(977, 'Centro-norte de Estados Unidos '),
(978, 'Occidente de Estados Unidos '),
(979, 'Gran Cuenca & Vertiente del Pacífico '),
(980, 'Historia general de América del Sur '),
(981, 'Brasil '),
(982, 'Argentina '),
(983, 'Chile '),
(984, 'Bolivia '),
(985, 'Perú '),
(986, 'Colombia & Ecuador '),
(987, 'Venezuela '),
(988, 'Guayanas '),
(989, 'Paraguay y Uruguay '),
(990, 'Historia General de Otras áreas '),
(993, 'Nueva Zelanda '),
(994, 'Australia '),
(995, 'Melanesia, Nueva Guinea '),
(996, 'Otras partes del Pacífico, Polinesia '),
(997, 'Islas del Océano Atlántico '),
(998, 'Islas árticas & Antártida '),
(999, 'Mundos extraterrestres'),
(1022, 'Generalidades ');

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
  `fechaIngreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `claveIngreso` varchar(50) NOT NULL,
  `idTitulo` int(11) NOT NULL,
  `coleccion` varchar(50) DEFAULT NULL,
  `edicion` int(11) DEFAULT NULL,
  `idUsuario` varchar(50) DEFAULT NULL,
  `adquisicion` varchar(15) NOT NULL,
  `numClasificacion` varchar(15) NOT NULL,
  `materias` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ejemplar`
--

INSERT INTO `ejemplar` (`idEjemplar`, `ISBN`, `estante`, `editorial`, `year`, `volumen`, `fechaIngreso`, `claveIngreso`, `idTitulo`, `coleccion`, `edicion`, `idUsuario`, `adquisicion`, `numClasificacion`, `materias`) VALUES
(1, '968-19-1080-X', 'N/A', 'ALAMAH', 2002, 0, '0000-00-00 00:00:00', 'CL', 1, NULL, NULL, NULL, '', '', ''),
(2, '968-19-1080-X', 'N/A', 'ALAMAH', 2002, 0, '0000-00-00 00:00:00', 'CL', 1, NULL, NULL, NULL, '', '', ''),
(3, '84-481-2124-4', 'N/A', 'MC GRAW HILL', 1999, 0, '0000-00-00 00:00:00', 'DG 242', 2, NULL, NULL, NULL, '', '', ''),
(4, '970-10-2628-4', 'N/A', 'MC GRAW HILL', 2000, 0, '0000-00-00 00:00:00', 'DG 243', 3, NULL, NULL, NULL, '', '', ''),
(5, '84-95318-59-8', 'N/A', 'INFOR BOOKS', 2000, 0, '0000-00-00 00:00:00', 'DG248', 4, NULL, NULL, NULL, '', '', ''),
(6, '0-07-212433-4', 'N/A', 'OSBORNE', 2001, 0, '0000-00-00 00:00:00', 'DG 340', 5, NULL, NULL, NULL, '', '', ''),
(7, '1-861002-53-X', 'N/A', 'WROX PRESS', 1999, 0, '0000-00-00 00:00:00', 'DG 357', 6, NULL, NULL, NULL, '', '', ''),
(8, '978-0-07-1105', 'N/A', 'MC GRAW HILL', 2007, 0, '0000-00-00 00:00:00', 'DG 422', 7, NULL, NULL, NULL, '', '', ''),
(9, '970-10-3632-8', 'N/A', 'MC GRAW HILL', 2003, 0, '0000-00-00 00:00:00', 'DG 431', 8, NULL, NULL, NULL, '', '', ''),
(10, '968-439-058-0', 'N/A', 'PC', 1970, 0, '0000-00-00 00:00:00', 'DG 433', 9, NULL, NULL, NULL, '', '', ''),
(11, '0-07-286824-4', 'N/A', 'MC GRAW HILL', 2006, 0, '0000-00-00 00:00:00', 'DG 1182', 10, NULL, NULL, NULL, '', '', ''),
(12, '978-84-782-90', 'N/A', 'PEARSON EDUCACIÓN', 2007, 0, '0000-00-00 00:00:00', 'CL 54', 11, NULL, NULL, NULL, '', '', ''),
(13, 'SN', 'N/A', 'MCGRAW-HILL', 1961, 0, '0000-00-00 00:00:00', 'DG', 12, NULL, NULL, NULL, '', '', ''),
(14, '978-607-462-0', 'N/A', 'EEL COLEGIO DE MEXICO', 2009, 0, '0000-00-00 00:00:00', 'DG', 13, NULL, NULL, NULL, '', '', ''),
(15, 'SN', 'N/A', 'EL COLEGIO DE MEXICO', 1980, 0, '0000-00-00 00:00:00', 'DG', 14, NULL, NULL, NULL, '', '', ''),
(16, 'SN', 'N/A', 'IEEQ', 2005, 0, '0000-00-00 00:00:00', 'DG', 15, NULL, NULL, NULL, '', '', ''),
(17, '84-02-04361-5', 'N/A', 'BRUGUERA', 1975, 0, '0000-00-00 00:00:00', 'DG', 16, NULL, NULL, NULL, '', '', ''),
(18, 'SN', 'N/A', 'INEGI', 2004, 0, '0000-00-00 00:00:00', 'DG', 17, NULL, NULL, NULL, '', '', ''),
(19, '968-19-0933-X', 'N/A', 'TAURUS', 2003, 0, '0000-00-00 00:00:00', 'CL', 18, NULL, NULL, NULL, '', '', ''),
(20, '968-19-0933-X', 'N/A', 'TAURUS', 2003, 0, '0000-00-00 00:00:00', 'CL', 18, NULL, NULL, NULL, '', '', ''),
(21, '968-19-0933-X', 'N/A', 'TAURUS', 2003, 0, '0000-00-00 00:00:00', 'CL', 18, NULL, NULL, NULL, '', '', ''),
(22, '968-19-0933-X', 'N/A', 'TAURUS', 2003, 0, '0000-00-00 00:00:00', 'CL', 18, NULL, NULL, NULL, '', '', ''),
(23, '968-19-0933-X', 'N/A', 'TAURUS', 2003, 0, '0000-00-00 00:00:00', 'CL', 18, NULL, NULL, NULL, '', '', ''),
(24, '968-19-0933-X', 'N/A', 'TAURUS', 2003, 0, '0000-00-00 00:00:00', 'CL', 18, NULL, NULL, NULL, '', '', ''),
(25, '968-16-4976-1', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 1996, 27, '0000-00-00 00:00:00', 'DO', 19, NULL, NULL, NULL, '', '', ''),
(26, '968-16-4738-6', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 1995, 26, '0000-00-00 00:00:00', 'DO', 20, NULL, NULL, NULL, '', '', ''),
(27, '968-16-4710-6', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 1995, 25, '0000-00-00 00:00:00', 'DO', 21, NULL, NULL, NULL, '', '', ''),
(28, '968-16-4478-6', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 1994, 24, '0000-00-00 00:00:00', 'DO', 22, NULL, NULL, NULL, '', '', ''),
(29, 'SN', 'N/A', 'DIANA', 1976, 0, '0000-00-00 00:00:00', 'DG', 23, NULL, NULL, NULL, '', '', ''),
(30, '968-6361-49-9', 'N/A', 'CONSEJO ESTATAL PARA LA CULTURA', 1996, 0, '0000-00-00 00:00:00', 'DG', 24, NULL, NULL, NULL, '', '', ''),
(31, 'SN', 'N/A', 'PLAZA & JANÉS', 1980, 6, '0000-00-00 00:00:00', 'DG', 25, NULL, NULL, NULL, '', '', ''),
(32, '968-16-1697-9', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 1984, 0, '0000-00-00 00:00:00', 'DG', 26, NULL, NULL, NULL, '', '', ''),
(33, '968-16-1697-9', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 1984, 0, '0000-00-00 00:00:00', 'DG', 26, NULL, NULL, NULL, '', '', ''),
(34, '968-16-6717-4', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 2002, 0, '0000-00-00 00:00:00', 'CL', 27, NULL, NULL, NULL, '', '', ''),
(35, 'SN', 'N/A', 'TRILLAS', 1968, 0, '0000-00-00 00:00:00', 'DG', 28, NULL, NULL, NULL, '', '', ''),
(36, 'SN', 'N/A', 'UTEHA', 1967, 0, '0000-00-00 00:00:00', 'DG', 29, NULL, NULL, NULL, '', '', ''),
(37, '970-9026-40-2', 'N/A', 'SECRETARIA DE DESARROLLO SOCIAL', 1999, 0, '0000-00-00 00:00:00', 'DG', 30, NULL, NULL, NULL, '', '', ''),
(38, '970-9026-40-2', 'N/A', 'SECRETARIA DE DESARROLLO SOCIAL', 1999, 0, '0000-00-00 00:00:00', 'DG', 30, NULL, NULL, NULL, '', '', ''),
(39, '970-9026-40-2', 'N/A', 'SECRETARIA DE DESARROLLO SOCIAL', 1999, 0, '0000-00-00 00:00:00', 'DG', 30, NULL, NULL, NULL, '', '', ''),
(40, '968-16-1063-6', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 1982, 0, '0000-00-00 00:00:00', 'DG', 31, NULL, NULL, NULL, '', '', ''),
(41, '968-16-1063-6', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 1982, 0, '0000-00-00 00:00:00', 'DG', 31, NULL, NULL, NULL, '', '', ''),
(42, '968-16-1063-6', 'N/A', 'FONDO DE CULTURA ECONÓMICA', 1982, 0, '0000-00-00 00:00:00', 'DG', 31, NULL, NULL, NULL, '', '', ''),
(43, '84-481-4187-3', 'N/A', 'MCGRAW-HILL', 2004, 0, '0000-00-00 00:00:00', 'CL', 32, NULL, NULL, NULL, '', '', ''),
(44, '84-481-4187-3', 'N/A', 'MCGRAW-HILL', 2004, 0, '0000-00-00 00:00:00', 'CL', 32, NULL, NULL, NULL, '', '', ''),
(45, '84-481-4187-3', 'N/A', 'MCGRAW-HILL', 2004, 0, '0000-00-00 00:00:00', 'CL', 32, NULL, NULL, NULL, '', '', ''),
(46, '84-481-4187-3', 'N/A', 'MCGRAW-HILL', 2004, 0, '0000-00-00 00:00:00', 'CL', 32, NULL, NULL, NULL, '', '', ''),
(54, '1', '1', 'prueba', 1111, 1, '2018-04-11 16:45:18', '1', 33, '1', 1, 'martin', '1', '11', ''),
(55, '111', '1', 'prueba', 1111, 1, '2018-04-11 16:49:20', '1', 42, '1', 1, 'martin', '1', '1', ''),
(56, '111', '112', 'prueba', 1111, 1, '2018-04-11 17:50:45', '1', 43, '2', 12, 'martin', '1', '1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplar_credencial`
--

CREATE TABLE `ejemplar_credencial` (
  `idEjemplar` int(11) NOT NULL,
  `idCredencial` int(11) NOT NULL,
  `fechaPrestamo` datetime NOT NULL,
  `fechaDevolucion` datetime NOT NULL,
  `fechaDevolucionReal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ejemplar_credencial`
--

INSERT INTO `ejemplar_credencial` (`idEjemplar`, `idCredencial`, `fechaPrestamo`, `fechaDevolucion`, `fechaDevolucionReal`) VALUES
(1, 1, '2018-03-21 17:25:33', '2018-03-28 17:25:33', '2018-03-21 17:31:31'),
(1, 1, '2018-03-21 17:31:31', '2018-03-28 17:31:31', '2018-03-21 17:31:31'),
(1, 1, '2018-03-24 18:54:06', '2018-03-31 18:54:06', NULL),
(2, 1, '2018-03-24 18:54:21', '2018-03-31 18:54:21', '2018-03-24 18:54:47'),
(3, 1, '2018-03-24 18:54:47', '2018-03-31 18:54:47', '2018-03-24 18:58:17'),
(7, 1, '2018-03-21 17:40:29', '2018-03-28 17:40:29', '2018-03-21 17:40:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplar_estado`
--

CREATE TABLE `ejemplar_estado` (
  `idEjemplar` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ejemplar_estado`
--

INSERT INTO `ejemplar_estado` (`idEjemplar`, `idEstado`, `fecha`) VALUES
(1, 1, '2018-03-24 06:00:00'),
(2, 4, '2018-03-24 06:00:00'),
(3, 5, '2018-03-24 06:00:00'),
(4, 5, '0000-00-00 00:00:00'),
(5, 5, '0000-00-00 00:00:00'),
(6, 5, '0000-00-00 00:00:00'),
(7, 5, '2018-03-21 06:00:00'),
(8, 5, '0000-00-00 00:00:00'),
(9, 5, '0000-00-00 00:00:00'),
(10, 5, '0000-00-00 00:00:00'),
(11, 5, '0000-00-00 00:00:00'),
(12, 5, '0000-00-00 00:00:00'),
(13, 5, '0000-00-00 00:00:00'),
(14, 5, '0000-00-00 00:00:00'),
(15, 5, '0000-00-00 00:00:00'),
(16, 5, '0000-00-00 00:00:00'),
(17, 5, '0000-00-00 00:00:00'),
(18, 5, '0000-00-00 00:00:00'),
(19, 5, '0000-00-00 00:00:00'),
(20, 5, '0000-00-00 00:00:00'),
(21, 5, '0000-00-00 00:00:00'),
(22, 5, '0000-00-00 00:00:00'),
(23, 5, '0000-00-00 00:00:00'),
(24, 5, '0000-00-00 00:00:00'),
(25, 5, '0000-00-00 00:00:00'),
(26, 5, '0000-00-00 00:00:00'),
(27, 5, '0000-00-00 00:00:00'),
(28, 5, '0000-00-00 00:00:00'),
(29, 5, '0000-00-00 00:00:00'),
(30, 5, '0000-00-00 00:00:00'),
(31, 5, '0000-00-00 00:00:00'),
(32, 5, '0000-00-00 00:00:00'),
(33, 5, '0000-00-00 00:00:00'),
(34, 5, '0000-00-00 00:00:00'),
(35, 5, '0000-00-00 00:00:00'),
(36, 5, '0000-00-00 00:00:00'),
(37, 5, '0000-00-00 00:00:00'),
(38, 5, '0000-00-00 00:00:00'),
(39, 5, '0000-00-00 00:00:00'),
(40, 5, '0000-00-00 00:00:00'),
(41, 5, '0000-00-00 00:00:00'),
(42, 5, '0000-00-00 00:00:00'),
(43, 5, '0000-00-00 00:00:00'),
(44, 5, '0000-00-00 00:00:00'),
(45, 5, '0000-00-00 00:00:00'),
(46, 5, '0000-00-00 00:00:00'),
(46, 5, '2018-04-10 23:46:04'),
(54, 5, '2018-04-11 16:45:18'),
(55, 5, '2018-04-11 16:49:20'),
(56, 5, '2018-04-11 17:50:45');

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

INSERT INTO `fiador` (`idFiador`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `colonia`, `calle`, `numero`, `cp`, `telefono`, `correo`, `nombreTrabajo`, `telefonoTrabajo`, `coloniaTrabajo`, `calleTrabajo`, `numeroTrabajo`, `cpTrabajo`) VALUES
(1, 'Emilio', 'Lopez', 'Gutierrez', 'Calesa', 'Avenida 5 de Febrero', '334', 76020, '6455068143', 'augurare@fornari.gov', 'Maleficiau plan?ssim fembrer SLU', '8829335892', 'Carolina', 'Avenida 5 de Febrero', '765', 76177),
(2, 'Natalia ', 'Buedo', 'Mangas', 'Carolina', 'Abasolo', '700', 76177, '6380447423', 'halurgies@arpegen.gov', 'Desestanyant bronquinej?veu debateg?ssiu SA', '8635122373', 'Calesa', 'Abasolo', '544', 76020),
(3, 'Berthana ', 'Tufio ', 'Cortaza', 'Casa Blanca', 'Abelardo Ávila', '500', 76224, '6186496839', 'edipiques@diligenciarien.es', 'Caracterol?giques forcons SL', '7499508681', 'El Campanario', 'Abelardo ?vila', '537', 76146),
(4, 'Eddy ', 'Ballugera ', 'Cabanela', 'El Arco', 'Abedul', '456', 76134, '8759996217', 'animosos@ecliptic.es', 'Desavenien neonatologies SA', '8398212739', 'El Carrizal', 'Abedul', '654', 76030),
(5, 'Juan ', 'Gabi ', 'Remolino', 'El Campanario', 'Abetal', '321', 76146, '7316257605', 'residissin@pobretejarem.eu', 'Desempolain? tombassejaves atrevida SLU', '816271255', 'Jacarandas', 'Abetal', '234', 76029),
(6, 'Virgilio ', 'Raon ', 'Garate', 'El Carrizal', 'De Los Arquitos', '453', 76030, '796519563', 'voltegi@reingressarieu.net', 'Llotejant perxers eric?ssem', '6182565221', 'Industrial', 'De Los Arquitos', '634', 76130),
(7, 'Laila', 'O?iderra', 'Aldana', 'Eucaliptos I', 'De los Jesuitas', '963', 76160, '6254014051', 'esprintas@amansir.gov', 'Esperonarien vesessen psicofisi?loga SA', '8278884795', 'Jacarandas', 'De los Jesuitas', '897', 76029),
(8, 'Laureano ', 'Mayllar ', 'Maria', 'Fray Juan P', 'Felipe Luna', '1513', 76036, '7144082397', 'pencut@sintetitzesses.eu', 'Futur?logues accentuarà invents SL', '866644802', 'Insurgentes', 'Felipe Luna', '1523', 76117),
(9, 'Evangelina', 'Mendieta', 'Vi?ales', 'Hidalgo', 'Felipe Carrillo', '549', 76057, '6547455781', 'executaven@desentestau.es', 'Laiter Development', '8964720483', 'Industrial', 'Felipe Carrillo', '2134', 76130),
(10, 'Rainier ', 'Roson ', 'Acitores', 'Huertas La Joya', 'Izcoatl', '348', 76137, '8638489602', 'patronegeu@xilles.com', 'Maltractaria borroners circumnavegam SL', '6588856338', 'Independencia', 'Izcoatl', '2456', 76147),
(11, 'Yamila ', 'Dobale ', 'Badas', 'Calesa', 'Jacaranda', '95', 76020, '7493808678', 'inaugurarien@desordenaven.net', 'Suspendre xemicava SA', '7640387549', 'Casa Blanca', 'Jacaranda', '974', 76224),
(12, 'Cirilo ', 'Perea', 'Quintairos', 'Casa Blanca', 'Jacinto', '115', 76224, '8341585821', 'destorbs@retrovenguis.gov', 'Xaparan moquejar? sobreafeg?sseu SA', '8365916296', 'Calesa', 'Jacinto', '234', 76020),
(13, 'Amargura ', 'Leyte ', 'Arizmendi', 'Independencia', 'Acceso Norte', '653', 76147, '8511548191', 'apletassim@cintre.gov', 'Boscada aflorarem margo', '8611829233', 'Huertas La Joya', 'Acceso Norte', '541', 76137),
(14, 'Perla', 'Reigadas', 'Balbas', 'Industrial', 'Bel?n', '536', 76130, '7828078027', 'reproduixen@presumptiu.org', 'Xorr? reu apinyat SA', '8755280898', 'Hidalgo', 'Bel?n', '365', 76057),
(15, 'Pr?xedes ', 'Zubeldia', 'Alzola', 'Insurgentes', 'Berenice', '981', 76117, '8884629692', 'escloscavem@deflegmaveu.eu', 'Laqui blasquisme SLU', '6821863442', 'Fray Juan P', 'Berenice', '234', 76036),
(16, 'Ryan ', 'Folgueral ', 'Cainzos', 'Jacarandas', 'Adolfo De La Huerta', '1345', 76029, '8810230781', 'voluntaris@puntualitzaveu.net', 'Rossejar?eu doloreig SL', '6452189012', 'Eucaliptos I', 'Adolfo De La Huerta', '356', 76160),
(17, 'Neudis ', 'Lezama ', 'Abad?a', 'Industrial', 'Acero', '875', 76130, '7998485655', 'desnatat@malcriem.org', 'Enrandes espolseu distorsion? SL', '6921092363', 'El Campanario', 'Acero', '986', 76146),
(18, 'Ricardo ', 'Chave ', 'Mariategui', 'Jacarandas', 'Argentina', '932', 76029, '6737434542', 'testamentaria@entremesclessis.net', 'Remugaments esmorteixin SA', '6816393316', 'El Carrizal', 'Argentina', '235', 76030),
(19, 'Rita', 'Lombana ', 'Mugica', 'El Carrizal', 'Aries', '324', 76030, '7454203769', 'doble@bretxifiqueu.eu', 'Saltironeg?s parrell SL', '7214468080', 'El Arco', 'Aries', '2124', 76134),
(20, 'Brandol ', 'Congey ', 'Viz', 'El Campanario', 'Arist?teles', '563', 76146, '8606826404', 'sedavienques@retrogradarien.net', 'Bogu?ssim arrel', '6229028586', 'Casa Blanca', 'Arist?teles', '5212', 76224);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fiador_gradoestudios`
--

CREATE TABLE `fiador_gradoestudios` (
  `idFiador` int(11) NOT NULL,
  `idGrado` int(11) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fiador_gradoestudios`
--

INSERT INTO `fiador_gradoestudios` (`idFiador`, `idGrado`, `fecha`) VALUES
(1, 1, '0000-00-00 00:00:00'),
(9, 1, '0000-00-00 00:00:00'),
(17, 1, '0000-00-00 00:00:00'),
(2, 2, '0000-00-00 00:00:00'),
(10, 2, '0000-00-00 00:00:00'),
(18, 2, '0000-00-00 00:00:00'),
(3, 3, '0000-00-00 00:00:00'),
(11, 3, '0000-00-00 00:00:00'),
(19, 3, '0000-00-00 00:00:00'),
(4, 4, '0000-00-00 00:00:00'),
(12, 4, '0000-00-00 00:00:00'),
(20, 4, '0000-00-00 00:00:00'),
(5, 5, '0000-00-00 00:00:00'),
(13, 5, '0000-00-00 00:00:00'),
(6, 6, '0000-00-00 00:00:00'),
(14, 6, '0000-00-00 00:00:00'),
(7, 7, '0000-00-00 00:00:00'),
(15, 7, '0000-00-00 00:00:00'),
(8, 8, '0000-00-00 00:00:00'),
(16, 8, '0000-00-00 00:00:00');

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
(32, 'ESTRATEGIA DE MARKETING SUN TZU', 2004),
(33, 'los isomorfos', 1111),
(42, 'los miserables', 1111),
(43, 'mass effect', 1111);

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
(31, 33),
(31, 42),
(35, 42),
(36, 43);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo_categoria`
--

CREATE TABLE `titulo_categoria` (
  `idTitulo` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `titulo_categoria`
--

INSERT INTO `titulo_categoria` (`idTitulo`, `idCategoria`) VALUES
(1, 190),
(2, 600),
(3, 720),
(4, 600),
(5, 600),
(6, 600),
(7, 70),
(8, 70),
(9, 660),
(10, 10),
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
(32, 670),
(33, 2),
(42, 3),
(43, 401);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(25) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `nombre`, `password`) VALUES
('Admin', 'Elon Musk', 'Admin1'),
('Agonzales', 'Andrea González Pérez', '7iNxm'),
('Bmartinez', 'Brenda Eugenia Martínez Pérez', '7iNxm'),
('Cmunoz', 'Catalina Muñoz Pérez', '7iNxm'),
('Cvazquez', 'Claudia Guadalupe Vázquez Vázquez', 'hS6#8'),
('diegoB', 'Diego Betanzos', 'Lagatadelaiter#1'),
('Dlopez', 'Daniel López Correa', 'Ea@7!'),
('Dojeda', 'Daniel Ojeda Pérez', 'hS6#8'),
('Ecabrera', 'Ernestina Cabrera Ramírez', 'Ea@7!'),
('Elopez', 'Eugenio López Cardona', 'Ea@7!'),
('Fsolis', 'Fernando Solís Perea', '7iNxm'),
('Jgonzales', 'Juana Guadalupe González de la Cruz', 'hS6#8'),
('Jmartinez', 'Juan Carlos Martínez López', 'hS6#8'),
('Jperez', 'Juan Pérez Rosales', 'hS6#8'),
('Lgonzales', 'Luz Elena González Martínez', '7iNxm'),
('martin', 'Martin Vivanco', 'Martin#123'),
('MartinBecario', 'MartinBecario', '$2y$10$5VqYhjGZMHBSGT/fdWKLSOEQDoL0siG8B211KLUub/maxMxEnk2pC'),
('Mcruz', 'María del Carmen de la Cruz Martínez', '7iNxm'),
('Mguadaluoe', 'María Guadalupe Ramírez Castro', 'hS6#8'),
('Mguitierrez', 'Manuel Gutiérrez Pérez', 'hS6#8'),
('Mlopez', 'Margarita López Correa', 'Ea@7!'),
('Mperez', 'María Pérez López', 'Ea@7!'),
('Rcruz', 'Roberto Cruz Pérez', 'Ea@7!');

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
('martin', 1, '2018-03-16 00:00:00'),
('MartinBecario', 3, '2018-04-11 00:00:00'),
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
(6, 'Martin', 'Vivanco', 'Palacios', '2018-04-04', 'H'),
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
(6, 7, '0000-00-00 00:00:00'),
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
  ADD PRIMARY KEY (`idAutor`) USING BTREE;

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
-- Indices de la tabla `fiador_gradoestudios`
--
ALTER TABLE `fiador_gradoestudios`
  ADD PRIMARY KEY (`idGrado`,`idFiador`);

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
  ADD PRIMARY KEY (`idTitulo`,`idCategoria`),
  ADD KEY `idTitulo` (`idCategoria`) USING BTREE,
  ADD KEY `idCategoria` (`idTitulo`) USING BTREE;

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
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023;

--
-- AUTO_INCREMENT de la tabla `credencial`
--
ALTER TABLE `credencial`
  MODIFY `idCredencial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `ejemplar`
--
ALTER TABLE `ejemplar`
  MODIFY `idEjemplar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
  MODIFY `idTitulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `visitante`
--
ALTER TABLE `visitante`
  MODIFY `idVisitante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
