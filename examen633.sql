-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla seguridad_db.autenticacion_2fa
CREATE TABLE IF NOT EXISTS `autenticacion_2fa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `codigo_2fa` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `expiracion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `autenticacion_2fa_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla seguridad_db.autenticacion_2fa: ~0 rows (aproximadamente)
REPLACE INTO `autenticacion_2fa` (`id`, `id_usuario`, `codigo_2fa`, `expiracion`) VALUES
	(1, 1, '3', '2024-12-06 21:13:00'),
	(2, NULL, NULL, '2024-12-07 01:40:17');

-- Volcando estructura para tabla seguridad_db.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla seguridad_db.usuarios: ~0 rows (aproximadamente)
REPLACE INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`, `fecha_registro`) VALUES
	(1, 'samuel', 'samuel@gmail.com', '$2y$10$ne1GboiNKO31YxpD7f611eBybJXdbLp55oEDQw4ShDu.EfGGRpe/O', '2024-12-06 21:11:43'),
	(2, 'roman', 'roman@gmail.com', '$2y$10$4tNq/RZC3GCOxc7TbMqaD.fG9t2vc8gvJ1uGK65AVoBL5HFMCZCbS', '2024-12-06 21:33:06'),
	(3, 'pepe', 'pepe@gmail.com', '$2y$10$5jFAKkknZtye66OAupWZEOptUHDQ.jCnx.XkPZo9QeIlQV8cwK8Ka', '2024-12-06 21:41:09');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
