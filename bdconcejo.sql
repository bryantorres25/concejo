-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla concejo.asistencias
CREATE TABLE IF NOT EXISTS `asistencias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `persona_id` bigint(20) unsigned NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `asistencias_persona_id_foreign` (`persona_id`),
  CONSTRAINT `asistencias_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla concejo.asistencias: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `asistencias` DISABLE KEYS */;
INSERT INTO `asistencias` (`id`, `fecha`, `persona_id`, `estado`, `created_at`, `updated_at`, `hora`) VALUES
	(57, '2020-11-25', 19, 1, '2020-11-25 15:28:29', '2020-11-25 15:28:29', '03:28:29'),
	(58, '2020-11-25', 2, 1, '2020-11-25 15:31:51', '2020-11-25 15:31:51', '03:31:51'),
	(59, '2020-11-25', 1, 1, '2020-11-25 17:07:49', '2020-11-25 17:07:49', '05:07:49'),
	(60, '2020-11-26', 2, 1, '2020-11-26 12:13:11', '2020-11-26 12:13:11', '12:13:11'),
	(61, '2020-11-26', 1, 1, '2020-11-26 13:54:11', '2020-11-26 13:54:11', '01:54:11'),
	(62, '2020-11-27', 2, 1, '2020-11-27 10:32:53', '2020-11-27 10:32:53', '10:32:53'),
	(63, '2020-11-27', 1, 1, '2020-11-27 10:35:17', '2020-11-27 10:35:17', '10:35:17'),
	(64, '2020-11-27', 18, 1, '2020-11-27 12:22:55', '2020-11-27 12:22:55', '12:22:55'),
	(65, '2020-11-27', 17, 1, '2020-11-27 12:28:07', '2020-11-27 12:28:07', '12:28:07'),
	(66, '2020-11-28', 3, 1, '2020-11-28 13:36:26', '2020-11-28 13:36:26', '01:36:26'),
	(67, '2020-11-28', 8, 1, '2020-11-28 13:38:06', '2020-11-28 13:38:06', '01:38:06'),
	(68, '2020-12-09', 2, 1, '2020-12-09 12:08:50', '2020-12-09 12:08:50', '12:08:50'),
	(69, '2020-12-09', 1, 1, '2020-12-09 12:10:42', '2020-12-09 12:10:42', '12:10:42'),
	(70, '2021-01-12', 1, 1, '2021-01-12 21:15:20', '2021-01-12 21:15:20', '09:15:20'),
	(71, '2021-01-12', 2, 1, '2021-01-12 21:18:04', '2021-01-12 21:18:04', '09:18:04'),
	(72, '2021-04-23', 1, 1, '2021-04-23 12:38:26', '2021-04-23 12:38:26', '12:38:26'),
	(73, '2021-05-31', 1, 1, '2021-05-31 11:04:28', '2021-05-31 11:04:28', '11:04:28'),
	(74, '2021-10-23', 1, 1, '2021-10-23 08:51:42', '2021-10-23 08:51:42', '08:51:42'),
	(75, '2021-10-23', 17, 1, '2021-10-23 08:54:01', '2021-10-23 08:54:01', '08:54:01');
/*!40000 ALTER TABLE `asistencias` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.aspirantes
CREATE TABLE IF NOT EXISTS `aspirantes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `documento` bigint(20) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `hoja_vida` varchar(200) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `tipoeleccion_id` bigint(20) unsigned NOT NULL,
  `foto` varchar(200) DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__tipoelecciones` (`tipoeleccion_id`),
  CONSTRAINT `FK__tipoelecciones` FOREIGN KEY (`tipoeleccion_id`) REFERENCES `tipoelecciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla concejo.aspirantes: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `aspirantes` DISABLE KEYS */;
INSERT INTO `aspirantes` (`id`, `nombres`, `apellidos`, `documento`, `telefono`, `direccion`, `hoja_vida`, `estado`, `tipoeleccion_id`, `foto`, `created_at`, `updated_at`) VALUES
	(19, 'ANUAR ENRIQUE', 'BALDOVINO NUÑEZ', 92032436, NULL, 'SINCELEJO 1', '1606339952ANUAR BALDOVINO.PDF', 1, 11, '1606341922FOTO ANUAR.jpg', '2020-11-25 15:48:07', '2020-11-26 15:01:01'),
	(20, 'GADIS LORENA', 'GUTIERREZ SERPA', 1102867754, NULL, NULL, '1606340576GADIS LORENA GUTIERREZ SERPA.PDF', 1, 11, '1606340001FOTO GADIS.jpg', '2020-11-25 15:48:34', '2020-11-25 16:42:56'),
	(21, 'RAMIRO', 'BUELVAS VILLEGAS', 1049482383, NULL, NULL, '1606340094RAMIRO BUELVAS VILLEGAS.PDF', 1, 11, '', '2020-11-25 15:49:00', '2020-11-25 16:34:54'),
	(22, 'MARLON DE JESUS', 'PATERNINA FIGUEROA', 1102835357, NULL, NULL, '1606340201MARLON PATERNINA.PDF.pdf', 1, 11, '', '2020-11-25 15:49:22', '2020-11-25 16:36:41'),
	(23, 'ANTONIA DEL CARMEN', 'MUÑOZ COTERA', 1102807628, NULL, NULL, '1606340256ANTONIA MUÑOZ.PDF', 1, 11, '1606420878images.png', '2020-11-25 15:49:40', '2020-11-26 15:01:18'),
	(24, 'SEBASTIAN', 'AMADOR AMARIS', 1102845310, NULL, NULL, '1606340317SEBASTIAN AMADOR AMARIS.PDF', 1, 11, '1606420901images.png', '2020-11-25 15:49:58', '2020-11-26 15:01:41'),
	(25, 'ILENA PATRICIA', 'ARRIETA GOMEZ', 64870771, NULL, NULL, '1606340363ILEANA ARRIETA GOMEZ.PDF', 1, 11, '', '2020-11-25 15:50:13', '2020-11-25 16:39:23'),
	(26, 'NATALIA MARIA', 'GUTIERREZ FERIA', 1102867261, NULL, NULL, '1606340418NATALIA GUTIERREZ.PDF', 1, 11, '1606340454FOTO NATALIA.JPG', '2020-11-25 15:50:28', '2020-11-27 10:36:16');
/*!40000 ALTER TABLE `aspirantes` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.aspirantes_grupales
CREATE TABLE IF NOT EXISTS `aspirantes_grupales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `documento` bigint(20) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `hoja_vida` varchar(200) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `foto` varchar(200) DEFAULT '',
  `eleccionsocial_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_aspirantes_grupales_tipoeleccionessociales` (`eleccionsocial_id`),
  CONSTRAINT `FK_aspirantes_grupales_tipoeleccionessociales` FOREIGN KEY (`eleccionsocial_id`) REFERENCES `tipoeleccionessociales` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla concejo.aspirantes_grupales: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `aspirantes_grupales` DISABLE KEYS */;
