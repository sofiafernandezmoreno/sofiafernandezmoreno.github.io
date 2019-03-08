DROP TABLE IF EXISTS `contador`;
  CREATE TABLE `contador` (
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `ip` varchar(20) DEFAULT NULL,
    `host` varchar(50) DEFAULT NULL,
    `navegador` varchar(250) DEFAULT NULL,
    `ciudad` varchar(50) DEFAULT NULL,
    `pais` varchar(20) DEFAULT NULL,
    `cp` varchar(6) DEFAULT NULL,
    `latitud` varchar(15) DEFAULT NULL,
    `longitud` varchar(15) DEFAULT NULL,
    `time` varchar(9) DEFAULT NULL,
    `fecha` datetime NOT NULL,
    `usuario` int(11) NOT NULL,
    `web` varchar(100) DEFAULT NULL,
    `pagina` varchar(100) DEFAULT NULL,
    `type` int(2) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=MyISAM DEFAULT CHARSET=utf8;