-- By Gaboh - 20250311
-- Database: `prestamosg1`

CREATE DATABASE IF NOT EXISTS `prestamosg1` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE prestamosg1;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------
-- PARAMETRIC TABLES --
-- --------------------

-- 01
-- Table structure for table `roles`
--
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` tinyint NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

-- 02
-- Table structure for table `generos`
--
CREATE TABLE IF NOT EXISTS `generos` (
  `id_genero` tinyint NOT NULL AUTO_INCREMENT,
  `nombre_genero` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_genero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

-- 03
-- Table structure for table `marcas`
--
CREATE TABLE IF NOT EXISTS `marcas` (
  `id_marca` int NOT NULL AUTO_INCREMENT,
  `nombre_marca` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

-- 04
-- Table structure for table `categorias`
--
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

-- 05
-- Table structure for table `tipos`
--
CREATE TABLE IF NOT EXISTS `tipos` (
  `id_tipo` tinyint NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

-- ---------------------------
-- TABLES WITH FOREIGN KEYS --
-- ---------------------------

-- 06
-- Table structure for table `usuarios`
--
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` varchar(12) NOT NULL,
  `nombre_usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_usuario` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `clave_usuario` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `telefono_usuario` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `direccion_usuario` varchar(80) COLLATE utf8_unicode_ci,
  `id_rol_usuario` tinyint NOT NULL,  
  `id_genero_usuario` tinyint NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `usuarios`
  ADD KEY (`id_rol_usuario`),
  ADD CONSTRAINT `fk_rol_usuario` FOREIGN KEY (`id_rol_usuario`) REFERENCES `roles` (`id_rol`)
  on update no action
  on delete no action,
  ADD KEY (`id_genero_usuario`),
  ADD CONSTRAINT `fk_genero_usuario` FOREIGN KEY (`id_genero_usuario`) REFERENCES `generos` (`id_genero`)
  on update no action
  on delete no action;

-- 07
-- Table structure for table `productos`
--
CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` varchar(12) NOT NULL,
  `nombre_producto` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_producto` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `costo_producto` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `alquiler_hora_producto` int NOT NULL,
  `alquiler_dia_producto` int NOT NULL,
  `id_marca_producto` int NOT NULL,  
  `id_categoria_producto` int NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `productos`
  ADD KEY (`id_marca_producto`),
  ADD CONSTRAINT `fk_marca_producto` FOREIGN KEY (`id_marca_producto`) REFERENCES `marcas` (`id_marca`)
  on update no action
  on delete no action,
  ADD KEY (`id_categoria_producto`),
  ADD CONSTRAINT `fk_categoria_producto` FOREIGN KEY (`id_categoria_producto`) REFERENCES `categorias` (`id_categoria`)
  on update no action
  on delete no action;

-- 08
-- Table structure for table `imagenes`
--
CREATE TABLE IF NOT EXISTS `imagenes` (
  `nombre_imagen` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `id_producto_imagen` varchar(12) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `imagenes`
  ADD KEY (`id_producto_imagen`),
  ADD CONSTRAINT `fk_producto_imagen` FOREIGN KEY (`id_producto_imagen`) REFERENCES `productos` (`id_producto`)
  on update no action
  on delete no action;

