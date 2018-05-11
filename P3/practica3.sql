-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2018 a las 16:01:04
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `correo` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `obra_id` int(24) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`correo`, `id`, `obra_id`, `nome`, `ip`, `fecha`, `comment_text`) VALUES
('eric@email.com', 2, 1, 'Eric', '::1', '2018-04-15 22:29:05', 'Me gusta mucho esta obra, les aconsejÃ© a mis amigos que vengan a ver este espectÃ¡culo de arte.'),
('emilio@email.com', 18, 3, 'Emilio Reguero Castro', '::1', '2018-04-15 22:28:05', 'Es una obra preciosa, merece la pena ir a Bilbao a verla.'),
('eregueroc@gmail.com', 53, 4, 'Emilio Reguero Castro', '1', '2018-04-19 19:33:54', 'Prueba de comentario en Obra 4'),
('eregueroc@gmail.com', 55, 5, 'Emilio Reguero Castro', '::1', '2018-04-19 19:35:57', 'Prueba en obra 5'),
('eregueroc@gmail.com', 57, 3, 'Emilio Reguero Castro', '::1', '2018-04-19 19:36:25', 'Prueba en obra 3'),
('eregueroc@gmail.com', 59, 3, 'Emilio Reguero Castro', '::1', '2018-04-19 19:37:09', 'Prueba en obra 3 de nuevo'),
('eregueroc@gmail.com', 61, 2, 'a', '::1', '2018-04-19 19:38:03', 'Prueba obra 2 2\r\n'),
('eregueroc@gmail.com', 63, 4, 'Emilio Reguero Castro', '::1', '2018-04-19 19:40:13', 'Oteiza'),
('eregueroc@gmail.com', 65, 1, 'Emilio Reguero Castro', '::1', '2018-04-19 21:10:48', 'ññññ'),
('eregueroc@gmail.com', 66, 8, 'Emilio', '::1', '2018-04-23 01:02:33', 'Pruebas2'),
('eregueroc@gmail.com', 68, 7, 'Emilio Reguero Castro', '::1', '2018-04-23 02:38:51', '¡Una obra magnifica!'),
('eregueroc@gmail.com', 70, 7, 'Emilio Reguero Castro', '::1', '2018-04-23 02:38:57', '¡Una obra magnifica!'),
('eregueroc@gmail.com', 72, 7, 'Emilio Reguero Castro', '::1', '2018-04-23 02:39:05', '¡Una obra magnifica!'),
('eregueroc@gmail.com', 74, 7, 'Emilio Reguero Castro', '::1', '2018-04-23 02:39:20', '¡Una obra magnifica!'),
('eregueroc@gmail.com', 76, 7, 'Emilio Reguero Castro', '::1', '2018-04-23 02:40:36', 'Prueba2'),
('eregueroc@gmail.com', 77, 6, 'Emilio Reguero Castro', '::1', '2018-04-23 02:41:41', '¡Una obra maginifica!'),
('Erik@example.it', 78, 6, 'Erik', '::1', '2018-04-23 02:42:23', 'Merece la pena.'),
('eregueroc@gmail.com', 79, 3, 'Emilio Reguero Castro', '::1', '2018-04-23 02:42:59', 'Prueba 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

CREATE TABLE `obras` (
  `id` int(6) NOT NULL,
  `titulo` varchar(160) COLLATE utf8_spanish_ci NOT NULL,
  `autor` varchar(160) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` int(11) NOT NULL,
  `coleccion` int(16) NOT NULL,
  `imagen` varchar(160) COLLATE utf8_spanish_ci NOT NULL,
  `fuente_imagen` varchar(160) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` mediumtext CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `web_autor` varchar(260) COLLATE utf8_spanish_ci NOT NULL,
  `biografia_autor` varchar(260) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `obras`
--

INSERT INTO `obras` (`id`, `titulo`, `autor`, `fecha`, `coleccion`, `imagen`, `fuente_imagen`, `descripcion`, `fecha_creacion`, `fecha_modificacion`, `web_autor`, `biografia_autor`) VALUES
(1, '24 Cabezas', 'Antonio Saura', 1957, 4, 'img/sauracabezas1.jpg', 'Guggenheim Bilbao', 'Las obras de papel constituyen una parte importante del trabajo de Saura. Fue pertinaz dibujante durante toda su carrera y empleaba el dibujo para explorar todas las variaciones y transformaciones de sus múltiples temas. 24 Cabezas (1957) pertenece al tema \"Multitudes\", en la que trabajó el artista desde finales de la década de 1950 hasta los últimos años de su vida. En estas obras, los rostros sin cuerpo entrelazados ocupan la mayor parte o toda la superficie del lienzo o el papel, creando una composición amplia e integral. 24 Cabezas destaca por ser una colección más flexible de figuras garabateadas. Las cabezas de tono terroso, definidas por estallidos estenográficos, sin ilusión alguna de profundidad, se articulan por líneas de luz blanca o sombra. Esta obra también presenta un elemento de collage, ya que las piezas de cartón ondulado están pegadas con cola al papel, lo que aporta calidad táctil a algunos de los rostros.', '2018-04-13', '2018-04-18', 'http://www.antoniosaura.org', 'https://es.wikipedia.org/wiki/Antonio_Saura'),
(2, 'Villa Borghese', 'Willem de Kooning', 1960, 4, 'img/De-Kooning.jpg', 'Guggenheim Bilbao', 'Villa Borghese, una de las escasas obras de gran formato realizadas por De Kooning en 1960, no se basa en el encuentro del artista con Nueva York y sus alrededores, sino en el encuentro con Roma, donde pasó unos cinco meses en 1959–60. No solo se alude al lugar en el título de la pintura, que hace referencia a un gran y conocido parque público de la capital italiana, sino también en sus coloridas tonalidades mediterráneas. Las amplias zonas de color, pintadas en capas húmedas superpuestas, sugieren correspondencias naturalistas: la luz amarilla del sol, el cielo y el agua azules y la hierba y las hojas verdes. Sin embargo, esta obra, que De Kooning realizó a su vuelta a Nueva York, no representa ningún lugar concreto, es más bien una traducción subjetiva al lenguaje pictórico de sus recuerdos de la Ciudad Eterna.', '2018-04-13', '2018-04-17', 'http://www.dekooning.org', 'https://es.wikipedia.org/wiki/Willem_de_Kooning'),
(3, 'La Gran antropometria azul', 'Yves Klein', 1960, 4, 'img/Antropometriaazul.jpg', 'Fuente: Guggenheim Bilbao', 'La gran Antropometría azul (ANT 105) [La grande Anthropométrie bleue (ANT 105), ca. 1960] forma parte de una serie de cuatro obras que representan la apoteosis de la técnica del \"pincel vivo\" de Klein. El artista se refería a estas obras como sus Batallas (Batailles), término que evoca el género de la pintura de historia dentro de la historia del arte, una conexión que también sugieren las grandes dimensiones de las obras. Como ha observado Nan Rosenthal, las Antropometrías de Klein son simbólicas y representativas, en cuanto a que \"parecen ilustrar a un sujeto y sus huellas literales\". No obstante, algunos de estos trazos resultantes son más abstractos que otros. En La gran Antropometría azul (ANT 105), las formas corpóreas de las figuras son ilegibles y sus movimientos por el papel quedan plasmados más como estallidos explosivos, salpicaduras y manchas de pintura, como si el artista quisiera burlarse del Arte Informal europeo o de la pintura del Expresionismo Abstracto americano.', '2018-04-13', '2018-04-16', 'http://www.yvesklein.com/', 'https://es.wikipedia.org/wiki/Yves_Klein'),
(4, 'Caja metafísica por conjunción de dos triedro.', 'Jorge Oteiza', 1958, 2, 'img/Oteiza-Homenaje-a-Leonardo.jpg', 'Guggenheim Bilbao', 'Es una obra que aprovecha un estudio del movimiento desde un punto de vista estructural para, al mismo tiempo figurativamente, hacer referencias a las fases de la luna. Se halla muy próxima a una pieza fundamental de Oteiza, Homenaje a Malevich. En estas piezas debido a la utilización combinada de la técnica de la soldadura y de la forja, la escultura parece convertirse en causa y efecto espacial: el espacio se define en sus concavidades, pero a la vez, al presionar éste sobre las formas parece ser el causante último de las mismas.\r\n\r\nAl igual que la obra Desocupación no cúbica del espacio, Caja metafísica por conjunción de dos triedros, se inscribe en la serie dedicada a Construcciones vacías y a las Cajas metafísicas. Oteiza despliega una compleja combinatoria entre planos escalonados y volúmenes espaciales internos y externos. A pesar de situarse cerca de la práctica neoplasticista y suprematista, los procedimientos empleados en esta escultura ponen de manifiesto una de las constantes en la trayectoria de su autor: la voluntad de preservar el contenido vital de sus obras respecto al logicismo puro. A la rigidez analítica de la matemática, el escultor vasco opone la biología o la física, ciencias ancladas en la realidad.', '2018-04-13', '2018-04-15', 'http://www.museooteiza.org', 'https://es.wikipedia.org/wiki/Jorge_de_Oteiza'),
(5, 'Ensayo de desocupación de la esfera', 'Jorge Oteiza', 1958, 2, 'img/Ensayo.jpg', 'Guggenheim Bilbao', 'La escultura De la serie de la desocupación de la esfera es una construcción dinámica a base de torsiones curvas de formas lineales. Con trabajos como este, Jorge Oteiza obtuvo el premio de escultura en la IV Bienal de Arte de São Paulo de 1957, consiguiendo cierta influencia en el desarrollo del movimiento neoconcreto brasileño. Las investigaciones en el ámbito de la desocupación de la esfera surgieron a partir del trabajo que el escultor realizó sobre maquetas, denominado Laboratorio experimental. En este, Oteiza afrontó la forma cilíndrica por medio de fragmentos metálicos con los que articulaba dos formas curvas con diferente orientación espacial, las cuales, por su naturaleza, evocaban la idea de movimiento y la posibilidad real de adoptar diversas posiciones. La escultura de Oteiza, según sus propias palabras, planteó «la estatua como organismo puramente espacial». Las desocupaciones de la esfera poseen una complejidad unitaria y serena, sugiriendo un movimiento centrífugo que libera un espacio activo o núcleo, noción que en Oteiza siempre tenía una connotación metafísica.', '2018-04-15', '2018-04-18', 'http://www.museooteiza.org', 'https://es.wikipedia.org/wiki/Jorge_de_Oteiza'),
(6, 'Complot de familia. Segunda versión', 'Txomin Badiola', 1993, 3, 'img/Complot.jpg', 'Guggenheim Bilbao', 'Complot de familia. Segunda versión es una obra esencial en la carrera de Txomin Badiola. En ella, los elementos estrictamente constructivos, tan estrechamente vinculados a sus obras, convergen con su interés por la arquitectura, el diseño, el mobiliario y la escenografía teatral, junto con la incorporación de referencias del cine, la televisión, las fotonovelas, los cómics, etc. Esta segunda versión a la que se alude en la primera parte del título es el desarrollo de una anterior que se presentó por primera vez en una exposición celebrada en Nueva York en 1994.\r\n\r\nLa obra fue incluida en una exposición en 1995 en Madrid. La muestra integraba una serie de ficciones (alegorías múltiples) que se alimentaban de retos extraños para la realidad que Badiola definía como situaciones absurdas o improbables plasmadas por personas reales que \"acaban creando un entorno material y espacial\". A medio camino entre la escenografía teatral y la insinuación cinematográfica, la obra de arte amplía los límites de la escultura, al tiempo que se adentra en el terreno de los medios postmodernos.\r\n\r\nAl unir objetos, construcciones y fotografías de personas aparentemente sin relación alguna entre sí pero que presentan fuertes cualidades evocadoras, el espectador se siente impelido a situarlas en el tiempo y el espacio mediante una acción imaginada y, por consiguiente, acaba completando la obra de arte. Así, es el espectador quien otorga significado a esta instalación al unificar y relacionar los diferentes espacios escenográficos, así como los objetos e imágenes ubicados en ella y en sus inmediaciones, de manera que todo se justifica mutuamente.', '2018-04-15', '2018-04-20', 'http://www.museoreinasofia.es/exposiciones/txomin-badiola', 'https://es.wikipedia.org/wiki/Txomin_Badiola'),
(7, 'Humanos (Humans)', 'Christian Boltanski', 1994, 3, 'img/Humanos.jpg', 'Guggenheim Bilbao', 'La obra Humanos (Humans), al mismo tiempo personal y universal en cuanto a sus referencias, es una de las composiciones de grandes dimensiones que el artista acomete como monumento en honor de los muertos, insinuando una referencia al Holocausto, aunque sin nombrarlo explícitamente. Por sus dimensiones y su tono, la obra evoca el ambiente contemplativo de un pequeño teatro o un espacio de culto religioso. La instalación se compone de más de 1.100 imágenes refotografiadas de otras tantas imágenes que había utilizado anteriormente: fotos de colegio, de familia, imágenes de periódicos y del archivo de la policía. Las fotografías, al mismo tiempo iluminadas y enturbiadas por las bombillas que cuelgan desnudas, no ofrecen ningún contexto con el que se pueda identificar o conectar a los anónimos individuos, o distinguir a los vivos de los muertos, o a las víctimas de los criminales. Cada una de estas huellas de vida humana está reducida a un tamaño uniforme con el fin de dificultar la identificación de sus rasgos y sugerir la igualdad de los sujetos de las fotografías. La colección de imágenes se instala aleatoriamente, impidiéndose con ello la imposición de una narrativa única. Dentro de este entorno inquietante, Boltanski mezcla emoción e historia al yuxtaponer inocencia y culpabilidad, verdad y mentira, sentimentalismo y profundidad.', '2018-04-15', '2018-04-19', 'http://www.circulodelarte.com/es/autor/boltanski-christian/es', 'https://es.wikipedia.org/wiki/Christian_Boltanski'),
(8, 'El diluvio (Le Déluge)', 'Miquel Barceló', 1990, 1, 'img/Diluvio.jpg', 'Guggenheim Bilbao', 'Toda la imagen de El diluvio  está pintada en tonos azules y grises, con blanco para los afluentes más lejanos, insinuando el agua. En primer plano, Barceló pintó las salpicaduras producidas por las gotas de lluvia al golpear una superficie de agua. El avance en diagonal del río y la inclinación de la lluvia aportan potencia dinámica y velocidad a la imagen; así, con medios desechados, el pintor captó la fuerza de una tormenta. El cuadro presenta el mismo efecto líquido que el de la tierra mojada bajo la lluvia. De un modo simbólico, estas imágenes de lluvia ponen fin a los numerosos paisajes desérticos del artista.\r\n\r\nLa lluvia entra por la ventana y cubre todo el cuadro, irónicamente imitando la estructura integral de algunas obras del Expresionismo Abstracto y subvirtiendo la dicotomía tradicional entre la figura y el fondo. Aquí, Barceló también quería reflejar la naturaleza líquida de la pintura y la posibilidad de usarla metafóricamente para captar el tiempo.', '2018-04-15', '2018-04-17', 'http://www.miquelbarcelo.org/', 'https://es.wikipedia.org/wiki/Miquel_Barcel%C3%B3'),
(9, 'Tierra de los dos ríos (Zweistromland)', 'Anselm Kiefer', 1995, 1, 'img/Tierra.jpg', 'Guggenheim Bilbao', 'Tierra de los dos ríos (Zweistromland, 1995) hace referencia a la tierra delimitada por los ríos Tigris y Éufrates, cuna de la antigua Babilonia, hogar de Gilgamesh —cuya leyenda explora Kiefer en Gilgamesh y Enkidu en el bosque de cedros II (Gilgamesch und Enkidu im Zedernwald II, 1981), también perteneciente a la colección del Museo Guggenheim Bilbao—, y una región clave para el judaísmo y el cristianismo. Fue en esa región donde los sumerios inventaron la escritura en el cuarto milenio antes de Cristo. Las pinturas de Kiefer evocan la tierra, sus civilizaciones y la creación de la cultura escrita. El título, inscrito en la esquina superior derecha del lienzo, puede interpretarse como una alusión a la propia palabra escrita, que deja una huella duradera que transciende las civilizaciones y las épocas. Esta obra monumental se vio precedida por una escultura del mismo nombre, en la que varios libros de plomo transmiten la sensación de durabilidad de la palabra escrita y de la historia.', '2018-04-15', '2018-04-20', 'http://www.alejandradeargos.com/index.php/es/completas/32-artistas/287-anselm-kiefer-biografia-obras-y-exposiciones', 'https://es.wikipedia.org/wiki/Anselm_Kiefer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `palabrasprohibidas`
--

CREATE TABLE `palabrasprohibidas` (
  `id` int(11) NOT NULL,
  `palabra` varchar(85) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `palabrasprohibidas`
--

INSERT INTO `palabrasprohibidas` (`id`, `palabra`) VALUES
(1, 'caca'),
(2, 'tonto'),
(4, 'basura'),
(5, 'idiota'),
(6, 'cacca'),
(7, 'cabron'),
(8, 'gilipollas'),
(9, 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo`) VALUES
(1, 'comentarista');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Obras_comentarios` (`obra_id`);

--
-- Indices de la tabla `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Unico nombre` (`titulo`),
  ADD KEY `imagen` (`imagen`),
  ADD KEY `obra_coleccion` (`coleccion`);

--
-- Indices de la tabla `palabrasprohibidas`
--
ALTER TABLE `palabrasprohibidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `obras`
--
ALTER TABLE `obras`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `palabrasprohibidas`
--
ALTER TABLE `palabrasprohibidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `Obras_comentarios` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`id`);

--
-- Filtros para la tabla `obras`
--
ALTER TABLE `obras`
  ADD CONSTRAINT `obra_coleccion` FOREIGN KEY (`coleccion`) REFERENCES `colecciones` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