/*!40000 ALTER TABLE `aspirantes_grupales` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.cargos
CREATE TABLE IF NOT EXISTS `cargos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla concejo.cargos: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` (`id`, `nombre`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'ADMINISTRADOR', 'controla todo', 1, '2020-09-01 19:01:20', '2020-10-19 08:36:27'),
	(2, 'SECRETARIA', 'funciones principales', 1, '2020-09-01 19:01:32', '2020-10-19 08:46:21'),
	(3, 'CONCEJAL', 'funciones limitadas', 1, '2020-09-19 08:56:55', '2020-10-12 15:43:00'),
	(4, 'PRESIDENTE', 'GESTIONA', 1, '2020-10-08 14:57:46', '2020-10-08 14:57:46'),
	(5, '1ER VICEPRESIDENTE', 'SUPLE AL PRESEIDENTE', 1, '2020-10-12 15:04:14', '2020-10-12 15:04:14'),
	(6, '2DO VICEPRESIDENTE', 'SUPLE AL PRESIDENTE', 1, '2020-10-12 15:04:39', '2020-10-18 13:28:16');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.carpetas_recursos
CREATE TABLE IF NOT EXISTS `carpetas_recursos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla concejo.carpetas_recursos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `carpetas_recursos` DISABLE KEYS */;
INSERT INTO `carpetas_recursos` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'ARCHIVOS CONSTITUCIONALES', 1, '2020-10-08 14:11:09', '2020-11-26 15:07:51'),
	(2, 'LEYES', 1, '2020-11-25 17:06:33', '2020-11-25 17:06:33'),
	(3, 'ACUERDOS', 1, '2020-11-25 17:06:48', '2020-11-25 17:06:48'),
	(4, 'DECRETOS MUNICIPALES', 1, '2020-11-25 17:07:03', '2020-11-25 17:07:03'),
	(5, 'DECRETOS LEY', 1, '2020-11-25 17:07:37', '2020-11-25 17:22:33');
/*!40000 ALTER TABLE `carpetas_recursos` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.ciudadanos
CREATE TABLE IF NOT EXISTS `ciudadanos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(200) NOT NULL DEFAULT '0',
  `apellidos` varchar(200) NOT NULL DEFAULT '0',
  `documento` int(20) NOT NULL DEFAULT '0',
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla concejo.ciudadanos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ciudadanos` DISABLE KEYS */;
INSERT INTO `ciudadanos` (`id`, `nombres`, `apellidos`, `documento`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'hhsdfjghsjfgjsfsdj', 'ksahdfkajwdhlashdkas', 0, 1, '2020-11-26 13:55:14', '2020-11-26 13:57:55');
/*!40000 ALTER TABLE `ciudadanos` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.comisiones
CREATE TABLE IF NOT EXISTS `comisiones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `tipo` varchar(50) NOT NULL DEFAULT '0',
  `estado` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla concejo.comisiones: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `comisiones` DISABLE KEYS */;
INSERT INTO `comisiones` (`id`, `nombre`, `tipo`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'COMISIÓN PRIMERA O DEL PLAN Y BIENES', '1', 1, '2020-10-11 12:57:45', '2020-10-12 14:25:52'),
	(2, 'COMISION SEGUNDA O ADMINISTRATIVA Y DE ASUNTOS SOCIALES', '1', 1, '2020-10-11 12:57:57', '2020-10-11 12:57:57'),
	(3, 'COMISION TERCERA O DE PRESUPUESTO Y ASUNTOS FISCALES', '1', 1, '2020-10-11 12:58:10', '2020-10-11 12:58:10'),
	(4, 'COMISION LEGAL PARA LA EQUIDAD DE LA MUJER', '2', 1, '2020-10-11 12:58:22', '2020-10-11 12:58:22'),
	(5, 'COMISION DE ETICA', '2', 1, '2020-10-11 12:58:39', '2020-10-11 12:58:39'),
	(6, 'COMISION DE ACREDITACION DOCUMENTAL', '2', 1, '2020-10-11 12:58:58', '2020-10-11 12:58:58'),
	(7, 'NINGUNA', '1', 1, '2020-10-12 10:47:03', '2020-10-13 10:18:01');
/*!40000 ALTER TABLE `comisiones` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.debates
CREATE TABLE IF NOT EXISTS `debates` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` mediumtext,
  `ciudadano_id` bigint(20) unsigned NOT NULL,
  `fecha_recibido` date DEFAULT NULL,
  `fecha_limite` date DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__ciudadanos` (`ciudadano_id`),
  CONSTRAINT `FK__ciudadanos` FOREIGN KEY (`ciudadano_id`) REFERENCES `ciudadanos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla concejo.debates: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `debates` DISABLE KEYS */;
INSERT INTO `debates` (`id`, `nombre`, `descripcion`, `ciudadano_id`, `fecha_recibido`, `fecha_limite`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'Uuuuuu', 'sdfsfs', 1, '2020-11-25', '2020-11-27', 1, '2020-11-26 13:58:17', '2020-11-26 13:59:01'),
	(2, 'Aaa', 'erwerwe', 1, '2020-11-26', '2020-11-25', 1, '2020-11-26 13:58:53', '2020-11-26 13:58:53');
/*!40000 ALTER TABLE `debates` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.derrotero
CREATE TABLE IF NOT EXISTS `derrotero` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `ruta` varchar(200) NOT NULL DEFAULT '0',
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla concejo.derrotero: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `derrotero` DISABLE KEYS */;
INSERT INTO `derrotero` (`id`, `fecha`, `ruta`, `estado`, `created_at`, `updated_at`) VALUES
	(6, '2020-11-26', '1606417903PRUEBA.pdf', 1, '2020-11-26 14:11:43', '2020-11-26 14:11:43');
/*!40000 ALTER TABLE `derrotero` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.detalles_plancha
CREATE TABLE IF NOT EXISTS `detalles_plancha` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `plancha_id` bigint(20) NOT NULL,
  `persona_id` bigint(20) NOT NULL,
  `comision_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `persona_id` (`persona_id`),
  KEY `comision_id` (`comision_id`),
  KEY `plancha_id` (`plancha_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla concejo.detalles_plancha: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `detalles_plancha` DISABLE KEYS */;
INSERT INTO `detalles_plancha` (`id`, `plancha_id`, `persona_id`, `comision_id`, `created_at`, `updated_at`) VALUES
	(37, 14, 8, 1, '2020-11-26 14:31:14', '2020-11-26 14:31:14'),
	(38, 14, 7, 1, '2020-11-26 14:31:14', '2020-11-26 14:31:14'),
	(39, 15, 2, 1, '2020-11-26 15:22:51', '2020-11-26 15:22:51'),
	(40, 15, 4, 1, '2020-11-26 15:22:51', '2020-11-26 15:22:51'),
	(41, 15, 7, 1, '2020-11-26 15:22:51', '2020-11-26 15:22:51'),
	(42, 15, 7, 3, '2020-11-26 15:22:51', '2020-11-26 15:22:51');
/*!40000 ALTER TABLE `detalles_plancha` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.elecciones
CREATE TABLE IF NOT EXISTS `elecciones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `aspirante_id` bigint(20) unsigned NOT NULL,
  `persona_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `estado` int(11) NOT NULL DEFAULT '1',
  `tipoeleccion_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__aspirantes` (`aspirante_id`),
  KEY `FK_elecciones_personas` (`persona_id`),
  KEY `FK_elecciones_so_tipoelecciones` (`tipoeleccion_id`),
  CONSTRAINT `FK_elecciones_so_tipoelecciones` FOREIGN KEY (`tipoeleccion_id`) REFERENCES `tipoelecciones` (`id`),
  CONSTRAINT `elecciones_ibfk_1` FOREIGN KEY (`aspirante_id`) REFERENCES `aspirantes` (`id`),
  CONSTRAINT `elecciones_ibfk_2` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla concejo.elecciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `elecciones` DISABLE KEYS */;
