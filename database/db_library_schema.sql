
CREATE DATABASE IF NOT EXISTS `db_library`;
USE `db_library`;

DROP TABLE IF EXISTS `libro`;
DROP TABLE IF EXISTS `autor`;
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `autor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `img_autor` text,
  `nacionalidad` varchar(50) NOT NULL DEFAULT '',
  `fecha_nac` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0;

CREATE TABLE IF NOT EXISTS `libro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text,
  `genero` text NOT NULL,
  `img_tapa` text,
  `id_autor` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_autor` (`id_autor`),
  CONSTRAINT `id_autor` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=0;

CREATE TABLE `usuarios` (
	`usuario` VARCHAR(50) ,
	`contraseña` VARCHAR(255) NOT NULL DEFAULT '' ,
  PRIMARY KEY (`usuario`)
)
ENGINE=InnoDB
;

INSERT INTO `autor` (`nombre`, `img_autor`, `nacionalidad`, `fecha_nac`) VALUES
	('Sin Autor', NULL, 'Ninguna', '1901-01-01');
UPDATE `autor` SET id=0 WHERE id=1;

INSERT INTO `usuarios` (`usuario`, `contraseña`) VALUES
	('db_login','$2y$10$i/BIL2g0B7zwXLb3GLptIO9EkOcMnAptvACaOrLXDiPhzP0oRMXA2')