-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/12/2024 às 02:11
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rochedo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cardapio`
--

CREATE TABLE `cardapio` (
  `idcardapio` int(11) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `preco` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` int(11) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `login_cliente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nome`, `senha`, `email`, `telefone`, `endereco`, `login_cliente`) VALUES
(1, 'giorge', '1', 'giorge@gmail.com', 111, '111', 'giorge'),
(2, 'admin', '1', 'admin@gmail.com', 1234, 'rua das aguas', 'admin');

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `idendereco` int(11) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `quadra` varchar(45) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `casa` varchar(45) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `nome_produto` varchar(45) NOT NULL,
  `quantidade_produto` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `dataentrada` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `estoque`
--

INSERT INTO `estoque` (`id`, `nome_produto`, `quantidade_produto`, `preco`, `dataentrada`) VALUES
(1, 'rochedo', 1, 1.00, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idfuncionario` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `salario` int(11) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `telefone` int(11) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `nota_fiscal`
--

CREATE TABLE `nota_fiscal` (
  `idnota_fiscal` int(11) NOT NULL,
  `nomeestabelecimento` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `data` date NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` varchar(45) NOT NULL,
  `formapagamento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `data_pedido` date NOT NULL,
  `status` varchar(45) NOT NULL,
  `forma_pagamento` varchar(45) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `horario_pedido` time NOT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `nota_fiscal_idnota_fiscal` int(11) NOT NULL,
  `endereco_cliente` varchar(255) NOT NULL,
  `itens_pedido` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `pedido`
--

INSERT INTO `pedido` (`id`, `data_pedido`, `status`, `forma_pagamento`, `valor_total`, `horario_pedido`, `cliente_idcliente`, `nota_fiscal_idnota_fiscal`, `endereco_cliente`, `itens_pedido`) VALUES
(49, '2024-12-02', 'pendente', '', 0.00, '17:21:38', 1, 0, '111', '[]'),
(50, '2024-12-02', 'pendente', '', 0.00, '17:23:23', 1, 0, '111', '[]'),
(51, '2024-12-02', 'pendente', 'dinheiro', 0.00, '17:24:07', 1, 0, '111', '[]'),
(52, '2024-12-02', 'pendente', 'dinheiro', 0.00, '17:27:07', 1, 0, '111', '[]'),
(53, '2024-12-02', 'pendente', 'dinheiro', 0.00, '17:28:39', 1, 0, '111', '[]'),
(54, '2024-12-02', 'pendente', 'dinheiro', 0.00, '17:31:33', 1, 0, '111', '[]'),
(55, '2024-12-02', 'pendente', 'dinheiro', 0.00, '17:33:32', 1, 0, '111', '[]'),
(56, '2024-12-02', 'pendente', 'dinheiro', 0.00, '18:04:46', 1, 0, '111', '[]'),
(57, '2024-12-02', 'pendente', 'dinheiro', 0.00, '22:04:01', 1, 0, '111', '[]'),
(58, '2024-12-02', 'pendente', 'dinheiro', 0.00, '22:04:40', 1, 0, '111', '[]');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido_has_produto`
--

CREATE TABLE `pedido_has_produto` (
  `pedido_idpedido` int(11) NOT NULL,
  `pedido_cliente_idcliente` int(11) NOT NULL,
  `produto_idproduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `idproduto` int(11) NOT NULL,
  `nomeproduto` varchar(45) NOT NULL,
  `qtdprodutos` int(11) NOT NULL,
  `preco` varchar(45) NOT NULL,
  `cardapio_idcardapio` int(11) NOT NULL,
  `vendas_idvendas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `relatorio`
--

CREATE TABLE `relatorio` (
  `idrelatorio` int(11) NOT NULL,
  `data_venda` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `produto` varchar(45) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `idvendas` int(11) NOT NULL,
  `nome_produto` varchar(45) NOT NULL,
  `preco` varchar(45) NOT NULL,
  `data_venda` date NOT NULL,
  `vendedor` varchar(45) NOT NULL,
  `status_venda` varchar(45) NOT NULL,
  `total` varchar(45) NOT NULL,
  `funcionario_idfuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas_has_relatorio`
--

CREATE TABLE `vendas_has_relatorio` (
  `vendas_idvendas` int(11) NOT NULL,
  `vendas_funcionario_idfuncionario` int(11) NOT NULL,
  `relatorio_idrelatorio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD PRIMARY KEY (`idcardapio`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idendereco`,`cliente_idcliente`),
  ADD KEY `fk_endereco_cliente1_idx` (`cliente_idcliente`);

--
-- Índices de tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idfuncionario`);

--
-- Índices de tabela `nota_fiscal`
--
ALTER TABLE `nota_fiscal`
  ADD PRIMARY KEY (`idnota_fiscal`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`,`cliente_idcliente`,`nota_fiscal_idnota_fiscal`),
  ADD KEY `fk_pedido_cliente_idx` (`cliente_idcliente`),
  ADD KEY `fk_pedido_nota_fiscal1_idx` (`nota_fiscal_idnota_fiscal`);

--
-- Índices de tabela `pedido_has_produto`
--
ALTER TABLE `pedido_has_produto`
  ADD PRIMARY KEY (`pedido_idpedido`,`pedido_cliente_idcliente`,`produto_idproduto`),
  ADD KEY `fk_pedido_has_produto_produto1_idx` (`produto_idproduto`),
  ADD KEY `fk_pedido_has_produto_pedido1_idx` (`pedido_idpedido`,`pedido_cliente_idcliente`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idproduto`,`cardapio_idcardapio`,`vendas_idvendas`),
  ADD KEY `fk_produto_cardapio1_idx` (`cardapio_idcardapio`),
  ADD KEY `fk_produto_vendas1_idx` (`vendas_idvendas`);

--
-- Índices de tabela `relatorio`
--
ALTER TABLE `relatorio`
  ADD PRIMARY KEY (`idrelatorio`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`idvendas`,`funcionario_idfuncionario`),
  ADD KEY `fk_vendas_funcionario1_idx` (`funcionario_idfuncionario`);

--
-- Índices de tabela `vendas_has_relatorio`
--
ALTER TABLE `vendas_has_relatorio`
  ADD PRIMARY KEY (`vendas_idvendas`,`vendas_funcionario_idfuncionario`,`relatorio_idrelatorio`),
  ADD KEY `fk_vendas_has_relatorio_relatorio1_idx` (`relatorio_idrelatorio`),
  ADD KEY `fk_vendas_has_relatorio_vendas1_idx` (`vendas_idvendas`,`vendas_funcionario_idfuncionario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `nota_fiscal`
--
ALTER TABLE `nota_fiscal`
  MODIFY `idnota_fiscal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_endereco_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_cliente` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `pedido_has_produto`
--
ALTER TABLE `pedido_has_produto`
  ADD CONSTRAINT `fk_pedido_has_produto_pedido1` FOREIGN KEY (`pedido_idpedido`,`pedido_cliente_idcliente`) REFERENCES `pedido` (`id`, `cliente_idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_has_produto_produto1` FOREIGN KEY (`produto_idproduto`) REFERENCES `produto` (`idproduto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_cardapio1` FOREIGN KEY (`cardapio_idcardapio`) REFERENCES `cardapio` (`idcardapio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produto_vendas1` FOREIGN KEY (`vendas_idvendas`) REFERENCES `vendas` (`idvendas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `fk_vendas_funcionario1` FOREIGN KEY (`funcionario_idfuncionario`) REFERENCES `funcionario` (`idfuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `vendas_has_relatorio`
--
ALTER TABLE `vendas_has_relatorio`
  ADD CONSTRAINT `fk_vendas_has_relatorio_relatorio1` FOREIGN KEY (`relatorio_idrelatorio`) REFERENCES `relatorio` (`idrelatorio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vendas_has_relatorio_vendas1` FOREIGN KEY (`vendas_idvendas`,`vendas_funcionario_idfuncionario`) REFERENCES `vendas` (`idvendas`, `funcionario_idfuncionario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
