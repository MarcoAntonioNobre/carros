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
  `nome` varchar(75) NOT NULL DEFAULT '',
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
  `nome` varchar(75) NOT NULL DEFAULT '',
  `diferenciais` varchar(1000) NOT NULL DEFAULT '',
  `preco` decimal(10,0) NOT NULL DEFAULT 0,
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcarro`,`idproprietario`),
  KEY `FK_carro_proprietario` (`idproprietario`),
  CONSTRAINT `FK_carro_proprietario` FOREIGN KEY (`idproprietario`) REFERENCES `proprietario` (`idproprietario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carro`
--

/*!40000 ALTER TABLE `carro` DISABLE KEYS */;
/*!40000 ALTER TABLE `carro` ENABLE KEYS */;


--
-- Definition of table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idcliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(75) NOT NULL DEFAULT '',
  `contato` varchar(15) DEFAULT NULL,
  `valorDinheiro` decimal(10,0) DEFAULT NULL,
  `valorCartao` decimal(10,0) DEFAULT NULL,
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
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
  `idcarro` int(10) unsigned NOT NULL DEFAULT 0,
  `idproprietario` int(10) unsigned NOT NULL DEFAULT 0,
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
  `nome` varchar(75) NOT NULL DEFAULT '',
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idintegrantesvale`,`idproprietario`),
  KEY `FK_integrantesVale_proprietario` (`idproprietario`),
  CONSTRAINT `FK_integrantesVale_proprietario` FOREIGN KEY (`idproprietario`) REFERENCES `proprietario` (`idproprietario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `integrantesvale`
--

/*!40000 ALTER TABLE `integrantesvale` DISABLE KEYS */;
/*!40000 ALTER TABLE `integrantesvale` ENABLE KEYS */;


--
-- Definition of table `lidervale`
--

DROP TABLE IF EXISTS `lidervale`;
CREATE TABLE `lidervale` (
  `idlidervale` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idproprietario` int(10) unsigned NOT NULL,
  `nome` varchar(75) NOT NULL,
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idlidervale`,`idproprietario`),
  KEY `FK_liderVale_proprietario` (`idproprietario`),
  CONSTRAINT `FK_liderVale_proprietario` FOREIGN KEY (`idproprietario`) REFERENCES `proprietario` (`idproprietario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lidervale`
--

/*!40000 ALTER TABLE `lidervale` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pagamento`
--

/*!40000 ALTER TABLE `pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagamento` ENABLE KEYS */;


--
-- Definition of table `proprietario`
--

DROP TABLE IF EXISTS `proprietario`;
CREATE TABLE `proprietario` (
  `idproprietario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(75) NOT NULL DEFAULT '',
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idproprietario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proprietario`
--

/*!40000 ALTER TABLE `proprietario` DISABLE KEYS */;
/*!40000 ALTER TABLE `proprietario` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
