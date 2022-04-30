Select COD_PAGPRESTAMO, COD_PAGO, COD_PRESTAMO from bancorp.rel_pagprestamo
USE bancorp;

CREATE TABLE `rel_pagprestamo` (
  `COD_PAGPRESTAMO` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'CODIGO PAGO DE PRESTAMO',
  `COD_PAGO` bigint(20) DEFAULT NULL COMMENT 'CODIGO DE PAGO',
  `COD_PRESTAMO` bigint(20) DEFAULT NULL COMMENT 'CODIGO DE PRESTAMO',
  PRIMARY KEY (`COD_PAGPRESTAMO`),
  KEY `Ã‚Â´FK_PRESPAGOÃ‚Â´` (`COD_PRESTAMO`),
  KEY `Ã‚Â´FK_PAGOPRESTAMOÃ‚Â´` (`COD_PAGO`),
  CONSTRAINT `Ã‚Â´FK_PAGOPRESTAMOÃ‚Â´` FOREIGN KEY (`COD_PAGO`) REFERENCES `pago` (`COD_PAGO`) ON DELETE CASCADE,
  CONSTRAINT `Ã‚Â´FK_PRESPAGOÃ‚Â´` FOREIGN KEY (`COD_PRESTAMO`) REFERENCES `prestamo` (`COD_PRESTAMO`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


