-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Nov-2021 às 00:49
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `atp`
--
CREATE DATABASE IF NOT EXISTS `atp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `atp`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

DROP TABLE IF EXISTS `emprestimo`;
CREATE TABLE `emprestimo` (
  `ID` int(11) NOT NULL,
  `ID_ITEM` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `DT_EMPRESTIMO` date NOT NULL,
  `DT_DEVOLUCAO` date NOT NULL,
  `OBSERVACAO` varchar(30) NOT NULL,
  `DIAS_EMPRESTIMO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`ID`, `ID_ITEM`, `ID_USUARIO`, `DT_EMPRESTIMO`, `DT_DEVOLUCAO`, `OBSERVACAO`, `DIAS_EMPRESTIMO`) VALUES
(35, 51, 27, '2021-11-19', '2021-11-29', '', 3),
(36, 52, 27, '2021-11-29', '0000-00-00', '', 1),
(37, 53, 27, '2021-11-29', '2021-11-29', '', 0),
(38, 54, 24, '2021-11-26', '0000-00-00', 'Comprei baterias novas', 1),
(40, 58, 24, '2021-11-29', '2021-11-29', '', 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

DROP TABLE IF EXISTS `itens`;
CREATE TABLE `itens` (
  `ID` int(11) NOT NULL,
  `DESCRICAO` varchar(50) NOT NULL,
  `OBSERVACAO` varchar(100) NOT NULL,
  `STATUS` varchar(15) NOT NULL,
  `ID_USUARIO_DONO` int(11) NOT NULL,
  `ATIVO` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`ID`, `DESCRICAO`, `OBSERVACAO`, `STATUS`, `ID_USUARIO_DONO`, `ATIVO`) VALUES
(51, 'DVD Jogos Vorazes', 'NÃ£o marcar paginas', 'Disponivel', 24, 'A'),
(52, 'ViolÃ£o', 'Limpar Cordas', 'Emprestado', 24, 'A'),
(53, 'Caixa de SomJBL', '', 'Disponivel', 24, 'A'),
(54, 'Controle PS', 'Bateira nova', 'Emprestado', 27, 'A'),
(55, 'Calculadora Cientifica', '', 'Disponivel', 27, 'A'),
(56, 'Pendrive', '', 'Disponivel', 27, 'A'),
(58, 'Livro', '', 'Disponivel', 32, 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `LOGIN` varchar(10) NOT NULL,
  `ENDERECO` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `TELEFONE` varchar(15) NOT NULL,
  `SENHA` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID`, `NOME`, `LOGIN`, `ENDERECO`, `EMAIL`, `TELEFONE`, `SENHA`) VALUES
(24, 'MASTER', 'MASTER', 'Rua 16, Casa 115 ', 'carlos@gmail.com', '44998634204', '1'),
(25, 'Carlos Eduardo', 'CARLOS', 'Avenida Paris,115', 'eduardo@gmail.com', '998632115', '1'),
(27, 'JoÃ£o', 'JOAO', '', '', '', '1'),
(32, 'Pedro', 'PEDRO', 'teste', 'teste@teste.com', '98984797', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `REL_EMPRESTIMO_USUARIO` (`ID_USUARIO`),
  ADD KEY `REL_EMPRESTIMO_item` (`ID_ITEM`);

--
-- Índices para tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `rel_item_usuario` (`ID_USUARIO_DONO`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `REL_EMPRESTIMO_USUARIO` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID`),
  ADD CONSTRAINT `REL_EMPRESTIMO_item` FOREIGN KEY (`ID_ITEM`) REFERENCES `itens` (`ID`);

--
-- Limitadores para a tabela `itens`
--
ALTER TABLE `itens`
  ADD CONSTRAINT `rel_item_usuario` FOREIGN KEY (`ID_USUARIO_DONO`) REFERENCES `usuario` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