INSERT INTO `elecciones` (`id`, `fecha`, `aspirante_id`, `persona_id`, `estado`, `tipoeleccion_id`, `created_at`, `updated_at`) VALUES
	(1, '2021-10-23', 20, 17, 1, 11, '2021-10-23 10:12:26', '2021-10-23 10:12:26');
/*!40000 ALTER TABLE `elecciones` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.elecciones_comisiones
CREATE TABLE IF NOT EXISTS `elecciones_comisiones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `plancha_id` bigint(20) unsigned NOT NULL,
  `persona_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_elecciones_comisiones_plancha` (`plancha_id`),
  KEY `FK_elecciones_comisiones_personas` (`persona_id`),
  CONSTRAINT `FK_elecciones_comisiones_personas` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
  CONSTRAINT `FK_elecciones_comisiones_plancha` FOREIGN KEY (`plancha_id`) REFERENCES `plancha` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla concejo.elecciones_comisiones: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `elecciones_comisiones` DISABLE KEYS */;
INSERT INTO `elecciones_comisiones` (`id`, `fecha`, `plancha_id`, `persona_id`, `created_at`, `updated_at`) VALUES
	(2, '2020-11-27', 13, 16, '2020-11-24 09:07:18', '2020-11-24 09:07:18'),
	(3, '2020-11-27', 13, 7, '2020-11-24 09:07:18', '2020-11-24 09:07:18'),
	(4, '2020-11-27', 13, 6, '2020-11-24 09:07:21', '2020-11-24 09:07:21'),
	(6, '2020-11-27', 13, 5, '2020-11-24 09:07:44', '2020-11-24 09:07:44'),
	(8, '2020-11-27', 13, 17, '2020-11-24 09:08:57', '2020-11-24 09:08:57'),
	(9, '2020-11-27', 13, 13, '2020-11-24 09:10:56', '2020-11-24 09:10:56'),
	(10, '2020-11-27', 15, 9, '2020-11-24 09:14:06', '2020-11-24 09:14:06');
/*!40000 ALTER TABLE `elecciones_comisiones` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.elecciones_social
CREATE TABLE IF NOT EXISTS `elecciones_social` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `persona_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `aspirantegrupal_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `eleccionsocial_id` bigint(20) unsigned NOT NULL DEFAULT '1',
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_elecciones_personas` (`persona_id`),
  KEY `FK_elecciones_aspirantes_grupales` (`aspirantegrupal_id`),
  KEY `FK_elecciones_tipoeleccionessociales` (`eleccionsocial_id`),
  CONSTRAINT `FK_elecciones_aspirantes_grupales` FOREIGN KEY (`aspirantegrupal_id`) REFERENCES `aspirantes_grupales` (`id`),
  CONSTRAINT `FK_elecciones_personas` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
  CONSTRAINT `FK_elecciones_tipoeleccionessociales` FOREIGN KEY (`eleccionsocial_id`) REFERENCES `tipoeleccionessociales` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla concejo.elecciones_social: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `elecciones_social` DISABLE KEYS */;
/*!40000 ALTER TABLE `elecciones_social` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.estados
CREATE TABLE IF NOT EXISTS `estados` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla concejo.estados: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'ACTIVO', 1, '2020-09-19 08:58:38', '2020-09-19 08:58:39'),
	(3, 'SUSPENDIDA', 1, '2020-09-19 08:58:40', '2020-09-19 08:58:41'),
	(4, 'COMPLETADO', 1, '2020-09-19 08:58:42', '2020-09-19 08:58:42');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla concejo.failed_jobs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla concejo.migrations: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(5, '2014_10_12_000000_create_users_table', 1),
	(6, '2014_10_12_100000_create_password_resets_table', 1),
	(7, '2019_08_19_000000_create_failed_jobs_table', 1),
	(8, '2020_08_28_062534_create_cargos_table', 1),
	(9, '2020_09_01_114400_create_partidos_table', 1),
	(10, '2020_09_01_120916_create_tipovotaciones_table', 1),
	(11, '2020_09_01_122758_create_personas_table', 1),
	(12, '2020_09_10_192321_create_asistencias_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.orden_dias
CREATE TABLE IF NOT EXISTS `orden_dias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `ruta` mediumtext COLLATE utf8mb4_unicode_ci,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla concejo.orden_dias: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `orden_dias` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden_dias` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.palabras
CREATE TABLE IF NOT EXISTS `palabras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `persona_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__personas` (`persona_id`),
  CONSTRAINT `FK__personas` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla concejo.palabras: ~24 rows (aproximadamente)
/*!40000 ALTER TABLE `palabras` DISABLE KEYS */;
INSERT INTO `palabras` (`id`, `fecha`, `estado`, `persona_id`, `created_at`, `updated_at`) VALUES
	(3, '2020-11-23', 1, 15, '2020-11-23 15:55:53', '2020-11-23 15:55:53'),
	(9, '2020-11-24', 1, 13, '2020-11-24 08:55:09', '2020-11-24 08:55:09'),
	(12, '2020-11-24', 1, 15, '2020-11-24 08:55:18', '2020-11-24 08:55:18'),
	(13, '2020-11-24', 1, 5, '2020-11-24 08:55:36', '2020-11-24 08:55:36'),
	(15, '2020-11-24', 1, 6, '2020-11-24 08:56:48', '2020-11-24 08:56:48'),
	(16, '2020-11-24', 1, 5, '2020-11-24 08:57:04', '2020-11-24 08:57:04'),
	(18, '2020-11-24', 1, 15, '2020-11-24 08:57:24', '2020-11-24 08:57:24'),
	(21, '2020-11-24', 1, 5, '2020-11-24 08:58:41', '2020-11-24 08:58:41'),
	(22, '2020-11-25', 1, 7, '2020-11-25 08:48:20', '2020-11-25 08:48:20'),
	(23, '2020-11-25', 1, 18, '2020-11-25 08:52:17', '2020-11-25 08:52:17'),
	(28, '2020-11-25', 1, 6, '2020-11-25 09:11:06', '2020-11-25 09:11:06'),
	(29, '2020-11-25', 1, 16, '2020-11-25 09:14:41', '2020-11-25 09:14:41'),
	(31, '2020-11-25', 1, 5, '2020-11-25 09:22:11', '2020-11-25 09:22:11'),
	(32, '2020-11-25', 1, 17, '2020-11-25 09:25:44', '2020-11-25 09:25:44'),
	(33, '2020-11-25', 1, 3, '2020-11-25 09:29:43', '2020-11-25 09:29:43'),
	(34, '2020-11-27', 1, 7, '2020-11-25 09:42:24', '2020-11-25 09:42:24'),
	(36, '2020-11-27', 1, 18, '2020-11-27 12:23:24', '2020-11-27 12:23:24'),
	(37, '2020-11-27', 1, 18, '2020-11-27 12:24:40', '2020-11-27 12:24:40'),
	(38, '2020-11-27', 1, 18, '2020-11-27 12:24:47', '2020-11-27 12:24:47'),
	(40, '2020-11-27', 1, 18, '2020-11-27 12:26:00', '2020-11-27 12:26:00'),
	(41, '2020-11-27', 1, 17, '2020-11-27 12:28:56', '2020-11-27 12:28:56'),
	(44, '2020-11-28', 1, 8, '2020-11-28 13:39:45', '2020-11-28 13:39:45'),
	(45, '2020-11-28', 1, 8, '2020-11-28 13:39:47', '2020-11-28 13:39:47'),
	(46, '2020-11-28', 1, 8, '2020-11-28 13:39:48', '2020-11-28 13:39:48');
