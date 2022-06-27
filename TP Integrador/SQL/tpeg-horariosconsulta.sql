-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2022 a las 00:41:36
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpeg-horariosconsulta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_materias`
--

CREATE TABLE `alumnos_materias` (
  `id` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `estado` set('I','R','A') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `idProfesorMateria` int(11) NOT NULL,
  `cupo` int(11) DEFAULT NULL,
  `esVirtual` bit(1) NOT NULL DEFAULT b'1',
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `dia` enum('LUNES','MARTES','MIÉRCOLES','JUEVES','VIERNES','SÁBADO') NOT NULL,
  `cancelado` bit(1) NOT NULL DEFAULT b'0',
  `fechaEspecial` date DEFAULT NULL,
  `horaInicioEspecial` time DEFAULT NULL,
  `horaFinEspecial` time DEFAULT NULL,
  `motivoSuspension` varchar(50) DEFAULT NULL,
  `comentarioSuspension` varchar(500) DEFAULT NULL,
  `lugar` varchar(500) NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `idProfesorMateria` int(11) NOT NULL,
  `idAlumnoMateria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `dia` enum('LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SÁBADO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones_consultas`
--

CREATE TABLE `inscripciones_consultas` (
  `id` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `idConsulta` int(11) NOT NULL,
  `fechaHora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `esElectiva` bit(1) NOT NULL DEFAULT b'0',
  `carrera` set('ISI','IQ','IM','IE','IC') NOT NULL,
  `plan` enum('1996','2008','2022') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores_materias`
--

CREATE TABLE `profesores_materias` (
  `id` int(11) NOT NULL,
  `idProfesor` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `habilitado` bit(1) NOT NULL DEFAULT b'1',
  `legajo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_administradores_usuarios` (`idUsuario`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_alumnos_usuarios` (`idUsuario`);

--
-- Indices de la tabla `alumnos_materias`
--
ALTER TABLE `alumnos_materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_alumnosMaterias_alumnos` (`idAlumno`),
  ADD KEY `fk_alumnosMaterias_materias` (`idMateria`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_consultas_profesoresMaterias` (`idProfesorMateria`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cursos_alumnosMaterias` (`idAlumnoMateria`),
  ADD KEY `fk_cursos_profesoresMaterias` (`idProfesorMateria`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_horarios_cursos` (`idCurso`);

--
-- Indices de la tabla `inscripciones_consultas`
--
ALTER TABLE `inscripciones_consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_inscripcionesConsultas_consultas` (`idConsulta`),
  ADD KEY `fk_inscripcionesConsultas_alumnos` (`idAlumno`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_profesores_usuarios` (`idUsuario`);

--
-- Indices de la tabla `profesores_materias`
--
ALTER TABLE `profesores_materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_profesoresMaterias_profesores` (`idProfesor`),
  ADD KEY `fk_profesoresMaterias_materias` (`idMateria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos_materias`
--
ALTER TABLE `alumnos_materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscripciones_consultas`
--
ALTER TABLE `inscripciones_consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesores_materias`
--
ALTER TABLE `profesores_materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `fk_administradores_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `fk_alumnos_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `alumnos_materias`
--
ALTER TABLE `alumnos_materias`
  ADD CONSTRAINT `fk_alumnosMaterias_alumnos` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`idUsuario`),
  ADD CONSTRAINT `fk_alumnosMaterias_materias` FOREIGN KEY (`idMateria`) REFERENCES `materias` (`id`);

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `fk_consultas_profesoresMaterias` FOREIGN KEY (`idProfesorMateria`) REFERENCES `profesores_materias` (`id`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `fk_cursos_alumnosMaterias` FOREIGN KEY (`idAlumnoMateria`) REFERENCES `alumnos_materias` (`id`),
  ADD CONSTRAINT `fk_cursos_profesoresMaterias` FOREIGN KEY (`idProfesorMateria`) REFERENCES `profesores_materias` (`id`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `fk_horarios_cursos` FOREIGN KEY (`idCurso`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `inscripciones_consultas`
--
ALTER TABLE `inscripciones_consultas`
  ADD CONSTRAINT `fk_inscripcionesConsultas_alumnos` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`idUsuario`),
  ADD CONSTRAINT `fk_inscripcionesConsultas_consultas` FOREIGN KEY (`idConsulta`) REFERENCES `consultas` (`id`);

--
-- Filtros para la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `fk_profesores_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `profesores_materias`
--
ALTER TABLE `profesores_materias`
  ADD CONSTRAINT `fk_profesoresMaterias_materias` FOREIGN KEY (`idMateria`) REFERENCES `materias` (`id`),
  ADD CONSTRAINT `fk_profesoresMaterias_profesores` FOREIGN KEY (`idProfesor`) REFERENCES `profesores` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
