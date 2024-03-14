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
-- Create schema carro
--

CREATE DATABASE IF NOT EXISTS carro;
USE carro;

--
-- Definition of table `adm`
--

DROP TABLE IF EXISTS `adm`;
CREATE TABLE `adm` (
  `idadm` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cpf` varchar(17) NOT NULL,
  `senha` varchar(225) NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idadm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm`
--

/*!40000 ALTER TABLE `adm` DISABLE KEYS */;
INSERT INTO `adm` (`idadm`,`cpf`,`senha`,`ativo`,`cadastro`,`alteracao`) VALUES 
 (1,'123456789','$2y$12$F9ZyjQDhlDphE/F94tOjXeHJh/hDbqrYP3yXBHVvrmBXd0RimO3mm','A','2024-03-14 12:32:32','2024-03-14 12:32:32'),
 (2,'1234567891','123456789','A','2024-03-14 12:32:32','2024-03-14 12:32:32');
/*!40000 ALTER TABLE `adm` ENABLE KEYS */;


--
-- Definition of table `carro`
--

DROP TABLE IF EXISTS `carro`;
CREATE TABLE `carro` (
  `idcarro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idproprietario` int(10) unsigned NOT NULL,
  `foto` blob NOT NULL,
  `carro` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idcarro`,`idproprietario`) USING BTREE,
  KEY `FK_carro_proprietario` (`idproprietario`),
  CONSTRAINT `FK_carro_proprietario` FOREIGN KEY (`idproprietario`) REFERENCES `proprietario` (`idproprietario`)
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
  `foto` blob NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `contato` varchar(16) NOT NULL,
  `valoruni` decimal(10,0) NOT NULL,
  `cartao` decimal(10,0) NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Definition of table `pg`
--

DROP TABLE IF EXISTS `pg`;
CREATE TABLE `pg` (
  `idpg` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idcarro` int(10) unsigned NOT NULL,
  `idcliente` int(10) unsigned NOT NULL,
  `tipopg` char(1) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idpg`,`idcarro`,`idcliente`) USING BTREE,
  KEY `FK_pg_carro` (`idcarro`),
  KEY `FK_pg_cliente` (`idcliente`),
  CONSTRAINT `FK_pg_carro` FOREIGN KEY (`idcarro`) REFERENCES `carro` (`idcarro`),
  CONSTRAINT `FK_pg_cliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pg`
--

/*!40000 ALTER TABLE `pg` DISABLE KEYS */;
/*!40000 ALTER TABLE `pg` ENABLE KEYS */;


--
-- Definition of table `proprietario`
--

DROP TABLE IF EXISTS `proprietario`;
CREATE TABLE `proprietario` (
  `idproprietario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `foto` blob NOT NULL,
  `nome` varchar(80) NOT NULL,
  `contato` varchar(16) NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `cadastro` datetime NOT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
