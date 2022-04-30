Select COD_INGRESO, NOM_INGRESO, VALOR_INGRESO, FECHA_INGRESO from bancorp.ingresos
USE bancorp;

CREATE TABLE `ingresos` (
  `COD_INGRESO` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOM_INGRESO` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `VALOR_INGRESO` int(11) NOT NULL,
  `FECHA_INGRESO` datetime DEFAULT NULL,
  PRIMARY KEY (`COD_INGRESO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

