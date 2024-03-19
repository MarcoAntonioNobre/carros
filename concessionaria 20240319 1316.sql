-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema concessionaria
--

CREATE DATABASE IF NOT EXISTS concessionaria;
USE concessionaria;

--
-- Definition of table `adm`
--

DROP TABLE IF EXISTS `adm`;
CREATE TABLE `adm` (
  `idadm` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeAdm` varchar(75) NOT NULL DEFAULT '',
  `cpf` varchar(15) NOT NULL DEFAULT '',
  `senha` varchar(245) NOT NULL DEFAULT '',
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idadm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm`
--

/*!40000 ALTER TABLE `adm` DISABLE KEYS */;
INSERT INTO `adm` (`idadm`,`nomeAdm`,`cpf`,`senha`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (2,'MARCO A','123.456.789-77','$2y$12$cvAN1tGaJpV5B2izrQUmRezbLOh6om1Q2jIT9mTUxvzZGVmUgEhP2','2024-03-17 10:30:53','2024-03-17 10:31:14','A');
/*!40000 ALTER TABLE `adm` ENABLE KEYS */;


--
-- Definition of table `carro`
--

DROP TABLE IF EXISTS `carro`;
CREATE TABLE `carro` (
  `idcarro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idproprietario` int(10) unsigned NOT NULL DEFAULT 0,
  `nomeCarro` varchar(75) NOT NULL DEFAULT '',
  `diferenciais` varchar(1000) NOT NULL DEFAULT '',
  `fotoPerfil` varchar(75) DEFAULT NULL,
  `preco` varchar(30) NOT NULL DEFAULT '0',
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcarro`,`idproprietario`),
  KEY `FK_carro_proprietario` (`idproprietario`),
  CONSTRAINT `FK_carro_proprietario` FOREIGN KEY (`idproprietario`) REFERENCES `proprietario` (`idproprietario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carro`
--

/*!40000 ALTER TABLE `carro` DISABLE KEYS */;
INSERT INTO `carro` (`idcarro`,`idproprietario`,`nomeCarro`,`diferenciais`,`fotoPerfil`,`preco`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,1,'RED SENNA','O CARRO DE NOSSA EQUIPE POSSUI UM CINTO DE CINCO PONTOS QUE É IDEAL PARA CARROS DA FÓRMULA SAE (SOCIETY OF AUTOMOTIVE ENGINEERS), E FOI UM DOS MAIS FIÉIS À PROPOSTA DO PROFESSOR.','65f823376be9d_IMG-20240314-WA0056.jpg','150.00','2024-03-15 17:08:32','2024-03-19 13:14:28','A'),
 (2,2,'MARQUINHOS','NOSSO CARRO POSSUI COMO DIFERENCIAIS UMA HASTE DE ARAME GALVANIZADO, VOLANTE MÓVEL, PLACA, BANCO, AEROFÓLIO, E FAZ UMA REFERÊNCIA AO RELÂMPAGO MCQUEEN.','65f8231a6ae29_IMG-20240314-WA0040.jpg','150.00','2024-03-15 17:08:32','2024-03-19 13:14:28','A'),
 (3,3,'SCUDERIA','NOSSO CARRO POSSUI UMA GAIOLA QUE DIMINUI O PESO E AUMENTA A VELOCIDADE DELE. ELE É O MAIOR, PORÉM É CONSTRUÍDO COM FIBRA DE CARBONO, O QUE REDUZ O PESO DO VEÍCULO.','65f823533e5da_IMG-20240314-WA0023.jpg','150.00','2024-03-15 17:08:32','2024-03-19 13:14:28','A'),
 (4,4,'FITTIPALDI','AS RODAS DO CARRO SÃO FEITAS EM ISOPOR LIXADAS A MÃO, POSSUI UM AEROFÓLIO REMOVÍVEL E UM BODY KIT, ALÉM DE FARÓIS E LANTERNA TRASEIRA.','65f826678eb78_IMG-20240314-WA0013.jpg','150.00','2024-03-15 17:08:32','2024-03-19 13:14:28','A'),
 (5,5,'FBM','CRIAMOS UM CARRO QUE TEM OS SEGUINTES DIFERENCIAIS: LUZ DE LED, APARÊNCIA COM OS CARROS DA FÓRMULA 1, E A ORIGINALIDADE DE NOSSA EMPRESA.','65f81ffd82b70_IMG-20240314-WA0019.jpg','150.03','2024-03-15 17:08:32','2024-03-19 13:14:28','A');
/*!40000 ALTER TABLE `carro` ENABLE KEYS */;


--
-- Definition of table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idcliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeCliente` varchar(75) NOT NULL DEFAULT '',
  `contato` varchar(15) DEFAULT NULL,
  `numeroCartao` varchar(30) DEFAULT NULL,
  `valorCartao` varchar(30) DEFAULT NULL,
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`idcliente`,`nomeCliente`,`contato`,`numeroCartao`,`valorCartao`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,'Marco',NULL,'111111','100000','2024-03-15 17:10:30','2024-03-19 13:12:38','A'),
 (2,'Arthur',NULL,'222222','100000','2024-03-15 17:10:30','2024-03-19 13:12:38','A'),
 (3,'Franciele',NULL,'333333','100000','2024-03-15 17:10:30','2024-03-19 13:12:38','A'),
 (4,'Isadora',NULL,'444444','100000','2024-03-15 17:10:30','2024-03-19 13:12:38','A'),
 (5,'Clarisse',NULL,'555555','100000','2024-03-15 17:10:30','2024-03-19 13:12:38','A'),
 (6,'Rebeka',NULL,'666666','100000','2024-03-15 17:10:30','2024-03-19 13:12:38','A');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Definition of table `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras` (
  `idcompras` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcarro` int(10) unsigned NOT NULL DEFAULT 0,
  `valorUnidade` decimal(10,0) NOT NULL DEFAULT 0,
  `valorPago` decimal(10,0) NOT NULL DEFAULT 0,
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcompras`,`idcarro`) USING BTREE,
  KEY `FK_compras_carro` (`idcarro`) USING BTREE,
  CONSTRAINT `FK_compras_carro` FOREIGN KEY (`idcarro`) REFERENCES `carro` (`idcarro`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compras`
--

/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` (`idcompras`,`idcarro`,`valorUnidade`,`valorPago`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (2,3,'150','300',NULL,'2024-03-18 08:46:04','A'),
 (3,3,'150','300',NULL,'2024-03-18 08:55:26','A'),
 (4,2,'150','600',NULL,'2024-03-18 08:55:26','A'),
 (5,1,'150','1000',NULL,'2024-03-18 08:55:27','A'),
 (6,4,'150','450',NULL,'2024-03-18 09:53:37','A'),
 (7,5,'150','750',NULL,'2024-03-18 09:53:39','A'),
 (8,1,'1','1','2024-03-18 16:45:27','2024-03-18 16:45:27','A'),
 (9,4,'150','450','2024-03-18 16:49:45','2024-03-18 16:49:46','A');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;


--
-- Definition of table `foto`
--

DROP TABLE IF EXISTS `foto`;
CREATE TABLE `foto` (
  `idfoto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcarro` int(10) unsigned NOT NULL,
  `idproprietario` int(10) unsigned NOT NULL,
  `foto` varchar(75) NOT NULL DEFAULT '',
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idfoto`,`idcarro`,`idproprietario`),
  KEY `FK_foto_carro` (`idcarro`),
  KEY `FK_foto_proprietario` (`idproprietario`),
  CONSTRAINT `FK_foto_carro` FOREIGN KEY (`idcarro`) REFERENCES `carro` (`idcarro`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_foto_proprietario` FOREIGN KEY (`idproprietario`) REFERENCES `proprietario` (`idproprietario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

/*!40000 ALTER TABLE `foto` DISABLE KEYS */;
INSERT INTO `foto` (`idfoto`,`idcarro`,`idproprietario`,`foto`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (51,4,4,'65f83b6969c51_IMG-20240314-WA0013.jpg','2024-03-18 10:02:11','2024-03-18 10:02:33','A'),
 (52,4,4,'65f83b7510d6a_IMG-20240314-WA0014.jpg','2024-03-18 10:02:37','2024-03-18 10:02:45','A'),
 (53,4,4,'65f83b860fa5a_IMG-20240314-WA0033.jpg','2024-03-18 10:02:52','2024-03-18 10:03:02','A'),
 (54,4,4,'65f83b960714a_IMG-20240314-WA0039.jpg','2024-03-18 10:03:06','2024-03-18 10:03:18','A'),
 (55,1,1,'65f83ba4ee7e6_IMG-20240314-WA0026.jpg','2024-03-18 10:03:23','2024-03-18 10:03:32','A'),
 (56,1,1,'65f83bb5d81b8_IMG-20240314-WA0049.jpg','2024-03-18 10:03:40','2024-03-18 10:03:49','A'),
 (57,1,1,'65f83bc475898_IMG-20240314-WA0056.jpg','2024-03-18 10:03:54','2024-03-18 10:04:04','A'),
 (58,1,1,'65f83bd6087a4_IMG-20240314-WA0038.jpg','2024-03-18 10:04:08','2024-03-18 10:04:22','A'),
 (59,2,2,'65f83bf28fdc3_IMG-20240314-WA0016.jpg','2024-03-18 10:04:33','2024-03-18 10:04:50','A'),
 (60,2,2,'65f83c00db706_IMG-20240314-WA0017.jpg','2024-03-18 10:04:56','2024-03-18 10:05:04','A'),
 (61,2,2,'65f83c0da01e7_IMG-20240314-WA0040.jpg','2024-03-18 10:05:08','2024-03-18 10:05:17','A'),
 (62,2,2,'65f83c2308640_IMG-20240314-WA0055.jpg','2024-03-18 10:05:25','2024-03-18 10:05:39','A'),
 (63,3,3,'65f83c3fedaf9_IMG-20240314-WA0015.jpg','2024-03-18 10:05:53','2024-03-18 10:06:07','A'),
 (64,3,3,'65f83c4f01ff9_IMG-20240314-WA0020.jpg','2024-03-18 10:06:13','2024-03-18 10:06:23','A'),
 (65,3,3,'65f83c61daf98_IMG-20240314-WA0021.jpg','2024-03-18 10:06:30','2024-03-18 10:06:41','A'),
 (66,3,3,'65f83c71efe6d_IMG-20240314-WA0023.jpg','2024-03-18 10:06:50','2024-03-18 10:06:57','A'),
 (67,5,5,'65f83c893ab55_IMG-20240314-WA0019.jpg','2024-03-18 10:07:03','2024-03-18 10:07:21','A'),
 (68,5,5,'65f83c976e654_IMG-20240314-WA0025.jpg','2024-03-18 10:07:27','2024-03-18 10:07:35','A'),
 (69,5,5,'65f83ca3bff79_IMG-20240314-WA0030.jpg','2024-03-18 10:07:39','2024-03-18 10:07:47','A'),
 (70,5,5,'65f83cb2d3668_IMG-20240314-WA0035.jpg','2024-03-18 10:07:53','2024-03-18 10:08:02','A'),
 (71,5,5,'65f83cc28d917_IMG-20240314-WA0041.jpg','2024-03-18 10:08:06','2024-03-18 10:08:18','A');
/*!40000 ALTER TABLE `foto` ENABLE KEYS */;


--
-- Definition of table `integrantesvale`
--

DROP TABLE IF EXISTS `integrantesvale`;
CREATE TABLE `integrantesvale` (
  `idintegrantesvale` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idproprietario` int(10) unsigned NOT NULL DEFAULT 0,
  `nomeIntegrantes` varchar(75) NOT NULL DEFAULT '',
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idintegrantesvale`,`idproprietario`),
  KEY `FK_integrantesVale_proprietario` (`idproprietario`),
  CONSTRAINT `FK_integrantesVale_proprietario` FOREIGN KEY (`idproprietario`) REFERENCES `proprietario` (`idproprietario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `integrantesvale`
--

/*!40000 ALTER TABLE `integrantesvale` DISABLE KEYS */;
INSERT INTO `integrantesvale` (`idintegrantesvale`,`idproprietario`,`nomeIntegrantes`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,1,'Laila Vitória','2024-03-15 17:17:10','2024-03-15 17:17:39','A'),
 (2,1,'Giovana','2024-03-15 17:17:10','2024-03-15 17:17:39','A'),
 (3,1,'Quésia','2024-03-15 17:17:10','2024-03-15 17:17:39','A'),
 (4,2,'Letícia Veloso','2024-03-15 17:17:10','2024-03-15 17:17:39','A'),
 (5,2,'Wagleis Barbosa','2024-03-15 17:17:10','2024-03-15 17:17:39','A'),
 (6,2,'Danielly Oliveira','2024-03-15 17:17:10','2024-03-15 17:17:39','A'),
 (7,2,'Laissa Luciano','2024-03-15 17:17:10','2024-03-15 17:17:39','A'),
 (8,4,'Yuri','2024-03-15 17:17:10','2024-03-15 17:17:39','A'),
 (9,4,'Anna Luisa','2024-03-15 17:17:10','2024-03-15 17:17:39','A'),
 (10,4,'Thiago','2024-03-15 17:17:10','2024-03-15 17:17:39','A'),
 (11,5,'Fenix','2024-03-15 17:17:10','2024-03-15 17:17:39','A'),
 (12,5,'Elion','2024-03-15 17:17:10','2024-03-15 17:17:39','A'),
 (13,5,'Kauan','2024-03-15 17:17:10','2024-03-15 17:17:41','A');
/*!40000 ALTER TABLE `integrantesvale` ENABLE KEYS */;


--
-- Definition of table `lidervale`
--

DROP TABLE IF EXISTS `lidervale`;
CREATE TABLE `lidervale` (
  `idlidervale` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idproprietario` int(10) unsigned NOT NULL,
  `nomeLider` varchar(75) NOT NULL DEFAULT '',
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idlidervale`,`idproprietario`),
  KEY `FK_liderVale_proprietario` (`idproprietario`),
  CONSTRAINT `FK_liderVale_proprietario` FOREIGN KEY (`idproprietario`) REFERENCES `proprietario` (`idproprietario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lidervale`
--

/*!40000 ALTER TABLE `lidervale` DISABLE KEYS */;
INSERT INTO `lidervale` (`idlidervale`,`idproprietario`,`nomeLider`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,1,'Talita','2024-03-15 17:19:28','2024-03-15 17:19:44','A'),
 (2,2,'Pedro Henrique ','2024-03-15 17:19:28','2024-03-15 17:19:44','A'),
 (3,3,'Lucas Alves','2024-03-15 17:19:28','2024-03-15 17:19:44','A'),
 (4,5,'Guilherme Duarte','2024-03-15 17:19:28','2024-03-15 17:19:44','A'),
 (5,5,'Victor Cauã','2024-03-15 17:19:28','2024-03-15 17:19:46','A');
/*!40000 ALTER TABLE `lidervale` ENABLE KEYS */;


--
-- Definition of table `pagamento`
--

DROP TABLE IF EXISTS `pagamento`;
CREATE TABLE `pagamento` (
  `idpagamento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `formaPagamento` varchar(20) NOT NULL DEFAULT '',
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idpagamento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pagamento`
--

/*!40000 ALTER TABLE `pagamento` DISABLE KEYS */;
INSERT INTO `pagamento` (`idpagamento`,`formaPagamento`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,'Dinheiro','2024-03-15 17:20:27','2024-03-15 17:20:42','A'),
 (2,'Cartão','2024-03-15 17:20:27','2024-03-15 17:20:42','A');
/*!40000 ALTER TABLE `pagamento` ENABLE KEYS */;


--
-- Definition of table `proprietario`
--

DROP TABLE IF EXISTS `proprietario`;
CREATE TABLE `proprietario` (
  `idproprietario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeProprietario` varchar(75) NOT NULL DEFAULT '',
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idproprietario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proprietario`
--

/*!40000 ALTER TABLE `proprietario` DISABLE KEYS */;
INSERT INTO `proprietario` (`idproprietario`,`nomeProprietario`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,'Red Senna','2024-03-15 16:45:32','2024-03-15 16:45:51','A'),
 (2,'Marquinhos','2024-03-15 16:45:32','2024-03-15 16:45:51','A'),
 (3,'Scuderia','2024-03-15 16:45:32','2024-03-15 16:45:51','A'),
 (4,'Fittipaldi','2024-03-15 16:45:32','2024-03-15 16:45:51','A'),
 (5,'FBM(Fábrica Brasileira de Motores)','2024-03-15 16:45:32','2024-03-15 16:45:53','A');
/*!40000 ALTER TABLE `proprietario` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
