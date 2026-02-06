-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2026 a las 13:29:34
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
-- Base de datos: `ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajas`
--

CREATE TABLE `cajas` (
  `id_caja` int(11) NOT NULL,
  `nombre_caja` varchar(255) NOT NULL,
  `caja_estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cajas`
--

INSERT INTO `cajas` (`id_caja`, `nombre_caja`, `caja_estado`) VALUES
(1, 'CAJA CENTRAL', 1),
(2, 'CAJA 2', 1),
(3, 'CAJA 3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) DEFAULT NULL,
  `codigoProductoSin` int(11) DEFAULT NULL,
  `categoria_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `codigoProductoSin`, `categoria_estado`) VALUES
(1, 'ABARROTES', 2587854, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `documentoid` varchar(20) DEFAULT NULL,
  `complementoid` varchar(5) DEFAULT NULL,
  `tipo_documento` int(11) NOT NULL,
  `razon_social` varchar(100) DEFAULT NULL,
  `cliente_email` varchar(100) DEFAULT NULL,
  `cliente_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `documentoid`, `complementoid`, `tipo_documento`, `razon_social`, `cliente_email`, `cliente_estado`) VALUES
(1, '13966711', 'dir', 0, 'embol srl', 'embol@gmail.com', 0),
(2, '13966719', 'dir', 0, 'arbol srl', 'embol@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `id_medida` int(11) NOT NULL,
  `descripcion_medida` varchar(100) DEFAULT NULL,
  `descripcion_corta` varchar(5) DEFAULT NULL,
  `codigoMedidaSin` int(11) DEFAULT NULL,
  `medida_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`id_medida`, `descripcion_medida`, `descripcion_corta`, `codigoMedidaSin`, `medida_estado`) VALUES
(1, 'KILOGRAMO', 'KG.', 25, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(30) DEFAULT NULL,
  `nombre_producto` varchar(255) DEFAULT NULL,
  `costo_compra` decimal(10,2) DEFAULT NULL,
  `precio_venta` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `id_medida` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `producto_estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nick` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `id_caja` int(11) NOT NULL,
  `usuario_estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nick`, `nombre`, `clave`, `id_caja`, `usuario_estado`) VALUES
(7, 'ventas4', 'ale', '71d42a703c3abf21160a5838654eb038', 1, 1),
(26, 'aaa', 'bbb', '9df62e693988eb4e1e1444ece0578579', 1, 1),
(27, 'ddd', 'fff', 'ba248c985ace94863880921d8900c53f', 1, 1),
(28, 'ttt', 'yyy', '44f437ced647ec3f40fa0841041871cd', 1, 1),
(29, 'ttt', 'yyy', '44f437ced647ec3f40fa0841041871cd', 1, 1),
(30, 'ttt', 'yyy', '44f437ced647ec3f40fa0841041871cd', 1, 1),
(31, 'ttt', 'yyy', '44f437ced647ec3f40fa0841041871cd', 1, 1),
(32, 'ttt', 'yyy', '44f437ced647ec3f40fa0841041871cd', 1, 1),
(33, 'ttt', 'yyy', '44f437ced647ec3f40fa0841041871cd', 1, 1),
(34, 'ttt', 'yyy', '44f437ced647ec3f40fa0841041871cd', 1, 1),
(35, 'ttt', 'yyy', '44f437ced647ec3f40fa0841041871cd', 1, 1),
(36, 'ttt', 'yyy', '44f437ced647ec3f40fa0841041871cd', 1, 1),
(37, 'ttt', 'yyy', '44f437ced647ec3f40fa0841041871cd', 1, 1),
(38, 'lll', 'mmm', 'bf083d4ab960620b645557217dd59a49', 1, 1),
(39, 'lll', 'mmm', 'bf083d4ab960620b645557217dd59a49', 1, 1),
(40, 'lll', 'mmm', 'bf083d4ab960620b645557217dd59a49', 1, 1),
(41, 'lll', 'mmm', 'bf083d4ab960620b645557217dd59a49', 1, 1),
(42, 'lll', 'mmm', 'bf083d4ab960620b645557217dd59a49', 1, 1),
(43, 'lll', 'mmm', 'bf083d4ab960620b645557217dd59a49', 1, 1),
(44, 'lll', 'mmm', 'bf083d4ab960620b645557217dd59a49', 1, 1),
(45, 'lll', 'mmm', 'bf083d4ab960620b645557217dd59a49', 1, 1),
(46, 'aaa', 'bbb', '9df62e693988eb4e1e1444ece0578579', 1, 1),
(47, 'rrrrrr', 'ggg', 'ba248c985ace94863880921d8900c53f', 2, 1),
(48, 'luis', 'luis', '502ff82f7f1f8218dd41201fe4353687', 1, 0),
(49, 'daniel', 'daniel miranda', 'e10adc3949ba59abbe56e057f20f883e', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cajas`
--
ALTER TABLE `cajas`
  ADD PRIMARY KEY (`id_caja`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`id_medida`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_medida` (`id_medida`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuarios_cajas` (`id_caja`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cajas`
--
ALTER TABLE `cajas`
  MODIFY `id_caja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `id_medida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_medida`) REFERENCES `medidas` (`id_medida`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_cajas` FOREIGN KEY (`id_caja`) REFERENCES `cajas` (`id_caja`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