/*!40000 ALTER TABLE `palabras` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.partidos
CREATE TABLE IF NOT EXISTS `partidos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla concejo.partidos: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `partidos` DISABLE KEYS */;
INSERT INTO `partidos` (`id`, `nombre`, `logo`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'LIBERAL', '1600536552partidoliberal.png', 1, '2020-09-01 19:00:58', '2020-10-12 15:06:45'),
	(7, 'CONSERVADOR', '1600540734partidoconservador.png', 1, '2020-09-19 13:38:54', '2020-10-12 15:06:55'),
	(8, 'CAMBIO RADICAL', '1601582269arton31807.png', 1, '2020-10-01 14:57:49', '2020-10-12 15:07:04'),
	(9, 'PARTIDO DE LA U', '1602533282partidou.png', 1, '2020-10-12 15:08:02', '2020-10-12 15:08:02'),
	(10, 'ALTERNATIVO INDIGENA SOCIAL', '1602533317indigena.png', 1, '2020-10-12 15:08:37', '2020-10-12 15:08:37'),
	(11, 'CENTRO DEMOCRATICO - MIRA', '1602533342mira.jpeg', 1, '2020-10-12 15:09:02', '2020-10-12 15:09:02'),
	(12, 'NINGUNO', '1602535076ninguno.jpg', 1, '2020-10-12 15:37:56', '2020-10-20 09:08:17');
/*!40000 ALTER TABLE `partidos` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla concejo.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.personas
CREATE TABLE IF NOT EXISTS `personas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo_id` bigint(20) unsigned NOT NULL,
  `partido_id` bigint(20) unsigned NOT NULL,
  `comision_id` bigint(20) unsigned NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personas_cargo_id_foreign` (`cargo_id`),
  KEY `personas_partido_id_foreign` (`partido_id`),
  KEY `FK_personas_comisiones` (`comision_id`),
  CONSTRAINT `FK_personas_comisiones` FOREIGN KEY (`comision_id`) REFERENCES `comisiones` (`id`),
  CONSTRAINT `personas_cargo_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`),
  CONSTRAINT `personas_partido_id_foreign` FOREIGN KEY (`partido_id`) REFERENCES `partidos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla concejo.personas: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` (`id`, `nombres`, `apellidos`, `fecha_nac`, `documento`, `genero`, `telefono`, `direccion`, `correo`, `cargo_id`, `partido_id`, `comision_id`, `estado`, `foto`, `created_at`, `updated_at`) VALUES
	(1, 'BRAYAN DE JESUS', 'TORRES SALCEDO', '1995-10-20', '1005569857', 'MASCULINO', '3212020815', 'cll 43', 'bjts95@gmail.com', 2, 12, 7, 1, '1603386162default.png', '2020-09-01 19:02:35', '2020-10-22 12:02:42'),
	(2, 'EDUARDO', 'ALMANZA', '2020-10-08', '12345678', 'MASCULINO', '0', 's', 'eduardopipe2015@gmail.com', 6, 12, 7, 1, '1603386189default.png', '2020-09-21 09:31:30', '2020-11-18 09:10:07'),
	(3, 'JOSÉ GUTERMBERG', 'MACEA GOMEZ', '2020-03-27', '92529521', 'MASCULINO', '3015016127', 'Carrera 51 No. 30-80 Edificio Montichiari  barrio Venecia Apto 402', 'josemacea327@gmail.com', 3, 1, 7, 1, '1603386198default.png', '2020-09-21 20:34:22', '2020-10-22 12:03:18'),
	(4, 'DANIEL FELIPE', 'MERLANO PORRAS', '2020-11-28', '92540811', 'MASCULINO', '3145570372', 'Cra. 40 N° 27 - 139   Apto. 301  Venecia', 'danielmerlano@hotmail.com', 3, 1, 1, 1, '1603384573DSC_0902 copia.png', '2020-09-28 13:36:48', '2020-10-22 11:36:13'),
	(5, 'OMAR', 'QUESSEP SIERRA', '2020-09-25', '92518468', 'MASCULINO', '3044615986', 'Calle 32 Carrera 9-36 Conjunto Residencial Las Delicias Apto 101', 'omarquessepsierra@outlook.com', 3, 1, 1, 1, '1603384611DSC_0905 copia.png', '2020-10-01 16:18:15', '2020-10-22 11:36:51'),
	(6, 'ANDY JOSE', 'RUIZ SERNA', '2020-11-20', '1017147951', 'MASCULINO', '3205216890', 'Carrera 25ª No. 11c-14 barrio La Palma', 'ajrz20@hotmail.com', 3, 1, 2, 1, '1603384443DSC_0898 copia.png', '2020-10-08 16:29:34', '2020-10-22 11:34:03'),
	(7, 'AMERICO DE LA CRUZ', 'DONADO REDONDO', '2020-03-07', '92523982', 'MASCULINO', '3106654668', 'Cra  33 # 18-46', 'americodonado@gmail.com', 3, 7, 2, 1, '1603384398DSC_0897 copia.png', '2020-10-12 10:55:18', '2021-01-12 21:15:57'),
	(8, 'JAVIER DE JESUS', 'ORTIZ VILLA', '2020-12-07', '92525811', 'MASCULINO', '3012791236', 'B. Venecia ED. Villa Padua Casa 7', 'javierortizvilla7@gmail.com', 3, 7, 3, 1, '1603385884DSC_0892 copia.png', '2020-10-12 15:19:47', '2020-10-22 11:58:04'),
	(9, 'DANIELA', 'VERGARA GUZMÁN', '2020-10-06', '1152202525', 'FEMENINO', '3013814534', 'Carrera 31ª No. 23d-08 Edificio Palladino Apto 402 barrio La Toscana', 'daniela_vergara123@hotmail.com', 4, 7, 3, 1, '1603384847DSC_0911 copia.png', '2020-10-12 15:20:51', '2021-01-12 21:16:25'),
	(10, 'MANUEL ANTONIO', 'BARRIOS PEREZ', '2020-01-12', '1102870890', 'MASCULINO', '3145205851', 'Calle 21 No. 12b-49 barrio Kennedy', 'ex.mbarrios@gmail.com', 3, 9, 1, 1, '1603384879DSC_0913 copia.png', '2020-10-12 15:22:32', '2020-10-22 11:41:19'),
	(11, 'ALVARO ALONSO', 'DIAZ BOHORQUEZ', '2020-01-13', '92517308', 'MASCULINO', '3207996635', 'Calle 32ª No. 9b-08', 'alvarodiazz@gmail.com', 3, 9, 7, 1, '1603384977DSC_0917 copia.png', '2020-10-12 15:23:04', '2020-10-22 11:42:57'),
	(12, 'RAMIRO ENRIQUE', 'GONZALEZ ZABALA', '2020-03-27', '92506726', 'MASCULINO', '3002378588', 'Carrera 15ª No. 6ª-16 barrio San Luis', 'gonzalez.ramiro0327@gmail.com', 3, 9, 7, 1, '1603384806DSC_0909 copia.png', '2020-10-12 15:23:29', '2020-10-22 11:40:06'),
	(13, 'JOSÉ DAVID', 'GONZALEZ VILLAMIZAR', '2020-10-12', '92496879', 'MASCULINO', '3215394690', 'Calle 25b No. 12b-51 Villa Suiza', 'josegonzalez12101959@gmail.com', 3, 9, 7, 1, '1603385487DSC_0896 copia.png', '2020-10-12 15:23:57', '2020-10-22 11:51:28'),
	(14, 'JESUS DAVID', 'CASTILLA CUELLO', '2020-07-13', '92545279', 'MASCULINO', '3017195661', 'Calle 14 No. 12-51 barrio Sevilla', 'jesuscastillacuello@hotmail.com', 3, 8, 2, 1, '1603384918DSC_0916 copia.png', '2020-10-12 15:24:24', '2020-10-22 11:41:58'),
	(15, 'DIEGO', 'MERCADO SANABRIA', '2020-10-28', '6817836', 'MASCULINO', '3158659011', 'Calle 32 # 27B-17B  B. Venecia y Of. Calle 38 Nº 10 - 123', 'diegoms50@hotmail.com', 3, 8, 2, 1, '1603384494DSC_0899 copia.png', '2020-10-12 15:24:56', '2020-10-22 11:34:54'),
	(16, 'LEONARDO FABIO', 'RODRIGUEZ OVIEDO', '2020-11-14', '92543261', 'MASCULINO', '3016339349', 'Calle 25c Carrera 52ª-59 Edificio Scala Apto 202 barrio Los Laureles', 'fabiorodriguezoviedo@hotmail.com', 3, 8, 2, 1, '1603384645DSC_0907 copia.png', '2020-10-12 15:25:30', '2020-10-22 11:37:25'),
	(17, 'JADER JOSE', 'ACOSTA AVILEZ', '2020-07-19', '92548525', 'MASCULINO', '3008026085', 'Calle 33 No. 17-28 barrio España', 'jjaa_jjaa@hotmail.com', 3, 10, 2, 1, '1603384529DSC_0900 copia.png', '2020-10-12 15:26:07', '2020-10-22 11:35:29'),
	(18, 'DERLY SOFIA', 'CHAMORRO SALCEDO', '2020-02-11', '1102808032', 'FEMENINO', '3012239712', 'Calle 24b No. 2 Cll – Satélite.', 'derlys_2468@hotmail.com', 3, 11, 2, 1, '1603384360DSC_0895 copia.png', '2020-10-12 15:26:44', '2020-10-22 11:32:40'),
	(19, 'NATALIA MARIA', 'GUTIERRES', '2015-11-15', '1102867261', 'FEMENINO', '0', 'SINCELEJO', 'administrador@gmail.com', 2, 12, 7, 1, '16062241631603386162default.png', '2020-11-24 08:22:43', '2020-11-24 08:22:43');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.plancha
CREATE TABLE IF NOT EXISTS `plancha` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `postulante_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` bigint(20) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `persona_id` (`postulante_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla concejo.plancha: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `plancha` DISABLE KEYS */;
INSERT INTO `plancha` (`id`, `fecha`, `nombre`, `postulante_id`, `created_at`, `updated_at`, `estado`) VALUES
	(13, '2020-11-24', 'PLANCHA 2', 6, '2020-11-18 08:55:23', '2020-11-18 08:55:23', 1),
	(15, '2020-11-26', 'PLANCHA 5', 10, '2020-11-26 15:22:51', '2020-11-26 15:22:51', 1);
