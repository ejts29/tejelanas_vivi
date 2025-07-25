-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2025 a las 18:01:50
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
-- Base de datos: `tejelanas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `asunto` varchar(100) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `mensaje` text NOT NULL,
  `metodo_envio` varchar(50) DEFAULT NULL,
  `metodo_pago` varchar(50) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `email`, `telefono`, `asunto`, `categoria`, `mensaje`, `metodo_envio`, `metodo_pago`, `fecha`) VALUES
(1, 'efren', 'Rizky5056CVXNI@hotmail.com', '65464646464', 'productos_info', 'productos', 'Me gustaría obtener más información sobre el producto: Set de Agujas de Bambú.', 'retiro_tienda', 'tarjeta_debito', '2025-05-30 15:57:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(1, '¿Qué materiales se incluyen en los talleres?', 'En todos nuestros talleres incluimos los materiales básicos necesarios para completar el proyecto: lanas, agujas y accesorios. Si deseas trabajar con materiales específicos o de mayor calidad, puedes adquirirlos por separado en nuestra tienda con un 10% de descuento al estar inscrito en un taller.'),
(2, '¿Cuál es la política de cancelación de talleres?', 'Puedes cancelar tu inscripción hasta 72 horas antes del inicio del taller para recibir un reembolso completo. Si cancelas entre 72 y 24 horas antes, recibirás un reembolso del 50%. Para cancelaciones con menos de 24 horas de anticipación, no se realizan reembolsos, pero puedes transferir tu cupo a otra persona o utilizarlo en un taller futuro dentro de los próximos 3 meses.'),
(3, '¿Realizan envíos a todo Chile?', 'Sí, realizamos envíos a todo Chile a través de empresas de courier confiables. Los tiempos de entrega varían según la ubicación: para la Región Metropolitana entre 1-3 días hábiles, y para regiones entre 3-5 días hábiles. Los costos de envío se calculan según el peso y destino. Para compras superiores a $30.000, el envío es gratuito a todo Chile.'),
(4, '¿Ofrecen talleres personalizados para grupos?', 'Sí, ofrecemos talleres personalizados para grupos a partir de 5 personas. Puedes elegir la temática, el nivel y la fecha que más te convenga. También organizamos talleres para eventos especiales como cumpleaños, despedidas de soltera o actividades de team building para empresas. Contáctanos para más información y cotizaciones personalizadas.'),
(5, '¿Qué métodos de pago aceptan?', 'Aceptamos diversos métodos de pago para tu comodidad: tarjetas de crédito y débito (Visa, Mastercard, American Express), transferencia bancaria, WebPay, y efectivo en nuestra tienda física. Para los talleres, puedes pagar el 50% como reserva y el resto el día del taller. También ofrecemos la opción de pago en cuotas sin interés con tarjetas de crédito seleccionadas.'),
(6, '¿Tienen programa de fidelización?', 'Sí, contamos con el programa \"Tejedoras Vivi\" que te permite acumular puntos por cada compra o taller. Estos puntos pueden canjearse por descuentos, productos o inscripciones a talleres. Además, los miembros del programa reciben acceso anticipado a nuevas colecciones, invitaciones a eventos exclusivos y ofertas especiales. Pregunta en nuestra tienda cómo unirte al programa.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagenUrl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagenUrl`) VALUES
(1, 'Lana Merino Premium', '100% lana merino de la más alta calidad, suave al tacto y perfecta para prendas delicadas.', 12500.00, 'src/assets/images/Lana Merino Premium.jpg'),
(2, 'Set de Agujas de Bambú', 'Juego completo de agujas de bambú en diferentes tamaños, ligeras y cómodas para tejer.', 18900.00, 'src/assets/images/Set de Agujas de Bambú.jpg'),
(3, 'Hilo de Algodón Orgánico', 'Algodón 100% orgánico, perfecto para proyectos de verano y prendas frescas y ligeras.', 8900.00, 'src/assets/images/Hilo de Algodon Organico.jpg'),
(4, 'Kit de Accesorios', 'Todo lo que necesitas: marcadores, contador de vueltas, cinta métrica y tijeras de precisión.', 15500.00, 'src/assets/images/Kit de Accesorios.jpg'),
(5, 'Lana de Alpaca', 'Lana de alpaca suave y cálida, ideal para prendas de invierno y proyectos especiales.', 14900.00, 'src/assets/images/Lana de Alpaca.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quienessomos`
--

CREATE TABLE `quienessomos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `mision` text NOT NULL,
  `vision` text NOT NULL,
  `imagenUrl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `quienessomos`
--

INSERT INTO `quienessomos` (`id`, `titulo`, `descripcion`, `mision`, `vision`, `imagenUrl`) VALUES
(1, 'Sobre Nosotros', 'En Tejelanas Vivi nos apasiona el arte del tejido y buscamos compartir esta pasión con nuestra comunidad. Desde 2010 ofrecemos productos de alta calidad, talleres creativos y un espacio donde las tejedoras pueden inspirarse, aprender y conectarse.', 'Fomentar la creatividad a través del tejido, ofreciendo productos de excelencia y espacios de aprendizaje accesibles para todos.', 'Ser referentes en la comunidad creativa del tejido, reconocidos por nuestro compromiso con la calidad, la inclusión y la innovación.', 'http://localhost/tejelanas_vivi/src/assets/images/Captura%20de%20pantalla%202025-05-29%20171243.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quienessomos`
--
ALTER TABLE `quienessomos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `quienessomos`
--
ALTER TABLE `quienessomos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
