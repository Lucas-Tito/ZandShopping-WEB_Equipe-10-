 CREATE DATABASE zshopping;
 
   USE zshopping;


CREATE TABLE `estabelecimento` (
  `id` int(10) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `descricao` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `estabelecimento` (`id`, `nome`, `descricao`) VALUES
(1, 'zezo store', 'loja muito boa mesmo ;)'),
(27, 'Coxinha dahora', 'Coxinhas muuuito oleosas');

-- --------------------------------------------------------

CREATE TABLE `img_estab` (
  `id` int(10) NOT NULL,
  `arquivo` varchar(40) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  `estab` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `img_estab` (`id`, `arquivo`, `data`, `estab`) VALUES
(5, 'b5853bdd3afe11750e0660a543be69ae.png', '2020-03-04 13:15:01', 'asdasd'),
(18, 'be93bf128cb93d3f71baa163d52d4b0d.png', '2020-03-11 16:15:28', 'Coxinha dahora'),
(19, '7aa52c59e630ea290e9aaf8c079c58c0.jpg', '2020-03-27 10:08:13', 'Eu'),
(20, '92a207d699eb5e31ef2af44e38b1a86f.jpg', '2020-03-27 10:21:47', 'QUalquer coisa'),
(21, '65e930a8780d47a0c61635db96681863.jpg', '2020-03-27 10:29:52', 'Lucas');

-- --------------------------------------------------------



CREATE TABLE `produto` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `valor` double NOT NULL,
  `categoria` int(11) NOT NULL,
  `peso` varchar(10) DEFAULT NULL,
  `estab` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `produto` (`codigo`, `nome`, `valor`, `categoria`, `peso`, `estab`) VALUES
(1, 'doritos', 15, 5, '500 g', 'zezo store'),
(2, 'Ciriguela', 1.5, 6, '5g', 'São Lucas');

-- --------------------------------------------------------



CREATE TABLE `tb_login` (
  `id` int(10) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `tb_login` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Cyka blyat', 'motherrussia@gmail.com', 'comradre');

-- --------------------------------------------------------


CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `quantidade` int(10) NOT NULL,
  `cpf_cliente` varchar(15) NOT NULL,
  `codigo_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `estabelecimento`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `img_estab`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `produto`
  ADD PRIMARY KEY (`codigo`);

ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `estabelecimento`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;


ALTER TABLE `img_estab`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

ALTER TABLE `produto`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `tb_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
