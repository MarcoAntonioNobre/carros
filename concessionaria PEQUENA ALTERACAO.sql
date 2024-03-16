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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm`
--

/*!40000 ALTER TABLE `adm` DISABLE KEYS */;
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
  `preco` decimal(10,0) NOT NULL DEFAULT 0,
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcarro`,`idproprietario`),
  KEY `FK_carro_proprietario` (`idproprietario`),
  CONSTRAINT `FK_carro_proprietario` FOREIGN KEY (`idproprietario`) REFERENCES `proprietario` (`idproprietario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carro`
--

/*!40000 ALTER TABLE `carro` DISABLE KEYS */;
INSERT INTO `carro` (`idcarro`,`idproprietario`,`nomeCarro`,`diferenciais`,`preco`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,1,'Red Senna','O carro de nossa equipe possui um cinto de cinco pontos que é ideal para carros da fórmula Sae (Society of Automotive Engineers), e foi um dos mais fiéis à proposta do professor.','0','2024-03-15 17:08:32','2024-03-15 17:08:58','A'),
 (2,2,'Marquinhos','Nosso carro possui como diferenciais uma haste de arame galvanizado, volante móvel, placa, banco, aerofólio, e faz uma referência ao Relâmpago McQueen.','0','2024-03-15 17:08:32','2024-03-15 17:08:58','A'),
 (3,3,'Scuderia','Nosso carro possui uma gaiola que diminui o peso e aumenta a velocidade dele. Ele é o maior, porém é construído com fibra de carbono, o que reduz o peso do veículo.','0','2024-03-15 17:08:32','2024-03-15 17:08:58','A'),
 (4,4,'Fittipaldi','As rodas do carro são feitas em isopor lixadas a mão, possui um aerofólio removível e um body kit, além de faróis e lanterna traseira.','0','2024-03-15 17:08:32','2024-03-15 17:08:58','A'),
 (5,5,'FBM','Criamos um carro que tem os seguintes diferenciais: Luz de led, aparência com os carros da Fórmula 1, e a originalidade de nossa empresa.','0','2024-03-15 17:08:32','2024-03-15 17:09:05','A');
/*!40000 ALTER TABLE `carro` ENABLE KEYS */;


--
-- Definition of table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idcliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeCliente` varchar(75) NOT NULL DEFAULT '',
  `contato` varchar(15) DEFAULT NULL,
  `valorDinheiro` decimal(10,0) DEFAULT NULL,
  `valorCartao` decimal(10,0) DEFAULT NULL,
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`idcliente`,`nomeCliente`,`contato`,`valorDinheiro`,`valorCartao`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,'Marco','','100000','100000','2024-03-15 17:10:30','2024-03-15 17:51:26','A'),
 (2,'Arthur','','100000','100000','2024-03-15 17:10:30','2024-03-15 17:51:26','A'),
 (3,'Franciele','','100000','100000','2024-03-15 17:10:30','2024-03-15 17:51:26','A'),
 (4,'Isadora','','100000','100000','2024-03-15 17:10:30','2024-03-15 17:51:26','A'),
 (5,'Clarisse','','100000','100000','2024-03-15 17:10:30','2024-03-15 17:51:26','A'),
 (6,'Rebeka','','100000','100000','2024-03-15 17:10:30','2024-03-15 17:51:27','A');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Definition of table `compras`
--

DROP TABLE IF EXISTS `compras`;
CREATE TABLE `compras` (
  `idcompras` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcarro` int(10) unsigned NOT NULL DEFAULT 0,
  `idcliente` int(10) unsigned NOT NULL DEFAULT 0,
  `idpagamento` int(10) unsigned NOT NULL DEFAULT 0,
  `idproprietario` int(10) unsigned NOT NULL DEFAULT 0,
  `valor` decimal(10,0) NOT NULL DEFAULT 0,
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcompras`,`idcarro`,`idcliente`,`idpagamento`,`idproprietario`),
  KEY `FK_compras_carro` (`idcarro`,`idproprietario`),
  KEY `FK_compras_cliente` (`idcliente`),
  KEY `FK_compras_pagamento` (`idpagamento`),
  KEY `FK_compras_proprietario` (`idproprietario`),
  CONSTRAINT `FK_compras_carro` FOREIGN KEY (`idcarro`, `idproprietario`) REFERENCES `carro` (`idcarro`, `idproprietario`),
  CONSTRAINT `FK_compras_cliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`),
  CONSTRAINT `FK_compras_pagamento` FOREIGN KEY (`idpagamento`) REFERENCES `pagamento` (`idpagamento`),
  CONSTRAINT `FK_compras_proprietario` FOREIGN KEY (`idproprietario`) REFERENCES `proprietario` (`idproprietario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compras`
--

/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

/*!40000 ALTER TABLE `foto` DISABLE KEYS */;
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