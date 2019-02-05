-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.3.12-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para pdv
DROP DATABASE IF EXISTS `pdv`;
CREATE DATABASE IF NOT EXISTS `pdv` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `pdv`;

-- Copiando estrutura para tabela pdv.documento
CREATE TABLE IF NOT EXISTS `documento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` int(11) NOT NULL DEFAULT 0,
  `confirmado` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela pdv.documento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
/*!40000 ALTER TABLE `documento` ENABLE KEYS */;

-- Copiando estrutura para tabela pdv.item
CREATE TABLE IF NOT EXISTS `item` (
  `id_documento` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  KEY `FK_item_documento` (`id_documento`),
  KEY `FK_item_produtos` (`id_produto`),
  CONSTRAINT `FK_item_documento` FOREIGN KEY (`id_documento`) REFERENCES `documento` (`id`),
  CONSTRAINT `FK_item_produtos` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela pdv.item: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
/*!40000 ALTER TABLE `item` ENABLE KEYS */;

-- Copiando estrutura para tabela pdv.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela pdv.produtos: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`codigo`, `descricao`, `preco`) VALUES
	(1, 'Produto Teste 1', 5.44),
	(2, 'Produto Teste 2', 6.88),
	(3, '3', 3),
	(4, 'Produto Teste 4', 7.99),
	(5, 'Produto Teste 5', 55),
	(6, 'seis', 66),
	(7, '7', 7),
	(8, '8', 8);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