/*!40000 ALTER TABLE `plancha` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.proponentes
CREATE TABLE IF NOT EXISTS `proponentes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `documento` varchar(255) NOT NULL,
  `cargo` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla concejo.proponentes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `proponentes` DISABLE KEYS */;
INSERT INTO `proponentes` (`id`, `nombres`, `apellidos`, `documento`, `cargo`, `correo`, `tipo`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'PEDRO', 'GARCIA', '0', 'ALCALDE', 'aasda@jj.com', 'Natural', '0', '2020-11-05 08:20:50', '2020-11-25 16:46:50'),
	(2, 'ALCALDE', 'MUNICIPAL', '0', 'ANDRÉS GÓMEZ MARTÍNEZ', 'despacho@sincelejo.gov.co', 'Juridica', '1', '2020-11-25 16:47:36', '2020-11-25 17:03:59');
/*!40000 ALTER TABLE `proponentes` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.proposiciones
CREATE TABLE IF NOT EXISTS `proposiciones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `bancada` mediumtext,
  `ruta` mediumtext,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `persona_id` bigint(20) unsigned NOT NULL,
  `descripcion` longtext,
  PRIMARY KEY (`id`),
  KEY `persona_id` (`persona_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla concejo.proposiciones: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `proposiciones` DISABLE KEYS */;
INSERT INTO `proposiciones` (`id`, `nombre`, `bancada`, `ruta`, `estado`, `created_at`, `updated_at`, `persona_id`, `descripcion`) VALUES
	(4, 'EDUARDO ALMANZA', 'NINGUNO', '1605799292PRUEBA.pdf', 1, '2020-11-19 10:21:21', '2020-11-19 10:21:32', 2, 'cambiar el nombre del proyecto'),
	(6, 'JAVIER DE JESUS ORTIZ VILLA', 'CONSERVADOR', NULL, 1, '2020-11-23 14:54:23', '2020-11-23 14:54:23', 8, NULL);
/*!40000 ALTER TABLE `proposiciones` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.proposicion_votaciones
CREATE TABLE IF NOT EXISTS `proposicion_votaciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `persona_id` bigint(20) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `tiempo` int(11) NOT NULL DEFAULT '0',
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipovotacion_id` bigint(20) unsigned NOT NULL,
  `proposicion_id` bigint(20) NOT NULL,
  `estado_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_proposicion_votaciones_personas` (`persona_id`),
  KEY `FK_proposicion_votaciones_estados` (`estado_id`),
  KEY `FK_proposicion_votaciones_proposiciones` (`proposicion_id`),
  KEY `FK_proposicion_votaciones_tipovotaciones` (`tipovotacion_id`),
  CONSTRAINT `FK_proposicion_votaciones_estados` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`),
  CONSTRAINT `FK_proposicion_votaciones_personas` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
  CONSTRAINT `FK_proposicion_votaciones_proposiciones` FOREIGN KEY (`proposicion_id`) REFERENCES `proposiciones` (`id`),
  CONSTRAINT `FK_proposicion_votaciones_tipovotaciones` FOREIGN KEY (`tipovotacion_id`) REFERENCES `tipovotaciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla concejo.proposicion_votaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proposicion_votaciones` DISABLE KEYS */;
INSERT INTO `proposicion_votaciones` (`id`, `persona_id`, `fecha`, `hora`, `tiempo`, `estado`, `created_at`, `updated_at`, `tipovotacion_id`, `proposicion_id`, `estado_id`) VALUES
	(9, 1, '2020-12-09', '12:17:00', 30, 1, '2020-12-09 12:18:10', '2020-12-09 12:18:10', 1, 4, 1);
