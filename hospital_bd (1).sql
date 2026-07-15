-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-07-2026 a las 23:48:49
-- Versión del servidor: 9.7.0
-- Versión de PHP: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospital_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

DROP TABLE IF EXISTS `citas`;
CREATE TABLE IF NOT EXISTS `citas` (
  `id_cita` int NOT NULL AUTO_INCREMENT,
  `id_paciente` int NOT NULL,
  `id_doctor` int NOT NULL,
  `id_habitacion` int NOT NULL,
  `fecha_cita` datetime NOT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `estado` enum('Programada','Completada','Cancelada') DEFAULT 'Programada',
  PRIMARY KEY (`id_cita`),
  KEY `id_paciente` (`id_paciente`),
  KEY `id_doctor` (`id_doctor`),
  KEY `id_habitacion` (`id_habitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `id_paciente`, `id_doctor`, `id_habitacion`, `fecha_cita`, `motivo`, `estado`) VALUES
(31, 8, 5, 6, '2026-07-10 21:19:00', 'Tos y fiebre', 'Programada'),
(32, 9, 6, 7, '2026-07-04 17:32:00', 'Tos y Temperatura', 'Programada'),
(33, 8, 5, 6, '2026-03-11 20:35:00', 'Infeccion estomacal', 'Programada'),
(34, 14, 13, 6, '2026-10-13 19:32:00', 'Infeccion ocular', 'Programada'),
(35, 18, 12, 11, '2026-04-22 19:35:00', 'Infeccion en vias urinarias', 'Programada'),
(36, 74, 8, 18, '2026-03-12 17:34:00', 'Fiebre de 45', 'Programada'),
(37, 79, 7, 23, '2026-08-17 20:34:00', 'Bronquitis', 'Programada'),
(38, 72, 14, 14, '2026-08-24 17:35:00', 'Fractura ', 'Programada'),
(39, 64, 14, 15, '2026-10-08 17:36:00', 'Cirugia ocular', 'Programada'),
(40, 24, 11, 23, '2026-07-31 20:36:00', 'Paracitos intestinales', 'Programada'),
(41, 49, 10, 17, '2026-08-05 22:37:00', 'Fiebre', 'Programada'),
(42, 49, 10, 17, '2026-07-22 21:41:00', 'Artritis', 'Programada'),
(43, 21, 7, 24, '2026-12-09 22:42:00', 'Cirugia cardiaca', 'Programada'),
(44, 21, 11, 15, '2026-10-29 21:39:00', 'Chequeo medico', 'Programada'),
(45, 70, 12, 13, '2026-08-17 17:40:00', 'Infeccion intestinal', 'Programada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

DROP TABLE IF EXISTS `doctores`;
CREATE TABLE IF NOT EXISTS `doctores` (
  `id_doctor` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `especialidad` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_doctor`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id_doctor`, `nombre`, `apellido`, `especialidad`, `telefono`, `correo`) VALUES
(5, 'Javier', 'García Lara', 'Medicina General', '5511110001', 'javier.garcia@hospitalsamy.com'),
(6, 'Daniela', 'Pérez Gómez', 'Cardiología', '5511110002', 'daniela.perez@hospitalsamy.com'),
(7, 'Ricardo', 'Torres Hernández', 'Pediatría', '5511110003', 'ricardo.torres@hospitalsamy.com'),
(8, 'Laura', 'Flores Ramírez', 'Ginecología', '5511110004', 'laura.flores@hospitalsamy.com'),
(9, 'Miguel', 'Sánchez Ortiz', 'Traumatología', '5511110005', 'miguel.sanchez@hospitalsamy.com'),
(10, 'Fernanda', 'Morales Díaz', 'Neurología', '5511110006', 'fernanda.morales@hospitalsamy.com'),
(11, 'Alejandro', 'Vargas Cruz', 'Dermatología', '5511110007', 'alejandro.vargas@hospitalsamy.com'),
(12, 'Patricia', 'Luna Reyes', 'Oftalmología', '5511110008', 'patricia.luna@hospitalsamy.com'),
(13, 'Roberto', 'Castillo Vega', 'Cirugía General', '5511110009', 'roberto.castillo@hospitalsamy.com'),
(14, 'Gabriela', 'Navarro Silva', 'Urgencias', '5511110010', 'gabriela.navarro@hospitalsamy.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

DROP TABLE IF EXISTS `habitaciones`;
CREATE TABLE IF NOT EXISTS `habitaciones` (
  `id_habitacion` int NOT NULL AUTO_INCREMENT,
  `numero` varchar(10) NOT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `estado` enum('Disponible','Ocupada','Mantenimiento') DEFAULT 'Disponible',
  PRIMARY KEY (`id_habitacion`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id_habitacion`, `numero`, `tipo`, `estado`) VALUES
(6, '101', 'General', 'Disponible'),
(7, '102', 'General', 'Disponible'),
(8, '103', 'General', 'Disponible'),
(9, '104', 'General', 'Disponible'),
(10, '105', 'General', 'Disponible'),
(11, '201', 'Privada', 'Disponible'),
(12, '202', 'Privada', 'Disponible'),
(13, '203', 'Privada', 'Disponible'),
(14, '204', 'Privada', 'Disponible'),
(15, '205', 'Privada', 'Disponible'),
(16, '301', 'Estancia', 'Disponible'),
(17, '302', 'Estancia', 'Disponible'),
(18, '303', 'Estancia', 'Disponible'),
(19, '304', 'Estancia', 'Disponible'),
(20, '305', 'Estancia', 'Disponible'),
(21, '401', 'UCI', 'Disponible'),
(22, '402', 'UCI', 'Disponible'),
(23, '403', 'UCI', 'Disponible'),
(24, '404', 'UCI', 'Disponible'),
(25, '405', 'UCI', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE IF NOT EXISTS `pacientes` (
  `id_paciente` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `edad` int NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `direccion` varchar(120) NOT NULL,
  `diagnostico` varchar(120) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `nombre`, `apellido`, `edad`, `sexo`, `telefono`, `direccion`, `diagnostico`, `fecha_ingreso`) VALUES
(8, 'EMMANUEL', 'ALCÁNTARA', 20, 'Masculino', '5510000002', 'Av. Juárez #45', 'Gripe', '2026-07-08'),
(9, 'ORLANDO H.', 'ALVARADO', 18, 'Masculino', '5510000003', 'Calle Morelos #18', 'Fiebre', '2026-07-08'),
(10, 'CARLOS R.', 'AVILÉS', 19, 'Masculino', '5510000004', 'Av. Independencia #22', 'Dolor de cabeza', '2026-07-08'),
(11, 'ÁNGEL RICARDO', 'BAUTISTA', 20, 'Masculino', '5510000005', 'Calle Reforma #9', 'Infección', '2026-07-08'),
(12, 'DIEGO', 'BAUTISTA', 18, 'Masculino', '5510000006', 'Calle Guerrero #30', 'Consulta General', '2026-07-08'),
(13, 'ESTEBAN E.', 'CÁRDENAS', 19, 'Masculino', '5510000007', 'Av. Benito Juárez #15', 'Gastritis', '2026-07-08'),
(14, 'ISSAC MOYS', 'CHÁVEZ', 20, 'Masculino', '5510000008', 'Calle Allende #44', 'Migraña', '2026-07-08'),
(15, 'RICARDO A.', 'CÓRDOVA', 18, 'Masculino', '5510000009', 'Av. Nacional #60', 'Resfriado', '2026-07-08'),
(16, 'EMILIO', 'CORRALES', 19, 'Masculino', '5510000010', 'Calle Pino Suárez #5', 'Dolor muscular', '2026-07-08'),
(17, 'ERIKA MAYR', 'CRUZ', 20, 'Femenino', '5510000011', 'Av. Zaragoza #80', 'Gripe', '2026-07-08'),
(18, 'MIGUEL EST', 'GALICIA', 18, 'Masculino', '5510000012', 'Calle Matamoros #11', 'Consulta General', '2026-07-08'),
(19, 'YARELY JIM', 'GUZMÁN', 19, 'Femenino', '5510000013', 'Av. Las Flores #25', 'Fiebre', '2026-07-08'),
(20, 'JOSÉ ALFRE', 'GUZMÁN', 20, 'Masculino', '5510000014', 'Calle Central #40', 'Dolor abdominal', '2026-07-08'),
(21, 'ANA PAOLA', 'JIMÉNEZ', 18, 'Femenino', '5510000015', 'Av. Universidad #16', 'Consulta General', '2026-07-08'),
(22, 'EZEQUIEL', 'LIMA', 19, 'Masculino', '5510000016', 'Calle Principal #7', 'Resfriado', '2026-07-08'),
(23, 'GRECIA VALI', 'LÓPEZ', 20, 'Femenino', '5510000017', 'Av. México #55', 'Migraña', '2026-07-08'),
(24, 'CHRISTIAN O.', 'LÓPEZ', 18, 'Masculino', '5510000018', 'Calle Robles #13', 'Dolor de garganta', '2026-07-08'),
(25, 'ROSA MARÍA', 'MARTÍNEZ', 19, 'Femenino', '5510000019', 'Av. Morelos #32', 'Consulta General', '2026-07-08'),
(26, 'FABIOLA A.', 'MORALES', 20, 'Femenino', '5510000020', 'Calle Hidalgo #90', 'Infección', '2026-07-08'),
(27, 'VÍCTOR M.', 'NAVA', 18, 'Masculino', '5510000021', 'Av. Juárez #71', 'Gripe', '2026-07-08'),
(28, 'LUZ ARELI', 'PADILLA', 19, 'Femenino', '5510000022', 'Calle Reforma #26', 'Dolor estomacal', '2026-07-08'),
(29, 'JAQUELINE', 'PERALTA', 20, 'Femenino', '5510000023', 'Av. Independencia #12', 'Fiebre de 35', '2026-07-08'),
(30, 'JULISSA M.', 'PÉREZ', 18, 'Femenino', '5510000024', 'Calle Guerrero #8', 'Consulta General', '2026-07-08'),
(31, 'MARÍA CECI', 'RAMÍREZ', 19, 'Femenino', '5510000025', 'Av. Benito Juárez #101', 'Resfriado comun', '2026-07-08'),
(33, 'Roud', 'PERALTA', 78, 'Masculino', '458458845', 'KILOIUI', 'JULI', '2026-07-09'),
(34, 'Torres ', 'Velazquez', 45, 'Masculino', '5598745698', 'abasolo n10', 'malito', '2026-07-13'),
(35, 'Juan', 'Pérez López', 25, 'Masculino', '5512340001', 'Av. Juárez 101, Ozumba', 'Gripe', '2026-07-01'),
(36, 'María', 'García Hernández', 32, 'Femenino', '5512340002', 'Calle Hidalgo 45, Ozumba', 'Migraña', '2026-07-01'),
(37, 'Carlos', 'Martínez Díaz', 41, 'Masculino', '5512340003', 'Av. Morelos 12, Amecameca', 'Hipertensión', '2026-07-02'),
(38, 'Ana', 'López Sánchez', 28, 'Femenino', '5512340004', 'Calle Guerrero 88, Ozumba', 'Gastritis', '2026-07-02'),
(39, 'José', 'Hernández Ruiz', 36, 'Masculino', '5512340005', 'Av. Reforma 20, Tepetlixpa', 'Diabetes', '2026-07-03'),
(40, 'Laura', 'Ramírez Torres', 22, 'Femenino', '5512340006', 'Calle Mina 11, Ozumba', 'Faringitis', '2026-07-03'),
(41, 'Miguel', 'Flores Gómez', 55, 'Masculino', '5512340007', 'Av. Zaragoza 91, Amecameca', 'Artritis', '2026-07-04'),
(42, 'Sofía', 'Cruz Morales', 19, 'Femenino', '5512340008', 'Calle Allende 33, Ozumba', 'Anemia', '2026-07-04'),
(43, 'Luis', 'Morales Castillo', 47, 'Masculino', '5512340009', 'Av. Independencia 8, Tepetlixpa', 'Asma', '2026-07-05'),
(44, 'Fernanda', 'Vargas Romero', 30, 'Femenino', '5512340010', 'Calle Matamoros 17, Ozumba', 'Bronquitis', '2026-07-05'),
(45, 'Ricardo', 'Ortega Silva', 38, 'Masculino', '5512340011', 'Av. Hidalgo 75, Amecameca', 'Colitis', '2026-07-06'),
(46, 'Daniela', 'Navarro Luna', 27, 'Femenino', '5512340012', 'Calle Juárez 90, Ozumba', 'Migraña', '2026-07-06'),
(47, 'Pedro', 'Mendoza Reyes', 44, 'Masculino', '5512340013', 'Av. Guerrero 10, Tepetlixpa', 'Hipertensión', '2026-07-07'),
(48, 'Valeria', 'Castro Ortiz', 24, 'Femenino', '5512340014', 'Calle Bravo 18, Ozumba', 'Gastritis', '2026-07-07'),
(49, 'Jorge', 'Rojas Vega', 61, 'Masculino', '5512340015', 'Av. Morelos 65, Amecameca', 'Diabetes', '2026-07-08'),
(50, 'Andrea', 'Santos León', 35, 'Femenino', '5512340016', 'Calle Abasolo 4, Ozumba', 'Fiebre', '2026-07-08'),
(51, 'Diego', 'Guerrero Núñez', 26, 'Masculino', '5512340017', 'Av. Juárez 80, Tepetlixpa', 'Gripe', '2026-07-09'),
(52, 'Camila', 'Pineda Salas', 29, 'Femenino', '5512340018', 'Calle Zaragoza 60, Ozumba', 'Alergia', '2026-07-09'),
(53, 'Alejandro', 'Salazar Peña', 50, 'Masculino', '5512340019', 'Av. Reforma 14, Amecameca', 'Neumonía', '2026-07-10'),
(54, 'Paola', 'Delgado Ríos', 33, 'Femenino', '5512340020', 'Calle Hidalgo 2, Ozumba', 'Otitis', '2026-07-10'),
(55, 'Fernando', 'Mejía Flores', 45, 'Masculino', '5512340021', 'Av. Independencia 22, Tepetlixpa', 'Colitis', '2026-07-11'),
(56, 'Gabriela', 'Espinoza Gil', 39, 'Femenino', '5512340022', 'Calle Guerrero 55, Ozumba', 'Migraña', '2026-07-11'),
(57, 'Raúl', 'Acosta Fuentes', 57, 'Masculino', '5512340023', 'Av. Juárez 110, Amecameca', 'Hipertensión', '2026-07-12'),
(58, 'Patricia', 'Campos Vera', 43, 'Femenino', '5512340024', 'Calle Mina 29, Ozumba', 'Artritis', '2026-07-12'),
(59, 'Hugo', 'Reyes Serrano', 31, 'Masculino', '5512340025', 'Av. Morelos 18, Tepetlixpa', 'Asma', '2026-07-13'),
(60, 'Diana', 'Ramos Soto', 23, 'Femenino', '5512340026', 'Calle Bravo 91, Ozumba', 'Gripe', '2026-07-13'),
(61, 'Eduardo', 'Peña Vargas', 40, 'Masculino', '5512340027', 'Av. Hidalgo 36, Amecameca', 'Bronquitis', '2026-07-14'),
(62, 'Natalia', 'Luna Cruz', 20, 'Femenino', '5512340028', 'Calle Juárez 9, Ozumba', 'Faringitis', '2026-07-14'),
(63, 'Arturo', 'Vega Rojas', 48, 'Masculino', '5512340029', 'Av. Zaragoza 77, Tepetlixpa', 'Diabetes', '2026-07-15'),
(64, 'Claudia', 'Silva Ortiz', 37, 'Femenino', '5512340030', 'Calle Hidalgo 63, Ozumba', 'Anemia', '2026-07-15'),
(65, 'Oscar', 'Fuentes León', 52, 'Masculino', '5512340031', 'Av. Reforma 42, Amecameca', 'Hipertensión', '2026-07-16'),
(66, 'Verónica', 'Moreno Díaz', 34, 'Femenino', '5512340032', 'Calle Guerrero 14, Ozumba', 'Migraña', '2026-07-16'),
(67, 'Iván', 'Castillo Romero', 28, 'Masculino', '5512340033', 'Av. Juárez 55, Tepetlixpa', 'Gripe', '2026-07-17'),
(68, 'Karen', 'Aguilar Méndez', 26, 'Femenino', '5512340034', 'Calle Morelos 88, Ozumba', 'Gastritis', '2026-07-17'),
(69, 'Manuel', 'Romero Flores', 63, 'Masculino', '5512340035', 'Av. Hidalgo 95, Amecameca', 'Diabetes', '2026-07-18'),
(70, 'Erika', 'Cervantes Ruiz', 30, 'Femenino', '5512340036', 'Calle Mina 5, Ozumba', 'Bronquitis', '2026-07-18'),
(71, 'Víctor', 'Nava Hernández', 49, 'Masculino', '5512340037', 'Av. Independencia 48, Tepetlixpa', 'Asma', '2026-07-19'),
(72, 'Liliana', 'Sosa Gómez', 41, 'Femenino', '5512340038', 'Calle Juárez 101, Ozumba', 'Artritis', '2026-07-19'),
(73, 'Emilio', 'Domínguez Lara', 27, 'Masculino', '5512340039', 'Av. Morelos 72, Amecameca', 'Fiebre', '2026-07-20'),
(74, 'Rosa', 'Lara Mendoza', 54, 'Femenino', '5512340040', 'Calle Hidalgo 16, Ozumba', 'Hipertensión', '2026-07-20'),
(75, 'Sergio', 'Torres Salinas', 33, 'Masculino', '5512340041', 'Av. Guerrero 98, Tepetlixpa', 'Colitis', '2026-07-21'),
(76, 'Mónica', 'Valencia Cruz', 29, 'Femenino', '5512340042', 'Calle Zaragoza 27, Ozumba', 'Otitis', '2026-07-21'),
(77, 'Francisco', 'Beltrán Ortiz', 58, 'Masculino', '5512340043', 'Av. Reforma 101, Amecameca', 'Diabetes', '2026-07-22'),
(78, 'Yolanda', 'Herrera Soto', 46, 'Femenino', '5512340044', 'Calle Bravo 40, Ozumba', 'Migraña', '2026-07-22'),
(79, 'Antonio', 'López Flores', 42, 'Masculino', '5512340045', 'Av. Juárez 16, Tepetlixpa', 'Neumonía', '2026-07-23'),
(80, 'Cecilia', 'Rivera Peña', 24, 'Femenino', '5512340046', 'Calle Mina 87, Ozumba', 'Gripe', '2026-07-23'),
(81, 'Mario', 'González Ruiz', 35, 'Masculino', '5512340047', 'Av. Hidalgo 57, Amecameca', 'Gastritis', '2026-07-24'),
(82, 'Lucía', 'Cortés Díaz', 21, 'Femenino', '5512340048', 'Calle Guerrero 73, Ozumba', 'Faringitis', '2026-07-24'),
(83, 'Roberto', 'Jiménez Morales', 53, 'Masculino', '5512340049', 'Av. Morelos 83, Tepetlixpa', 'Hipertensión', '2026-07-25'),
(84, 'Elena', 'Mora Vargas', 38, 'Femenino', '5512340050', 'Calle Juárez 39, Ozumba', 'Bronquitis', '2026-07-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

DROP TABLE IF EXISTS `recetas`;
CREATE TABLE IF NOT EXISTS `recetas` (
  `id_receta` int NOT NULL AUTO_INCREMENT,
  `id_cita` int NOT NULL,
  `medicamento` varchar(150) NOT NULL,
  `dosis` varchar(100) DEFAULT NULL,
  `indicaciones` text,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_receta`),
  KEY `id_cita` (`id_cita`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id_receta`, `id_cita`, `medicamento`, `dosis`, `indicaciones`, `fecha`) VALUES
(9, 31, 'Paracetamol', '18g', 'Tomar cada noche,dentro de los proximos 5 dias', '2026-07-14'),
(10, 35, 'Ambroxol', '25g', 'Tomar una tapita  por 1 semana al dia', '2026-07-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('Administrador','Medico') NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `password`, `rol`) VALUES
(1, 'admin', '12345', 'Administrador'),
(2, 'medico', '12345', 'Medico');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`id_doctor`) REFERENCES `doctores` (`id_doctor`),
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`id_habitacion`) REFERENCES `habitaciones` (`id_habitacion`);

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `recetas_ibfk_1` FOREIGN KEY (`id_cita`) REFERENCES `citas` (`id_cita`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
