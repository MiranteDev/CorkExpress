-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Set-2018 às 08:53
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corkdb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_profissional`
--

CREATE TABLE `categoria_profissional` (
  `id_categoria` int(11) NOT NULL,
  `descricao_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria_profissional`
--

INSERT INTO `categoria_profissional` (`id_categoria`, `descricao_categoria`) VALUES
(7, 'yui');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(100) NOT NULL,
  `nif_empresa` varchar(100) NOT NULL,
  `morada_empresa` varchar(100) NOT NULL,
  `contacto_empresa` varchar(100) NOT NULL,
  `email_empresa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(11) NOT NULL,
  `func_nome` varchar(100) NOT NULL,
  `func_bi` varchar(100) NOT NULL,
  `func_nif` varchar(100) NOT NULL,
  `func_niss` varchar(100) NOT NULL,
  `func_nib` varchar(100) NOT NULL,
  `func_datan` varchar(100) NOT NULL,
  `func_salario` double NOT NULL,
  `func_tipodepart` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id_funcionario`, `func_nome`, `func_bi`, `func_nif`, `func_niss`, `func_nib`, `func_datan`, `func_salario`, `func_tipodepart`, `id_categoria`) VALUES
(1, 'Joao Mirante', '123123', '123123', '123123', '123123', '2018-07-18', 800, 2, 4),
(3, 'Joao Vilares', '123', '123', '123', '123', '2018-08-08', 500, 2, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `irs`
--

CREATE TABLE `irs` (
  `id_irs` int(11) NOT NULL,
  `escalao` double NOT NULL,
  `funcionario_desconto` double NOT NULL,
  `empresa_desconto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `irs`
--

INSERT INTO `irs` (`id_irs`, `escalao`, `funcionario_desconto`, `empresa_desconto`) VALUES
(13, 200078, 157, 164444);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`, `tipo`, `id_funcionario`) VALUES
(1, 'mirante', '123', 0, 1),
(2, 'miguel', '123', 0, 2),
(3, 'admin', '123', 1, 0),
(4, 'vilares', '123', 0, 3),
(5, '', '', 0, 0),
(6, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id_mensagem` int(11) NOT NULL,
  `msg` varchar(400) NOT NULL,
  `id_funcionario` int(11) NOT NULL,
  `nome_funcionario` varchar(100) NOT NULL,
  `data_mensagem` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `id_notificacao` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `assunto` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `estado` int(11) NOT NULL,
  `id_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `notificacao`
--

INSERT INTO `notificacao` (`id_notificacao`, `nome`, `assunto`, `msg`, `data`, `estado`, `id_funcionario`) VALUES
(1, 'Administrador', 'Alteração de NIB', 'Poderia alterar o meu nib', '2018-08-13', 1, 1),
(2, 'Administrador', 'Alterção de Morada', 'Poderia alterar a minha morada', '2018-08-22', 0, 1),
(3, 'Administrador', 'Alterção de Nome', 'Poderia alterar o meu nome', '2018-08-22', 1, 2),
(10, 'Joao Mirante', 'gdfgfd', 'werwerxfvg\r\n\r\n                                                       ', '2018-08-22', 0, 0),
(11, 'Administrador', 'asdfsg', 'sfsdf\r\nsdagsdgfs\r\n                                                       ', '2018-08-22', 0, 1),
(12, 'Joao Mirante', 'zxc', 'zxc\r\n\r\n                                                       ', '2018-08-22', 0, 0),
(13, 'Joao Vilares', 'COMO QUE E', 'qwrwqefsdf\r\n\r\n                                                       ', '2018-08-23', 0, 0),
(14, 'Administrador', '', '\r\n\r\n                                            fghdfgh          ', '2018-09-03', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `recibos`
--

CREATE TABLE `recibos` (
  `id_recibo` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `nome_funcionario` varchar(100) NOT NULL,
  `nib_funcionario` varchar(50) NOT NULL,
  `nif_funcionario` varchar(50) NOT NULL,
  `niss_funcionario` varchar(50) NOT NULL,
  `salario_base` double NOT NULL,
  `turno_mensal` double NOT NULL,
  `desconto_ss` double NOT NULL,
  `desconto_irc` double NOT NULL,
  `valor_liquido` double NOT NULL,
  `valor_bruto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `recibos`
--

INSERT INTO `recibos` (`id_recibo`, `ano`, `mes`, `nome_funcionario`, `nib_funcionario`, `nif_funcionario`, `niss_funcionario`, `salario_base`, `turno_mensal`, `desconto_ss`, `desconto_irc`, `valor_liquido`, `valor_bruto`) VALUES
(1, 2018, 2, 'Joao Mirante', '', '', '', 0, 0, 0, 0, 0, 0),
(2, 2018, 2, 'Joao Mirante', '', '', '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ss`
--

CREATE TABLE `ss` (
  `id_ss` int(11) NOT NULL,
  `escalao` double NOT NULL,
  `funcionario_desconto` double NOT NULL,
  `empresa_desconto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ss`
--

INSERT INTO `ss` (`id_ss`, `escalao`, `funcionario_desconto`, `empresa_desconto`) VALUES
(2, 500, 1, 1.2),
(5, 0, 0, 0),
(6, 35, 345, 345),
(7, 0, 0, 0),
(8, 0, 0, 0),
(9, 0, 0, 0),
(10, 0, 0, 0),
(11, 2000, 10, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turnos`
--

CREATE TABLE `turnos` (
  `id_turno` int(11) NOT NULL,
  `descricao_turno` varchar(100) NOT NULL,
  `valor_turno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria_profissional`
--
ALTER TABLE `categoria_profissional`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Indexes for table `irs`
--
ALTER TABLE `irs`
  ADD PRIMARY KEY (`id_irs`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id_mensagem`);

--
-- Indexes for table `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`id_notificacao`);

--
-- Indexes for table `recibos`
--
ALTER TABLE `recibos`
  ADD PRIMARY KEY (`id_recibo`);

--
-- Indexes for table `ss`
--
ALTER TABLE `ss`
  ADD PRIMARY KEY (`id_ss`);

--
-- Indexes for table `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_turno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria_profissional`
--
ALTER TABLE `categoria_profissional`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `irs`
--
ALTER TABLE `irs`
  MODIFY `id_irs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id_mensagem` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `id_notificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `recibos`
--
ALTER TABLE `recibos`
  MODIFY `id_recibo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ss`
--
ALTER TABLE `ss`
  MODIFY `id_ss` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