/*!40000 ALTER TABLE `proposicion_votaciones` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.proyectos
CREATE TABLE IF NOT EXISTS `proyectos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` mediumtext COLLATE utf8mb4_unicode_ci,
  `anexos` mediumtext COLLATE utf8mb4_unicode_ci,
  `ruta` mediumtext COLLATE utf8mb4_unicode_ci,
  `persona_id` bigint(20) unsigned NOT NULL,
  `proponente_id` bigint(20) unsigned NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `estado_vista` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comision_id` bigint(20) unsigned NOT NULL,
  `ponente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `coponente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NO',
  `coordinador` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'NO',
  `ponencia_uno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ponencia_dos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proyectos_persona_id_foreign` (`persona_id`),
  KEY `FK_proyectos_proponentes` (`proponente_id`),
  KEY `FK_proyectos_comisiones` (`comision_id`),
  CONSTRAINT `FK_proyectos_comisiones` FOREIGN KEY (`comision_id`) REFERENCES `comisiones` (`id`),
  CONSTRAINT `FK_proyectos_proponentes` FOREIGN KEY (`proponente_id`) REFERENCES `proponentes` (`id`),
  CONSTRAINT `proyectos_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla concejo.proyectos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
INSERT INTO `proyectos` (`id`, `nombre`, `descripcion`, `anexos`, `ruta`, `persona_id`, `proponente_id`, `estado`, `estado_vista`, `created_at`, `updated_at`, `comision_id`, `ponente`, `coponente`, `coordinador`, `ponencia_uno`, `ponencia_dos`) VALUES
	(4, 'POR MEDIO DEL CUAL SE ESTABLECE EL PRESUPUESTO GENERAL DEL MUNICIPIO DE SINCELEJO PARA LA VIGENCIA COMPRENDIDA DEL 1° DE ENERO AL 31 DE DICIEMBRE DE 2021', NULL, NULL, '1606341756PROYECTO PRESUPUESTO 2021.pdf', 1, 2, 'APROBADO EN PRIMER DEBATE', 1, '2020-11-25 17:02:36', '2020-11-26 14:00:02', 3, 'LEONARDO RODRIGUEZ OVIEDO', 'JOSÉ MACEA GÓMEZ', 'JAVIER ORTÍZ VILLA', '1606342366primer debate presupuesto.pdf', '1606342418PONENCIA SEGUNDO DEBATE PRESUPUESTO 2021.pdf');
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.proyectos_secretos
CREATE TABLE IF NOT EXISTS `proyectos_secretos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `anexos` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta` mediumtext COLLATE utf8mb4_unicode_ci,
  `persona_id` bigint(20) unsigned NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `estado_vista` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `proyectos_persona_id_foreign` (`persona_id`) USING BTREE,
  CONSTRAINT `proyectos_secretos_ibfk_2` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla concejo.proyectos_secretos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyectos_secretos` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos_secretos` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.proyecto_votacion
CREATE TABLE IF NOT EXISTS `proyecto_votacion` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `proyecto_id` bigint(20) unsigned DEFAULT NULL,
  `persona_id` bigint(20) unsigned DEFAULT NULL,
  `estado_id` bigint(20) unsigned DEFAULT NULL,
  `tipovotacion_id` bigint(20) unsigned DEFAULT NULL,
  `observaciones` mediumtext,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `tiempo` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla concejo.proyecto_votacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyecto_votacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyecto_votacion` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.proyecto_votaciones
CREATE TABLE IF NOT EXISTS `proyecto_votaciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `proyecto_id` bigint(20) unsigned NOT NULL,
  `persona_id` bigint(20) unsigned NOT NULL,
  `estado_id` bigint(20) unsigned NOT NULL,
  `tipovotacion_id` bigint(20) unsigned NOT NULL,
  `observaciones` mediumtext COLLATE utf8mb4_unicode_ci,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `tiempo` int(11) NOT NULL DEFAULT '0',
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `proyectos_persona_id_foreign` (`proyecto_id`) USING BTREE,
  KEY `FK_proyecto_votaciones_personas` (`persona_id`),
  KEY `FK_proyecto_votaciones_estados` (`estado_id`),
  KEY `FK_proyecto_votaciones_tipovotaciones` (`tipovotacion_id`),
  CONSTRAINT `FK_proyecto_votaciones_estados` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_proyecto_votaciones_personas` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_proyecto_votaciones_proyectos` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_proyecto_votaciones_tipovotaciones` FOREIGN KEY (`tipovotacion_id`) REFERENCES `tipovotaciones` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla concejo.proyecto_votaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyecto_votaciones` DISABLE KEYS */;
INSERT INTO `proyecto_votaciones` (`id`, `proyecto_id`, `persona_id`, `estado_id`, `tipovotacion_id`, `observaciones`, `fecha`, `hora`, `tiempo`, `estado`, `created_at`, `updated_at`) VALUES
	(6, 4, 1, 1, 1, NULL, '2020-12-09', '12:15:00', 30, 1, '2020-12-09 12:17:34', '2020-12-09 12:17:34');
/*!40000 ALTER TABLE `proyecto_votaciones` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.proyecto_votaciones_secreta
CREATE TABLE IF NOT EXISTS `proyecto_votaciones_secreta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `proyecto_id` bigint(20) unsigned NOT NULL,
  `persona_id` bigint(20) unsigned NOT NULL,
  `estado_id` bigint(20) unsigned NOT NULL,
  `observaciones` mediumtext COLLATE utf8mb4_unicode_ci,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `tiempo` int(11) NOT NULL DEFAULT '0',
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_proyecto_votaciones_personas` (`persona_id`) USING BTREE,
  KEY `FK_proyecto_votaciones_estados` (`estado_id`) USING BTREE,
  KEY `proyectos_persona_id_foreign` (`proyecto_id`) USING BTREE,
  CONSTRAINT `FK_proyecto_votaciones_secreta_proyectos_secretos` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos_secretos` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `proyecto_votaciones_secreta_ibfk_1` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `proyecto_votaciones_secreta_ibfk_2` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla concejo.proyecto_votaciones_secreta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proyecto_votaciones_secreta` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyecto_votaciones_secreta` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.recursos
CREATE TABLE IF NOT EXISTS `recursos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `carpeta_recurso_id` bigint(20) unsigned NOT NULL,
  `nombre` mediumtext NOT NULL,
  `link` mediumtext,
  `ruta` mediumtext,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_recursos_carpetas_recursos` (`carpeta_recurso_id`),
  CONSTRAINT `FK_recursos_carpetas_recursos` FOREIGN KEY (`carpeta_recurso_id`) REFERENCES `carpetas_recursos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla concejo.recursos: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `recursos` DISABLE KEYS */;
INSERT INTO `recursos` (`id`, `carpeta_recurso_id`, `nombre`, `link`, `ruta`, `estado`, `created_at`, `updated_at`) VALUES
	(11, 1, 'CONSTITUCION POLITICA', NULL, '1605708952colombia91.pdf', 1, '2020-11-18 09:15:52', '2020-11-26 14:51:30'),
	(12, 3, 'ACUERDO N° 252 DE 2019 REGLAMENTO INTERNO', NULL, '1606343093ACUERDO N° 252 DE 2019 REGLAMENTO INTERNO.pdf', 1, '2020-11-25 17:24:53', '2020-11-25 17:24:53'),
	(13, 2, 'LEY 136 DE 1994 ORGANIZACION Y FUNCIONAMIENTO DE LOS MUNICIPIOS', NULL, '1606343563LEY 136 DE 1994.pdf', 1, '2020-11-25 17:25:20', '2020-11-25 17:32:43'),
	(14, 2, 'LEY 1551 DE 2012', NULL, '1606343154LEY 1551 DE 2012.pdf', 1, '2020-11-25 17:25:54', '2020-11-25 17:25:54'),
	(15, 2, 'LEY 5 DE 1992', NULL, '1606343181LEY 5 DE 1992.pdf', 1, '2020-11-25 17:26:21', '2020-11-25 17:26:21'),
	(16, 2, 'LEY 1955 DE 2019 PLAN  NACIONAL DE DESARROLLO', NULL, '1606343234LEY 1955 DE 2019.pdf', 1, '2020-11-25 17:26:42', '2020-11-25 17:27:14'),
	(17, 2, 'LEY 1982 DE 2019', NULL, '1606343268LEY 1981 DE 2019.pdf', 1, '2020-11-25 17:27:48', '2020-11-25 17:27:48');
