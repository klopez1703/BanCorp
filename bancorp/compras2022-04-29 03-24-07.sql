Select COD_COMPRA, NOM_COMPRA, PRECIO, FECHA from bancorp.compras
USE bancorp;

CREATE TABLE `compras` (
  `COD_COMPRA` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOM_COMPRA` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `PRECIO` int(11) DEFAULT NULL,
  `FECHA` datetime NOT NULL,
  PRIMARY KEY (`COD_COMPRA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


