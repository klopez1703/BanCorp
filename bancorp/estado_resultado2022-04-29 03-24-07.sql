Select COD_ESTADO_RESULTADO, FECHA_RESULTADO, SALDO, COD_INGRESO, COD_EGRESO, COD_COMPRA from bancorp.estado_resultado
USE bancorp;

CREATE TABLE `estado_resultado` (
  `COD_ESTADO_RESULTADO` bigint(20) NOT NULL AUTO_INCREMENT,
  `FECHA_RESULTADO` datetime NOT NULL,
  `SALDO` int(11) NOT NULL,
  `COD_INGRESO` bigint(20) DEFAULT NULL,
  `COD_EGRESO` bigint(20) DEFAULT NULL,
  `COD_COMPRA` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`COD_ESTADO_RESULTADO`),
  KEY `Â´COD_INGRESOÂ´` (`COD_INGRESO`),
  KEY `Â´COD_EGRESOÂ´` (`COD_EGRESO`),
  KEY `Â´COD_COMPRASÂ´` (`COD_COMPRA`),
  CONSTRAINT `Â´COD_COMPRASÂ´` FOREIGN KEY (`COD_COMPRA`) REFERENCES `compras` (`COD_COMPRA`) ON DELETE CASCADE,
  CONSTRAINT `Â´COD_EGRESOÂ´` FOREIGN KEY (`COD_EGRESO`) REFERENCES `egresos` (`COD_EGRESO`) ON DELETE CASCADE,
  CONSTRAINT `Â´COD_INGRESOÂ´` FOREIGN KEY (`COD_INGRESO`) REFERENCES `ingresos` (`COD_INGRESO`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