/*!40000 ALTER TABLE `recursos` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.resultado_votaciones
CREATE TABLE IF NOT EXISTS `resultado_votaciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `proyecto_id` bigint(20) unsigned NOT NULL,
  `persona_id` bigint(20) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `rechazado` int(11) DEFAULT NULL,
  `aprobado` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `proyectos_persona_id_foreign` (`proyecto_id`) USING BTREE,
  KEY `FK_proyecto_votaciones_personas` (`persona_id`),
  CONSTRAINT `resultado_votaciones_ibfk_2` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `resultado_votaciones_ibfk_3` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla concejo.resultado_votaciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `resultado_votaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultado_votaciones` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.resultado_votaciones_secreta
CREATE TABLE IF NOT EXISTS `resultado_votaciones_secreta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `proyecto_id` bigint(20) unsigned DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `rechazado` int(11) DEFAULT NULL,
  `aprobado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_resultado_votaciones_secreta_proyectos_secretos` (`proyecto_id`),
  CONSTRAINT `FK_resultado_votaciones_secreta_proyectos_secretos` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos_secretos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla concejo.resultado_votaciones_secreta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `resultado_votaciones_secreta` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultado_votaciones_secreta` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.resultado_votaciones_unicas
CREATE TABLE IF NOT EXISTS `resultado_votaciones_unicas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `aspirante_id` bigint(20) unsigned NOT NULL,
  `tipoeleccion_id` bigint(20) NOT NULL,
  `votos` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__aspirantes` (`aspirante_id`),
  KEY `FK__elecciones` (`tipoeleccion_id`),
  CONSTRAINT `FK__aspirantes` FOREIGN KEY (`aspirante_id`) REFERENCES `aspirantes` (`id`),
  CONSTRAINT `FK__elecciones` FOREIGN KEY (`tipoeleccion_id`) REFERENCES `elecciones` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla concejo.resultado_votaciones_unicas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `resultado_votaciones_unicas` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultado_votaciones_unicas` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.tipoelecciones
CREATE TABLE IF NOT EXISTS `tipoelecciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipovotacion_id` bigint(20) unsigned NOT NULL,
  `fecha` date DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `estado` int(11) DEFAULT '1',
  `estado_vista` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tipoelecciones_tipovotaciones` (`tipovotacion_id`),
  CONSTRAINT `FK_tipoelecciones_tipovotaciones` FOREIGN KEY (`tipovotacion_id`) REFERENCES `tipovotaciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla concejo.tipoelecciones: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tipoelecciones` DISABLE KEYS */;
INSERT INTO `tipoelecciones` (`id`, `tipovotacion_id`, `fecha`, `nombre`, `estado`, `estado_vista`, `created_at`, `updated_at`) VALUES
	(7, 1, '2020-11-05', 'ELECCION DE PRESIDENTE', 1, 0, '2020-11-03 09:29:57', '2020-11-19 08:19:10'),
	(8, 2, '2020-11-03', 'ELECCION 1ER VICERESIDENTE', 1, 0, '2020-11-03 09:30:14', '2020-11-19 08:19:13'),
	(9, 1, '2020-11-05', 'ELECCION 2DO VICEPRESIDENTE', 1, 0, '2020-11-03 09:30:30', '2020-11-24 08:43:26'),
	(11, 1, '2021-10-23', 'ELECCION DE SECRETARIO GENERAL 2021', 1, 1, '2020-11-25 15:44:56', '2021-10-23 08:55:38');
/*!40000 ALTER TABLE `tipoelecciones` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.tipoeleccionessociales
CREATE TABLE IF NOT EXISTS `tipoeleccionessociales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `nombre` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `estado_vista` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `tipovotacion_id` bigint(20) unsigned NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_tipoeleccionessociales_tipovotaciones` (`tipovotacion_id`),
  CONSTRAINT `FK_tipoeleccionessociales_tipovotaciones` FOREIGN KEY (`tipovotacion_id`) REFERENCES `tipovotaciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla concejo.tipoeleccionessociales: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tipoeleccionessociales` DISABLE KEYS */;
INSERT INTO `tipoeleccionessociales` (`id`, `fecha`, `nombre`, `estado`, `estado_vista`, `created_at`, `tipovotacion_id`, `updated_at`) VALUES
	(2, '2020-12-09', 'ELECCION DE COMISIONES', 1, 1, '2020-11-23 11:21:31', 1, '2020-12-09 12:19:27');
/*!40000 ALTER TABLE `tipoeleccionessociales` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.tipovotaciones
CREATE TABLE IF NOT EXISTS `tipovotaciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla concejo.tipovotaciones: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipovotaciones` DISABLE KEYS */;
INSERT INTO `tipovotaciones` (`id`, `nombre`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'NOMINAL', 'VOTACION DE TIPO PUBLICA', 1, '2020-09-01 19:01:49', '2020-10-01 10:48:35'),
	(2, 'SECRETA', 'VOTACION DE TIPO SECRETA', 1, '2020-10-30 22:17:46', '2020-10-30 22:17:47');
