-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2023 a las 03:50:47
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fic_plus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `ID_Categorias` int(11) NOT NULL,
  `Categoria` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID_Categorias`, `Categoria`, `Descripcion`) VALUES
(1, 'Infantiles', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `ID_Clasificacion` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`ID_Clasificacion`, `Descripcion`) VALUES
(1, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `ID_Peliculas` int(11) NOT NULL,
  `Titulo` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Director` varchar(100) DEFAULT NULL,
  `Enlace_Video` varchar(100) DEFAULT NULL,
  `ID_Categoria` int(11) DEFAULT NULL,
  `Etiquetas` int(11) DEFAULT NULL,
  `ID_Clasificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`ID_Peliculas`, `Titulo`, `Descripcion`, `Director`, `Enlace_Video`, `ID_Categoria`, `Etiquetas`, `ID_Clasificacion`) VALUES
(1, 'Cars', 'Un carrito fregon', 'Escorssese', 'achetemeele', 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `ID_Perfil` int(11) NOT NULL,
  `Nombre_Perfil` varchar(100) DEFAULT NULL,
  `Etiquetas` int(11) DEFAULT NULL,
  `ID_Clasificacion` int(11) DEFAULT NULL,
  `ID_Usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre_Usuario` varchar(100) DEFAULT NULL,
  `Apellido_Usuario` varchar(100) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Contrasenia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID_Categorias`);

--
-- Indices de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`ID_Clasificacion`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`ID_Peliculas`),
  ADD KEY `Peliculas_FK` (`ID_Categoria`),
  ADD KEY `Peliculas_FK_1` (`ID_Clasificacion`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`ID_Perfil`),
  ADD KEY `Perfiles_FK` (`ID_Usuario`),
  ADD KEY `Perfiles_FK_1` (`ID_Clasificacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID_Categorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  MODIFY `ID_Clasificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `ID_Peliculas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `ID_Perfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `Peliculas_FK` FOREIGN KEY (`ID_Categoria`) REFERENCES `categorias` (`ID_Categorias`),
  ADD CONSTRAINT `Peliculas_FK_1` FOREIGN KEY (`ID_Clasificacion`) REFERENCES `clasificacion` (`ID_Clasificacion`);

--
-- Filtros para la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD CONSTRAINT `Perfiles_FK` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`),
  ADD CONSTRAINT `Perfiles_FK_1` FOREIGN KEY (`ID_Clasificacion`) REFERENCES `clasificacion` (`ID_Clasificacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
