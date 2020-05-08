 CREATE DATABASE zshopping;
 
   USE zshopping;

CREATE TABLE `tb_login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Cyka blyat', 'motherrussia@gmail.com', 'comradre');



CREATE TABLE `produto` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `valor` double NOT NULL,
  `categoria` int(11) NOT NULL,
  `peso` varchar(10) DEFAULT NULL,
     PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `produto` (`codigo`, `nome`, `valor`, `categoria`, `peso`) VALUES

(1, 'doritos', 15, 5, '500 g');
CREATE TABLE `venda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `quantidade` int(10) NOT NULL,
  `cpf_cliente` varchar(15) NOT NULL,
  `codigo_produto` int(11) NOT NULL,
     PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