/*!40000 ALTER TABLE `tipovotaciones` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persona_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `is_admin` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_users_personas` (`persona_id`),
  CONSTRAINT `FK_users_personas` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla concejo.usuarios: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `email`, `password`, `persona_id`, `is_admin`, `created_at`, `updated_at`, `estado`) VALUES
	(9, '1005569857', '$2y$10$aQ.CF5SwToJks9AksWL40uWeZNslcqWGAMb/4zFFDE8x4y8wNEGJW', 1, 1, '2020-10-20 11:05:13', '2020-09-22 16:08:46', 1),
	(20, '92529521', '$2y$10$P4FbkRo1oGtO5W5rWyKdYubLmdfvvnrv82ERuhbx5XD1pH5JJcIpe', 3, 0, '2020-11-05 11:44:42', '2020-11-05 11:44:42', 1),
	(21, '92540811', '$2y$10$LtgGJjGRlFfRQTH.TeO9VuS7tFHlnj748rAsF2YK4JeibLZpt0rM2', 4, 0, '2020-10-28 13:39:05', '2020-10-28 13:39:05', 1),
	(22, '92518468', '$2y$10$VHmbyOzHc.7Q6jxb4EYOm.bj49KED6RfmebbhHvxulH107P8JEvlW', 5, 0, '2020-10-28 13:39:22', '2020-10-28 13:39:22', 1),
	(23, '1017147951', '$2y$10$4eXXYLUbAOpO6IqMWUoG/.6pw8oohE6DnzawPguz5/cxLWtDWemTC', 6, 0, '2020-10-28 13:39:35', '2020-10-28 13:39:35', 1),
	(24, '92523982', '$2y$10$1sOa7vkyiuvYRQT3ZLsfluf9ZUFxXcFBDmEgAoLKuo49ueWmNk87e', 7, 0, '2020-11-24 08:31:14', '2020-11-24 08:31:14', 1),
	(25, '92525811', '$2y$10$SkX/i50tEEvp2m8.2xbRROPMG8EB/1Cw3ZmliLAsD4mExM984d5WG', 8, 0, '2020-10-28 13:40:05', '2020-10-28 13:40:05', 1),
	(26, '1152202525', '$2y$10$cZRvowf9aeinT2hVb.Z9nebRoYM08CJ2CHZUzOVufdqDr2.FuokEy', 9, 0, '2020-10-28 13:40:18', '2020-10-28 13:40:18', 1),
	(27, '1102870890', '$2y$10$exAkbhxcbCLCqOgrT6Kt6u3zKvzPHniJbrub3U2HZy2bYS9t7eTka', 10, 0, '2020-10-28 13:40:34', '2020-10-28 13:40:34', 1),
	(28, '92517308', '$2y$10$7V3sra4y5yRB/laqjfeRMOFEKA37NF100UP9Fqabe8EMDqlglYTEm', 11, 0, '2020-11-04 14:58:17', '2020-11-04 14:58:17', 1),
	(29, '92506726', '$2y$10$cWzmh.xf7tBVgdjompJvB.BvVZISAcLALD0nz.ZC14KeNnrR3E72S', 12, 0, '2020-10-28 13:41:04', '2020-10-28 13:41:04', 1),
	(30, '92496879', '$2y$10$s2BqEVMnQvzvVyzvGip.j.XQ.5InGLDEJy8g.61DdebBmqBHDaqpS', 13, 0, '2020-10-28 13:41:20', '2020-10-28 13:41:20', 1),
	(31, '92545279', '$2y$10$QQtlCmf11O/hRvDqdvj47.kH2qlwul.enYqRz0EQgh0TzhTN42Jsa', 14, 0, '2020-10-28 13:41:33', '2020-10-28 13:41:33', 1),
	(32, '6817836', '$2y$10$ZvzL.zjj/z4iBhDVderaGexpoixAlgGpTCbZ7.YdkDjUB6ITfcHoG', 15, 0, '2020-10-28 13:41:47', '2020-10-28 13:41:47', 1),
	(33, '92543261', '$2y$10$snTvZGrNvG.N6bDP5clqwuwReMUzq45UanrBaKQOUII/iHQis.do6', 16, 0, '2020-11-04 14:56:41', '2020-11-04 14:56:41', 1),
	(34, '92548525', '$2y$10$J5Wd3yadUYTDTztbQxX8ROoyjofa0cbdLJb7HFziKgEqdFQT.aigG', 17, 0, '2020-10-28 13:42:13', '2020-10-28 13:42:13', 1),
	(35, '1102808032', '$2y$10$SAONgKZszJONfrmxifELieARoSZzvJ/7teS.q3/KdO9Pwouy1Da4C', 18, 0, '2020-10-28 13:42:26', '2020-10-28 13:42:26', 1),
	(36, '12345678', '$2y$10$34OV4FGyw6UkAn.Kw.EIyO4jbGH7umeBQsh5XsbUgnamOwAtzXtOm', 2, 0, '2020-12-09 13:27:33', '2020-12-09 13:27:33', 1),
	(37, '1102867261', '$2y$10$JLob1nooakbU23Q6rBVm8uOZbMIvK40zELtbZ9SkUpJijqe6JLtMW', 19, 1, '2020-11-24 08:25:25', '2020-11-24 08:23:06', 1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.votaciones
CREATE TABLE IF NOT EXISTS `votaciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `proyecto_id` bigint(20) unsigned NOT NULL,
  `persona_id` bigint(20) unsigned NOT NULL,
  `observaciones` mediumtext COLLATE utf8mb4_unicode_ci,
  `respuesta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `ip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `proyectos_persona_id_foreign` (`proyecto_id`) USING BTREE,
  KEY `FK_proyecto_votaciones_personas` (`persona_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla concejo.votaciones: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `votaciones` DISABLE KEYS */;
INSERT INTO `votaciones` (`id`, `proyecto_id`, `persona_id`, `observaciones`, `respuesta`, `fecha`, `hora`, `estado`, `ip`, `created_at`, `updated_at`) VALUES
	(1, 3, 6, NULL, 0, '2020-11-24', '08:51:16', 1, '1', '2020-11-24 08:51:16', '2020-11-24 08:51:16'),
	(2, 3, 5, NULL, 0, '2020-11-24', '08:51:19', 1, '1', '2020-11-24 08:51:19', '2020-11-24 08:51:19'),
	(3, 3, 7, NULL, 0, '2020-11-24', '08:51:27', 1, '1', '2020-11-24 08:51:27', '2020-11-24 08:51:27'),
	(4, 3, 3, NULL, 1, '2020-11-24', '08:51:28', 1, '1', '2020-11-24 08:51:28', '2020-11-24 08:51:28'),
	(5, 3, 17, NULL, 0, '2020-11-24', '08:51:31', 1, '1', '2020-11-24 08:51:31', '2020-11-24 08:51:31'),
	(6, 3, 16, NULL, 0, '2020-11-24', '08:51:44', 1, '1', '2020-11-24 08:51:44', '2020-11-24 08:51:44'),
	(7, 3, 4, NULL, 0, '2020-11-24', '08:51:44', 1, '1', '2020-11-24 08:51:44', '2020-11-24 08:51:44'),
	(8, 3, 15, NULL, 0, '2020-11-24', '08:52:05', 1, '1', '2020-11-24 08:52:05', '2020-11-24 08:52:05'),
	(9, 3, 13, NULL, 1, '2020-11-24', '08:52:14', 1, '1', '2020-11-24 08:52:14', '2020-11-24 08:52:14'),
	(10, 3, 9, NULL, 1, '2020-11-24', '08:52:31', 1, '1', '2020-11-24 08:52:31', '2020-11-24 08:52:31');
/*!40000 ALTER TABLE `votaciones` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.votaciones_proposiciones
CREATE TABLE IF NOT EXISTS `votaciones_proposiciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `proposicion_id` bigint(20) NOT NULL DEFAULT '0',
  `persona_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `respuesta` bigint(20) NOT NULL DEFAULT '0',
  `observaciones` mediumtext,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT '00:00:00',
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_votacion_proposicion_proposiciones` (`proposicion_id`),
  KEY `FK_votacion_proposicion_personas` (`persona_id`),
  CONSTRAINT `FK_votacion_proposicion_personas` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
  CONSTRAINT `FK_votacion_proposicion_proposiciones` FOREIGN KEY (`proposicion_id`) REFERENCES `proposiciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla concejo.votaciones_proposiciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `votaciones_proposiciones` DISABLE KEYS */;
INSERT INTO `votaciones_proposiciones` (`id`, `proposicion_id`, `persona_id`, `respuesta`, `observaciones`, `fecha`, `hora`, `estado`, `created_at`, `updated_at`, `ip`) VALUES
	(1, 4, 2, 1, NULL, '2020-11-27', '11:27:53', 1, '2020-11-27 11:27:53', '2020-11-27 11:27:53', NULL);
/*!40000 ALTER TABLE `votaciones_proposiciones` ENABLE KEYS */;

-- Volcando estructura para tabla concejo.votaciones_secretas
CREATE TABLE IF NOT EXISTS `votaciones_secretas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `proyecto_id` bigint(20) unsigned NOT NULL,
  `persona_id` bigint(20) unsigned NOT NULL,
  `observaciones` mediumtext COLLATE utf8mb4_unicode_ci,
  `respuesta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `proyectos_persona_id_foreign` (`proyecto_id`) USING BTREE,
  KEY `FK_votaciones_secretas_personas` (`persona_id`),
  CONSTRAINT `FK_votaciones_secretas_personas` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla concejo.votaciones_secretas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `votaciones_secretas` DISABLE KEYS */;
/*!40000 ALTER TABLE `votaciones_secretas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
