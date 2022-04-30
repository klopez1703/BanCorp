Select COD_TAR_CREDITO, TIPO_TARJETA, NOM_PERSONA, NUM_TARJETA, FECHA_CADU, CVV, CUOTAS, INTERES, MONTO_TOTAL, MES_PRIMER_CUOTA, DETALLE, MES_ULTIMA_CUOTA, COD_CTA from bancorp.tar_credito
USE bancorp;

CREATE TABLE `tar_credito` (
  `COD_TAR_CREDITO` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'CODIGO DE LA TARJETA DE CREDITO',
  `TIPO_TARJETA` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'TIPO DE LA TARJETA DE CREDITO',
  `NOM_PERSONA` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NUM_TARJETA` bigint(250) NOT NULL COMMENT 'NUMERO DE LA TARJETA',
  `FECHA_CADU` date NOT NULL COMMENT 'FECHA DE CADUCIDAD DE LA TARJETA',
  `CVV` int(200) NOT NULL COMMENT 'CODIGO CVV DE LA TARJETA',
  `CUOTAS` int(200) NOT NULL COMMENT 'CUOTAS DE LA TARJETA',
  `INTERES` int(200) NOT NULL COMMENT 'INTERES DE LA TARJETA',
  `MONTO_TOTAL` int(250) NOT NULL COMMENT 'MONTO TOTAL DE LA TARJETA DE CREDITO',
  `MES_PRIMER_CUOTA` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'PRIMER CUOTA DE LA TARJETA DE CREDITO',
  `DETALLE` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'DETALLE DE LAS COMPRAS DE LA TARJETA DE CREDITO',
  `MES_ULTIMA_CUOTA` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ULTIMA CUOTA DE LA TARJETA DE CREDITO',
  `COD_CTA` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`COD_TAR_CREDITO`),
  KEY `FK_TAR_CREDITO_CUENTAS` (`COD_CTA`),
  CONSTRAINT `FK_TAR_CREDITO_CUENTAS` FOREIGN KEY (`COD_CTA`) REFERENCES `cuentas` (`COD_CTA`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO bancorp.tar_credito(COD_TAR_CREDITO,TIPO_TARJETA,NOM_PERSONA,NUM_TARJETA,FECHA_CADU,CVV,CUOTAS,INTERES,MONTO_TOTAL,MES_PRIMER_CUOTA,DETALLE,MES_ULTIMA_CUOTA,COD_CTA) VALUES (2,'Debito','Michael Sosa',200015554848,'2026-03-18 00:00:00',456,5,0,800000,'8000','b','8000',null);
INSERT INTO bancorp.tar_credito(COD_TAR_CREDITO,TIPO_TARJETA,NOM_PERSONA,NUM_TARJETA,FECHA_CADU,CVV,CUOTAS,INTERES,MONTO_TOTAL,MES_PRIMER_CUOTA,DETALLE,MES_ULTIMA_CUOTA,COD_CTA) VALUES (4,'VISA','Michael',1007199809528,'1998-04-25 00:00:00',345,12,2,4,'1566','CU','34',null);
